<?php
class Mailboxmodel extends CI_Model {

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
         * Method to verify username and email and 
         * reset password.
         * @param  $userName
         * @param  $email
         */
        public function getInboxMails($user_name)
        {
        	$this->db->select ( '*' );
        	$this->db->from ( 'ag_inbox' );
        	$this->db->join ( 'ag_sendmail', 'ag_inbox.messageid = ag_sendmail.id');
        	$this->db->where('to_user', $user_name);
        
           	$query = $this->db->get ();
        	
        	return $query->result ();
        }

        /**
         * Verify user login based on username and password inputs.
         * @param  $userName
         * @param  $password
         *
         */
		public function verify_user_login($userName,$password)
		{
			
			$this->db->from('ag_users');
			$this->db->where('username', $userName);
			$this->db->where('password', $password);
			$query = $this->db->get();
			$query->result();
			return $query;
		}
		
		/**
		 * Get main menu list based on user type  and active menu.
		 * @param  $user_type_id
		 * @param  $active_menu
		 */
		public function get_main_menu_list($user_type_id,$active_menu)
		{
			$sql = "select distinct amm.menu_name,amm.menu_url,amm.icon from ag_menu_mst amm, ag_role_menu_mapping armm , ag_users au 
					where au.user_type_id=armm.user_type_id and armm.menu_id=amm.menu_id and au.user_type_id=? and amm.sub_menu_flag=? ";
			//echo($sql);
			$query=$this->db->query($sql, array($user_type_id, '0'));
			foreach ($query->result() as $row)
			{
				if($row->menu_name== $active_menu)
				{
				
				$data[]='<li class="active"><a href="'. base_url().$row->menu_url.'"><i class="'.$row->icon.'"></i> <span class="nav-label">'.$row->menu_name .'</span> </a>
				</li>';
				}
				
				else {
					$data[]='<li><a href="'. base_url().$row->menu_url.'"><i class="'.$row->icon.'"></i> <span class="nav-label">'.$row->menu_name .'</span> </a>
				</li>';
				}
				
			}
			
			
			return $data;
			
		}
		
}