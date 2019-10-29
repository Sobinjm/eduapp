<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('student/Mlogin', 'mlogin_model');
		
		$this->load->model('admin/Mnotification', 'mnotification_model');
		
		$this->load->model('student/Mapi', 'mapi_model');
		$this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mstudent', 'mstudent_model');	
		$this->load->model('student/Mlesson', 'mlesson_model');
	}
	
	public function index()
	{
		$this->captcha_setting();
		// $this->load->view('front/studentlogin');
	}

	
	public function captcha_setting(){
		$values = array(
		'word' => '',
		'word_length' => 8,
		'img_path' => './images/',
		'img_url' => base_url() .'images/',
		'font_path' => base_url() . '/system/fonts/texb.ttf',
		'img_width' => '150',
		'img_height' => 50,
		'expiration' => 3600
		);
		$data = create_captcha($values);
		// print_r($data);
		// die();
		$_SESSION['captchaWord'] = $data['word'];
		
		// image will store in "$data['image']" index and its send on view page
		$this->load->view('front/studentlogin', $data);
		}
		// For new image on click refresh button.
		public function captcha_refresh(){
		$values = array(
		'word' => '',
		'word_length' => 8,
		'img_path' => './images/',
		'img_url' => base_url() .'images/',
		'font_path' => base_url() . 'system/fonts/texb.ttf',
		'img_width' => '150',
		'img_height' => 50,
		'expiration' => 3600
		);
		$data = create_captcha($values);
		$_SESSION['captchaWord'] = $data['word'];
		echo $data['image'];
		
		}
	
	
	public function authenticate()
	{
		if($_SESSION['captchaWord']!=$this->input->post('captcha'))
		{
			$this->session->set_flashdata('error', "<span class='help-block'>Invalid Captcha.</span>");
			redirect(site_url() . '/login');
		}
		$this->form_validation->set_rules('Snumber', 'Number', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('Tnumber', 'Number', 'required|max_length[50]');
        if ($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('error', "<span class='help-block'>Data format is not correct.</span>");
			redirect(site_url() . '/login');
						
        } 
		else
		{
			$this->session->set_flashdata('error', "<span class='help-block'>Data format is not correct.</span>");
			$studentNo 		 = $this->security->xss_clean($this->input->post('Snumber'));
						$trafficNo 		 = $this->security->xss_clean($this->input->post('Tnumber'));
						$fileNo 		 = $this->security->xss_clean($this->input->post('Fnumber'));
						$branchNo 		 = $this->security->xss_clean($this->input->post('Bnumber'));
						
						
						$login=$this->mlogin_model->validate($studentNo,$trafficNo,$fileNo,$branchNo);
						// $checklogin=$this->mlogin_model->studentvalidate($studentNo);
						
						// print_r($login);
						// die();
						if(!isset($login[0]))
						{
							
							$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong data.</span>");
							// echo $login->Message;
							redirect(site_url() . 'login');
						}
						else{
							$newsedata = array(
								'userid' => $this->crc_encrypt->encode($login[0]['id']),
								'ename'  => $login[0]['NameEng'],
								'ar_name' => $login[0]['NameAr'],
								'student_no'=>$login[0]['StudentNo'],
								'TrafficNo'=>$login[0]['TrafficNo'],
								'TryFileNo' => $login[0]['TryFileNo'],
								'BranchNo' => $login[0]['BranchNo'],
								'EmiratesID' => $login[0]['EmiratesID'],
								'logged_in' => TRUE
							);
							$this->session->set_userdata($newsedata);
							$assigned=$this->mstudent_model->getAssignedCourse($studentNo);
							// print_r($assigned);
							if($assigned)
							{
								$newsedata = array(
									'userid' => $this->crc_encrypt->encode($login[0]['id']),
									'ename'  => $login[0]['NameEng'],
									'ar_name' => $login[0]['NameAr'],
									'student_no'=>$login[0]['StudentNo'],
									'TrafficNo'=>$login[0]['TrafficNo'],
									'TryFileNo' => $login[0]['TryFileNo'],
									'BranchNo' => $login[0]['BranchNo'],
									'EmiratesID' => $login[0]['EmiratesID'],
									'logged_in' => TRUE
								);
								$this->session->set_userdata($newsedata);
								
									$user_type='Student';
								$notification=array(
									'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
									'name'=>$login[0]['NameEng'],
									'user_type'=>$user_type,
									'status'=>'Login'
						
								);
								$this->mnotification_model->insert_notification($notification);
								
								redirect(site_url() . 'dashboard');
							}
							else{
								// $as_in=0;
								$procedure_in=array(
									'StudentNo' => $this->session->userdata('student_no'),
									'TrafficNo' => $this->session->userdata('TrafficNo'),
									'fileNo' => $this->session->userdata('TryFileNo'),
									'BranchNo' => $this->session->userdata('BranchNo'));
								$courses=$this->mcourse_model->getEDCCourse($procedure_in);
								// print_r($courses);
								foreach($courses as $course)
									{
										$is_available=$this->mstudent_model->check_assignment($course['CourseRef']);
										$is_available=false;
										// print_r($is_available);
										// die();
										if(!$is_available)
										{
											if($course['ExamStatus']=='Failed')
											{
												$exam_status=1;
											}
											else{
												$exam_status=0;
											}
											// [
											// 	{
											// 		"id":5,
											// 		"CourseRef":"2670513",
											// 		"LessonCode":"L2",
											// 		"LessonDescription":"Lesson 2",
											// 		"description":'Attributes of driving',
											// 		"ByPass":"No",
											// 		"Order":4,
											// 		"current_slides":0,
											// 		"completed_status":0,
											// 		"slide_count":0
											// 	},
												$lesson_infos=[];
											
												$procedure_in=array(
													'StudentNo' => $this->session->userdata('student_no'),
													'TrafficNo' => $this->session->userdata('TrafficNo'),
													'fileNo' => $this->session->userdata('TryFileNo'),
													'BranchNo' => $this->session->userdata('BranchNo'),
													'CourseRef' =>$course['CourseRef']);
												$inner_lessons=$this->mlesson_model->getcourselessons($procedure_in);
												// print_r($inner_lessons);
												if($course['CourseRef']=='AR')
												{
												$lesson_language="Arabic";
												}
												elseif($course['CourseRef']=='EN')
												{
													$lesson_language="English";
												}
												else
												{
													$lesson_language="English";
												}
												foreach($inner_lessons as $inner_lesson)
												{
													// $inr_lsn=$inner_lesson;
													// $status_array=array('completed_slides'=>'0','lesson_status'=>'0');
													// array_push($inr_lsn,'completed_slides':'0','lesson_status':'0');
													$lesson_details=$this->mlesson_model->getlessondetails($inner_lesson['LessonCode']);
													
													// print_r($lesson_details);
													$inr_lsn["LessonCode"]=$inner_lesson['LessonCode'];
													$inr_lsn["CourseRef"]=$inner_lesson['CourseRef'];
													$inr_lsn["LessonName"]=$inner_lesson['LessonDescription'];
													$inr_lsn["language"]=$lesson_language;
													$inr_lsn["LessonDescription"]=$lesson_details[0]['description'];
													$inr_lsn["ByPass"]=$inner_lesson['ByPass'];
													$inr_lsn["Order"]	=$inner_lesson['Order'];
													$lesson_details=$this->mlesson_model->getlessondetails($inner_lesson['LessonCode']);
													$slide_details= $this->mlesson_model->getslides($lesson_details[0]['id']);
													$inr_lsn['slide_count']=sizeof($slide_details);
													$inr_lsn['icon']=$lesson_details[0]['icon_file'];
													$inr_lsn['current_slide']=0;
													$inr_lsn['completed_status']=0;
													array_push($lesson_infos,$inr_lsn);
														
												}
												// print_r($inr_lsn);
												// echo json_encode($lesson_infos);
														
												// die();
											$insert_data = array('student_id'=>$course['StudentNo'],
												'branch'=>$course['Branch'],
												'course'=>1,
												'licence_type'=>$course['LicenseType'],
												'course_code'=>$course['CourseRef'],
												'status'=>$exam_status,
												'dated'=>$course['ExamBookingDate'],
												'assigned_by'=>1,
												'slide_count'=>0,
												'completed_lessons'=>0,
												'score'=>0,
												'start_date'=>$course['TrainingExpiry'],
												'end_date'=>$course['TrainingExpiry'],
												'payment_end_date'=>$course['PaymentExpiry'],
												'lesson_per_day'=>$course['NoOfLessonsPerDay'],
												'language'=>$course['EducationLanguage'],
												'total_lessons'=>json_encode($lesson_infos)
												);
												
												$assss=$this->mstudent_model->assign_course($insert_data);
												// $as_in=1;
												$insert_data='';
												// print_r($assss);
										}

									}
								
								// if($as_in==1)
								// {
									$user_type='Student';
									$notification=array(
									'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
									'name'=>$login[0]['NameEng'],
									'user_type'=>$user_type,
									'status'=>'Login'
						
								);
								$this->mnotification_model->insert_notification($notification);
								
								redirect(site_url() . 'dashboard');
								// }
									
							}
							// print_r($login);	
						}
			
		}
	}
}
