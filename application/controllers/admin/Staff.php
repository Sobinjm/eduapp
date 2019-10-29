<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Madmin', 'madmin_model');	
	}
	
	
	public function index()
	{
		$data['result'] = $this->madmin_model->getAlladmin();
		$this->load->view('admin/staff', $data);
	}
	
	public function admin()
	{
		$data['result'] = $this->madmin_model->getAllStaffs(0);
		$this->load->view('admin/staff', $data);
	}
	public function trainer()
	{
		$data['result'] = $this->madmin_model->getAllStaffs(1);
		$this->load->view('admin/staff', $data);
	}
	public function quality()
	{
		$data['result'] = $this->madmin_model->getAllStaffs(2);
		$this->load->view('admin/staff', $data);
	}
	public function hm()
	{
		$data['result'] = $this->madmin_model->getAllStaffs(3);
		$this->load->view('admin/staff', $data);
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
			$staff_role = $this->security->xss_clean($this->input->post('staff_role'));
			$staff_email = $this->security->xss_clean($this->input->post('staff_email'));
			$staff_cnumber = $this->security->xss_clean($this->input->post('staff_cnumber'));
			$staff_password = $this->security->xss_clean($this->input->post('staff_password'));
			
			$email_count = $this->madmin_model->checkEmail($staff_email);
			if(sizeof($email_count)> 0)
			{
				echo 'A user with this email already exists.';
			}
			else 
			{
				$hash_password = password_hash($staff_password, PASSWORD_DEFAULT);
				$insert_data = array(
								'name' => $staff_name,
								'role' => $staff_role,
								'email' => $staff_email,
								'password' => $hash_password,
								'contact_number' => $staff_cnumber
								);
				$query = $this->madmin_model->insert_staff($insert_data);
				// print_r($query);
				// die();
				if($query) 
				{		
					echo 'Staff added successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to add this staff now.';
				}					
			}
		}
	}
	
	public function updatestaff()
	{
			$staff_id = $this->security->xss_clean($this->input->post('id'));
			$staff_role = $this->security->xss_clean($this->input->post('role'));
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
									'role'=>$staff_role
									);
					$query = $this->madmin_model->update_staff_passwd($id,$update_data);
					if($query) 
						{		
							echo 'Admin staff updated successfully.';
							exit();
						}
					else 
						{
							echo 'Sorry, we are not able to add this staff now.';
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
									'role'=>$staff_role
									);
					$query = $this->madmin_model->update_staff($id,$update_data);
					if($query) 
						{		
							echo 'Admin staff updated successfully.';
							exit();
						}
					else 
						{
							echo 'Sorry, we are not able to add this staff now.';
							exit();
						}
				}
	}
	
	
	
	public function delete()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'Sorry, we are not able to delete this staff now.';	
			}
			else 
			{
				$data = array('id' => $this->crc_encrypt->decode($id));
				$query = $this->madmin_model->delete_staff($data);
				if($query) 
				{		
					echo 'Admin staff deleted successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to delete this staff now.';
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
				$query = $this->madmin_model->getStaff($data);
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
