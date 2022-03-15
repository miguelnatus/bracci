<?php 

class ProjetosModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}


	public function getProjetos(){
		$this->db->select("*");
		$this->db->from('projetos');
		$this->db->order_by('order', 'ASC');
		$query = $this->db->get();
		// echo '<pre>';
		// print_r($query->result());
		// exit();
		return $query->result();

	}

}