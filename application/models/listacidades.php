<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("Cidade.php");
 
class Listacidades extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cidade = '') {
        $query = $this->_instance->db->get_where('cidade', array('id_cidade' => $id_cidade));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade');
    }

    public function getByLink($link = '') {
        $query = $this->_instance->db->get_where('cidade', array('link' => $link));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade')[0];
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('cidade');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade');
    }
}
