<?php 
class Mcourse extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function getAllcourse()
		{
			$query = $this->db->query("SELECT * FROM ad_course ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		function getPendingcourse()
		{
			$query = $this->db->query("SELECT * FROM ad_course WHERE publish_status = '0' ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		function getDraftcourse()
		{
			$query = $this->db->query("SELECT * FROM ad_course WHERE publish_status = '1' ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		function getPublishedcourse()
		{
			$query = $this->db->query("SELECT * FROM ad_course WHERE publish_status = '2' ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		
		
		function insert_course($insert_data)
		{
			$this->db->insert('ad_course',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_staff_passwd($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_student',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_status($id, $up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_course',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
		
		function update_course($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_course',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
		
		function delete_course($data)
		{
			$this->db->delete('ad_course',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function getCourseid($data)
		{
			$query = $this->db->query("SELECT * FROM ad_course WHERE id = '".$data."'");	
			return $query->result_array();
		}
		
		function getcourseforlessons($data)
		{
			$query = $this->db->query("SELECT * FROM ad_course WHERE id = '".$data."'");	
			return $query->result_array();
		}
		
		
		
		
	}