<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listacategoriasproduto.php");

class Produto extends MY_Model {

    public $id_produto;
    public $nome;
    public $id_categoria;
    public $situacao;
    public $imagem;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_produto = null;
        if ($this->db->insert('produto', $this))
            $this->id_produto = $this->db->insert_id();
        if (empty($this->id_produto))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('produto', $this, array('id_produto' => $this->id_produto));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Altera��o conclu�da com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('produto', $this, array('id_produto' => $this->id_produto));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
        $this->id_categoria = $this->get_categoria();
    }

    private function get_categoria(){
        $ListaCategoriasProduto = new ListaCategoriasProduto();
        return $ListaCategoriasProduto->get($this->id_categoria);
    }

}
