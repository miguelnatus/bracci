<?php 

class LinhasModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getLinhas(){
		
		$this->db->select('*');
		$this->db->from("linhas");
		

		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$query = $this->db->get();


		// echo '<pre>';
		// print_r($query->result());
		// exit();
	
		return $query->result();
		
	}

	public function getLinhasFilter(){
		
		$this->db->select('*');
		$this->db->from("linhas_filtros");
		$this->db->where("linhas_filtros.filtro_id","3");
		$this->db->join('linhas', 'linhas.id = linhas_filtros.linha_id', 'left');
		$this->db->group_by('linhas.id');
		$this->db->order_by('order', 'ASC');
		
		$query = $this->db->get();
	
		return $query->result();
		
	}

	public function getLinha($linha=null,$lang){
		$this->db->query('SET SQL_BIG_SELECTS=1'); 
		$this->db->select('linhas.nome linha_nome,linhas.*,produtos.id produto_id,produtos.nome produto_nome,produtos.nome_en produto_nome_en,produtos.nome_it produto_nome_it,produtos.referencia produto_ref, ordenacao_linhas.order');    
		$this->db->from('produtos');
		$this->db->join('linhas', 'produtos.linha_id = linhas.id', 'left');
		// $this->db->join('produtos_imagens', 'produtos.id = produtos_imagens.produto_id');
		$this->db->join('ordenacao_linhas', 'produtos.id = ordenacao_linhas.id_produto', 'left');

		if($lang=='en'){
			$this->db->where("linhas.slug_en", $linha);
		}
		elseif($lang=='it'){
			$this->db->where("linhas.slug_it", $linha);
		}
		else{		
			$this->db->where("linhas.slug", $linha);
		}
		$this->db->order_by('ordenacao_linhas.order');
		// $this->db->order_by('produtos_imagens.order_image', 'ASC');

		// $where = "produtos_imagens.order_image=0";
		// $where = "produtos_imagens.order_image=0 OR produtos_imagens.order_image='NULL'";
		// $this->db->where($where);
		
		$this->db->group_by('produtos.referencia');

		$query = $this->db->get();
	
		return $query->result();

	}

	public function getImageById($id=null){
		$this->db->select('produto_id,imagem,order_image');
		$this->db->from('produtos_imagens');
		$this->db->where('produto_id',$id);
		$this->db->order_by('order_image', 'ASC');
		$query = $this->db->get();
	
		return $query->result();
	}

	public function getAcabamentoProduct($ref=null){
		// print_r($ref);
		// filtros.imagem imagem,filtros.nome filtro_nome,filtros.slug filtro_slug,produtos.id id_produto,produtos.referencia referencia
		$this->db->select('filtros.imagem,filtros.slug filtro_slug,filtros.nome,filtros.id,produtos.referencia');
		$this->db->from('produtos');
		$this->db->join('produtos_filtros', 'produtos_filtros.produto_id = produtos.id', 'left');		
		$this->db->join('filtros', 'produtos_filtros.filtro_id = filtros.id');
		$this->db->where("produtos.referencia", $ref);
		// $this->db->from('filtros');
		// $this->db->join('produtos_filtros', 'produtos_filtros.filtro_id = filtros.id', 'left');
		// $this->db->join('produtos', 'produtos_filtros.produto_id = produtos.id', 'left');
		// $this->db->where("produtos.referencia", $ref);

		$this->db->where("filtros.slug != 'cozinha'");
		$this->db->where("filtros.slug != 'banheiro'");
		$this->db->where("filtros.slug != 'acessorios'");
		// WHERE filtros.slug != 'cozinha' AND filtros.slug != 'banheiro' AND filtros.slug != 'acessorios'
		// JOIN produtos_filtros ON produtos_filtros.filtro_id = filtros.id JOIN produtos ON produtos_filtros.produto_id = produtos.id
		$query = $this->db->get();
		// $query = $this->db->query("select filtros.imagem imagem,filtros.nome filtro_nome,filtros.slug filtro_slug,produtos.id id_produto,produtos.referencia referencia from filtros JOIN produtos_filtros ON produtos_filtros.filtro_id = filtros.id JOIN produtos ON produtos_filtros.produto_id = produtos.id WHERE filtros.slug != 'cozinha' AND filtros.slug != 'banheiro' AND filtros.slug != 'acessorios' AND produtos.id IN('".implode("','", $id_produtos)."') ORDER BY FIELD(produtos.id, '".implode("','", $id_produtos)."')");
		return $query->result();

	}



}