<?php 

class AdminModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	//AdminModel->get() - é chamado pelo controller trazer todos os itens cadastrados
	//AdminModel->get(ID) - com id é chamado no UPDATE
	public function get($tabela,$id=null){
		$this->db->select("*");
		$this->db->from($tabela);
		// $this->db->order_by("id", "DESC");
		if($tabela=='projetos'){
			$this->db->order_by('order', 'ASC');
		}
		if($id){
			$this->db->where("id", $id);
		}
		else{
			$this->db->order_by("id", "DESC");
		}

		// if ($id) $this->db->where("id", $id);

		$query = $this->db->get();
		return $query->result();
	}

	//getJoin("tabela from", "tabela join", "campo para join entre as duas tabelas", "clausula where - caso tiver", "dados que deve trazer");
	public function getJoin($tabela1, $tabela2, $campoJoin, $campoFiltro, $camposRetorno) {
		$this->db->select($camposRetorno);
		$this->db->from($tabela1);
		if ($tabela2) $this->db->join($tabela2, $tabela2.".id = ".$tabela1.".".$campoJoin);
		if ($campoFiltro) $this->db->where($campoFiltro);
		$this->db->order_by($camposRetorno, "ASC");
		// if ($tabela1=='produtos_imagens') $this->db->order_by('order_image', "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	// produtos_filtros","filtros","filtro_id", "produtos_filtros.produto_id =".$id,"produtos_filtros.id, filtros.nome, filtros.id filtro_id

	public function getFilter($id=null){

		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('produtos_filtros.id produtos_filtros_id, filtros.nome, filtros.id filtro_id, ordenacao_filtros.id order_id,ordenacao_filtros.id_produto id_produto');
		$this->db->from('filtros');
		$this->db->join('produtos_filtros', 'filtros.id = produtos_filtros.filtro_id');
		$this->db->join('ordenacao_filtros', 'produtos_filtros.produto_id = ordenacao_filtros.id_produto');
		$this->db->where("produtos_filtros.produto_id",$id);
		$this->db->order_by("ordenacao_filtros.id", "ASC");
		$this->db->group_by('filtro_id');
		
		// $this->db->where("ordenacao_filtros.id_produto",$id);
		// $this->db->group_by('filtro_id');
		// $this->db->order_by("ordenacao_filtros.id", "ASC");
		
		// $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		// $this->db->select('produtos_filtros.id, filtros.nome, filtros.id filtro_id, ordenacao_filtros.id order_id,ordenacao_filtros.id_produto id_produto');
		// $this->db->from('produtos_filtros');
		// $this->db->join('filtros', 'filtros.id = produtos_filtros.filtro_id');
		// $this->db->join('ordenacao_filtros', 'ordenacao_filtros.filtro_id = filtros.id');
		// $this->db->where("ordenacao_filtros.id_produto",$id);
		// $this->db->group_by('filtro_id');
		// $this->db->order_by("ordenacao_filtros.id", "ASC");

		$query = $this->db->get();
		return $query->result();


	}

	public function getAdminImages($tabela,$id){
		$this->db->select('produtos_imagens.id, produtos_imagens.imagem, produtos_imagens.order_image');
		$this->db->from($tabela);
		$this->db->where("produto_id",$id);
		$this->db->order_by('produtos_imagens.order_image', "ASC");
		$query = $this->db->get();
		return $query->result();
	}

	//AdminModel->atualizar() - é chamado para INSER E UPDATE
	//Se possuir ID, é UPDATE, se não é INSERT
	public function atualizar($tabela,$fields,$id=null){
		if ($id):
			$this->db->where("id",$id);
			$query = $this->db->update($tabela, $fields);
			if ($query) $query=$id;
			return($query);
		else :
			$query = $this->db->insert($tabela, $fields);
			return($this->db->insert_id());
		endif;
	}

	public function deletar($table,$id){
		$this->db->where("id",$id);
		$query = $this->db->delete($table);
		return($query);
	}

	public function addOrder($tabela,$fields,$id=null){
		$query = $this->db->insert($tabela, $fields);
		return($query);
		// echo $id;
		// echo '<pre>';
		// print_r($fields);
		// exit();
	}

	public function deleteOrder($order){
		$this->db->where("id",$order);
		$query = $this->db->delete('ordenacao_filtros');
		return($query);
		// echo $id;
		// echo '<pre>';
		// print_r($fields);
		// exit();
	}

	// public function getlinhasFiltro($id=null){
		
	// 	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
	// 	$this->db->select('produtos.id id_produto, produtos.referencia,produtos.nome produto_nome, produtos.nome_en produto_nome_en, produtos.nome_it produto_nome_it,linhas.id linha_id,linhas.nome linha_nome, linhas.nome_en linha_nome_en,linhas.nome_it linha_nome_it,linhas.slug slug, linhas.slug_en slug_en, linhas.slug_it slug_it, filtros.nome filtro_nome, filtros.id filtro_id,ordenacao_filtros.order, ordenacao_filtros.id ordenacao');
	// 	$this->db->from("produtos");
	// 	$this->db->join('linhas','linhas.id = produtos.linha_id');
	// 	$this->db->join('produtos_filtros','produtos_filtros.produto_id = produtos.id');
	// 	$this->db->join('filtros','produtos_filtros.filtro_id = filtros.id');
	// 	$this->db->join('ordenacao_filtros','ordenacao_filtros.id_produto = produtos.id');
	// 	$this->db->order_by('order');
	// 	$this->db->group_by('produtos.referencia');
	// 	$this->db->where('filtros.id',$id);

	// 	$query = $this->db->get();
	// 	// echo $id;
	// 	// echo '<pre>';
	// 	// print_r($query->result());
	// 	// exit();
		
	// 	return $query->result();

	// }


	// Traz os produtos produtos para ordenação dentro de filtros
	public function getlinhasFiltro($id=null){
		
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('produtos.id id_produto, produtos.referencia,produtos.nome produto_nome, linhas.id linha_id,linhas.nome linha_nome, ordenacao_filtros.order, ordenacao_filtros.id ordenacao_id, ordenacao_filtros.filtro_id, ordenacao_filtros.id');
		$this->db->from("ordenacao_filtros");
		$this->db->join('produtos','ordenacao_filtros.id_produto = produtos.id');
		$this->db->join('linhas','linhas.id = produtos.linha_id');
		
		$this->db->where('ordenacao_filtros.filtro_id',$id);
		$this->db->order_by('order');

		$query = $this->db->get();
		// echo '<pre>';
		// print_r($query->result());
		// exit();
		
		return $query->result();

	}

	public function getlinhasOrder($id=null){
		
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('produtos.nome produto_nome, produtos.id id_produto, produtos.referencia, linhas.id linha_id, linhas.nome linha_nome, ordenacao_linhas.order, ordenacao_linhas.id');
		$this->db->from("produtos");
		$this->db->join('linhas','linhas.id = produtos.linha_id');
		// $this->db->join('produtos_filtros','produtos_filtros.produto_id = produtos.id');
		// $this->db->join('filtros','produtos_filtros.filtro_id = filtros.id');
		$this->db->join('ordenacao_linhas','ordenacao_linhas.id_produto = produtos.id');
		$this->db->order_by('order');
		$this->db->group_by('produtos.referencia');
		$this->db->where('linhas.id',$id);

		$query = $this->db->get();

		// echo '<pre>';
		// print_r($query->result());
		// exit();
		
		return $query->result();

	}

	public function getImagens($id=null){
		// echo $id;
		$this->db->select("*");
		$this->db->from("produtos_imagens");
		// $this->db->order_by("nome", "asc");
		// if($id!=null){
		// 	$this->db->join('produtos_imagens', 'produtos_imagens.produto_id = '.$id);
		// 	$this->db->where('produtos.id',$id);
		// }
		$this->db->where('produtos_imagens.produto_id',$id);

		$query = $this->db->get();

		// echo '<pre>';
		// print_r($query->result());


		return $query->result();

	}

	public function adicionar($table,$fields){

		$this->db->insert($table, $fields);

		return $this->db->insert_id();

	}

	public function inserir($dados) {

		foreach ($dados as $key => $value) {
			$this->db->insert('produtos_imagens', $value);
		}
		
	}

	// Insere a ordenação de Filtros
    public function inserirOrdem($data){

    	$query = $this->db->query("update ordenacao_filtros of SET of.order = '".$data["order"]."' WHERE of.filtro_id = '".$data['filtro_id']."' AND of.id = '".$data['id']."' ");

        return($query);
    }

    // Insere a ordenação de Linhas
    public function inserirOrdemLinhas($data){
       
    	$this->db->set('order', $data["order"]);
		$this->db->where('id', $data['id']);
		// $this->db->where('linha_id', $data['linha_id']);
		$query = $this->db->update('ordenacao_linhas');
      	// $query = $this->db->query("update ordenacao SET order = '".$data["order"]."' WHERE id = '".$data['id']."'");
        //$query = $this->db->query("update linhas_filtros lf INNER JOIN produtos p ON lf.produto_id = p.id SET lf.order = '".$data["order"]."' WHERE lf.filtro_id = '".$data['filtro_id']."' AND p.linha_id = '".$data['linha_id']."' ");
        return($query);
    }


	public function countResult($table){
		return $this->db->count_all_results($table);
	}



}