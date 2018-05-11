<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitrine extends CI_Controller {

	public function index()
	{
		$this->CidadeSession();
		$this->NovaSession();
		$this->data["CategoriasProdutos"] = $this->getCategoriaProduto();
		$this->data["Produtos"] = $this->getProduto();
		
		$this->load->view('includes/header_navbar_fixed_top');
		$this->load->view('index_promocional_html', $this->data);
		$this->load->view('includes/footer_main', $this->data);
	}
	
	public function SelecionarCidade()
	{
		if ($this->input->post('id_cidade'))
		{
			$cidade = $this->getCidades($this->input->post('id_cidade'));
			$this->session->set_userdata('cidade', json_encode($cidade));
		} else {
			$this->session->set_flashdata('cidade_nao_selecionada', 'A Cidade não foi selecionada.');
		}

		redirect('Vitrine');
	}

	public function RetiraCidade()
	{
		if ($this->input->post('remove') == 'true'){
			$this->session->unset_userdata('id_session');
			$this->session->unset_userdata('cidade');
			echo 'Sucesso';
		} else {
			echo 'Sorry';
		}
	}

	private function getCategoriaProduto()
	{
		$this->load->model('ModeloList/listacategoriasproduto');
    	return $this->listacategoriasproduto->get_all();
	}

	private function getProduto()
	{
		$this->load->model('ModeloList/listaprodutos');
    	return $this->listaprodutos->getAllProdutoCategValor();
	}

	private function getCidades($id_cidade = False)
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

	/*private function getIdCidade($cidade){
		$this->load->model('ModeloList/listacidades');
	  if (!empty($cidade)) {
			$row = $this->listacidades->getByLink($cidade);
			if ($row === null)
				redirect(base_url("Shop/"));
			return $row->id_cidade;
		}
		return '';
	}*/

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


}