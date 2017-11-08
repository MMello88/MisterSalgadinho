<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {

    public function index()
    {
        $this->data['title'] = 'Pedido';
        $this->data["view_pedido_produtos"] = $this->getCartBySession($this->session->userdata('id_session'));
				$this->data["combobox_horario"] = $this->getComboHorario();
				$this->data["forma_pagto"] = $this->getFormPagto();
        $this->load->view('cart_html', $this->data);
    }

    public function inserir(){
        $this->load->model('Modelo/cart');
        $this->cart->insert();
    }
		
	public function getComboHorario(){
		$this->load->model('ModeloList/listatipo');
		$formas = $this->listatipo->getByCampo('hora_entrega');
		$html = "<div class=\"form-group\">
							<label  for=\"InputHoraEntrega\">Horário do Envento</label>
							<select name=\"hora_entrega\" class=\"form-control form-control-lg\" id=\"InputHoraEntrega\" required>
								<option disabled selected>Selecione o Horários de Entrega:</option>";
		foreach($formas as $forma){
			$html .=	"<option>{$forma->descricao}</option>";
		}
		$html .= "</select>
					</div>";
		return $html;
	}
	
	public function getFormPagto(){
		//$this->load->model('ModeloList/listatipo');
		$formas = $this->listatipo->getByCampo('forma_pgto');
		$html = "";
		foreach($formas as $forma){
			$html .=	"<div class=\"form-check form-check-inline\">
					<label>
						<input class=\"form-check-input\" type=\"radio\" name=\"forma_pgto\" value=\"{$forma->tipo}\"> {$forma->descricao}
					</label>
				</div>";
		}
		return $html;
	}
	
	public function deletarByProduto(){
		if ($this->session->userdata('id_session')){
	        $this->load->model('Modelo/cart');
	        if ($this->cart->deleteByProduto($this->session->userdata('id_session'), $_POST['id_produto']))
	        	echo 'success';
	        echo 'error';
    	}
    }

	public function getCartBySession($id_session = '') {
		$this->load->model('ModeloList/listacarts');
        $CartsAtual = $this->listacarts->getCartBySession($id_session);
        $i = 0;
        $total = 0;
		$html = "<div class='row'> ";
		if (isset($CartsAtual)){
			foreach($CartsAtual as $Cart){
				$i++;
				$subtotal = number_format($Cart->qtde * $Cart->valor_unitario, 2, '.', '');
				$total = $total + $subtotal;
				$Cart->id_produto[0]->imagem = base_url("/assets/img/{$Cart->id_produto[0]->imagem}");
				$html .= "<div class='col-3 col-md-2 col-sm-2 pr-3 pb-3 img-prd'> " .
			   		     "  <img class='tam-img-prod tam-img-prod-md tam-img-prod-sm' src='{$Cart->id_produto[0]->imagem}' />" .
			   		     "</div> " .
			   		     "<div class='col-7 col-md-10 col-sm-6 align-self-center pl-3 pb-3'> " .
			   		     "  <div class='row texto-esquerdo text-center'> " .
			   		     "    <div class='col-12 col-md-4 col-sm-12 texto-esquerda'> " .
						 "      <h5 class='card-title'>{$Cart->id_produto[0]->nome}</h5>" .
						 "    </div> " .
						 "    <div class='col-12 col-md-2 col-sm-12'> " .
						 "        <p class='card-text' id='preco$i'>R$ {$Cart->valor_unitario}</p> " .
						 "    </div> " .
						 "    <div class='col-12 col-md-2 col-sm-12'> " .
						 "        <p class='card-text' id='qtde$i'>R$ {$Cart->qtde}</p> " .
						 "    </div> " .
						 "    <div class='col-12 col-md-2 col-sm-12'> " .
						 "        <p class='card-text' id='subtotal$i'>R$ {$subtotal}</p> " .
						 "    </div> " .
						 "    <div class='col-12 col-md-2 col-sm-12'> " .
						 "      <form method='post' action='' id='formCartDel'>" .
						 "        <input type='hidden' name='id_produto' value='{$Cart->id_produto[0]->id_produto}'> " .
						 "        <input type='hidden' name='valor_subtotal' id='valor_subtotal' value='{$subtotal}'> " .
						 "        <p><button type='submit' class='nbtn' id='cart' id='cartDel'>X</button></p> " .
						 "      </form>" .
						 "    </div> " .
						 "  </div> " .
						 "</div> ";
			}
		}
		$total = number_format($total + 3, 2, '.', '');
		$i++;
		return $html . "</div> " .
					   "<div class='row'> " .
        			   "  <div class='col-auto ml-auto'> " .
        	           "    <p class='card-text'>Taxa de Entrega R$ 3.00</p> " .
        			   "  </div> " .
        			   "  <div class='col-12 col-md-2 col-sm-12' style='border-color: #F3F3F4;'>" .
      				   "  </div> " .
      				   "</div> " .
					   "<hr class='mb-3 mt-1'>" .
      				   "<div class='row'> " .
        			   "  <div class='col-auto ml-auto'> " .
        			   "    <p id='forTotal' style='display:none;'>$i</p> " .
        	           "    <h5 id='valor_total'>Total: {$total}</h5> " .
        			   "  </div> " .
        			   "  <div class='col-12 col-md-2 col-sm-12' style='border-color: #F3F3F4;'>" .
      				   "  </div> " .
      				   "</div> ";
	}
	
	public function countBySession(){
		$this->load->model('ModeloList/listacarts');
		$result = $this->listacarts->getCartBySession($this->session->userdata('id_session'));
		echo count($result);
	}

	public function finalizar(){
		if ($this->session->userdata('id_session')) {
			$id_session = $this->session->userdata('id_session');
			$this->load->model('ModeloList/listacarts');
			$situcao_cart = $this->listacarts->getCartSituacao($id_session);
			$hora_entrega = $_POST['hora_entrega'];
			$forma_pgto = $_POST['forma_pgto'];
			
			if ($situcao_cart->situacao == 'a'){
				$festa = (isset($_POST['festa']) && $_POST['festa'] = 'on') ? 's' : 'n';

				$this->load->model('ModeloList/listaclientes');
        $cli = $this->listaclientes->getByEmail($this->input->post('email'));
        if (empty($cli)){
          $this->load->model('Modelo/cliente');
          $id_cliente = $this->cliente->insert();
          $nome = $this->session->userdata('nome_cliente');
        } else {
          $id_cliente = $cli->id_cliente;
          $nome = $cli->nome;
        }

        $this->load->model('Modelo/cart');
        $id_pedido = $this->cart->insertCartToPedido($id_cliente, $id_session, $festa, $hora_entrega, $forma_pgto);
        if ($festa == "s") {
          $this->load->model('Modelo/evento');
          $this->evento->id_pedido = $id_pedido;
          $this->evento->id_cliente = $id_cliente;
          $this->evento->insert();
        }

				$this->cart->updataSitucao($id_session);

				$this->data['nome_cliente'] = $nome;
				$this->data['mensagem'] = "Seu pedido foi recebido com sucesso!<br>Agradecemos a sua preferência. Em breve faremos a entrega do seu pedido.";
				$this->load->view('fim_html', $this->data);
        $this->enviarPedidoPorEmail();
			} else {
				$this->data['nome_cliente'] = "";
				$this->data['mensagem'] = "Pedido esta finalizado!";
				$this->load->view('fim_html', $this->data);
			}
		} else {
			$this->data['nome_cliente'] = "";
			$this->data['mensagem'] = "Sessão foi finalizada!";
			$this->load->view('fim_html', $this->data);
		}
		
		$this->session->unset_userdata('id_session');
		$this->session->unset_userdata('nome_cliente');
	}

  private function enviarPedidoPorEmail(){
    $this->load->library('email');
    $this->email
      ->from('pedido@mistersalgadinhos.com.br', 'Mister Salgadinhos')
      ->to('matheusnarciso@hotmail.com, engrmachado@gmail.com')
      ->subject("Mister Salgadinhos - Pedido realizado.")
      ->message("<!DOCTYPE html>
                 <html lang=\"pt-br\">
                 <header></header>
                 <body>
                 <p>Vocês tem um novo pedido realizado. <br> Acesse o
                    <a href=\" ".base_url("Admin/Login")."\" target=\"_blank\">Administrador</a>
                 </p>
                 </body>
                 </html>")
      ->send();
  }
}
