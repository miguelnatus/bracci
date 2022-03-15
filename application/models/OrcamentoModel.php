<?php 

class OrcamentoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function inserir($dados=null) {

		// echo '<pre>';
		// print_r($dados);
		// exit();

		$this->db->insert('orcamento', $dados);
		// foreach ($dados as $key => $value) {
		// 	$this->db->insert('orcamento', $value);
		// }

		// $query = $this->db->insert($tabela, $fields);
		// return($query);
		
	}



}