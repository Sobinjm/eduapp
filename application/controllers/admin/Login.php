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
		if($this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') == TRUE && $this->session->userdata('student') == FALSE)
			{ 
				redirect('admin/dashboard');
			}
		$this->load->model('admin/Madmin', 'madmin_model');
		
		$this->load->model('admin/Mnotification', 'mnotification_model');
	}
	 
	// public function index()
	// {
		
	// 	$this->load->view('admin/login');
	// }
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
		$this->load->view('admin/login', $data);
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
			redirect(site_url() . 'admin/login');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[50]');
        if ($this->form_validation->run() == false) 
		{
            $this->session->set_flashdata('error', "<span class='help-block'>Data format is not correct.</span>");
			redirect(site_url() . 'admin/login');
        } 
		else
		{
			$email 		 = $this->security->xss_clean($this->input->post('email'));
            $password 	 = $this->security->xss_clean($this->input->post('password'));
            $email_count = $this->madmin_model->checkEmail($email);
			if(sizeof($email_count)== 1)
			{
				if (password_verify($password, $email_count[0]['password'])) 
					{
						$newsedata = array(
										'userid' => $this->crc_encrypt->encode($email_count[0]['id']),
										'name'  => $email_count[0]['name'],
										'email' => $email_count[0]['email'],
										'contact' => $email_count[0]['contact_number'],
										'role' => $email_count[0]['role'],
										'logged_in' => TRUE,
										'student'	=> FALSE
									);
									if($email_count[0]['role']==0)
									{
										$user_type='Admin';
									}
									elseif($email_count[0]['role']==1){
										$user_type="Trainer";
									}
									else{
										$user_type="Student";
									}
									$notification=array(
										'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
										'name'=>$email_count[0]['name'],
										'user_type'=>$user_type,
										'status'=>'Login'
							
									);
									$this->mnotification_model->insert_notification($notification);
						$this->session->set_userdata($newsedata);
						redirect(site_url() . 'admin/dashboard');			
					}
				else 
					{
						$this->session->set_flashdata('error', "<span class='help-block'>You have entered a wrong password.</span>");
						redirect(site_url() . 'admin/login');
					}
			}
			else 
			{
				$this->session->set_flashdata('error', "<span class='help-block'>Username and password does not match.</span>");
				redirect(site_url() . 'admin/login');
			}
		}
	}
	
}
