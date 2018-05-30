<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function index($cidade = '')
	{
		$this->session->set_userdata('link_cidade', $cidade);
		$this->session->set_userdata('id_cidade', $this->getIdCidade($cidade));
		if (!$this->session->userdata('id_session')){
			$this->session->set_userdata('id_session', md5(date("Y-m-d H:i:s")));
		}
		$showInfoModal = "false";
		if (!$this->session->userdata('infoModal')){
			$this->session->set_userdata('infoModal', 'true');
			$showInfoModal = "true";
		}
		
		$this->data['link_cidade'] = $cidade;
		$this->data["view_produtos"] = $this->monta_view_produtos();
		$this->data["showInfoModal"] = $showInfoModal;
		$this->load->view('shop_html', $this->data);
	}
	
	private function monta_view_produtos(){
    	$CategoriasProduto = $this->listacategoriasproduto->get_all();
		$html = "  <nav class='nav nav-tabs' id='myTab' role='tablist'> ";

    	$first = "active";
		foreach($CategoriasProduto as $CategoriaProduto){
      if ($CategoriaProduto->situacao == "a"){
        $link = $CategoriaProduto->id_categoria_produto;
        $html .= "    <a class='nav-item nav-link $first' id='nav-$link-tab' data-toggle='tab' href='#nav-$link' role='tab' aria-controls='nav-$link' aria-expanded='true'>$CategoriaProduto->nome</a> ";
        $first = "";
      }
		}
    
    $html .= "  </nav> " ;
    $html .= "<div class='tab-content' id='nav-tabContent' style='padding: 15px 15px 0 15px;'> " ;
    $first = "show active";
    foreach($CategoriasProduto as $CategoriaProduto){
      if ($CategoriaProduto->situacao == "a"){
        $link = $CategoriaProduto->id_categoria_produto;
        $html .= "  <div class='tab-pane fade $first' id='nav-$link' role='tabpanel' aria-labelledby='nav-$link-tab'> " .
                 "    <div class='row'> " .
                 $this->monta_view_produto($CategoriaProduto->id_categoria_produto) .
                 "    </div> " .
                 " </div> " ;
        $first = "";
      }
		}
    
		return $html. "</div> ";
	}

	private function monta_view_produto($id_categoria_produto){
    	$Produtos = $this->listaprodutos->getProdutoByCategoria_produto($id_categoria_produto);
		$html = "";
		foreach($Produtos as $Produto)
			$html .= $this->getHtmlCardProduto($Produto);
		return $html;
	}
	
	private function getHtmlCardProduto($Produto){
		$id_session = $this->session->userdata('id_session');
		$id_cidade = $this->session->userdata('id_cidade');
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
			   "       <small class='text-muted'>Salgadinho são do tamanho padrão de festa!</small> " .
			   "    </div> " .
			   "  </div> " .
			   "</div> " ;
	}

	private function getIdCidade($cidade){
	  if (!empty($cidade)) {
			$row = $this->listacidades->getByLink($cidade);
			if ($row === null)
				redirect(base_url("Shop/"));
			return $row->id_cidade;
		}
		return '';
	}
}