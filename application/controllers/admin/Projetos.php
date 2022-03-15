<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/MY_Login.php");
 
class Projetos extends MY_Login{ 
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("AdminModel");
    }

    //TRAZ TODOS OS PROJETOS CADASTRADOS
    public function index(){
        $data['page'] = "projetos";
        $data['acao'] = "busca";
        $data['usuario'] = $this->session->userdata('usuario');

        $data['projetos'] = $this->AdminModel->get("projetos"); 
        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/projetosView');
        $this->load->view('admin/footerView');
    }

    //CHAMA A VIEW COMO EDICAO PARA INSERT, UPDATE OU DELETE
    //SE TIVER ID, FAZ UPDATE.
    public function editar($id=null){
        $data['page'] = "projetos";
        $data['acao'] = "cadastro";
        $data['usuario'] = $this->session->userdata('usuario');

        if ($id){
            $data['projetos'] = $this->AdminModel->get("projetos",$id);
        }

        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/projetosView');
        $this->load->view('admin/footerView');
    }
}