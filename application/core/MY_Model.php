<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class MY_Model extends CI_Model {

  protected $_msgError;
  protected $_model;
  private $_error_db;

  public function __construct($class_model = '') {
    parent::__construct();
    $this->_model = $class_model;
    $this->get_config_prop();
  }
  
  protected function set_post($class){
    if ($_POST) {
      $class_vars = array_keys(get_class_vars(get_class($class)));
      foreach($class_vars as $var){
        $class->$var = empty($this->input->post($var)) ? $class->$var : $this->input->post($var);
      }
    }
  }

  public function set_log_error_db() {
    $this->_error_db = new Error_db();
    $this->_error_db->_save($this->db, get_class($this->_model));
    $this->_error_db->show_respose_error();
  }

  public function set_response_db($message) {
    $this->_error_db = new Error_db();
    $this->_error_db->show_respose_success($message);
  }

  /*protected function set_field($class, $row){
    $class_vars = array_keys(get_class_vars(get_class($class)));
    foreach($class_vars as $var){
      if (isset($row[$var]))
        $class->$var = $row[$var];
    }
  }*/
  
  abstract protected function get_config_prop();
  //abstract protected function valida_form();

  abstract protected function insert();
  abstract protected function update();
  abstract protected function delete();
}