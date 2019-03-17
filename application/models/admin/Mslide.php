<?php 
class Mslide extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function getAlllesson()
		{
			$query = $this->db->query("SELECT * FROM ad_lessons ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		function insert_slide($insert_data)
		{
			$this->db->insert('ad_slides',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_slide($update_data,$edit_slideid)
		{
			$this->db->where('id', $edit_slideid); 
			$this->db->update('ad_slides',$update_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function delete_lesson($data)
		{
			$this->db->delete('ad_slides',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
		function getlessonforcourse($courseid,$language)
		{
			$query = $this->db->query("SELECT * FROM ad_slides WHERE course_id = '".$courseid."' AND language = '".$language."' ORDER BY lesson_order ASC");	
			return $query->result_array();
		}
		
		function getlessonid($data)
		{
			$query = $this->db->query("SELECT * FROM ad_slides WHERE id = '".$data."'");	
			return $query->result_array();
		}
		
	}