<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaclientes.php");

class Pedido extends MY_Model {

    public $id_pedido;
    public $id_cliente;
    public $id_cidade;
    public $data_pedido;
    public $valor;
    public $taxa_entrega;
	public $hora_entrega;
    public $data_entrega;
    public $valor_total;
    public $situacao;
    public $festa;
    
    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_pedido = null;
        if ($this->db->insert('pedido', $this))
            $this->id_pedido = $this->db->insert_id();
        if (empty($this->id_pedido))
          $this->set_log_error_db();
        $this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('pedido', $this, array('id_pedido' => $this->id_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function update_situacao(){
        $this->db->set('situacao', $this->situacao);
        $this->db->where('id_pedido', $this->id_pedido);
        $result = $this->db->update('tbl_pedido');
        print_r($result);
        return $result;
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('pedido', $this, array('id_pedido' => $this->id_pedido));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    protected function get_config_prop(){
        $this->id_cliente = isset($this->id_cliente) ? $this->get_cliente() : "";
        $this->id_cidade  = isset($this->id_cidade)  ? $this->get_cidade()  : "";
    }

    private function get_cliente(){
        $ListaClientes = new ListaClientes();
        return $ListaClientes->get($this->id_cliente);
    }
}
