<?php 
class Madmin extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function checkEmail($email)
		{
			$query = $this->db->query("SELECT *,COUNT(*) as total FROM ad_staff WHERE email = '".$email."'");	
			return $query->result_array(); 
		}
		
		function checkPassword($email,$password)
		{
			$query = $this->db->query("SELECT COUNT(*) as total,* FROM ad_staff WHERE email = '".$email."' AND password = '".$password."'");	
			return $query->result_array(); 
		}
		
		
		function getAlladmin()
		{
			$query = $this->db->query("SELECT * FROM ad_staff WHERE role = 0 ORDER BY created_time DESC");	
			return $query->result_array();
		}
		
		function insert_staff($insert_data)
		{
			$this->db->insert('ad_staff',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_staff_passwd($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_staff',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_staff($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_staff',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
		
		function delete_staff($data)
		{
			$this->db->delete('ad_staff',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function getStaff($data)
		{
			$query = $this->db->query("SELECT name, email, contact_number FROM ad_staff WHERE id = '".$data."'");	
			return $query->result_array();
		}
		
		
	}