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
	}	