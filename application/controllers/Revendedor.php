<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Revendedor extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		$this->data['titulo'] = 'Torne-se um Revendedor Mister Salgadinhos.';
	}
	
	public function index(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/revendedor/sobre', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function cadastrar(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[cliente.email]');
		if ($this->form_validation->run('novo/cliente') === FALSE)
		{
			$this->load->view('includes/header_navbar_fixed_top', $this->data);
			$this->load->view('cliente/revendedor/cadastrar', $this->data);
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
}