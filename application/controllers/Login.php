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
						// print_r($login);
						// die();
						if(!isset($login[0]))
						{
							$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong data.</span>");
							// echo $login->Message;
							redirect(site_url() . 'login');
						}
						// elseif($login->StudentName==null)
						// {
						// 	$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong data.</span>");
						// 	redirect(site_url() . 'login');
						// }
						else{
							// Array ( [0] => Array ( [id] => 14 [StudentNo] => 111 [TrafficNo] => 111 [TryFileNo] => 111 [NameEng] => 111 [NameAr] => 111 [BranchNo] => 111 [EmiratesID] => 111 ) )
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
							// $notification=array(
							// 	'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
							// 	'name'=>$login[0]['NameEng'],
							// 	'user_type'=>$user_type,
							// 	'status'=>'Login'
					
							// );
							// $this->mnotification_model->insert_notification($notification);
							$this->session->set_userdata($newsedata);
							redirect(site_url() . 'dashboard');
							// print_r($login);	
						}
			
		}
	}
}
