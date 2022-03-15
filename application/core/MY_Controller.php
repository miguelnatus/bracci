<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		
		$linguagens = array('pt','en','it');
		$ci =& get_instance();
		$lingua = $ci->uri->segment(1);

		if (in_array($lingua,$linguagens)){
			$ci->session->set_userdata('lingua',$lingua);
		}
		else{
			redirect(base_url('pt'), 'location', 301);
		}
		

	}

}
