<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientmodel extends CI_Model {

	public $title;
	public $content;
	public $date;

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}

/**
 * Method used to insert client details
 *  in the database.
 * @param  $data
 */
	public function insert_client_details($data)
	{
			
		$this->db->insert('ag_client_details', $data);
		
	}
	
	/**
	 * Method used to view clients overview.
	 */
	public function view_clients_overview()
	{
		$this->db->select('client_id,organization_name,contact_person,email,phone_no,hosting_url');
		$query=$this->db->get('ag_client_details');
		return $query->result() ;
	}
	
	/**
	 * Method used to get clients
	 *  name and id.
	 */
	public function get_client_name_and_id()
	{
		$this->db->select('organization_name,client_id');
		$query=$this->db->get('ag_client_details');
		return $query->result() ;
	}
	
	/**
	 * Method used to fetch client details
	 * based on client id.
	 * @param  $client_id
	 */
	public function get_client_by_client_id($client_id)
	{
		$this->db->where('client_id', $client_id);
		$query=$this->db->get('ag_client_details');
		return $query->result() ;
	}
	
	/**
	 * Get client details based on invoice id.
	 * @param  $invoice_id
	 */
	public function get_client_by_invoice_id($invoice_id)
	{
		$this->db->select('*');
		$this->db->from('ag_invoice_txn');
		$this->db->join('ag_client_details', 'ag_invoice_txn.client_id = ag_client_details.client_id and ag_invoice_txn.invoice_id='.$invoice_id);
		$query=$this->db->get();
		return $query->result() ;
	}	
	
	/**
	 * Update client details based on client id.
	 * @param  $client_id
	 * @param  $datam
	 */
	public function update_client($client_id,$datam)
	{
		$this->db->where('client_id', $client_id);
		$this->db->update('ag_client_details', $datam);
	
	}
	/**
	 * Delete client details based client id.
	 * @param  $userid
	 */
	public function delete_client($userid)
	{
		$this->db->where('client_id', $userid);
		$this->db->delete('ag_client_details');
	}

}