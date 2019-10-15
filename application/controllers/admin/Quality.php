<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mfaculty', 'mfaculty_model');	
	}
	
	
	public function index()
	{
		$data['result'] = $this->mfaculty_model->getAllfaculty();
		$this->load->view('admin/faculty', $data);
	}
	
	public function add()
	{
		$this->form_validation->set_rules('staff_email', 'Email', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('staff_password', 'Password', 'required|max_length[50]');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$staff_name = $this->security->xss_clean($this->input->post('staff_name'));
			$staff_email = $this->security->xss_clean($this->input->post('staff_email'));
			$staff_cnumber = $this->security->xss_clean($this->input->post('staff_cnumber'));
			$staff_password = $this->security->xss_clean($this->input->post('staff_password'));
			
			$email_count = $this->mfaculty_model->checkEmail($staff_email);
			if(sizeof($email_count) > 0)
			{
				echo 'A user with this email already exists.';
			}
			else 
			{
				$hash_password = password_hash($staff_password, PASSWORD_DEFAULT);
				$insert_data = array(
								'name' => $staff_name,
								'email' => $staff_email,
								'password' => $hash_password,
								'contact_number' => $staff_cnumber,
								'role' => '3'
								);
				$query = $this->mfaculty_model->insert_staff($insert_data);
				if($query) 
				{		
					echo 'Trainer added successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to add this QA User now.';
				}					
			}
		}
	}
	
	public function updatestaff()
	{
			$staff_id = $this->security->xss_clean($this->input->post('id'));
			$staff_name = $this->security->xss_clean($this->input->post('name'));
			$staff_email = $this->security->xss_clean($this->input->post('email'));
			$staff_cnumber = $this->security->xss_clean($this->input->post('staff_number'));
			$staff_password = $this->security->xss_clean($this->input->post('password'));
			
			if(!empty($staff_password))
				{
					$hash_password = password_hash($staff_password, PASSWORD_DEFAULT);
					$id = $this->crc_encrypt->decode($staff_id);
					$update_data = array(
									'name' => $staff_name,
									'email' => $staff_email,
									'password' => $hash_password,
									'contact_number' => $staff_cnumber,
									'role' => '3'
									);
					$query = $this->mfaculty_model->update_staff_passwd($id,$update_data);
					if($query) 
						{		
							echo 'QA User Details updated successfully.';
							exit();
						}
					else 
						{
							echo 'Sorry, we are not able to update this QA User Details now.';
							exit();
						}					
				}
			else 
				{
					
					$id = $this->crc_encrypt->decode($staff_id);				
					$update_data = array(
									'name' => $staff_name,
									'email' => $staff_email,
									'contact_number' => $staff_cnumber,
									'role' => '1'
									);
					$query = $this->mfaculty_model->update_staff($id,$update_data);
					if($query) 
						{		
							echo 'QA User Details updated successfully.';
							exit();
						}
					else 
						{
							echo 'Sorry, we are not able to update this QA User Details  now.';
							exit();
						}
				}
	}
	
	
	
	public function delete()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'Sorry, we are not able to delete this trainer now.';	
			}
			else 
			{
				$data = array('id' => $this->crc_encrypt->decode($id));
				$query = $this->mfaculty_model->delete_staff($data);
				if($query) 
				{		
					echo 'Trainer deleted successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to delete this trainer now.';
				}
			}
			
		}
		
	public function getstaff()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'empty_id';	
			}
			else 
			{
				$data = $this->crc_encrypt->decode($id);
				$query = $this->mfaculty_model->getStaff($data);
				if($query)
				{		
					echo json_encode($query);
				}
				else 
				{
					echo 'error';
				}
			}
			
		}
		
		
		
}
