<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Categoria_produto.php");
 
class Listacidadecategoria extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cidade_categoria = '') {
        $query = $this->db->get_where('cidade_categoria', array('id_cidade_categoria' => $id_cidade_categoria));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade_categoria');
    }
 
    public function get_all(){
        $query = $this->db->get_where('cidade_categoria');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cidade_categoria');
    }
}
