<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_db {

	private $_db;
	private $_code;

	public function __constructor(){
		
	}

	public function _save($db, $nome_class){
		$this->_db = $db;
		$data = array(
			'id_error_log_db' => null,
            'error'           => $this->getMessageError(),
            'query'           => $this->_db->queries[0],
            'class'           => $nome_class,
            'dt_erro'         => date('Y-m-d H:i:s')
	       );
		$this->_db->insert('error_log_db',$data);

	}

	public function show_respose_error(){
		show_error('Em breve o serviço estará disponível novamente.', 500, 'Houve um erro em nosso servidor.');
		exit(1);
	}

	public function show_respose_success($message){
		show_error($message, 200, 'Sucesso');
		exit(1);
	}

	private function getMessageError(){
		$this->_code = $this->_db->error()['code'];
		return $this->_db->error()['code'] . ' - ' . $this->_db->error()['message'];
	}
}