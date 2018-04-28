<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listacategoriasproduto.php");

class ProdutoCategValor extends MY_Model {

    public $id_produto;
    public $nome;
    public $id_categoria_produto;
    public $situacao;
    public $imagem;
    public $cssClass;
    public $preco;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
    }

    public function update() {
    }

    public function delete() {

    }

    protected function get_config_prop(){
    }

    protected function valida_form(){
        return true;//$this->form_validation->run('pedidos/realizar');
    }

    private function get_categoria_produto(){
    }

    private function error(){
    }
}
