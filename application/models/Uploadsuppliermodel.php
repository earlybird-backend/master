<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UploadsupplierModel extends CI_Model {

    var $table = "supplier_by_customer";
    var $datestring = "%Y-%m-%d";
    var $dateStringWithTime = "%Y-%m-%d %H:%i:%s";
    var $currentDate = '';
    var $currentDateTime = '';

    public function __construct() {
        parent::__construct();
        $this->load->library('csvreader');
        $this->currentDate = mdate($this->datestring, time());
        $this->currentDateTime = mdate($this->dateStringWithTime, time());
    }

    // Get category
    public function getCsvdata_old() {
        $fname = $_FILES['File']['name'];
        $chk_ext = explode(".", $fname);
        $filename = $_FILES['File']['tmp_name'];
        $resultcsv = $this->csvreader->parse_file($_FILES['File']['tmp_name'], true);

        foreach ($resultcsv as $key => $records) {
            $columns = array();

            $columns['Email'] = $records[9];
            if (!$this->checkEmailId($records[9]) || $this->checkEmailId($records[9]) == '') {
                $Id = $this->UniversalModel->save($this->table, $columns, NULL, NULL);
            }
        }

        return true;
    }

// Get category
    public function getCsvdata() {
        $fname = $_FILES['File']['name'];
        $chk_ext = explode(".", $fname);
        $filename = $_FILES['File']['tmp_name'];
        $row = 0;
        $rec = array();
        if (($handle = fopen($_FILES['File']['tmp_name'], "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    $rec[] = $data;
                }
            }
            fclose($handle);
        }
        //echo $resultcsv[0]; die;
        for ($i = 0; $i < count($rec); $i++) {
            if ($rec[$i][0] != '') {
                $columns = array();
                $columns['Email'] = $rec[$i][9];
                if (!$this->checkEmailId($rec[$i][9]) || $this->checkEmailId($rec[$i][9]) == '') {
                    $Id = $this->UniversalModel->save($this->table, $columns, NULL, NULL);
                }
            }
        }

        return true;
    }

    public function checkEmailId($EmailId = '', $Vendorcode = '', $InvoiceId = '', $PlanId = '', $CustomerId = '') {
        $this->db->select('*');

        if ($EmailId) {
            $this->db->where('Email', $EmailId);
        }

        if ($Vendorcode) {
            $this->db->where('Vendorcode', $Vendorcode);
        }
		
		if ($InvoiceId) {
            $this->db->where('InvoiceId', $InvoiceId);
        }
		
		if ($PlanId) {
            $this->db->where('PlanId', $PlanId);
        }
		
        if ($CustomerId) {
            $this->db->where('CustomerId', $CustomerId);
        }

        $query = $this->db->get('payable_supplier_by_customer');
		//print_r($this->db->last_query()); die;
		
        if ($query->num_rows() > 0) {
            return true;
        } else {

            return false;
        }
    }

    public function checkWinners($Vendorcode = '', $InvoiceId = '', $PlanId = '', $CustomerId = '') {
        $this->db->select('*');

       

        if ($Vendorcode) {
            $this->db->where('Vendorcode', $Vendorcode);
        }
		
		if ($InvoiceId) {
            $this->db->where('InvoiceId', $InvoiceId);
        }
		
		if ($PlanId) {
            $this->db->where('PlanId', $PlanId);
        }
		
        if ($CustomerId) {
            $this->db->where('CustomerId', $CustomerId);
        }



        $query = $this->db->get('winners');
		//print_r($this->db->last_query()); die;
		
        if ($query->num_rows() > 0) {
            return true;
        } else {

            return false;
        }
    }

    public function checkSupplierId($CollegeId = '') {
        $this->db->select('*');

        if ($CollegeId) {
            $this->db->like('CollegeId', $CollegeId);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows > 0) {
            return true;
        } else {

            return false;
        }
    }

    public function checkAddress($Address = '') {
        $this->db->select('*');

        if ($EmailId) {
            $this->db->like('Address', $Address);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows > 0) {
            return true;
        } else {

            return false;
        }
    }

    public function getid($EmailId) {

        $this->db->select('Id');

        if ($EmailId) {
            $this->db->like('Email', $EmailId);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows > 0) {
            $result = $query->result_array();
            return $result[0]['Id'];
        } else {

            return false;
        }
    }

    public function getdeleteid($Id) {

        $this->db->select('Id');

        if ($Id) {
            $this->db->like('Id', $Id);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows > 0) {
            $result = $query->result_array();
            return $result[0]['Id'];
        } else {

            return false;
        }
    }

    public function getSupplierDetailsById($CollegeId = '') {
        $this->db->select('*');

        if ($CollegeId > 0) {
            $this->db->where('Id', $CollegeId);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }

    public function deleteRecord($Id = '') {

        $this->db->where('SupplierId', $Id);
        $this->db->where('RegisterStatus', 0);
        $this->db->delete('supplier_by_customer');
    }

    public function deletePlansRecord($PlanId = '') {

        $this->db->where('PlanId', $PlanId);
        $this->db->delete('customer_early_pay_plans');
    }

    public function updateLogoImage($CollegeId = '', $fileName) {
        $data = array('Logo' => $fileName);
        $this->db->where('Id', $CollegeId);
        $this->db->update($this->table, $data);

        //print_r($this->db->last_query()); die; 
    }

    public function getSupplierById($supplierid = '') {

        $this->db->select('*');

        if ($supplierid > 0) {
            $this->db->where('SupplierId', $supplierid);
        }

        $query = $this->db->get('supplier_by_customer');
        //print_r($this->db->last_query()); die;
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {

            return false;
        }
    }

    public function updatesupplier($supplierid) {
        $data = array('Vendorcode' => $this->input->post('Vendorcode'), 
		'supplier' => $this->input->post('supplier'),
		'Email' => $this->input->post('Email'),
		'ContactPerson' => $this->input->post('ContactPerson'),
		'Phone' => $this->input->post('Phone')
		
		);
        $this->db->where('SupplierId', $supplierid);
        $this->db->update('supplier_by_customer', $data);
        //print_r($this->db->last_query()); die;
    }
	
	
	
	public function getUniqueSuppliers($table, $where = NULL,$order_by=NULL, $num = NULL, $offset = NULL)
	{ 
		$this->db->select('*');
		
		if($where != NULL )
		{
		 	$this->db->where($where);
		}
		
		if($num != NULL || $offset != NULL)
		{
			$this->db->limit($num, $offset);
		}
		
			$this->db->group_by('Vendorcode');
		
		if($order_by)
		{
		   $this->db->order_by($order_by[0], $order_by[1]);
		}	
		else
		{
		   //$this->db->order_by('Id', 'DESC');
		}	
			
		//$this->db->order_by('title desc, name asc'); 
		
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
