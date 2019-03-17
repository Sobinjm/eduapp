<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mstudent', 'mstudent_model');	
	}
	
	
	public function index()
	{
		$data['result'] = $this->mstudent_model->getAlladmin();
		$this->load->view('admin/student', $data);
	}
	
	public function view()
	{
		$student_id = $this->uri->segment('4');
		$student_id = $this->crc_encrypt->decode($student_id);
		$data['result']  	=	$this->mstudent_model->getProfileInformation($student_id);
		$mycourses			=	$this->mstudent_model->getAssignedCourse($student_id);
		$data['courses'] 	=	$mycourses;
		$mylessons 		 	=  	$this->mstudent_model->getallmylessons($mycourses['0']['id']);
		$data['mylessons'] 	=	$mylessons;
		$data['lessons'] 	=	$this->mstudent_model->getallcourse();
		$this->load->view('admin/profile', $data);
	}
	
	public function assign()
	{
		$this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|max_length[50]');
        $this->form_validation->set_rules('end_date', 'End Date', 'required|max_length[50]');
        if ($this->form_validation->run() == false) 
		{
			$response = array(
							'type' => 'error',
							'message' => 'Please check whether all fields are filled.'	
						);
			echo json_encode($response);
			exit();
        }
		else
		{
			$student_id		= $this->security->xss_clean($this->input->post('studentid'));
			$student_id		= $this->crc_encrypt->decode($student_id);
			$course_name	= $this->security->xss_clean($this->input->post('course_name'));
			$start_date		= $this->security->xss_clean($this->input->post('start_date'));
			$end_date		= $this->security->xss_clean($this->input->post('end_date'));
			
			if(empty($course_name) || $course_name == '')
				{
					$response = array(
									'type' => 'error',
									'message' => 'Please select a course name.'	
								);
					echo json_encode($response);
					exit();
				}
				
			if(empty($start_date) || $start_date == '')
				{
					$response = array(
									'type' => 'error',
									'message' => 'Please select a course start date.'	
								);
					echo json_encode($response);
					exit();
				}				
				
			if(empty($end_date) || $end_date == '')
				{
					$response = array(
									'type' => 'error',
									'message' => 'Please select a course end date.'	
								);
					echo json_encode($response);
					exit();
				}
				
			$insert_data = array(
								'student_id'	=>	$student_id,
								'course'		=>	$course_name,
								'start_date'	=>	$start_date,
								'end_date'	 	=>	$end_date,
								'assigned_by'	=>	$this->crc_encrypt->decode($this->session->userdata('userid'))
							);
			$query = $this->mstudent_model->assign_course($insert_data);			
			if($query) 
				{		
					$response = array(
										'status'  => 'success',
										'message' => 'Course assigned successfully'
									);
					echo json_encode($response);
					exit();
				}
			else 
				{
					$response = array(
										'status'  => 'error',
										'message' => 'Sorry, we are not able to add this course now.'
									);
					echo json_encode($response);
					exit();
				}	
		}
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
			$staff_name 	= $this->security->xss_clean($this->input->post('staff_name'));
			$staff_email 	= $this->security->xss_clean($this->input->post('staff_email'));
			$staff_cnumber 	= $this->security->xss_clean($this->input->post('staff_cnumber'));
			$staff_password = $this->security->xss_clean($this->input->post('staff_password'));
			$student_id_no 	= $this->security->xss_clean($this->input->post('student_id_no'));
			$emirates_id_no = $this->security->xss_clean($this->input->post('emirates_id_no'));
			
			$email_count = $this->mstudent_model->checkEmail($staff_email);
			if($email_count[0]['total'] > 0)
			{
				echo 'A user with this email already exists.';
			}
			else 
			{
				$hash_password = password_hash($staff_password, PASSWORD_DEFAULT);
				$insert_data = array(
								'name' => $staff_name,
								'email' => $staff_email,
								'student_idno' => $student_id_no,
								'emirates_idno' => $emirates_id_no,
								'password' => $hash_password,
								'contact_number' => $staff_cnumber,
								'role' => '0'
								);
				$query = $this->mstudent_model->insert_staff($insert_data);
				if($query) 
				{		
					echo 'Student added successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to add this student now.';
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
			
			$edit_student_id_no  = $this->security->xss_clean($this->input->post('edit_student_id_no'));
			$edit_emirates_id_no = $this->security->xss_clean($this->input->post('edit_emirates_id_no'));
			
			if(!empty($staff_password))
				{
					$hash_password = password_hash($staff_password, PASSWORD_DEFAULT);
					$id = $this->crc_encrypt->decode($staff_id);
					$update_data = array(
									'name' => $staff_name,
									'email' => $staff_email,
									'student_idno' => $edit_student_id_no,
									'emirates_idno' => $edit_emirates_id_no,
									'password' => $hash_password,
									'contact_number' => $staff_cnumber,
									'role' => '0'
									);
					$query = $this->mstudent_model->update_staff_passwd($id,$update_data);
					if($query) 
						{		
							echo 'Student updated successfully.';
							exit();
						}
					else 
						{
							echo 'Sorry, we are not able to add this student now.';
							exit();
						}					
				}
			else 
				{
					
					$id = $this->crc_encrypt->decode($staff_id);				
					$update_data = array(
									'name' => $staff_name,
									'email' => $staff_email,
									'student_idno' => $edit_student_id_no,
									'emirates_idno' => $edit_emirates_id_no,
									'contact_number' => $staff_cnumber,
									'role' => '0'
									);
					$query = $this->mstudent_model->update_staff($id,$update_data);
					if($query) 
						{		
							echo 'Student updated successfully.';
							exit();
						}
					else 
						{
							echo 'Sorry, we are not able to add this student now.';
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
				$query = $this->mstudent_model->delete_staff($data);
				if($query) 
				{		
					echo 'Student deleted successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to delete this student now.';
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
				$query = $this->mstudent_model->getStaff($data);
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
