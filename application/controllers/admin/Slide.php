<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mlesson', 'mlesson_model');		
		$this->load->model('admin/Mslide', 'mslide_model');	
		
		$this->load->model('admin/Mnotification', 'mnotification_model');	
	}
		
	public function index()
	{
		$this->load->view('admin/lesson');
	}
	
	public function getslides()
	{
		$slideid 		= $this->security->xss_clean($this->input->post('id'));
		$slideid 		= $this->crc_encrypt->decode($slideid);
		$result			=	$this->mlesson_model->getslidebyid($slideid);
		if(!empty($result))
			{	
				echo json_encode($result);
			}
		else 
			{
				echo 'empty_id';
			}			
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
					$data['result'] = $query;
				}
				else 
				{
					$data['result'] = 'no_lesson';
				}
			}	
		$this->load->view('admin/lesson_view',$data);
	}

	public function addslide()
	{	
		$this->form_validation->set_rules('slide_title', 'Slide title', 'trim|required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$slide_title 		= $this->security->xss_clean($this->input->post('slide_title'));
			$select_media 		= $this->security->xss_clean($this->input->post('select_media'));
			$slide_description	= $this->security->xss_clean($this->input->post('slide_description_new'));
			$slide_duration 	= $this->security->xss_clean($this->input->post('slide_duration'));
			$slide_order 		= $this->security->xss_clean($this->input->post('slide_order'));
			$lessonid	 		= $this->security->xss_clean($this->crc_encrypt->decode($this->input->post('lessonid')));
			
			
			//echo $select_media;
			//exit();
			if(isset($_FILES['slide_upload']) AND !empty($_FILES["slide_upload"]["name"]))
				{
					$errors		=	array();
					$file_name	=	$_FILES['slide_upload']['name'];
					$file_size	=	$_FILES['slide_upload']['size'];
					$file_tmp	=	$_FILES['slide_upload']['tmp_name'];
					$file_type	=	$_FILES['slide_upload']['type'];
					$file_ext	= 	pathinfo($file_name, PATHINFO_EXTENSION);
					
					if($select_media == 'video')
						{
							$target_dir_galry		=	"content/uploads/slide/video/";
							$expensions				=	array("mp4","webm","ogv");
						}
					
					if($select_media == 'image')
						{
							$target_dir_galry		=	"content/uploads/slide/image/";
							$expensions				=	array("jpeg","jpg","png","gif");
						}
						
					if($select_media == 'audio')
						{
							$target_dir_galry		=	"content/uploads/slide/audio/";
							$expensions				=	array("mp3","wav");
						}
										
					
					  
					if(in_array($file_ext,$expensions)=== false)
						{
							$errors[]	=	"File extension not allowed, please choose a JPEG or PNG file.";
							echo "File extension not allowed, please choose a JPEG or PNG file.";
							exit();
						}
					
					/*					
					if($file_size > 2097152)
						{
							$errors[]='File size must be less than 2 MB';
						}
					  */
					if(empty($errors)==true)
						{
							$fileExt_galry			=	pathinfo($file_name, PATHINFO_EXTENSION);
							$randfileName_galry		=	$lessonid . time() . rand() . "." . $fileExt_galry;
							$target_file_galry		=	$target_dir_galry . basename($randfileName_galry);
							$moveResult				=	move_uploaded_file($file_tmp,$target_file_galry);
							if(!$moveResult)
								{
									$response = array(
											'status'  => 'error',
											'message' => 'Icon upload failed'
										);
									echo 'Icon upload failed';
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
								'lesson_id'	 		=>	$lessonid,
								'slide_title'		=>	$slide_title,
								'slide_mode'	 	=>	$select_media,
								'slide_file'		=>	$target_file_galry,
								'slide_description'	=> 	$slide_description,	
								'slide_duration'	=>	$slide_duration,
								'slide_order'		=>	$slide_order,
								'created_by'		=>	$this->crc_encrypt->decode($this->session->userdata('userid'))
							);
				$query = $this->mslide_model->insert_slide($insert_data);
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
							'course'=>$slide_title,
							'status'=>'Slide Added',
							'url'=>base_url().'admin/course/'
				
						);
				$this->mnotification_model->insert_notification($notification);	
					$response = array(
											'status'  => 'success',
											'message' => 'Slide added successfully'
										);
					echo 'Slide added successfully';
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'success',
											'message' => 'Sorry, we are not able to add this slide now.'
										);
					echo 'Sorry, we are not able to add this slide now.';
					exit();
				}	
		}
	}
	
	public function editslide()
	{	
		$this->form_validation->set_rules('edit_slide_title', 'Slide Title', 'trim|required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$edit_slideid 			= $this->security->xss_clean($this->input->post('edit_slideid'));
			$edit_slideid 			= $this->crc_encrypt->decode($this->input->post('edit_slideid'));
			$edit_slide_title 		= $this->security->xss_clean($this->input->post('edit_slide_title'));
			$edit_select_media		= $this->security->xss_clean($this->input->post('edit_select_media'));
			$edit_slide_description	= $this->security->xss_clean($this->input->post('edit_slide_description'));
			$edit_slide_duration 	= $this->security->xss_clean($this->input->post('edit_slide_duration'));
			$edit_slide_order 		= $this->security->xss_clean($this->input->post('edit_slide_order'));
			$no_file_upload			= $this->security->xss_clean($this->input->post('edit_file_orginal'));
			if(isset($_FILES['edit_slide_upload']) AND !empty($_FILES["edit_slide_upload"]["name"]))
				{
					$errors		=	array();
					$file_name	=	$_FILES['edit_slide_upload']['name'];
					$file_size	=	$_FILES['edit_slide_upload']['size'];
					$file_tmp	=	$_FILES['edit_slide_upload']['tmp_name'];
					$file_type	=	$_FILES['edit_slide_upload']['type'];
					$file_ext	= 	pathinfo($file_name, PATHINFO_EXTENSION);
					
					if($edit_select_media == 'video')
						{
							$target_dir_galry		=	"content/uploads/slide/video/";
							$expensions				=	array("mp4","webm","ogv");
						}
					
					if($edit_select_media == 'image')
						{
							$target_dir_galry		=	"content/uploads/slide/image/";
							$expensions				=	array("jpeg","jpg","png","gif");
						}
						
					if($edit_select_media == 'audio')
						{
							$target_dir_galry		=	"content/uploads/slide/audio/";
							$expensions				=	array("mp3","wav");
						}
										
					
					  
					if(in_array($file_ext,$expensions)=== false)
						{
							$errors[]= "File extension not allowed, please choose a JPEG or PNG file.";
							echo "File extension not allowed, please choose a JPEG or PNG file.";
							exit();
						}
					
					/*					
					if($file_size > 2097152)
						{
							$errors[]='File size must be less than 2 MB';
						}
					  */
					if(empty($errors)==true)
						{
							$fileExt_galry			=	pathinfo($file_name, PATHINFO_EXTENSION);
							$randfileName_galry		=	$lessonid . time() . rand() . "." . $fileExt_galry;
							$target_file_galry		=	$target_dir_galry . basename($randfileName_galry);
							$moveResult				=	move_uploaded_file($file_tmp,$target_file_galry);
							if(!$moveResult)
								{
									$response = array(
											'status'  => 'error',
											'message' => 'Icon upload failed'
										);
									echo 'Icon upload failed';
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
								'slide_title'		=>	$edit_slide_title,
								'slide_mode'	 	=>	$edit_select_media,
								'slide_file'		=>	$target_file_galry,
								'slide_description'	=> 	$edit_slide_description,	
								'slide_duration'	=>	$edit_slide_duration,
								'slide_order'		=>	$edit_slide_order,
								'created_by'		=>	$this->crc_encrypt->decode($this->session->userdata('userid'))
							);
				$query = $this->mslide_model->update_slide($update_data,$edit_slideid);
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
							'course'=>$edit_slide_title,
							'status'=>'Slide Updated',
							'url'=>base_url().'admin/lesson/preview/'.$this->crc_encrypt->encode($edit_slideid )
				
						);
				$this->mnotification_model->insert_notification($notification);	
					$response = array(
											'status'  => 'success',
											'message' => 'Slide updated successfully'
										);
					// echo 'Slide updated successfully';
					print_r($query);
					exit();
				 }
				else 
				{
					$response = array(
											'status'  => 'success',
											'message' => 'Sorry, we are not able to add this slidasdasde now.'
										);
					// echo 'Sorry, we are not able to add this slide now.'.$query;
					// print_r($update_data);
					print_r($query);
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
			echo 'Sorry, we are not able to delete this slide now.';	
		}
		else 
		{
			$data = array('id' => $this->crc_encrypt->decode($id));
			$query = $this->mslide_model->delete_slide($data);
			if($query) 
			{		
				echo 'Slide deleted successfully.';
			}
			else 
			{
				echo 'Sorry, we are not able to delete this slide now.';
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
