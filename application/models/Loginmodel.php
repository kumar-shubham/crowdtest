<?php
class Loginmodel extends CI_Model {

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
         * Install db script
         */
        public function install_db_scripts()
        {
        	//$this->load->database();
        	$queries=file_get_contents(base_url()."./db/"."db.sql");
        	$file_array = explode(';', $queries);
        	//print_r ($file_array);
        	foreach ($file_array as $query)
        	{
        		$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
        		//echo($query);
        		$this->db->query($query);
        		$this->db->query("SET FOREIGN_KEY_CHECKS = 1");
        	}
        	//echo ($queries);
        //	$this->db->query("mysql -u root -p "."root" ." agile1 < ".base_url()."./db/"."db.sql");
        	 
        }
        /**
         * Method to verify username and email and 
         * reset password.
         * @param  $userName
         * @param  $email
         */
        public function verify_and_reset_pwd($userName,$email)
        {
        	log_message("debug","==test method==");
        	$this->db->select ( 'count(username) as user_count' );
        	$this->db->from ( 'ag_users' );
        	$this->db->where('username', $userName);
        	$this->db->where('email', $email);
           	$query = $this->db->get ();
        	$ret = $query->row ();
        	return $ret->user_count;
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