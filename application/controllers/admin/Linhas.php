<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Linhas extends CI_Controller{ 
        
        function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model("AdminModel");
        }

        //TRAZ TODOS OS FILTROS CADASTRADOS
        public function index(){
            $data['page'] = "linhas";
            $data['acao'] = "busca";
            $data['usuario'] = $this->session->userdata('usuario');
    
            $data['linhas'] = $this->AdminModel->get("linhas");

            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/linhasView');
            $this->load->view('admin/footerView');
        }

        //CHAMA A VIEW COMO EDICAO PARA INSERT, UPDATE OU DELETE
        //SE TIVER ID, FAZ UPDATE.
        public function editar($id=null){
            $data['page'] = "linhas";
            $data['acao'] = "cadastro";
            $data['usuario'] = $this->session->userdata('usuario');
            $data['produtos'] = $this->AdminModel->get("produtos");


            foreach ($data['produtos'] as $key => $value) {
                
                if($value->linha_id==$id){
                   //print_r($value);
                   $data['produtos_linha'][] = $value; 
               }                    
            }

            if ($id){
                $data['linhas'] = $this->AdminModel->get("linhas",$id);
            }

            // echo '<pre>';
            // print_r($data['produtos_linha']);
    
            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/linhasView');
            $this->load->view('admin/footerView');
        }

        public function ordenarLinhas($id=null){
            $data['page'] = "linhas";
            $data['acao'] = "ordenar-linhas";
            $this->load->model('LinhasModel');
            $data['usuario'] = $this->session->userdata('usuario');
            $data['produtos'] = $this->AdminModel->get("produtos");
            $data['linha'] = $this->LinhasModel->getLinhas();


                                         
            // echo '<pre>';
            // print_r($data['produtos']);
            // exit();

            $data['linhas'] = $this->AdminModel->get('linhas');

    
            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/linhasView');
            $this->load->view('admin/footerView');
        }

        public function ordenarProdutos($id=null){
            $data['page'] = "linhas";
            $data['acao'] = "ordenar-produtos";
            $this->load->model('LinhasModel');
            $data['usuario'] = $this->session->userdata('usuario');
            // $data['produtos'] = $this->AdminModel->get("produtos");

            $data['produtos'] = $this->AdminModel->getlinhasOrder($id);

            $data['linhas'] = $this->AdminModel->get('linhas',$id);

            // foreach ($data['produtos'] as $key => $value) {
               
            //     $fields[] = array(
            //         'id_produto' => $value->id_produto,
            //         'linha_id' => $value->linha_id,
            //         'order' => $key
            //     );
            //     $this->AdminModel->adicionar('ordenacao_linhas',$fields[$key]);

            // }

            // echo "<pre>";
            // print_r($data['produtos']);
            // exit();

            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/linhasView');
            $this->load->view('admin/footerView');
        }

    }