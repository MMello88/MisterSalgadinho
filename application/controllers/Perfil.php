<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		$this->data['Pedidos'] = $this->getCartBySession();
		//$this->data['finalizado'] = '';
		//print_r($this->data['Pedidos']);die();
		$this->data['valoresHoraEntrega'] = $this->getTipoBy("hora_entrega");
		$this->data['valoresFormaPagto'] = $this->getTipoBy("forma_pgto");
	}
	
	public function index(){
		if($this->session->userdata('id_cliente')){
			$this->data['cliente'] = $this->session->userdata();
			$this->data['cliente']['id_cidade'] = $this->session->userdata('cidade');
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('includes/navbar_cliente', $this->data);
			$this->load->view('cliente/painel', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
			redirect("clientes/registrar");
		}
	}

	public function finalizar(){

		if ($this->form_validation->run('finalizar/pedido') === FALSE){
			$this->data['Pedidos'] = $this->getCartBySession();
			$this->data['valoresHoraEntrega'] = $this->getTipoBy("hora_entrega");
			$this->data['valoresFormaPagto'] = $this->getTipoBy("forma_pgto");

			$this->data['cliente'] = $this->session->userdata();
			$this->data['cliente']['id_cidade'] = $this->session->userdata('cidade');
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('includes/navbar_cliente', $this->data);
			$this->load->view('cliente/painel', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
			$carts = $this->getCartBySession();
			if (!empty($carts)){
				$this->load->model('Modelo/pedido');
				$this->load->model('Modelo/item_pedido');
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
				$this->load->model('Modelo/cart');
				$this->cart->updataSitucao($this->session->userdata('id_session'));
				$this->session->unset_userdata('id_session');
				$this->session->unset_userdata('cidade');
			}

			$this->data['cliente'] = $this->session->userdata();
			$this->data['cliente']['id_cidade'] = '';
			$this->data['Pedidos'] = array();
			$this->data['finalizado'] = 'Agradecemos pela sua preferência. Seu pedido será processado.';
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('includes/navbar_cliente', $this->data);
			$this->load->view('cliente/painel', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		}
	}

	public function historico(){
		$this->load->model('ModeloList/listapedidos');
        $this->data['Pedidos'] = $this->listapedidos->getPedidoByCliente($this->session->userdata('id_cliente'));

		$this->data['cliente'] = $this->session->userdata();
		$this->data['cliente']['id_cidade'] = $this->session->userdata('cidade');
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('includes/navbar_cliente', $this->data);
		$this->load->view('cliente/historico_compra', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function editar(){
		$this->load->model('ModeloList/listapedidos');
        $this->data['Pedidos'] = $this->listapedidos->getPedidoByCliente($this->session->userdata('id_cliente'));

		$this->data['cliente'] = $this->session->userdata();
		$this->data['cliente']['id_cidade'] = $this->session->userdata('cidade');
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('includes/navbar_cliente', $this->data);
		$this->load->view('cliente/editar', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	private function getCartBySession() {
		$this->load->model('ModeloList/listacarts');
        return $this->listacarts->getCartBySession($this->session->userdata('id_session'));
    }

    private function getTipoBy($campo){
		$this->load->model('ModeloList/listatipo');
		return $this->listatipo->getByCampo($campo);
	}
}