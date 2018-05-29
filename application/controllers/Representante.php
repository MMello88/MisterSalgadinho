<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Representante extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}
	
	public function comercial(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('representante/sobre_representante', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function cadastrar(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[cliente.email]');
		$this->form_validation->set_rules('cpf_cnpj', 'CPF ou CNPJ', 'trim|required|numeric|min_length[11]|max_length[14]');
		if ($this->form_validation->run('novo/cliente/representante') === FALSE)
		{
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('representante/cadastrar', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
			$this->load->model('Modelo/cliente');
            $idCliente = $this->cliente->insert();
            if(is_numeric($idCliente)){
				$this->data['cliente'] = $this->cliente;
				$this->enviarEmailCofirmandoAcesso($this->cliente->nome, $this->cliente->email, $this->cliente->hash);
				$this->load->view('includes/header_navbar_fixed_top', $this->data);
				$this->load->view('cliente/registrar_sucesso', $this->data);
				$this->load->view('includes/footer_main', $this->data);
			} else {
				$this->session->set_flashdata("erro_cadastro","Erro ao realizar o cadastro. Erro: " . $idCliente);
			}
		}
	}

	private function enviarEmailCofirmandoAcesso($nome, $email, $hash){
    	$link = base_url("clientes/ativar/$hash");
    	$html = 
		"<!DOCTYPE html>
		<html lang=\"pt-br\">
		  <head>
		  </head>
		  <body> 
		    <h3><b>Olá,  {$nome}.</b></h3>
		    <p>Sejá Bem Vindo ao <b>Mister</b> Salgadinhos</p>
		    <p>
		    Agradecemos pela preferência.</b> Pedimos que clique no link abaixo para ativar sua conta. <br>
		    Após clicar no link para ativar sua conta já poder realizar compras em nossa loja virtual. <br>
		    Obrigado!
		    </p>
		    <a href='{$link}'>Clique Aqui - Ativar sua Conta</a>
		    <br/>
		    <p><smal>**Por favor, não responder para este e-mail</smal></p>
		  </body>
		</html>";

    $this->load->library('email');
    $this->email
      ->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
      ->to($email)
      ->subject("Mister Salgadinhos - Link para ativar o cadastro!.")
      ->message($html)
      ->send();
    }
}