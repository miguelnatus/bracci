<?php 

class ProdutosModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getProduto($referencia){

		$this->db->select("*");
		$this->db->from("produtos");
		// $this->db->join('produtos_filtros', 'produtos_filtros.produto_id = produtos.id');
		// $this->db->join('filtros', 'filtros.id = produtos_filtros.filtro_id');
		$this->db->where("referencia",$referencia);
	
		$query = $this->db->get();

		
		return $query->result()[0];	

	}

	public function getImagem($id){

		$this->db->select("*");
		$this->db->from("produtos_imagens");
		$this->db->where("produto_id",$id);
		$this->db->order_by('produtos_imagens.order_image', "ASC");

		$query = $this->db->get();

		return $query->result();
	}

	public function getDiferenciais($id){

		$this->db->select("*");
		$this->db->from("produtos_diferenciais");
		$this->db->join('diferenciais', 'produtos_diferenciais.diferencial_id = diferenciais.id');
		$this->db->where("produto_id",$id);

		$query = $this->db->get();

		return $query->result();

	}

	public function getAcabamentos($ref=null){
		$this->db->select('*,filtros.nome filtro_nome');
		$this->db->from('filtros');
		$this->db->join('produtos_filtros','produtos_filtros.filtro_id = filtros.id');
		$this->db->join('produtos','produtos_filtros.produto_id = produtos.id');

		$this->db->where('filtros.slug !=' , 'cozinha');
		$this->db->where('filtros.slug !=' , 'banheiro');
		$this->db->where('filtros.slug !=' , 'acessorios');
		
		$this->db->like('produtos.referencia', $ref);
		$query = $this->db->get();

		return $query->result();

	}

	public function getRelacionados($id){

		$this->db->select("*");
		$this->db->from("produtos_relacionados");
		$this->db->join('produtos', 'produtos_relacionados.produto_relacionado_id = produtos.id');
		$this->db->join('produtos_imagens', 'produtos_imagens.produto_id = produtos.id', 'left');
		$this->db->where("produtos_relacionados.produto_id",$id);
		$this->db->group_by('produtos.id');

		$query = $this->db->get();

		return $query->result();

	}


}