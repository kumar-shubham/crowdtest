<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends CI_Controller {

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
		
		$this->load->helper('url');
		$this->load->library('session');
			
	}
	
	/**
	 * Method to display login page
	 */
	public function index()
	{
	$this->load->model('Mailboxmodel');
	$user_name=$this->security->xss_clean($this->session->userdata('user_name'));
	$data['inbox']=$this->Mailboxmodel->getInboxMails($user_name);
	
		
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('inbox',$data);
	}
	
	
	public function compose()
	{
		/* $this->load->model('Mailboxmodel');
		$user_name=$this->session->userdata('user_name');
		
		
		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'Name'=>$this->input->post('pname'),
				//'project_lead'=>$this->input->post('phone'),
				'client_id'=>$this->input->post('clientid'));
		
		
		$data['inbox']=$this->Mailboxmodel->getInboxMails($user_name);
	 */
	
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('composeemail');
	}
	
}