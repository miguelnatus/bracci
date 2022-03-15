<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('SearchModel');
		// $this->load->model('PageModel');
		// $this->load->model('AcabamentosModel');
		// $this->load->model('LinhasModel');
		// $this->load->model('CategoriasModel');
		// $this->load->model('ProjetosModel');
		// $this->load->model('LanguageModel');
		// $this->load->model('ProdutosModel');

	}

	public function index(){
		$lang = $this->uri->segment(1);
		$query = $this->input->get('query');
		$data['result'] = $this->SearchModel->getSearch($query);
		$data['result'] = json_decode(json_encode($data['result']));
		// var_dump($data['result']);
		// echo $data['result']->num_rows();
		// echo '<pre>';
		
			// $this->load->view('produtoView',$data);
			
		// var_dump($data['result']);
		if($data['result']!=NULL){
			foreach ($data['result'] as $key => $value) {
			// echo '<pre>';
			// print_r($value);
			// get_link($lang,$value->referencia,$value->{lang($lang,'nome')})
				echo '<div class="column is-half-mobile is-one-third-tablet is-one-third-desktop">
					   <div itemscope="" itemprop="itemListElement" itemtype="http://schema.org/Product" class="box">
					      <a href="'.get_link($lang,$value->referencia,$value->{lang($lang,'nome')}).'">
					         <figure class="image box__product-image">
					            <img src="'.url_test($value->imagem).'" alt="'.$value->nome.'" itemprop="image">
					         </figure>
					         <h3 class="title is-6" itemprop="name">
					            '.$value->nome.'
					         </h3>
					         <h4 class="subtitle is-6" itemprop="sku">
					            '.$value->referencia.'
					         </h4>
					         <button class="button is-fullwidth is-primary">Ver mais</button>
					      </a>
					   </div>
					</div>';
			}
		}
		
	
		// if(!empty($result)){
		// 	$this->load->view('produtoView',$data);
		// 	echo 'Encontrado';

		// }
		// else{
		// 	echo 'Nenhum resultado encontrado';
		// 	echo json_encode($data['result']);

		// }
		// echo '<pre>';
		// print_r($result);
		
	}

}