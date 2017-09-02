<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {


	public function index($cidade)
	{
		$this->session->set_userdata('id_cidade', $this->getIdCidade($cidade));
		if (!$this->session->userdata('id_session')){
			$this->session->set_userdata('id_session', md5(date("Y-m-d H:i:s")));
		}
		$showInfoModal = "false";
		if (!$this->session->userdata('infoModal')){
			$this->session->set_userdata('infoModal', 'true');
			$showInfoModal = "true";
		}
		$this->data["view_produtos"] = $this->monta_view_produtos();
		$this->data["showInfoModal"] = $showInfoModal;
		$this->load->view('shop_html', $this->data);
	}
	
	private function monta_view_produtos(){
		$this->load->model('listacategoriasproduto');
        $CategoriasProduto = $this->listacategoriasproduto->get_all();
		$html = "";
		foreach($CategoriasProduto as $CategoriaProduto){
			$html .= "<h2 class='mt-4'>$CategoriaProduto->nome</h2> " . 
					 "<hr class='mb-3 mt-1'> " .
				     "<div class='row'> " .
			         $this->monta_view_produto($CategoriaProduto->id_categoria_produto) .
			         "</div> ";
		}
		return $html;
	}

	private function monta_view_produto($id_categoria_produto){
		$this->load->model('listaprodutos');
        $Produtos = $this->listaprodutos->getProdutoByCategoria_produto($id_categoria_produto);
		$html = "";
		foreach($Produtos as $Produto)
			$html .= $this->getHtmlCardProduto($Produto);
		return $html;
	}
	
	private function getHtmlCardProduto($Produto){
		$id_session = $this->session->userdata('id_session');
		$id_cidade = $this->session->userdata('id_cidade');
		$this->load->model('listavaloresproduto');
		$ValorProduto = $this->listavaloresproduto->getValor_produtoByProduto($Produto->id_produto)[0];
		$Produto->imagem = base_url("/assets/img/$Produto->imagem");
		return "<div class='col-12 col-md-3 col-sm-6 px-3 pb-3'> " .
			   "  <div class='border rounded'> " .
			   "    <img class='card-img-top' src='$Produto->imagem' alt='$Produto->nome' />" .
			   "    <div class='card-body' style='height: 270px;'>" .
			   "      <form method='post' action='' id='formCart'>" .
			   "        <h5 class='card-title'>$Produto->nome</h5>" .
			   "        <p class='card-text'>Valor Unitário <b>$ValorProduto->preco R$</b></p>" .
			   "        <input type='hidden' name='id_produto' value='$Produto->id_produto'> " .
			   "        <input type='hidden' name='id_session' value='$id_session'> " .
			   "        <input type='hidden' name='valor_unitario' value='$ValorProduto->preco'> " .
			   "        <input type='hidden' name='id_cidade' value='$id_cidade'> " .
			   "        <input type='hidden' name='situacao' value='a'> " .
			   "        <input type='number' name='qtde' min='0' class='form-control' id='InputQtde' placeholder='Quantidade' required> " .
			   "        <br/> ".
			   "        <p><button type='submit' class='nbtn' id='cart'>Adicionar</button></p> " .
			   "      </form>" .
			   "    </div> " .
			   "    <div class='card-footer'> " .
			   "       <small class='text-muted'>Produto sobre verificação em estoque!</small> " .
			   "    </div> " .
			   "  </div> " .
			   "</div> " ;
	}

	private function getIdCidade($cidade){
		$this->load->model('listacidades');
		$row = $this->listacidades->getByLink($cidade);
		return $row->id_cidade;
	}
}