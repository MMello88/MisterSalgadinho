<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("cliente.php");
 
class ListaClientes extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cliente = '') {
        $query = $this->_instance->db->get_where('cliente', array('id_cliente' => $id_cliente));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cliente')[0];
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('cliente');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cliente');
    }

    public function getByEmail($email = '') {
        $query = $this->_instance->db->get_where('cliente', array('email' => $email));
        if (empty($query))
            $this->set_log_error_db();
        $result = $query->custom_result_object('cliente');
        return empty($result) ? "" : $result[0];
    }
}
