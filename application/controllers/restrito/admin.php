<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (!$this->session->userdata('logado') or $this->session->userdata('logado') == 'false'){
			$this->session->set_userdata('logado', 'false');
			if (!$this->session->userdata('login_erro')){
				$this->data["login_erro"] = "sr-only";
			} else {
				$this->data["login_erro"] = "";
			}
			$this->load->view('restrito/login_html', $this->data);
		} else {
			$this->data["view_pedidos"] = $this->view_pedidos();
			$this->load->view('restrito/admin_html', $this->data);
		}
	}
	
	public function logar(){
		$usuario = "mister";
		$senha = "#@!mr";
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		
		if ($usuario == $user and $senha == $pass){
			$this->session->set_userdata('logado', 'true');
		} else {
			$this->session->set_userdata('login_erro', 'true');
		}
		redirect('restrito/admin');
	}

	public function view_pedidos(){
		$this->load->model('ListaPedidos');
		$pedidos = $this->ListaPedidos->getPedidosSolicitados();
		$html = "<div class='row'>";
		foreach ($pedidos as $pedido) {
			$pedido->valor_total = number_format($pedido->valor_total, 2, '.', '');
			$html .= "<div class='col-12 col-md-12 col-sm-12 align-self-center pl-3 pb-3'> " .
		   		     "  <div class='row texto-esquerdo text-center'> " .
		   		     "    <div class='col-12 col-md-2 col-sm-12 texto-esquerda'> " .
					 "      <p class='grid-p'>{$pedido->nome}</p>" .
					 "    </div> " .
					 "    <div class='col-12 col-md-2 col-sm-12'> " .
					 "        <p class='grid-p' >{$pedido->endereco}</p> " .
					 "    </div> " .
					 "    <div class='col-12 col-md-2 col-sm-12'> " .
					 "        <p class='grid-p' >{$pedido->telefone}</p> " .
					 "    </div> " .
					 "    <div class='col-12 col-md-2 col-sm-12'> " .
					 "        <p class='grid-p' >{$pedido->email}</p> " .
					 "    </div> " .
					 "    <div class='col-12 col-md-1 col-sm-12'> " .
					 "        <p class='grid-p' >{$pedido->data_pedido}</p> " .
					 "    </div> " .
					 "    <div class='col-12 col-md-1 col-sm-12'> " .
					 "        <p class='grid-p' >R$ {$pedido->valor_total}</p> " .
					 "    </div> " .
					 "    <div class='col-12 col-md-1 col-sm-12'> " .
					 "        <p class='grid-p' >{$pedido->festa}</p> " .
					 "    </div> " .
					 "    <div class='col-12 col-md-1 col-sm-12'> " .
					 "      <form method='post' action='' id='formCartDel'>" .
					 "        <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'> " .
					 "        <div class='form-group'> " .
					 "            <select class='form-control'> " .
					 "              <option name='situacao' value='s'>Solicitado</option> " .
					 "              <option name='situacao' value='v'>Visualizado</option> " .
					 "              <option name='situacao' value='p'>Produzindo</option> " .
					 "              <option name='situacao' value='t'>Saiu p/ Entrega</option> " .
					 "              <option name='situacao' value='e'>Entrega</option> " .
					 "            </select> " .
					 "         </div> " .
					 "      </form>" .
					 "    </div> " .
					 "  </div> " .
					 "</div> ";
			$html .= "";
		}
		return $html;
	}
}