<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaprodutos.php");
require_once(APPPATH."models/ModeloList/Listacidades.php");

class Cart extends MY_Model {

    public $id_cart;
    public $id_session;
    public $id_produto;
    public $id_cidade;
    public $qtde;
    public $valor_unitario;
    public $situacao;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_cart = null;
        if ($this->db->insert('cart', $this))
            $this->id_cart = $this->db->insert_id();
        if (empty($this->id_cart))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->db->update('cart', $this, array('id_cart' => $this->id_cart));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->db->delete('cart', array('id_cart' => $this->id_cart));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    public function deleteByProduto($id_session, $id_produto) {
        $this->db->delete('cart', array('id_session' => $id_session, 'id_produto' => $id_produto));
        if ($this->db->error()['code'] > 0) {
          $this->set_log_error_db();
          return false;
        }
        return true;
    }

    public function updateBySituacao($id_sessin, $situacao) {
        $this->db->update('cart', $this, array('id_cart' => $this->id_cart));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function insertEvento($id_pedido, $id_cliente, $data_evento, $end_evento){
      $sql = "INSERT INTO tbl_evento (id_evento, id_cliente, id_pedido, data_evento, end_evento) " .
             " VALUES (NULL, ?, ?, ?, ?) ";
      $this->db->query($sql, array($id_cliente, $id_pedido, $data_evento, $end_evento));
      return $this->db->insert_id();
    }

    public function insertCartToPedido($id_cliente, $id_session, $festa, $hora_entrega, $forma_pgto, $data_entrega){
        $sql = "INSERT INTO tbl_pedido (id_pedido, id_cliente, id_cidade, data_pedido, valor, taxa_entrega, valor_total, situacao, festa, hora_entrega, forma_pgto, data_entrega) " .
               "select null id_cart,        " .
               "       ? id_cliente,        " .
               "       id_cidade,           " .
               "       now() data_pedido,   " .
               "       (sum(qtde) * valor_unitario) valor, " .
               "       '3.00' taxa_entrega, " .
               "       ((SUM(qtde) * valor_unitario) + 3) as valor_total, " .
               "       's' as situacao,     " .
               "       ? as festa,          " .
							 "       ? as hora_entrega,   " .
							 "       ? as forma_pgto,     " .
               "       ? as data_entrega     " .
               "  from tbl_cart             " .
               " where id_session = ?       " .
               "   and situacao = 'a'       " ;
         $this->db->query($sql, array($id_cliente, $festa, $hora_entrega, $forma_pgto, $data_entrega, $id_session));
         $id_pedido = $this->db->insert_id();

         $sql = "INSERT INTO tbl_item_pedido (id_item_pedido, id_pedido, id_produto, qtde, valor_unitario)" .
                " select null id_item_pedido, " .
                "        ? id_pedido,         " .
                "        id_produto,          " .
                "        sum(qtde) qtde,      " .
                "        valor_unitario       " .
                "   from tbl_cart             " .
                " where id_session = ?        " .
                "   and situacao = 'a'        " .
                " group by id_session,        " .
                "          id_produto,        " .
                "          valor_unitario     " ;
        $this->db->query($sql, array($id_pedido, $id_session));
        return $id_pedido;
    }

    public function updataSitucao($id_session){
        $sql = "UPDATE tbl_cart SET situacao = 'd' WHERE id_session = ?";
        $this->db->query($sql, array($id_session));
    }

    protected function get_config_prop(){
  		if (!$_POST)
  			$this->id_produto = $this->get_produto();
    }

    protected function valida_form(){
        return true;//$this->form_validation->run('pedidos/realizar');
    }

    private function get_produto(){
        $ListaProdutos = new ListaProdutos();
        return $ListaProdutos->get($this->id_produto);
    }

    private function get_cidade(){
        $ListaCidades = new ListaCidades();
        return $ListaCidades->get($this->id_cidade);
    }

    private function error(){
        $this->form_validation->error('field_name');
    }
}
