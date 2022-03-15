<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function index(){

		// delete_cache();

		$this->load->helper('dir');
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('ProjetosModel');
		$this->load->model('BannersModel');
		$this->load->model('AmbientesModel');
		

		$this->output->cache(60);


		$data['lang'] = $this->uri->segment(1);

		$data['category'] = 'acabamentos';

		$data['translations'] = $this->PageModel->getPageContent();

		// $data['content'] = $this->PageModel->getPageContent('home');
		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();
		$data['linha'] = $this->LinhasModel->getLinhas();
		$data['banners'] = $this->BannersModel->getBanners();
		$data['projetos'] = $this->ProjetosModel->getProjetos();

		$data['banheiro'] = $this->AmbientesModel->getAmbiente(1)[0];
		$data['cozinha'] = $this->AmbientesModel->getAmbiente(2)[0];
		// echo '<pre>';
		// print_r($data['banheiro']);
		// exit();

		$data['page_name'] = '';
		$data['page_seo'] = '';

		$this->load->view('headerView',$data);
		$this->load->view('homeView');
		$this->load->view('footerView');

		
	}


}
