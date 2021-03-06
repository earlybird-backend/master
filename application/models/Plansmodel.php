<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PlansModel extends CI_Model {

	
	var $table = "customer_early_pay_plans";
	var $datestring = "%Y-%m-%d";
	var $dateStringWithTime = "%Y-%m-%d %H:%i:%s";
	var $currentDate = '';
    var $currentDateTime = '';
	
	
	public function __construct()
    {
        parent::__construct();
		
		$this->currentDate = mdate($this->datestring, time());
        $this->currentDateTime = mdate($this->dateStringWithTime, time());
		
    } 
	
	public function getPlanList($search_data = null, $num = "", $offset = "") {

        $this->db->select('*');
        $this->db->from('customer_early_pay_plans');

        if ($search_data != null && $search_data != "") {
            $this->db->or_like($search_data);
        }
        //$this->db->where('Role', 'supplier');
        $this->db->order_by('PlanId', 'ASC');
        if ($num != "" || $offset != "") {
            $this->db->limit($num, $offset);
        }
        $query = $this->db->get();
        $rec = $query->result_array();
        return $rec;
    }
	
	
	// Get plan by id
    public function getPlanById($PlanId='') {
		
        $this->db->select('*');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }

        $query = $this->db->get('customer_early_pay_plans');
		//print_r($this->db->last_query()); die;
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }
	
	
	// Get plan by id
    public function getPlanByCustomerId($PlanId='', $CustomerId='') {
		
        $this->db->select('*');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }
		
		if ($CustomerId > 0) {
            $this->db->where('CustomerId', $CustomerId);
        }
		
        $query = $this->db->get('customer_early_pay_plans');
		//print_r($this->db->last_query()); die;
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }
	
	public function getVendorsByPlanId($PlanId='') {
		$this->db->select('*');
		//$this->db->select('SUM(`InvAmount`) AS InvAmount');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }
		
		$this->db->group_by('Vendorcode');
		
        $query = $this->db->get('payable_supplier_by_customer');
		//print_r($this->db->last_query()); die;
		//
		
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
	}
	
	public function getSupplierVendorsByPlanId($PlanId='') {
		$this->db->select('*');
		
		if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }
		
		$query = $this->db->get('supplier_by_customer');
		//print_r($this->db->last_query()); die;
		//
		
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
	}
	
	
	
	
	
	// Get plan by id
    public function getWinnersPlanById($PlanId='') {
		
        $this->db->select('CustomerId,PlanId,Vendorcode,PaymentCopy');
		$this->db->select('SUM(`InvAmount`) AS InvAmount');
		$this->db->select('COUNT(`WinnerId`) AS InvCount');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }
		
		$this->db->group_by('CustomerId,PlanId,Vendorcode,PaymentCopy');
		
        $query = $this->db->get('winners');
		//print_r($this->db->last_query()); die;
		//
		
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }
	
	public function getAllWinnersById($PlanId='') {
		
        $this->db->select('*');
		//$this->db->select('SUM(`InvAmount`) AS InvAmount');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }
		
		$this->db->group_by('Vendorcode');
		
        $query = $this->db->get('winners');
		//print_r($this->db->last_query()); die;
		//
		
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }
    
	public function getAllWinnersByIds($PlanId='') {
		
        $this->db->select('*');
		//$this->db->select('SUM(`InvAmount`) AS InvAmount');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }
		
		//$this->db->group_by('Vendorcode');
		
        $query = $this->db->get('winners');
		//print_r($this->db->last_query()); die;
		//
		
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }
	
	
	public function getPlanReportById($PlanId='') {
		
        $this->db->select('*');

        if ($PlanId > 0) {
            $this->db->where('PlanId', $PlanId);
        }

        $query = $this->db->get('proposal_report_by_admin');
		//print_r($this->db->last_query()); die;
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }

	public function updateplan($planid)
    {
	   /*$data = array('JobName' => $this->input->post('JobName'),
	   'Name' => $this->input->post('Name'),
	   'UpdatedDate' => $this->currentDateTime);*/
	   
	   $data = array('CurrencyType' => $this->input->post('CurrencyType'),
	   'MinAPRPercent' => $this->input->post('MinAPRPercent'),
	   'ExpectAPRRate' => $this->input->post('ExpectAPRRate'),
	   'ExpectAPRPercent' => $this->input->post('ExpectAPRPercent'),
	   'EarlyPayAmount' => $this->input->post('EarlyPayAmount'),
	   'EstimatePayDate' => date('Y-m-d H:i:s',strtotime($this->input->post('EstimatePayDate')))
	   );
		$this->db->where('PlanId', $planid);
        $this->db->update('customer_early_pay_plans', $data);
		//print_r($this->db->last_query()); die;
		
    }
}
