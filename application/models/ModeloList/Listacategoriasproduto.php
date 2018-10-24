<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Categoria.php");
 
class Listacategoriasproduto extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_categoria = '') {
        $query = $this->db->get_where('categoria', array('id_categoria' => $id_categoria, 'situacao' => 'a'));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria');
    }
 
    public function get_all($cidade = 'Vitrine', $ativo = 'a'){
        $query = $this->db->query(
            "SELECT cp.*
               FROM tbl_categoria cp
               LEFT JOIN tbl_cidade_categoria cc ON (cp.id_categoria = cc.id_categoria)
               LEFT JOIN tbl_cidade c ON (c.id_cidade = cc.id_cidade)
              WHERE cp.situacao = '$ativo'
                AND (('$cidade' = c.nome) OR (c.id_cidade = '$cidade'))");
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('categoria');
    }
}
