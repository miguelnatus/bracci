<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/MY_Login.php");
 
class Painel extends MY_Login{ 
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));       
    }

    public function index(){


        $this->load->library('session');
        $data['page'] = "admin";
        $data['usuario'] = $this->session->userdata('usuario');
        $usuario = $this->session->userdata();
        $this->load->model("AdminModel");
        // echo '<pre>';
        // print_r($usuario['usuario']['id']);
        // exit();
        $data['count_product'] = $this->AdminModel->countResult('produtos');
        $data['count_linhas'] = $this->AdminModel->countResult('linhas');
        $this->load->view('admin/headerView',$data);
        $this->load->view('admin/menuView');
        $this->load->view('admin/painelView');
        $this->load->view('admin/footerView');
    
    }
    //FUNÇAO PADRAO PARA UPDATE E INSERT EM TABELAS
    public function atualizar($tabela, $id=null){
        $this->load->library('session');
        $fields = $this->input->post();

        // echo '<pre>';
        // print_r($_FILES);
        // exit();


        //SE TABELA POSSUI SLUG, GERA AUTOMATICAMENTE PARA A BASE
        if(isset($fields['nome'])){
            if (isset($fields['slug'])) $fields['slug'] = slugify($fields['nome']);
            if (isset($fields['slug_en'])) $fields['slug_en'] = slugify($fields['nome_en']);
            if (isset($fields['slug_it'])) $fields['slug_it'] = slugify($fields['nome_it']);
        }
        if (isset($fields['senha'])) $fields['senha'] = sha1($fields['senha']);
        
        // TESTA SE HÁ UPLOAD DE IMAGENS
        if($_FILES){
            $images = upload_image($_FILES);
            $fields = array_merge($fields,$images);
        }
        
        $this->load->model("AdminModel");
        $data['usuario'] = $this->session->userdata('usuario');
        $resultado = $this->AdminModel->atualizar($tabela, $fields, $id);
        
        if ($resultado): 
            $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Editado com sucesso!</p>');
        else:
            $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
        endif;

        // deleta o cache de todas as páginas
        delete_cache();

        redirect('admin/'.$tabela); 
       
    }

    //FUNÇAO PADRAO PARA DELETE EM TABELAS
    public function deletar($tabela, $id){
        $ajax = $this->input->post('ajax');
        // echo '<pre>';
        // print_r($ajax);
        // exit();

        $this->load->model("AdminModel");
        $data['usuario'] = $this->session->userdata('usuario');
        $resultado = $this->AdminModel->deletar($tabela, $id);

        if ($resultado):
            $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Deletado com sucesso!</p>');
        else:
            $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
        endif;
        
        if ($ajax=="true"):
            // deleta o cache de todas as páginas
            delete_cache();
            echo 'Excluído com sucesso!';
        else:
            redirect('admin/'.$tabela);
        endif;
    }

    public function deleteOrder($order){
        // print_r($filtro);
        // exit();

        $ajax = $this->input->post('ajax');
        $this->load->model("AdminModel");
        $data['usuario'] = $this->session->userdata('usuario');
        $resultado = $this->AdminModel->deleteOrder($order);
        // deleta o cache de todas as páginas
        delete_cache();


        // if ($resultado):
        //     $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Deletado com sucesso!</p>');
        // else:
        //     $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
        // endif;
        
        // if ($ajax=="true"):
        //     echo 'Excluído com sucesso!';
        // else:
        //     redirect('admin/'.$tabela);
        // endif;


    }

    public function ordenar($id_linha){
        $this->load->library('session');
        $fields = $this->input->post();
        $this->load->model("AdminModel");

        foreach ($fields as $key => $value) {
            
            $data = array(
                'id' => $key,
                'order' => $value               
            );


            // $resultado = $this->AdminModel->inserirOrdem($cont++,$value,$id);
            $resultado = $this->AdminModel->inserirOrdemLinhas($data);



            if ($resultado): 
                $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Editado com sucesso!</p>');
            else:
                $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
            endif;
            

        }

        // deleta o cache de todas as páginas
        delete_cache();

        redirect('admin/linhas/ordenarProdutos/'.$id_linha); 

    }

    public function ordenarProjetos(){
        $this->load->library('session');
        $fields = $this->input->post();
        $this->load->model("AdminModel");

        // echo '<pre>';
        // print_r($fields);
        // exit();

        foreach ($fields as $key => $value) {

            
    
            $resultado = $this->AdminModel->atualizar('projetos', array('order'=>$value), $key);
        
            if ($resultado): 
                $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Editado com sucesso!</p>');
            else:
                $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
            endif;
        
        }
        // deleta o cache de todas as páginas
        delete_cache();

        redirect('admin/projetos/'); 

    }

    public function ordenarLinhas($id=null){
        $this->load->library('session');
        $fields = $this->input->post();
        $this->load->model("AdminModel");
        // echo $id;
        // echo "<pre>";
        // print_r($fields);
        // exit();
        $cont = 0;
        
        foreach ($fields as $key => $value) {
            

            $data = array(
                'id' => $key,
                'order' => $cont++,
                'filtro_id' => $id,                         
            );


            // $resultado = $this->AdminModel->inserirOrdem($cont++,$value,$id);
            $resultado = $this->AdminModel->inserirOrdem($data);



            if ($resultado): 
                $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Editado com sucesso!</p>');
            else:
                $this->session->set_flashdata('erro', '<p class="alert alert-success show" role="alert">Erro!</p>');
            endif;
            

        }

        // deleta o cache de todas as páginas
        delete_cache();
        
        // $this->output->clear_all_cache();
        redirect('admin/filtros/ordenarLinhas/'.$id); 


    }


    public function adicionar($table){


        $this->load->model("AdminModel");
        $fields = $this->input->post();
        $this->load->library('upload');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 8000;
        $config['max_width']            = 5024;
        $config['max_height']           = 5024;
        $this->upload->initialize($config);

        // echo '<pre>';
        

        $file = $_FILES['img'];

        $totalFotos = count($_FILES['img']['name']);

        $this->load->library('upload', $config);

        for ($i=0; $i < $totalFotos; $i++) :
            if ($file['name'][$i]) :
                $_FILES['img']['name']= $file['name'][$i];
                $_FILES['img']['type']= $file['type'][$i];
                $_FILES['img']['tmp_name']= $file['tmp_name'][$i];
                $_FILES['img']['error']= $file['error'][$i];
                $_FILES['img']['size']= $file['size'][$i];

                if (!$this->upload->do_upload('img')) :
                    print_r($this->upload->display_errors());
                    // redirect(base_url($redirect.'/erro/'.$this->upload->display_errors()));
                else :
                    $nome_arquivo = $this->upload->data();
                    $fotos[$i]['caminho'] = '/uploads/'.$nome_arquivo['file_name'];
                endif;
            endif;
        endfor;
        $id = $this->AdminModel->adicionar($table, $fields);
        

        $imagens = array();

        foreach ($fotos as $key => $value) {
            $imagens[$key]['produto_id'] = $id;
            $imagens[$key]['imagem'] = $value['caminho']; 
        }


        $this->AdminModel->inserir($imagens);
        
        // deleta o cache de todas as páginas
        delete_cache();

        $this->produto($id);

    }

    public function update($table,$id){
        $fields = $this->input->post();

        $this->load->model("AdminModel");
        $data['page'] = "produto";
        $data['usuario'] = $this->session->userdata('usuario');
        $this->AdminModel->updateProduto($id, $table, $fields);
        // echo '<pre>';
        // print_r($data['produto']);
        // exit();
        $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Produto editado com sucesso!</p>');
       
        // deleta o cache de todas as páginas
        delete_cache();
        $this->produto($id);

    }

    public function deleteCache(){
        delete_cache();

        $this->session->set_flashdata('success', '<p class="alert alert-success show" role="alert">Editado com sucesso!</p>');

        redirect('admin/painel'); 

    }

}
