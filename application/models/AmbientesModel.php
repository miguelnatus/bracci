<?php

class AmbientesModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getAmbiente($id=null){

		$this->db->select("*");
		$this->db->from("filtros");
		// $this->db->join("categoria_filtros", "categoria_filtros.filtro_id = filtros.id");
		if($id!=null){
			$this->db->where("filtros.id", $id);
		}


		$query = $this->db->get();

		return $query->result();

	}

	public function getAmbientes($sub_categoria,$lang){
		// $this->db->cache_on();
		// $this->db->cache_delete_all();

		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('produtos.id id_produto, produtos_imagens.imagem produto_imagem ,produtos.referencia,produtos.nome produto_nome, produtos.nome_en produto_nome_en, produtos.nome_it produto_nome_it,linhas.id linha_id,linhas.nome linha_nome, linhas.nome_en linha_nome_en,linhas.nome_it linha_nome_it,linhas.slug slug, linhas.slug_en slug_en, linhas.slug_it slug_it,filtros.id filtro_id, filtros.nome filtro_nome, filtros.nome_en filtro_nome_en, filtros.nome_it filtro_nome_it,filtros.imagem filtro_imagem,filtros.descricao filtro_descricao,filtros.descricao_en filtro_descricao_en, filtros.descricao_it filtro_descricao_it,ordenacao_filtros.order, ordenacao_filtros.id');
		$this->db->from("ordenacao_filtros");
		$this->db->join('produtos','ordenacao_filtros.id_produto = produtos.id');
		$this->db->join('linhas','linhas.id = produtos.linha_id');
		$this->db->join('filtros','ordenacao_filtros.filtro_id = filtros.id');
		$this->db->join('produtos_imagens','produtos_imagens.produto_id = ordenacao_filtros.id_produto AND produtos_imagens.order_image = 0');
		$this->db->order_by('order');
		$this->db->group_by('produtos.referencia');

		if($lang=='en'){
			$this->db->where("filtros.slug_en", $sub_categoria);
		}
		elseif($lang=='it'){
			$this->db->where("filtros.slug_it", $sub_categoria);
		}
		else{
			$this->db->where("filtros.slug", $sub_categoria);
		}

		$query = $this->db->get();

		// echo '<pre>';
		// print_r($query->result());
		// exit();

		return $query->result();
	}

		// Traz os acabamentos dos produtos
	public function getAcabamentoProduct($id_produtos=null){
		// print_r($id_produtos);
		// $this->db->cache_on();
		$query = $this->db->query("select filtros.imagem imagem,filtros.nome filtro_nome,filtros.slug filtro_slug,produtos.id id_produto,produtos.referencia referencia from filtros JOIN produtos_filtros ON produtos_filtros.filtro_id = filtros.id JOIN produtos ON produtos_filtros.produto_id = produtos.id WHERE filtros.slug != 'cozinha' AND filtros.slug != 'banheiro' AND filtros.slug != 'acessorios' AND produtos.id IN('".implode("','", $id_produtos)."') ORDER BY FIELD(produtos.id, '".implode("','", $id_produtos)."')");
		return $query->result();

	}




}
