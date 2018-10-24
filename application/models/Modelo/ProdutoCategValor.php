<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/ModeloList/Listacategoriasproduto.php");

class ProdutoCategValor extends MY_Model {

    public $id_produto;
    public $nome;
    public $id_categoria;
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

}
