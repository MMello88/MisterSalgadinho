<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AreaComercial extends MY_Controller {

	public function __construct()
	{
		parent::__construct(TRUE);
		//$this->output->enable_profiler(TRUE);
		$this->data['titulo'] = 'Área Administrativa - Mister Salgadinhos.';
		$this->data['valoresHoraEntrega'] = $this->getTipoBy("hora_entrega");
		$this->data['valoresFormaPagto'] = $this->getTipoBy("forma_pgto");
	}
	
	public function index(){
		$this->dashboard();
	}

	public function dashboard(){
		$this->data['consumidores'] = $this->listarepresentantecliente->get($this->data['cliente']->id_cliente);
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

	public function relatorioCompraClientes(){
		$this->data['options'] = array(
			'1' => 'Janeiro',
			'2' => 'Fevereiro',
			'3' => 'Março',
			'4' => 'Abril',
			'5' => 'Maio',
			'6' => 'Junho',
			'7' => 'Julho',
			'8' => 'Agosto',
			'9' => 'Setembro',
			'10' => 'Outubro',
			'11' => 'Novembro',
			'12' => 'Dezembro');
		$this->data['relatRecbiByPedido'] = array();
		$this->form_validation->set_rules('dt_inicial', 'Data Inicial', 'trim|required|numeric');
        $this->form_validation->set_rules('dt_final', 'Data Final', 'trim|required|numeric');
    	if ($this->form_validation->run() === TRUE)
		{
			$this->data['relatRecbiByPedido'] = $this->listarepresentanterecebimento->getClienteByPeriodo(
				$this->input->post('id_cliente_represent'), $this->input->post('dt_inicial'), $this->input->post('dt_final'));
		}

		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('representante/dashboard_menu', $this->data);
		$this->load->view('representante/relatorio_vendas', $this->data);
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
		} 
		else 
		{
			$senha = $this->input->post('senha');
            $idCliente = $this->cliente->insert();
            if(is_numeric($idCliente)){
            	$this->representante_cliente->id_cliente_represent = $this->data['cliente']->id_cliente;
            	$this->representante_cliente->id_cliente_cliente = $idCliente;
            	$id_representante_cliente = $this->representante_cliente->insert();
            	if (is_numeric($id_representante_cliente)){
					$this->enviarEmailNovaConta($this->cliente->nome, $this->cliente->email, $this->cliente->hash);
					$this->session->set_flashdata("success_cad_consu","Seu Cliente foi cadastrado com sucesso! <br/> Vai chegar um E-mail para seu cliente ativar a conta!");
					redirect("AreaComercial/novo_consumidor");
				} else {
					$this->session->set_flashdata("erro_cad_consu","Erro ao realizar o cadastro. Erro: " . $id_representante_cliente);
				}
			} else {
				$this->session->set_flashdata("erro_cad_consu","Erro ao realizar o cadastro. Erro: " . $idCliente);
			}
		}
	}

	public function buscaClienteRepresentante(){
		if ($_POST){
			$value = $this->input->post('pesqValue');
			echo json_encode($this->listarepresentantecliente->getClienteRepresentante($this->data['cliente']->id_cliente, $value));
		}
	}

	public function selecionarClienteRepresentante(){
		if ($_POST){
			$selectIdCliente = $this->input->post('selectIdCliente');
			if(($this->session->userdata('cliente_repre_selecionado') !== null)){
				if($this->session->userdata('cliente_repre_selecionado')['id_cliente'] === $selectIdCliente){
					$this->session->unset_userdata('cliente_repre_selecionado');
					echo "deselecionado";
				} 
			} else {
				$cliente = $this->listaclientes->get($selectIdCliente);
				$arrCli = array('cliente_repre_selecionado' => 
							array('id_cliente' => $cliente->id_cliente,
								  'nome' => $cliente->nome,
								  'email' => $cliente->email,
								  'tipo' => $cliente->tipo,
								  'telefone' => $cliente->telefone,
								  'endereco' => $cliente->endereco));
				$this->session->set_userdata($arrCli);
				echo "selecionado";
			}
		} else {
			echo "no posted";
		}
	}

	public function limparPedido(){
		$this->session->unset_userdata('cliente_repre_selecionado');
		$this->cart->deleteCartBySession($this->session->userdata('id_session'));
		redirect('AreaComercial/index');
	}

	private function enviarEmailNovaConta($nome, $email, $senha){
    	$link = base_url("clientes/registrar");
    	$html = 
		"<!DOCTYPE html>
		<html lang=\"pt-br\">
		  <head>
		  </head>
		  <body> 
		    <h3><b>Olá,  {$nome}.</b></h3>
		    <p>Sejá Bem Vindo ao <b>Mister Salgadinhos</b></p>
		    <p>Agradecemos pela Preferência.</p>
		    <br/>
		    <p>Segue seu usuário e senha para acessar a área administrativa, e também realizar compras e checar o histórico de compras</p>
		    <p>Usuário: {$email} <br/> Senha: {$senha}</p>
		    <a href='{$link}'>Clique Aqui - Realizar o Loginho</a>
		    <br/>
		    <p><smal>**Por favor, não responder para este e-mail</smal></p>
		  </body>
		</html>";

		if (ENVIRONMENT !== 'development'){
		    $this->load->library('email');
		    $this->email
		      ->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
		      ->to($email)
		      ->subject("Mister Salgadinhos - Link para ativar o cadastro!.")
		      ->message($html)
		      ->send();
		  }
    }
}