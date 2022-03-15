<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends MY_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('ProjetosModel');
		$this->load->model('ProdutosModel');

	}

	public function index(){

		$this->output->cache(60);
		
		$this->load->library('markdown');
		$data['lang'] = $this->uri->segment(1);
		$produto = $this->uri->segment(2);
		$ref = strtok(strtoupper($produto), '-');
		
		if(is_numeric(substr($ref,-1))){
			$acabamentos = preg_replace("/\D/","",substr($ref, 0, -1));
		}
		else{
			$acabamentos = preg_replace("/\D/","", $ref);
		}

		$data['translations'] = $this->PageModel->getPageContent('all');
		$data['projetos'] = $this->ProjetosModel->getProjetos();
		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();
		$data['produto'] = $this->ProdutosModel->getProduto($ref);
		$data['imagens'] = $this->ProdutosModel->getImagem($data['produto']->id);
		$data['diferenciais'] = $this->ProdutosModel->getDiferenciais($data['produto']->id);
		$data['relacionados'] = $this->ProdutosModel->getRelacionados($data['produto']->id);
		$data['acabamentos'] = $this->ProdutosModel->getAcabamentos($acabamentos);

		// echo '<pre>';
		// print_r($data['produto']);
		// exit();
		// // echo substr($ref,-1);
		// exit();
		if(is_numeric(substr($ref,-1))){
			// echo '1';
			foreach ($data['acabamentos'] as $key => $value) {
				if(is_numeric(substr($value->referencia,-1))){
					$data['acab'][] = $value;
					
				}
			}
		}
		else{
			foreach ($data['acabamentos'] as $key => $value) {
				if(!is_numeric(substr($value->referencia,-1))){
					$data['acab'][] = $value;
					
				}
			}
		}

		
		$data['descricao'] = $this->markdown->parse($data['produto']->descricao);
		$data['descricao'] = str_replace(' * ', '<li>', $data['descricao']);

		$data['page_name'] = 'produto';
		$data['page_seo'] = $data['produto']->nome;

		$this->load->view('headerView',$data);
		$this->load->view('produtoView');
		$this->load->view('footerView');
		
	}
	
}		