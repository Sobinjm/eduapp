<?php 
class Mdashboard extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function studentinfo($student_id)
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE id = '".$student_id."'");	
			return $query->result_array();
		}
		
		function getmycourses($student_id)
		{
			$query = $this->db->query("SELECT * FROM ad_assignments WHERE student_id = '".$student_id."'");	
			return $query->result_array();
		}
		
		
		
		function course_info($course_id)
		{
			$query = $this->db->query("SELECT * FROM ad_course WHERE id = '".$course_id."'");	
			return $query->result_array();
		}
		
		function getalllessons($course_id)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE course_id = '".$course_id."' AND publish_status = 2 ORDER BY lesson_order ASC");	
			return $query->result_array();
		}
		function getalllessonsbylang($course_id,$language)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE course_id = '".$course_id."' AND publish_status = 2 AND language='".$language."' ORDER BY lesson_order ASC");	
			return $query->result_array();
		}
		
	}	