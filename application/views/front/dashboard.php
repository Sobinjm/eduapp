<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/fonts/font-awesome.min.css" />
    <link href="<?php echo base_url(); ?>front/css/reset.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>front/css/main.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link href="<?php echo base_url(); ?>front/css/bootstrap.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<style>
	
.slideshow-container {
  /* position: relative; */
  /* background: #f1f1f1f1;  */
}

/* Slides */
.mySlides {
  display: none;
  /* padding: 80px; */
  text-align: center;
}
.mySlides .col-xl-3{
	float:left;
}


/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}


</style>
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
			
		// $this->load->model('student/Mlesson', 'mlesson_model');
			$timeout=0;
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

    <!--Section : Header Sub Section-->
    <section class="blockClass mainSection sub_bg_1">
        <!--Content Wrapper-->
        <div class="container sub_title">
           <p>Student Dashboard</p>
        </div>
    </section>
    <!--Section : Header Sub Section-->

    <!--Section : Section Heading-->
    <section class="blockClass sectionSubHeading">
        <div class="container">
            <h2 class="heading">Welcome <?php echo $this->session->name; ?></h2>
            <small class="smallFont">To begin your theory E-Class please select the course and click start.</small>
        </div>
		</section>
    <!--Section : Section Heading-->

    <!--Section-->
	
	
    <section class="blockClass mainSection">
        <!--Content Wrapper-->
        <div class="blockClass contentWrapper">
            <div class="container">
                <div class="blockClass">
                    <!--Left Wrapper-->
					<div class="container-fluid">     
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
								<div class="whiteBlock whiteBlockContents blockClass">
									<h3 class="headingColored">Student Profile:</h3>
									<ul class="listingUL blockClass">
										<li>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span class="smallHeding">Full Name</span>
											<p><?php echo $this->session->ename; ?></p>
										</li>
										<li>
											<i class="fa fa-sticky-note" aria-hidden="true"></i>
											<span class="smallHeding">Student ID No</span>
											<span class="smallContent"><?php echo $this->session->student_no; ?></span>
										</li>
										<li>
											<i class="fa fa-id-card-o" aria-hidden="true"></i>
											<span class="smallHeding">Emirates ID No</span>
											<span class="smallContent"><?php echo $this->session->EmiratesID; ?></span>
										</li>
									</ul>
								</div>
								
								<div class="whiteBlock whiteBlockContents blockClass">
									<h3 class="headingColored">Exam Schedule:</h3>
									<?php
									if(isset($assigned_course['0']['start_date']) && isset($assigned_course['0']['end_date']))
									{
										$starting_date = new DateTime($assigned_course['0']['start_date']);
										$ending_date = new DateTime($assigned_course['0']['end_date']);
										$payment_ending_date = new DateTime($assigned_course['0']['payment_end_date']);
										$today  = new DateTime();
										if($starting_date > $today) 
										{
											
									?>
									<button type="button" class="btn btn-secondary" style="width: 100%;">
										Your next exam will be on:</br> 
										<span>
											<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $starting_date->format('d F Y'); ?>
										</span>
									</button>
									<?php
										}
										else if(($starting_date < $today) && ($ending_date > $today))
										{
									?>
									<button type="button" class="btn btn-secondary" style="width: 100%;">
										Your current class ends on:</br> 
										<span>
											<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $ending_date->format('d F Y'); ?>
										</span>
									</button>
									<?php			
										}
										else if(($ending_date < $today))
										{
											$timeout=1;
									?>
									<button type="button" class="btn btn-secondary" style="width: 100%;">
										Course expired on:</br> 
										<span>
											<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $ending_date->format('d F Y'); ?>
										</span>
									</button>
									<?php	
										}
									}
									else 
									{
									?>
										<button type="button" class="btn btn-secondary" style="width: 100%;">
										No course assigned now</br> 
										<span>
											<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d F Y'); ?>
										</span>
									</button>
									<?php
									}										
									?>
									<!-- <div class=" blockSeprator2-blockClass2">
										<div id="datepicker" style="font-size: 90%;"></div>
									</div> -->
									<div class="whiteBlock whiteBlockContents blockClass" style="font-color: orange;">
									<h6 class="headingColored" >Expiry of Training: <br><?php echo $ending_date->format('d F Y'); ?></h6>
									<hr>
									<h6 class="headingColored" >Expiry of Payment:<br><?php echo $payment_ending_date->format('d F Y'); ?></h6>
									</div>
								</div>
							</div>
					<!--Left Wrapper-->

                    <!--Right Wrapper-->
					<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
						<div class="blockClass blockSeprator noPadding">
						<h3 class="headingColored">License Type :</h3>
							<div class="whiteBlock whiteBlockContents blockClass">
							<?php 
							// print_r($assigned_course);
							// die();
								if((isset($assigned_course) && !empty($assigned_course)))
								{
							?>		
								
									
										<div class="blockClass contentBlocks">
											<span class="titleIcon">
												<?php if(isset($course_info[0]['icon_file']))
												{ ?>
													<img src="<?php echo base_url(); ?><?php echo $course_info[0]['icon_file']; ?>"  style="height:35px"/>
													<?php
												}
												else{ ?>
													<img src="<?php echo base_url().'img/icon-default.png'; ?>"  style="height:35px"/>
												<?php }
												?>
											</span>
											<h5>
											<?php
											// print_r($assigned_course);
											if(isset($assigned_course['0']['licence_type'])) 
											{
												echo $assigned_course['0']['licence_type'];
											}
											else{
												echo "No Course Assigned";
											}
											?>
											</h5>
											<b>Training Course</b>
											
											<br/>
											 
										</div>

								<!--	<div class="blockClass contentBlocks">
										<h4 class="headingDefault">
											About The course:
										</h4>
										<p class="paraSmall">
										   <?php 
										   if(isset($assigned_course['0']['course_desc'])) 
										   {
											   echo $assigned_course['0']['course_desc'];
										   }
										   else{
											   echo "No Course Assigned";
										   }
												
											?>
										</p>
									</div>-->
									<p>
										<b>Lesson Informations:</b>
										
									</p>
									<p class="wrapper"></p>
									<div class="row">
										<div class="col-lg-2 ci_info_right ci_info_left" style="background-color:orange;"><span class="float-left" style="color:red;font-size: 32px;border-right: 10px orange solid;"><?php echo count($getalllessons); ?></span>Lesson<p>Required</p> </div>
										<div class="col-lg-2 ci_info_right" style="background-color:orange;"><span class="float-left" style="color:red;font-size: 32px;border-right: 10px orange solid;"><?php echo $assigned_course['0']['completed_lessons'] ?></span>Lesson<p> Completed</p></div>
										<div class="col-lg-6 ci_info_right" style="background-color:#425259;">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-12">
													<p>Progress:</p>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12">
													<p class="pull-right"><?php 
														$total_lessons=count($getalllessons);
														if($total_lessons==0||empty($total_lessons))
														{
                                                        $per=0;
														}
														else{
														$lessons_completed=$assigned_course['0']['completed_lessons'];
														$percentage=($lessons_completed/$total_lessons)*100;
														$per= number_format((float)$percentage,2,'.','');
														echo $per;
														}
														// print_r($assigned_course);
														// print_r($query);
													?></p>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="progress">
														<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $per; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $per; ?>%;background-color:orange;">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php ?>" aria-valuemin="0" aria-valuemax="100" style="width:25%;background-color:orange;">
										</div>
									</div>
								<?php //} ?>
							<hr/>
							<div class="row">
                            <div class="blockClass contentBlocks">
                                <h6>
                                	
                                    E-Learning Slider:
                                </h6>
								<div class="row">
									<?php 
									if((!empty($assigned_course) && $assigned_course !== '' )) 
										{ ?>
											<div class="slideshow-container col-lg-12 col-md-12 col-sm-12">

											<?php
											$ik=0;
											foreach($assigned_course as $history_course)
											{
												echo '<div class="mySlides ">';
											// print_r($history_course);
											// print_r($getalllessons);alllesson
											$lessons=json_decode($history_course['total_lessons'],true);
											$completionorder=0;
											foreach($lessons as $getl)
											{
												$lesson_detail=$this->mlesson_model->getlessondetails($getl['LessonCode']);
												// print_r($getl);
												// die();
												// print_r($lesson_detail);

									?>
									 <div class= "col-xl-3 col-lg-3 col-md-6 col-sm-12">
										<div class="blockClass">
											<div class="fourColumnBlock" style="background: url(<?php echo base_url().$getl['icon']; ?>) center no-repeat; background-size: cover;">
												
												<?php 
													if($history_course['completed_lessons']>=$getl['Order'])
													{
														?>
														<div class="serialNo" style="background:green;">
													 <strong class="serial"><?php //echo $getl['lesson_order'];
													 $lesson_detail[0]['lesson_name']=$getl['LessonName'].' 0';
													 $lsn_name=explode(' ',$lesson_detail[0]['LessonName']);  
													echo  $lsn_name[1]; ?></strong>
													<br/> Lesson
													<?php //echo $getl['lesson_order'];
													
													//  echo $lesson_detail[0]['lesson_name']; ?>
													<?php
													}
													else{
														
														?>
														<div class="serialNo"> <strong class="serial"><?php //echo $getl['lesson_order'];
														 $lsnname=$getl['LessonName'].' 0';
														 $lsn_name=explode(' ',$lsnname);  
														echo  $lsn_name[1]; ?></strong>
														<br/> Lesson
														<?php //echo $getl['lesson_order'];
														
														//  echo $lesson_detail[0]['lesson_name']; ?>
														<?php
													}
													?>
												</div>
												<div class="lessionDetailsLabel">
												
													<?php 
													//echo $getl['lesson_name'];
													?>
													
													
												</div>
												<div class="lessionDetails">
													<span>
													<?php 
												echo $getl['LessonDescription']; 
												?><br>
													<?php //echo $getl['lesson_order']; 
													//  $slide_details= $this->mlesson_model->getslides($getl['lesson_detail'][0]['id']);
													//  print_r($slide_details);
													//  $slide_count=sizeof($slide_details); ?>
														<i class="fa fa-book" aria-hidden="true"></i> <?php echo $getl['slide_count']; ?> Slide(s)
													</span>
													<span style="float: right">
														<i class="fa fa-clock-o" aria-hidden="true"></i> 60 min(s)
													</span>
												</div>
												<?php 
												// if($timeout==1 || $history_course['status']!=1)
												if($history_course['status']!=1)
												{
													// echo print_r($history_course['status']);
													// die();
													if($getl['completed_status']==0 && $completionorder==0)
													{
														$completionorder++;
													?>
														<a  href="<?php echo base_url(); ?>lesson/view/<?php echo $this->crc_encrypt->encode($lesson_detail[0]['id']); ?>" style="color:white; text-decoration: none;"><div class="lessStatus" style="background:green;">
														<i class="fa fa-play" aria-hidden="true"></i>
														Start now
													</div></a>
												<?php
													}
													else if($getl['completed_status']==1 && $completionorder!=0)
													{
														?>
												<div class="lessStatus" style="background:green;">
													<i class="fa fa-clock-o" aria-hidden="true"></i>
													Completed
												</div>
												<?php
												
													}
													else{
														?>
														<div class="lessStatus" >
															<i class="fa fa-clock-o" aria-hidden="true"></i>
															Pending!
														</div>
														<?php
														}
													}
													else{
														?>
														<div class="lessStatus" style="background:red;">
															<i class="fa fa-clock-o" aria-hidden="true"></i>
															Expired!
														</div>
														<?php
													}
													?>
											</div>
										</div>
									</div>                      
									<?php 
											}
											?> </div> <?php
											$ik++;
										}
										
										//end of history slide
										?> </div>
										<?php
										} 
										else 
										{
									?>
										<div class= "col-xl-3 col-lg-3 col-md-6 col-sm-12">									
											<p>No lessons added to this course</p>
										</div>
									<?php 
										} 
									?>
								</div>                         
							</div>
							<?php }else{ ?>
							<h3 class="headingColored">No course has been assigned to you right now!</h3>
							<?php } ?>
							<!-- doted box -->
							</div>
							<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 dot-container"> <?php
										$kk=1;
										foreach($assigned_course as $history_course)
											{
												?>
												
												<span class="dot" onclick="currentSlide(<?php echo $kk; ?>)"></span> 
												
												

												<?php
												$kk++;
											}
											echo '</div>'; ?>
											</div> <!-- doted box -->
						</div>                                
					</div>
				</div>
            </div>
			
        </div>

        </div>
        </div>
		
        </div>
        </div>
		</div>
		</div>
		
    </section>
	<footer id="footerType2"  class="container">
		<div class="blockClass fContainer">
            <div class="container">
                <div class="fContent">
                    <span class="fLogoName">
                        <span class="labelIcon labelIconSmall"></span>
                        <strong style="color: #929292">E-LEARNING</strong> PLATFORM
                    </span>
                    <span>v1.0.0 - October 2018</span>
                </div>
                <div class="fContent">
                    <a href="#">Privacy policy</a> |
                    <a href="#">Terms and conditions</a>
                </div>
            </div>
        </div>
	</footer>
	<script>
    $( function() 
		{
			var eventDates = {};
			<?php 
				if(isset($assigned_course['0']['start_date']) && isset($assigned_course['0']['end_date']))
				{
				$start_date =	$assigned_course['0']['start_date'];
				$end_date 	=	$assigned_course['0']['end_date'];
											
				$period 	= new DatePeriod(
										new DateTime($start_date),
										new DateInterval('P1D'),
										new DateTime($end_date)
									);
													
				foreach ($period as $key => $value) 
					{
						echo "eventDates[ new Date( '".$value->format('m/d/Y')."' )] = new Date( '".$value->format('m/d/Y')."' );";
					}	
			?>
			$("#datepicker").datepicker({
								beforeShowDay: function( date ) {
									var highlight = eventDates[date];
									if( highlight ) {
										 return [true, "event", 'Tooltip text'];
									} else {
										 return [true, '', ''];
									}
								}
							});
			<?php 
				}
			else
				{
			?>
				$("#datepicker").datepicker();
			<?php 	
				}	
			?>		
		} );
   </script>
   
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>