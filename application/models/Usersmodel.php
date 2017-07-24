<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usersmodel extends CI_Model {


	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	

	/**
	 * Method to fetch user details.
	 */
	public function get_users()
	{
		
		$query=$this->db->get('ag_users');
		
		return $query->result() ;
	}
	
	
	/**
	 * Method to get user based on username. 
	 * @param  $username
	 */
	public function get_user_by_username($username)
	{
		$this->db->where('username', $username);
		$query=$this->db->get('ag_users');
	
		return $query->result() ;
	}
	
	/**
	 * Insert user details in thje database.
	 * @param  $data
	 */
	public function insert_user_details($data)
	{
			
		$this->db->insert('ag_users', $data);
	
	}
	
	/**
	 * Update user details based on username.
	 * @param  $username
	 * @param  $datam
	 */
	public function update_user($username,$datam)
	{
		$this->db->where('username', $username);
		$this->db->update('ag_users', $datam);
	
	}
	/**
	 * Delete user based on username.
	 * @param  $username
	 */
	public function delete_user($username)
	{
		$this->db->where('username', $username);
		$this->db->delete('ag_users');
	}


}