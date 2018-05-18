<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaprodutos.php");

class Valor_produto extends MY_Model {

    public $id_valor_produto;
    public $id_produto;
    public $data_atualizacao;
    public $preco;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_valor_produto = null;
        if ($this->db->insert('valor_produto', $this))
            $this->id_valor_produto = $this->db->insert_id();
        if (empty($this->id_valor_produto))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('valor_produto', $this, array('id_valor_produto' => $this->id_valor_produto));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('valor_produto', $this, array('id_valor_produto' => $this->id_valor_produto));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
        $this->id_produto = $this->get_produto();
    }

    private function get_produto(){
        $ListaProdutos = new ListaProdutos();
        return $ListaProdutos->get($this->id_produto);
    }
}
