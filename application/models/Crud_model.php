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
  function set_cookie($name, $value, $day = false)
  {
    $day = is_numeric($day) && $day > 0 ? (int)$day : 60;

    $cookie = array();
    $cookie['name'] = $name;
    $cookie['value'] = $value;
    $cookie['expire'] = $day * 86400;
    $cookie['path'] = '/';

    $this->input->set_cookie($cookie);
  }

  function delete_cookie($name)
  {
    $cookie = array();
    $cookie['name'] = $name;
    $cookie['value'] = '';
    $cookie['expire'] = '';
    $cookie['path'] = '/';

    //$this->input->set_cookie($cookie);
    setcookie($name, "", time() - 86400,'/');
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

  /////////Filter One/////////////
  function filter_one($table, $type, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($type, $value);
    return $this->db->get()->result_array();
  }

  // FILE_UPLOAD
  function img_thumb($type, $id, $ext = '.jpg', $width = '400', $height = '400')
  {
    $this->load->library('image_lib');
    ini_set("memory_limit", "-1");

    $config1['image_library'] = 'gd2';
    $config1['create_thumb'] = TRUE;
    $config1['maintain_ratio'] = TRUE;
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
  function file_up($name, $type, $id, $multi = '', $no_thumb = '', $ext = '.jpg', $width = '400', $height = '400')
  {
    $upload_path = '/web/public_html/uploads/'.$type.'_image/';
    // 원인은 모르겠고 upload path를 미리 만들어서 퍼미션을 주자
//    $rc = is_dir($upload_path);
//    if (!isset($rc) || $rc == false) {
//      if (@mkdir($upload_path, 0777)) {
//        @chmod($upload_path, 0777);
//      }
//    }
    if ($multi == '') {
      $file_name = $type.'_'.$id.$ext;
      $file_path = $upload_path.$file_name;
      $rc = move_uploaded_file($_FILES[$name]['tmp_name'], $file_path);
      if ($rc == false) {
        echo "fail : move_uploaded_file";
        exit;
      }
      if ($no_thumb == '') {
        $this->crud_model->img_thumb($type, $id, $ext, $width, $height);
      }
    } elseif ($multi == 'multi') {
      $ib = 1;
      foreach ($_FILES[$name]['name'] as $i => $row) {
        $ib = $this->file_exist_ret($type, $id, $ib);
        move_uploaded_file($_FILES[$name]['tmp_name'][$i], $upload_path.'uploads/'.$type.'_image/'.$type.'_'.$id.'_'.$ib.$ext);
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

  function file_up_from_urls($urls, $type, $id,$no_thumb = '')
  {
    $ib = 1;
    foreach ($urls as $url) {
      $ext = '.'.pathinfo($url, PATHINFO_EXTENSION);
      $ib = $this->file_exist_ret2($type, $id, $ib,$ext);

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

  function get_like_icon($liked)
  {
    if ($liked == true) {
      return base_url().'uploads/icon_0504/icon04_heart.png';
    }
    return base_url().'uploads/icon_0504/icon03_heart.png';
  }

  function get_bookmark_icon($bookmarked)
  {
    if ($bookmarked == true) {
      return base_url().'uploads/icon_0504/icon06_scrap.png';
    }
    return base_url().'uploads/icon_0504/icon05_scrap.png';
  }

  function get_default_profile_img()
  {
    return base_url().'uploads/icon_0504/icon08_profile.png';
  }

  function sns_func_html($func_type, $find_type, $is_do, $id, $w, $h)
  {
    $action = $is_do ? 'undo' : 'do';
    if ($func_type == 'like') {
      $img_src = $this->crud_model->get_like_icon($is_do);
    } else {
      $img_src = $this->crud_model->get_bookmark_icon($is_do);
    }
    return "<a href='javascript:void(0)' data-action='{$action}' onclick=\"sns_function('{$func_type}','{$find_type}',{$id},$(this))\">".
      "<img id='{$find_type}-{$func_type}-{$id}' src='{$img_src}' alt='' style='width:{$w}px !important; height: {$h}px !important;'></a>";
  }

  function get_sns_mark($type, $func, $user_id, $id)
  {
    // type -  class, teacher, center ...
    // func - bookmark, like ...
    $id_col = $type.'_id';
    if ($type == 'class') {
      $id_col = 'video_id';
    }
    $query = <<<QUERY
select count(*) as cnt from {$func}_{$type} where user_id={$user_id} and {$id_col}={$id}
QUERY;
    $marked = $this->db->query($query)->row()->cnt;
    return $marked;
  }
}
