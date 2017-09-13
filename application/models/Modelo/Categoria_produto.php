<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categoria_produto extends MY_Model {

    public $id_categoria_produto;
    public $nome;
    public $situacao;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_categoria_produto = null;
        if ($this->db->insert('categoria_produto', $this))
            $this->id_categoria_produto = $this->db->insert_id();
        if (empty($this->id_categoria_produto))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->db->update('categoria_produto', $this, array('id_categoria_produto' => $this->id_categoria_produto));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->db->delete('categoria_produto', $this, array('id_categoria_produto' => $this->id_categoria_produto));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
    }

    protected function valida_form(){
        return true;//$this->form_validation->run('pedidos/realizar');
    }

    private function error(){
        $this->form_validation->error('field_name');
    }
}
