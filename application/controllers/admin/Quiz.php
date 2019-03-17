<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mquiz', 'mquiz_model');		
	}
	
	
	public function add()
	{
		$quiz_lesson_id	= $this->security->xss_clean($this->input->post('quiz_lesson_id'));
		$quiz_type		= $this->security->xss_clean($this->input->post('quiz_type'));
		
		if(isset($quiz_lesson_id) && empty($quiz_lesson_id))
			{
				$response = array(
								'type' => 'error',
								'message' => 'Please select your lesson for quiz'	
							);
				echo json_encode($response);
				exit();
			}
			
		if(isset($quiz_type) && empty($quiz_type))
			{
				$response = array(
								'type' => 'error',
								'message' => 'Please select quiz type'	
							);
				echo json_encode($response);
				exit();
			}
			
			
		/* Quiz updation process here */	
		if($quiz_type == "true_or_false")	
			{
				$quiz_question	= $this->security->xss_clean($this->input->post('quiz_question'));
				$trf_answer		= $this->security->xss_clean($this->input->post('trf_answer'));
				
				if(isset($quiz_question) && empty($quiz_question))
				{
					$response = array(
									'type' => 'error',
									'message' => 'Please add your quiz question'	
								);
					echo json_encode($response);
					exit();
				}
				
				$insert_data = array(
								'lessonid'		 =>	$quiz_lesson_id,
								'quiz_type'		 =>	$quiz_type,
								'question'		 => $quiz_question,	
								'trueorfalse'	 =>	$trf_answer,
								'created_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
								'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid'))
							);
				$query = $this->mquiz_model->insert_quiz($insert_data);			
				if($query) 
				{		
					$response = array(
											'status'  => 'success',
											'message' => 'Quiz added successfully'
										);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'error',
											'message' => 'Sorry, we are not able to add this quiz now.'
										);
					echo json_encode($response);
					exit();
				}
			}
			
		if($quiz_type == "right_answer")	
			{
				$quiz_question	= $this->security->xss_clean($this->input->post('ra_question'));
				$select_media 	= $this->security->xss_clean($this->input->post('ra_media'));
				
				if(isset($quiz_question) && empty($quiz_question))
				{
					$response = array(
									'type' => 'error',
									'message' => 'Please add your quiz question'	
								);
					echo json_encode($response);
					exit();
				}
				
				if(isset($_FILES['ra_file']) AND !empty($_FILES["ra_file"]["name"]))
				{
					$errors		=	array();
					$file_name	=	$_FILES['ra_file']['name'];
					$file_size	=	$_FILES['ra_file']['size'];
					$file_tmp	=	$_FILES['ra_file']['tmp_name'];
					$file_type	=	$_FILES['ra_file']['type'];
					$file_ext	= 	pathinfo($file_name, PATHINFO_EXTENSION);
					
					if($select_media == 'video')
						{
							$target_dir_galry		=	"content/uploads/quiz/video/";
							$expensions				=	array("mp4","webm","ogv");
							$expression_text		=	"mp4,webm,ogv";
						}
					
					if($select_media == 'image')
						{
							$target_dir_galry		=	"content/uploads/quiz/image/";
							$expensions				=	array("jpeg","jpg","png","gif");
							$expression_text		=	"jpeg,jpg,png,gif";
						}
						
					if($select_media == 'audio')
						{
							$target_dir_galry		=	"content/uploads/quiz/audio/";
							$expensions				=	array("mp3","wav");
							$expression_text		=	"mp3,wav";
						}
					  
					if(in_array($file_ext,$expensions)=== false)
						{
							$errors	=	"File extension not allowed, please choose a ".$expression_text." file.";
							$response = array(
											'status'  => 'error',
											'message' => $errors
										);
							echo json_encode($response);
							exit();
						}
					
					
					if(empty($errors) == true)
						{
							$fileExt_galry			=	pathinfo($file_name, PATHINFO_EXTENSION);
							$randfileName_galry		=	$quiz_lesson_id . time() . rand() . "." . $fileExt_galry;
							$target_file_galry		=	$target_dir_galry . basename($randfileName_galry);
							$moveResult				=	move_uploaded_file($file_tmp,$target_file_galry);
							if(!$moveResult)
								{
									$errors	=	"File extension not allowed, please choose a JPEG or PNG file.";
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
							$response = array(
											'status'  => 'error',
											'message' => 'There are errors concerned with this file upload.'
										);
							echo json_encode($response);
							exit();
						}
				}
				
				$raa_answer 	= $this->security->xss_clean($this->input->post('raa_answer'));
				$rab_answer 	= $this->security->xss_clean($this->input->post('rab_answer'));
				$rac_answer 	= $this->security->xss_clean($this->input->post('rac_answer'));
				$rad_answer 	= $this->security->xss_clean($this->input->post('rad_answer'));
				
				$raa_correct_answer 	= $this->security->xss_clean($this->input->post('ra_correct_answer'));
				
				if($raa_correct_answer == 'a')
				{
					$ar_ans = 'yes';
				}
				else
				{
					$ar_ans = 'no';
				}
				
				if($raa_correct_answer == 'b')
				{
					$br_ans = 'yes';
				}
				else
				{
					$br_ans = 'no';
				}
				
				if($raa_correct_answer == 'c')
				{
					$cr_ans = 'yes';
				}
				else
				{
					$cr_ans = 'no';
				}
				
				if($raa_correct_answer == 'd')
				{
					$dr_ans = 'yes';
				}
				else
				{
					$dr_ans = 'no';
				}
				
				
				
				$ra_question = array(
									'a' => array(
											'question'	=>	$raa_answer,
											'answer'	=>	$ar_ans
										),
									
									'b' => array(
											'question'	=>	$rab_answer,
											'answer'	=>	$br_ans
										),
									
									'c' => array(
											'question'	=>	$rac_answer,
											'answer'	=>	$cr_ans
										),
									
									'd' => array(
											'question'	=>	$rad_answer,
											'answer'	=>	$dr_ans
										)
								);
								
					$insert_data = array(
										'lessonid'		 =>	$quiz_lesson_id,
										'quiz_type'		 =>	$quiz_type,
										'question'		 => $quiz_question,	
										'mediatype'	 	 =>	$select_media,
										'upload_media'	 =>	$target_file_galry,
										'right_answer'	 =>	json_encode($ra_question),
										'created_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
										'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid'))
									);
				$query = $this->mquiz_model->insert_quiz($insert_data);			
				if($query) 
				{		
					$response = array(
										'status'  => 'success',
										'message' => 'Quiz added successfully'
									);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
										'status'  => 'error',
										'message' => 'Sorry, we are not able to add this quiz now.'
									);
					echo json_encode($response);
					exit();
				}
			}
			
		if($quiz_type == "drag_and_drop")	
			{
				$dada_questiom	= $this->security->xss_clean($this->input->post('dada_questiom'));
				$dadb_questiom	= $this->security->xss_clean($this->input->post('dadb_questiom'));
				$dadc_questiom	= $this->security->xss_clean($this->input->post('dadc_questiom'));
				
				$dada_answer	= $this->security->xss_clean($this->input->post('dada_answer'));
				$dadb_answer	= $this->security->xss_clean($this->input->post('dadb_answer'));
				$dadc_answer	= $this->security->xss_clean($this->input->post('dadc_answer'));
				
				$dad_options	=	array(
										'question_one' => array(
															'question' 			=>	$dada_questiom,
															'matching_answer' 	=>	$dada_answer
															),
										'question_two' => array(
															'question' 			=>	$dadb_questiom,
															'matching_answer' 	=>	$dadb_answer
															),
										'question_three' => array(
															'question' 			=>	$dadc_questiom,
															'matching_answer' 	=>	$dadc_answer
															)
										);
										
				$insert_data = array(
										'lessonid'		 =>	$quiz_lesson_id,
										'quiz_type'		 =>	$quiz_type,
										'drag_drop'	 	 =>	json_encode($dad_options),
										'created_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
										'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid'))
									);
				$query = $this->mquiz_model->insert_quiz($insert_data);			
				if($query) 
				{		
					$response = array(
										'status'  => 'success',
										'message' => 'Quiz added successfully'
									);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
										'status'  => 'error',
										'message' => 'Sorry, we are not able to add this quiz now.'
									);
					echo json_encode($response);
					exit();
				}
			}
			
		if($quiz_type == "reorder")	
			{
				$reoa_answer	= $this->security->xss_clean($this->input->post('reoa_answer'));
				$reob_answer	= $this->security->xss_clean($this->input->post('reob_answer'));
				$reoc_answer	= $this->security->xss_clean($this->input->post('reoc_answer'));
				$reod_answer	= $this->security->xss_clean($this->input->post('reod_answer'));
				
				$redorder_question = array(
										'1' => $reoa_answer,	
										'2' => $reob_answer,	
										'3' => $reoc_answer,	
										'4' => $reod_answer	
										);
				
				$insert_data = array(
										'lessonid'		 =>	$quiz_lesson_id,
										'quiz_type'		 =>	$quiz_type,
										'reorder'	 	 =>	json_encode($redorder_question),
										'created_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid')),
										'updated_by'	 =>	$this->crc_encrypt->decode($this->session->userdata('userid'))
									);
				$query = $this->mquiz_model->insert_quiz($insert_data);			
				if($query) 
				{		
					$response = array(
										'status'  => 'success',
										'message' => 'Quiz added successfully'
									);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
										'status'  => 'error',
										'message' => 'Sorry, we are not able to add this quiz now.'
									);
					echo json_encode($response);
					exit();
				}
				
			}
	}	
	
	
}	