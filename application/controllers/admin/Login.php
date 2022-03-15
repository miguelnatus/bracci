<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller{ 
    
    function __construct() {
        parent::__construct();     
    }

    public function index(){

        $data['page'] = "admin";
        $this->load->view('admin/headerView');
        $this->load->view('admin/loginView');
    
    }

    public function autenticar(){
        $this->load->model("UserModel");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='erroForm bordaArredondada'>","</p>");
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        $email = $this->input->post("email");
        $senha = $this->input->post("senha"); 
        $usuario = $this->UserModel->login($email,$senha); 
        //  if($usuario){
        //     print_r($usuario);
        //     exit();
        // }
        if($usuario){
            // print_r($usuario);
            // echo '<script>alert(1);</script>';
            $this->session->set_userdata("usuario", $usuario);
            $dados = array("mensagem" => "Logado com sucesso!");

            
            // echo $dados['mensagem'];
            redirect(base_url('admin/painel'));
            // redirect("admin/painel", "location");          
        }
        else{
            $dados = array("mensagem" => "Não foi possível fazer o Login!");
            // echo $dados;
            //$this->load->view("admin/autenticar", $dados);
            redirect(base_url('admin/login'));
        }   
    }

    public function sair() {

        $this->session->unset_userdata('usuario');
      
        redirect(base_url('admin/login'));
    }

   
}

