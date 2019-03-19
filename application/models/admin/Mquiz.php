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
		function getQuizForLesson($lessonid)
		{
			$query = $this->db->query("SELECT * FROM ad_quiz WHERE lessonid = '".$lessonid."' ORDER BY quiz_id ASC");	
			return $query->result_array();
		}

		function update_score($id,$up_data){
			$this->db->where('id',$id);
			$this->db->update('ad_assignments',$up_data);
			// return $query->result_array();
		}

	
		
		
		
		
		
	}	