<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH."models/Modelo/Newsletter.php");

class Listanewsletters extends CI_Model {

    public function  __construct() {
        parent::__construct($this);
    }

    public function get($id_newsletter = '') {
        $query = $this->db->get_where('newsletter', array('id_newsletter' => $id_newsletter));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'newsletter');
    }

    public function getByEmail($email) {
        $query = $this->db->get_where('newsletter', array('email' => $email));
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_row_object(0, 'newsletter');
    }
 
    public function get_all(){
        $query = $this->db->get('newsletter');
        if (empty($query))
            $this->set_log_error_db();
        return $query->custom_result_object('newsletter');
    }
}
