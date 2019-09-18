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
		function getQuizById($quizid)
		{
			$query = $this->db->query("SELECT * FROM ad_quiz WHERE quiz_id = '".$quizid."' ORDER BY quiz_id ASC");	
			return $query->result_array();
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
		function update_quiz($id,$up_data){
			$this->db->where('quiz_id',$id);
			$this->db->update('ad_quiz',$up_data);
			$op="updated";
			return $op;
			// return $query->result_array();
		}
		function delete_quiz($data)
		{
			$this->db->delete('ad_quiz',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}

	
		
		
		
		
		
	}	