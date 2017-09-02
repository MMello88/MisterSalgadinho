<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("Listapedidos.php");
require_once("Listaprodutos.php");

class Item_pedido extends MY_Model {

    public $id_item_pedido;
    public $id_pedido;
    public $id_produto;
    public $qtde;
    public $valor_unitario;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_item_pedido = null;
        if ($this->db->insert('item_pedido', $this))
            $this->id_item_pedido = $this->db->insert_id();
        if (empty($this->id_item_pedido))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->db->update('item_pedido', $this, array('id_item_pedido' => $this->id_item_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->db->delete('item_pedido', $this, array('id_item_pedido' => $this->id_item_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
        $this->id_pedido = $this->get_pedgeto();
        $this->id_produto = $this->get_produto();
    }

    protected function valida_form(){
        return true;//$this->form_validation->run('pedidos/realizar');
    }

    private function get_pedgeto(){
        $ListaPedidos = new ListaPedidos();
        return $ListaPedidos->get($this->id_pedido);
    }

    private function get_produto(){
        $ListaProdutos = new ListaProdutos();
        return $ListaProdutos->get($this->id_produto);
    }

    private function error(){
        $this->form_validation->error('field_name');
    }
}
