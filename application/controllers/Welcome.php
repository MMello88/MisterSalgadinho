<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		if (!$this->session->userdata('id_session')){
			$this->session->set_userdata('id_session', md5(date("Y-m-d H:i:s")));
		}
		
		$this->data["view_produtos"] = $this->monta_view_produtos();
		$this->load->view('index_html', $this->data);
	}
	
	private function monta_view_produtos(){
		$this->load->model('ListaCategoriasProduto');
        $CategoriasProduto = $this->ListaCategoriasProduto->get_all();
		$html = "<div class='row'>";
		foreach($CategoriasProduto as $CategoriaProduto){
			$html .= "<h1>$CategoriaProduto->nome</h1>";
			$html .= $this->monta_view_produto($CategoriaProduto->id_categoria_produto);
		}
		$html .= "</div>";
		return $html;
	}
	
	private function monta_view_produto($id_categoria_produto){
		$id_session = $this->session->userdata('id_session');
		$id_cidade = $this->session->userdata('id_cidade');
		$this->load->model('ListaProdutos');
		$this->load->model('ListaValoresProduto');
        $Produtos = $this->ListaProdutos->getProdutoByCategoria_produto($id_categoria_produto);
        $html = "";
		foreach($Produtos as $Produto)
		{
			$ValorProduto = $this->ListaValoresProduto->getValor_produtoByProduto($Produto->id_produto)[0];
		  	$html .= "<div class='col-lg-4'> " .
					 "<form method='post' action='' id='formCart'>" .
			         "  <img class='img-circle' src='$Produto->imagem' alt='Generic placeholder image' width='140' height='140'> " .
			         "  <h2>$Produto->nome</h2> " .
			         "  <p>$ValorProduto->preco</p> " .
					 "  <input type='hidden' name='id_produto' value='$Produto->id_produto'> " .
					 "  <input type='hidden' name='id_session' value='$id_session'> " .
					 "  <input type='hidden' name='valor_unitario' value='$ValorProduto->preco'> " .
					 "  <input type='hidden' name='id_cidade' value='$id_cidade'> " .
					 "  <input type='hidden' name='situacao' value='a'> " .
					 "  <input type='number' name='qtde' class='form-control' id='InputQtde' placeholder='Quantidade' required> " .
			         "  <p><button type='submit' class='btn btn-default' id='cart'>Adicionar</button></p> " .
					 "</form>" .
			         "</div> ";
		}
		return $html;
	}
}