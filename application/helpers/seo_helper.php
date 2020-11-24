<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SEO Helper
 *
 * Generates Meta tags for search engines optimizations, open graph, twitter, robots
 *
 * @author		Elson Tan (elsodev.com, Twitter: @elsodev)
 * @version     1.0
 */

/**
 * SEO General Meta Tags
 *
 * Generates general meta tags for description, open graph, twitter, robots
 * Using title, description and image link from config file as default
 *
 * @access  public
 * @param   array   enable/disable different meta by setting true/false
 * @param   string  Title
 * @param   string  Description (155 characters)
 * @param   string  Image URL
 * @param   string  Page URL
 */

if(! function_exists('meta_tags')){
  function meta_tags($enable = array('general' => true, 'og'=> true, 'twitter'=> true, 'robot'=> true),
                     $title = '', $desc = '', $imgurl ='', $url = ''){
    $CI =& get_instance();
    $CI->config->load('seo');
    
    $output = '';
    
    //uses default set in config/seo.php
    $seo_title = $title;
    if($title == ''){
      $seo_title = $CI->config->item('seo_title');
    }
    $seo_desc = $desc;
    if($desc == ''){
      $seo_desc = $CI->config->item('seo_desc');
    }
    $author = $CI->config->item('seo_author');
    $keywords = $CI->config->item('seo_keywords');
  
    if($enable['general']){
      $output .= '<title>'.$seo_title.'</title>';
      $output .= '<meta charset="UTF-8">';
      $output .= '<meta name="revisit-after" content="2 days">';
      $output .= '<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />';
      $output .= '<meta name="description" content="'.$seo_desc.'" />';
      $output .= '<meta name="keywords" content="'.$keywords.'" />';
      $output .= '<meta name="author" content="'.$author.'" />';
    }
  
    if($enable['robot']){
      $output .= '<meta name="robots" content="index,follow"/>';
    } else {
      $output .= '<meta name="robots" content="noindex,nofollow"/>';
    }
  
    // open graph
    // for debugging(https://developers.facebook.com/tools/debug/)
    //<meta property="og:url" content="https://winedb.kr/">
    //<meta property="og:type" content="website">
    //<meta property="og:title" content="WineDB.kr">
    //<meta property="og:image" content="//winedb.kr/theme/smarty/usr_img/hero-img.jpg">
    //<meta property="og:description" content="국내 수입 와인의 검역통과 현황과 가격을 공유할 수 있는 와인DB.kr 와인DB">
    
    $og_title = $title;
    if ($title == '') {
      $og_title = $CI->config->item('og_title');
    }
    $og_desc = $desc;
    if ($desc == '') {
      $og_desc = $CI->config->item('og_desc');
    }
    $og_imgurl = $imgurl;
    if($imgurl == ''){
      $og_imgurl = $CI->config->item('og_imgurl');
      $width = 800;
      $height = 400;
      $image_type = 'image/png';
    } else {
      $width = 400;
      $height = 400;
      $image_type = 'image/jpeg';
    }
    if($url == ''){
      $url = base_url();
    }
    
    if($enable['og']){
      $output .= '<meta property="og:title" content="'.$og_title.'"/>'
        .'<meta property="og:type" content="website"/>'
        .'<meta property="og:description" content="'.$og_desc.'"/>'
        .'<meta property="og:image" content="'.$og_imgurl.'"/>'
        .'<meta property="og:image:width" content="'.$width.'"/>'
        .'<meta property="og:image:height" content="'.$height.'"/>'
        .'<meta property="og:image:type" content="'.$image_type.'"/>'
        .'<meta property="og:url" content="'.$url.'"/>';
    }
    
    //twitter card
    if($enable['twitter']){
      $output .= '<meta name="twitter:card" content="summary"/>'
        .'<meta name="twitter:title" content="'.$title.'"/>'
        .'<meta name="twitter:url" content="'.$url.'"/>'
        .'<meta name="twitter:description" content="'.$desc.'"/>'
        .'<meta name="twitter:image" content="'.$imgurl.'"/>';
    }
    
    echo $output;
  }
}
