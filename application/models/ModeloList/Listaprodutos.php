<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Produto.php");
require_once(APPPATH."models/Modelo/ProdutoCategValor.php");
 
class Listaprodutos extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_produto = '') {
        $query = $this->db->get_where('produto', array('id_produto' => $id_produto));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('produto');
    }
 
    public function get_all(){
        $query = $this->db->get('produto');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('produto');
    }

    public function getProdutoByCategoria($id_categoria = '') {
        $query = $this->db->get_where('produto', array('id_categoria' => $id_categoria));
        return $query->custom_result_object('produto');
    }

    public function getAllProdutoCategValor($cidade = 'Vitrine', $ativo = 'a', $tipo_cliente = 'c'){
        $query = $this->db->query(
            "SELECT p.id_produto, 
                   p.nome, 
                   cp.id_categoria, 
                   cp.nome nome_categoria,
                   p.situacao, 
                   pc.imagem, 
                   cp.cssClass, 
                   vp.preco
              FROM tbl_produto p
              LEFT JOIN tbl_produto_categoria pc ON (p.id_produto = pc.id_produto)
              LEFT JOIN tbl_categoria cp ON (cp.id_categoria = pc.id_categoria)
              LEFT JOIN tbl_valor_produto vp ON (p.id_produto = vp.id_produto and vp.id_categoria = pc.id_categoria)
              LEFT JOIN tbl_cidade_categoria cc on (cp.id_categoria = cc.id_categoria)
              LEFT JOIN tbl_cidade c on (c.id_cidade = cc.id_cidade)
             WHERE vp.data_atualizacao = (SELECT MAX(tbl_valor_produto.data_atualizacao)
                                            FROM tbl_valor_produto
                                           WHERE tbl_valor_produto.id_produto = p.id_produto
                                             AND tbl_valor_produto.tipo_cliente = '{$tipo_cliente}')
               AND p.situacao = '{$ativo}'
               AND cp.situacao = '{$ativo}'
               AND vp.tipo_cliente = '{$tipo_cliente}'
               AND (('$cidade' = c.nome) or ('$cidade' = cc.id_cidade))
             ORDER BY cp.id_categoria");
        return $query->custom_result_object('produtocategvalor');
    }
}
