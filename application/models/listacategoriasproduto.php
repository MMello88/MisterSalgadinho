<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("Categoria_produto.php");
 
class Listacategoriasproduto extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_categoria_produto = '') {
        $query = $this->_instance->db->get_where('categoria_produto', array('id_categoria_produto' => $id_categoria_produto));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria_produto');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('categoria_produto');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria_produto');
    }
}
