<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  
	public function __construct($checa_loginho = FALSE)
	{
		parent::__construct();
		$this->data['contentKey'] = 'salgadinhos para festa; mister salgadinhos; salgadinhos; salgadinhos ribeirão preto; salgadinhos pontal; salgado massa mandioca; salgado de festa;';
		$this->google();
		$this->CidadeSession();
		$this->NovaSession();
		$this->data["CategoriasProdutos"] = $this->getCategoriaProduto();
		$this->data["Produtos"] = $this->getProduto();
		$this->data['Pedidos'] = $this->getCartBySession();
		$this->data['cliente'] = $this->getCliente();

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

	private function google(){
		if (ENVIRONMENT === 'development')
			$this->data['script_google'] = "";
		else 
			$this->data['script_google'] = "
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-18838216-4'></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-18838216-4');
    </script>
    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-118826942-1'></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-118826942-1');
    </script>
	";
	}

	protected function getProduto()
	{
		if ($this->session->userdata('cidade')) {
			$tipo = 'c';
			$cidade = json_decode($this->session->userdata('cidade'));
			if ($this->session->userdata('cliente_repre_selecionado') !== null)
				$tipo = $this->session->userdata('cliente_repre_selecionado')['tipo'];
			else if ($this->session->userdata('id_cliente') !== null)
				$tipo = $this->session->userdata('tipo');
			
    		return $this->listaprodutos->getAllProdutoCategValor($cidade->id_cidade, 'a', $tipo);
    	} else {
    		return $this->listaprodutos->getAllProdutoCategValor();
    	}
	}

	protected function getCidades($id_cidade = False)
	{
		
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
		if ($this->session->userdata('cidade'))
		{
			$cidade = json_decode($this->session->userdata('cidade'));
	    	return $this->listacategoriasproduto->get_all($cidade->id_cidade);
	    } 
	    else{
	    	return $this->listacategoriasproduto->get_all();
	    }
	}

    protected function getTipoBy($campo){
		return $this->listatipo->getByCampo($campo);
	}

	protected function getCliente(){
		$cliente = $this->listaclientes->get($this->session->userdata('id_cliente'));
		if(!empty($cliente))
			$cliente->id_cidade = $this->session->userdata('cidade');
		return $cliente;
	}

	protected function getCartBySession() {
        return $this->listacarts->getCartBySession($this->session->userdata('id_session'));
    }
}