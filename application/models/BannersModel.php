<?php 

class BannersModel extends CI_Model{

	private $content;

	public function __construct(){
		parent::__construct();
	}

	public function getBanners(){
		
		$this->db->order_by("id", "DESC");
		$banners = $this->db->get("banners");
	
		return $banners->result();

	}


}