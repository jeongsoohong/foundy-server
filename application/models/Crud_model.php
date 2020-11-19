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
  
  function do_register($email, $password, $account) {
    $ins = array(
      'user_type' => USER_TYPE_GENERAL,
      'username' => '',
      'nickname' => '',
      'gender' => '',
      'email' => $email,
      'phone' => '',
      'kakao_thumbnail_image_url' => '',
      'kakao_profile_image_url' => '',
      'profile_image_url' => '',
      'password' => (empty($password) == true ? '' : sha1($password)),
      'unregister' => 0,
    );
  
    $this->db->set('create_at', 'NOW()', false);
    $this->db->set('last_login_at', 'NOW()', false);
    $this->db->insert('user', $ins);
  
    if ($this->db->affected_rows() <= 0) {
      $result['status'] = 'fail';
      $result['message'] = '관리자에게 문의 바랍니다(not inserted)';
      echo json_encode($result);
      exit;
    }
  
    $user_id = $this->db->insert_id();
    $user_data = $this->db->get_where('user', array('user_id' => $user_id))->row();
  
    $ins = array(
      'user_id' => $user_data->user_id,
      'account' => $account,
      'unregistered' => 0,
    );
    $this->db->set('register_at', 'NOW()', false);
    $this->db->insert('user_register',$ins);

    return $user_data;
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
      $user_type = USER_TYPE_GENERAL;
      $username = '';
      $nickname = $profile['nickname'];
      $gender = $kakao_account['gender'];
      $kakao_thumbnail_image_url = $profile['thumbnail_image_url'];
      $kakao_profile_image_url = $profile['profile_image_url'];
      $profile_image_url = '';
      $password = '';
//          $create_at = $connected_at;
    
      if ($kakao_account['has_phone_number'] == true) {
        $phone = $kakao_account['phone_number'];
      } else {
        $phone = '';
      }
    
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
    
      $result['status'] = 'success';
      $result['message'] = "첫 방문을 환영합니다.";
    
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
    
      if ($kakao_account['has_phone_number'] == true) {
        $phone = $kakao_account['phone_number'];
        $this->db->set('phone', $phone);
      }
    
      $this->db->set('last_login_at', 'NOW()', false);
      $this->db->where('user_id', $user_data->user_id);
      $this->db->update('user');
    
    }
  
    $this->load->library('user_agent');

    $ins = array(
      'user_id' => $user_data->user_id,
      'kakao_id' => $user_data->kakao_id,
      'account' => json_encode($kakao_account),
      'session_id' => $this->crud_model->get_session_id(),
      'ip' => $this->crud_model->get_session_ip(),
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
        $this->crud_model->img_thumb($type, $id, $ext, $width, $height);
      }
    } elseif ($multi == 'multi') {
      $ib = 1;
      foreach ($_FILES[$name]['name'] as $i => $row) {
        $ib = $this->file_exist_ret($type, $id, $ib);
        move_uploaded_file($_FILES[$name]['tmp_name'][$i], $upload_path . 'uploads/' . $type . '_image/' . $type . '_' . $id . '_' . $ib . $ext);
        if ($no_thumb == '') {
          $this->crud_model->img_thumb($type, $id . '_' . $ib, $ext, $width, $height);
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
              $this->crud_model->img_thumb($type, $id . '_' . $ib, $ext);
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
        $this->crud_model->img_thumb($type, $id . '_' . $ib, $ext);
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
      $num = $this->crud_model->get_type_name_by_id($type, $id, 'num_of_imgs');
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
      $num = $this->crud_model->get_type_name_by_id($type, $id, 'num_of_imgs');
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
            $return .= $this->crud_model->get_type_name_by_id($condition, $row, $c_match);
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
            $return .= $this->crud_model->get_type_name_by_id($condition, $row, $c_match);
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
            $return .= $this->crud_model->get_type_name_by_id($condition, $row, $c_match);
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
            $return .= $this->crud_model->get_type_name_by_id($condition, $row, $c_match);
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
    $name = url_title($this->crud_model->get_type_name_by_id('blog', $blog_id, 'title'));
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
    if ($liked == true) {
      return base_url() . 'uploads/shop/heart_do.png';
    }
    return base_url() . 'uploads/shop/heart_undo.png';
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
      $img_src = $this->crud_model->get_like_icon($is_do);
    } else {
      $img_src = $this->crud_model->get_bookmark_icon($is_do);
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

  function get_product_list($shop_id, $status, $item_name, $cat, $offset, $limit = 10, $order = 'desc', $order_col = 'product_id', $user_id = 0) {
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
    
    if ($order_col == 'best' || $order_col == 'recommend') {
      $query .= " and {$order_col} > 0";
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

  function get_shipping_req_str($type) {
   switch($type) {
     case SHOP_SHIPPING_REQ_DEFAULT : return '배송시 요청 사항을 선택해 주세요.';
     case SHOP_SHIPPING_REQ_IN_FRONT_OF_DOOR : return '부재시 문 앞에 놓아 주세요.';
     case SHOP_SHIPPING_REQ_OFFICE : return '부재시 경비실에 맡겨 주세요.';
     case SHOP_SHIPPING_REQ_PHONE_OR_SMS : return '부재시 전화 또는 문자 주세요.';
     case SHOP_SHIPPING_REQ_PHONE_BEFORE_SHIPPING : return '배송 전에 연락주세요.';
     case SHOP_SHIPPING_REQ_DIRECT_INPUT : return '직접입력';
   }
   return '';
  }

  function get_purchase_status_str($status) {
    switch($status) {
      case SHOP_PURCHASE_STATUS_PREPARED : return '구매 준비';
      case SHOP_PURCHASE_STATUS_PURCHASING: return '구매중';
      case SHOP_PURCHASE_STATUS_PAYING: return '결제중';
      case SHOP_PURCHASE_STATUS_PAYING_CANCELED: return '결제중 취소';
      case SHOP_PURCHASE_STATUS_CONFIRM_SUCCESS: return '결제 확인 성공';
      case SHOP_PURCHASE_STATUS_CONFIRM_FAIL: return '결제 확인 실패';
      case SHOP_PURCHASE_STATUS_DONE_SUCCESS: return '결제 검증 성공';
      case SHOP_PURCHASE_STATUS_DONE_FAIL: return '결제 검증 실패';
      case SHOP_PURCHASE_STATUS_COMPLETED: return '결제 완료';
      case SHOP_PURCHASE_STATUS_PART_CANCELED: return '부분 결제취소';
      case SHOP_PURCHASE_STATUS_ALL_CANCELED: return '전체 결제취소';
    }
    return '';
  }

  function get_shipping_status_str($status) {
    switch ($status) {
      case SHOP_SHIPPING_STATUS_WAIT: return '입금대기';
      case SHOP_SHIPPING_STATUS_ORDER_COMPLETED: return '주문완료';
      case SHOP_SHIPPING_STATUS_ORDER_CANCELED: return '주문취소';
      case SHOP_SHIPPING_STATUS_PREPARE: return '배송준비중';
      case SHOP_SHIPPING_STATUS_IN_PROGRESS: return '배송중';
      case SHOP_SHIPPING_STATUS_COMPLETED: return '배송완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED: return '구매완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_CANCELED: return '반품완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_CANCELING: return '반품중';
      case SHOP_SHIPPING_STATUS_PURCHASE_CHANGED: return '교환완료';
      case SHOP_SHIPPING_STATUS_PURCHASE_CHANGING: return '교환중';
    }
  }

  function get_order_req_type_str($type) {
    switch ($type) {
      case SHOP_ORDER_REQ_TYPE_DEFAULT : return '기본';
      case SHOP_ORDER_REQ_TYPE_CANCEL: return '주문취소';
      case SHOP_ORDER_REQ_TYPE_CHANGE: return '교환';
      case SHOP_ORDER_REQ_TYPE_RETURN: return '반품';
    }
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
    if (activate != 1) {
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
  
  function get_coupon_user_type_str($type) {
    switch ($type) {
      case COUPON_USER_TYPE_DEFAULT: return '적용회원';
      case COUPON_USER_TYPE_REGISTER: return '회원가입';
    }
    return '';
  }
  function get_coupon_type_str($type) {
    switch ($type) {
      case COUPON_TYPE_DEFAULT: return '쿠폰타입';
      case COUPON_TYPE_SHOP_DISCOUNT_PRICE: return '샵할인금액';
      case COUPON_TYPE_SHOP_DISCOUNT_PERCENT: return '샵할인율';
    }
    return '';
  }
  
  function cancel_payment($purchase_product_id, $cancel_reason, $shipping_status, $user_cancel, $auth_code)
  {
    $purchase_product = $this->db->get_where('shop_purchase_product', array('purchase_product_id' => $purchase_product_id))->row();
    $purchase_info = $this->db->get_where('shop_purchase', array('purchase_id' => $purchase_product->purchase_id))->row();
  
    if (empty($purchase_product) || empty($purchase_info)) {
      $this->crud_model->alert_exit('잘못된 접근입니다.', base_url());
    }
    
    // confirm user_id & session_id
    if ($purchase_info->user_id > 0) {
      if ($this->session->userdata('user_login') != 'yes') {
        $this->crud_model->alert_exit('잘못된 접근입니다.', base_url());
      }
      $user_id = $this->session->userdata('user_id');
      if ($purchase_info->user_id != $user_id) {
        $this->crud_model->alert_exit('잘못된 접근입니다.', base_url());
      }
    } else if ($purchase_info->session_id > 0) {
      if ($purchase_info->session_id != $auth_code) {
        $this->crud_model->alert_exit('잘못된 접근입니다.', base_url());
      }
    } else {
        $this->crud_model->alert_exit('잘못된 접근입니다.', base_url());
    }

    // confirm shipping_status
    if ($user_cancel == true && $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PREPARE && $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_ORDER_COMPLETED) {
      $status = $this->crud_model->get_shipping_status_str($purchase_product->shipping_status);
      $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(주문상태:'.$status.')',
        base_url()."home/shop/order/detail?c={$purchase_info->purchase_code}&a={$auth_code}");
    }
    if ($user_cancel == false && $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PREPARE && $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_ORDER_COMPLETED && $purchase_product->shipping_status != SHOP_SHIPPING_STATUS_PURCHASE_CANCELING) {
      $status = $this->crud_model->get_shipping_status_str($purchase_product->shipping_status);
      $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(주문상태:'.$status.')',
        base_url()."home/shop/order/detail?c={$purchase_info->purchase_code}&a={$auth_code}");
    }
    if ($purchase_info->status == SHOP_PURCHASE_STATUS_ALL_CANCELED) {
      $status = $this->crud_model->get_purchase_status_str($purchase_info->status);
      $this->crud_model->alert_exit('주문취소가 불가능한 상태입니다. 관리자에게 문의해주세요.(결제상태:'.$status.')',
        base_url()."home/shop/order/detail?c={$purchase_info->purchase_code}&a={$auth_code}");
    }
  
    $url = 'https://api.bootpay.co.kr/request/token';
    $app_key = '5ee197af8f0751001e4f2565';
    $private_key = 'e5KGzIH4VAY4FU1gY3o3AekqPk2AzF1fFaVx47MhI2Q=';
  
    $post_data = array(
      'application_id' => $app_key,
      'private_key' => $private_key
    );
//        $params = sprintf( 'application_id=%s&private_key=%s', $app_key, $private_key);
  
    $opts = array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => http_build_query($post_data), // $params 처럼
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
    );
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $result = json_decode(curl_exec($ch));
  
    if ($result->status != 200) {
      $this->crud_model->alert_exit('토큰에 문제가 발생했습니다. 관리자에게 문의바랍니다.(1)');
    }
  
    $access_token = $result->data->token;
  
    $url = 'https://api.bootpay.co.kr/cancel';
    $post_data = array(
      'receipt_id' => $purchase_info->receipt_id,
      'name' => $purchase_info->sender_name.'('.$purchase_info->sender_email.')',
      'reason' => $cancel_reason,
      'cancel_id' => $purchase_product_id,
      'price' => $purchase_product->total_balance - $purchase_product->discount,
    );
  
    $opts = array(
      CURLOPT_URL => $url,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => http_build_query($post_data),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array("Authorization: ".$access_token)
    );
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $result = json_decode(curl_exec($ch));
  
    curl_close($ch);
  
    if ($result->status != 200) {
      $this->crud_model->alert_exit(json_encode($result));
    }
  
    $request_cancel_price = $result->data->request_cancel_price;
    $remain_price = $result->data->remain_price;
    $canceled_price = $result->data->cancelled_price;
    
    $reason = array();
    if (empty($purchase_info->cancel_reason) == false) {
      $reason = json_decode($purchase_info->cancel_reason);
    }
    $reason[] = $cancel_reason;
  
    $status = SHOP_PURCHASE_STATUS_ALL_CANCELED;
    if ($remain_price > 0) {
      $status = SHOP_PURCHASE_STATUS_PART_CANCELED;
    }
  
    $cancel_data = array();
    if (empty($purchase_info->cancel_reason) == false) {
      $cancel_data = json_decode($purchase_info->cancel_data);
    }
    $cancel_data[] = json_encode($result, JSON_UNESCAPED_UNICODE);
  
    $upd = array(
      'cancel_price' => $canceled_price,
      'cancel_reason' => json_encode($reason, JSON_UNESCAPED_UNICODE),
      'cancel_data' => json_encode($cancel_data, JSON_UNESCAPED_UNICODE),
      'status' => $status,
      'status_code' => $this->crud_model->get_purchase_status_str($status),
    );
    $this->db->set('canceled_at', 'NOW()', false);
    $this->db->where('purchase_id', $purchase_info->purchase_id);
    $this->db->update('shop_purchase', $upd);
  
    $upd = array(
      'canceled' => 1,
      'cancel_price' => $request_cancel_price,
      'cancel_data' => json_encode($result, JSON_UNESCAPED_UNICODE),
      'cancel_reason' => $cancel_reason,
      'shipping_status' => $shipping_status,
      'shipping_status_code' => $this->crud_model->get_shipping_status_str($shipping_status),
    );
    $this->db->set('canceled_at', 'NOW()', false);
    $this->db->where('purchase_product_id', $purchase_product_id);
    $this->db->update('shop_purchase_product', $upd);
  
    $ins = array(
      'purchase_product_id' => $purchase_product_id,
      'shipping_status' => $shipping_status,
      'shipping_status_code' => $this->crud_model->get_shipping_status_str($shipping_status),
      'shipping_data' => json_encode($result, JSON_UNESCAPED_UNICODE),
    );
    $this->db->set('modified_at', 'NOW()', false);
    $this->db->insert('shop_purchase_product_status', $ins);
    
    $this->db->set('sell', 'sell-1', false);
    $this->db->where('product_id', $purchase_product->product_id);
    $this->db->update('shop_product_id');
   
    // send push
    if ($purchase_info->user_id > 0) {
      $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}";
    } else {
      $redirect_url = base_url() . "home/shop/order/detail?c={$purchase_info->purchase_code}&a={$purchase_info->session_id}";
    }
    
    $title = '구매취소';
    if ($user_cancel) {
      $body = '주문하신 상품을 취소하였습니다. 주문내역을 확인해주세요.';
      $this->push->send_push_private($this->session, $title, $body, $redirect_url, null);
    } else {
      $body = '주문하신 상품이 취소되었습니다. 주문내역을 확인해주세요.';
      $app_data = $this->db->get_where('user_app', array('user_id' => $purchase_info->user_id))->row();
  
//      log_message('debug', '[push notification] req { title: '.$title.', body: '.$body.', user_id : '.$purchase_info->uesr_id.
//        ', app_data : '.json_encode($app_data));
      
      $this->push->send_push_private(null, $title, $body, $url, $app_data);
    }
  
    // send email
    $product_info = $this->db->get_where('shop_product', array('product_id' => $purchase_product->product_id))->row();
    $shop_info = $this->db->get_where('shop', array('shop_id' => $product_info->shop_id))->row();
    $this->email_model->get_user_shipping_status_data(
      $this->crud_model->get_shipping_status_str(SHOP_SHIPPING_STATUS_ORDER_CANCELED), $purchase_info->purchase_code,
      $shop_info->shop_name, $product_info->item_name, $purchase_info->sender_email, $redirect_url);
    if ($user_cancel) {
      $this->email_model->get_shop_shipping_status_data('구매취소', $purchase_info->purchase_code, $shop_info->shop_name,
        $product_info->item_name, $shop_info->email);
    }
  
    return $purchase_info->purchase_code;
  }
}
