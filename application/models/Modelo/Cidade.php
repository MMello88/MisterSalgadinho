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
        $this->set_post($this);
        $this->id_cidade = null;
        if ($this->db->insert('cidade', $this))
            $this->id_cidade = $this->db->insert_id();
        if (empty($this->id_cidade))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('cidade', $this, array('id_cidade' => $this->id_cidade));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Altera��o conclu�da com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('cidade', $this, array('id_cidade' => $this->id_cidade));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
    }

}
