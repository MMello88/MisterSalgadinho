<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitrine extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{	
		$this->load->view('includes/header_navbar_fixed_top', $this->data);
		$this->load->view('vitrine/index_promocional_html', $this->data);
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
			if ($this->removeCartBySession()) {
				$this->session->unset_userdata('id_session');
				$this->session->unset_userdata('cidade');
				echo 'Sucesso';
			} else {
				echo 'Sorry';
			}
		} else {
			echo 'Sorry';
		}
	}

	public function getListaCarrinho()
	{
		echo $this->getCartBySession();
	}

	public function getCartBySession() {
		$this->load->model('ModeloList/listacarts');
        $CartsAtual = $this->listacarts->getCartBySession($this->session->userdata('id_session'));
        $i = 0;
        $total = 0;
		
		if (!empty($CartsAtual)){
			$html = "<div class='container'> ";
			foreach($CartsAtual as $Cart){
				$i++;
				$subtotal = number_format($Cart->qtde * $Cart->valor_unitario, 2, '.', '');
				$total = number_format($total + $subtotal, 2, '.', '');
				$Cart->id_produto[0]->imagem = base_url("/assets/img/{$Cart->id_produto[0]->imagem}");
				$html .= "<div class='media mb-3' id='carrinho-{$Cart->id_cart}'>
							  <img class='mr-3' src='{$Cart->id_produto[0]->imagem}' alt='Generic placeholder image' style='width: 25%;'>
							  <div class='media-body'>
							    <div class='row'> 
							    	<div class='col-12 col-md-4 col-sm-12'>
										<h6 class='text-dark text-left'>{$Cart->id_produto[0]->nome}</h6>
								    	<h4 class='text-danger text-left'>R$ {$Cart->valor_unitario}</h4>
								    	<input type='hidden' id='valor-cart-{$Cart->id_cart}' value='{$Cart->valor_unitario}'>
							    	</div>
							    	<div class='col-12 col-md-6 col-sm-12'>
								    	<div class='input-group max-width'>
					                    	<button class='btn btn-warning' type='button' value='{$Cart->qtde}' id='btn-menos-submit' data-whatever='{$Cart->id_cart}'>-</button>
						                    <input type='number' min='0' name='qtde' id='qnt-cart-{$Cart->id_cart}' class='form-control bg-white text-center' maxlength='4' value='{$Cart->qtde}' readonly required>
					                    	<button class='btn btn-warning' type='button' value='{$Cart->qtde}' id='btn-mais-submit' data-whatever='{$Cart->id_cart}'>+</button>
				                    	</div>
				                    	<p class='card-text text-left' id='subtotal-{$Cart->id_cart}'>Sub Total: R$ {$subtotal}</p> 
			                    	</div>
						        	<div class='col-12 col-md-2 col-sm-12'>
							        	<form method='post' id='formCartDel'> 
							        		<input type='hidden' name='id_cart' value='{$Cart->id_cart}'>
								        	<input type='hidden' name='id_produto' value='{$Cart->id_produto[0]->id_produto}'> 
								        	<input type='hidden' name='valor_subtotal-{$Cart->id_cart}' value='{$subtotal}'> 
							        		<button type='submit' class='btn btn-warning btn-sm' id='cart' id='cartDel'>X</button>
							        	</form> 
						        	</div>
							    </div>
						    </div>
						</div>";
			}
			$i++;
			return $html . "</div> 
						   <hr class='mb-3 mt-1'>
	      				   <div class='row'> 
	        			     <div class='col-12 text-right'> 
	        			       <p id='forTotal' style='display:none;'>$i</p> 
	        	               <h4 id='valor_total'><strong>Total Pedido: {$total}</strong></h4>
	        			     </div> 
	        			     <!--<div class='col-12 text-left'> 
	        	               <p class='card-text text-right'><small>*TAXA DE ENTREGA SERÁ ACRESCENTADA AO FINALIZAR O PEDIDO.</small></p> 
	        	             </div>--> 
	      				   </div> ";
	    } else {
	    	return "";
	    }
	}

	private function removeCartBySession()
	{
		if ($this->session->userdata('id_session')){
	        $this->load->model('Modelo/cart');
	        return $this->cart->deleteCartBySession($this->session->userdata('id_session'));
    	} else {
    		return false;
    	}
	}

}