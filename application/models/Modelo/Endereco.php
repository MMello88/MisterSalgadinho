<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Endereco extends MY_Model {

    public $id_endereco;
    public $endereco;
    public $numero;
    public $bairro;
    public $complemento;
    public $cep;
    public $principal;
    public $id_cliente;
    public $id_cidade;
    
    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->principal = $this->principal == NULL ? 'n' : $this->principal;
        
        $this->updateAllPrincipalNao($this->id_cliente, $this->id_endereco, $this->principal);

        if ($this->db->insert('endereco', $this)){
            $this->id_endereco = $this->db->insert_id();
            return $this->id_endereco;
        }
        else
            return $this->db->error()['message'];
    }

    public function update() {
        $this->set_post($this);
        $this->principal = $this->principal == NULL ? 'n' : $this->principal;

        $this->updateAllPrincipalNao($this->id_cliente, $this->id_endereco, $this->principal);

        $this->db->update('endereco', $this, array('id_endereco' => $this->id_endereco));
        if ($this->db->error()['code'] > 0)
          return $this->db->error()['message'];
        return 'Dados Atualizado com Sucesso';
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('endereco', $this, array('id_endereco' => $this->id_endereco));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    public function updateAllPrincipalNao($id_cliente, $id_endereco_com_principal, $principal){
        if ($principal == 's') {
            $this->db->set('principal', 'n');
            $this->db->where('id_cliente', $id_cliente);
            $this->db->where('id_endereco <>', $id_endereco_com_principal);
            $this->db->update('endereco');
        }
    }

    protected function get_config_prop(){
    }

}
