<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listaclientes.php");
require_once(APPPATH."models/ModeloList/Listacidades.php");
require_once(APPPATH."models/ModeloList/Listarepresentantecliente.php");
require_once(APPPATH."models/Modelo/Representante_recebimento.php");

class Pedido extends MY_Model {

    public $id_pedido;
    public $id_cliente;
    public $id_cidade;
    public $situacao;
    public $data_pedido;
    public $valor;
    public $valor_total;
    public $forma_pgto;
    public $forma_entrega;
    public $taxa_entrega;
    public $data_entrega;
    public $hora_entrega;
    public $end_entrega;
    public $num_entrega;
    public $bairro_entrega;
    public $comp_entrega; 
    public $data_pagamento;
    
    
    
    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_pedido = null;
        if ($this->forma_entrega === "e"){
            $this->valor_total = $this->valor + $this->taxa_entrega;
        }
        if ($this->db->insert('pedido', $this))
            $this->id_pedido = $this->db->insert_id();
        if (empty($this->id_pedido))
          return $this->db->error()['message'];
        $this->recebimentoRepresentante();
        return $this->id_pedido;
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

    private function recebimentoRepresentante(){
        $representante = $this->get_representante();
        if(!empty($representante)){
            $CI =& get_instance();
            $CI->load->model('representante_recebimento');
            $CI->representante_recebimento->id_cliente_represent = $representante->id_cliente_represent->id_cliente;
            $CI->representante_recebimento->id_pedido = $this->id_pedido;
            $CI->representante_recebimento->data_pgto_pedido = '';
            $CI->representante_recebimento->valor_receber = $representante->id_cliente_represent->ganho_unitario * $this->valor;
            $CI->representante_recebimento->recebido = 'n';
            $CI->representante_recebimento->situacao_pedido = 'a';
            $CI->representante_recebimento->insert();
        }
    }

    protected function get_config_prop(){
        $this->id_cliente = isset($this->id_cliente) ? $this->get_cliente() : "";
        $this->id_cidade  = isset($this->id_cidade)  ? $this->get_cidade()  : "";
    }

    private function get_cliente(){
        $ListaClientes = new ListaClientes();
        return $ListaClientes->get($this->id_cliente);
    }

    private function get_cidade(){
        $Listacidades = new Listacidades();
        return $Listacidades->get($this->id_cidade);
    }

    private function get_representante(){
        $Listarepresentantecliente = new Listarepresentantecliente();
        return $Listarepresentantecliente->getRepresentanteByCliente($this->id_cliente);
    }
}
