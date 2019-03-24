<?php 
class Mcomment extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		
		
		function insert_comment($insert_data)
		{
			$this->db->insert('ad_slide_comments',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
	
		function delete_comment($data)
		{
			$this->db->delete('ad_slide_comments',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		// function update_status($id,$update_data){
		// 	$this->db->where('id',$id);
		// 	$this->db->update('ad_slide_comments',$update_data);
		// }
		function update_status($id,$up_data){
			$this->db->where('id',$id);
			$this->db->update('ad_slide_comments',$up_data);
			return ($this->db->affected_rows() == 0) ? false : true;
			
		}
		
		
	
		function getslidecomment($slideid)
		{
			$query = $this->db->query("SELECT a.*,b.name FROM ad_slide_comments a, ad_staff b WHERE a.added_by = b.id AND a.slide_id = '".$slideid."' ORDER BY a.id ASC");	
			return $query->result_array();
		}
		
		function update_comment($id,$up_data){
			$this->db->where('id',$id);
			$this->db->update('ad_slide_comments',$up_data);
			
		}

		
	}