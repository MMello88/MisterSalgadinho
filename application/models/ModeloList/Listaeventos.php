<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Evento.php");
 
class Listaeventos extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_evento = '') {
        $query = $this->db->get_where('evento', array('id_evento' => $id_evento));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'evento');
    }
 
    public function get_all(){
        $query = $this->db->get('evento');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('evento');
    }

    public function getEventoByCliente($id_cliente = '') {
        $query = $this->db->get_where('evento', array('id_cliente' => $id_cliente));
        return $query->custom_row_object(0, 'evento');
    }

    public function getEventoByPedido($id_pedido = '') {
        $query = $this->db->get_where('evento', array('id_pedido' => $id_pedido));
        return $query->custom_row_object(0, 'evento');
    }
}
