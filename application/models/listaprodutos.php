<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("produto.php");
 
class Listaprodutos extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_produto = '') {
        $query = $this->_instance->db->get_where('produto', array('id_produto' => $id_produto));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('produto');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('produto');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('produto');
    }

    public function getProdutoByCategoria_produto($id_categoria_produto = '') {
        $query = $this->_instance->db->get_where('produto', array('id_categoria_produto' => $id_categoria_produto));
        return $query->custom_result_object('produto');
    }
}
