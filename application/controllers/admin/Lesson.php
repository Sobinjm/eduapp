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
		$this->load->model('admin/Mfaculty', 'mfaculty_model');	
		$this->load->model('admin/Mslide', 'mslide_model');
		$this->load->model('admin/Mquiz', 'mquiz_model');
		
		$this->load->model('admin/Mnotification', 'mnotification_model');	
	}
		
	public function index()
	{
		// print_r($this->session->userdata);
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
		$data['url']=$this->uri->segment(4);
		$this->load->view('admin/summary',$data);
	}
	public function details()
	{
		$id=$this->input->post('lesson_id');
		$data['details']=$this->mlesson_model->getlessondetails($id);
		$details=json_encode($data['details']);
		// $post_data = json_encode($data['details'], JSON_FORCE_OBJECT);
		$details=json_decode($details);
		$createdby=$this->mfaculty_model->getStaff($details[0]->created_by); 
		if($createdby)
		{
			$details[0]->created_by=$createdby[0]['name'];
		}
		else{
			$details[0]->createdName='-';
		}
		$updatedby=$this->mfaculty_model->getStaff($details[0]->updated_by); 
		if($updatedby)
		{
			$details[0]->updated_by=$updatedby[0]['name'];
		}
		else{
			$details[0]->updatedName='-';
		}
		$slide_count=$this->mlesson_model->getslidecount($id);
		$details[0]->slide_count=$slide_count[0]['total'];
		
		print_r(json_encode($details[0]));
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
        $this->form_validation->set_rules('lesson_desc', 'Lesson Description', 'required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed. Please Enter all the fields.';
        } 
		else
		{
			$lessons 			= $this->security->xss_clean($this->input->post('lesson_name'));
			$lesson 			=explode('~',$lessons);
			$lesson_name 		= $lesson[1];
			$lesson_id			= $lesson[0];
			$lesson_desc 		= $this->security->xss_clean($this->input->post('lesson_desc'));
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
								'lesson_order'	=> 0,
								'icon_file'		 =>	$target_file_galry,
								'course_id'		 => $course_id,	
								'course_code'	 =>	$course_code,
								'description'	 =>	$lesson_desc,
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
			$lesson_id			= $this->security->xss_clean($this->input->post('edit_lesson_id'));
			$description 		= $this->security->xss_clean($this->input->post('edit_lesson_desc'));
			$language 			= $this->security->xss_clean($this->input->post('edit_lesson_language'));
			$edit_id 			= $this->security->xss_clean($this->input->post('edit_id'));
			$course_id='1';
			$course_code='1';	
			$target_file_galry = $this->security->xss_clean($this->input->post('edit_lesson_icon_file'));
			$version = $this->mlesson_model->getmaxversion($lesson_name);
			$version=$version[0]['version']+1;
			
			
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
								'lesson_order'	 =>0,
								'description'	 =>$description,
								'language'		 =>	$language,
								'lesson_version' => $version,
								'created_by'	 => $this->crc_encrypt->decode($this->session->userdata('userid')),
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
							);
				$query = $this->mlesson_model->insert_lesson($insert_data);
				$last_id = $this->mlesson_model->get_last_id();
				$result_slide=$this->mslide_model->getallslidesforlesson($edit_id);
				$result_quiz=$this->mquiz_model->getQuizForLesson($edit_id);
				foreach ($result_slide as $slide) {
					$insert_data = array(
						'lesson_id'	 		=>	$last_id,
						'slide_title'		=>	$slide['slide_title'],
						'slide_mode'	 	=>	$slide['slide_mode'],
						'slide_file'		=>	$slide['slide_file'],
						'slide_description'	=> 	$slide['slide_description'],
						'slide_duration'	=>	$slide['slide_duration'],
						'slide_order'		=>	$slide['slide_order'],
						'created_by'		=>	$this->crc_encrypt->decode($this->session->userdata('userid'))
					);
					$this->mslide_model->insert_slide($insert_data);
				}
				foreach ($result_quiz as $quiz) {
					$insert_data = array(
						'lessonid'		 =>	$last_id,
						'quiz_type'		 =>	$quiz['quiz_type'],
						'question'		 => $quiz['question'],
						'mediatype'	 	 =>	$quiz['mediatype'],
						'upload_media'	 =>	$quiz['upload_media'],
						'right_answer'	 =>	$quiz['right_answer'],
						'created_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
						'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid'))
					);
					$this->mquiz_model->insert_quiz($insert_data);	
				}
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
		$this->form_validation->set_rules('edit_lesson_desc', 'Edit Lesson Description', 'required');
		// echo $this->input->post('edit_no_lessons');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$lesson_id 			    = $this->crc_encrypt->decode($this->security->xss_clean($this->input->post('edit_eid')));
			$lesson_name 		= $this->security->xss_clean($this->input->post('edit_lesson_name'));
			$description 			= $this->security->xss_clean($this->input->post('edit_lesson_desc'));
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
								'lesson_order'	 =>	0,
								'description'	 =>$description,
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
							);
				$query = $this->mlesson_model->update_lesson($lesson_id,$update_data);
				print_r($lesson_id);
				print_r($update_data);
				exit();
				// echo 'its here';
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

	public function update_status()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'Sorry, we are not able to approve this lesson now.';	
			}
			else 
			{
				$id = $this->crc_encrypt->decode($id);
				$data = array('publish_status' => '2');
				$query = $this->mlesson_model->update_status($id, $data);
				if($query) 
				{		
					echo 'Lesson approved.';
				}
				else 
				{
					echo 'Sorry, we are not able to approve this lesson now.';
				}
			}
			
		}
		public function draft_status()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'Sorry, we are not able to draft this lesson now.';	
			}
			else 
			{
				$id = $this->crc_encrypt->decode($id);
				$data = array('publish_status' => '0');
				$query = $this->mlesson_model->draft_status($id, $data);
				if($query) 
				{		
					echo 'Lesson drafted successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to draft this lesson now.';
				}
			}
			
		}
		
	public function lock()
	{
			$update_data = array(
				'lesson_lock'=>$this->crc_encrypt->decode($this->session->userdata('userid'))
			);
			$lesson_id=$this->input->post('id');
			$query = $this->mlesson_model->update_lesson($this->crc_encrypt->decode($lesson_id),$update_data);
			// print_r($lesson_id);
			// exit();
			if($query) 
			{	
				
			$response = array(
									'status'  => 'Success',
									'message' => 'Lesson locked successfully'
								);
			echo json_encode($response);
			exit();
			}
			else 
			{
			$response = array(
									'status'  => 'Failed',
									'message' => 'Sorry, we are not able to lock this lesson now.'
								);
			echo json_encode($response);
			exit();
			}
	}
	public function unlock()
	{
		$update_data = array(
			'lesson_lock'=>NULL
		);
		$lesson_id=$this->input->post('id');
		$query = $this->mlesson_model->update_lesson($this->crc_encrypt->decode($lesson_id),$update_data);
		// print_r($lesson_id);
		// exit();
		if($query) 
		{	
			
		$response = array(
								'status'  => 'Success',
								'message' => 'Lesson unlocked successfully'
							);
		echo json_encode($response);
		exit();
		}
		else 
		{
		$response = array(
								'status'  => 'Failed',
								'message' => 'Sorry, we are not able to unlock this lesson now.'
							);
		echo json_encode($response);
		exit();
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
