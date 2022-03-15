<?php 

class PageModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getPages($path,$name){
		//var_dump($path);

		if($path==NULL){
			$page = file_get_contents(base_url()."public/data/".$name.".json");
		}

		else{
			$page = file_get_contents(base_url()."public/data/".$path.'/'.$name.".json");
		}
		
		$this->content = json_decode($page);

		return $this->content;
	}

	public function getPageContent($page=null){
		if($page!=null){
			$this->db->where('pagina', $page);
		}
		
		$page = $this->db->get("conteudos");

		foreach ($page->result() as $key => $value) {
			
			$content[$value->nome_campo] = $value->conteudo;
			
		}

		$content = (object) $content;
		// echo '<pre>';
		// print_r($content);
		return $content;
		
	}

}