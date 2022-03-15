<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambientes extends MY_Controller {

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

		// Busca os produtos do ambiente escolhido
		$data['produtos'] = $this->AmbientesModel->getAmbientes($data['sub_category'],$data['lang']);
		
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();

		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();

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
		

		// busca na model os acabamentos dos produtos pelo array de IDS
		// $data['acabamentos'] =  $this->AmbientesModel->getAcabamentoProduct($id_produtos);

		$data['page_name'] = 'categoria';
		$data['page_seo'] = $data['produtos'][0]->filtro_nome;
		$this->load->view('headerView',$data);
		$this->load->view('ambientesView');
		$this->load->view('footerView');
	}

}