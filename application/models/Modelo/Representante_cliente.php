<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaclientes.php");

class Representante_cliente extends MY_Model {

    public $id_representante_cliente;
    public $id_cliente_represent;
    public $id_cliente_cliente;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->id_representante_cliente = null;
        if ($this->db->insert('representante_cliente', $this)){
            $this->id_representante_cliente = $this->db->insert_id();
            return $this->id_representante_cliente;
        } else {
            return $this->db->error()['message'];
        }
    }

    public function update() {
        $this->set_post($this);
        $this->db->update('representante_cliente', $this, array('id_representante_cliente' => $this->id_representante_cliente));
        if ($this->db->error()['code'] > 0)
          return $this->db->error()['message'];
        return 'Dados Atualizado com Sucesso';
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('representante_cliente', $this, array('id_representante_cliente' => $this->id_representante_cliente));
        if ($this->db->error()['code'] > 0)
            return $this->db->error()['message'];
        return 'Dados Removido com sucesso';
    }

    protected function get_config_prop(){
        $this->id_cliente_cliente = $this->get_cliente();
    }

    private function get_cliente(){
        $ListaClientes = new ListaClientes();
        return $ListaClientes->get($this->id_cliente_cliente);
    }

}
