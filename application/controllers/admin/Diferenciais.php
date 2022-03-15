<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/MY_Login.php");
 
class Diferenciais extends MY_Login{ 
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("AdminModel");
    }

    //TRAZ TODOS OS ITENS CADASTRADOS
    public function index(){
        $data['page'] = "diferenciais";
        $data['acao'] = "busca";
        $data['usuario'] = $this->session->userdata('usuario');

        $data['diferenciais'] = $this->AdminModel->get("diferenciais");
        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/diferenciaisView');
        $this->load->view('admin/footerView');
    }

    //CHAMA A VIEW COMO EDICAO PARA INSERT, UPDATE OU DELETE
    //SE TIVER ID, FAZ UPDATE.
    public function editar($id=null){
        $data['page'] = "diferenciais";
        $data['acao'] = "cadastro";
        $data['usuario'] = $this->session->userdata('usuario');

        if ($id){
            $data['diferenciais'] = $this->AdminModel->get("diferenciais",$id);
        }

        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/diferenciaisView');
        $this->load->view('admin/footerView');
    }
}