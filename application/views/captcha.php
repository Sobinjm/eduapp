<html>
<head>
<title>Add captcha using CodeIgniter</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">

// Ajax post for refresh captcha image.
$(document).ready(function() {
$("a.refresh").click(function() {
// $.ajax({
// type: "POST",
// dataType: 'html', 
// url: "<?php echo base_url(); ?>" + "captcha_controller/captcha_refresh",
// success: function(res) {
// if (res)
// {
// jQuery("div.image").html(res);
// }
// }
// });
$.ajax({
url: "<?php echo base_url(); ?>" + "captcha_controller/captcha_refresh",
type: 'get',
  dataType: 'html',        
  success: function(res) {
    jQuery("div.image").html(res);
  },
  error: function(data) {
    alert(JSON.stringify(data));
  }
});
});
});
</script>
</head>
<body>
<div class="main">
<div id="content">
<h2 id="form_head"><?php echo $_SESSION['captchaWord']; ?>Captcha Using Codelgniter</h2><br/>
<hr>
<div id="form_input">
<?php

// Form Open
echo form_open();

// Name Field
echo form_label('Name');
$data_name = array(
'name' => 'name',
'class' => 'input_box',
'placeholder' => 'Please Enter Name',
'id' => 'name',
'required' => ''
);
echo form_input($data_name);
echo "<br>";
echo "<br>";

// Email Field
echo form_label('Email');
$data_email = array(
'name' => 'email',
'class' => 'input_box',
'placeholder' => 'Please Enter Email',
'id' => 'email',
'required' => ''
);
echo form_input($data_email);
echo "<br>";
echo "<br>";

echo "<div class='image'>";

// $image is the index of $data array. which will send by controller.
echo $image;
echo "</div>";

// Calling for refresh captcha image.
echo "<a href='#' class ='refresh'><img id = 'ref_symbol' src =".base_url()."img/refresh.png></a>";
echo "<br>";
echo "<br>";

// Captcha word field.
echo form_label('Captcha');
$data_captcha = array(
'name' => 'captcha',
'class' => 'input_box',
'color' => 'white',
'placeholder' => '',
'id' => 'captcha'
);
echo form_input($data_captcha);
?>
</div>
<div id="form_button">
<?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
</div>
<?php
// Form Close
echo form_close(); ?>
</div>
</div>
</body>
<style>
body {
font-family: 'Raleway', sans-serif;
}
.main
{
width: 1015px;
position: absolute;
top: 10%;
left: 20%;
}
#form_head
{
text-align: center;
background-color: #FEFFED;
height: 66px;
margin: 0 0 -29px 0;
padding-top: 35px;
border-radius: 8px 8px 0 0;
color: rgb(97, 94, 94);
}
#content {
position: absolute;
width: 450px;
height: 490px;
border: 2px solid gray;
border-radius: 10px;
}
#content_result{
position: absolute;
width: 450px;
height: 192px;
border: 2px solid gray;
border-radius: 10px;
margin-left: 559px;
margin-top: -262px;
}
#form_input
{
margin-left: 50px;
margin-top: 36px;
}
label
{
margin-right: 6px;
font-weight: bold;
}

#form_button{
padding: 0 21px 15px 15px;
position: absolute;
bottom: 0px;
width: 414px;
background-color: #FEFFED;
border-radius: 0px 0px 8px 8px;
border-top: 1px solid #9A9A9A;
}
.submit{
font-size: 16px;
background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
border: 1px solid #e5a900;
color: #4E4D4B;
font-weight: bold;
cursor: pointer;
width: 300px;
border-radius: 5px;
padding: 10px 0;
outline: none;
margin-top: 20px;
margin-left: 15%;
}
.submit:hover{
background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
}
.label_output
{
color:#4A85AB;
margin-left: 10px;
}
#result_id
{
text-align: center;
background-color: #FCD6F4;
height: 47px;
margin: 0 0 -29px 0; 
padding-top: 12px;
border-radius: 8px 8px 0 0;
color: rgb(97, 94, 94);
}
#result_show
{
margin-top: 35px;
margin-left: 45px;
}
.input_box{
height:40px;
width:240px;
padding:20px;
border-radius:3px;
background-color:#FEFFED;
margin-left:30px;
}
img {
margin-left: 97px;
}
input#name {
margin-left: 45px;
}
input#email {
margin-left: 50px;
}
img#ref_symbol {
margin-left: 275px;
margin-top: -36px;
}
</style>
</html>