<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cache extends MY_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		
	}

	public function index(){
		// $this->cache->delete($this->uri->uri_string());
		// $this->output->delete_cache('/pt/cache');
		$this->output->delete_cache();
		$this->output->cache(300);
		// print_r($this->uri->uri_string());
		// $this->output->delete_cache('/pt/cache');
		//$this->output->delete_cache();
		// $teste = 'Caching Driver Teste 3';
		// $this->cache->save('teste', $teste, 300);
		// $page = $this->cache->get('teste');
		// $this->cache->delete('teste');
		// print_r($page);
		$this->load->view('cache');


	}

}

