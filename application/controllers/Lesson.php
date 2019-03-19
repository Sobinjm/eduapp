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
		$this->load->model('student/Mdashboard', 'mdashboard_model');	
	}
	
	public function index()
	{
		$this->load->view('front/lesson');
	}
	
	public function view()
	{
		$lesson_id = $this->crc_encrypt->decode($this->uri->segment(3));
		$data['result'] = $this->mlesson_model->getslideforlesson($lesson_id);
		$student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
		$assigned_course = $this->mdashboard_model->getmycourses($student_id);
		$course_info = $this->mdashboard_model->course_info($assigned_course['0']['course']);
		$data['course_info']=$course_info;
		$data['lesson_data']=$this->mlesson_model->getlessonid($lesson_id);
		// $data=$qry;
		$this->load->view('front/lesson',$data);
	}
	public function get_slide(){

		$student_id	= $this->crc_encrypt->decode($this->session->userdata('userid'));
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
		$lesson_id=$this->crc_encrypt->decode($this->uri->segment(3));
		$this->load->view('front/lesson_assignment');
	}
	
	
}
