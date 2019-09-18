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
		$this->load->model('student/Mlogin', 'mlogin_model');
	}
	
	public function index()
	{
		$this->load->view('front/studentlogin');
	}
	
	public function authenticate()
	{
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
            $email_count = $this->mlogin_model->checkEmail($email);
			if($email_count[0]['total'] == 1)
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
