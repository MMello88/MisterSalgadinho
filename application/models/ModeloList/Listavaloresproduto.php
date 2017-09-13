<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Valor_produto.php");
 
class Listavaloresproduto extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_valor_produto = '') {
        $query = $this->_instance->db->get_where('valor_produto', array('id_valor_produto' => $id_valor_produto));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('valor_produto');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('valor_produto');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('valor_produto');
    }

    public function getValor_produtoByProduto($id_produto = '') {
        $this->_instance->db->select_max('data_atualizacao');
        $query1 = $this->_instance->db->get_where('valor_produto', array('id_produto' => $id_produto));
        $valor_produto = $query1->custom_result_object('valor_produto')[0];
        $query = $this->_instance->db->get_where('valor_produto', array('id_produto' => $id_produto, 'data_atualizacao' => $valor_produto->data_atualizacao));
        return $query->custom_result_object('valor_produto');
    }
}
