<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') && $this->session->userdata('logged_in') !== TRUE && $this->session->userdata('student') == TRUE)
			{ 
				redirect('admin/login');
			}
		$this->load->model('admin/Mcourse', 'mcourse_model');
		$this->load->model('admin/Mlesson', 'mlesson_model');	
		$this->load->model('admin/Mcomment', 'mcomment_model');		
	}
		
	public function index()
	{
		$this->load->view('admin/lesson');
	}
	
	public function add()
	{
        $this->form_validation->set_rules('new_comment', 'Comment', 'trim|required');

        $comment            = $this->security->xss_clean($this->input->post('new_comment'));
        $slide_id 			= $this->security->xss_clean($this->input->post('slide_id'));
        // $added_by 			= $this->session->userdata('userid');
        $added_by =$this->security->xss_clean($this->input->post('added_by'));
        
        
        $insert_data = array(
            'slide_id'	 =>	$slide_id,
            'comment'		 =>	$comment,
            'added_by'		 => $added_by
        );
        $query = $this->mcomment_model->insert_comment($insert_data);
        if($query) 
        {		
        $response = array(
                                'status'  => 'success',
                                'message' => 'Comment added successfully'
                            );
        echo json_encode($response);
        exit();
        }
        else 
        {
        $response = array(
                                'status'  => 'success',
                                'message' => 'Sorry, we are not able to add this comment now.'
                            );
        echo json_encode($response);
        exit();
        }
    }
    
    public function update()
	{
        $id=$_GET['id'];
        $sts=$_GET['status'];		
				$update_data = array(
								'status'	 =>	$sts
							);
				$query = $this->mcomment_model->update_status($id,$update_data);
				if($query) 
				{		
					$response = array(
											'status'  => 'success',
											'message' => 'Comment status updated'
										);
					echo json_encode($response);
					exit();
				}
				else 
				{
					$response = array(
											'status'  => 'success',
											'message' => 'Sorry, we are not able to update comment status.'
										);
					echo json_encode($response);
					exit();
				}	
		
	}
	
	
	
		
	
}
