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
		$this->load->model('admin/Mcomment', 'mcomment_model');	
		
		$this->load->model('admin/Mnotification', 'mnotification_model');	
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
	
	public function summary()
	{
		$slideid = $this->crc_encrypt->decode($this->uri->segment(4));
		
		$data['result']	=	$this->mlesson_model->getslidebyid($slideid);
		// print_r($slideid);
		// die();
		$data['comments']=	$this->mcomment_model->getslidecomment($slideid);
		$this->load->view('admin/summary',$data);
	}
	public function preview()
	{
		
		$slideid = $this->crc_encrypt->decode($this->uri->segment(4));
		$data['slide_id']=$slideid;
		$data['result']	=	$this->mlesson_model->getslidebyid($slideid);
		$data['comments']=	$this->mcomment_model->getslidecomment($slideid);
		$data['user_data']=$this->crc_encrypt->decode($this->session->userdata('userid'));
		$data['admin']=$this->session->userdata('admin');
		$data['faculty']=$this->session->userdata('faculty');
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
			$lessons 			= $this->security->xss_clean($this->input->post('lesson_name'));
			$lesson 			=explode('~',$lessons);
			$lesson_name 		= $lesson[1];
			$lesson_id			= $lesson[0];
			$no_lessons 		= $this->security->xss_clean($this->input->post('no_lessons'));
			$language 			= $this->security->xss_clean($this->input->post('lesson_lang'));
			// $course_id 			= $this->security->xss_clean($this->input->post('course_id'));
			$course_id=0;
			$course_id 			= $this->crc_encrypt->decode($course_id);
			// $course_code1		= $this->mcourse_model->getCourseCode($course_id);
			$course_code1=0;
			$course_code=0;
			// if(isset($course_code1[0]['course_id']))
			// {
			// 	$course_code=$course_code1[0]['course_id'];
			// }
			// else{
			// 	$response = array(
			// 		'status'  => 'Failed',
			// 		'message' => 'Course Code Not Found'
			// 	);
			// 	echo json_encode($response);
			// 	exit();
			// }

			
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
								'lesson_id'		=> $lesson_id,
								'lesson_name'	 =>	$lesson_name,
								'icon_file'		 =>	$target_file_galry,
								'course_id'		 => $course_id,	
								'course_code'	 =>	$course_code,
								'lesson_order'	 =>	$no_lessons,
								'language'		 =>	$language,
								'created_by'	 => $this->crc_encrypt->decode($this->session->userdata('userid')),
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

	public function addversion()
	{	
		
			
			$lesson_name 		= $this->security->xss_clean($this->input->post('edit_lesson_name'));
			$lesson_id			= '1';
			$no_lessons 		= $this->security->xss_clean($this->input->post('edit_no_lessons'));
			$language 			= $this->security->xss_clean($this->input->post('edit_lesson_language'));
			$course_id='1';
			$course_code='1';	
			$target_file_galry = $this->security->xss_clean($this->input->post('edit_lesson_icon_file'));
			
			
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
								'lesson_id'		=> $lesson_id,
								'lesson_name'	 =>	$lesson_name,
								'icon_file'		 =>	$target_file_galry,
								'course_id'		 => $course_id,	
								'course_code'	 =>	$course_code,
								'lesson_order'	 =>	$no_lessons,
								'language'		 =>	$language,
								'created_by'	 => $this->crc_encrypt->decode($this->session->userdata('userid')),
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

	public function updatelesson()
	{
		$this->form_validation->set_rules('edit_lesson_name', 'Edit Lesson name', 'trim|required');
        $this->form_validation->set_rules('edit_no_lessons', 'Edit Number of lessons', 'required');
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
				// print_r($lesson_id);
				// exit();
				if($query) 
				{	
						if($this->session->userdata('role')=='0')
						{
						$user_type="Admin";
						}
						else{
							$user_type='Trainer';
						}
						$notification=array(
							'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
							'name'=>$this->session->userdata('name'),
							'user_type'=>$user_type,
							'course'=>$lesson_name,
							'status'=>'Lesson Updated',
							'url'=>base_url().'admin/course/'
				
						);
				$this->mnotification_model->insert_notification($notification);	
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
											'status'  => 'Failed',
											'message' => 'Sorry, we are not able to update this lesson now.'
										);
					echo json_encode($response);
					exit();
				}	
		}
	}
	public function delete()
	{
		// $id = $this->security->xss_clean($this->input->post('id'));
		$id=$_POST['id'];
		if(empty($id))
		{
			echo 'Sorry, we are not able to delete this lesson now.';	
		}
		else 
		{
			$data = array('id' => $this->crc_encrypt->decode($id));
			$query = $this->mlesson_model->delete_lesson($data);
			if($query) 
			{		
				echo 'Lesson deleted successfully.';
			}
			else 
			{
				echo 'Sorry, we are not able to delete this lesson now.';
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
