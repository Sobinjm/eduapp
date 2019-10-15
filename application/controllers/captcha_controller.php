<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_Controller extends CI_Controller {

// Load Helper in and Start session.
function __construct() {
    $data='';
parent::__construct();
$this->load->helper('captcha');
// session_start();
}
// This function show values in view page and check captcha value.
public function form() {
if(empty($_POST)){
$this->captcha_setting();
}
else{
// Case comparing values.
if (strcasecmp($_SESSION['captchaWord'], $_POST['captcha']) == 0) {
echo "<script type='text/javascript'> alert('Your form successfully submitted'); </script>";
$this->captcha_setting();
} else {
echo "<script type='text/javascript'> alert('Try Again  ".$_SESSION['captchaWord']."'); </script>";
$this->captcha_setting();
}
}
}
// This function generates CAPTCHA image and store in "image folder".
public function captcha_setting(){
$values = array(
'word' => '',
'word_length' => 8,
'img_path' => './images/',
'img_url' => base_url() .'/images/',
'font_path' => base_url() . '/system/fonts/texb.ttf',
'img_width' => '100 px',
'img_height' => '50 px',
'expiration' => 3600
); 
$data = create_captcha($values);
// print_r($data);
// die();
$_SESSION['captchaWord'] = $data['word'];

// image will store in "$data['image']" index and its send on view page
$this->load->view('captcha', $data);
}
// For new image on click refresh button.
public function captcha_refresh(){
$values = array(
'word' => '',
'word_length' => 8,
'img_path' => './images/',
'img_url' => base_url() .'images/',
'font_path' => base_url() . 'system/fonts/texb.ttf',
'img_width' => '100 px',
'img_height' => '50 px',
'expiration' => 3600,
'class'=>'captcha_img'
);
$data = create_captcha($values);
$_SESSION['captchaWord'] = $data['word'];
echo $data['image'];

}
}
?>