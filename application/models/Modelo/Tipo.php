<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo extends MY_Model {

    public $campo;
    public $tipo;
    public $descricao;

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