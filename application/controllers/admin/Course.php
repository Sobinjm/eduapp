<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		// $this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mlesson', 'mlesson_model');	
		$this->load->model('admin/Mcomment', 'mcomment_model');	
		
		$this->load->model('admin/Mnotification', 'mnotification_model');
			
	}
	
	
	public function index()
	{
		

		// $data['result'] = $this->mcourse_model->getAllcourse();
		$data['lessons'] = $this->mcourse_model->getAllLessons();
		$i=0;
		$slides=null;
		$index=0;
		$datas[]=null;
		$qrys[]=null;
		foreach($data['lessons'] as $qry)
						{
							reset($qrys);
							reset($datas);
							$slide[]=$qry;
							$qrys['slides'] = $this->mlesson_model->getslideforlesson($qry['id']);
							$commentlsn=0;
							foreach($qrys['slides'] as $lsn)
											{
												$lsn['iscomment']=$this->mcomment_model->getslidecommentcount($lsn['id']);
												// print_r($lsn['iscomment']);
												if($lsn['iscomment'] && $commentlsn!=0)
												{
													$commentlsn=$lsn['iscomment'];
													// break;
												}
												
											}
							$qrys['quiz'] = $this->mlesson_model->getquizforlesson($qry['id']);
							$qrys['iscomment']=$qrys['quiz'];

							
							$data['lessons'][$index]['slides']=$qrys['slides'];
							$data['lessons'][$index]['iscomment']=$commentlsn;
							$data['lessons'][$index]['quiz']=$qrys['quiz'];
							$index++;
						}

		$this->load->view('admin/course', $data); 
		
	}
	
	public function pending()
	{


		$data['lessons'] = $this->mcourse_model->getPendingLessons();
		$i=0;
		$slides=null;
		$index=0;
		$datas[]=null;
		$qrys[]=null;
		foreach($data['lessons'] as $qry)
						{
							reset($qrys);
							reset($datas);
							$slide[]=$qry;
							$qrys['slides'] = $this->mlesson_model->getslideforlesson($qry['id']);
							foreach($qrys['slides'] as $lsn)
											{
												$lsn['iscomment']=$this->mcomment_model->getslidecommentcount($lsn['id']);
												if($lsn['iscomment'])
												{
													break;
												}
											}
							$qrys['quiz'] = $this->mlesson_model->getquizforlesson($qry['id']);
							$qrys['iscomment']=$qrys['quiz'];

							
							// $qry['comments']=	$this->mcomment_model->getslidecommentcount($qry['id']);
							$datas[] = $qrys;
							// $data['lessons'][$qry['id']]=$datas;
							// echo $qry['id'];
							// print_r($qrys['slides']);
							// die();
							$data['lessons'][$index]['slides']=$qrys['slides'];
							$data['lessons'][$index]['quiz']=$qrys['quiz'];
							$index++;
						}
	
		$this->load->view('admin/course', $data);
	}
	
	public function draft()
	{
		

		$data['lessons'] = $this->mcourse_model->getDraftLessons();
		$i=0;
		$slides=null;
		$index=0;
		$datas[]=null;
		$qrys[]=null;
		foreach($data['lessons'] as $qry)
						{
							reset($qrys);
							reset($datas);
							$slide[]=$qry;
							$qrys['slides'] = $this->mlesson_model->getslideforlesson($qry['id']);
							foreach($qrys['slides'] as $lsn)
											{
												$lsn['iscomment']=$this->mcomment_model->getslidecommentcount($lsn['id']);
												if($lsn['iscomment'])
												{
													break;
												}
											}
							$qrys['quiz'] = $this->mlesson_model->getquizforlesson($qry['id']);
							$qrys['iscomment']=$qrys['quiz'];
							
							// $qry['comments']=	$this->mcomment_model->getslidecommentcount($qry['id']);
							$datas[] = $qrys;
							// $data['lessons'][$qry['id']]=$datas;
							// echo $qry['id'];
							// print_r($qrys['slides']);
							// die();
							$data['lessons'][$index]['slides']=$qrys['slides'];
							$data['lessons'][$index]['quiz']=$qrys['quiz'];
							$index++;
						}
		$this->load->view('admin/course', $data);
	}
	
	public function published()
	{
		// $data['lessons'] = $this->mcourse_model->getPublishedcourse();
		$data['lessons'] = $this->mcourse_model->getPublishedlessons();
		$i=0;
		$slides=null;
		$index=0;
		$datas[]=null;
		$qrys[]=null;
		foreach($data['lessons'] as $qry)
						{
							reset($qrys);
							reset($datas);
							$slide[]=$qry;
							$qrys['slides'] = $this->mlesson_model->getslideforlesson($qry['id']);
							foreach($qrys['slides'] as $lsn)
											{
												$lsn['iscomment']=$this->mcomment_model->getslidecommentcount($lsn['id']);
												if($lsn['iscomment'])
												{
													break;
												}
											}
							$qrys['quiz'] = $this->mlesson_model->getquizforlesson($qry['id']);
							$qrys['iscomment']=$qrys['quiz'];

							
							// $qry['comments']=	$this->mcomment_model->getslidecommentcount($qry['id']);
							$datas[] = $qrys;
							// $data['lessons'][$qry['id']]=$datas;
							// echo $qry['id'];
							// print_r($qrys['slides']);
							// die();
							$data['lessons'][$index]['slides']=$qrys['slides'];
							$data['lessons'][$index]['quiz']=$qrys['quiz'];
							$index++;
						}
		$this->load->view('admin/course', $data);
	}
	
	
	
	public function add()
	{	
		$this->form_validation->set_rules('course_name', 'Course name', 'trim|required');
        $this->form_validation->set_rules('no_lessons', 'Number of lessons', 'required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$course			= $this->security->xss_clean($this->input->post('course_name'));
			$course=explode('~',$course);
			$course_name 		= $course[1];
			$course_id 		= $course[0];
			$brief_desc 		= $this->security->xss_clean($this->input->post('brief_descnew'));
			$no_lessons 		= $this->security->xss_clean($this->input->post('no_lessons'));
			$publish_status 	= $this->security->xss_clean($this->input->post('publish_status'));
			if($this->crc_encrypt->decode($this->session->userdata('roll'))==0)
				{
					$user_type="Admin";
				}
				elseif($this->crc_encrypt->decode($this->session->userdata('user_type'))==1){
					$user_type="Trainer";
				}
				else{
					$user_type="Student";
				}
			$notification=array(
				'user'=>$this->crc_encrypt->decode($this->session->userdata('userid')),
				'name'=>$this->session->userdata('name'),
				'course'=>$course_name,
				'user_type'=>$user_type,
				'status'=>'Course Published'
	
			);
			$this->mnotification_model->insert_notification($notification);
			
			if(isset($_FILES['icon_file']) && !empty($_FILES['icon_file']['name']))
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
							echo "extension not allowed, please choose a JPEG or PNG file.";
							exit();
						}
					  
					if($file_size > 2097152)
						{
							$errors[]='File size must be less than 2 MB';
							echo 'File size must be less than 2 MB';
							exit();
						}
					  
					if(empty($errors)==true)
						{
							$target_dir_galry		=	"content/uploads/course/";
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
				
				$language = array();
				
				if (!empty($_POST['english']) && $this->input->post('english') == 'eng')
					{
						$language['english'] = '1';
					}
				else 
					{
						$language['english'] = '0';
					}
					
				if (!empty($_POST['arabic']) && $this->input->post('arabic') == 'arb')
					{
						$language['arabic'] = '1';
					}
				else 
					{
						$language['arabic'] = '0';
					}	
					
				if (!empty($_POST['urdu']) && $this->input->post('urdu') == 'urd')
					{
						$language['urdu'] = '1';
					}
				else 
					{
						$language['urdu'] = '0';
					}	
				
				if (!empty($_POST['pashto']) && $this->input->post('pashto') == 'pas')
					{
						$language['pashto'] = '1';
					}
				else 
					{
						$language['pashto'] = '0';
					}	
				
				if (!empty($_POST['malayalam']) && $this->input->post('malayalam') == 'mal')
					{
						$language['malayalam'] = '1';
					}
				else 
					{
						$language['malayalam'] = '0';
					}	
				
				
				if($publish_status == 'draft')
					{
						$publish_status = '1';
					}
				else 
					{
						$publish_status = '0';
					}					
				
				$insert_data = array(
								'course_id'		 =>$course_id,
								'course_name'	 =>	$course_name,
								'course_lang'	 =>	json_encode($language),
								'icon_file'		 =>	$target_file_galry,
								'course_desc'	 =>	$brief_desc,
								'lesson_no'		 =>	$no_lessons,
								'created_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
								'publish_status' => $publish_status
							);
				$query = $this->mcourse_model->insert_course($insert_data);
				if($query) 
				{		
					$response = array(
											'status'  => 'success',
											'message' => 'Course added successfully'
										);
					echo 'Course added successfully';
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'success',
											'message' => 'Sorry, we are not able to add this course now.'
										);
					echo 'Sorry, we are not able to add this course now.';
					exit();
				}	
		}
	}
	
	public function updatecourse()
	{
		$this->form_validation->set_rules('edit_course_name', 'Course name', 'trim|required');
        $this->form_validation->set_rules('edit_no_lessons', 'Number of lessons', 'required');
        if ($this->form_validation->run() == false) 
		{
			echo 'Form validation failed';
        } 
		else
		{
			$course_id 			    = $this->crc_encrypt->decode($this->security->xss_clean($this->input->post('edit_eid')));
			$course_name 			= $this->security->xss_clean($this->input->post('edit_course_name'));
			$brief_desc 			= $this->security->xss_clean($this->input->post('edit_brief_descnew'));
			$no_lessons 			= $this->security->xss_clean($this->input->post('edit_no_lessons'));
			$publish_status 		= $this->security->xss_clean($this->input->post('edit_publish_status'));
			$no_file_upload		 	= $this->security->xss_clean($this->input->post('no_file_upload'));
			
			if(isset($_FILES['edit_icon_file']) && !empty($_FILES['edit_icon_file']['name']))
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
							echo 'Extension not allowed, please choose a JPEG or PNG file.';
							exit();
						}
					  
					if($file_size > 2097152)
						{
							$errors[]='File size must be less than 2 MB';
							echo 'File size must be less than 2 MB';
							exit();
						}
					  
					if(empty($errors)==true)
						{
							$target_dir_galry		=	"content/uploads/course/";
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
				
				$language = array();
				
				if (!empty($_POST['edit_english']) && $this->input->post('edit_english') == 'eng')
					{
						$language['english'] = '1';
					}
				else 
					{
						$language['english'] = '0';
					}
					
				if (!empty($_POST['edit_arabic']) && $this->input->post('edit_arabic') == 'arb')
					{
						$language['arabic'] = '1';
					}
				else 
					{
						$language['arabic'] = '0';
					}	
					
				if (!empty($_POST['edit_urdu']) && $this->input->post('edit_urdu') == 'urd')
					{
						$language['urdu'] = '1';
					}
				else 
					{
						$language['urdu'] = '0';
					}	
				
				if (!empty($_POST['edit_pashto']) && $this->input->post('edit_pashto') == 'pas')
					{
						$language['pashto'] = '1';
					}
				else 
					{
						$language['pashto'] = '0';
					}	
				
				if (!empty($_POST['edit_malayalam']) && $this->input->post('edit_malayalam') == 'mal')
					{
						$language['malayalam'] = '1';
					}
				else 
					{
						$language['malayalam'] = '0';
					}	
				
				
				if($publish_status == 'draft')
					{
						$publish_status = '1';
					}
				else 
					{
						$publish_status = '0';
					}					
				
				$insert_data = array(
								'course_name'	 =>	$course_name,
								'course_lang'	 =>	json_encode($language),
								'icon_file'		 =>	$target_file_galry,
								'course_desc'	 =>	$brief_desc,
								'lesson_no'		 =>	$no_lessons,
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
								'publish_status' => $publish_status
							);
			 $query = $this->mcourse_model->update_course($course_id,$insert_data);
				// print_r($insert_data);
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
							'course'=>$course_name,
							'status'=>'Course Updated',
							'url'=>base_url().'admin/course/'
				
						);
				$this->mnotification_model->insert_notification($notification);	
					$response = array(
											'status'  => 'success',
											'message' => 'Course updated successfully'
										);
					echo 'Course updated successfully';
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'Failed',
											'message' => 'Sorry, we are not able to update this course now.'.$query
										);
					echo 'Sorry, we are not able to update this course now.';
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
				$query = $this->mcourse_model->delete_course($data);
				if($query) 
				{		
					echo 'Course deleted successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to delete this course now.';
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
				$query = $this->mcourse_model->update_status($id, $data);
				if($query) 
				{		
					echo 'Lesson approved.';
				}
				else 
				{
					echo 'Sorry, we are not able to approve this course now.';
				}
			}
			
		}
		public function draft_status()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'Sorry, we are not able to draft this course now.';	
			}
			else 
			{
				$id = $this->crc_encrypt->decode($id);
				$data = array('publish_status' => '0');
				$query = $this->mcourse_model->draft_status($id, $data);
				if($query) 
				{		
					echo 'Course drafted successfully.';
				}
				else 
				{
					echo 'Sorry, we are not able to draft this course now.';
				}
			}
			
		}
		
		
		
	public function getcoursebyid()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'empty_id';	
			}
			else 
			{
				$data = $this->crc_encrypt->decode($id);
				$query = $this->mcourse_model->getCourseid($data);
				if($query)
				{		
					$course_lang = json_decode($query[0]['course_lang']);
					if($course_lang->english == '1')
						{
							$language[] = '<button type="button" class="btn btn-danger btn-xs mr-5px">English</button>';
						}
										
					if($course_lang->arabic == '1')
						{
							$language[] = '<button type="button" class="btn btn-warning btn-xs mr-5px">Arabic</button>';
						}
										
					if($course_lang->urdu == '1')
						{
							$language[] = '<button type="button" class="btn btn-success btn-xs mr-5px">Urdu</button>';
						}
										
					if($course_lang->pashto == '1')
						{
							$language[] = '<button type="button" class="btn btn-primary btn-xs mr-5px">Pashto</button>';
						}
										
					if($course_lang->malayalam == '1')
						{
							$language[] = '<button type="button" class="btn btn-info btn-xs mr-5px">Malayalam</button>';
						}
					
					$html = '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 border-course">
								<img src="'.base_url().$query[0]['icon_file'].'" class="img-responsive" />
								<p class="txt-center">'.$query[0]['course_name'].'</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 border-course">
								<div class="attachment item-colors">
									<h5><strong>Course Name:</strong></h5>
									<p class="filename">
										'.$query[0]['course_name'].'
									</p>
								</div>
								<div class="attachment item-colors">
									<h5><strong>Course Language:</strong></h5>
									<p class="filename">
										'.implode(" ",$language).'
									</p>
								</div>
								<div class="attachment item-colors">
									<h5><strong>Course Description:</strong></h5>
									<p class="filename">
										'.$query[0]['course_desc'].'
									</p>
								</div>
								<div class="attachment item-colors">
									<h5><strong>No. of lessons:</strong></h5>
									<p class="filename">
										'.$query[0]['lesson_no'].'
									</p>
								</div>
							</div>';
							
					if(($query[0]['publish_status'] == '0' || $query[0]['publish_status'] == '1') && $this->session->role == 0)
						{
							$html .= 	'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<button type="button" class="btn btn-flat btn-success pull-right approve_course_main" data-id="'.$this->crc_encrypt->encode($query[0]['id']).'"><i class="fa fa fa-check"></i>&nbsp; Approve Course</button>
										</div>';
						}	
						
						if(($query[0]['publish_status'] == '2' ) && $this->session->role == 0)
						{
							$html .= 	'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<button type="button" class="btn btn-flat btn-danger pull-right deapprove_course_main" data-id="'.$this->crc_encrypt->encode($query[0]['id']).'"><i class="fa fa fa-check"></i>&nbsp; Make as draft</button>
										</div>';
						}
					
					$response = array(
								'status'	=> 'success',
								'html'		=> $html			
								);
					echo json_encode($response);
				}
				else 
				{
					$response = array(
								'status'	=> 'error',
								'html'		=> 'Unable to process data'			
								);
					echo json_encode($response);			
				}
			}
			
		}
		
	public function getcourse()
		{
			$id = $this->security->xss_clean($this->input->post('id'));
			if(empty($id))
			{
				echo 'empty_id';	
			}
			else 
			{
				$data = $this->crc_encrypt->decode($id);
				$query = $this->mcourse_model->getCourseid($data);
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

	public function getcourseforlessons($id)
		{
			if(empty($id))
			{
				echo 'empty_id';	
			}
			else 
			{
				$data = $this->crc_encrypt->decode($id);
				$query = $this->mcourse_model->getCourseid($data);
				if($query)
				{		
					echo json_encode($query[0]);
				}
				else 
				{
					echo 'error';
				}
			}
			
		}
		public function proxy($id)
		{

		}
			
		
		
		
}
