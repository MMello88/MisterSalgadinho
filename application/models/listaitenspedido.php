<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("item_pedido.php");
 
class ListaItenspedido extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_item_pedido = '') {
        $query = $this->_instance->db->get_where('item_pedido', array('id_item_pedido' => $id_item_pedido));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'item_pedido');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('item_pedido');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('item_pedido');
    }

    public function getItem_pedidoByPedido($id_pedido = '') {
        $query = $this->_instance->db->get_where('item_pedido', array('id_pedido' => $id_pedido));
        return $query->custom_row_object(0, 'item_pedido');
    }

    public function getItem_pedidoByProduto($id_produto = '') {
        $query = $this->_instance->db->get_where('item_pedido', array('id_produto' => $id_produto));
        return $query->custom_row_object(0, 'item_pedido');
    }
}
