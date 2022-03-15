<?php 

class CategoriasModel extends CI_Model{

	public $content;

	public function __construct(){
		parent::__construct();
	}

	public function getFileNames($path){
		$this->content = get_filenames(APPPATH.'data/'.$path);		
		return $this->content;		
	}

	public function getJsonContent($path,$file){
		//echo $file;
		$page = file_get_contents(base_url()."public/data/".$path.'/'.$file);
		

		$this->content = json_decode($page);
		print_r($this->content);
		return $this->content;
	}

	public function getYml($path,$file){
		$page = file_get_contents(base_url()."public/data/".$path.'/'.$file);
		// $page = yaml_parse_file(base_url()."public/data/".$path.'/'.$file);
		// $this->content = yaml_parse($page);
		// print_r($page);
		return $page;
	}

	public function getAcabamentos($sub_categoria){

		echo $sub_categoria;

	}



}