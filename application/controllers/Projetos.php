<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends MY_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('ProjetosModel');
		// $this->load->model('LanguageModel');

	}

	public function index(){

		$this->output->cache(60);

		$data['lang'] = $this->uri->segment(1);
		// $data['translation'] = $this->LanguageModel->getLangContent();

		$data['translations'] = $this->PageModel->getPageContent('all');
		
		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();
		$data['linha'] = $this->LinhasModel->getLinhas();
		$data['projetos'] = $this->ProjetosModel->getProjetos();
	

		$data['page_name'] = 'projetos';
		$data['page_seo'] = 'Projetos com Bracci';
		$this->load->view('headerView',$data);
		$this->load->view('projetosView');
		$this->load->view('footerView');
		
	}


}