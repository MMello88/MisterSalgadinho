<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Representante_cliente.php");
 
class Listarepresentantecliente extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cliente_represent = '') {
        $query = $this->db->get_where('representante_cliente', array('id_cliente_represent' => $id_cliente_represent));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('representante_cliente');
    }

    public function getRepresentanteByCliente($id_cliente_cliente){
    	$query = $this->db->get_where('representante_cliente', array('id_cliente_cliente' => $id_cliente_cliente));
        if (empty($query))
            $this->set_log_error_db();
        $result = $query->custom_result_object('representante_cliente');
        return empty($result) ? "" : $result[0];
    }

    public function getClienteRepresentante($id_cliente_represent, $value){
        $Sql = "SELECT c.*
                  FROM tbl_representante_cliente r
                  LEFT JOIN tbl_cliente c ON (c.id_cliente = r.id_cliente_cliente)
                 WHERE r.id_cliente_represent = $id_cliente_represent";
        if (!empty($value)){
            if (is_numeric($value))
                $Sql .= " AND c.cpf_cnpj = $value";
            else
                $Sql .= " AND c.nome LIKE '%$value%'";
        }
        $query = $this->db->query($Sql);
        return $query->custom_result_object('cliente');
    }
}