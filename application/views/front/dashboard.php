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
											<p><?php echo $this->session->name; ?></p>
										</li>
										<li>
											<i class="fa fa-sticky-note" aria-hidden="true"></i>
											<span class="smallHeding">Student ID No</span>
											<span class="smallContent"><?php if(isset($student_info['0']['student_idno']) && !empty($student_info['0']['student_idno'])){ echo $student_info['0']['student_idno']; } ?></span>
										</li>
										<li>
											<i class="fa fa-id-card-o" aria-hidden="true"></i>
											<span class="smallHeding">Emirates ID No</span>
											<span class="smallContent"><?php if(isset($student_info['0']['emirates_idno']) && !empty($student_info['0']['emirates_idno'])){ echo $student_info['0']['emirates_idno']; } ?></span>
										</li>
									</ul>
								</div>
								
								<div class="whiteBlock whiteBlockContents blockClass">
									<h3 class="headingColored">Course calendar:</h3>
									<?php
									if(isset($assigned_course['0']['start_date']) && isset($assigned_course['0']['end_date']))
									{
										$starting_date = new DateTime($assigned_course['0']['start_date']);
										$ending_date = new DateTime($assigned_course['0']['end_date']);
										$today  = new DateTime();
										if($starting_date > $today) 
										{
											
									?>
									<button type="button" class="btn btn-secondary" style="width: 100%;">
										Your next class will be on:</br> 
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
										else if($ending_date < $today)
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
									<div class=" blockSeprator2-blockClass2">
										<div id="datepicker" style="font-size: 90%;"></div>
									</div>
								</div>
							</div>
					<!--Left Wrapper-->

                    <!--Right Wrapper-->
					<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
						<div class="blockClass blockSeprator noPadding">
							<div class="whiteBlock whiteBlockContents blockClass">
							<?php 
								if(isset($assigned_course) && !empty($assigned_course))
								{
							?>		
								<h3 class="headingColored">Required Courses:</h3>
									<?php //foreach($result as $adm) { ?>
										<div class="blockClass contentBlocks">
											<span class="titleIcon">
												<img src="<?php echo base_url(); ?><?php echo $course_info[0]['icon_file']; ?>"  style="height:35px"/>
											</span>
											<strong>
											<?php 
												echo $course_info['0']['course_name'];
											?>
											</strong>
											<br/>TRAINING COURSE
										</div>

									<div class="blockClass contentBlocks">
										<h4 class="headingDefault">
											About The course:
										</h4>
										<p class="paraSmall">
										   <?php 
												echo $course_info['0']['course_desc'];
											?>
										</p>
									</div>
									<p>
										<b>Course Informations:</b>
										<?php 
										// print_r($getalllessons); 
										?>
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
														$lessons_completed=$assigned_course['0']['completed_lessons'];
														$percentage=($lessons_completed/$total_lessons)*100;
														$per= number_format((float)$percentage,2,'.','');
														echo $per;
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
                            <div class="blockClass contentBlocks">
                                <h4>
                                	
                                    E-Learning Slider:
                                </h4>
								<div class="row">
									<?php 
									if(!empty($assigned_course) && $assigned_course !== '') 
										{ 
											// print_r($assigned_course);
											// print_r($getalllessons);
											foreach($getalllessons as $getl)
											{
									?>
									 <div class= "col-xl-3 col-lg-3 col-md-6 col-sm-12">
										<div class="blockClass">
											<div class="fourColumnBlock" style="background: url(<?php echo base_url(); ?><?php echo $getl['icon_file']; ?>) center no-repeat; background-size: cover;">
												
												<?php 
													if($assigned_course[0]['completed_lessons']>=$getl['lesson_order'])
													{
														?>
														<div class="serialNo" style="background:green;">
													 <strong class="serial"><?php echo $getl['lesson_order']; ?></strong>
													<br/> Lesson
													<?php
													}
													else{
														
														?>
														<div class="serialNo"> <strong class="serial"><?php echo $getl['lesson_order']; ?></strong>
													<br/> Lesson
														<?php
													}
													?>
												</div>
												<div class="lessionDetailsLabel">
												
													<?php 
													echo $getl['lesson_name'];
													?>
													
													
												</div>
												<div class="lessionDetails">
													<span>
														<i class="fa fa-book" aria-hidden="true"></i> 18 Slide
													</span>
													<span style="float: right">
														<i class="fa fa-clock-o" aria-hidden="true"></i> 60 min
													</span>
												</div>
												<?php 
												if($timeout!=1)
												{
													if(($assigned_course[0]['completed_lessons']+1)==$getl['lesson_order'])
													{
													?>
														<a  href="<?php echo base_url(); ?>lesson/view/<?php echo $this->crc_encrypt->encode($getl['id']); ?>" style="color:white; text-decoration: none;"><div class="lessStatus" style="background:green;">
														<i class="fa fa-play" aria-hidden="true"></i>
														Start now
													</div></a>
												<?php
													}
													else if($assigned_course[0]['completed_lessons']>=$getl['lesson_order'])
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
</body>
</html>