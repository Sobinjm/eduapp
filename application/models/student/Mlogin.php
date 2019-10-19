<?php 
class Mlogin extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function checkEmail($email)
		{
			$query = $this->db->query("SELECT *  FROM ad_student WHERE email = '".$email."' ");	
			return $query->result_array(); 
		}
		function checkStudent($sno)
		{
			$query = $this->db->query("SELECT *  FROM ad_student WHERE student_idno = '".$sno."' ");	
			return $query->result_array(); 
		}
		
		function checkPassword($email,$password )
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE email = '".$email."' AND password = '".$password."'");	
			return $query->result_array(); 
		}
		
		
		function validate($studentNo,$trafficNo,$fileNo,$branchNo)
		{
			$query = $this->db->query("execute _sp_el_studentauth ".$studentNo.",'".$trafficNo."','".$fileNo."',".$branchNo." ");	
			return $query->result_array();
		}
		
		
		function getAllstudent()
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE role = 0");	
			return $query->result_array();
		}
		
	}