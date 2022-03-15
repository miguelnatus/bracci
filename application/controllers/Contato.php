<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends MY_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('PageModel');
		$this->load->model('AcabamentosModel');
		$this->load->model('LinhasModel');
		$this->load->model('CategoriasModel');
		$this->load->model('ProjetosModel');
        // $this->load->model('LanguageModel');

	}
	
	public function index(){

        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));	
		
		$data['lang'] = $this->uri->segment(1);
		$categoria = $this->uri->segment(2);
		$data['categoria'] = $categoria;

		// $data['translation'] = $this->LanguageModel->getLangContent();

		$data['translations'] = $this->PageModel->getPageContent('all');
		$data['content'] = $this->PageModel->getPageContent('home');
		$data['acabamento'] = $this->AcabamentosModel->getAcabamento();
		$data['linhaMenu'] = $this->LinhasModel->getLinhas();
		$data['projetos'] = $this->ProjetosModel->getProjetos();



		$data['page_name'] = 'contato';
		$data['page_seo'] = 'Contato';
		$this->load->view('headerView',$data);
		$this->load->view('contatoView');
		$this->load->view('footerView');
		
	}

	public function enviar(){
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('email');
        $data['lang'] = $this->uri->segment(1);


        $this->form_validation->set_rules('name', 'Nome', 'required|min_length[4]|max_length[30]');
        // $this->form_validation->set_message('nome', 'O campo {nome} é obrigatório.');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        $this->form_validation->set_rules('city', 'Cidade', 'required|min_length[3]|max_length[40]');
        $this->form_validation->set_rules('message', 'Mensagem', 'required|min_length[10]');

        $this->form_validation->set_message('required', '{field} é um campo obrigatório.');
        $this->form_validation->set_message('min_length', 'O campo {field} deve possuir ao menos {param} caracteres.');

        $this->form_validation->set_error_delimiters("<div class='form-error'>", "</div>");

        
        
        $dados = $this->input->post();
        $data['dados'] = $this->input->post();
        $assunto = 'Bracci';

        if ($this->form_validation->run() == FALSE){
           // echo 'erro';
           $this->index();
        }
        else{

            $body = $this->load->view('email.php', $data, TRUE);
              
            $config['useragent']        = 'Codeigniter';
            // $config['protocol']         = 'tls';
            $config['protocol']         = 'smtp';
            $config['smtp_host']        = 'ssl://smtp.googlemail.com';
            $config['smtp_user']        = 'smtpbracci@gmail.com';
            $config['smtp_pass']        = 'SMTPBr2021Acci';
            $config['smtp_port']        = 465;
            // $config['smtp_timeout']     = 7;
            // $config['smtp_crypto']      = 'tls';
            $config['smtp_debug']       = 0;
            // $config['wordwrap']         = TRUE;
            // $config['wrapchars']        = 76;
            $config['mailtype']         = 'html';
            $config['charset']          = 'utf-8';
            // $config['validate']         = TRUE;
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            // $config['bcc_batch_mode']   = false;
            // $config['bcc_batch_size']   = 200;

            $this->email->initialize($config);
        
       
            $this->email->from('contatobracci@gmail.com', $dados['name']); 
            
            $this->email->to('contato@bracci.com.br');
            // $this->email->to('comercial@bracci.com.br');
            // $this->email->to('miguel@inventocc.com');
            
            $this->email->subject($assunto);


            $this->email->message($body);
     
            if($this->email->send()){    
                // echo 'enviou';
                // exit();
                //print_r($this->email->print_debugger()); exit;
                $this->session->set_flashdata('success','Email enviado com sucesso!');
                redirect($data['lang']."/contato", "location");
            }
            else{
            	// echo 'erro';
            	// exit();
                // print_r($this->email->print_debugger());
                $this->session->set_flashdata('error',$this->email->print_debugger());
                redirect($data['lang']."/contato", "location");
            }
        
        }

	}

}