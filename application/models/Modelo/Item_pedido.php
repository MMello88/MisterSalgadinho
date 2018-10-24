<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listapedidos.php");
require_once(APPPATH."models/ModeloList/Listaprodutos.php");

class Item_pedido extends MY_Model {

    public $id_item_pedido;
    public $id_pedido;
    public $id_produto;
    public $id_categoria;
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
          return $this->db->error()['message'];
        return $this->db->insert_id();
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('item_pedido', $this, array('id_item_pedido' => $this->id_item_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('item_pedido', $this, array('id_item_pedido' => $this->id_item_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
        $this->id_pedido = $this->get_pedgeto();
        $this->id_produto = $this->get_produto();
    }

    private function get_pedgeto(){
        $ListaPedidos = new ListaPedidos();
        return $ListaPedidos->get($this->id_pedido);
    }

    private function get_produto(){
        $ListaProdutos = new ListaProdutos();
        return $ListaProdutos->get($this->id_produto);
    }
}
