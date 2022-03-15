<?php

class AcabamentosModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getAcabamento($id=null){

		// $this->db->cache_on();
		// $this->db->cache_delete_all();
		if($id!=null){

			$this->db->select('*,linhas_filtros.id id,linhas.id linha_id');
			$this->db->from("linhas_filtros");
			$this->db->join('produtos','produtos.id = linhas_filtros.produto_id');
			$this->db->join('linhas','linhas.id = produtos.linha_id');
			$this->db->join('filtros', 'filtros.id = linhas_filtros.filtro_id', 'left');
			$this->db->group_by('linhas.id');
			$this->db->where('linhas_filtros.filtro_id',$id);
			$this->db->order_by('linhas_filtros.order');

		}
		else{

			$this->db->select('*');
			$this->db->from("filtros");
			$this->db->where('filtros.slug !=' , 'cozinha');
			$this->db->where('filtros.slug !=' , 'banheiro');
			$this->db->where('filtros.slug !=' , 'acessorios');

		}

		$query = $this->db->get();

		// echo '<pre>';
		// print_r($query->result());
		// exit();
		return $query->result();

	}

	// Traz od produtos correspondentes aos Filtros
	public function getAcabamentos($sub_categoria=null,$lang=null){
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('produtos.id id_produto, produtos_imagens.imagem produto_imagem ,produtos.referencia,produtos.nome produto_nome, produtos.nome_en produto_nome_en, produtos.nome_it produto_nome_it,linhas.id linha_id,linhas.nome linha_nome, linhas.nome_en linha_nome_en,linhas.nome_it linha_nome_it,linhas.slug slug, linhas.slug_en slug_en, linhas.slug_it slug_it,filtros.id filtro_id, filtros.nome filtro_nome, filtros.nome_en filtro_nome_en, filtros.nome_it filtro_nome_it,filtros.imagem filtro_imagem,filtros.descricao filtro_descricao, filtros.descricao_en filtro_descricao_en, filtros.descricao_it filtro_descricao_it,ordenacao_filtros.order, ordenacao_filtros.id');
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


	public function getLinhas($sub_categoria=null,$lang=null){

		$this->db->select('*,linhas_filtros.id id,linhas.id linha_id');
		$this->db->from("linhas_filtros");
		$this->db->join('produtos','produtos.id = linhas_filtros.produto_id');
		$this->db->join('linhas','linhas.id = produtos.linha_id');
		$this->db->group_by('linhas.id');
		$this->db->where('linhas_filtros.filtro_id',9);
		$this->db->order_by('linhas_filtros.order');

		$query = $this->db->get();


		return $query->result();
	}

	public function getProdutos(){
		$this->db->select('produtos_imagens.imagem produto_imagem,produtos.referencia referencia,produtos.linha_id pl_id,filtros.imagem filtro_imagem,linhas.nome linha,linhas.nome_en linha_en,linhas.nome_it linha_it,filtros.slug slug,filtros.slug_en slug_en,filtros.slug_it slug_it,produtos.nome nome,produtos.nome_en nome_en,produtos.nome_it nome_it,produtos.id id,filtros.id filtro_id,linhas.nome linha_nome,linhas.nome_en linha_nome_en,linhas.nome_it linha_nome_it');
		$this->db->from('linhas');
		$this->db->join('produtos','produtos.linha_id = linhas.id');
		$this->db->join('produtos_filtros','produtos_filtros.produto_id = produtos.id');
		$this->db->join('filtros','filtros.id = produtos_filtros.filtro_id', 'left');
		$this->db->join('linhas_filtros','linhas_filtros.filtro_id = filtros.id', 'left');
		$this->db->join('produtos_imagens','produtos_imagens.produto_id = produtos.id');
		$this->db->query('SET SQL_BIG_SELECTS=1');
		$this->db->where('linhas_filtros.filtro_id',9);


		$this->db->group_by('produtos.referencia');

		$this->db->order_by('produtos.order','ASC');

		$query = $this->db->get();

		// echo '<pre>';
		// print_r($query->result());
		// exit();

		return $query->result();
	}

	public function getProdAcess($sub_categoria=null,$lang=null){

		$this->db->select('*,p.referencia referencia, f.descricao descricao, f.descricao_en descricao_en, f.descricao_it descricao_it, p.nome produto_nome,p.nome_en produto_nome_en, p.nome_it produto_nome_it, f.nome as filtro, f.nome_en as filtro_en,, f.nome_it as filtro_it,l.nome as linha, l.nome_en as linha_en,l.nome_it as linha_it, f2.imagem acabamentos,produtos_imagens.imagem produto_imagem');
		$this->db->from('produtos p');
		$this->db->join('produtos_filtros pf', 'p.id = pf.produto_id');
		$this->db->join('filtros f', 'pf.filtro_id = f.id');
		$this->db->join('linhas l', 'p.linha_id = l.id');
		$this->db->join('produtos_filtros pf2', 'p.id = pf2.produto_id');
		$this->db->join('filtros f2', 'pf2.filtro_id = f2.id');
		$this->db->join('produtos_imagens', 'p.id = produtos_imagens.produto_id', 'left');
		$names = array('banheiro', 'cozinha', 'acessorios');
		$this->db->where_not_in('f2.slug', $names);
		$this->db->query('SET SQL_BIG_SELECTS=1');
		$this->db->order_by("linha", "desc");
		$this->db->group_by('p.id');

		if($lang=='en'){
			$this->db->where("f.slug_en", $sub_categoria);
		}
		elseif($lang=='it'){
			$this->db->where("f.slug_it", $sub_categoria);
		}
		else{
			$this->db->where("f.slug", $sub_categoria);
		}

		$query = $this->db->get();

		return $query->result();

	}

	public function getAcabById($id=null){
		$this->db->select('produtos.id id, produto_id, imagem, filtros.nome nome');
		$this->db->from('produtos');
		$this->db->join('produtos_filtros','produtos.id = produtos_filtros.produto_id');
		$this->db->join('filtros','filtros.id = produtos_filtros.filtro_id');
		$this->db->where("produtos.id", $id);
		$this->db->where("filtros.slug != ", 'acessorios');

		$query = $this->db->get();

		return $query->result()[0];
	}


	public function getAcessorios(){

		$this->db->select('*');
		$this->db->from('filtros');
		$query = $this->db->get();

		// $this->db->where("f.slug", $sub_categoria);
		return $query->result();
	}

			// $query = $this->db->query("select filtros.imagem imagem,filtros.nome filtro_nome,produtos.id id_produto,produtos.referencia referencia
			// 	from filtros JOIN produtos_filtros ON produtos_filtros.filtro_id = filtros.id JOIN produtos ON produtos_filtros.produto_id = produtos.id WHERE filtros.slug != 'cozinha' AND filtros.slug != 'banheiro' AND filtros.slug != 'acessorios' AND produtos.id
			// 	IN('".implode("','", $id_produtos)."') ORDER BY FIELD(produtos.id, '".implode("','", $id_produtos)."')");

	public function getAcabamentosProd($ref=null){

		$this->db->select('produtos.nome, produtos.nome_en,produtos.nome_it,produtos.referencia,filtros.nome filtro_nome, filtros.imagem imagem');
		$this->db->from('filtros');
		$this->db->join('produtos_filtros','produtos_filtros.filtro_id = filtros.id');
		$this->db->join('produtos','produtos_filtros.produto_id = produtos.id');

		$this->db->where('filtros.slug !=' , 'cozinha');
		$this->db->where('filtros.slug !=' , 'banheiro');
		$this->db->where('filtros.slug !=' , 'acessorios');

		$this->db->like('produtos.referencia', $ref);
		$query = $this->db->get();

				// echo '<pre>';
		// print_r($ref);
		// print_r(implode("|", $ref));
		// exit();

		// ".implode("%','%", $ref)."
		//SELECT ShipName, ShipAddress from Orders WHERE CustomerID ="WARTH" UNION SELECT ShipName, ShipAddress from Orders WHERE CustomerID ="VINET"
		// $query = $this->db->query("select produtos.nome,produtos.referencia,filtros.nome filtro_nome, filtros.imagem from filtros JOIN produtos_filtros ON produtos_filtros.filtro_id = filtros.id JOIN produtos ON produtos_filtros.produto_id = produtos.id  WHERE filtros.slug != 'cozinha' AND filtros.slug != 'banheiro' AND filtros.slug != 'acessorios' AND produtos.referencia REGEXP '".implode("|", $ref)."' ORDER BY produtos.referencia");
		// $this->db->select('produtos.nome,produtos.referencia,filtros.nome filtro_nome, filtros.imagem');
		// $this->db->from('filtros');
		// $this->db->join('produtos_filtros','produtos_filtros.filtro_id = filtros.id');
		// $this->db->join('produtos','produtos_filtros.produto_id = produtos.id');
		// $this->db->where('filtros.slug !=' , 'cozinha');
		// $this->db->where('filtros.slug !=' , 'banheiro');
		// $this->db->where('filtros.slug !=' , 'acessorios');

		// $this->db->like('produtos.referencia', $ref);


		// print_r($query->result());
		// exit();

		return $query->result();

	}



}
