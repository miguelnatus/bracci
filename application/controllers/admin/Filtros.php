<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/MY_Login.php");
 
    class Filtros extends MY_Login{ 
        
        function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model("AdminModel");
        }

        //TRAZ TODOS OS FILTROS CADASTRADOS
        public function index(){
            $data['page'] = "filtros";
            $data['acao'] = "busca";
            $data['usuario'] = $this->session->userdata('usuario');
    
            $data['filtros'] = $this->AdminModel->get("filtros");
            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/filtrosView');
            $this->load->view('admin/footerView');
        }

        //CHAMA A VIEW COMO EDICAO PARA INSERT, UPDATE OU DELETE
        //SE TIVER ID, FAZ UPDATE.
        public function editar($id=null){
            $data['page'] = "filtros";
            $data['acao'] = "cadastro";
            $data['usuario'] = $this->session->userdata('usuario');

            if ($id){
                $data['filtros'] = $this->AdminModel->get("filtros",$id);
            }
    
            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/filtrosView');
            $this->load->view('admin/footerView');
        }

        public function ordenarFiltros($id=null){
            $data['page'] = "filtros";
            $data['acao'] = "ordenar-filtros";
            $data['usuario'] = $this->session->userdata('usuario');
            $data['filtros'] = $this->AdminModel->get("filtros",$id);
            // echo '<pre>';
            // print_r($data['filtros']);
            // exit();
    
            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/filtrosView');
            $this->load->view('admin/footerView');
        }

        public function ordenarLinhas($id=null){

            $data['page'] = "filtros";
            $data['acao'] = "ordenar-linhas";
            $data['usuario'] = $this->session->userdata('usuario');
            $data['id'] = $id;
            $data['linhas_filtros'] = $this->AdminModel->get("linhas");
            $data['produtos'] = $this->AdminModel->getlinhasFiltro($id);

            //  echo '<pre>';
            // print_r($data['produtos']);
            // exit();
            
            // foreach ($data['produtos'] as $key => $value) {
               
            //     $fields[] = array(
            //         'id_produto' => $value->id_produto,
            //         'filtro_id' => $id,
            //         'order' => $key
            //     );
            //     $this->AdminModel->adicionar('ordenacao_filtros',$fields[$key]);

            // }
            // $this->AdminModel->atualizar($fields);

            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/filtrosView');
            $this->load->view('admin/footerView');
        }

    }