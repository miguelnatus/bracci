<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acessorios extends MY_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('ProjetosModel');

	}

	public function index(){

		$this->output->cache(60);

		$data['lang'] = $this->uri->segment(1);

		$data['sub_category'] =  $this->uri->segment(2);


		$data['translations'] = $this->PageModel->getPageContent('all');
			
		$data['produtos'] = $this->AcabamentosModel->getAcabamentos($data['sub_category'],$data['lang']);

		$data['linhaMenu'] = $this->LinhasModel->getLinhas();
		
		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();

		// echo '<pre>';
		// print_r($data['produtos']);
		// exit();

		foreach($data['produtos'] as $key => $value) {
			$refs[] = $value->referencia;
		}
		
		foreach ($data['produtos'] as $key => $value) {
			
			if(is_numeric(substr($value->referencia,-1))){
				
				$data['produtos'][$key]->acabamentos = $this->AcabamentosModel->getAcabamentosProd(preg_replace("/\D/","",substr($value->referencia, 0, -1)));
			
			}
			else{
			
				$data['produtos'][$key]->acabamentos = $this->AcabamentosModel->getAcabamentosProd(preg_replace("/\D/","",$value->referencia));
			
			}
			
		}

		// echo '<pre>';
		// print_r($data['produtos'][0]->filtro_nome);
		// exit();

		

		$data['page_name'] = 'categoria';
		$data['page_seo'] = $data['produtos'][0]->filtro_nome;
		$this->load->view('headerView',$data);
		$this->load->view('categoriaView');
		$this->load->view('footerView');
	}


}
