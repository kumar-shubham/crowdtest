<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Scrummodel extends CI_Model {

	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}

	/**
	 * Insert issue details in the database.
	 * @param  $data
	 */
	public function insert_issue_details($data)
	{
			
		$this->db->insert('ag_issues_txn', $data);
		
	}

	/**
	 * Insert scrum details in the database.
	 * @param  $data
	 */
	public function insert_scrum_details($data)
	{
			
		$this->db->insert('ag_sprint', $data);
	
	}
	
	/**
	 * Update issues in the database 
	 * based on issue_id and sprint_id.
	 * @param unknown $issue_id
	 * @param unknown $sprint_id
	 */
	public function update_issues($issue_id,$sprint_id)
	{
			
		$data = array('sprint_id' => $sprint_id );
		$this->db->where('issue_id', $issue_id);
		$query=$this->db->update('ag_issues_txn', $data);
		
	
	}
	
	
	/**
	 * Get sprint burn down chart X Axis.
	 */
	
	public function get_burn_down_xaxis()
	{
		
	}
	/**
	 *  Get map co-ordinates.
	 * @param  $project_id
	 */
	public function get_map_coordinates($project_id)
	{
		$result=$this->get_current_sprintid();
		$sprintResult=$this->view_sprints_byid($result[0]->sprint_id);
		$begin = new DateTime($sprintResult[0]->start_date);
		$end = new DateTime($sprintResult[0]->end_date);
		$end->modify('+1 day');
		$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
		
		$totalSprintHours=$this->get_issuedetails_by_sprintid($result[0]->sprint_id);
		$totalEstimate=0;
		foreach($totalSprintHours as $tsh)
		{
			 $totalEstimate=$totalEstimate+($tsh->original_estimate);
		}
		
		/*Getting Average sprint hours remaining on each day basis */
		if($this->get_total_working_days($daterange)!=0){
		$averagePerDay=$totalEstimate / $this->get_total_working_days($daterange);
		}
		else{
			$averagePerDay=0;
		}
		$totalAvgHrs=$totalEstimate;
		$totalActualHrs=$totalEstimate;
		$finalArray=array();
		$counter=0;
		foreach($daterange as $date){
			
			$formattedDate=$date->format("Y-m-d");
			$totalAvgRemainingHrs=$this->get_daywise_remaining_avghours($totalAvgHrs, $averagePerDay,$formattedDate);
			$totalActualRemainingHrs=$this->get_daywise_remaining_actualhours($totalActualHrs, $formattedDate,$result[0]->sprint_id);
			$finalData[$counter]= array('day' =>'new Date('.$date->format("Y,n-1,j").'),', 'avg'=> $totalAvgRemainingHrs.',', 'actual'=>$totalActualRemainingHrs);
			array_push($finalArray,$finalData[$counter]);
			$totalAvgHrs=$totalAvgRemainingHrs;
			$totalActualHrs=$totalActualRemainingHrs;
			$counter=$counter+1;
		}
		
		
		return $finalData;
		//print_r($totalEstimate);
	}
	
	/**
	 * Get day wise remaining actual hours.
	 * @param  $total
	 * @param  $date
	 * @param  $sprint_id
	 */
	public function get_daywise_remaining_actualhours($total,$date,$sprint_id)
	{
		if($this->is_working_day($date))
		{
			$actualLogged=0;
			$result=$this->view_timesheets_by_sprintid($sprint_id,$date);
			foreach($result as $row)
			{
				$actualLogged=$row->total_day_hrs;
			}
			
			return 
			
			 ($total-$actualLogged);
		}
		else
		{
			return $total;
		}
	}
	
	/**
	 * Get day wise remaining average hours.
	 * @param  $total
	 * @param  $average
	 * @param  $date
	 */
	public function get_daywise_remaining_avghours($total,$average,$date)
	{
		
		if($this->is_working_day($date))
		{
		return ($total-$average);
		}
		else
		{
			return $total;
		}
	}
	
	/**
	 * Get total working days.
	 * @param  $daterange
	 */
	public function get_total_working_days($daterange)
	{
		//echo("=========".$daterange);
		$countWorkingDays=0;
		foreach($daterange as $date){
			
			if($this->is_working_day($date->format("Y-m-d"))) 
			{
			$countWorkingDays= $countWorkingDays+1;
			}
		}
	return $countWorkingDays;
	}
	
	/**
	 * Check isworking day or not based on date.
	 * Monday to Fridays are considered as working.
	 * @param  $date
	 */
	public function is_working_day($date)
	{
		
		$query =$this->db->query("SELECT DAYOFWEEK('$date') dow");
		
		foreach($query->result() as $row)
		{
		if( $row->dow=='7' || $row->dow=='1')
			return false;
		else 
			return true;
	}
	}
	
	/**
	 * Get current sprint id.
	 */
	public function get_current_sprintid()
	{
			
		$this->db->select_max('sprint_id');
		$query = $this->db->get('ag_sprint');
		return $query->result() ;
	
	}
	
	/**
	 * View all issues based on project id.
	 * @param  $project
	 */
	public function view_all_issues($project)
	{
		$this->db->select('issue_id,status,sprint_id,summary,original_estimate,logged_estimate,reported_by,assigned_to,priority');
		$this->db->from('ag_issues_txn');
		$this->db->where('project_id', $project);
		$this->db->order_by("created_date", "desc");
		$query=$this->db->get();
	
		return $query->result() ;
	}
	
	/**
	 * View issues based on project id and issue type id.
	 * @param  $project
	 */
	public function view_issues($project)
	{
		$this->db->select('issue_id,status,sprint_id,summary,reported_by,assigned_to,priority');
		$this->db->from('ag_issues_txn');
		$this->db->where('project_id', $project);
		$this->db->where('issue_type_id !=', '2');
		$this->db->order_by("created_date", "desc");
		$query=$this->db->get();
		
		return $query->result() ;
	}
	
	/**
	 * View stories based on project id and issue type id.
	 * @param  $project
	 */
	public function view_stories($project)
	{
		$this->db->select('issue_id,status,sprint_id,summary,reported_by,assigned_to,priority');
		$this->db->from('ag_issues_txn');
		$this->db->where('project_id', $project);
		$this->db->where('issue_type_id', '2');
		$this->db->order_by("created_date", "desc");
		$query=$this->db->get();
	
		return $query->result() ;
	}
	
	/**
	 * Function to get Sprint wise Issues
	 * 
	 * @param String $sprint_id
	 */
	public function view_sprintwise_issues($sprint_id)
	{
		$this->db->select('issue_id,status,summary,reported_by,assigned_to,priority');
		$this->db->from('ag_issues_txn');
		$this->db->where('sprint_id', $sprint_id);
		$this->db->order_by("created_date", "desc");
		$query=$this->db->get();
	
		return $query->result() ;
	}
	
	
	/**
	 * Method to get issue details based on issue id.
	 * @param  $issue_id
	 */
	public function get_issue_details($issue_id)
	{
		
		$this->db->select("*");
		$this->db->from('ag_issues_txn');
		$this->db->where('issue_id', $issue_id);
		$query=$this->db->get();
		return $query->result() ;
	}
	
	/**
	 * Fetch project id based on issue id.
	 * @param  $issue_id
	 */
	public function get_project_id($issue_id)
	{
	
		$this->db->select("project_id");
		$this->db->from('ag_issues_txn');
		$this->db->where('issue_id', $issue_id);
		$query=$this->db->get();
		$ret = $query->row();
		return $ret->project_id;
	}
	
	/**
	 * Fetch issue details based on sprint id.
	 * @param  $sprint_id
	 */
	public function get_issuedetails_by_sprintid($sprint_id)
	{
	
		$this->db->select("*");
		$this->db->from('ag_issues_txn');
		$this->db->where('sprint_id', $sprint_id);
		$query=$this->db->get();
		return $query->result() ;
	}
	
	/**
	 * View sprint details based on start date and end date.
	 * @param  $project
	 */
	public function view_sprints($project)
	{
		
		$this->db->select('*');
		$this->db->from('ag_sprint');
		$this->db->where('curdate() between start_date and end_date');
		//$this->db->join('ag_issues_txn', 'ag_issues_txn.issue_id = ag_sprint.issue_id');
		//$this->db->order_by("created_date", "desc");
		$query=$this->db->get();
		return $query->result() ;
	}	
	
	
	/**
	 * View sprint details based on sprint id.
	 * @param  $sprint_id
	 */
	public function view_sprints_byid($sprint_id)
	{
	
		$this->db->select('*');
		$this->db->from('ag_sprint');
		$this->db->where('sprint_id',$sprint_id);
		//$this->db->join('ag_issues_txn', 'ag_issues_txn.issue_id = ag_sprint.issue_id');
		//$this->db->order_by("created_date", "desc");
		$query=$this->db->get();
		return $query->result() ;
	}
	
	/**
	 * Count the number of open sprints.
	 * @param  $stdate
	 */
	public function count_current_sprints($stdate)
	{
		
		$this->db->where("STR_TO_DATE('".$stdate."','%Y-%m-%d') between start_date and end_date");
		$num_rows = $this->db->count_all_results('ag_sprint');
		//print_r($num_rows);
		return $num_rows;
		
	}
	
	/**
	 * Update issues based on issue id.
	 * @param  $issue_id
	 * @param  $datam
	 */
	public function update_issue($issue_id,$datam)
	{
		$this->db->where('issue_id', $issue_id);
		$this->db->update('ag_issues_txn', $datam);
		
	}
	
	/**
	 * Update sprint based on sprint id.
	 * @param  $sprint_id
	 * @param  $datam
	 */
	public function update_sprint($sprint_id,$datam)
	{
		
		$this->db->where('sprint_id', $sprint_id);
		$this->db->update('ag_sprint', $datam);
	
	}
	
	/**
	 * Delete issues from database based on issue id.
	 * @param  $issue_id
	 */
	public function delete_issue_data($issue_id)
	{
		$this->db->where('issue_id', $issue_id);
		$this->db->delete('ag_issues_txn');
	}
	
	/**
	 * Update issues based on issue id and status.
	 * @param  $issue_id
	 * @param  $status
	 */
	public function set_issue_status($issue_id,$status)
	{
		$data = array(
				'status' => $status
		);
	
		$this->db->where('issue_id', $issue_id);
		$this->db->update('ag_issues_txn', $data);
	
	}
	
	/**
	 * Insert time sheet details.
	 * @param  $data
	 */
	public function insert_time_sheets($data)
	{
		$this->db->insert('ag_timesheet_details', $data);
	}
	
	/**
	 * View timesheets based on issue id. 
	 * @param unknown $issue_id
	 */
	public function view_time_sheets($issue_id)
	{
			
		$this->db->select('*');
		$this->db->from('ag_timesheet_details');
		$this->db->where('issue_id',$issue_id);
		$query=$this->db->get();
		return $query->result() ;	
	}
	
	/**
	 * Vie timesheets based on sprint id and date.
	 * @param  $sprint_id
	 * @param  $date
	 */
	public function view_timesheets_by_sprintid($sprint_id,$date)
	{
			
		$this->db->select('SUM(logged_hours) total_day_hrs');
		$this->db->from('ag_timesheet_details');
		$this->db->where('sprint_id',$sprint_id);
		$this->db->where('logged_date',$date);
		$query=$this->db->get();
		return $query->result() ;
	}

}

