<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categoria extends MY_Model {

    public $id_categoria;
    public $nome;
    public $situacao;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_categoria = null;
        if ($this->db->insert('categoria', $this))
            $this->id_categoria = $this->db->insert_id();
        if (empty($this->id_categoria))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('categoria', $this, array('id_categoria' => $this->id_categoria));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('categoria', $this, array('id_categoria' => $this->id_categoria));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
    }

}
