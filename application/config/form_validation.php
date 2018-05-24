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
            'field' => 'numero',
            'label' => 'Numero',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'bairro',
            'label' => 'Bairro',
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
    ),
    'finalizar/pedido' =>
    array(
        array(
            'field' => 'forma_entrega',
            'label' => 'Forma da Entrega',
            'rules' => 'required'
        ),
        array(
            'field' => 'data_entrega',
            'label' => 'Dia da Retirada/Entrega',
            'rules' => 'required'
        ),
        array(
            'field' => 'hora_entrega',
            'label' => 'Horário da entrega',
            'rules' => 'required'
        ),
        array(
            'field' => 'forma_pgto',
            'label' => 'Forma de Pagamento',
            'rules' => 'required'
        ),
    )
);