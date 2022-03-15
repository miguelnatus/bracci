<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends MY_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('CategoriasModel');


	}

	public function index(){
		$this->load->library('yaml');

		$data['file'] = $this->CategoriasModel->getFileNames('produtos');
		echo '<pre>';
		// print_r($data['file']);
		// exit();

		foreach ($data['file'] as $key => $value) {
			// print_r($value);
			$content[] = $this->yaml->load($this->CategoriasModel->getYml('produtos',$value));
			// json_encode($this->CategoriasModel->getJsonContent('produtos',$value));
			// print(json_encode($this->CategoriasModel->getJsonContent('produtos',$value)));
		}

		// $content = $this->yaml->load($data['produtos'][0]);
		// $data['produtos'] = json_encode($data['produtos'], JSON_PRETTY_PRINT);
		// $data['produtos'] = json_encode($data['produtos'][0]);
		// print_r($data['produtos']);
		echo '<pre>';
		print_r($content);

		// var_dump($data['produtos']);
		
		// $data['produtos'] = json_encode($data['produtos'], JSON_PRETTY_PRINT);




	}


}
