<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Crud_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    
  }

  public function _generate_key($table_name, $column_name, $prefix)
  {
    $key = $this->__generate_key($prefix);

    while ($this->__key_exist($key, $table_name, $column_name)) {
      $key = $this->__generate_key($prefix);
    }
    return $key;

  }

  private function __generate_key($prefix)
  {
    $a = md5(uniqid(mt_rand(), true));
    $a = substr($a, 0, 20);
    $str = $prefix . "_" . $a;
    return $str;
  }

  private function __key_exist($key, $table_name, $column_name)
  {
    $this->db->select('*');
    $this->db->from($table_name);
    $this->db->where($column_name, $key);
    $this->db->limit(1); //ons is good enough
    $num_rows = $this->db->get()->num_rows();

    return $num_rows > 0 ? true : false;

  }

  //------------------------------------------------------------------------------------------------------------------

  function clear_cache()
  {
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
  }

  /////////GET NAME BY TABLE NAME AND ID/////////////
  function get_type_name_by_id($type, $type_id = '', $field = 'name')
  {
    if ($type_id != '') {
      $l = $this->db->get_where($type, array(
        $type . '_id' => $type_id
      ));
      $n = $l->num_rows();
      if ($n > 0) {
        return $l->row()->$field;
      }
    }
  }

  function get_settings_value($type, $type_name = '', $field = 'value')
  {
    if ($type_name != '') {
      return $this->db->get_where($type, array('type' => $type_name))->row()->$field;
    }
  }
  
  function do_register($email, $password, $account, $user_name, $phone, $gender, $login_type) {
    $ins = array(
      'user_type' => USER_TYPE_GENERAL,
      'username' => $user_name,
      'nickname' => '',
      'gender' => $gender,
      'email' => $email,
      'phone' => $phone,
      'kakao_thumbnail_image_url' => '',
      'kakao_profile_image_url' => '',
      'profile_image_url' => '',
      'password' => (empty($password) == true ? '' : sha1($password)),
      'unregister' => 0,
      'mobile_approval' => 1,
    );
  
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('last_login_at', 'NOW()', false);
    $this->db->insert('user', $ins);
  
    if ($this->db->affected_rows() <= 0) {
      $result['status'] = 'fail';
      $result['message'] = '관리자에게 문의 바랍니다(not inserted)';
      return $result;
//      echo json_encode($result);
//      exit;
    }
  
    $user_id = $this->db->insert_id();
    $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
  
    $ins = array(
      'user_id' => $user_data->user_id,
      'account' => json_encode($account),
      'unregistered' => 0,
    );
    $this->db->set('register_at', 'NOW()', false);
    $this->db->insert('user_register',$ins);
  
    $ins = array(
      'user_id' => $user_data->user_id,
      'account' => json_encode($account),
      'session_id' => $this->get_session_id(),
      'ip' => $this->get_session_ip(),
      'is_browser' => $this->agent->is_browser(),
      'is_mobile' => $this->agent->is_mobile(),
      'is_robot' => $this->agent->is_robot(),
      'is_referral' => $this->agent->is_referral(),
      'browser' => $this->agent->browser(),
      'version' => $this->agent->version(),
      'mobile' => $this->agent->mobile(),
      'robot' => $this->agent->robot(),
      'platform' => $this->agent->platform(),
      'referrer' => $this->agent->referrer(),
      'agent' => $this->agent->agent_string(),
      'login_type' => $login_type,
    );
    $this->db->set('login_at', 'NOW()', false);
    $this->db->insert('user_login', $ins);
  
    $user_id = $user_data->user_id;
    $kakao_id = $user_data->kakao_id;
    $email = $user_data->email;
    $user_type = $user_data->user_type;
    $nickname = $user_data->nickname;
    $kakao_thumbnail_image_url = $user_data->kakao_thumbnail_image_url;
    $profile_image_url = $user_data->profile_image_url;
  
    $this->session->set_userdata('user_login', 'yes');
    $this->session->set_userdata('user_id', $user_id);
    $this->session->set_userdata('kakao_id', $kakao_id);
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('user_type', $user_type);
    $this->session->set_userdata('nickname', $nickname);
    $this->session->set_userdata('kakao_thumbnail_image_url', $kakao_thumbnail_image_url);
    $this->session->set_userdata('profile_image_url', $profile_image_url);
    $this->session->set_userdata('login_type', $login_type);
    
    if ($login_type == 'apple') {
      $data = array(
        'sub' => $account->payload->sub,
        'access_token' => $account->access_token,
        'refresh_token' => $account->refresh_token,
        'issued_at' => $account->payload->iat + 32400,
        'expired_at' => $account->payload->iat + $account->expires_in + 32400,
      );
      $data['user_id'] = $user_id;
      $this->db->set('last_updated_at', 'now()', false);
      $this->db->set('create_at', 'now()', false);
      $this->db->insert('user_apple', $data);
    }
    
    $this->mts_model->send_user_register($phone);
 
    $coupon_user_type = COUPON_USER_TYPE_REGISTER;
    $this->coupon_model->send_coupon_data($coupon_user_type, $user_data);
    
    $result['status'] = 'success';
    $result['message'] = "첫 방문을 환영합니다.";
    return $result;
//    echo json_encode($result);
//    exit;
//
//    return $user_data;
  }
  
  function do_kakao_login($post)
  {
    $result = array();
    
//    $connected_at = $post['connected_at'];
//    $properties = $post['properties'];
    $kakao_id = (int)$post['id'];
    $kakao_account = $post['kakao_account'];
  
    $profile = $kakao_account['profile'];
    $email = $kakao_account['email'];
  
    $user_data = $this->db->get_where('user', array('email' => $email))->row();
  
    if (empty($user_data)) {
      $reg_type = $this->session->userdata('reg_type');
      if ($reg_type == 'kakao') {
        $auth_data = $post['auth'];
        
        $user_type = USER_TYPE_GENERAL;
        $nickname = $profile['nickname'];
//        $gender = $kakao_account['gender'];
        $kakao_thumbnail_image_url = $profile['thumbnail_image_url'];
        $kakao_profile_image_url = $profile['profile_image_url'];
        $profile_image_url = '';
        $password = '';
        $username = $auth_data->name;
        $phone = $auth_data->mobileno;
        $gender = $auth_data->gender == 1 ? 'male' : 'female';
//          $create_at = $connected_at;

//      if ($kakao_account['has_phone_number'] == true) {
//        $phone = $kakao_account['phone_number'];
//      } else {
//        $phone = '';
//      }
  
        $ins = array(
          'kakao_id' => $kakao_id,
          'user_type' => $user_type,
          'username' => $username,
          'nickname' => $nickname,
          'gender' => $gender,
          'email' => $email,
        'phone' => $phone,
          'kakao_thumbnail_image_url' => $kakao_thumbnail_image_url,
          'kakao_profile_image_url' => $kakao_profile_image_url,
          'profile_image_url' => $profile_image_url,
          'password' => $password,
          'unregister' => 0,
          'mobile_approval' => 1,
//            'last_login_at' => date("Y-m-d H:i:s"),
//            'create_at' => $create_at,
        );
  
        $this->db->set('create_at', 'NOW()', false);
        $this->db->set('last_login_at', 'NOW()', false);
        $this->db->insert('user', $ins);
  
        $user_data = $this->db->get_where('user', array('kakao_id' => $kakao_id))->row();
  
        $ins = array(
          'user_id' => $user_data->user_id,
          'kakao_id' => $user_data->kakao_id,
          'account' => json_encode($kakao_account),
          'unregistered' => 0,
        );
        $this->db->set('register_at', 'NOW()', false);
        $this->db->insert('user_register', $ins);
  
        $this->session->set_userdata('reg_type', '');
        $this->session->set_userdata('reg_account', '');
  
        $this->mts_model->send_user_register($phone);
  
        $coupon_user_type = COUPON_USER_TYPE_REGISTER;
        $this->coupon_model->send_coupon_data($coupon_user_type, $user_data);
  
        $result['status'] = 'success';
        $result['message'] = "첫 방문을 환영합니다.";
  
      } else {
        
        $this->session->set_userdata('reg_type', 'kakao');
        $this->session->set_userdata('reg_account', $post);
  
        $result['status'] = 'approval';
        $result['message'] = "본인인증이 필요합니다.";
        return $result;
        
      }
      
    } else {
    
      if ($user_data->unregister == 1) {
        $ins = array(
          'user_id' => $user_data->user_id,
          'kakao_id' => $user_data->kakao_id,
          'account' => json_encode($kakao_account),
          'unregistered' => 1,
        );
        $this->db->set('register_at', 'NOW()', false);
        $this->db->insert('user_register', $ins);
      
        $this->db->set('unregister', 0);
      
        $result['status'] = 'restore';
        if ($user_data->user_type & USER_TYPE_TEACHER) {
          $result['message'] = "기존에 강사 정보를 포함한 휴먼계정이 삭제되지 않았습니다. 복원 후 로그인하시겠습니까? 복원을 원하지 않으시면 삭제를 클릭해 주세요.";
        } else {
          $result['message'] = "기존에 휴먼계정이 삭제되지 않았습니다. 복원 후 로그인하시겠습니까? 복원을 원하지 않으시면 삭제를 클릭해 주세요.";
        }
        $this->session->set_userdata('user_restore', "yes");
      
      } else {
        $result['status'] = 'success';
        $result['message'] = "로그인해주셔서 감사합니다.";
      }
    
//      if ($kakao_account['has_phone_number'] == true) {
//        $phone = $kakao_account['phone_number'];
//        $this->db->set('phone', $phone);
//      }
    
      $this->db->set('last_login_at', 'NOW()', false);
      $this->db->where('user_id', $user_data->user_id);
      $this->db->update('user');
    
    }
  
    $this->load->library('user_agent');

    $ins = array(
      'user_id' => $user_data->user_id,
      'kakao_id' => $user_data->kakao_id,
      'account' => json_encode($kakao_account),
      'session_id' => $this->get_session_id(),
      'ip' => $this->get_session_ip(),
      'is_browser' => $this->agent->is_browser(),
      'is_mobile' => $this->agent->is_mobile(),
      'is_robot' => $this->agent->is_robot(),
      'is_referral' => $this->agent->is_referral(),
      'browser' => $this->agent->browser(),
      'version' => $this->agent->version(),
      'mobile' => $this->agent->mobile(),
      'robot' => $this->agent->robot(),
      'platform' => $this->agent->platform(),
      'referrer' => $this->agent->referrer(),
      'agent' => $this->agent->agent_string(),
    );
    $this->db->set('login_at', 'NOW()', false);
    $this->db->insert('user_login', $ins);
  
    $user_id = $user_data->user_id;
    $kakao_id = $user_data->kakao_id;
    $email = $user_data->email;
    $user_type = $user_data->user_type;
    $nickname = $user_data->nickname;
    $kakao_thumbnail_image_url = $user_data->kakao_thumbnail_image_url;
    $profile_image_url = $user_data->profile_image_url;
    $login_type = 'kakao';

    $this->session->set_userdata('user_login', 'yes');
//    $this->session->set_userdata('user_data', json_encode($user_data));
    $this->session->set_userdata('user_id', $user_id);
    $this->session->set_userdata('kakao_id', $kakao_id);
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('user_type', $user_type);
    $this->session->set_userdata('nickname', $nickname);
    $this->session->set_userdata('kakao_thumbnail_image_url', $kakao_thumbnail_image_url);
    $this->session->set_userdata('profile_image_url', $profile_image_url);
    $this->session->set_userdata('login_type', $login_type);
 
    return $result;
  }
  
  /////////Filter One/////////////
  function filter_one($table, $type, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($type, $value);
    return $this->db->get()->result_array();
  }
  
  // FILE_UPLOAD
  function img_thumb($type, $id, $ext = '.jpg', $width = '400', $height = '300')
  {
    $this->load->library('image_lib');
    ini_set("memory_limit", "-1");
    
    $config1['image_library'] = 'gd2';
    $config1['create_thumb'] = TRUE;
    $config1['maintain_ratio'] = false;
    $config1['width'] = $width;
    $config1['height'] = $height;
    $config1['source_image'] = 'uploads/' . $type . '_image/' . $type . '_' . $id . $ext;
    
    $this->image_lib->initialize($config1);
    if ($this->image_lib->resize() == false) {
      echo $this->image_lib->display_errors();
    }
    $this->image_lib->clear();
  }

  // FILE_UPLOAD
  function file_up($name, $type, $id, $multi = '', $no_thumb = '', $ext = '.jpg', $width = '400', $height = '300')
  {
    $upload_path = '/web/public_html/uploads/' . $type . '_image/';
    // 원인은 모르겠고 upload path를 미리 만들어서 퍼미션을 주자
//    $rc = is_dir($upload_path);
//    if (!isset($rc) || $rc == false) {
//      if (@mkdir($upload_path, 0777)) {
//        @chmod($upload_path, 0777);
//      }
//    }
    if ($multi == '') {
      $file_name = $type . '_' . $id . $ext;
      $file_path = $upload_path . $file_name;
      if (isset($_FILES[$name]['tmp_name'])) {
        $rc = move_uploaded_file($_FILES[$name]['tmp_name'], $file_path);
//        if ($rc == false) {
//          echo "fail : move_uploaded_file";
//          exit;
//        }
      }
      if ($no_thumb == '') {
        $this->img_thumb($type, $id, $ext, $width, $height);
      }
    } elseif ($multi == 'multi') {
      $ib = 1;
      foreach ($_FILES[$name]['name'] as $i => $row) {
        $ib = $this->file_exist_ret($type, $id, $ib);
        move_uploaded_file($_FILES[$name]['tmp_name'][$i], $upload_path . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext);
        if ($no_thumb == '') {
          $this->img_thumb($type, $id . '_' . $ib, $ext, $width, $height);
        }
      }
    }
  }

  /*function file_up_from_urls($urls, $type, $id, $no_thumb = '')
  {
      $ib = 1;
      foreach ($urls as $url) {
          $ext = '.' . pathinfo($url, PATHINFO_EXTENSION);
          $ib = $this->file_exist_ret2($type, $id, $ib, $ext);

          $to_path = 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext;
          $got_content = file_get_contents($url);
          file_put_contents($to_path, $got_content);
          if ($no_thumb == '') {
              $this->img_thumb($type, $id . '_' . $ib, $ext);
          }
      }
  }*/

  function file_up_from_urls($urls, $type, $id, $no_thumb = '')
  {
    $ib = 1;
    foreach ($urls as $url) {
      $ext = '.' . pathinfo($url, PATHINFO_EXTENSION);
      $ib = $this->file_exist_ret2($type, $id, $ib, $ext);

      file_put_contents('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext, file_get_contents($url));
      //copy($url,FCPATH.'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext);
      if ($no_thumb == '') {
        $this->img_thumb($type, $id . '_' . $ib, $ext);
      }
    }
  }

  function file_exist_ret2($type, $id, $ib, $ext = '.jpg')
  {
    if (file_exists(FCPATH . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext)) {
      $ib = $ib + 1;
      $ib = $this->file_exist_ret2($type, $id, $ib, $ext);
      return $ib;
    } else {
      return $ib;
    }
  }

  // FILE_UPLOAD : EXT :: FILE EXISTS
  function file_exist_ret($type, $id, $ib, $ext = '.jpg')
  {
    if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext)) {
      $ib = $ib + 1;
      $ib = $this->file_exist_ret($type, $id, $ib);
      return $ib;
    } else {
      return $ib;
    }
  }


  // FILE_VIEW
  function file_view($type, $id, $width = '100', $height = '100', $thumb = 'no', $src = 'no', $multi = '', $multi_num = '', $ext = '.jpg')
  {
    if ($multi == '') {
      if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . $ext)) {
        if ($thumb == 'no') {
          $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . $ext;
        } elseif ($thumb == 'thumb') {
          $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_thumb' . $ext;
        }

        if ($src == 'no') {
          return '<img src="' . $srcl . '" height="' . $height . '" width="' . $width . '" />';
        } elseif ($src == 'src') {
          return $srcl;
        }
      } else {
        return base_url() . 'uploads/' . $type . '_image/default.jpg';
      }

    } else if ($multi == 'multi') {
      $num = $this->get_type_name_by_id($type, $id, 'num_of_imgs');
      //$num = 2;
      $i = 0;
      $p = 0;
      $q = 0;
      $return = array();
      while ($p < $num) {
        $i++;
        if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . $ext)) {
          if ($thumb == 'no') {
            $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . $ext;
          } elseif ($thumb == 'thumb') {
            $srcl = base_url() . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . '_thumb' . $ext;
          }

          if ($src == 'no') {
            $return[] = '<img src="' . $srcl . '" height="' . $height . '" width="' . $width . '" />';
          } elseif ($src == 'src') {
            $return[] = $srcl;
          }
          $p++;
        } else {
          $q++;
          if ($q == 10) {
            break;
          }
        }

      }
      if (!empty($return)) {
        if ($multi_num == 'one') {
          return $return[0];
        } else if ($multi_num == 'all') {
          return $return;
        } else {
          $n = $multi_num - 1;
          unset($return[$n]);
          return $return;
        }
      } else {
        if ($multi_num == 'one') {
          return base_url() . 'uploads/' . $type . '_image/default.jpg';
        } else if ($multi_num == 'all') {
          return array(base_url() . 'uploads/' . $type . '_image/default.jpg');
        } else {
          return array(base_url() . 'uploads/' . $type . '_image/default.jpg');
        }
      }
    }
  }


  // FILE_VIEW
  function file_dlt($type, $id, $ext = '.jpg', $multi = '', $m_sin = '')
  {
    if ($multi == '') {
      if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . $ext)) {
        unlink("uploads/" . $type . "_image/" . $type . "_" . $id . $ext);
      }
      if (file_exists("uploads/" . $type . "_image/" . $type . "_" . $id . "_thumb" . $ext)) {
        unlink("uploads/" . $type . "_image/" . $type . "_" . $id . "_thumb" . $ext);
      }

    } else if ($multi == 'multi') {
      $num = $this->get_type_name_by_id($type, $id, 'num_of_imgs');
      if ($m_sin == '') {
        $i = 0;
        $p = 0;
        while ($p < $num) {
          $i++;
          if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $i . $ext)) {
            unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $i . $ext);
            $p++;
            $data['num_of_imgs'] = $num - 1;
            $this->db->where($type . '_id', $id);
            $this->db->update($type, $data);
          }

          if (file_exists("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $i . "_thumb" . $ext)) {
            unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $i . "_thumb" . $ext);
          }
          if ($i > 50) {
            break;
          }
        }
      } else {
        if (file_exists('uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $m_sin . $ext)) {
          unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $m_sin . $ext);
        }
        if (file_exists("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $m_sin . "_thumb" . $ext)) {
          unlink("uploads/" . $type . "_image/" . $type . "_" . $id . '_' . $m_sin . "_thumb" . $ext);
        }
        $data['num_of_imgs'] = $num - 1;
        $this->db->where($type . '_id', $id);
        $this->db->update($type, $data);
      }
    }
  }

  //DELETE MULTIPLE ITEMS
  function multi_delete($type, $ids_array)
  {
    foreach ($ids_array as $row) {
      $this->file_dlt($type, $row);
      $this->db->where($type . '_id', $row);
      $this->db->delete($type);
    }
  }

  //DELETE SINGLE ITEM
  function single_delete($type, $id)
  {
    $this->file_dlt($type, $id);
    $this->db->where($type . '_id', $id);
    $this->db->delete($type);
  }

/////////SELECT HTML/////////////
  function select_html($from, $name, $field, $type, $class, $e_match = '', $condition = '', $c_match = '', $onchange = '', $condition_type = 'single', $is_none = '')
  {
    $return = '';
    $other = '';
    $multi = 'no';
    $phrase = 'Choose a ' . $name;
    if ($class == 'demo-cs-multiselect') {
      $other = 'multiple';
      $name = $name . '[]';
      if ($type == 'edit') {
        $e_match = json_decode($e_match);
        if ($e_match == NULL) {
          $e_match = array();
        }
        $multi = 'yes';
      }
    }
    $return = '<select name="' . $name . '" onChange="' . $onchange . '(this.value,this)" class="' . $class . '" ' . $other . '  data-placeholder="' . $phrase . '" tabindex="2" data-hide-disabled="true" >';
    if (!is_array($from)) {
      if ($condition == '') {
        $all = $this->db->get($from)->result_array();
      } else if ($condition !== '') {
        if ($condition_type == 'single') {
          $all = $this->db->get_where($from, array(
            $condition => $c_match
          ))->result_array();
        } else if ($condition_type == 'multi') {
          $this->db->where_in($condition, $c_match);
          $all = $this->db->get($from)->result_array();
        }
      }
      if ($is_none == 'none') {
        $return .= '<option value="">Choose one</option>
                            <option value="none">None/All Brands</option>';
      } else {
        $return .= '<option value="">Choose one</option>';
      }

      foreach ($all as $row):
        if ($type == 'add') {
          if ($from == 'category_blog') {
            $return .= '<option value="' . $row['category_id'] . '">' . $row[$field] . '('. $row['desc'] . ')' . '</option>';
          } else {
            $return .= '<option value="' . $row['category_id'] . '">' . $row[$field] . '</option>';
          }
        } else if ($type == 'edit') {
          $return .= '<option value="' . $row['category_id'] . '" ';
          if ($multi == 'no') {
            if ($row['category_id'] == $e_match) {
              $return .= 'selected=."selected"';
            }
          } else if ($multi == 'yes') {
            if (in_array($row['category_id'], $e_match)) {
              $return .= 'selected=."selected"';
            }
          }
          if ($from == 'category_blog') {
            $return .= '>' . $row[$field] . '('. $row['desc'] . ')' . '</option>';
          } else {
            $return .= '>' . $row[$field] . '</option>';
          }
        }
      endforeach;
    } else {
      $all = $from;
      if ($is_none == 'none') {
        $return .= '<option value="">Choose one</option>
                            <option value="none">None/All Brands</option>';
      } else {
        $return .= '<option value="">Choose one</option>';
      }
      foreach ($all as $row):
        if ($type == 'add') {
          $return .= '<option value="' . $row . '">';
          if ($condition == '') {
            $return .= ucfirst(str_replace('_', ' ', $row));
          } else {
            $return .= $this->get_type_name_by_id($condition, $row, $c_match);
          }
          $return .= '</option>';
        } else if ($type == 'edit') {
          $return .= '<option value="' . $row . '" ';
          if ($row == $e_match) {
            $return .= 'selected=."selected"';
          }
          $return .= '>';

          if ($condition == '') {
            $return .= ucfirst(str_replace('_', ' ', $row));
          } else {
            $return .= $this->get_type_name_by_id($condition, $row, $c_match);
          }

          $return .= '</option>';
        }
      endforeach;
    }
    $return .= '</select>';
    return $return;
  }

  function select_html2($from, $name, $field, $type, $class, $e_match = '', $condition = '', $c_match = '', $onchange = '', $condition_type = 'single', $default_text = 'Choose one', $is_val = '')
  {
    $return = '';
    $other = '';
    $multi = 'no';
    $phrase = 'Choose a ' . $name;
    if ($class == 'demo-cs-multiselect') {
      $other = 'multiple';
      $name = $name . '[]';
      if ($type == 'edit') {
        $e_match = json_decode($e_match);
        if ($e_match == NULL) {
          $e_match = array();
        }
        $multi = 'yes';
      }
    }
    if ($onchange == '0') {
      $return = '<select name="' . $name . '" class="' . $class . '" ' . $other . '  data-placeholder="' . $phrase . '" tabindex="2" data-hide-disabled="true" >';
    } else {
      $return = '<select name="' . $name . '" onChange="' . $onchange . '(this.value,this)" class="' . $class . '" ' . $other . '  data-placeholder="' . $phrase . '" tabindex="2" data-hide-disabled="true" >';
    }
    if (!is_array($from)) {
      if ($condition == '') {
        $all = $this->db->get($from)->result_array();
      } else if ($condition !== '') {
        if ($condition_type == 'single') {
          $all = $this->db->get_where($from, array(
            $condition => $c_match
          ))->result_array();
        } else if ($condition_type == 'multi') {
          $this->db->where_in($condition, $c_match);
          $all = $this->db->get($from)->result_array();
        }
      }

      $return .= '<option value="' . $is_val . '">' . $default_text . '</option>';

      foreach ($all as $row):
        if ($type == 'add') {
          $return .= '<option value="' . $row[$from . '_id'] . '">' . $row[$field] . '</option>';
        } else if ($type == 'edit') {
          $return .= '<option value="' . $row[$from . '_id'] . '" ';
          if ($multi == 'no') {
            if ($row[$from . '_id'] == $e_match) {
              $return .= 'selected=."selected"';
            }
          } else if ($multi == 'yes') {
            if (in_array($row[$from . '_id'], $e_match)) {
              $return .= 'selected=."selected"';
            }
          }
          $return .= '>' . $row[$field] . '</option>';
        }
      endforeach;
    } else {
      $all = $from;
      $return .= '<option value="' . $is_val . '">' . $default_text . '</option>';
      foreach ($all as $row):
        if ($type == 'add') {
          $return .= '<option value="' . $row . '">';
          if ($condition == '') {
            $return .= ucfirst(str_replace('_', ' ', $row));
          } else {
            $return .= $this->get_type_name_by_id($condition, $row, $c_match);
          }
          $return .= '</option>';
        } else if ($type == 'edit') {
          $return .= '<option value="' . $row . '" ';
          if ($row == $e_match) {
            $return .= 'selected=."selected"';
          }
          $return .= '>';

          if ($condition == '') {
            $return .= ucfirst(str_replace('_', ' ', $row));
          } else {
            $return .= $this->get_type_name_by_id($condition, $row, $c_match);
          }

          $return .= '</option>';
        }
      endforeach;
    }
    $return .= '</select>';
    return $return;
  }

  //GET PRODUCT LINK
  function blog_link($blog_id)
  {
    $name = url_title($this->get_type_name_by_id('blog', $blog_id, 'title'));
    return base_url() . 'home/blog_view/' . $blog_id . '/' . $name;
  }

//  function get_like_icon($liked)
//  {
//    if ($liked == true) {
//      return base_url() . 'uploads/icon_0504/icon04_heart.png';
//    }
//    return base_url() . 'uploads/icon_0504/icon03_heart.png';
//  }
  function get_like_icon($liked)
  {
//    if ($liked == true) {
//      return base_url() . 'uploads/shop/heart_do.png';
//    }
//    return base_url() . 'uploads/shop/heart_undo.png';
    if ($liked == true) {
      return base_url() . 'template/icon/ic_heart_on.png?v=2';
    }
    return base_url() . 'template/icon/ic_heart_off.png?v=2';
  }

  function get_bookmark_icon($bookmarked)
  {
    if ($bookmarked == true) {
      return base_url() . 'uploads/icon_0504/icon13_star.png';
    }
    return base_url() . 'uploads/icon_0504/icon12_star.png';
  }

  function get_default_profile_img()
  {
    return base_url() . 'uploads/icon_0504/icon08_profile.png';
  }

  function sns_func_html($func_type, $find_type, $is_do, $id, $w, $h)
  {
    $action = $is_do ? 'undo' : 'do';
    if ($func_type == 'like') {
      $img_src = $this->get_like_icon($is_do);
    } else {
      $img_src = $this->get_bookmark_icon($is_do);
    }
    return "<a href='javascript:void(0)' data-action='{$action}' onclick=\"sns_function('{$func_type}','{$find_type}',{$id},$(this))\">" .
//      "<img class='{$find_type}-{$func_type}-{$id}' <!-- id='{$find_type}-{$func_type}-{$id}' --> src='{$img_src}' alt='' style='width:{$w}px !important; height: {$h}px !important;'></a>";
    "<img class='{$find_type}-{$func_type}-{$id}' src='{$img_src}' alt='' style='width:{$w}px !important; height: {$h}px !important;'></a>";
  }

  function get_sns_mark($type, $func, $user_id, $id)
  {
    // type -  class, teacher, center ...
    // func - bookmark, like ...
    $id_col = $type . '_id';
    if ($type == 'class') {
      $id_col = 'video_id';
    }
    $query = <<<QUERY
select count(*) as cnt from {$func}_{$type} where user_id={$user_id} and {$id_col}={$id}
QUERY;
    $marked = $this->db->query($query)->row()->cnt;
    return $marked;
  }

  function get_month($m)
  {
    $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    return $month[$m - 1];
  }

  function file_validation_alert($error) {
    if ($error == UPLOAD_ERR_INI_SIZE || $error == UPLOAD_ERR_FORM_SIZE) {
        $max_filesize_in_mib = min((int)(ini_get('upload_max_filesize')), (int)(ini_get('post_max_size')), (int)(ini_get('memory_limit')));
        $this->alert_exit("파일 사이즈는 {$max_filesize_in_mib}MB를 초과할 수 없습니다.");
    } else if ($error != UPLOAD_ERR_OK) {
        $this->alert_exit("파일 업로드에 문제가 발생했습니다. error code : {$error}");
    }
  }

  function file_validation($src, $alert = true) {
    $error = $src['error'];
    if ($error != UPLOAD_ERR_OK) {
      if ($alert == true) {
        $this->file_validation_alert($error);
      }
    }
    return $error;
  }

  function upload_image($upload_path, $file_name, $src, $width, $height = 0, $create_thumb = true, $maintain_ratio = false)
  {
//    $time = time();
//    $upload_path = IMG_PATH_CENTER;
//    $file_name = $type.'_' . $id . '_' . $time . '.jpg';
    $file_path = $upload_path . $file_name;
//    move_uploaded_file($src, $file_path);
    if (!move_uploaded_file($src['tmp_name'], $file_path)) {
      move_uploaded_file($src['name'], $file_path);
    }

    //Compress Image
    if ($create_thumb) {
      $config['image_library'] = 'gd2';
      $config['source_image'] = $file_path;
      $config['create_thumb'] = $create_thumb;
      $config['maintain_ratio'] = $maintain_ratio;
      $config['quality'] = '100%';
      $config['width'] = $width;
      if ($height) {
        $config['height'] = $height;
      }
      $config['new_image'] = $file_path;
      $this->load->library('image_lib', $config);
      $this->image_lib->clear();
      $this->image_lib->initialize($config);
      $this->image_lib->resize();
    }

    return true;
  }

  function del_upload_image($web_path, $upload_path, $desc, $files, $except_files = array())
  {
    $links = array();
    if (!empty($desc) && strlen($desc) > 0) {
      $dom = new domDocument;
      $dom->loadHTML(html_entity_decode($desc));
      $dom->preserveWhiteSpace = false;
      $imgs = $dom->getElementsByTagName("img");
  
      for($i = 0; $i < $imgs->length; $i++) {
        $links[] = str_replace($web_path, $upload_path, $imgs->item($i)->getAttribute("src"));
      }
    }

    if (!empty($except_files)) {
      $links = array_merge($links, $except_files);
    }

    $files = glob($upload_path.$files);
    $result = array_diff($files, $links);
//    $this->alert_exit(json_encode($result));
    foreach($result as $deleteFile) {
      if (file_exists($deleteFile)) {
        array_map('unlink', glob($deleteFile));
      }
    }
  }

  function del_image($upload_path, $files)
  {
    $files = glob($upload_path.$files);
    foreach($files as $deleteFile) {
      if (file_exists($deleteFile)) {
        array_map('unlink', glob($deleteFile));
      }
    }
  }

  function get_product_list($shop_id, $status, $item_name, $cat, $offset, $limit = 10, $order = 'desc', $order_col = 'product_id', $user_id = 0, $order_start = 0) {
    if ($cat == 'wish' || $cat == 'WISH') {
      $query = <<<QUERY
select a.shop_id,a.status,a.brand_name,b.* from shop_product_id a,shop_product b
where a.product_id=b.product_id and b.product_id in (select product_id from like_product where user_id={$user_id})
QUERY;
    } else {
      $query = <<<QUERY
select a.shop_id,a.status,a.brand_name,b.* from shop_product_id a,shop_product b
where a.product_id=b.product_id
QUERY;
    }
    if (is_array($status)) {
      $query .= " and a.status in (";
      for ($i = 0; $i < count($status); $i++) {
        if ($i == 0) {
          $query .= "{$status[$i]}";
        } else {
          $query .= ",{$status[$i]}";
        }
      }
      $query .= ")";
    } else {
      $query .= " and a.status={$status}";
    }
    if ($shop_id > 0) {
      $query .= " and a.shop_id={$shop_id}";
    }
    if ($cat != 'all' && $cat != 'ALL' && $cat != 'wish' && $cat != 'WISH') {
      $category = '';
      for ($i = 0; $i < 3; $i++) {
        $c = substr($cat, 2 * $i, 2);
        if ($c == '00') {
          break;
        }
        $category .= $c;
      }
      $category .= '%';
      $query .= " and a.product_code like '{$category}'";
    }
    
    if ($order_col == 'best' || $order_col == 'best2' || $order_col == 'new' || $order_col == 'recommend') {
      $query .= " and {$order_col} > ${order_start}";
    }

    if (isset($item_name) && strlen($item_name) > 0) {
      $query .= " and a.item_name like '%{$item_name}%'";
    }
    $query .= " order by {$order_col} {$order} limit {$offset},{$limit}";

    return $this->db->query($query)->result();
  }

//  function get_product_list($shop_id, $status, $item_name, $cat, $offset, $limit = 10, $order = 'desc', $order_col = 'product_id') {
//
//    $product_ids = $this->get_product_id_list($shop_id, $status, $item_name, $cat, $offset, $limit, $order, $order_col);
//    if (empty($product_ids)) {
//      return array();
//    }
//
//    $products = array();
//    foreach ($product_ids as $p) {
//      $products[] = $p->product_id;
//    }
//    $product_ids = implode(',', $products);
//
//    $query = <<<QUERY
//select * from shop_product where product_id in (${product_ids})
//QUERY;
//
//    return $this->db->query($query)->result();
//  }

  function get_product_total_count($shop_id, $status, $item_name, $cat) {
    $query = "select count(*) as count from shop_product_id where shop_id={$shop_id} and status={$status}";
    if ($cat != 'all' && $cat != 'ALL') {
      $category = '';
      for ($i = 0; $i < 3; $i++) {
        $c = substr($cat, 2 * $i, 2);
        if ($c == '00') {
          break;
        }
        $category .= $c;
      }
      $category .= '%';
      $query .= " and product_code like '{$category}'";
    }
    if (isset($item_name) && strlen($item_name) > 0) {
      $query .= " and item_name like '%{$item_name}%'";
    }
    return $this->db->query($query)->row()->count;
  }

  function get_product_status_str($status) {
    switch($status) {
      case SHOP_PRODUCT_STATUS_INIT: return '등록대기';
      case SHOP_PRODUCT_STATUS_REQUEST: return '승인요청';
      case SHOP_PRODUCT_STATUS_REJECT: return '반려';
      case SHOP_PRODUCT_STATUS_ON_SALE: return '판매중';
      case SHOP_PRODUCT_STATUS_STOP_SALE: return '판매중지';
      case SHOP_PRODUCT_STATUS_FINISH_SALE: return '판매종료';
    }
    return '';
  }
  function get_product_status_class($status) {
    switch($status) {
      case SHOP_PRODUCT_STATUS_INIT: return 'success';
      case SHOP_PRODUCT_STATUS_REQUEST: return 'purple';
      case SHOP_PRODUCT_STATUS_REJECT: return 'danger';
      case SHOP_PRODUCT_STATUS_ON_SALE: return 'success';
      case SHOP_PRODUCT_STATUS_STOP_SALE: return 'warning';
      case SHOP_PRODUCT_STATUS_FINISH_SALE: return 'default';
    }
    return '';
  }
  function get_product_shipping_free_str($free) {
    return $free ? '무료배송' : '조건부 무료배송';
  }

  function get_product_item_type_str($item_type) {
    switch($item_type) {
      case  SHOP_PRODUCT_ITEM_TYPE_GENERAL: return '일반상품';
      case  SHOP_PRODUCT_ITEM_TYPE_CUSTOM: return '주문제작';
    }
    return '';
  }
  function get_product_item_tax_str($item_tax) {
    switch($item_tax) {
      case  SHOP_PRODUCT_ITEM_NO_TAX: return '면세상품';
      case  SHOP_PRODUCT_ITEM_TAX: return '과세상품';
    }
    return '';
  }
  function get_product_item_shipping_days_str($item_shipping_days) {
    switch($item_shipping_days) {
      case  SHOP_PRODUCT_SHIPPING_CUSTOM: return '주문제작';
      case  SHOP_PRODUCT_SHIPPING_1_DAYS: return '1일';
      case  SHOP_PRODUCT_SHIPPING_2_DAYS: return '2일';
      case  SHOP_PRODUCT_SHIPPING_3_DAYS: return '3일';
    }
    return '';
  }

  function get_price_str($price) {
    return number_format($price);
  }
  
  function get_product_category_level($category) {
    $level = 0;
    for ($i = 0; $i < 3; $i++) {
      $c = substr($category, 2 * $i, 2);
      if ($c == '00') {
        break;
      }
      $level++;
    }
    return $level;
  }
  
  function get_product_category_str($category, $level = 0) {
    $prefix = $category;
    if ($prefix == 'main') {
      return 'main';
    } else if ($prefix == 'all' || $prefix == 'ALL') {
      return 'new';
    } else if ($level > 0) {
      $prefix = substr($category,0, 2*$level);
      $query = <<<QUERY
select cat_name from shop_product_category where cat_code like '{$prefix}%' and cat_level={$level}
QUERY;

      return $this->db->query($query)->row()->cat_name;
    } else {
      $prefix = substr($category,0, 2);
      if ($prefix == '01') {
        return 'yoga';
      } else if ($prefix == '02') {
        return 'vegan';
      } else if ($prefix == '03') {
        return 'healing';
      }
    }
    return '';
  }

  function alert_exit($msg, $relocate = '') {
    $echo = "<script>";
    $echo .= "alert('{$msg}');";
    if (isset($relocate) && !empty($relocate)) {
      $echo .= "window.location.href='{$relocate}';";
    }
    $echo .="</script>";
    echo $echo;
    exit;
  }

  function cart_on() {
    if ($this->session->userdata('user_login') == 'yes') {
      $user_id = $this->session->userdata('user_id');
      $query = <<<QUERY
select count(*) as cnt from shop_cart where user_id={$user_id}
QUERY;
      $cart_on = $this->db->query($query)->row()->cnt;
    } else {
      $session_id = $this->get_session_id();
      $query = <<<QUERY
select count(*) as cnt from shop_cart where session_id='{$session_id}'
QUERY;
      $cart_on = $this->db->query($query)->row()->cnt;
    }
    return $cart_on;
  }

  function get_session_id() {
   return  $this->session->__get('session_id');
  }

  function get_session_ip() {
    return  $_SERVER['REMOTE_ADDR'];
  }

  function do_teacher_activate($teacher_id, $user_id, $activate) {

    $teacher_data = $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row();
    if ($teacher_data->activate == $activate) {
      return false;
    }
    
    if ($activate == 1) {
      $teacher_cnt = 'teacher_cnt + 1';
    } else {
      $teacher_cnt = 'teacher_cnt - 1';
    }

    $upd = array(
      'activate' => $activate
    );
    $where = array(
      'teacher_id' => $teacher_id
    );

    $this->db->update('teacher', $upd, $where);
    $this->db->update('teacher_video', $upd, $where);
    $this->db->update('center_teacher', $upd, $where);

    $teacher_name = $teacher_data->name;
    if ($activate != 1) {
      $teacher_name = 'Unknown';
    }
    $upd = array(
      'teacher_name' => $teacher_name,
      'activate' => $activate
    );
    $this->db->update('center_schedule', $upd, $where);

    $centers = $this->db->get_where('center_teacher', array('teacher_id' => $teacher_id))->result();
    if (!empty($centers) && count($centers) > 0) {
      $center_ids = array();
      foreach ($centers as $c) {
        $center_ids[] = $c->center_id;
      }
      $this->db->where_in('center_id', $center_ids);
      $this->db->set('teacher_cnt', $teacher_cnt, false);
      $this->db->update('center');
    }

//    $query = <<<QUERY
//UPDATE center set teacher_cnt={$teacher_cnt}
//where center_id in (select center_id from center_teacher where teacher_id={$teacher_id})
//QUERY;
//    $this->db->query($query);

    $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();

    if ($activate == 1) {
      $user_type = ($user_data->user_type | USER_TYPE_TEACHER);
      $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
    } else {
      $user_type = ($user_data->user_type & ~USER_TYPE_TEACHER);
      $query = <<<QUERY
UPDATE user set user_type={$user_type} where user_id={$user_id}
QUERY;
    }

    $this->db->query($query);

    return true;
  }

  function delete_teacher_data($user_data) {
    $teacher_id = $user_data->teacher_id;

    $this->db->delete('center_teacher', array('teacher_id' => $teacher_id));
    $this->db->delete('center_schedule', array('teacher_id' => $teacher_id));

    $query = <<<QUERY
delete from teacher_video_category a where video_id in (select video_id from teacher_video where teacher_id={$teacher_id})
QUERY;
    $this->db->query($query);

    $this->db->delete('teacher_video', array('teacher_id' => $teacher_id));
    $this->db->delete('teacher', array('teacher_id' => $teacher_id));
  }
  
  function user_register_validation($email, $password1, $password2)
  {
    $user_data = $this->db->get_where('user', array('email' => $email))->row();
    if (isset($user_data) == true && empty($user_data) == false) {
      if ($user_data->unregister == 0) {
        $result['status'] = 'fail';
        $result['message'] = "중복된 이메일이 존재합니다.";
        echo json_encode($result);
        exit;
      } else {
        $result['status'] = 'fail';
        $result['message'] = "탈퇴한 회원입니다. 계정 복원 / 삭제를 원하시면 해당 이메일로 로그인해주세요.";
        echo json_encode($result);
        exit;
      }
    }
  
    if ($password1 != $password2) {
      $result['status'] = 'fail';
      $result['message'] = "입력하신 비밀번호가 일치하지 않습니다.";
      echo json_encode($result);
      exit;
    }
  
    $r = $this->check_pw($password1);
    if ($r[0] == false) {
      $result['status'] = 'fail';
      $result['message'] = $r[1];
      echo json_encode($result);
      exit;
    }
  }
  
  function check_pw($pw)
  {
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
//    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
    $kor = preg_match("/[\xE0-\xFF][\x80-\xFF][\x80-\xFF]/", $pw);

    if ($kor == 1) {
      return array(false, "비밀번호는 한글을 사용하실 수 없습니다.");
    }
    
    if(strlen($pw) < 8 || strlen($pw) > 30) {
      return array(false,"비밀번호는 영문, 숫자를 혼합하여 최소 8자리 ~ 최대 30자리 이내로 입력해주세요.");
    }
    
    if(preg_match("/\s/u", $pw) == true) {
      return array(false, "비밀번호는 공백없이 입력해주세요.");
    }
    
    if( $num == 0 || $eng == 0) {
      return array(false, "영문, 숫자를 혼합하여 입력해주세요.");
    }
    
    return array(true, '');
  }
  
  function get_list_page_num($total_cnt, $size, $page)
  {
    $num['total'] = (int)($total_cnt / $size) + ($total_cnt % $size > 0 ? 1 : 0);
    $num['prev'] = $page > 1 ? $page - 1 : 0;
    $num['next'] = $num['total'] > $page ? $page + 1 : 0;
    return $num;
  }
  
  function get_user_auth_type_str($type) {
    switch ($type) {
      case USER_AUTH_TYPE_NICE_CHECK_PLUS_SAFE: return '나이스 안심인증';
    }
    return '';
  }
}
