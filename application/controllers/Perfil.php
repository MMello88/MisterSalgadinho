<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller {

	public function __construct()
	{
		parent::__construct(TRUE);
		//$this->output->enable_profiler(TRUE);
		$this->data['titulo'] = 'Perfil no Mister Salgadinhos.';
		$this->data['valoresHoraEntrega'] = $this->getTipoBy("hora_entrega");
		$this->data['valoresFormaPagto'] = $this->getTipoBy("forma_pgto");
	}
	
	public function index(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/navbar_cliente', $this->data);
		$this->load->view('cliente/painel', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function finalizar(){

		if ($this->form_validation->run('finalizar/pedido') === FALSE){
			$this->data['Pedidos'] = $this->getCartBySession();
			$this->data['valoresHoraEntrega'] = $this->getTipoBy("hora_entrega");
			$this->data['valoresFormaPagto'] = $this->getTipoBy("forma_pgto");

			$this->data['cliente'] = $this->getCliente();
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/navbar_cliente', $this->data);
			$this->load->view('cliente/painel', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
			
			$carts = $this->getCartBySession();
			if (!empty($carts)){
				$id_pedido = $this->pedido->insert();
				
				foreach ($carts as $value) {
					$this->item_pedido->id_item_pedido = null;
				    $this->item_pedido->id_pedido = $id_pedido;
				    $this->item_pedido->id_produto = $value->id_produto[0]->id_produto;
				    $this->item_pedido->id_categoria_produto = $value->id_categoria_produto;
				    $this->item_pedido->qtde = $value->qtde;
				    $this->item_pedido->valor_unitario = $value->valor_unitario;
				    $this->item_pedido->insert();

				    $this->movimentacao_estoque->id_movimentacao_estoque = null;
				    $this->movimentacao_estoque->id_produto = $value->id_produto[0]->id_produto;
				    $this->movimentacao_estoque->tipo_movimentacao = 's';
				    $this->movimentacao_estoque->qtde_movimentacao = $value->qtde;
				    $this->movimentacao_estoque->id_item_pedido = $this->item_pedido->id_item_pedido;
				    
				    $this->movimentacao_estoque->gerarMovimentacao($this->data["cidade"]->id_cidade);
				}

				//retirando o pedido do carrinho para iniciar uma nova session
				$this->cart->updataSitucao($this->session->userdata('id_session'));
				$this->session->unset_userdata('id_session');
				$this->session->unset_userdata('cidade');
			}
			if ($this->session->userdata('cliente_repre_selecionado') !== null){
				$cliente =  $this->session->userdata('cliente_repre_selecionado');
				$this->enviarEmailFinalizado($cliente['nome'], $cliente['email']);
				$this->enviarEmailAdmin($cliente['nome'], $cliente['email'], $cliente['telefone'], $cliente['endereco']);
				$this->data['cliente'] = (object)$cliente;
			} else {
				$this->data['cliente'] = $this->getCliente();
				$this->enviarEmailFinalizado($this->data['cliente']->nome, $this->data['cliente']->email);
				$this->enviarEmailAdmin($this->data['cliente']->nome, $this->data['cliente']->email, $this->data['cliente']->telefone, $this->data['cliente']->endereco);
			}

			
			$this->data['Pedidos'] = array();
			$this->data['finalizado'] = 'Agradecemos pela sua preferência. Seu pedido será processado.';
			if ($this->session->userdata('cliente_repre_selecionado') !== null){
				$this->session->unset_userdata('cliente_repre_selecionado');
				$this->load->view('includes/header_navbar_fixed_top', $this->data);
				$this->load->view('representante/dashboard_menu', $this->data);
				$this->load->view('representante/dashboard', $this->data);
				$this->load->view('includes/footer_main', $this->data);
			} else {
				$this->load->view('includes/header_navbar_fixed_top', $this->data);
				$this->load->view('cliente/navbar_cliente', $this->data);
				$this->load->view('cliente/painel', $this->data);
				$this->load->view('includes/footer_main', $this->data);
			}
		}
	}

	public function historico(){
        $this->data['Pedidos'] = $this->listapedidos->getPedidoByCliente($this->session->userdata('id_cliente'));

		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/navbar_cliente', $this->data);
		$this->load->view('cliente/historico_compra', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function editar(){
        $this->data['edtCliente'] = $this->listaclientes->get($this->session->userdata('id_cliente'));
        if ($this->form_validation->run('novo/cliente') === TRUE){
        	$this->data['edtClienteSucesso'] = $this->cliente->update();
        }
		$this->data['cliente'] = $this->getCliente();
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/navbar_cliente', $this->data);
		$this->load->view('cliente/editar', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function desconto(){
		$pedidos = $this->getCartBySession();
		if (empty($pedidos)){
			$this->session->set_flashdata("msg_cod_promo", "Sem pedido feito para dar o desconto");
		} else {
			if ($_POST){
				if(strtolower($_POST['codigo']) === strtolower('#topMisterSalgadinhos')){
					$this->session->set_flashdata("msg_cod_promo", $this->cart->desconto($_POST['id_session'], $_POST['cod_promo']));
				} else {
					$this->session->set_flashdata("msg_cod_promo", "Código promocional inválido");
				}
			}
		}
		redirect("perfil/index");
	}

	private function enviarEmailFinalizado($nome, $email){
		$html = 
			"<!DOCTYPE html>
			<html lang=\"pt-br\">
			  <head>
			  </head>
			  <body> 
				<h3><b>Olá,  {$nome}.</b></h3>
				<p>Nós da <b>Mister</b> Salgadinhos</p>
				<p>
				<b>Agradecemos pela preferência.</b> Seu pedido foi recebido com <b>sucesso.</b> <br>
				Em breve este <b>delicioso salgadinhos</b> será produzido e entregue.<br>
				</p>
				<br/>
				<p><smal>**Por favor, não responder para este e-mail</smal></p>
			  </body>
			</html>";

		if (ENVIRONMENT !== 'development'){
			$this->load->library('email');
			$this->email
				->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
				->to($email)
				->subject("Mister Salgadinhos - {$nome} Seu pedido foi recebido com sucesso!.")
				->message($html)
				->send();
		}
	}
  
	private function enviarEmailAdmin($nome, $email, $telefone, $endereco){
    	$html = 
		"<!DOCTYPE html>
		<html lang=\"pt-br\">
			<head>
				<body>
					 <table>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Telefone</th>
							<th>Endereço</th>
						</tr>
						<tr>
							<td>$nome</td>
							<td>$email</td>
							<td>$telefone</td>
							<td>$endereco</td>
						</tr>
					 </table>
				 <p>Vocês tem um novo pedido realizado. <br> Acesse o
					<a href=\" ".base_url("Admin/Login")."\" target=\"_blank\">Administrador</a>
				 </p>
				 </body>
			</head>
		</html>";

		if (ENVIRONMENT !== 'development'){
		    $this->load->library('email');
		    $this->email
				->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
				->to('engrmachado@gmail.com, matheus.gnu@gmail.com, hurzana@gmail.com')
				->subject("Mister Salgadinhos - Pedido realizado pelo(a) $nome.")
		        ->message($html)
		        ->send();
	    }
    }
}