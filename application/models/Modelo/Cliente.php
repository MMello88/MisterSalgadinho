<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends MY_Model {

    public $id_cliente;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $endereco;
    public $numero;
    public $bairro;
    public $complemento;
    public $situacao;
    public $tipo;
    public $ganho_unitario;
    public $cpf_cnpj;
    public $hash;
    public $ativo;
    public $id_cidade;
    public $dt_cadastro;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_cliente = null;
        $this->dt_cadastro = date("Y-m-d H:i:s");
        $this->senha = do_hash($this->senha, 'md5');
        if ($this->tipo == "s"){
            $this->ganho_unitario = '0.03';
        } else {
            $this->ganho_unitario = '';
        }
        if ($this->db->insert('cliente', $this)){
            $this->id_cliente = $this->db->insert_id();
            $this->hash = md5($this->id_cliente);
            $this->setHashCliente($this->id_cliente, $this->hash, FALSE);
            return $this->id_cliente;
        }
        else
            return $this->db->error()['message'];
    }

    public function ativarCliente($id_cliente){      
        return $this->setHashCliente($id_cliente, null, TRUE);
    }

    public function gerarNovoHash($id_cliente, $hash){
        return $this->setHashCliente($id_cliente, $hash);
    }

    public function update() {
        $this->set_post($this);
        $this->senha = do_hash($this->senha, 'md5');
        $this->db->update('cliente', $this, array('id_cliente' => $this->id_cliente));
        if ($this->db->error()['code'] > 0)
          return $this->db->error()['message'];
        return 'Dados Atualizado com Sucesso';
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('cliente', $this, array('id_cliente' => $this->id_cliente));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    public function alterarSenha($id_cliente, $senha){
        return $this->setNovaSenha($id_cliente, $senha);
    }

    protected function get_config_prop(){
    }

    private function setHashCliente($id_cliente, $hash, $ativo = FALSE){
        $this->db->set('hash', $hash);
        if ($ativo === TRUE){
            $this->db->set('ativo', 1);
        }
        $this->db->where('id_cliente', $id_cliente);
        return $this->db->update('cliente') === FALSE ? FALSE : TRUE;
    }

    private function setNovaSenha($id_cliente, $senha){
        $senha = md5($senha);
        $this->db->set('senha', $senha);        
        $this->db->where('id_cliente', $id_cliente);
        return $this->db->update('cliente') === FALSE ? FALSE : TRUE;
    }

}
