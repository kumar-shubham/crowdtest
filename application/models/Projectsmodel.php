<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Projectsmodel extends CI_Model {
	
	/**
	 * Default constructor.
	 */
	public function __construct() {
		// Call the CI_Model constructor
		parent::__construct ();
		$this->load->database ();
	}
	
	/**
	 * Method to insert Project Details
	 *
	 * @param Array $data
	 *        	in Name Value pair
	 */
	public function insert_project_details($data) {
		$this->db->insert ( 'ag_project_mst', $data );
	}
	
	/**
	 * Method to insert Invoice information
	 *
	 * @param Array $data
	 *        	in Name Value pair
	 */
	public function insert_invoice($data) {
		$this->db->insert ( 'ag_invoice_txn', $data );
	}
	
	/**
	 * Method to insert Invoice Details of a particular invoice
	 *
	 * @param Array $data
	 *        	in Name Value pair
	 */
	public function insert_invoice_details($data) {
		$this->db->insert ( 'ag_invoice_list_details', $data );
	}
	
	/**
	 * Method to delete Invoice Details of a particular invoice
	 *
	 * @param
	 *        	$invoice_list_id
	 */
	public function delete_invoice_details($invoice_list_id) {
		$this->db->where ( 'list_id', $invoice_list_id );
		$this->db->delete ( 'ag_invoice_list_details' );
	}
	
	/**
	 * Method to delete Invoice information
	 *
	 * @param
	 *        	$invoice_id
	 */
	public function delete_invoice($invoice_id) {
		$this->db->where ( 'invoice_id', $invoice_id );
		$this->db->delete ( 'ag_invoice_txn' );
	}
	
	/**
	 * Methods to get Projects overview
	 * 
	 * @param
	 *        	$client_id
	 */
	public function view_projects_overview($client_id) {
		if ($client_id == null or $client_id == '0') {
			$queryParam = 'ag_project_mst.client_id = ag_client_details.client_id';
		} else {
			$queryParam = 'ag_project_mst.client_id = ag_client_details.client_id and ag_client_details.client_id=' . $client_id;
		}
		
		$this->db->select ( 'project_id,Name,ag_client_details.organization_name client_name,resources_allocatted,start_date,end_date,estimated_hours' );
		$this->db->from ( 'ag_project_mst' );
		$this->db->join ( 'ag_client_details', $queryParam );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to get Current Invoice Id.
	 */
	public function get_current_invoiceId() {
		$this->db->select_max ( 'invoice_id' );
		$query = $this->db->get ( 'ag_invoice_txn' );
		return $query->result ();
	}
	
	/**
	 * Method to get Invoice Information based on invoice id.
	 * 
	 * @param
	 *        	$invoice_id
	 */
	public function get_invoice_info($invoice_id) {
		$this->db->select ( '*' );
		$this->db->from ( 'ag_invoice_txn' );
		$this->db->where ( 'invoice_id', $invoice_id );
		// $this->db->where('status','Not Started');
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to get To do List
	 * 
	 * @param
	 *        	$project_id
	 */
	public function get_todo_list($project_id) {
		$this->db->select ( '*' );
		$this->db->from ( 'ag_issues_txn' );
		$this->db->where ( 'project_id', $project_id );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to get Total hours logged.
	 * 
	 * @param
	 *        	$project_id
	 */
	public function get_total($project_id) {
		$this->db->select ( 'sum(logged_hours) as loggedhours' );
		$this->db->from ( 'ag_timesheet_details' );
	}
	
	/**
	 * Method to get Project count based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_project_count($client_id) {
		log_message('debug', 'client_id---'.$client_id) ;
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'count(*) as project_count' );
			$this->db->from ( 'ag_project_mst' );
			$this->db->where ( 'client_id', $client_id );
			// $this->db->where('project_id',$project_id);
			// $this->db->where('status','Not Started');
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->project_count;
		} else {
			$this->db->select ( 'count(*) as project_count' );
			$this->db->from ( 'ag_project_mst' );
			$this->db->where ( 'client_id', $client_id );
			// $this->db->where('status','Not Started');
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->project_count;
		}
	}
	
	/**
	 * Method to get OpenIssue count based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_open_issue_count($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'count(*) as open_issue_count' );
			$this->db->from ( 'ag_issues_txn' );
			$this->db->where ( 'status !=', "Closed" );
			// $this->db->where('status','Not Started');
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->open_issue_count;
		} else {
			$this->db->select ( 'count(*) as open_issue_count' );
			$this->db->from ( 'ag_issues_txn' );
			
			$this->db->join ( 'ag_project_mst', 'ag_issues_txn.project_id = ag_project_mst.project_id and ag_project_mst.client_id=' . $client_id );
			$this->db->where ( 'status !=', "Closed" );
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->open_issue_count;
		}
	}
	
	/**
	 * Method to get Closed Issue count based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_closed_issue_count($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'count(*) as closed_issue_count' );
			$this->db->from ( 'ag_issues_txn' );
			$this->db->where ( 'status =', "Closed" );
			// $this->db->where('status','Not Started');
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->closed_issue_count;
		} else {
			$this->db->select ( 'count(*) as closed_issue_count' );
			$this->db->from ( 'ag_issues_txn' );
			
			$this->db->join ( 'ag_project_mst', 'ag_issues_txn.project_id = ag_project_mst.project_id and ag_project_mst.client_id=' . $client_id );
			$this->db->where ( 'status =', "Closed" );
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->closed_issue_count;
		}
	}
	
	/**
	 * Method to get Total Logged hours based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_total_logged_hours($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'sum(logged_hours) as loggedhours' );
			$this->db->from ( 'ag_timesheet_details' );
			// $this->db->where('status =',"Closed");
			// $this->db->where('status','Not Started');
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->loggedhours;
		} 

		else {
			$this->db->select ( 'sum(logged_hours) as loggedhours' );
			$this->db->from ( 'ag_timesheet_details' );
			
			$this->db->join ( 'ag_project_mst', 'ag_timesheet_details.project_id = ag_project_mst.project_id and ag_project_mst.client_id=' . $client_id );
			// $this->db->where('status =',"Closed");
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->loggedhours;
		}
	}
	
	/**
	 * Method to get Project count based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_total_earnings_last_month($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'sum(paid_amt) as lm_earnings' );
			$this->db->from ( 'ag_invoice_txn' );
			$this->db->where ( 'pay_status =', "Paid" );
			$this->db->where ( 'MONTH(created_on)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)' );
			$query = $this->db->get ();
			// echo($this->db->last_query());
			$ret = $query->row ();
			return $ret->lm_earnings;
		} 

		else {
			$this->db->select ( 'sum(paid_amt) as lm_earnings' );
			$this->db->from ( 'ag_invoice_txn' );
			
			// $this->db->join('ag_project_mst', 'ag_invoice_txn.project_id = ag_project_mst.project_id and ag_project_mst.client_id='.$client_id);
			$this->db->where ( 'client_id=', $client_id );
			$this->db->where ( 'pay_status =', "Paid" );
			$this->db->where ( 'MONTH(created_on)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)' );
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->lm_earnings;
		}
	}
	
	/**
	 * Method to get total bills last month based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_total_bill_last_month($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'sum(total_amt) as lm_bill' );
			$this->db->from ( 'ag_invoice_txn' );
			$this->db->where ( 'pay_status =', "Paid" );
			$this->db->where ( 'MONTH(created_on)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)' );
			$query = $this->db->get ();
			// echo($this->db->last_query());
			$ret = $query->row ();
			return $ret->lm_bill;
		} else {
			$this->db->select ( 'sum(total_amt) as lm_bill' );
			$this->db->from ( 'ag_invoice_txn' );
			
			// $this->db->join('ag_project_mst', 'ag_invoice_txn.project_id = ag_project_mst.project_id and ag_project_mst.client_id='.$client_id);
			$this->db->where ( 'client_id=', $client_id );
			$this->db->where ( 'pay_status =', "Paid" );
			$this->db->where ( 'MONTH(created_on)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)' );
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->lm_bill;
		}
	}
	
	/**
	 * Method to get total pending bills last month based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_total_pending_bill_last_month($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( 'sum(total_amt-paid_amt) as lm_pending' );
			$this->db->from ( 'ag_invoice_txn' );
			$this->db->where ( 'pay_status =', "Paid" );
			$this->db->where ( 'MONTH(created_on)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)' );
			$query = $this->db->get ();
			// echo($this->db->last_query());
			$ret = $query->row ();
			return $ret->lm_pending;
		} else {
			$this->db->select ( 'sum(total_amt-paid_amt) as lm_pending' );
			$this->db->from ( 'ag_invoice_txn' );
			
			// $this->db->join('ag_project_mst', 'ag_invoice_txn.project_id = ag_project_mst.project_id and ag_project_mst.client_id='.$client_id);
			$this->db->where ( 'client_id=', $client_id );
			$this->db->where ( 'pay_status =', "Paid" );
			$this->db->where ( 'MONTH(created_on)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)' );
			$query = $this->db->get ();
			$ret = $query->row ();
			return $ret->lm_pending;
		}
	}
	
	/**
	 * Method to get all to do list based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function get_all_todo_list($client_id) {
		if ($client_id == null or $client_id == '0') {
			$this->db->select ( '*' );
			$this->db->from ( 'ag_issues_txn' );
			$this->db->join ( 'ag_users', 'ag_issues_txn.assigned_to=ag_users.username' );
			// $this->db->where('status','Not Started');
			$query = $this->db->get ();
			//print_r($query->result ());
			return $query->result ();
		} else {
			$this->db->select ( '*' );
			$this->db->from ( 'ag_issues_txn' );
			
			$this->db->join ( 'ag_project_mst', 'ag_issues_txn.project_id = ag_project_mst.project_id and ag_project_mst.client_id=' . $client_id );
			// $this->db->where('status =',"Closed");
			$query = $this->db->get ();
			return $query->result ();
		}
	}
	
	/**
	 * Method to get tasks in progress list based on project id.
	 * 
	 * @param
	 *        	$project_id
	 */
	public function get_in_progress_list($project_id) {
		$this->db->select ( '*' );
		$this->db->from ( 'ag_issues_txn' );
		$this->db->where ( 'project_id', $project_id );
		$this->db->where ( 'status', 'In Progress' );
		$this->db->where ( 'status', 'Resoved' );
		$this->db->where ( 'status', 'Reopened' );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to get invoice list.
	 */
	public function get_invoice_list($user_type,$client_id) {
		if($user_type=='3')
		{
		$this->db->select ( '*' );
		$this->db->from ( 'ag_invoice_txn' );
		$this->db->join ( 'ag_client_details', 'ag_invoice_txn.client_id = ag_client_details.client_id and ag_invoice_txn.client_id='.$client_id );
		}
		else {
			$this->db->select ( '*' );
			$this->db->from ( 'ag_invoice_txn' );
			$this->db->join ( 'ag_client_details', 'ag_invoice_txn.client_id = ag_client_details.client_id' );
			
		}
		
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to get payments list.
	 */
	public function get_payments_list($user_type,$client_id) {
		if($user_type=='3')
		{
		$this->db->select ( '*' );
		$this->db->from ( 'ag_invoice_txn' );
		$this->db->join ( 'ag_client_details', 'ag_invoice_txn.client_id = ag_client_details.client_id  and ag_invoice_txn.client_id='.$client_id.' and pay_status=' . "'Paid'" );
		}
		
		else {
			$this->db->select ( '*' );
			$this->db->from ( 'ag_invoice_txn' );
			$this->db->join ( 'ag_client_details', 'ag_invoice_txn.client_id = ag_client_details.client_id and pay_status=' . "'Paid'");
				
		}
		
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Get invoice list details based on invoice id.
	 * 
	 * @param
	 *        	$invoice_id
	 */
	public function get_invoice_details($invoice_id) {
		$this->db->select ( '*' );
		$this->db->from ( 'ag_invoice_list_details' );
		$this->db->where ( 'invoice_id', $invoice_id );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to get company details
	 */
	public function get_company_details() {
		$this->db->select ( '*' );
		$this->db->from ( 'ag_company_mst' );
		$this->db->where ( 'company_id', 1 );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	/**
	 * Method to update company details
	 * 
	 * @param Array $data        	
	 */
	public function update_company_details($data) {
		$this->db->where ( 'company_id', 1 );
		$this->db->update ( 'ag_company_mst', $data );
	}
	
	/**
	 * Method to update invoice transaction details
	 * 
	 * @param Array $data        	
	 * @param
	 *        	$invoice_id
	 */
	public function update_invoice_txn($data, $invoice_id) {
		$this->db->where ( 'invoice_id', $invoice_id );
		$this->db->update ( 'ag_invoice_txn', $data );
	}
	
	/**
	 * Method to get total invoice amount of an individual invoice.
	 * 
	 * @param
	 *        	$invoice_id
	 */
	public function get_total_amount($invoice_id) {
		$this->db->select ( 'sum(row_total) as sum_total' );
		$this->db->from ( 'ag_invoice_list_details' );
		$this->db->where ( 'invoice_id =', $invoice_id );
		$query = $this->db->get ();
		$ret = $query->row ();
		return $ret->sum_total;
	}
}