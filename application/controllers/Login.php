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
		$this->load->model('admin/Mstudent', 'mstudent_model');	
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
						$token=$this->mapi_model->getToken();
						
						$login=$this->mapi_model->getStudentLogin($studentNo,$trafficNo,$fileNo,$token);
						print_r($login);
						// die();
						if(isset($login->Message))
						{
							$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong data.</span>");
							// echo $login->Message;
							redirect(site_url() . 'login');
						}
						elseif($login->StudentName==null)
						{
							$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong data.</span>");
							redirect(site_url() . 'login');
						}
						else{
							if($login->Status->Name=="In Progress")
							{ 
								$checkSno_count=$this->mlogin_model->checkStudent($studentNo);
								if(sizeof($checkSno_count)>= 1)
								{
									if($checkSno_count[0]['trafficNumber']==$trafficNo && $checkSno_count[0]['fileNumber']==$fileNo)
									{
										$newsedata = array(
											'userid' => $this->crc_encrypt->encode($checkSno_count[0]['id']),
											'name'  => $checkSno_count[0]['name'],
											'email' => $checkSno_count[0]['email'],
											'student_no'=>$checkSno_count[0]['student_idno'],
											'vip'=>$checkSno_count[0]['vip'],
											'role' => $checkSno_count[0]['role'],
											'logged_in' => TRUE
										);
										$this->session->set_userdata($newsedata);
											$user_type='Student';
										$notification=array(
											'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
											'name'=>$checkSno_count[0]['name'],
											'user_type'=>$user_type,
											'status'=>'Login'
								
										);
										$this->mnotification_model->insert_notification($notification);
										$this->session->set_userdata($newsedata);
										redirect(site_url() . 'dashboard');
									}
									else 
									{
										
										$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong Traffic Number and File Number.</span>");
										redirect(site_url() . 'login');
									}
								}
								else 
								{
									$insert_data = array(
										'name' => $login->StudentName,
										'email' => 'student@domain.com',
										'student_idno' => $login->StudentNumber,
										'trafficNumber' => $trafficNo,
										'fileNumber' => $fileNo,
										'contact_number' => 0,
										'role' => '0',
										'vip'=>$login->IsVIP,
										'no_of_lessons'=>$login->NumberOfLessonPerDay
										
										);
									$query = $this->mstudent_model->insert_student($insert_data);
									// print_r($query);
									// die();
									$vip=0;
									if($login->IsVIP=='true')
									{
										$vip=1;
									}
									
									// 'lesson_count'	=>	$login->NumberOfLessonPerDay,
									if($query)
									{
									$insert_data = array(
										'student_id'	=>	$query,
										'course_code'		=>	$login->LicenseId,
										// 'vip'				=> $vip,
										'start_date'	=>	 date('m/d/Y h:i a'),
										'end_date'	 	=>	date('m/d/Y h:i a', strtotime('+6 months')),
										'assigned_by'	=>	'0',
										'language'		=>	'english '
									);
										$query1 = $this->mstudent_model->assign_course($insert_data);
								}
									if($query1) 
									{	
										$rs_count=$this->mlogin_model->checkStudent($studentNo);
										$newsedata = array(
											'userid' => $this->crc_encrypt->encode($rs_count[0]['id']),
											'student_no'=>$login->StudentNumber,
											'vip'				=> $vip,
											'name' => $login->StudentName,
											'email' => 'student@domain.com',
											'role' => '0',
											'logged_in' => TRUE
										);
										$this->session->set_userdata($newsedata);
											$user_type='Student';
										$notification=array(
											'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
											'name'=>$login->StudentName,
											'user_type'=>$user_type,
											'status'=>'Login'
								
										);
										$this->mnotification_model->insert_notification($notification);
										$this->session->set_userdata($newsedata);
										redirect(site_url() . 'dashboard');
									}
									else 
									{
										echo 'Sorry, we are not able to add this student now.';
										$this->session->set_flashdata('error', "<span class='help-block'>Sorry, we are not able to add this student now.</span>");
									redirect(site_url() . 'login');
									}
									$this->session->set_flashdata('error', "<span class='help-block'>Student Number,Traffic Number and File Number does not match.</span>");
									redirect(site_url() . 'login');
								}
							}
							else{
								$checkSno_count=$this->mlogin_model->checkStudent($studentNo);
								if(sizeof($checkSno_count) >= 1)
								{
									if($checkSno_count[0]['trafficNumber']==$trafficNo && $checkSno_count[0]['fileNumber']==$fileNo)
									{
										$newsedata = array(
											'userid' => $this->crc_encrypt->encode($email_count[0]['id']),
											'name'  => $checkSno_count[0]['name'],
											'email' => $checkSno_count[0]['email'],
											'vip' => $checkSno_count[0]['vip'],
											'role' => $checkSno_count[0]['role'],
											'logged_in' => TRUE
										);
										$this->session->set_userdata($newsedata);
											$user_type='Student';
										$notification=array(
											'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
											'name'=>$checkSno_count[0]['name'],
											'user_type'=>$user_type,
											'status'=>'Login'
								
										);
										$this->mnotification_model->insert_notification($notification);
										$this->session->set_userdata($newsedata);
										redirect(site_url() . 'dashboard');
									}
									else 
									{
										
										$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong Traffic Number and File Number.</span>");
										redirect(site_url() . 'login');
									}
								}
							}
							
							// print_r($login);	
						}
			$email 		 = $this->security->xss_clean($this->input->post('email'));
            $password 	 = $this->security->xss_clean($this->input->post('password'));
            $email_count = $this->mlogin_model->checkEmail($email);
			if(sizeof($email_count)>= 1)
			{
				if (password_verify($password, $email_count[0]['password'])) 
					{

						$newsedata = array(
										'userid' => $this->crc_encrypt->encode($email_count[0]['id']),
										'name'  => $email_count[0]['name'],
										'email' => $email_count[0]['email'],
										'contact' => $email_count[0]['contact_number'],
										'role' => $email_count[0]['role'],
										'logged_in' => TRUE
									);
						$this->session->set_userdata($newsedata);
									if($email_count[0]['role']==0)
									{
										$user_type='Student';
									}
									elseif($email_count[0]['role']==1){
										$user_type="Trainer";
									}
									else{
										$user_type="Admin";
									}
									$notification=array(
										'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
										'name'=>$email_count[0]['name'],
										'user_type'=>$user_type,
										'status'=>'Login'
							
									);
									$this->mnotification_model->insert_notification($notification);
						
						redirect(site_url() . 'dashboard');			
					}
				else 
					{
						
						$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong password.</span>");
						redirect(site_url() . 'login');
					}
					
			}
			else 
			{
				
				$this->session->set_flashdata('error', "<span class='help-block'>Username and password does not match.</span>");
				redirect(site_url() . 'login');
			}
		}
	}
}
