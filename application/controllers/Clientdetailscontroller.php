<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientdetailscontroller extends CI_Controller {

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
	 * Method to insert Client Details
	 */
	public function index()
	{
		
		
		$datam= array(
		'organization_name'=> $this->input->post('orgname'),
		'contact_person'=>$this->input->post('contactperson'),
		'phone_no'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'address'=>$this->input->post('address'),
		'bank_name'=>$this->input->post('bank_name'),
		'swift_code'=>$this->input->post('bank_swift'),
		'account_holder_name'=>$this->input->post('bank_ac_name'),
		'account_no'=>$this->input->post('bank_ac_number'),
		'iban'=>$this->input->post('iban'),
		'skype'=>$this->input->post('skype'),
		'linkedin'=>$this->input->post('linkedin'),
		'facebook'=>$this->input->post('facebook'),
		'twitter'=>$this->input->post('twitter'),
		'ftp_username'=>$this->input->post('ftp_username'),
		'ftp_password'=>$this->input->post('ftp_password'),
		'hosting_url'=>$this->input->post('hosting_url'),
		'hosting_username'=>$this->input->post('hosting_uname'),
		'hosting_password'=>$this->input->post('hosting_pwd'));
		$this->load->model('Clientmodel');
		$this->Clientmodel->insert_client_details($this->security->xss_clean($datam));
		
		
		$results=$this->Clientmodel->view_clients_overview();
		$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('clients',$data);
		
	}
	
	
	/**
	 * Method to edit client details
	 * @param  $client_id
	 */
	public function edit_client($client_id_params)
	{
	
		$client_id=$this->security->xss_clean($client_id_params);
	//echo("PHONE==".$this->input->post('phone_no'));
		$datam= array(
				'organization_name'=> $this->input->post('organization_name'),
				'contact_person'=>$this->input->post('contact_person'),
				'phone_no'=>$this->input->post('phone_no'),
				'email'=>$this->input->post('email'),
				'address'=>$this->input->post('address'),
				'bank_name'=>$this->input->post('bank_name'),
				'swift_code'=>$this->input->post('swift_code'),
				'account_holder_name'=>$this->input->post('account_holder_name'),
				'account_no'=>$this->input->post('account_no'),
				'iban'=>$this->input->post('iban'),
				'skype'=>$this->input->post('skype'),
				'linkedin'=>$this->input->post('linkedin'),
				'facebook'=>$this->input->post('facebook'),
				'twitter'=>$this->input->post('twitter'),
				'ftp_username'=>$this->input->post('ftp_username'),
				'ftp_password'=>$this->input->post('ftp_password'),
				'hosting_url'=>$this->input->post('hosting_url'),
				'hosting_username'=>$this->input->post('hosting_username'),
				'hosting_password'=>$this->input->post('hosting_password'));
		$this->load->model('Clientmodel');
		$this->Clientmodel->update_client($client_id,$this->security->xss_clean($datam));
	
	
		$results=$this->Clientmodel->view_clients_overview();
		$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('clients',$data);
	
	}
	
}