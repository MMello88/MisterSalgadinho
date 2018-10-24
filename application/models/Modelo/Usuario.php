<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends MY_Model {

    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $hash;
    public $ativo;
    public $dt_cadastro;

    public function  __construct() {
        parent::__construct($this);
    }

    public function insert() {
        $this->set_post($this);
        $this->id_usuaro = null;
        $this->ativo = 'd';
        $this->dt_cadastro = date("Y-m-d H:i:s");
        $this->senha = do_hash($this->senha, 'md5');
        $this->hash = md5($this->email);
        if ($this->db->insert('usuario', $this)){
            $this->id_usuario = $this->db->insert_id();           
            return $this->id_usuario;
        }
        else
            return $this->db->error()['message'];
    }

    public function ativarUsuario($email){      
        return $this->setHashUsuario($email, null, TRUE);
    }

    public function gerarNovoHash($email, $hash){
        return $this->setHashUsuario($email, $hash);
    }

    public function update() {
        $this->set_post($this);
        $this->senha = do_hash($this->senha, 'md5');
        $this->db->update('usuario', $this, array('id_usuario' => $this->id_usuario));
        if ($this->db->error()['code'] > 0)
          return $this->db->error()['message'];
        return 'Dados Atualizado com Sucesso';
    }

    public function delete() {
        $this->set_post($this);
        $this->db->delete('usuario', $this, array('id_usuario' => $this->id_usuario));
        if ($this->db->error()['code'] > 0)
          $this->set_log_error_db();
        $this->set_response_db('Removido com sucesso');
    }

    public function alterarSenha($id_usuario, $senha){
        return $this->setNovaSenha($id_usuario, $senha);
    }

    protected function get_config_prop(){
    }

    private function setHashUsuario($id_usuario, $hash, $ativo = FALSE){
        $this->db->set('hash', $hash);
        if ($ativo === TRUE) $this->db->set('ativo', 'a');
        $this->db->where('email', $email);
        return $this->db->update('usuario') === FALSE ? FALSE : TRUE;
    }

    private function setNovaSenha($id_usuario, $senha){
        $senha = md5($senha);
        $this->db->set('senha', $senha);        
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('usuario') === FALSE ? FALSE : TRUE;
    }

}
