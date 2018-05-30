<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Categoria_produto.php");
 
class Listacategoriasproduto extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_categoria_produto = '') {
        $query = $this->db->get_where('categoria_produto', array('id_categoria_produto' => $id_categoria_produto, 'situacao' => 'a'));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria_produto');
    }
 
    public function get_all($ativo = 'a'){
        $query = $this->db->get_where('categoria_produto', array('situacao' => $ativo));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria_produto');
    }
}
