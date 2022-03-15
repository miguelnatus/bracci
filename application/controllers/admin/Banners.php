<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/MY_Login.php");
 
class Banners extends MY_Login{ 
    
    function __construct() {
        parent::__construct();
       
        // $this->load->helper(array('form', 'url', 'upload_image'));
        $this->load->model("AdminModel");
    }

    //TRAZ TODOS OS ITENS CADASTRADOS
    public function index(){
        $data['page'] = "banners";
        $data['acao'] = "busca";
        $data['usuario'] = $this->session->userdata('usuario');

        $data['banners'] = $this->AdminModel->get("banners");
        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/bannersView');
        $this->load->view('admin/footerView');
    }

    public function editar($id=null){
        $data['page'] = "banners";
        $data['acao'] = "cadastro";
        $data['usuario'] = $this->session->userdata('usuario');

        if ($id){
            $data['banners'] = $this->AdminModel->get("banners",$id);
        }

        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/bannersView');
        $this->load->view('admin/footerView');
    }


}