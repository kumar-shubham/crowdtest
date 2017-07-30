<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();

		// Load url helper
		$this->load->helper('url');
		$this->load->library('session');


	}

	/**
	 * Method to save project details.
	 */
	public function index()
	{
		$client_id=$this->security->xss_clean($this->input->post('clientid'));
		
		$datam= array(
		//'project_id'=> $this->input->post('pid'),
		'Name'=>$this->security->xss_clean($this->input->post('pname')),
		//'project_lead'=>$this->input->post('phone'),
		'client_id'=>$this->security->xss_clean($this->input->post('clientid')),
		'start_date'=>$this->security->xss_clean($this->input->post('startdate')),
		'end_date'=>$this->security->xss_clean($this->input->post('enddate')),
		'resources_allocatted'=>($this->input->post('allocated_res')),
		'fixed_rate'=>$this->security->xss_clean($this->input->post('frate')),
		'hourly_rate'=>$this->security->xss_clean($this->input->post('hrate')),
		'estimated_hours'=>$this->security->xss_clean($this->input->post('esthrs')),
		'notes'=>$this->security->xss_clean($this->input->post('notes')));
		$this->load->model('Projectsmodel');
		$this->Projectsmodel->insert_project_details($datam);
		
		
		$results=$this->Projectsmodel->view_projects_overview(null);
		
		$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('projects',$data);
		
	}
	

	/**
	 * Method to save user in the database.
	 */
	public function save_user()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '134217728';
		/* $config['max_width']  = '1024';
		 $config['max_height']  = '768';
		 */
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data=$this->upload->data();
		
		
		$user_role="";
		$clientid=0;
		if($this->security->xss_clean($this->input->post('role'))=='1')
		{
			$user_role="Admin";
			$clientid=0;
		}
		elseif($this->security->xss_clean($this->input->post('role'))=='2')
		{
			$user_role="User";
			$clientid=0;
			
		}
		else {
			$user_role="Client";
			$clientid=$this->security->xss_clean($this->input->post('clientid'));
		}
	
		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'user_role'=>$user_role,
				'user_type_id'=>$this->input->post('role'),
				'fullname'=>$this->input->post('fullname'),
				'organization'=>$this->input->post('organization'),
				'email'=>$this->input->post('email'),
				'client_id'=>$clientid,
				'filename'=>$this->security->sanitize_filename($upload_data['file_name']));
		$this->load->model('Usersmodel');
		$this->Usersmodel->insert_user_details($this->security->xss_clean($datam));
	
	
		$results=$this->Usersmodel->get_users();
		$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('users',$data);
	
	}
	
	/**
	 * Method to create invoice and 
	 * save record in the database.
	 */
	public function create_invoice()
	{
		$user_role="";
		$invoice_id=$this->security->xss_clean($this->input->post('invoice_id'));
	
		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'invoice_id'=>$this->input->post('invoice_id'),
				'client_id'=>$this->input->post('client_id'),
				'notes'=>$this->input->post('notes'),
				'due_date'=>$this->input->post('enddate'),
				'default_tax'=>$this->input->post('tax'),
				'discount'=>$this->input->post('discount'),
				'currency'=>$this->input->post('currency'));
		$this->load->model('Projectsmodel');
		$this->Projectsmodel->insert_invoice($this->security->xss_clean($datam));
		
		$this->load->model('Clientmodel');
		//$data['company']=$this->Projectsmodel->get_company_details();
		//$data['client']=$this->Clientmodel->get_client_by_client_id($this->input->post('client_id'));
		
		
		$data['company']=$this->Projectsmodel->get_company_details();
		$data['client']=$this->Clientmodel->get_client_by_invoice_id($invoice_id);
		$data['invoice']=$this->Projectsmodel->get_invoice_details($invoice_id);
		$data['invoiceDates']=$this->Projectsmodel->get_invoice_info($invoice_id);
		
		$data['invoiceId']=$invoice_id;
		$data['mode']="edit";
		
	
		/*$results=$this->Usersmodel->get_users();
		$data=array('results'=>$results);*/
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('invoicedetails',$data);
	
	}
	
	/**
	 * Method to create invoice details 
	 * and save it the database.
	 */
	public function create_invoice_details()
	{
		$user_role="";
		/*if($this->input->post('role')=='1')
			{
			$user_role="Admin";
			}
			elseif($this->input->post('role')=='2')
			{
			$user_role="User";
	
			}
			else {
			$user_role="Client";
			}*/
	$invoice_id=$this->security->xss_clean($this->input->post('invoice_id'));
		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'invoice_id'=>$this->input->post('invoice_id'),
				'items'=>$this->input->post('itemname'),
				'Quantity'=>$this->input->post('quantity'),
				'unit_price'=>$this->input->post('unitprice'),
				'tax'=>$this->input->post('tax'),
				'row_total'=>$this->input->post('totalprice'));
		
		$datainvoice= array(
				//'project_id'=> $this->input->post('pid'),
				
				'total_amt'=>$this->input->post('totalsum'));
		
		$this->load->model('Projectsmodel');
		$this->Projectsmodel->insert_invoice_details($this->security->xss_clean($datam));
		
		$totalAmt=$this->Projectsmodel->get_total_amount($invoice_id);
		//echo("=========".$totalAmt);
		$datainvoice= array(
				//'project_id'=> $this->input->post('pid'),
		
				'total_amt'=>$totalAmt);
		
		$this->Projectsmodel->update_invoice_txn($this->security->xss_clean($datainvoice),$invoice_id);
		
	
		/* $this->load->model('Clientmodel');
		$data['company']=$this->Projectsmodel->get_company_details();
		$data['client']=$this->Clientmodel->get_client_by_client_id($this->input->post('client_id'));
	 */
	
		/*$results=$this->Usersmodel->get_users();
			$data=array('results'=>$results);*/
		/* $this->load->view('menu');
		$this->load->view('border');
		$this->load->view('InvoiceDetails',$data); */
		$this->edit_invoice($invoice_id);
	
	}
	
	/**
	 * Update invoice table and get
	 *  payments information.
	 */
	public function pay_details()
	{
		
		$invoice_id=$this->security->xss_clean($this->input->post('invoice_id'));
		$paid_amt=$this->security->xss_clean($this->input->post('pay_amount'));
		$this->load->model('Projectsmodel');
		$datainvoice= array(
					'paid_amt'=>$paid_amt,
					'pay_status'=>'Paid'
		);
	
		$this->Projectsmodel->update_invoice_txn($datainvoice,$invoice_id);
	
		$this->Payments();
	}
	
	/**
	 * View payments received information.
	 */
	public function payments()
	{
	
		if($this->session->user_name!=null)
		{
	
			$this->load->model('Loginmodel');
			$user_type_id=$this->session->userdata('user_type_id');
			$data['menu_name']=$this->Loginmodel->get_main_menu_list($user_type_id,'Payments');
			$this->session->set_userdata('first_level_menu',$data);
	
	
			$this->load->model('Projectsmodel');
			$results=$this->Projectsmodel->get_payments_list($this->session->userdata ( 'user_type_id' ),$this->session->userdata ( 'client_id' ));
			$data=array('results'=>$results);
	
	
	
			$this->load->view('menu');
			$this->load->view('border');
			$this->load->view('payments',$data);
		}
	
	}
	
	/**
	 * Save settings information from settings page.
	 */
	public function save_settings()
	{
		$user_role="";
		/*if($this->input->post('role')=='1')
			{
			$user_role="Admin";
			}
			elseif($this->input->post('role')=='2')
			{
			$user_role="User";
	
			}
			else {
			$user_role="Client";
			}*/

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '134217728';
		/* $config['max_width']  = '1024';
		 $config['max_height']  = '768';
		 */
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data=$this->upload->data();
		
		//print_r($upload_data);
	
		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'company_name'=>$this->input->post('name'),
				'company_address'=>$this->input->post('address'),
				'zipcode'=>$this->input->post('zipcode'),
				'email'=>$this->input->post('email'),
				'phone'=>$this->input->post('phone'),
				'registration'=>$this->input->post('registration'),
				'vat'=>$this->input->post('vat'),
				'vat_percent'=>$this->input->post('vatpercent'),
				'logo'=>$this->security->sanitize_filename($upload_data['file_name']));
		
		$this->load->model('Projectsmodel');
		$this->Projectsmodel->update_company_details($this->security->xss_clean($datam));
	
		
		$results=$this->Projectsmodel->get_company_details();
		$data=array('results'=>$results);
			
	
		/*$results=$this->Usersmodel->get_users();
			$data=array('results'=>$results);*/
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('settings',$data);
	
	}
	
	/**
	 * Delete individual row of an invoice.
	 */
	
	public function delete_invoice_row()
	{
		$invoice_list_id=$this->security->xss_clean($this->input->post('invoice_list_id'));
		$invoice_id=$this->security->xss_clean($this->input->post('invoice_id'));
		$this->load->model('Projectsmodel');
		$this->Projectsmodel->delete_invoice_details($invoice_list_id);
		$totalAmt=$this->Projectsmodel->get_total_amount($invoice_id);
		$datainvoice= array(		
				'total_amt'=>$totalAmt);
		
		$this->Projectsmodel->update_invoice_txn($datainvoice,$invoice_id);
		$this->edit_invoice($invoice_id);
	}
	
	/**
	 * Edit invoice based on invoice id.
	 * @param $invoice_id
	 */
	public function edit_invoice($invoice_id)
	{
		$user_role="";
		/*if($this->input->post('role')=='1')
			{
			$user_role="Admin";
			}
			elseif($this->input->post('role')=='2')
			{
			$user_role="User";
	
			}
			else {
			$user_role="Client";
			}*/
	
		
		
		$this->load->model('Clientmodel');
		$this->load->model('Projectsmodel');
		
		$data['company']=$this->Projectsmodel->get_company_details();
		$data['client']=$this->Clientmodel->get_client_by_invoice_id($invoice_id);
		$data['invoice']=$this->Projectsmodel->get_invoice_details($invoice_id);
		$data['invoiceDates']=$this->Projectsmodel->get_invoice_info($invoice_id);
		
		$data['invoiceId']=$invoice_id;
		$user_type_id=$this->session->userdata('user_type_id');
		if($user_type_id=='3')
		{
			$data['mode']="view";
		}
		else {
		$data['mode']="edit";
		}
		/*$results=$this->Usersmodel->get_users();
			$data=array('results'=>$results);*/
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('invoicedetails',$data);
	
	}
	
	/**
	 * Initiate payment option for client 
	 * to clear the dues.
	 */
	public function initiate_payment()
	{
		$user_role="";
		$invoice_id=$this->security->xss_clean($this->input->post('invoice_id'));
		$total_amt=$this->security->xss_clean($this->input->post('total_amt'));
		$data['invoice_id']=$invoice_id;
		$data['total_amt']=$total_amt;
		
		
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('initiatepayment',$data);
	
	}
	
	/**
	 * View invoice based on invoice id.
	 * @param  $invoice_id
	 */
	public function view_invoice($invoice_id)
	{
		$user_role="";
			
		$this->load->model('Clientmodel');
		$this->load->model('Projectsmodel');
	
		$data['company']=$this->Projectsmodel->get_company_details();
		$data['client']=$this->Clientmodel->get_client_by_invoice_id($invoice_id);
		$data['invoice']=$this->Projectsmodel->get_invoice_details($invoice_id);
		$data['invoiceDates']=$this->Projectsmodel->get_invoice_info($invoice_id);
		$data['invoiceId']=$invoice_id;
		$data['mode']="view";
		/*$results=$this->Usersmodel->get_users();
		 $data=array('results'=>$results);*/
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('invoicedetails',$data);
	
	}
	
	
	/**
	 * Edit user related information.
	 */
	
	public function edit_user()
	{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '134217728';
		/* $config['max_width']  = '1024';
		 $config['max_height']  = '768';
		 */
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data=$this->upload->data();
		
		
		$user_role="";
		if($this->security->xss_clean($this->input->post('role'))=='1')
		{
			$user_role="Admin";
		}
		elseif($this->security->xss_clean($this->input->post('role'))=='2')
		{
			$user_role="User";
				
		}
		else {
			$user_role="Client";
		}
	
		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				
				'password'=>$this->input->post('password'),
				'user_role'=>$user_role,
				'user_type_id'=>$this->input->post('role'),
				'fullname'=>$this->input->post('fullname'),
				'organization'=>$this->input->post('organization'),
				'email'=>$this->input->post('email'),
				'filename'=>$this->security->sanitize_filename($upload_data['file_name']));
		$this->load->model('Usersmodel');
		$this->Usersmodel->update_user($this->security->xss_clean($this->input->post('username')),$this->security->xss_clean($datam));
	
	
		$results=$this->Usersmodel->get_users();
		$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('users',$data);
	
	}

}