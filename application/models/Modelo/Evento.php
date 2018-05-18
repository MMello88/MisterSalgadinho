<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaclientes.php");
require_once(APPPATH."models/ModeloList/Listapedidos.php");

class Evento extends MY_Model {

    public $id_evento;
    public $id_cliente;
    public $id_pedido;
    public $data_evento;
    public $end_evento;
    public $cel_evento;
    public $hora_evento;

    public function  __construct() {
        parent::__construct($this);
        $this->get_config_prop();
    }

    public function insert() {
        $this->set_post($this);
        $this->id_evento = null;
        if ($this->db->insert('evento', $this))
            $this->id_evento = $this->db->insert_id();
        if (empty($this->id_evento))
          $this->set_log_error_db();
        //$this->set_response_db('Incluido com sucesso');
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('evento', $this, array('id_evento' => $this->id_evento));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Alteração concluída com sucesso');
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('evento', $this, array('id_evento' => $this->id_evento));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    private function get_config_prop(){
        $this->id_cliente = $this->get_cliente();
        $this->id_pedido = $this->get_pedgeto();
    }

    private function get_cliente(){
        $ListaClientes = new ListaClientes();
        return $ListaClientes->get($this->id_cliente);
    }

    private function get_pedgeto(){
        $ListaPedidos = new ListaPedidos();
        return $ListaPedidos->get($this->id_pedido);
    }
}
