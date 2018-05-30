<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Cidade.php");
 
class Listacidades extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cidade = '') {
        $query = $this->db->get_where('cidade', array('id_cidade' => $id_cidade));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade');
    }

    public function getByLink($link = '') {
        $query = $this->db->get_where('cidade', array('link' => $link));
        if (empty($query))
            $this->set_log_error_db();
        $retorno = $query->custom_result_object('cidade');
		if (!empty($retorno))
			return $retorno[0];
		return null;
    }
 
    public function get_all(){
        $query = $this->db->get('cidade');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade');
    }
}
