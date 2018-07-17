<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaprodutos.php");
require_once(APPPATH."models/ModeloList/Listacidades.php");

class Movimentacao_estoque extends MY_Model {

    public $id_movimentacao_estoque;
    public $id_loja;
    public $id_produto;
    public $tipo_movimentacao;
    public $qtde_movimentacao;
    public $data_movimentacao;
    public $id_item_pedido;

  public function get_config_prop(){

  }

  public function insert(){}
  public function update(){}
  public function delete(){}

  public function gerarMovimentacao($id_cidade){
    
  	$this->id_loja = $id_cidade == 1 ? 1 : 2;
  	$this->data_movimentacao = date("Y-m-d H:i:s");
  	$data = array(
        'id_loja' => $this->id_loja,
        'id_produto' => $this->id_produto,
        'tipo_movimentacao' => $this->tipo_movimentacao,
        'data_movimentacao' => $this->data_movimentacao,
        'qtde_movimentacao' => $this->qtde_movimentacao,
        'id_item_pedido' => $this->id_item_pedido
	  );

  	$this->db->insert('tbl_movimentacao_estoque', $data);

  	$this->geraEstoque();

  	$this->geraFichaKardex();
  }

  private function geraFichaKardex(){
  	$data = array(
          'id_loja' => $this->id_loja,
          'id_produto' => $this->id_produto,
          'tipo_movimentacao' => $this->tipo_movimentacao,
          'origem_movimentacao' => 'ps',
          'data_movimentacao' => $this->data_movimentacao,
          'qtde_movimentacao' => $this->qtde_movimentacao
  	);

  	$this->db->insert('tbl_ficha_kardex', $data);
  }

  private function geraEstoque(){
  	$query = $this->db->get_where('tbl_estoque', array('id_loja' => $this->id_loja, 'id_produto' => $this->id_produto));
  	
  	$qtde_movimentacao = $this->tipo_movimentacao === 's' ? ($this->qtde_movimentacao*-1) : $this->qtde_movimentacao;

    if(empty($query->row())){
  		$data = array(
  	        'id_loja' => $this->id_loja,
  	        'id_produto' => $this->id_produto,
  	        'qtde_total' => $qtde_movimentacao
  		);		    

    	$this->db->insert('tbl_estoque', $data);
    } else {
  		$this->db->set('qtde_total', 'qtde_total+'.$qtde_movimentacao, FALSE);
  		$this->db->where(array('id_loja' => $this->id_loja,'id_produto' => $this->id_produto,));
    	$this->db->update('tbl_estoque');
    }
  }
}
