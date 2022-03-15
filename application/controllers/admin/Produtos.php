<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    require_once("application/core/MY_Login.php");
    class Produtos extends MY_Login{ 
        
        function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model("AdminModel");
        }

        //TRAZ TODOS OS PROJETOS CADASTRADOS
        public function index(){
            $data['page'] = "produtos";
            $data['acao'] = "busca";
            $data['usuario'] = $this->session->userdata('usuario');
            $data['linhas'] = $this->AdminModel->get("linhas");
            $data['filtros'] = $this->AdminModel->get("filtros");
            $data['diferenciais'] = $this->AdminModel->get("diferenciais");
            $data['produtos'] = $this->AdminModel->get("produtos");
    
            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/produtosView');
            $this->load->view('admin/footerView');
        }

        //CHAMA A VIEW COMO EDICAO PARA INSERT, UPDATE OU DELETE
        //SE TIVER ID, FAZ UPDATE.
        public function editar($id=null){
            // echo $id;
            $data['page'] = "produto";
            $data['acao'] = "cadastro";
            $data['usuario'] = $this->session->userdata('usuario');
            $data['linhas'] = $this->AdminModel->get("linhas");
            $data['filtros'] = $this->AdminModel->get("filtros");
            $data['diferenciais'] = $this->AdminModel->get("diferenciais");
            $data['produtos_r'] = $this->AdminModel->get("produtos");

            //getJoin("tabela from", "tabela join", "campo para join entre as duas tabelas", "clausula where - caso tiver", "dados que deve trazer");
            // $data['produtos_filtros'] = $this->AdminModel->getJoin("produtos_filtros","filtros","filtro_id", "produtos_filtros.produto_id =".$id,"produtos_filtros.id, filtros.nome, filtros.id filtro_id");
            $data['produtos_filtros'] = $this->AdminModel->getFilter($id);
            // echo '<pre>';
            // print_r($data['produtos_filtros']);
            // exit();

            $data['produtos_diferenciais'] = $this->AdminModel->getJoin("produtos_diferenciais","diferenciais","diferencial_id", "produtos_diferenciais.produto_id =".$id,"produtos_diferenciais.id, diferenciais.nome");
            // $data['produtos_imagens'] = $this->AdminModel->getJoin("produtos_imagens",null,null, "produtos_imagens.produto_id =".$id,"produtos_imagens.id, produtos_imagens.imagem");
            // $data['produtos_imagens'] = $this->AdminModel->get("produtos_imagens",null,null, "produtos_imagens.produto_id =".$id, "produtos_imagens.id, produtos_imagens.imagem, produtos_imagens.order_image");
            $data['produtos_imagens'] = $this->AdminModel->getAdminImages("produtos_imagens",$id);
            // echo '<pre>';
            // print_r($data['produtos_imagens']);
            // exit();
            $data['produtos_relacionados'] = $this->AdminModel->getJoin("produtos_relacionados","produtos","produto_relacionado_id", "produtos_relacionados.produto_id =".$id,"produtos_relacionados.id, produtos.nome, produtos.referencia");
            
            // echo '<pre>';
            // print_r($data['produtos_r']);
            // exit();

            if ($id){
            
                $data['produtos'] = $this->AdminModel->get("produtos",$id);
                // print_r($data['produtos']);
                //$data['imagens'] = $this->AdminModel->getImagens($id);
            }



            // echo '<pre>';
            // print_r($data['produtos']);
            // exit();

            $this->load->view('admin/headerView',$data);
            $this->load->view('admin/menuView');
            $this->load->view('admin/produtosView');
            $this->load->view('admin/footerView');
        }

        public function atualizar($id=null){
            $fields = $this->input->post();
            // echo $id;
            // echo "<pre>";
            // print_r($fields);
           
            $this->load->model("AdminModel");
            $data['usuario'] = $this->session->userdata('usuario');
            //Filtros, diferenciais e relacionados
            if(isset($fields['order_image'])){
                $order_image = $fields['order_image']; unset($fields['order_image']);
            }
            
            $filtros = $fields['filtros']; unset($fields['filtros']);
            $diferenciais = $fields['diferenciais']; unset($fields['diferenciais']);
            $relacionados = $fields['relacionados']; unset($fields['relacionados']);
            
            $resultado = $this->AdminModel->atualizar("produtos", $fields, $id);


            if($filtros[0]){
                foreach ($filtros as $key => $value) {
                    $this->AdminModel->addOrder('ordenacao_filtros',array('id_produto'=>$resultado, 'order'=>null, 'filtro_id' => $value));
                }
            }


            if($id==null){

                if($fields['linha_id']){
                    $this->AdminModel->adicionar('ordenacao_linhas',array('id_produto'=>$resultado, 'order'=>null, 'linha_id' => $fields['linha_id']));   
                }
                
            }

            
            if($_FILES):
                $images = upload_image($_FILES);
                foreach ($images as $key => $value):
                    $this->AdminModel->atualizar("produtos_imagens", array("imagem"=>$value, "produto_id"=>$resultado, "order_image" => $key));
                endforeach;
            endif;

            // Ordenação imagens

            if (isset($order_image)):
                foreach ($order_image as $key => $value):
                   $this->AdminModel->atualizar("produtos_imagens", array("order_image"=>$key), $value);
                endforeach;
            endif;
            // echo '<pre>';
            // print_r($filtros);
            // exit();
             //Cadastro de Filtros
            if ($filtros[0]):
                foreach ($filtros as $value):
                    $this->AdminModel->atualizar("produtos_filtros", array("filtro_id"=>$value, "produto_id"=>$resultado));
                    // $this->AdminModel->atualizar("ordenacao_filtros", array('id_produto'=>$resultado, 'order'=>null, 'filtro_id' => $value));

                endforeach;
            endif;

             //Cadastro de Diferenciais
            if ($diferenciais[0]):
                foreach ($diferenciais as $value):
                    $this->AdminModel->atualizar("produtos_diferenciais", array("diferencial_id"=>$value, "produto_id"=>$resultado));
                endforeach;
            endif;

             //Cadastro de Relacionados
            if ($relacionados[0]):
                foreach ($relacionados as $value):
                    $this->AdminModel->atualizar("produtos_relacionados", array("produto_relacionado_id"=>$value, "produto_id"=>$resultado));
                endforeach;
            endif;


            
            if ($resultado): 
                $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Editado com sucesso!</p>');
            else:
                $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
            endif;

            // deleta o cache de todas as páginas
            delete_cache();

            $this->index();
        }
    }
