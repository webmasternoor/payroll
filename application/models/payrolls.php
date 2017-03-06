<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrolls extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
    public function get_search($limit, $start,$search_term){
	   $this->db->limit($limit, $start);
	   $this ->db->select('PBI_ID,PBI_NAME,PBI_DESIGNATION,PBI_DESG_GRADE,PBI_JOB_STATUS');
	   $this ->db->from('personnel_basic_info');
	   $this->db->where('PBI_ID',$search_term );
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
		    return $data;
		}
		return false;
	}

    function profile($id)
    {
        $this ->db->select('*,personnel_basic_info.PBI_ID as empid');
        $this ->db->from('personnel_basic_info');
        $this->db->where('personnel_basic_info.PBI_ID',$id);
        $query = $this->db->get();

        if($query->num_rows()==1)
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

	public function search_count($search_term){
			   $this->db->from('account');
			   $this->db->like('L_name',$search_term);
			   $this->db->or_like('F_name',$search_term);
	   		return $this->db->count_all_results();
	}

	public function save($pay_record){
		$this->db->insert('payroll',$pay_record);
	}
	public function pay_history($id){
		$this->db->select('*');
		$this->db->from('account');
        $this->db->join('payroll','payroll.account_id=account.id','inner');
        $this->db->join('pay_scale_14','pay_scale_14.grade=account.grade','inner');
		$this->db->where('account_id',$id);
		$this->db->order_by('date');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
		    return $data;
		}
		return false;
	}
	public function salary_sheet()
	{
        $month = $this->input->post('month');
        $year = $this->input->post('year');

		$this->db->select('*');
		$this->db->from('account');
        $this->db->join('payroll','payroll.account_id=account.id','inner');
        $this->db->join('pay_scale_14','pay_scale_14.grade=account.grade','inner');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
		    return $data;
		}
		return false;
	}

    function get_emp_payment($id)
	{
	   $this ->db->select('*,pay_scale_14.grade as gid');
	   $this ->db->from('pay_scale_14');
	   $this->db->join('account','account.grade=pay_scale_14.grade','inner');
       $this->db->where('account.id',$id);
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
		}
		return false;
	}

    function get_employee()
	{
        $this ->db->select('*,pay_scale_14.grade as gid');
        $this ->db->from('pay_scale_14');
        $this->db->join('account','account.grade=pay_scale_14.grade','inner');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
            return $data;
		}
		return false;
	}
    function get_employee_hr()
	{
        $this ->db->select('*,pay_scale_14.grade as gid');
        $this ->db->from('pay_scale_14');
        $this->db->order_by("grade", "asc");
        $this->db->join('personnel_basic_info','personnel_basic_info.PBI_DESG_GRADE=pay_scale_14.grade','left');
        $this ->db->where('PBI_DOMAIN','ICT');
        $this ->db->where('PBI_DEPARTMENT','ICT');
        $this->db->where('personnel_basic_info.PBI_JOB_STATUS','In Service');
        $this->db->where('pay_scale_14.grade >','3')->or_where('grade =', '0');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
            return $data;
		}
		return false;
	}
    function get_employee_with_leave($from)
	{
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $this ->db->select('*,pay_scale_14.grade as gid');
        $this ->db->from('pay_scale_14');
        $this->db->order_by("grade", "asc");
        $this->db->join('personnel_basic_info','personnel_basic_info.PBI_DESG_GRADE=pay_scale_14.grade','inner');
        $this->db->join('ded_day','personnel_basic_info.PBI_ID=ded_day.account_id','inner');
        if($from=='payroll_check')
            $this->db->join('payroll','personnel_basic_info.PBI_ID = payroll.account_id','inner');
        $this->db->where('personnel_basic_info.PBI_JOB_STATUS','In Service');
        $this->db->where('ded_day.month',$month);
        $this->db->where('ded_day.year',$year);
        //$this->db->where('pay_scale_14.grade >','3');

	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
            return $data;
		}
		return false;
	}
	function setup_updates($ID){
        $credit = $this->input->post('credit');
        $aya = $this->input->post('aya');
        $increment = $this->input->post('increment');
        $city = $this->input->post('city');
        $tax = $this->input->post('tax');
        $tech = $this->input->post('tech');
        $load = $this->input->post('load');
        $risk = $this->input->post('risk');
        $distance = $this->input->post('distance');
        $arrear = $this->input->post('arrear');
        $update = $this->input->post('update');


        $data = array('PR_CREDIT' => $this->input->post('credit'),
            'PR_AYA' => $this->input->post('aya'),
            'PR_INCREMENT' => $this->input->post('increment'),
            'PR_CITY' => $this->input->post('city'),
            'PR_TAX' => $this->input->post('tax'),
            'PR_TECH' => $this->input->post('tech'),
            'PR_LOAD' => $this->input->post('load'),
            'PR_RISK' => $this->input->post('risk'),
            'PR_DISTANCE' => $this->input->post('distance'),
            'PR_SERVICE_CHARGE' => $this->input->post('service_charge'),
            'PR_SAVINGS' => $this->input->post('savings'),
            'PR_DPS' => $this->input->post('dps'),
            'PR_ARREAR_OTHER' => $this->input->post('arrear')
        );
        $this->db->where('PBI_ID',$ID);
        $this->db->update('personnel_basic_info',$data);
    }

}