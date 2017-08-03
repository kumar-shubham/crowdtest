<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('Loginmodel');
		//$this->load->library("security");
		
	}
	
	/**
	 * Method to display login page
	 */
	public function index()
	{
		$flag=$this->security->xss_clean($this->input->post('flag'));
		
		
		if($flag=='forgot')
		{
			$data['flag']='forgot';
		}
		elseif($flag=='create')
		{
			$data['flag']='create';
		}
		else {
			$data['flag']=null;
		}
		
		
		$data['error_flag']=true;
		
		$this->load->view('agile_login',$data);
	}
	
	/**
	 * Function for installing the software
	 */
	public function install()
	{
		$data['error_flag']=true;
		$this->load->view('install/install',$data);
	}
	public function installprj()
	{
		
		$db['production'] = array(
		
				'dsn'	=> '',
				'hostname' => 'localhost',
				'username' => 'root',
				'password' => '',
				'database' => 'agile',
				'dbdriver' => 'mysqli',
				'dbprefix' => '',
				'pconnect' => FALSE,
				'db_debug' => (ENVIRONMENT !== 'production'),
				'cache_on' => FALSE,
				'cachedir' => '',
				'char_set' => 'utf8',
				'dbcollat' => 'utf8_general_ci',
				'swap_pre' => '',
				'encrypt' => FALSE,
				'compress' => FALSE,
				'stricton' => FALSE,
				'failover' => array(),
				'save_queries' => TRUE
		);
		echo ("============="+base_url());
		
		$existingData=file_get_contents(base_url()."config/production/database.php");
		
		file_put_contents(base_url()."config/production/database.php",$db['production']);
		
		/*$this->load->model('Loginmodel');
		$queries=file_get_contents(base_url()."./db/"."db.sql");
		
		$this->Loginmodel->install_db_scripts($queries);
		*/
		
		
		$data['error_flag']=true;
		
		//$this->load->view('agile_login',$data);
	}
	
	/**
	 * Forgot password resolution.
	 */
	public function forgot_password()
	{
		$this->load->view('forgotpassword');
	}
	
	/**
	 * 
	 */
	public function reset_password()
	{
		$username=$this->security->xss_clean($this->input->post('username'));
		$email=$this->security->xss_clean($this->input->post('email'));
		$this->load->model('Loginmodel');
		$this->load->library('agileemail');
		$query=$this->Loginmodel->verify_and_reset_pwd($username,$email);
		if($query=='1')
		{
			$emailArray['to']=$email;
			$emailArray['from']="a@b.com";
			$emailArray['subject']="test";
			$emailArray['message']="test";
			//$this->load->library('Agileemail');
			$this->agileemail->sendemail($emailArray);
			$data['error_flag']=true;
			$data['flag']="forgot";
			$this->load->view('agile_login',$data);
		}
		
		else {
			$data['error_flag']=false;
			$this->load->view('forgotpassword',$data);
		}
		
		
	}
	/**
	 * Method to create an account
	 */
	public function create_account()
	{
		$this->load->view('create_account');
	}

	public function create_user_account()
	{
		$this->load->view('create_user_account');
	}

	public function create_client_account()
	{
		$this->load->view('create_client_account');
	}

	public function user_signup()
	{
		$userName=$this->security->xss_clean($this->input->post('username'));
		$email=$this->security->xss_clean($this->input->post('email'));
		$password=$this->security->xss_clean($this->input->post('password'));
		$cnf_password=$this->security->xss_clean($this->input->post('confirm_password'));

		if($password != $cnf_password){
			$data['flag']='mismatch';
			$this->load->view('create_user_account',$data);
		}

		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'username'=>$userName,
				'password'=>$password,
				'user_role'=>"User",
				'user_type_id'=>2,
				'email'=>$email);

		$this->load->model('Usersmodel');
		$this->Usersmodel->insert_user_details($this->security->xss_clean($datam));
		$data['flag']='create';

		$data['error_flag']=true;
		
		$this->load->view('agile_login',$data);
	}

	public function client_signup()
	{
		$userName=$this->security->xss_clean($this->input->post('username'));
		$name=$this->security->xss_clean($this->input->post('name'));
		$organization=$this->security->xss_clean($this->input->post('companyname'));
		$email=$this->security->xss_clean($this->input->post('email'));
		$password=$this->security->xss_clean($this->input->post('password'));
		$cnf_password=$this->security->xss_clean($this->input->post('confirm_password'));

		if($password != $cnf_password){
			$data['flag']='mismatch';
			$this->load->view('create_client_account',$data);
		}

		$datam= array(
				//'project_id'=> $this->input->post('pid'),
				'username'=>$userName,
				'fullname'=>$name,
				'user_role'=>"Client",
				'user_type_id'=>3,
				'organization'=>$organization,
				'password'=>$password,
				'email'=>$email);

		$this->load->model('Usersmodel');
		$this->Usersmodel->insert_user_details($this->security->xss_clean($datam));
		$data['flag']='create';

		$data['error_flag']=true;
		
		$this->load->view('agile_login',$data);
	}
	
	/**
	 * Method to validate login
	 */
	public function validate_login()
	{
		
		$userName=$this->security->xss_clean($this->input->post('username'));
		$password=$this->security->xss_clean($this->input->post('password'));
		$this->load->model('Loginmodel');
		$query=$this->Loginmodel->verify_user_login($userName,$password);
		
		
		//print_r($query);
		if($query->num_rows()== 1)
		{
			$row=$query->row_array();
			$this->session->set_userdata('user_name',$userName);
			$this->session->set_userdata('user_type_id', $row['user_type_id']);
			$this->session->set_userdata('client_id', $row['client_id']);
			if($row['client_id']== null or $row['client_id']=='0')
			{
				$client_id=null;
			}
			else {
				$client_id=$row['client_id'];
			}
			
			$user_type_id=$this->session->userdata('user_type_id');
			
			$data['menu_name']=$this->Loginmodel->get_main_menu_list($user_type_id,'Dashboard');
			$this->session->set_userdata('first_level_menu',$data);
			//print_r($data);
			//array('data'=>$data);
			
			$this->load->model('Projectsmodel');
			//$results=$this->Projectsmodel->ViewProjectsOverview();
			//$data=array('results'=>$results);
			$data['results']=$this->Projectsmodel->view_projects_overview($client_id);
			$data['todolist']=$this->Projectsmodel->get_all_todo_list($client_id);
			$data['projectcount']=$this->Projectsmodel->get_project_count($client_id);
			$data['openIssueCount']=$this->Projectsmodel->get_open_issue_count($client_id);
			$data['closedIssueCount']=$this->Projectsmodel->get_closed_issue_count($client_id);
			$data['loggedhours']=$this->Projectsmodel->get_total_logged_hours($client_id);
			$data['lm_earnings']=$this->Projectsmodel->get_total_earnings_last_month($client_id);
			$data['lm_bill']=$this->Projectsmodel->get_total_bill_last_month($client_id);
			$data['lm_pending']=$this->Projectsmodel->get_total_pending_bill_last_month($client_id);
			$data['flag']=null;
			if($user_type_id=='1')
			{
				
			$this->load->view('menu');
			$this->load->view('border');
			$this->load->view('dashboard_2',$data);
			}
			elseif($user_type_id=='2')
			{
				$this->load->view('menu');
				$this->load->view('border');
				$this->load->view('projects',$data);
			}
			elseif($user_type_id=='3')
			{
				$this->load->view('menu');
				$this->load->view('border');
				$this->load->view('dashboard_2',$data);
			}
		}
		else {
			$data['flag']=null;
			$data['error_flag']=false;
			$this->load->view('agile_login',$data);
		}
		
		}
		
		/**
		 * Method to populate main menu
		 */
		public function get_main_menu()
		{
			$user_type_id=$this->session->userdata('user_type_id');
			$query=$this->Loginmodel->get_main_menu_list($user_type_id);
			return $query;
			//print_r($query);
			
		}
		
		
		/**
		 * Method to logout user
		 */
		public function logout()
		{
			$this->session->unset_userdata('user_type_id');
			$this->session->unset_userdata('user_name');
			$this->session->sess_destroy();
			$data['flag']=null;	
			$data['error_flag']=true;
		$this->load->view('agile_login',$data);
		}
		
}