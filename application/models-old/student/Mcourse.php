<?php


class Mcourse extends CI_Model
{
 public function __construct() 
	{
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
			$query = $this->db->query("SELECT * FROM ad_course WHERE publish_status = '2' LIMIT 1");
           			
			return $query->result_array();
		}
	
	
}