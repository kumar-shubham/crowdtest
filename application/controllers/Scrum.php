<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scrum extends CI_Controller {

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
	 * Insert issue details.
	 */
	public function index()
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
		
		$datam= array(
		//'project_id'=> $this->input->post('pid'),
		'issue_type_id'=>$this->input->post('issue_type_id'),
		'project_id'=>$this->session->userdata('project_id'),		
		//'project_lead'=>$this->input->post('phone'),
		'summary'=>$this->input->post('title'),
		'description'=>$this->input->post('description'),
		'priority'=>$this->input->post('priority'),
		'reported_by'=>$this->input->post('reported_by'),
		'assigned_to'=>$this->input->post('assigned_to'),
		'attachment'=>$config['upload_path'],
		'filename'=>$this->security->sanitize_filename($upload_data['file_name']),
		'status'=>'Not Started',
		'original_estimate'=>$this->input->post('time'));
		/* 'hourly_rate'=>$this->input->post('hrate'),
		'estimated_hours'=>$this->input->post('esthrs'),
		'notes'=>$this->input->post('notes')); */
		$this->load->model('Scrummodel');
		$this->Scrummodel->insert_issue_details($this->security->xss_clean($datam));
					
		if(trim($this->input->post('issue_type_id')) == '2')
		{
			$results=$this->Scrummodel->view_stories($this->session->userdata('project_id'));
			$data=array('results'=>$results);
			$this->load->view('menu');
			$this->load->view('border');
			$this->load->view('view_stories',$data);
		}
		else 
		{
			$results=$this->Scrummodel->view_issues($this->session->userdata('project_id'));
			$data=array('results'=>$results);
			$this->load->view('menu');
			$this->load->view('border');
			$this->load->view('view_issues',$data); 
		}
	}
	
	/**
	 * Method used to update issues.
	 * @param  $issue_id
	 */
	public function set_edit_issues($issue_id_param)
	{
		$issue_id=$this->security->xss_clean($issue_id_param);
		//if($this->input->post('userfile')!=null)
		//{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '134217728';
		/* $config['max_width']  = '1024';
			$config['max_height']  = '768';
			*/
		$this->load->library('upload', $config);
	
		$this->upload->do_upload();
		$upload_data=$this->upload->data();
		//}	
		$datam1= array(
				//'project_id'=> $this->input->post('pid'),
				'issue_type_id'=>$this->input->post('issue_type_id'),
				'project_id'=>$this->input->post('project_id'),
				//'project_lead'=>$this->input->post('phone'),
				'summary'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'priority'=>$this->input->post('priority'),
				'reported_by'=>$this->input->post('reported_by'),
				'assigned_to'=>$this->input->post('assigned_to'),
				'original_estimate'=>$this->input->post('time'),
				'attachment'=>$config['upload_path'],
				'filename'=>$this->security->sanitize_filename($upload_data['file_name']));
		
		
		
		if($this->security->xss_clean($this->input->post('userfile'))!=null)
		{
			
			$datam= array_merge($datam1, array('attachment'=>$config['upload_path'],
		'filename'=>$this->security->sanitize_filename($upload_data['file_name'])));
					
		}
		else {
			
		$datam=$datam1;
		}
		
		
		$this->load->model('Scrummodel');
		$this->Scrummodel->update_issue($issue_id,$this->security->xss_clean($datam));
			
		$results=$this->Scrummodel->get_issue_details($issue_id);
		$data=array('results'=>$results);
				
		$records_timesheet=$this->Scrummodel->view_time_sheets($issue_id);
		$data['resultsTimesheet']=$records_timesheet;
			
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('view_issue_details',$data);
		
	
	}
	
	
	/**
	 * Method to get issue details and 
	 * route to edit issues page
	 * @param  $issue_id
	 */
	
	public function edit_issues($issue_id)
	{
		$this->load->model('Scrummodel');
		$results=$this->Scrummodel->get_issue_details($this->security->xss_clean($issue_id));
		$data['issues']=$results;
		
		$this->load->model('Usersmodel');
		$resultsUser=$this->Usersmodel->get_users();
		$data['users']=$resultsUser;
		
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('edit_issues',$data);
	
		
	}
	
	
	/**
	 * Method to View sprints. 
	 */
	
	public function view_sprints()
	{
		
		$this->load->model('Scrummodel');
		$this->Scrummodel->insert_issue_details($datam);
		
		//echo ('con===='.$this->session->userdata('project_id'));
		$results=$this->Scrummodel->view_issues($this->session->userdata('project_id'));
		$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('view_issues',$data);
	}
	
	/**
	 * Method used to create sprints.
	 */
	public function create_sprints()
	{
		
		$this->load->model('Scrummodel');
		$rows=$this->Scrummodel->count_current_sprints($this->security->xss_clean($this->input->post('stdate')));
		if($rows=='0'){
			$datam= array(
		//'project_id'=>$this->session->userdata('project_id'),
		//'project_lead'=>$this->input->post('phone'),
		'sprint_id'=>$this->input->post('sprint_id'),
		'sprint_title'=>$this->input->post('title'),
		'start_date'=>$this->input->post('stdate'),
		'end_date'=>$this->input->post('enddate'),
		'created_by'=>$this->session->userdata('user_name'),
		 		
		 );
		 
		$this->Scrummodel->insert_scrum_details($this->security->xss_clean($datam));
		$target = $this->input->post('issues[]');
		
		foreach($target as $issueList)
		{
			$this->Scrummodel->update_issues($issueList,$this->security->xss_clean($this->input->post('sprint_id')));
		}
		
		$data['error_count']=FALSE;
		$resultsSprint=$this->Scrummodel->view_sprints($this->session->userdata('project_id'));
		$data['sprintList']=$resultsSprint;
		$results=$this->Scrummodel->view_sprintwise_issues($this->security->xss_clean($this->input->post('sprint_id')));
		$data['issueList']=$results;
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('view_sprint',$data);
		}
		else {
			$data['error_count']=TRUE;
			
			$data['issueList']=$this->Scrummodel->view_all_issues($this->session->userdata('project_id'));
			$sprintId=$this->Scrummodel->get_current_sprintid();
			$data['sprintId']=$sprintId;
					
			$this->load->library('calendar');
			$this->load->view('menu');
			$this->load->view('border');
			$this->load->view('create_sprint',$data);
		}
		
	}
	
	/**
	 * Method used to update sprint details 
	 * which includes stories and issues.
	 * @param  $sprint_id
	 */
	public function save_edit_sprints($sprint_id_params)
	{
		$sprint_id=$this->security->xss_clean($sprint_id_params);
		$datam= array(
		'sprint_title'=>$this->input->post('title'), 
		'start_date'=>$this->input->post('stdate'),
		'end_date'=>$this->input->post('enddate'),
		'created_by'=>$this->session->userdata('user_name'));
		$this->load->model('Scrummodel');
		$this->Scrummodel->update_sprint($this->security->xss_clean($sprint_id),$this->security->xss_clean($datam));
		
		$target = $this->input->post('issues[]');
		
		foreach($target as $issueList)
		{
			$this->Scrummodel->update_issues($issueList,$sprint_id);
		}
		$resultsSprint=$this->Scrummodel->view_sprints($this->session->userdata('project_id'));
		$data['sprintList']=$resultsSprint;
		$data['error_count']=FALSE;
		$data['issueList']=$this->Scrummodel->view_sprintwise_issues($sprint_id);
		//$data=array('results'=>$results);
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('view_sprint',$data);
	}
	
	/**
	 * Method used to save timesheet.
	 */
	public function save_timesheet()
	{
	
		$newDate = date("Y-m-d", strtotime($this->security->xss_clean($this->input->post('logged_date'))));
		
		$total_hours=intval($this->security->xss_clean($this->input->post('logged_hours'))) + intval($this->security->xss_clean($this->input->post('logged_estimate')));
		
		$datam= array(
				'project_id'=>$this->session->userdata('project_id'),
				'logged_date'=>$newDate,
				'issue_id'=>$this->input->post('issue_id'),
				'logged_hours'=>$this->input->post('logged_hours'),
				'logged_user'=>$this->input->post('userid'),
				'description'=>$this->input->post('description'),
				'sprint_id'=>$this->input->post('sprint_id')
		);
		
		$datan=array(
				
				'logged_estimate'=>$total_hours
		);
		
		$this->load->model('Scrummodel');
		$this->load->model('Projectsmodel');
		$this->Scrummodel->insert_time_sheets($this->security->xss_clean($datam));
		
		$this->Scrummodel->update_issue($this->input->post('issue_id'),$datan);
		$this->issue_details($this->input->post('issue_id'));
			
	}
	
	
	/**
	 * Get Issue related all details 
	 * @param $id-Issue Id
	 */
	
	public function issue_details($id_params)
	{

		$id=$this->security->xss_clean($id_params);
		$this->load->model('Scrummodel');
		$project_id=$this->Scrummodel->get_project_id($id);
		
		if($this->session->userdata($project_id)==null or $this->session->userdata=='0')
		{
		$this->session->set_userdata("project_id",$project_id);
		}
		$results=$this->Scrummodel->get_issue_details($id);
		$data=array('results'=>$results);
		$records_timesheet=$this->Scrummodel->view_time_sheets($id);
		$data['resultsTimesheet']=$records_timesheet;
		
		
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('view_issue_details',$data);
		
	}
	
	/**
	 * Method used to download file 
	 * based on file name.
	 * @param  $file_name
	 */
	public function download_file($file_name)
	{
		$this->load->helper('download');
		$data = file_get_contents("./uploads/".$file_name); // Read the file's contents
		$name = $file_name;
		
		force_download($name, $data);
	}
	
	/**
	 * Method used to set status of issues.
	 * @param  $issue_id
	 * @param  $status
	 */
	public function set_status($issue_id,$status)
	{
		$this->load->model('Scrummodel');
		$results=$this->Scrummodel->set_issue_status($issue_id,$status);
		
		$this->issue_details($issue_id);
		
	}
	
	/**
	 * Method used to delete issues.
	 * @param  $issue_id
	 */
	public function delete_issues($issue_id_params)
	{
		$issue_id=$this->security->xss_clean($issue_id_params);
		$this->load->model('Scrummodel');
		$this->Scrummodel->delete_issue_data($issue_id);
		$records=$this->Scrummodel->view_issues($this->session->userdata('project_id'));
		$data['results']=$records;
		$this->load->view('menu');
		$this->load->view('border');
		$this->load->view('view_issues',$data);
		
	
	}
	
}