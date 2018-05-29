<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Representante_cliente.php");
 
class Listarepresentantecliente extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cliente_represent = '') {
        $query = $this->_instance->db->get_where('representante_cliente', array('id_cliente_represent' => $id_cliente_represent));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('representante_cliente');
    }
}