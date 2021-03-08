<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Teacher_model extends CI_Model
{
  const TEACHER_VIDEO_PAGE_SIZE = 10;
  const FIND_TEACHER_PAGE_SIZE = 10;
  
  function __construct()
  {
    parent::__construct();
  }
  
  function get_img_web_path()
  {
    return base_url().'uploads/teacher_image/';
  }
  function get_img_path()
  {
    return '/web/public_html/uploads/teacher_image/';
  }
  function get_teacher_image_thumb()
  {
    $idx = rand(1,3);
    return base_url().'template/img/teacher/teacher_'.$idx.'_thumb.jpeg';
  }
  function get_teacher_image()
  {
    $idx = rand(1,3);
    return base_url().'template/img/teacher/teacher_'.$idx.'.png';
  }
  
  function get($teacher_id) {
    return $this->db->get_where('teacher', array('teacher_id' => $teacher_id))->row();
  }
  
  function get_list($limit, $offset, $order_col, $order, $where = array()) {
    if (count($where) > 0) {
      $this->db->where($where);
    }
    $this->db->order_by($order_col, $order);
    $this->db->limit($limit, $offset);
    return $this->db->get('teacher')->result();
  }
  
  function get_bookmarked($user_id, $teacher_id) {
    return $this->db->select('count(*) as cnt')->where(array('user_id' => $user_id,'teacher_id' => $teacher_id))->
    get('bookmark_teacher')->row()->cnt;
  }
  
  function update($teacher_id, $name, $about, $youtube, $instagram, $category_etc, $categories, $profile_image_url, $no_profile_image)
  {
    if (empty($youtube) && empty($instagram)) {
      echo ("<script>alert('유튜브와 인스타그램 중 최소 하나는 입력해주세요');</script>");
      exit;
    }
    
    if (!empty($category_etc)) {
      if (isset($categories) && count($categories)) {
        $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
      } else {
        $categories = explode(' ', trim($this->input->post('category_etc')));
      }
    }
    
    if (!empty($categories) && count($categories)) {
      $categories = array_filter(array_map('trim', $categories));
    }
    
    if (empty($categories) || count($categories) == 0) {
      echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
      exit;
    }
    
    $cats = $this->db->get_where('teacher_category', array('teacher_id' => $teacher_id))->result();
    $already_categories = array();
    foreach ($cats as $c) {
      $already_categories[] = $c->category;
    }
    
    // insert category
    $diff_cats = array_diff($categories, $already_categories);
//        $diff_cats = json_encode($diff_cats);
//        echo("<script>alert('{$diff_cats}');</script>");
//        exit;
    
    foreach ($diff_cats as $c) {
      $ins = array(
        'teacher_id' => $teacher_id,
        'category' => $c
      );
      $this->db->insert('teacher_category', $ins);
    }
    
    // del category
    $diff_cats = array_diff($already_categories, $categories);
    foreach ($diff_cats as $c) {
      $del = array(
        'teacher_id' => $teacher_id,
        'category' => $c
      );
      $this->db->delete('teacher_category', $del);
    }
    
    $upd = array(
//      'name' => $name,
      'about' => $about,
      'youtube' => $youtube,
      'instagram' => $instagram,
    );
    if ($no_profile_image == true || $profile_image_url != null) {
      $this->db->set('profile_image_url', $profile_image_url);
    }
    $where = array (
      'teacher_id' => $teacher_id
    );
    $this->db->update('teacher', $upd, $where);
  }
  
  function get_categories($teacher_id)
  {
    $category_data = array();
    $categories = $this->db->get_where('teacher_category', array('teacher_id' => $teacher_id))->result();
    foreach ($categories as $c) {
      $category_data[] = $c->category;
    }
    
    $categories = array();
    $category_class = $this->db->get_where('category_class', array('activate' => 1))->result();
    foreach ($category_class as $c) {
      $categories[] = $c->name;
    }
    
    $category_etc = '';
    $categories = array_values(array_diff($category_data, $categories));
    foreach ($categories as $c) {
      $category_etc .= $c.' ';
    }
    
    return array($category_data, $category_etc);
  }
  
  function get_video_categories($video_id)
  {
    $category_data = array();
    $categories = $this->db->get_where('teacher_video_category', array('video_id' => $video_id))->result();
    foreach ($categories as $c) {
      $category_data[] = $c->category;
    }
    
    $categories = array();
    $category_class = $this->db->get_where('category_class', array('activate' => 1))->result();
    foreach ($category_class as $c) {
      $categories[] = $c->name;
    }
    
    $category_etc = '';
    $categories = array_values(array_diff($category_data, $categories));
    foreach ($categories as $c) {
      $category_etc .= $c.' ';
    }
    
    return array($category_data, $category_etc);
  }
  function get_teacher_video($teacher_id, $limit = 10, $offset = 0, $order = 'desc')
  {
    $this->db->limit($limit, $offset);
    $this->db->order_by('video_id', $order);
    return $this->db->get_where('teacher_video', array('teacher_id' => $teacher_id, 'activate' => 1))->result();
    
  }
  
  function register_youtube($teacher, $title, $desc, $video_url, $categories, $category_etc)
  {
    if (!empty($category_etc)) {
      if (isset($categories) && count($categories)) {
        $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
      } else {
        $categories = explode(' ', trim($this->input->post('category_etc')));
      }
    }
    
    if (!empty($categories) && count($categories)) {
      $categories = array_filter(array_map('trim', $categories));
    }

//                $categories = json_encode(($this->input->post('category_etc')));
//                $categories = json_encode($categories);
//                print_r($categories);
//                echo "<script>alert('{$categories}')</script>";
//                exit;
    
    if (empty($categories) || count($categories) == 0) {
      echo ("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
      exit;
    }
    if (count($categories) > 3) {
      echo("<script>alert('수업 분류는 최대 3가지만 선택 가능합니다');</script>");
      exit;
    }
    
    /* parsing to extract youtube video id from video url */
    $reg_exp = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
    preg_match($reg_exp, $video_url, $matches);
    $youtube_id = $matches[7];
    
    /* get video info */
    $content = file_get_contents("https://youtube.com/get_video_info?video_id=".$youtube_id);
    parse_str($content, $data);
    $result = json_decode($data['player_response']);

//        echo "아이디 : ".$result->videoDetails->videoId;
//        echo "채널아이디: ".$result->videoDetails->channelId;
//        echo "제목 : ".$result->videoDetails->title;
//        echo "설명 : ".$result->videoDetails->shortDescription;
//        echo "올린 사람 : ".$result->videoDetails->author;
//        echo "조회수: ".$result->videoDetails->viewCount;
//        echo "동영상 길이 : ".$result->videoDetails->lengthSeconds;
//        echo "키워드: ".json_encode($result->videoDetails->keywords);
//        echo "썸네일 갯수: ".count($result->videoDetails->thumbnail->thumbnails);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[0]);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[1]);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[2]);
//        echo "썸네일: ".json_encode($result->videoDetails->thumbnail->thumbnails[3]);
    
    $youtube_url = "https://www.youtube.com/embed/".$youtube_id;
    
    $ins = array(
      'teacher_id' => $teacher->teacher_id,
      'title' => $title,
      'video_url' => $youtube_url,
      'desc' => $desc,
      'thumbnail_image_url' => $result->videoDetails->thumbnail->thumbnails[3]->url,
      'playtime' => $result->videoDetails->lengthSeconds,
      'activate' => 1,
      'yt_info' => $data['player_response']
    );
    $this->db->insert('teacher_video', $ins);
    
    $video_id = $this->db->insert_id();
    
    foreach ($categories as $cat) {
      $cat = trim($cat);
      $this->db->insert('teacher_video_category', array('video_id' => $video_id, 'category' => $cat));
    }
    
    $this->update_profile($teacher->teacher_id);
  }
  
  function unregister_video($video_id, $teacher_id)
  {
    $this->db->delete('teacher_video_category', array('video_id' => $video_id));
    $this->db->delete('teacher_video', array('video_id' => $video_id, 'teacher_id' => $teacher_id));
  }
  
  function update_youtube($video_id, $title, $desc, $categories, $category_etc)
  {
    if (!empty($category_etc)) {
      if (isset($categories) && count($categories)) {
        $categories = array_merge($categories, explode(' ', trim($this->input->post('category_etc'))));
      } else {
        $categories = explode(' ', trim($this->input->post('category_etc')));
      }
    }
    
    if (!empty($categories) && count($categories)) {
      $categories = array_filter(array_map('trim', $categories));
    }
    
    if (empty($categories) || count($categories) == 0) {
      echo("<script>alert('최소 하나의 분류를 선택해주세요');</script>");
      exit;
    }
    if (count($categories) > 3) {
      echo("<script>alert('수업 분류는 최대 3가지만 선택 가능합니다');</script>");
      exit;
    }
    
    $cats = $this->db->get_where('teacher_video_category', array('video_id' => $video_id))->result();
    $already_categories = array();
    foreach ($cats as $c) {
      $already_categories[] = $c->category;
    }
    
    // insert category
    $diff_cats = array_diff($categories, $already_categories);
//        $diff_cats = json_encode($diff_cats);
//        echo("<script>alert('{$diff_cats}');</script>");
//        exit;
    
    foreach ($diff_cats as $c) {
      $ins = array(
        'video_id' => $video_id,
        'category' => $c
      );
      $this->db->insert('teacher_video_category', $ins);
    }
    
    // del category
    $diff_cats = array_diff($already_categories, $categories);
    foreach ($diff_cats as $c) {
      $del = array(
        'video_id' => $video_id,
        'category' => $c
      );
      $this->db->delete('teacher_video_category', $del);
    }
    
    $upd = array(
      'title' => $title,
      'desc' => $desc
    );
    $where = array(
      'video_id' => $video_id
    );
    $this->db->update('teacher_video', $upd, $where);
  }
  
  function get_video($teacher_id, $video_id)
  {
    return $this->db->get_where('teacher_video', array('teacher_id' => $teacher_id, 'video_id' => $video_id, 'activate' => 1))->row();
  }
  
  function update_profile($teacher_id)
  {
    $this->db->where('teacher_id', $teacher_id);
    $this->db->set('updated_at', 'NOW()', false);
    $this->db->update('teacher');
    $this->db->where('teacher_id', $teacher_id);
    $this->db->set('updated_at', 'NOW()', false);
    $this->db->update('teacher_category');
  }
  
}