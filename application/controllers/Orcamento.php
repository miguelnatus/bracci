<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento extends MY_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('PageModel');
		// $this->load->model('AcabamentosModel');
		// $this->load->model('LinhasModel');
		// $this->load->model('CategoriasModel');
		// $this->load->model('ProjetosModel');

	}


	public function enviar(){
        
        $this->load->helper(array('form', 'url'));
        $data['lang'] = $this->uri->segment(1);


        $this->load->library('email');
        
        $dados = $this->input->post();
        $data['dados'] = $this->input->post();
        $assunto = 'Bracci';

        // echo '<pre>';
        // print_r($data['dados']);
        // exit();

        $this->load->model("OrcamentoModel");
        $this->OrcamentoModel->inserir($data['dados']);

        $body = $this->load->view('orcamento.php', $data, TRUE);
          
        $config['useragent']        = 'Codeigniter';
        $config['protocol']         = 'smtp';
        $config['smtp_host']        = 'ssl://smtp.googlemail.com';
        $config['smtp_user']        = 'smtpbracci@gmail.com';
        $config['smtp_pass']        = 'SMTPBr2021Acci';
        // $config['smtp_host']        = 'ssl://smtp.googlemail.com';
        // $config['smtp_user']        = 'miguelnatus@gmail.com';
        // $config['smtp_pass']        = 'euamoalua';
        $config['smtp_port']        = 465;
        $config['smtp_debug']       = 0;
        $config['mailtype']         = 'html';
        $config['charset']          = 'utf-8';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);
   
        $this->email->from('smtpbracci@gmail.com', $dados['nome']);
        // $this->email->from('miguelnatus@gmail.com', $dados['nome']);
        
        
        $this->email->to('contato@bracci.com.br');
        // $this->email->cc('miguelnatus@gmail.com');
        // $this->email->to('comercial@bracci.com.br');
        
        
        $this->email->subject($assunto);


        $this->email->message($body);
 
        if($this->email->send()){    
          
            $this->session->set_flashdata('success','Email enviado com sucesso!');
            redirect($data['lang']."/obrigado", "location");

        }
        else{
        	
            $this->session->set_flashdata('error',$this->email->print_debugger());
            
        }
        
        

	}

}