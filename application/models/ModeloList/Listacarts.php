<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Cart.php");
 
class Listacarts extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_cart = '') {
        $query = $this->_instance->db->get_where('cart', array('id_cart' => $id_cart));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cart');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('cart');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('cart');
    }

    public function getCartByProduto($id_produto = '') {
        $query = $this->_instance->db->get_where('cart', array('id_produto' => $id_produto));
        return $query->custom_result_object('cart');
    }
	
	public function getCartBySession($id_session = '') {
        $sql = "select id_cart,          " .
               "       id_session,       " .
               "       id_produto,       " .
               "       id_cidade,        " .
               "       sum(qtde) qtde,   " .
               "       valor_unitario,   " .
               "       situacao          " .
               "  from tbl_cart          " .
               " where id_session = ?    " .
			         "   and situacao = 'a'    " .
               " group by id_session,    " .
               "     id_produto,     " .
               "     valor_unitario, " .
               "     situacao        " ;
        $query = $this->_instance->db->query($sql, array($id_session));
        return $query->custom_result_object('cart');
    }

    public function getCartSituacao($id_session){
      $this->_instance->db->select("situacao");
      $this->_instance->db->group_by("situacao");
      $query = $this->_instance->db->get_where('cart', array('id_session' => $id_session));
      return $query->custom_result_object('cart')[0];
    }
}
