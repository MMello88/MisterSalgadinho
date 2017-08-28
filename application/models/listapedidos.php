<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("pedido.php");
 
class ListaPedidos extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_pedido = '') {
        $query = $this->_instance->db->get_where('pedido', array('id_pedido' => $id_pedido));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'pedido');
        return $query->custom_row_object(0, 'pedido');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('pedido');
        $query = $this->_instance->db->get('pedido');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('pedido');
        return $query->custom_result_object('pedido');
    }

    public function getPedidoByCliente($id_cliente = '') {
        $query = $this->_instance->db->get_where('pedido', array('id_cliente' => $id_cliente));
        return $query->custom_row_object(0, 'pedido');
    }

    public function getPedidoByOrcamento($id_orcamento = '') {
        $query = $this->_instance->db->get_where('pedido', array('id_orcamento' => $id_orcamento));
        return $query->custom_row_object(0, 'pedido');
    }

    public function getPedidoByServico($id_servico = '') {
        $query = $this->_instance->db->get_where('pedido', array('id_servico' => $id_servico));
        return $query->custom_row_object(0, 'pedido');
    }
}
