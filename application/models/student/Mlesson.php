<?php 
class Mlesson extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database(); 
		}
		
		function getAlllesson()
		{
			$query = $this->db->query("SELECT * FROM ad_lessons ORDER BY created_on ASC");	
			return $query->result_array();
		}
		// function getlessondetails($lesson_code,$language)
		// {
		// 	// $query = $this->db->query("SELECT * FROM ad_lessons WHERE lesson_code = '".$courseid."' AND language = '".$language."'");
		// 	$query = $this->db->query("SELECT * FROM ad_lessons WHERE lesson_code = '".$courseid."' ");	
		// 	return $query->result_array();
		// }
		function getlessondetails($lesson_code)
		{
			// $query = $this->db->query("SELECT * FROM ad_lessons WHERE lesson_code = '".$courseid."' AND language = '".$language."'");
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE lesson_id = '".$lesson_code."' ");	
			return $query->result_array();
		}
		function getlessonforcourse($courseid,$language)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE course_id = '".$courseid."' AND language = '".$language."' ORDER BY lesson_order ASC");	
			return $query->result_array();
		}
		
		function getlessonid($data)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE id = '".$data."'");	
			return $query->result_array();
		}
		function getslides($data)
		{
			$query = $this->db->query("SELECT * FROM ad_slides WHERE lesson_id = '".$data."'");	
			return $query->result_array();
		}
		function getcourselessons($indata)
		{
			$query = $this->db->query("Execute _sp_el_studentcoursedetails ?,?,?,?,?", $indata);
			return $query->result_array();
			// return $indata;
		}

	}	