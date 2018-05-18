<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends MY_Model {

    public $id_cliente;
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $situacao;
    public $senha;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_cliente = null;
        $this->senha = do_hash($this->senha, 'md5');
        if ($this->db->insert('cliente', $this))
            return $this->db->insert_id();
        else
            return $this->db->error()['message'];
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('cliente', $this, array('id_cliente' => $this->id_cliente));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Altera��o conclu�da com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('cliente', $this, array('id_cliente' => $this->id_cliente));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
    }

}
