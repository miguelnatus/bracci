<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OndeComprar extends MY_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('ProjetosModel');

	}

	public function index(){

		$data['lang'] = $this->uri->segment(1);

		$data['translations'] = $this->PageModel->getPageContent('all');
		// $data['content'] = $this->PageModel->getPageContent('qualidade');
		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();
	

		$data['page_name'] = 'onde-comprar';
		$data['page_seo'] = 'Onde Comprar';
		$this->load->view('headerView',$data);
		$this->load->view('ondecomprarView');
		$this->load->view('footerView');
		
	}


}