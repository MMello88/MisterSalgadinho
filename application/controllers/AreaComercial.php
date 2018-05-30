<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AreaComercial extends MY_Controller {

	public function __construct()
	{
		parent::__construct(TRUE);
		//$this->output->enable_profiler(TRUE);
		
		$this->data['valoresHoraEntrega'] = $this->getTipoBy("hora_entrega");
		$this->data['valoresFormaPagto'] = $this->getTipoBy("forma_pgto");
	}
	
	public function index(){
		$this->dashboard();
	}

	public function dashboard(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('representante/dashboard_menu', $this->data);
		$this->load->view('representante/dashboard', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function historico(){
        $this->data['Pedidos'] = $this->listapedidos->getPedidoByCliente($this->session->userdata('id_cliente'));
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('representante/dashboard_menu', $this->data);
		$this->load->view('representante/historico_compra_representante', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function editar(){
        $this->data['edtCliente'] = $this->listaclientes->get($this->session->userdata('id_cliente'));
        if ($this->form_validation->run('novo/cliente') === TRUE){
        	$this->data['edtClienteSucesso'] = $this->cliente->update();
        }
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('representante/dashboard_menu', $this->data);
		$this->load->view('representante/editar_representante', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function novo_consumidor($id_cliente_cliente = ''){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[cliente.email]');
        $this->form_validation->set_rules('cpf_cnpj', 'CPF ou CNPJ', 'trim|required|numeric|min_length[11]|max_length[14]');
    	$this->data['consumidores'] = $this->listarepresentantecliente->get($this->data['cliente']->id_cliente);
    	$this->data['consumidor'] = $this->listaclientes->get($id_cliente_cliente);
		if ($this->form_validation->run('novo/cliente/representante') === FALSE)
		{
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('representante/dashboard_menu', $this->data);
			if (empty($id_cliente_cliente)) 
				$this->load->view('representante/cadastrar_consumidor', $this->data);
			else
				$this->load->view('representante/editar_consumidor', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
            $idCliente = $this->cliente->insert();
            if(is_numeric($idCliente)){
            	$this->representante_cliente->id_cliente_represent = $this->data['cliente']->id_cliente;
            	$this->representante_cliente->id_cliente_cliente = $idCliente;
            	$id_representante_cliente = $this->representante_cliente->insert();
            	if (is_numeric($id_representante_cliente)){
					$this->enviarEmailCofirmandoAcesso($this->cliente->nome, $this->cliente->email, $this->cliente->hash);
					$this->session->set_flashdata("success_cad_consu","Seu Cliente foi cadastrado com sucesso! <br/> Vai chegar um E-mail para seu cliente ativar a conta!");
					redirect("areacomercial/novo_consumidor");
				} else {
					$this->session->set_flashdata("erro_cad_consu","Erro ao realizar o cadastro. Erro: " . $id_representante_cliente);
				}
			} else {
				$this->session->set_flashdata("erro_cad_consu","Erro ao realizar o cadastro. Erro: " . $idCliente);
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