<?php 
class Mquiz extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function getQuiz()
		{
			$query = $this->db->query("SELECT * FROM ad_quiz ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		function insert_quiz($insert_data)
		{
			$this->db->insert('ad_quiz',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
		
		
	}	