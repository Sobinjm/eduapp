<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Eduapp | <?php echo ucfirst($this->uri->segment(2)); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/datatables.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/toggler.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/dist/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admdist/plugins/node_modules/video.js/dist/video-js.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="fixed layout-top-nav skin-red">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url().'admin/dashboard'; ?>" class="navbar-brand" style="background: url('<?php echo base_url(); ?>admdist/dist/img/logo.png') no-repeat fixed center;">
		  <img class="img-responsive" src="<?php echo base_url(); ?>admdist/dist/img/logo.png" style="margin-top: -10px; max-width: 85%;" />
		  <!--<b>Admin</b>LTE-->
		  </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
		
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>admdist/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">Welcome back, <?php echo $this->session->name; ?></span>
             </a>
            </li>
			<li class="notifications-menu">
				<a href="<?php echo site_url('admin/auth/logout') ?>">
				  <i class="fa fa-sign-out"></i> Logout
				</a>
			</li>
          </ul>
        </div>
      </div>
    </nav>
	<div class="container-fluid subhead_container">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ol class="sub_menus">
				  <?php if($this->session->role == 0){ ?>
				  <li class="<?php if($this->uri->segment(2) == 'dashboard'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/dashboard'; ?>">Dashboard</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'admin'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/staff/admin'; ?>">Admin</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'trainer'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/staff/trainer'; ?>">Trainer</a></li>
          <li class="<?php if($this->uri->segment(3) == 'quality'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/staff/quality'; ?>">QM</a></li>
          <li class="<?php if($this->uri->segment(3) == 'hm'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/staff/hm'; ?>">HM</a></li>
				  <li class="<?php if($this->uri->segment(2) == 'student'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/student'; ?>">Students</a></li>
          <?php $url_i=$this->uri->segment(3); ?>
				  <li class="<?php if($this->uri->segment(2) == 'course' && !isset($url_i)){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course'; ?>">All Lessons</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'pending'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/pending'; ?>">Pending</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'draft'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/draft'; ?>">Drafts</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'published'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/published'; ?>">Published</a></li>
          <?php }
          else{
            ?>
<li class="<?php if($this->uri->segment(2) == 'dashboard'){ echo 'active'; } ?>"><a href="<?php echo base_url().'trainer/dashboard'; ?>">Home</a></li>
				  <!-- <li class="<?php if($this->uri->segment(2) == 'student'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/student'; ?>">Students</a></li>	
          <?php $url_i=$this->uri->segment(3); ?>			   -->
          <li class="<?php if($this->uri->segment(2) == 'course' && !isset($url_i)){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course'; ?>">All Lessons</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'pending'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/pending'; ?>">Pending</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'draft'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/draft'; ?>">Drafts</a></li>
				  <li class="<?php if($this->uri->segment(3) == 'published'){ echo 'active'; } ?>"><a href="<?php echo base_url().'admin/course/published'; ?>">Published</a></li>
				  <li class="<?php if($this->uri->segment(2) == 'notification'){ echo 'active'; } ?>"><a href="<?php echo base_url().'trainer/notification'; ?>">Notification</a></li>



            <?php
          } ?>
				</ol>		
			</div>
		</div>
	</div>
  </header>
  
	
