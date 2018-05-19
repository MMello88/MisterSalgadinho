<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
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

	public function esqueceu(){

	}

	private function getCartBySession() {
		$this->load->model('ModeloList/listacarts');
        return $this->listacarts->getCartBySession($this->session->userdata('id_session'));
    }
}