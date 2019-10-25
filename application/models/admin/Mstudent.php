<?php 
class Mstudent extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function checkEmail($email)
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE email = '".$email."'");	
			return $query->result_array(); 
		}
		
		function checkPassword($email,$password)
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE email = '".$email."' AND password = '".$password."'");	
			return $query->result_array(); 
		}
		
		function getAlladmin()
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE role = 0 ORDER BY created_time DESC");	
			return $query->result_array();
		}
		
		function getProfileInformation($student_id)
		{
			$query = $this->db->query("SELECT * FROM ad_student WHERE id = '".$student_id."'");	
			return $query->result_array();
		}
		
		function getallmylessons($courseid)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE course_id = '".$courseid."' ORDER BY lesson_order ASC");	
			return $query->result_array();
		}
		
		function getAssignedCourse($student_id)
		{
			$query = $this->db->query("SELECT a.*,b.* FROM ad_assignments a,ad_course b WHERE a.student_id = '".$student_id."' AND a.status != 2 AND a.course = b.id");	
			return $query->result_array();
		}
		
		function getallcourse()
		{
			$query = $this->db->query("SELECT * FROM ad_course ORDER BY id ASC");	
			return $query->result_array();
		}
		
		function assign_course($insert_data)
		{
			$this->db->insert('ad_assignments',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		function check_assignment($data)
		{
			$query = $this->db->query("SELECT * FROM ad_assignments where course_code='".$data."' ORDER BY id ASC");	
			return $query->result_array();
		}
		
		function insert_staff($insert_data)
		{
			$this->db->insert('ad_student',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		function insert_student($insert_data)
		{
			$this->db->insert('ad_student',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
		}
		
		function update_staff_passwd($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_student',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_staff($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_student',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function delete_staff($data)
		{
			$this->db->delete('ad_student',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function getStaff($data)
		{
			$query = $this->db->query("SELECT name,email,student_idno,emirates_idno,contact_number FROM ad_student WHERE id = '".$data."'");	
			return $query->result_array();
		}
		
		
	}