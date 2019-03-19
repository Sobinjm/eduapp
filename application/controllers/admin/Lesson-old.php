<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mlesson', 'mlesson_model');		
	}
		
	public function index()
	{
		$this->load->view('admin/lesson');
	}
	
	public function view()
	{
		$crs_id		= $this->crc_encrypt->decode($this->uri->segment(4));
		$language	= $this->uri->segment(5);
		if(empty($crs_id))
			{
				$data['result'] = 'no_lesson';	
			}
		else 
			{
				$query = $this->mlesson_model->getlessonforcourse($crs_id,$language);
				if($query)
				{		
					foreach($query as$qry)
						{
							$qry['lessons'] = $this->mlesson_model->getslideforlesson($qry['id']);
							$qry['quiz'] = $this->mlesson_model->getquizforlesson($qry['id']);
							$datas[] = $qry;
						}
					$data['result'] = $datas;
				}
				else 
				{
					$data['result'] = 'no_lesson';
				}
			}	
		$this->load->view('admin/lesson_view',$data);
	}
	
	public function preview()
	{
		$slideid = $this->crc_encrypt->decode($this->uri->segment(4));
		$data['result']	=	$this->mlesson_model->getslidebyid($slideid);
		$this->load->view('admin/slide_preview',$data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('lesson_name', 'Lesson name', 'trim|required');
        $this->form_validation->set_rules('no_lessons', 'Number of lessons', 'required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$lesson_name 		= $this->security->xss_clean($this->input->post('lesson_name'));
			$no_lessons 		= $this->security->xss_clean($this->input->post('no_lessons'));
			$language 			= $this->security->xss_clean($this->input->post('language'));
			$course_id 			= $this->security->xss_clean($this->input->post('course_id'));
			$course_id 			= $this->crc_encrypt->decode($course_id);
			
			if(isset($_FILES['icon_file']) AND !empty($_FILES["icon_file"]["name"]))
				{
					$errors		=	array();
					$file_name	=	$_FILES['icon_file']['name'];
					$file_size	=	$_FILES['icon_file']['size'];
					$file_tmp	=	$_FILES['icon_file']['tmp_name'];
					$file_type	=	$_FILES['icon_file']['type'];
					$file_ext	= 	pathinfo($file_name, PATHINFO_EXTENSION);
					
					$expensions	=	array("jpeg","jpg","png","gif");
					  
					if(in_array($file_ext,$expensions)=== false)
						{
							$errors[]="extension not allowed, please choose a JPEG or PNG file.";
						}
					  
					if($file_size > 2097152)
						{
							$errors[]='File size must be less than 2 MB';
						}
					  
					if(empty($errors)==true)
						{
							$target_dir_galry		=	"content/uploads/lessons/";
							$fileExt_galry			=	pathinfo($file_name, PATHINFO_EXTENSION);
							$randfileName_galry		=	time() . rand() . "." . $fileExt_galry;
							$target_file_galry		=	$target_dir_galry . basename($randfileName_galry);
							$moveResult				=	move_uploaded_file($file_tmp,$target_file_galry);
							if(!$moveResult)
								{
									$response = array(
											'status'  => 'error',
											'message' => 'Icon upload failed'
										);
									echo json_encode($response);
									exit();
								}
							
						}
					else
						{
							$response = array(
											'status'  => 'error',
											'message' => $errors
										);
							echo json_encode($response);
							exit();
						}
				}
								
				
				$insert_data = array(
								'lesson_name'	 =>	$lesson_name,
								'icon_file'		 =>	$target_file_galry,
								'course_id'		 => $course_id,	
								'lesson_order'	 =>	$no_lessons,
								'language'		 =>	$language,
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
							);
				$query = $this->mlesson_model->insert_lesson($insert_data);
				if($query) 
				{		
					$response = array(
											'status'  => 'success',
											'message' => 'Lesson added successfully'
										);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'success',
											'message' => 'Sorry, we are not able to add this lesson now.'
										);
					echo json_encode($response);
					exit();
				}	
		}
	}

	
	public function updatelesson()
	{
		$this->form_validation->set_rules('edit_lesson_name', 'Lesson name', 'trim|required');
        $this->form_validation->set_rules('edit_no_lessons', 'Number of lessons', 'required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$lesson_id 			    = $this->crc_encrypt->decode($this->security->xss_clean($this->input->post('edit_eid')));
			$lesson_name 		= $this->security->xss_clean($this->input->post('edit_lesson_name'));
			$no_lessons 			= $this->security->xss_clean($this->input->post('edit_no_lessons'));
			$no_file_upload		 	= $this->security->xss_clean($this->input->post('no_file_upload'));
			
			if(isset($_FILES['edit_icon_file']) AND !empty($_FILES["edit_icon_file"]["name"]))
				{
					$errors		=	array();
					$file_name	=	$_FILES['edit_icon_file']['name'];
					$file_size	=	$_FILES['edit_icon_file']['size'];
					$file_tmp	=	$_FILES['edit_icon_file']['tmp_name'];
					$file_type	=	$_FILES['edit_icon_file']['type'];
					$file_ext	= 	pathinfo($file_name, PATHINFO_EXTENSION);
					
					$expensions	=	array("jpeg","jpg","png","gif");
					  
					if(in_array($file_ext,$expensions)=== false)
						{
							$errors[]="extension not allowed, please choose a JPEG or PNG file.";
						}
					  
					if($file_size > 2097152)
						{
							$errors[]='File size must be less than 2 MB';
						}
					  
					if(empty($errors)==true)
						{
							$target_dir_galry		=	"content/uploads/lessons/";
							$fileExt_galry			=	pathinfo($file_name, PATHINFO_EXTENSION);
							$randfileName_galry		=	time() . rand() . "." . $fileExt_galry;
							$target_file_galry		=	$target_dir_galry . basename($randfileName_galry);
							$moveResult				=	move_uploaded_file($file_tmp,$target_file_galry);
							if(!$moveResult)
								{
									$response = array(
											'status'  => 'error',
											'message' => 'Icon upload failed'
										);
									echo json_encode($response);
									exit();
								}
							else 
								{
									if (file_exists($no_file_upload)) 
									{
										$path = $no_file_upload;
										unlink($path);
									}
								}	
							
						}
					else
						{
							$response = array(
											'status'  => 'error',
											'message' => $errors
										);
							echo json_encode($response);
							exit();
						}
				}
				else 
				{
					$target_file_galry = $no_file_upload;
				}
								
				
				$update_data = array(
								'lesson_name'	 =>	$lesson_name,
								'icon_file'		 =>	$target_file_galry,
								'lesson_order'	 =>	$no_lessons,
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
							);
				$query = $this->mlesson_model->update_lesson($lesson_id,$update_data);
				if($query) 
				{		
					$response = array(
											'status'  => 'success',
											'message' => 'Lesson updated successfully'
										);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'success',
											'message' => 'Sorry, we are not able to update this lesson now.'
										);
					echo json_encode($response);
					exit();
				}	
		}
	}
	
	public function getlesson()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'empty_id';	
			}
			else 
			{
				$data = $this->crc_encrypt->decode($id);
				$query = $this->mlesson_model->getlessonid($data);
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
