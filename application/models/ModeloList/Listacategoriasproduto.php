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
 
    public function get_all($cidade = 'Vitrine', $ativo = 'a'){
        $query = $this->db->query(
            "SELECT cp.*
               FROM tbl_categoria_produto cp
               LEFT JOIN tbl_cidade_categoria cc ON (cp.id_categoria_produto = cc.id_categoria_produto)
               LEFT JOIN tbl_cidade c ON (c.id_cidade = cc.id_cidade)
              WHERE cp.situacao = '$ativo'
                AND (('$cidade' = c.nome) OR (c.id_cidade = '$cidade'))");
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria_produto');
    }
}
