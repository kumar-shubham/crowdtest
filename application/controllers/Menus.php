<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Menus extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct ();
		
		// Load url helper
		$this->load->helper ( 'url' );
		$this->load->library ( 'session' );
	}
	
	/**
	 * Method to load dashboard
	 */
	public function dashboard() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$client_id_val = $this->session->userdata ( 'client_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Dashboard' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			log_message('debug', 'client_id---val -- '.$client_id_val) ;
			if ($client_id_val == null or $client_id_val == '0') {
				$client_id = null;
				log_message('debug', 'client_id---val111 -- '.$client_id_val) ;
			} else {
				$client_id = $client_id_val;
			}
			
			// $this->load->model('Projectsmodel');
			// $results=$this->Projectsmodel->get_todo_list($this->session->userdata('project_id'));
			
			/*
			 * $this->load->model('Loginmodel');
			 * $user_type_id=$this->session->userdata('user_type_id');
			 * $data['menu_name']=$this->Loginmodel->get_main_menu_list($user_type_id,'Projects');
			 * $this->session->set_userdata('first_level_menu',$data);
			 */
			
			$this->load->model ( 'Projectsmodel' );
			// $results=$this->Projectsmodel->view_projects_overview();
			// $data=array('results'=>$results);
			$data ['results'] = $this->Projectsmodel->view_projects_overview ( $client_id );
			$data ['todolist'] = $this->Projectsmodel->get_all_todo_list ( $client_id );
			$data ['projectcount'] = $this->Projectsmodel->get_project_count ( $client_id );
			$data ['openIssueCount'] = $this->Projectsmodel->get_open_issue_count ( $client_id );
			$data ['closedIssueCount'] = $this->Projectsmodel->get_closed_issue_count ( $client_id );
			$data ['loggedhours'] = $this->Projectsmodel->get_total_logged_hours ( $client_id );
			$data ['lm_earnings'] = $this->Projectsmodel->get_total_earnings_last_month ( $client_id );
			$data ['lm_bill'] = $this->Projectsmodel->get_total_bill_last_month ( $client_id );
			$data ['lm_pending'] = $this->Projectsmodel->get_total_pending_bill_last_month ( $client_id );
			
			// $data=array('results'=>$results);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'dashboard_2', $data );
		}
	}
	
	/**
	 * Method to load client list
	 */
	public function clients() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Clients' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			
			$this->load->model ( 'Clientmodel' );
			$results = $this->Clientmodel->view_clients_overview ();
			$data = array (
					'results' => $results 
			);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'clients', $data );
		}
	}
	
	/**
	 * Method to get settings details
	 */
	public function settings() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Clients' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			
			$this->load->model ( 'Projectsmodel' );
			$results = $this->Projectsmodel->get_company_details ();
			$data = array (
					'results' => $results 
			);
			
			/*
			 * $this->load->model('Clientmodel');
			 * $results=$this->Clientmodel->view_clients_overview();
			 * $data=array('results'=>$results);
			 */
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'settings', $data );
		}
	}
	
	/**
	 * Get client details based on client id.
	 * 
	 * @param
	 *        	$client_id
	 */
	public function view_client_by_id($client_id) {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Clientmodel' );
			$results = $this->Clientmodel->get_client_by_client_id ( $client_id );
			$data = array (
					'results' => $results 
			);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'edit_client', $data );
		}
	}
	
	/**
	 * Method to load users list
	 */
	public function users() {
		if ($this->session->user_name != null) {
			
			if($this->session->userdata ( 'user_type_id' ) != '3' && $this->session->userdata ( 'user_type_id' ) != '2')
			{
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Users' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			
			$this->load->model ( 'Usersmodel' );
			$results = $this->Usersmodel->get_users ();
			$data = array (
					'results' => $results 
			);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'users', $data );
			}
		}
	}
	
	/**
	 * Method to get list of Invoices
	 */
	public function invoices() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Invoices' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			
			$this->load->model ( 'Projectsmodel' );
			$results = $this->Projectsmodel->get_invoice_list ($this->session->userdata ( 'user_type_id' ),$this->session->userdata ( 'client_id' ));
			$data ['results'] = $results;
			$data ['user_type'] = $user_type_id;
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'invoices', $data );
		}
	}
	
	/**
	 * Method to get list of payments received.
	 */
	public function payments() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Payments' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			
			$this->load->model ( 'Projectsmodel' );
			$results = $this->Projectsmodel->get_payments_list ($this->session->userdata ( 'user_type_id' ),$this->session->userdata ( 'client_id' ));
			$data = array (
					'results' => $results 
			);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'payments', $data );
		}
	}
	
	/**
	 * Method to delete user based on username.
	 * 
	 * @param
	 *        	$username
	 */
	public function delete_user($username) {
		$this->load->model ( 'Usersmodel' );
		$this->Usersmodel->delete_user ( $username );
		
		$results = $this->Usersmodel->get_users ();
		$data = array (
				'results' => $results 
		);
		
		$this->load->view ( 'menu' );
		$this->load->view ( 'border' );
		$this->load->view ( 'users', $data );
	}
	
	/**
	 * Method to delete client based on userid.
	 * 
	 * @param
	 *        	$userid
	 */
	public function delete_client($userid) {
		$this->load->model ( 'Clientmodel' );
		$this->Clientmodel->delete_client ( $userid );
		
		$results = $this->Clientmodel->view_clients_overview ();
		$data = array (
				'results' => $results 
		);
		
		$this->load->view ( 'menu' );
		$this->load->view ( 'border' );
		$this->load->view ( 'clients', $data );
	}
	
	/**
	 * Method to delete invoice.
	 * @param  $invoiceid
	 */
	public function delete_invoice($invoiceid) {
		$this->load->model ( 'Projectsmodel' );
		$this->Projectsmodel->delete_invoice ( $invoiceid );
		
		$this->load->model ( 'Projectsmodel' );
		$results = $this->Projectsmodel->get_invoice_list ($this->session->userdata ( 'user_type_id' ),$this->session->userdata ( 'client_id' ));
		$data = array (
				'results' => $results 
		);
		
		$this->load->view ( 'menu' );
		$this->load->view ( 'border' );
		$this->load->view ( 'invoices', $data );
	}
	
	/**
	 * Method to view user by username.
	 * @param  $username
	 */
	public function view_user_by_username($username) {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Usersmodel' );
			$data ['results'] = $this->Usersmodel->get_user_by_username ( $username );
			$this->load->model ( 'Clientmodel' );
			$data ['clients'] = $this->Clientmodel->view_clients_overview ();
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'edit_user', $data );
		}
	}
	
	/**
	 * Method to add user.
	 */
	public function add_user() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Usersmodel' );
			$data ['results'] = $this->Usersmodel->get_users ();
			$this->load->model ( 'Clientmodel' );
			$data ['clients'] = $this->Clientmodel->view_clients_overview ();
			
			// $data=array('results'=>$results);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'adduser', $data );
		}
	}
	
	/**
	 * Method to add invoice
	 */
	public function add_invoice() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Usersmodel' );
			$results = $this->Usersmodel->get_users ();
			$data = array (
					'results' => $results 
			);
			
			$this->load->model ( 'Projectsmodel' );
			$invoiceId = $this->Projectsmodel->get_current_invoiceId ();
			$data ['invoiceId'] = $invoiceId;
			
			$this->load->model ( 'Clientmodel' );
			$clientDetails = $this->Clientmodel->get_client_name_and_id ();
			$data ['clientdetails'] = $clientDetails;
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'createinvoice', $data );
		}
	}
	
	/**
	 * Method to get client details
	 */
	public function client_details() {
		if ($this->session->user_name != null) {
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			// $this->load->view('projectmenu');
			$this->load->view ( 'clientdetails' );
		}
	}
	
	/**
	 * Method to get projects list.
	 */
	public function projects() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Loginmodel' );
			$user_type_id = $this->session->userdata ( 'user_type_id' );
			$data ['menu_name'] = $this->Loginmodel->get_main_menu_list ( $user_type_id, 'Projects' );
			$this->session->set_userdata ( 'first_level_menu', $data );
			
			$this->load->model ( 'Projectsmodel' );
			$results = $this->Projectsmodel->view_projects_overview ( $this->session->userdata ( 'client_id' ) );
			$data = array (
					'results' => $results 
			);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'projects', $data );
		}
	}
	
	/**
	 * Method to add project
	 */
	public function add_project() {
		if ($this->session->user_name != null) {
			
			$this->load->model ( 'Clientmodel' );
			$results = $this->Clientmodel->get_client_name_and_id ();
			$data = array (
					'results' => $results 
			);
			
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'addproject', $data );
		}
	}
	
	/**
	 * Method to get project details based on
	 * project id.
	 * 
	 * @param
	 *        	$id
	 */
	public function project_details($id) {
		if ($this->session->user_name != null) {
			
			/*
			 * $this->load->model('Clientmodel');
			 * $results=$this->Clientmodel->get_client_name_and_id();
			 * $data=array('results'=>$results);
			 */
			
			if (is_numeric ( $id )) {
				$this->session->set_userdata ( "project_id", $id );
			}
			
			// echo($this->session->userdata('project_id'));
			$this->load->model ( 'Projectsmodel' );
			$results = $this->Projectsmodel->get_todo_list ( $this->session->userdata ( 'project_id' ) );
			
			$data = array (
					'results' => $results 
			);
			
			// print_r($results);
			
			$project_id = $this->uri->segment ( $id );
			$this->load->view ( 'menu' );
			$this->load->view ( 'border' );
			$this->load->view ( 'agile_dashboard', $data );
		}
	}
	
	/**
	 * Function to add issues.
	 * 
	 * @param $navs- navigational
	 *        	parameter
	 * @param $project_id -project
	 *        	id.
	 */
	public function add_issues($navs, $project_id) {
		echo ('==========================================' . $navs);
		$this->load->model ( 'Usersmodel' );
		$results = $this->Usersmodel->get_users ();
		// $data=array('results'=>$results);
		$data ['results'] = $results;
		$data ['navs'] = $navs;
		
		$this->load->view ( 'menu' );
		$this->load->view ( 'border' );
		$this->load->view ( 'create_issues', $data );
	}
	
	/**
	 * Method to create sprint.
	 */
	public function create_sprint() {
		$this->load->model ( 'Scrummodel' );
		// $results=$this->Scrummodel->view_issues($this->session->userdata('project_id'));
		$data ['issueList'] = $this->Scrummodel->view_all_issues ( $this->session->userdata ( 'project_id' ) );
		
		$sprintId = $this->Scrummodel->get_current_sprintid ();
		$data ['sprintId'] = $sprintId;
		
		$data ['error_count'] = FALSE;
		$this->load->library ( 'calendar' );
		$this->load->view ( 'menu' );
		$this->load->view ( 'border' );
		$this->load->view ( 'create_sprint', $data );
	}
	
	/**
	 * Method to edit sprint based on sprint id.
	 * @param  $sprint_id
	 */
	public function edit_sprint($sprint_id) {
		$this->load->model ( 'Scrummodel' );
		// $results=$this->Scrummodel->view_issues($this->session->userdata('project_id'));
		$data ['issueList'] = $this->Scrummodel->view_issues ( $this->session->userdata ( 'project_id' ) );
		
		$data ['sprintList'] = $this->Scrummodel->view_sprints_byid ( $sprint_id );
		
		$data ['sprintId'] = array (
				$sprint_id 
		);
		
		$data ['error_count'] = FALSE;
		$data ['issueList'] = $this->Scrummodel->view_all_issues ( $this->session->userdata ( 'project_id' ) );
		
		$this->load->library ( 'calendar' );
		$this->load->view ( 'menu' );
		$this->load->view ( 'border' );
		$this->load->view ( 'edit_sprint', $data );
	}
	
	/**
	 * To manage the submenus
	 * 
	 * @param $Project id        	
	 */
	public function submenu($id, $menuType) {
		if ($this->session->user_name != null) {
			
			if ($menuType == 'issues') {
				$this->load->model ( 'Scrummodel' );
				$records = $this->Scrummodel->view_issues ( $id );
				$data ['results'] = $records;
				
				// print_r($data['results'][0]);
				// print_r($data);
				
				// $project_id = $this->uri->segment($id);
				$this->load->view ( 'menu' );
				$this->load->view ( 'border' );
				$this->load->view ( 'view_issues', $data );
			}
			
			if ($menuType == 'stories') {
				$this->load->model ( 'Scrummodel' );
				$records = $this->Scrummodel->view_stories ( $id );
				$data ['results'] = $records;
				
				// print_r($data['results'][0]);
				// print_r($data);
				
				// $project_id = $this->uri->segment($id);
				$this->load->view ( 'menu' );
				$this->load->view ( 'border' );
				$this->load->view ( 'view_stories', $data );
			}
			
			if ($menuType == 'sprint') {
				
				$sprint_id = '';
				$this->load->model ( 'Scrummodel' );
				$resultsSprint = $this->Scrummodel->view_sprints ( $id );
				$data ['sprintList'] = $resultsSprint;
				
				$sprintIdData = $resultsSprint;
				print_r ( $sprintIdData );
				
				foreach ( $sprintIdData as $value ) {
					$sprint_id = $value->sprint_id;
				}
				
				$results = $this->Scrummodel->view_sprintwise_issues ( $sprint_id );
				$data ['issueList'] = $results;
				
				$data ['error_count'] = FALSE;
				// $this->session->set_userdata("project_id",$id);
				
				// $project_id = $this->uri->segment($id);
				$this->load->view ( 'menu' );
				$this->load->view ( 'border' );
				$this->load->view ( 'view_sprint', $data );
			}
			
			if ($menuType == 'timesheet') {
				$this->load->model ( 'Scrummodel' );
				$records = $this->Scrummodel->view_all_issues ( $id );
				$data ['results'] = $records;
				
				// print_r($data['results'][0]);
				// print_r($data);
				
				// $project_id = $this->uri->segment($id);
				$this->load->view ( 'menu' );
				$this->load->view ( 'border' );
				$this->load->view ( 'timesheet', $data );
			}
			
			if ($menuType == 'reports') {
				$this->load->model ( 'Scrummodel' );
				$finaldata = $this->Scrummodel->get_map_coordinates ( $this->session->userdata ( 'project_id' ) );
				
				// $this->load->model('Scrummodel');
				// $records=$this->Scrummodel->view_all_issues($id);
				// $data['results']=$records;
				
				// print_r($data['results'][0]);
				// print_r($data);
				
				// $project_id = $this->uri->segment($id);
				
				$data ['chart_data'] = $finaldata; /*
				                                  * array(
				                                  *
				                                  *
				                                  * array( 'name' => '5',
				                                  * 'link' => '15',
				                                  * 'con' => '8'
				                                  * ),
				                                  *
				                                  * array( 'name' => '7',
				                                  * 'link' => '20',
				                                  * 'con' => '10'
				                                  * )
				                                  * );
				                                  */
				
				/*
				 * 'data1'=>array(5,10,15),
				 * 'data2'=>array(6,12,17),
				 * 'data3'=>array(7,14,19));
				 */
				// $data['min_year'] = array(1,2,3);
				// $data['max_year'] = array(10,20,30);
				
				// $this->load->view('chart', $data);
				$this->load->view ( 'menu' );
				$this->load->view ( 'border' );
				$this->load->view ( 'reports', $data );
			}
			
			if ($menuType == 'dashboard') {
				
				
				$this->load->model ( 'Projectsmodel' );
				$results = $this->Projectsmodel->get_todo_list ( $this->session->userdata ( 'project_id' ) );
				
				$data = array (
						'results' => $results 
				);
				
				$this->load->view ( 'menu' );
				$this->load->view ( 'border' );
				$this->load->view ( 'agile_dashboard', $data );
			}
		}
	}
}