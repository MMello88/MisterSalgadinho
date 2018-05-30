<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaclientes.php");
require_once(APPPATH."models/ModeloList/Listapedidos.php");
require_once(APPPATH."models/ModeloList/Listarepresentantecliente.php");

class Representante_recebimento extends MY_Model {

    public $id_representante_recebimento;
    public $id_cliente_represent;
    public $id_pedido;
    public $data_pgto_pedido;
    public $valor_receber;
    public $recebido;
    public $situacao_pedido;
    
    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_representante_recebimento = null;
        if ($this->db->insert('representante_recebimento', $this))
            $this->id_representante_recebimento = $this->db->insert_id();
        if (empty($this->id_representante_recebimento))
          return $this->db->error()['message'];
        return $this->db->insert_id();
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('representante_recebimento', $this, array('id_representante_recebimento' => $this->id_representante_recebimento));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function update_situacao_finalizado(){
        $this->db->set('situacao_pedido', 'f');
        $this->db->where('id_representante_recebimento', $this->id_representante_recebimento);
        $result = $this->db->update('representante_recebimento');
        return $result;
    }

    public function update_situacao_recebido(){
        $this->db->set('recebido', 's');
        $this->db->where('id_representante_recebimento', $this->id_representante_recebimento);
        $result = $this->db->update('representante_recebimento');
        return $result;
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('representante_recebimento', $this, array('id_representante_recebimento' => $this->id_representante_recebimento));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }


    protected function get_config_prop(){
        $this->id_cliente_represent = isset($this->id_cliente_represent) ? $this->get_cliente() : "";
        $this->id_pedido  = isset($this->id_pedido)  ? $this->get_pedido()  : "";
    }

    private function get_cliente_represent(){
        $ListaClientes = new ListaClientes();
        return $ListaClientes->get($this->id_cliente_represent);
    }

    private function get_pedido(){
        $Listapedidos = new Listapedidos();
        return $Listapedidos->get($this->id_pedido);
    }
}
