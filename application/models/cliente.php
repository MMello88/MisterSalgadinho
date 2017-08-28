<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cliente extends MY_Model {

    public $id_cliente;
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $situacao;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_cliente = null;
		$this->situacao = 'a';
        if ($this->db->insert('cliente', $this))
            $this->id_cliente = $this->db->insert_id();
		$this->session->set_userdata('id_cliente', $this->id_cliente);
        if (empty($this->id_cliente))
          $this->set_log_error_db();
        $this->session->set_userdata('id_session', $this->nome);
        //$this->set_response_db('Incluido com sucesso'); //usar para rest json returno success
		return $this->id_cliente;
    }

    public function update() {
        $this->db->update('cliente', $this, array('id_cliente' => $this->id_cliente));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->db->delete('cliente', $this, array('id_cliente' => $this->id_cliente));
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
