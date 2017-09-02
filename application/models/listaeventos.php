<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("Evento.php");
 
class Listaeventos extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_evento = '') {
        $query = $this->_instance->db->get_where('evento', array('id_evento' => $id_evento));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'evento');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('evento');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('evento');
    }

    public function getEventoByCliente($id_cliente = '') {
        $query = $this->_instance->db->get_where('evento', array('id_cliente' => $id_cliente));
        return $query->custom_row_object(0, 'evento');
    }

    public function getEventoByPedido($id_pedido = '') {
        $query = $this->_instance->db->get_where('evento', array('id_pedido' => $id_pedido));
        return $query->custom_row_object(0, 'evento');
    }
}
