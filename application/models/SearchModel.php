<?php 

class SearchModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getSearch($query){
		// $this->db->cache_on();
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
		if($query!=null){
    	    $this->db->select('produtos.id, produtos.nome, produtos.referencia, produtos_imagens.produto_id, produtos_imagens.imagem');
		    $this->db->from('produtos');
		    $this->db->like('produtos.nome', $query);
		    $this->db->or_like('referencia', $query);
		    // $this->db->or_like('descricao', $query);
		    $this->db->join('produtos_imagens', 'produtos_imagens.produto_id = produtos.id', 'left');
		    $this->db->group_by('produtos.id');

	        $query = $this->db->get();
		    // echo $query->num_rows();
 			if( $query->num_rows() > 0 ){
 				return $query->result();
 			}    		
 			else{
 				echo 'Nenhum Resultado Encontrado!';
 			}
        }

	}


	

}