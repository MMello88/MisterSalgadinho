<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'selecionar/cidade' =>
    array(
        array(
            'field' => 'id_cidade',
            'label' => 'Cidade',
            'rules' => 'trim|required|xss_clean'
        )
    )
);