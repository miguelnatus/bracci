<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

        if(!empty($this->session->userdata['usuario']['id'])){
            
            // $this->session->set_userdata("usuario", $usuario);
            // print_r($this->session->userdata['usuario']);
        
        }

        else{

        	return redirect('admin/login');

        }
    
    }

}