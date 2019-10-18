<?php 
class Mnotification extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
        }
        function insert_notification($insert_data)
		{
			$this->db->insert('notifications',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
        }
    function getNotifications()
		{
			$query = $this->db->query("SELECT * FROM notifications ORDER BY id DESC");	
			return $query->result_array(); 
		}
		function getTrainerNotifications()
		{
			$query = $this->db->query("SELECT * FROM notifications where status <>'Login' ORDER BY id DESC");	
			return $query->result_array();
		}

		function getNotificationsCount()
		{
			$query = $this->db->query("SELECT count(*) as count FROM notifications");	
			return $query->result_array(); 
		}
        
    }