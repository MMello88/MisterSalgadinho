<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Newsletter.php");

class Listanewsletters extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_newsletter = '') {
        $query = $this->_instance->db->get_where('newsletter', array('id_newsletter' => $id_newsletter));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'newsletter');
    }

    public function getByEmail($email) {
        $query = $this->_instance->db->get_where('newsletter', array('email' => $email));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'newsletter');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('newsletter');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('newsletter');
    }
}
