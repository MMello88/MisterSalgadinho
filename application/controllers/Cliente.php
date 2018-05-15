<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
	}

	public function registrar(){
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('cliente/registrar', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}

	public function login(){

	}

	public function logout(){

	}

	public function esqueceu(){

	}
}