<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitrine extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('id_session')){
			$this->session->set_userdata('id_session', md5(date("Y-m-d H:i:s")));
		}

		$this->data["CategoriasProdutos"] = $this->getCategoriaProduto();
		$this->data["Produtos"] = $this->getProduto();
		
		$this->load->view('includes/header_navbar_fixed_top');
		$this->load->view('index_promocional_html', $this->data);
		$this->load->view('includes/footer_main');
	}
	
	private function getCategoriaProduto(){
		$this->load->model('ModeloList/listacategoriasproduto');
    	return $this->listacategoriasproduto->get_all();
	}

	private function getProduto(){
		$this->load->model('ModeloList/listaprodutos');
    	return $this->listaprodutos->getAllProdutoCategValor();
	}

	private function getIdCidade($cidade){
		$this->load->model('ModeloList/listacidades');
	  if (!empty($cidade)) {
			$row = $this->listacidades->getByLink($cidade);
			if ($row === null)
				redirect(base_url("Shop/"));
			return $row->id_cidade;
		}
		return '';
	}
}