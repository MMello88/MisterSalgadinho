<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Revendedor extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}
	
	public function index(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/revendedor/sobre', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function cadastrar(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/revendedor/cadastrar', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}
}