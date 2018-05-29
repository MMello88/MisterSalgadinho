<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		$this->load->model('Modelo/cliente');
		$this->load->model('ModeloList/listaclientes');
		$this->data['Pedidos'] = $this->getCartBySession();

	}
	
	public function index(){
	}

	public function registrar(){
		if($this->session->userdata('id_cliente')){
			redirect('Perfil/index');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[cliente.email]');
		if ($this->form_validation->run('novo/cliente') === FALSE)
		{
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/registrar', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
			$cli = array(
                'nome'              => $this->input->post('nome'),
                'email'             => $this->input->post('email'),
                'id_cliente'        => ""
            );
            $idCliente = $this->cliente->insert();
            if(is_numeric($idCliente)){
				$cli['id_cliente'] = $idCliente;
				$this->session->set_userdata($cli);
				$this->enviarEmailCofirmandoAcesso($this->cliente->nome, $this->cliente->email, $this->cliente->hash);
				redirect('perfil/index');
			} else {
				$this->session->set_flashdata("erro_cadastro","Erro ao realizar o cadastro. Erro: " . $idCliente);
			}
		}
	}

	public function login(){
		$this->session->set_flashdata("frmLog","FALSE");
		if ($this->form_validation->run('novo/cliente') === TRUE){
			$cli = $this->listaclientes->getByEmail($this->input->post('email'));
			if (!empty($cli)){
				if ($cli->senha === do_hash($this->input->post('senha'), 'md5')){
					$arrCli = array(
		                'nome'              => $cli->nome,
		                'email'             => $cli->email,
		                'id_cliente'        => $cli->id_cliente
		            );
					$this->session->set_userdata($arrCli);
					if ($cli->tipo == "p")
						redirect('perfil/dashboard');
					else
						redirect('perfil/index');
				} else {
					$this->session->set_flashdata("erro_loginho","Usuário e Senha inválido.");
				}
			} else {
				$this->session->set_flashdata("erro_loginho","Usuário e Senha inválido.");
			}
		}

		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/registrar', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function logout(){
		$this->session->unset_userdata('id_cliente');
		redirect('Vitrine');
	}

	public function ativar($hash){
		$cliente = $this->listaclientes->getByHash($hash);
		if(!empty($cliente)){
			if ($this->cliente->ativarCliente($cliente->id_cliente) === TRUE){
				$this->data['cliente'] = $cliente;
				$this->load->view('includes/header_navbar_fixed_top', $this->data);
				$this->load->view('cliente/ativado', $this->data);
				$this->load->view('includes/footer_main', $this->data);
				return;
			} 
		}
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/erro_ativacao', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function recuperar($hash = ''){
		$this->data['hash'] = $hash;
		if (empty($hash)){
			if ($this->form_validation->run('recuperar/senha') === TRUE){
				$cliente = $this->listaclientes->getByEmail($this->input->post('email'));
				if (empty($cliente)){
					$this->data['email_nao_encontrado'] = 'E-mail não foi encontrado em nossa base de dados. Verifique novamente!';
				} else {
					$novoHash = md5($cliente->email);
					$this->cliente->gerarNovoHash($cliente->id_cliente, $novoHash);
					$this->enviarEmailRecuperarSenha($cliente->nome, $cliente->email, $novoHash);
					$this->data['email_encontrado'] = 'Foi enviado em seu e-mail instruções para recuperar o sua senha.';
				}
				$this->load->view('includes/header_navbar_fixed_top', $this->data);
				$this->load->view('cliente/recuperar_senha', $this->data);
				$this->load->view('includes/footer_main', $this->data);
			} 
			
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/recuperar_senha', $this->data);
			$this->load->view('includes/footer_main', $this->data);			
		} else {
			if ($this->form_validation->run('nova/senha') === TRUE){
				$cliente = $this->listaclientes->getByHash($this->input->post('hash'));
				$this->cliente->alterarSenha($cliente->id_cliente, $this->input->post('senha'));
				$this->cliente->ativarCliente($cliente->id_cliente);
				$this->data['recuperado_sucesso'] = "Senha foi alterada com sucesso! <a href='".base_url('clientes/registrar')."'> Clique aqui </a> para realizar novamente o loginho!";
			}
			
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/recuperar_senha', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		}
	}

	private function getCartBySession() {
		$this->load->model('ModeloList/listacarts');
        return $this->listacarts->getCartBySession($this->session->userdata('id_session'));
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
      ->subject("Mister Salgadinhos - Seu pedido foi recebido com sucesso!.")
      ->message($html)
      ->send();
    }

    private function enviarEmailRecuperarSenha($nome, $email, $hash){
    	$link = base_url("clientes/recuperar/$hash");
    	$link_ativar = base_url("clientes/ativar/$hash");
    	$html = 
		"<!DOCTYPE html>
		<html lang=\"pt-br\">
		  <head>
		  </head>
		  <body> 
		    <h3><b>Olá,  {$nome}.</b></h3>
		    <p>Você solicitou a recuperação de senha do <b>Mister</b> Salgadinhos?</p>
		    <p>
		    Se foi você quem solicitou a recuperação de senha por favor <a href='{$link}'>Clique Aqui</a> para registrar uma nova senha. <br>
		    Se não foi você quem solicitou a recuperação de senha por favor <a href='{$link_ativar}'>Clique Aqui</a> para desfazer este pedido. <br>
		    Obrigado!
		    </p>
		    <br/>
		    <p><smal>**Por favor, não responder para este e-mail</smal></p>
		  </body>
		</html>";

    $this->load->library('email');
    $this->email
      ->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
      ->to($email)
      ->subject("Mister Salgadinhos - Seu pedido foi recebido com sucesso!.")
      ->message($html)
      ->send();
    }
}