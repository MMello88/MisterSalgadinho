<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Representante_recebimento.php");
 
class Listarepresentanterecebimento extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_representante_recebimento = '') {
        $query = $this->db->get_where('representante_recebimento', array('id_representante_recebimento' => $id_representante_recebimento));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('representante_recebimento');
    }

    public function getRecebimentoByMes($id_cliente_represent, $mes){
    	$query = $this->db->get_where('representante_recebimento', array('id_cliente_represent' => $id_cliente_represent));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('representante_recebimento');	
    }

    public function getClienteByPeriodo($id_cliente_represent, $dt_inicial, $dt_final){
        $dt_inicial = date("Y") . "-" . $dt_inicial . "-01";
        $dt_final = date("Y") . "-" . $dt_final . "-01";
        $dt_final = date("Y-m-t", strtotime($dt_final));
        $consulta = 
            "SELECT c.nome, c.id_cliente
               FROM tbl_representante_recebimento r
              INNER JOIN tbl_pedido p ON (r.id_pedido = p.id_pedido)
              INNER JOIN tbl_cliente c ON (c.id_cliente = p.id_cliente)
              WHERE r.id_cliente_represent = $id_cliente_represent
                AND p.data_pedido BETWEEN '$dt_inicial' AND '$dt_final'
              GROUP BY c.nome, c.id_cliente
              order by r.id_pedido";
        $query = $this->db->query($consulta);
        $results = $query->result_object();
        foreach ($results as $key => $user) {
            $results[$key]->pedidos = $this->getRecebimentoByCliente($id_cliente_represent, $user->id_cliente, $dt_inicial, $dt_final);
        }
        return $results;
    }

    private function getRecebimentoByCliente($id_cliente_represent, $id_cliente_cliente, $dt_inicial, $dt_final){
        $query = $this->db->query(
            "SELECT r.id_pedido, 
                   p.data_pedido, 
                   r.data_pgto_pedido, 
                   p.valor, 
                   r.valor_receber, 
                   r.recebido, 
                   r.situacao_pedido
              FROM tbl_representante_recebimento r
              LEFT JOIN tbl_pedido p ON (r.id_pedido = p.id_pedido)
              WHERE r.id_cliente_represent = $id_cliente_represent
              AND p.data_pedido BETWEEN '$dt_inicial' AND '$dt_final'
              AND p.id_cliente = $id_cliente_cliente
              order by r.id_pedido desc");
        return $query->result_object();
    }
}