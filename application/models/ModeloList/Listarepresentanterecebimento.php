<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Representante_recebimento.php");
 
class Listarepresentanterecebimento extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_representante_recebimento = '') {
        $query = $this->db->get_where('representante_recebimento', array('id_representante_recebimento' => $id_representante_recebimento));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('representante_recebimento');
    }

    public function getRecebimentoByMes($id_cliente_represent, $mes){
    	$query = $this->db->get_where('representante_recebimento', array('id_cliente_represent' => $id_cliente_represent));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('representante_recebimento');	
    }
}