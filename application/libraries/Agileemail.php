<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agileemail {

        public function __construct()
        {
        	
                //Do something with $params
        }
        
        /**
         * In the email array provide data in the format
         * to,from,subject,message.
         * @param Array $email
         */
        public function sendemail($email)
        {
        	//echo "test";
        	$CI =& get_instance();
        	
        	$CI->load->library('email');
        		 $CI->email->to($email['to']);
        		$CI->email->from($email['from']);
        		$CI->email->subject($email['subject']);
        		$CI->email->message($email['message']); 
        		//$CI->email->send();
        	
        }
}