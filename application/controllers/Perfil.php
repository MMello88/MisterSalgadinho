<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller {

	public function __construct()
	{
		parent::__construct(TRUE);
		//$this->output->enable_profiler(TRUE);
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
				    $this->item_pedido->qtde = $value->qtde;
				    $this->item_pedido->valor_unitario = $value->valor_unitario;
				    $this->item_pedido->insert();
				}

				//retirando o pedido do carrinho para iniciar uma nova session
				$this->cart->updataSitucao($this->session->userdata('id_session'));
				$this->session->unset_userdata('id_session');
				$this->session->unset_userdata('cidade');
			}

			$this->data['cliente'] = $this->getCliente();
			$this->data['Pedidos'] = array();
			$this->data['finalizado'] = 'Agradecemos pela sua preferência. Seu pedido será processado.';
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/navbar_cliente', $this->data);
			$this->load->view('cliente/painel', $this->data);
			$this->load->view('includes/footer_main', $this->data);
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
}