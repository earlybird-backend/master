<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
	
	var $table = "";
	var $datestring = "%Y-%m-%d";
	var $dateStringWithTime = "%Y-%m-%d %H:%i:%s";
	var $currentDate = '';
    var $currentDateTime = '';
	
	public function __construct()    {
        parent::__construct();

        $this->db = $this->load->database('cisco',true);
		
    } 	
	
     // Get category
	public function getBoxById($Id='',$Status='')
	{ 
		$this->db->select('*');
		
		if($Id >0)
		{
		  $this->db->where('BoxId', $Id);
		}
		
		/*if($Status >0)
		{
		  $this->db->where('Status', $Status);
		}*/
		
		$query = $this->db->get('user_box_details');
		
		//print_r($this->db->last_query()); die;
		
		if($query->num_rows() >0 )
		{ 
			return $query->result_array();
			
		}else{ 
		
			return false;
		}
	}    
    
	public function editbox($Id='')
	{ 
		$data = array('BoxName' => $this->input->post('BoxName'),
						'BoxDescription' => $this->input->post('BoxDescription'),
						'BoxReminderDate' => date('Y-m-d',strtotime($this->input->post('BoxReminderDate')))
						
						
		);								
		$this->db->where('BoxId', $Id);
        $this->db->update('user_box_details', $data);
	}
	
	public function deleteBox($Id='')
	{ 
		
		$this->db->where('BoxId', $Id);
		$this->db->delete('user_box_details');
		
	}
	
	public function deleteBoxAllData($Id='')
	{ 
		
		$this->db->where('BoxId', $Id);
		$this->db->delete('user_box_data');
		
	}
	
	public function deleteBoxContent($Id='')
	{ 
		
		$this->db->where('DataId', $Id);
		$this->db->delete('user_box_data');
		
	}
		
}
