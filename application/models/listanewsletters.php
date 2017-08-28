<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once("newsletter.php");
require_once("newsletter.php");
 
class ListaNewsletters extends Control {

class ListaNewsletters extends Control {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_newsletter = '') {
    public function get($id_newsletter = '') {
        $query = $this->_instance->db->get_where('newsletter', array('id_newsletter' => $id_newsletter));
        $query = $this->_instance->db->get_where('newsletter', array('id_newsletter' => $id_newsletter));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'newsletter');
        return $query->custom_row_object(0, 'newsletter');
    }
 
    public function get_all(){
        $query = $this->_instance->db->get('newsletter');
        $query = $this->_instance->db->get('newsletter');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('newsletter');
        return $query->custom_result_object('newsletter');
    }
}
