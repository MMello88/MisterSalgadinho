<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listacategoriasproduto.php");
require_once(APPPATH."models/ModeloList/Listacidades.php");

class Cidade_categoria extends MY_Model {

    public $id_cidade_categoria;
    public $id_cidade;
    public $id_categoria;   
    
    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_cidade_categoria = null;
        if ($this->db->insert('cidade_categoria', $this))
            $this->id_cidade_categoria = $this->db->insert_id();
        if (empty($this->id_cidade_categoria))
          return $this->db->error()['message'];
        return $this->id_cidade_categoria;
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('cidade_categoria', $this, array('id_cidade_categoria' => $this->id_cidade_categoria));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('cidade_categoria', $this, array('id_cidade_categoria' => $this->id_cidade_categoria));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    

    protected function get_config_prop(){
        $this->id_categoria = isset($this->id_categoria) ? $this->get_categoria() : "";
        $this->id_cidade  = isset($this->id_cidade)  ? $this->get_cidade()  : "";
    }

    private function get_cidade(){
        $Listacidades = new Listacidades();
        return $Listacidades->get($this->id_cidade);
    }

    private function get_categoria(){
        $Listacategoriasproduto = new Listacategoriasproduto();
        return $Listacategoriasproduto->get($this->id_cidade);
    }
}
