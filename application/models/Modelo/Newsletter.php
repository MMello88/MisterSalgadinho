<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends MY_Model {

    public $id_newsletter;
    public $email;
    public $nome;
    public $telefone;
    public $data_criacao;
    public $data_atualizacao;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_newsletter = null;
        if ($this->db->insert('newsletter', $this))
            $this->id_newsletter = $this->db->insert_id();
        if (empty($this->id_newsletter))
          $this->set_log_error_db();
        //$this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('newsletter', $this, array('id_newsletter' => $this->id_newsletter));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('newsletter', $this, array('id_newsletter' => $this->id_newsletter));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
    }
}
