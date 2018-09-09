<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Endereco.php");
 
class Listaenderecos extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_endereco = '') {
        $query = $this->db
            ->join('tbl_cidade', 'tbl_cidade.id_cidade = tbl_endereco.id_cidade')
            ->get_where('endereco', array('id_endereco' => $id_endereco));
        if (empty($query))
            $this->set_log_error_db();
        $result = $query->result_object();
        return empty($result) ? "" : $result[0];
    }
 
    public function get_all(){
        $query = $this->db->get('endereco');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('endereco');
    }

    public function getByCliente($id_cliente) {
        $query = $this->db
            ->join('tbl_cidade', 'tbl_cidade.id_cidade = tbl_endereco.id_cidade')
            ->get_where('endereco', array('id_cliente' => $id_cliente));
        if (empty($query))
            $this->set_log_error_db();
        $result = $query->result_object();       
        return $result;
    }

    public function getEndPrincipalByCliente($id_cliente) {
        $query = $this->db
            ->join('tbl_cidade', 'tbl_cidade.id_cidade = tbl_endereco.id_cidade')
            ->get_where('endereco', array('id_cliente' => $id_cliente, 'principal' => 's'));
        if (empty($query))
            $this->set_log_error_db();
        $result = $query->custom_result_object('endereco');       
        return  empty($result) ? new Endereco : $result[0];
    }
}
