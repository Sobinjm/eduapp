<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eduapp | <?php echo ucfirst($this->uri->segment(2)); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>front/fonts/bootstrap.min.css" />
    <link href="<?php echo base_url(); ?>front/css/reset.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>front/css/main.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <!--Header-->
    <header class="blockClass">
        <div class="container">
            <!--Logo-->
            <div class="logoContainer">&nbsp;</div>
            <!--Logo-->

            <!--Site Links-->
			<?php 
			if (!$this->session->has_userdata('logged_in') || $this->session->userdata('logged_in') !== TRUE)
			{ 
			?>
			<div class="siteLinksContainer">
               <?php if($this->uri->segment(1) == 'admin') { ?>
			   <a href="<?php echo base_url(); ?>">Student Login</a> &nbsp;&nbsp;|&nbsp;&nbsp;
			   <?php } else {?>
			   <a href="<?php echo base_url(); ?>admin/login">Admin Login</a> &nbsp;&nbsp;|&nbsp;&nbsp;
			   <?php } ?>
                <a href="#">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    Language :
                    <span class="selectedLanguage">English</span>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
            </div>
			<?php
			}
			else
			{
			?>
            <div class="siteLinksContainer">
                <a href="#">
                    <i class="fa fa-info-circle coloredI" aria-hidden="true"></i>
                    Do you need help?
                    <u>Click here</u> for assistants
                </a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="<?php echo base_url(); ?>auth/logout">
                    <i class="fa fa-sign-out coloredI" aria-hidden="true"></i>
                    Log out
                </a>
            </div>
			<?php 
			}			
			?>
            <!--Site Links-->
        </div>
    </header>
    <!--Header-->
