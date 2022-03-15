<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_model {

	public function __construct(){
		parent::__construct();
	}

	public function login($email,$senha){

		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('email', $email);
		$this->db->where('senha', sha1($senha));
		$query = $this->db->get()->row(); 
		if(!$query){
			return false;
		}
		return (array) $query;
		
	}

}