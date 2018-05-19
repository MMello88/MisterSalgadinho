<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['Pedidos'] = $this->getCartBySession();
	}
	
	public function index(){
		if($this->session->userdata('id_cliente')){
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/perfil', $this->data);
			$this->load->view('includes/footer_main', $this->data);
		} else {
			redirect("clientes/registrar");
		}
	}


	private function getCartBySession() {
		$this->load->model('ModeloList/listacarts');
        return $this->listacarts->getCartBySession($this->session->userdata('id_session'));
    }
}