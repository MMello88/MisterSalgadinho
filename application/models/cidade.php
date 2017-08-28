<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cidade extends MY_Model {

    public $id_cidade;
    public $nome;
    public $uf;
    public $link;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_cidade = null;
        if ($this->db->insert('cidade', $this))
            $this->id_cidade = $this->db->insert_id();
        if (empty($this->id_cidade))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->db->update('cidade', $this, array('id_cidade' => $this->id_cidade));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->db->delete('cidade', $this, array('id_cidade' => $this->id_cidade));
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
