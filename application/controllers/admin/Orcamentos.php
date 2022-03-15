<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Orcamentos extends CI_Controller{ 
        
        function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model("AdminModel");
        }

        //TRAZ TODOS OS FILTROS CADASTRADOS
        public function index(){
            $data['page'] = "orcamentos";
            $data['acao'] = "busca";
            $data['usuario'] = $this->session->userdata('usuario');
    
            $data['orcamento'] = $this->AdminModel->get("orcamento");

            // echo '<pre>';
            // print($data['orcamento'][1]->produto);
            // exit();

            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/orcamentosView');
            $this->load->view('admin/footerView');
        }

    }