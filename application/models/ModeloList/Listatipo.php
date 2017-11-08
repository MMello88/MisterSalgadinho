<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Tipo.php");
 
class Listatipo extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_Tipo = '') {
        $query = $this->_instance->db->get_where('Tipo', array('id_Tipo' => $id_Tipo));
        if (empty($query))
            $this->set_log_error_db();
        $result = $query->custom_result_object('Tipo');
        return empty($result) ? "" : $result[0];
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('Tipo');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('Tipo');
    }

    public function getByCampo($campo = '') {
        $query = $this->_instance->db->get_where('Tipo', array('campo' => $campo));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('Tipo');
    }
}
