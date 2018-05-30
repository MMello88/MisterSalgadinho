<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Pedido.php");
 
class Listapedidos extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_pedido = '') {
        $query = $this->db->get_where('pedido', array('id_pedido' => $id_pedido));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'pedido');;
    }
 
    public function get_all(){
        $query = $this->db->get('pedido');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('pedido');
    }

    public function getPedidoByCliente($id_cliente = '') {
        $query = $this->db->order_by("id_pedido", "DESC")->get_where('pedido', array('id_cliente' => $id_cliente));
        return $query->custom_result_object('pedido');
    }

    public function getPedidoByOrcamento($id_orcamento = '') {
        $query = $this->db->get_where('pedido', array('id_orcamento' => $id_orcamento));
        return $query->custom_row_object(0, 'pedido');
    }

    public function getPedidoByServico($id_servico = '') {
        $query = $this->db->get_where('pedido', array('id_servico' => $id_servico));
        return $query->custom_row_object(0, 'pedido');
    }

    public function getPedidosSolicitados($nome = '', $email = '', $id_pedido = ''){
        $sql = "SELECT c.nome,        " .
               "       c.telefone,    " .
               "       p.data_pedido, " .
               "       p.valor_total, " .
               "       p.situacao,    " .
               "       CASE WHEN p.festa = 's' THEN 'Sim' ELSE 'Não' END festa, " .
               "       CASE WHEN p.situacao = 's' THEN 'Solicitado'      " .
               "            WHEN p.situacao = 'v' THEN 'Visualizado'     " .
               "            WHEN p.situacao = 'p' THEN 'Produzindo'      " .
               "            WHEN p.situacao = 't' THEN 'Saiu p/ Entrega' " .
               "            WHEN p.situacao = 'e' THEN 'Entrege'         " .
               "       ELSE '' END desc_situacao, " .
			         "       p.id_pedido    " .
               "  FROM tbl_pedido p   " .
               "  LEFT JOIN tbl_cliente c ON (c.id_cliente = p.id_cliente)     " .
			         "  WHERE p.situacao = 's' " .
               "    AND p.id_cidade = 1  " ; /*cidade ribeirão preto*/
        if (!empty($nome)){
          $sql .= " AND c.nome like '%{$nome}%' ";
        }
        if (!empty($email)){
          $sql .= " AND c.email = '{$email}'";
        }
        if (!empty($id_pedido)){
          $sql .= " and p.id_pedido = {$id_pedido}";
        }
        
        $sql .= "  ORDER BY p.data_pedido, p.id_pedido ";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
