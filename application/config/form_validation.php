<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'novo/cliente' =>
    array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[cliente.email]|'
        ),
        array(
            'field' => 'senha',
            'label' => 'Senha',
            'rules' => 'trim|required|min_length[8]'
        ),
        array(
            'field' => 'endereco',
            'label' => 'Endereço',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'telefone',
            'label' => 'Telefone',
            'rules' => 'trim|required'
        )
    ),
    'novo/cliente' =>
    array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'senha',
            'label' => 'Senha',
            'rules' => 'trim|required|min_length[8]'
        ),
    )
);