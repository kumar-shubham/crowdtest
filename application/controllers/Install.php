<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

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
		//$this->load->library('session');
		//$this->load->model('Loginmodel');
		
	}
	
	public function index()
	{
	//$data['error_flag']=true;
	$this->load->view('installation/installscript');
	}
	/**
	 * Method to display login page
	 */
	public function install_application()
	{
		log_message('debug', 'Inside Install') ;
		$this->load->helper('file');
		
		
		$config_file= read_file(APPPATH."config/production/database.php","w");
		log_message('debug', 'Inside Install db') ;
		//$fp = fopen(APPPATH."config/production/database.php", "a");
		
		$config_array=array();
		$config_array['hostname']=$this->security->xss_clean($this->input->post('hostname'));
		$config_array['username']=$this->security->xss_clean($this->input->post('username'));
		$config_array['password']=$this->security->xss_clean($this->input->post('password'));
		$config_array['database']=$this->security->xss_clean($this->input->post('dbname'));
		$active_group='production';
		
	foreach ($config_array as $key => $val)
            {
            	
                    $pattern = '/\$db\[\\\''.$active_group.'\\\'\]\[\\\''.$key.'\\\'\]\s+=\s+[^\;]+/';
            $replace = "\$db['$active_group']['$key'] = '$val'";

                $config_file = preg_replace($pattern, $replace, $config_file);
            }
         //   print_r($config_file);
		if ( ! write_file(APPPATH."config/production/database.php", $config_file,'w'))
		{
			log_message('error', 'Unable to Install .Inappropriate file permission') ; 
		}
		
		
		$config_file_mod= read_file(APPPATH."config/config.php","w");
		$config_array_mod=array();
		$config_array_mod['installed']="yes";
		
		foreach ($config_array_mod as $key => $val)
		{
			$pattern = '/\$config\[\\\''.$key.'\\\'\]\s+=\s+[^\;]+/';
			$replace = "\$config['$key'] = '$val'";
			$config_file_mod = preg_replace($pattern, $replace, $config_file_mod);
		}
		
		if ( ! write_file(APPPATH."config/config.php", $config_file_mod,'w'))
		{
			log_message('error', 'Unable to write the file' ) ;
		}
		
		
		//$this->load->model('Loginmodel');
		 $queries=file_get_contents(base_url()."./db/"."db.sql");
		 $var=$this->load->model('Loginmodel');
		 //echo("=========MODEL============".$var);
		 $this->Loginmodel->install_db_scripts($queries);
		 $data['error_flag']=true;
		 $this->load->view('installation/installprogress',$data);
		 //$this->load->view('agile_login',$data);
		 
		
		/*
		$fp = fopen("./db/"."test.php", "w");
		$config_array=array();
		$config_array['installed']="yes";
				
				foreach ($config_array as $key => $val)
		{
			$pattern = '/\$config\[\\\''.$key.'\\\'\]\s+=\s+[^\;]+/';
			$replace = "\$config['$key'] = '$val'";
			$config_file = preg_replace($pattern, $replace, $config_file);
		}

if ( ! write_file("./db/"."test.php", $config_file,'r+'))
{
     echo 'Unable to write the file';
}
else
{
     echo 'File written!';
}
		
	}
	*/
	}	
		
}