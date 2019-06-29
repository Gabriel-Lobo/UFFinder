<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'create' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|regex_match[/^.+?uff.br$/]|is_unique[usuarios.email]|max_length[50]',
            'errors' => array(
                'is_unique' => 'O email informado já existe.',
                'regex_match' => 'Por favor, informe seu email da UFF.'
            ),
        ),
        array(
            'field' => 'senha',
            'label' => 'Senha',
            'rules' => 'trim|required|min_length[4]|max_length[20]'
        ),
        array(
            'field' => 'confirmation',
            'label' => 'Confirmation',
            'rules' => 'trim|required|matches[senha]'
        )
    ),
    'update' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|regex_match[/^.+?uff.br$/]|is_unique[usuarios.email]|max_length[50]',
            'errors' => array(
                'is_unique' => 'O email informado já existe.',
                'regex_match' => 'Por favor, informe seu email da UFF.'
            ),
        ),
    )
);