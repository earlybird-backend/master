<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackageModel extends CI_Model {

	
	var $table = "storageplans";
	var $datestring = "%Y-%m-%d";
	var $dateStringWithTime = "%Y-%m-%d %H:%i:%s";
	var $currentDate = '';
    var $currentDateTime = '';
	
	
	public function __construct()
    {
        parent::__construct();
		
		$this->currentDate = mdate($this->datestring, time()) ;
        $this->currentDateTime = mdate($this->dateStringWithTime, time()) ;
		
    } 
	
	// Get category
	public function getPackageById($Id='',$Status='')
	{ 
		$this->db->select('*');
		
		if($Id >0)
		{
		  $this->db->where('PlanId', $Id);
		}
		
		/*if($Status >0)
		{
		  $this->db->where('Status', $Status);
		}*/
		
		$query = $this->db->get($this->table);
		
		//print_r($this->db->last_query()); die;
		
		if($query->num_rows() >0 )
		{ 
			return $query->result_array();
			
		}else{ 
		
			return false;
		}
	}
	
	
	// Get category
	public function getDiscountById($Id='',$Status='')
	{ 
		$this->db->select('*');
		
		if($Id >0)
		{
		  $this->db->where('DiscountId', $Id);
		}
		
		/*if($Status >0)
		{
		  $this->db->where('Status', $Status);
		}*/
		
		$query = $this->db->get('discountsettings');
		
		//print_r($this->db->last_query()); die;
		
		if($query->num_rows() >0 )
		{ 
			return $query->result_array();
			
		}else{ 
		
			return false;
		}
	}
	
	
	
	// get package
public function getPackageAdmin($search_data = NULL,$where = NULL,$order_by=NULL, $num = NULL, $offset = NULL)
{
  	$this->db->select('*');
	$this->db->from('storageplans');
	
	if($search_data != NULL && $search_data != "")
	{
	  $this->db->or_like($search_data);
	}
	
	if($where != NULL)
	{
		$this->db->where($where);
	}
	
	if($num != NULL || $offset != NULL)
	{
		$this->db->limit($num, $offset);
	}
	
	if($order_by)
	{
	   $this->db->order_by($order_by[0], $order_by[1]);
	}	
	else
	{
	   $this->db->order_by('storageplans.PlanId', 'DESC');
	}
	
	$query = $this->db->get();
		
	//print_r($this->db->last_query());
			
	if($query->num_rows() > 0 )
	{ 
		return $query->result_array();
		
	}else
	{ 
		return false;
	}
  
 

}
	// Get Package
	//
	
public function getDiscountAdmin($search_data = NULL,$where = NULL,$order_by=NULL, $num = NULL, $offset = NULL)
{
  	$this->db->select('*');
	$this->db->from('discountsettings');
	
		
	if($search_data != NULL && $search_data != "")
	{
	  $this->db->or_like($search_data);
	}
	
	if($where != NULL )
	{
		$this->db->where($where);
	}
	
	if($num != NULL || $offset != NULL)
	{
		$this->db->limit($num, $offset);
	}
	
	if($order_by)
	{
	   $this->db->order_by($order_by[0], $order_by[1]);
	}	
	else
	{
	   $this->db->order_by('discountsettings.DiscountId', 'DESC');
	}
	
	$query = $this->db->get(); 
		
	//print_r($this->db->last_query()); die;
			
	if($query->num_rows() > 0 )
	{ 
		return $query->result_array();
		
	}else{ 
	
		return false;
	}
  
 

}	
	
	// Delete category
	public function deletePackage($Id='')
	{ 
		
		$this->db->where('PlanId', $Id);
		$this->db->delete($this->table);
		
	}
	
	// Delete category
	public function deleteDiscount($Id='')
	{ 
		
		$this->db->where('DiscountId', $Id);
		$this->db->delete('discountsettings');
		
	}
	
	public function addPackage()
	{ 
		
		$data = array('PlanCategory' => $this->input->post('PlanCategory'),
						'PlanName' => $this->input->post('PlanName'),
						'PlanSpace' => $this->input->post('PlanSpace'),
						'PlanCost' => $this->input->post('PlanCost'),
						'PlanUSDCost' => $this->input->post('PlanUSDCost')
		);	
        $this->db->insert($this->table, $data);
		
	}
	
	public function addDiscount()
	{ 
		
		$data = array('PlanDuration' => $this->input->post('PlanDuration'),
						'DurationType' => $this->input->post('DurationType'),
						'PlanDiscount' => $this->input->post('PlanDiscount')
						
		);	
        $this->db->insert('discountsettings', $data);
		
	}
	
	public function editPackage($Id='')
	{ 
		$data = array('PlanCategory' => $this->input->post('PlanCategory'),
						'PlanName' => $this->input->post('PlanName'),
						'PlanSpace' => $this->input->post('PlanSpace'),
						'PlanCost' => $this->input->post('PlanCost'),
						'PlanUSDCost' => $this->input->post('PlanUSDCost')
						
		);								
		$this->db->where('PlanId', $Id);
        $this->db->update($this->table, $data);
	}
	
	public function editBox($Id='')
	{ 
		$data = array('PlanDuration' => $this->input->post('PlanDuration'),
						'DurationType' => $this->input->post('DurationType'),
						'PlanDiscount' => $this->input->post('PlanDiscount')
						
		);								
		$this->db->where('DiscountId', $Id);
        $this->db->update('discountsettings', $data);
	}
	
	
public function getPlanId($PlanTitle = 'Free',$PlanType = 'Listing',$UserType='Seeker')
{
	 $this->db->select('Id');
	 $where = array('PlanTitle'=>$PlanTitle,'PlanType'=>$PlanType,'UserType'=>$UserType);
	 $this->db->where($where); 
	 $query = $this->db->get('paymentplan'); 
	 $result = $query->result_array();
	 return $result[0]['Id'];

}



public function getPlan()
{
	 $this->db->select('*');
	 $this->db->from('storageplans');
	 $query = $this->db->get();
	 return $query->result_array();	
}


public function getPlanSettings($table)
	{ 
		
		
		/*if($this->uri->segment(1)=='ch')
		{	
			$this->db->select('PlanCost');
			$where = array('PlanCategory' => 'ch');
			
		}
		else
		{
			$this->db->select('PlanUSDCost');
			$where = array('PlanCategory' => 'en');
		}*/
		
		$this->db->select('PlanUSDCost');
		$where = array('PlanCategory' => 'en');
		$query = $this->db->get($table);
		
		//print_r($this->db->last_query()); die;	
				
		if($query->num_rows() > 0 )
		{ 
			return $query->result_array();
			
		}else{ 
		
			return array();
		}
	

	}

	
}
