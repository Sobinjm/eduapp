<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->has_userdata('logged_in') || $this->session->userdata('logged_in') !== TRUE)
			{ 
				redirect('login');
			}
		$this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mlesson', 'mlesson_model');
		$this->load->model('admin/Mlesson', 'mlesson_model');
		$this->load->model('student/Mdashboard', 'mdashboard_model');	
	}
	
	public function index()
	{
		$this->load->view('front/lesson');
	}
	 
	public function view()
	{
		// print_r($this->session->userdata('student_no'));
		// die();
		$lesson_id = $this->crc_encrypt->decode($this->uri->segment(3));
		$lesson_code=$this->mlesson_model->getlesson_code($lesson_id);
		$lesson_code=$lesson_code['0']['lesson_id'];
		$data['result'] = $this->mlesson_model->getslideforlesson($lesson_id);
		$student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
		$student_no=$this->session->userdata('student_no');	
		$assigned_course = $this->mdashboard_model->getmycourses_code($student_no);
		
		// print_r($assigned_course);
		// $course_info = $this->mdashboard_model->course_info_code($assigned_course['0']['course_code']);
		// $assigned_course = $this->mdashboard_model->getmycourses($student_id);
		// $course_info = $this->mdashboard_model->course_info($assigned_course['0']['course']);
		// $data['course_info']=$course_info;
		// $newdata = array(
		// 	'course_info'  => $data['course_info']
		// );
		// $this->session->set_userdata($newdata);
		$data['lesson_data']=$this->mlesson_model->getlessonid($lesson_id);
		$data['lesson_code']=$lesson_code;
		$data['student_no']=$student_no;
		$assignment=$this->mlesson_model->getAssignmentForStudent($student_no);
		$lessons=json_decode($assignment['0']['total_lessons'], TRUE);
		$data['lessons']=$lessons;
		foreach($lessons as $val)
		{		
			if($val['LessonCode']==$lesson_code)
			{
				// echo $val['LessonCode'].'=='.$lesson_code;
		
				$data['current_slide']=$val['current_slide'];
				$data['completed_status']=$val['completed_status'];
			}
		}
		// echo $val['LessonCode'].'=='.$lesson_code;
		// echo $lesson_id;
		// die();
		// $data['slide_count']=$assigned_course[0]['slide_count'];
		// $data=$qry; 
		// print_r($data);
		$this->load->view('front/lesson',$data);
	}
	public function get_slide(){
  
		$student_id=$this->session->userdata('student_no');
		$slider_number=$_GET['slider_no'];
		$lesson_id=$_GET['ls_id'];
		$lesson_code=$this->mlesson_model->getlesson_code($lesson_id);
		$lesson_code=$lesson_code['0']['lesson_id'];
		$assignment=$this->mlesson_model->getAssignmentForStudent($student_id);
		$lessons=json_decode($assignment['0']['total_lessons'], TRUE);
		
		$i=0;
		foreach($lessons as $val)
		{	
		
			if($val['LessonCode']==$lesson_code)	
			{
				// echo $val['LessonCode'].'=='.$lesson_code;
				if($val['current_slide']>=$slider_number)
				{
					$lessons[$i]['current_slide']=$val['current_slide'];
				}
				else{
					$lessons[$i]['current_slide']=$slider_number-1;
				}
				
			}
			$i++;
		//	$val['current_slide']=$val['current_slide']+1;
		}
		//$lessons['1']['current_slide']=1;
		$lessons=json_encode($lessons);
		$assignment['0']['total_lessons']=$lessons;
		// print_r($assignment);
		// echo $assignment['0']['total_lessons'];
		// die();
		$up_array=array_reverse($assignment[0]);
		array_pop($up_array);
		// array_pop($assignment[0]);
		$assign_id=$assignment[0]['id'];
		$assignment[0]=array_reverse($up_array);
		$this->mlesson_model->updateAssignmentForStudent($assign_id,$assignment[0]);
		$assigned_course = $this->mdashboard_model->getmycourses($student_id); 
		$assigned_id=$assigned_course[0]['id']; 

		$slide_completed=$lesson_id."=>".$slider_number;
		$update_data=array(
			'slide_count'=>$slide_completed
		);
		$this->mlesson_model->update_slides($assigned_id,$update_data);
		$data['result'] = $this->mlesson_model->getslideforlesson($lesson_id);
	
		$data['sl_no']=$slider_number;
        $this->load->view('front/view_slider',$data); 
	}
	public function get_nextslide(){

		// $student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
		$student_id=$this->session->userdata('student_no');
		$assigned_course = $this->mdashboard_model->getmycourses($student_id);
		$assigned_id=$assigned_course[0]['id'];
		$slider_number=$_GET['slider_no'];
		$lesson_id=$_GET['ls_id'];
		$slide_completed=$lesson_id."=>".$slider_number;
		$update_data=array(
			'slide_count'=>$slide_completed
		);
		$this->mlesson_model->update_slides($assigned_id,$update_data);
		$data['result'] = $this->mlesson_model->getslideforlesson($lesson_id);
		$data['sl_no']=$slider_number;
        $this->load->view('front/view_slider',$data);
	}
	public function assignment()
	{
		$result['course_info']=$this->session->userdata('course_info');
		$lesson_id=$this->crc_encrypt->decode($this->uri->segment(3));
		$result['data']=$this->mlesson_model->getlessonid($lesson_id);
		$this->load->view('front/lesson_assignment',$result);
	}

	public function quizPreview()
	{
		$result['course_info']=$this->session->userdata('course_info');
		$lesson_id=$this->crc_encrypt->decode($this->uri->segment(3));
		$result['data']=$this->mlesson_model->getlessonid($lesson_id);
		$this->load->view('front/quiz_preview',$result);
	}
	
	
}
