<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Linhas extends MY_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('AmbientesModel');
		$this->load->model('ProjetosModel');

	}

	public function index($sub_category=null){

		$this->output->cache(60);
		
		$data['lang'] = $this->uri->segment(1);
		$categoria = $this->uri->segment(2);
		$data['sub_category'] =  $this->uri->segment(3);
		$data['categoria'] = $categoria;
		$data['translations'] = $this->PageModel->getPageContent('all');
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();

		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();

		$data['linhas'] = $this->LinhasModel->getLinha($data['sub_category'],$data['lang']);

		// $data['imagem'] = $this->LinhasModel->getImageById(309);
		// echo '<pre>';
		// print_r($data['imagem']);
		// exit();
		
		foreach ($data['linhas'] as $key => $value) {
			
			$data['linhas'][$key]->produto_imagem = $this->LinhasModel->getImageById($value->produto_id)[0]->imagem;

			if(is_numeric(substr($value->produto_ref,-1))){
				
				$data['linhas'][$key]->acabamentos = $this->AcabamentosModel->getAcabamentosProd(preg_replace("/\D/","",substr($value->produto_ref, 0, -1)));
			
			}
			else{
			
				$data['linhas'][$key]->acabamentos = $this->AcabamentosModel->getAcabamentosProd(preg_replace("/\D/","",$value->produto_ref));
			
			}
			
		}

		// echo '<pre>';
		// print_r($data['linhas']);
		// exit();

		$data['page_name'] = 'categoria';
		$data['page_seo'] = $data['linhas'][0]->nome;
		$this->load->view('headerView',$data);
		$this->load->view('linhasView');
		$this->load->view('footerView');
	}

}