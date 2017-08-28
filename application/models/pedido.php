<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("listaClientes.php");


class Pedido extends MY_Model {

    public $id_pedido;
    public $id_cliente;
    public $id_cidade;
    public $data_pedido;
    public $valor;
    public $taxa_entrega;
    public $valor_total;
    public $situacao;
    public $festa;
    
    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_pedido = null;
        if ($this->db->insert('pedido', $this))
            $this->id_pedido = $this->db->insert_id();
        if (empty($this->id_pedido))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->db->update('pedido', $this, array('id_pedido' => $this->id_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Altera��o conclu�da com sucesso');
    }

    public function delete() {
        $this->db->delete('pedido', $this, array('id_pedido' => $this->id_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
        $this->id_cliente = $this->get_cliente();
        $this->id_cidade = $this->get_cidade();
        $this->id_orcamento = $this->get_orcamento();
        $this->id_servico = $this->get_servico();
    }

    protected function valida_form(){
        return true;//$this->form_validation->run('pedidos/realizar');
    }

    private function get_cliente(){
        $ListaClientes = new ListaClientes();
        return $ListaClientes->get($this->id_cliente);
    }

    private function error(){
        $this->form_validation->error('field_name');
    }
}
