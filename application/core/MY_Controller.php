<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  
	public function __construct($checa_loginho = FALSE)
	{
		parent::__construct();

		$this->CidadeSession();
		$this->NovaSession();
		$this->data["CategoriasProdutos"] = $this->getCategoriaProduto();
		$this->data["Produtos"] = $this->getProduto();

		if ($checa_loginho){
			if(!$this->session->userdata('id_cliente')){
				redirect("clientes/registrar");
			}
		}
	}

	private function NovaSession()
	{
		if (!$this->session->userdata('id_session'))
		{
			$id_session = md5(date("Y-m-d H:i:s"));
			$this->session->set_userdata('id_session', $id_session);
			$this->data["id_session"] = $id_session;
		} else {
			$this->data["id_session"] = $this->session->userdata('id_session');
		}
	}

	private function CidadeSession()
	{
		if ($this->session->userdata('cidade'))
		{
			$this->data["cidade"] = json_decode($this->session->userdata('cidade'));
			$this->data["Cidades"] = null;
		} else {
			$this->data["cidade"] = null;
			$this->data["Cidades"] = $this->getCidades();
		}
	}

	protected function getProduto()
	{
		$this->load->model('ModeloList/listaprodutos');
    	return $this->listaprodutos->getAllProdutoCategValor();
	}

	protected function getCidades($id_cidade = False)
	{
		$this->load->model('ModeloList/listacidades');
		if ($id_cidade === False){
			$cidades = $this->listacidades->get_all();
			return $cidades;
		} else {
			$cidade = $this->listacidades->get($id_cidade);
			return $cidade[0];
		}
	}

	protected function getCategoriaProduto()
	{
		$this->load->model('ModeloList/listacategoriasproduto');
    	return $this->listacategoriasproduto->get_all();
	}

    protected function getTipoBy($campo){
		$this->load->model('ModeloList/listatipo');
		return $this->listatipo->getByCampo($campo);
	}

	protected function getCliente(){
		$cliente = $this->listaclientes->get($this->session->userdata('id_cliente'));
		$cliente->id_cidade = $this->session->userdata('cidade');
		return $cliente;
	}
}