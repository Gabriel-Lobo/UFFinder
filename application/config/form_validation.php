<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'create' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|min_length[3]|max_length[50]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|regex_match[/^.+?uff.br$/]|is_unique[users.email]|max_length[50]',
            'errors' => array(
                'is_unique' => 'O email informado já existe.',
                'regex_match' => 'Por favor, informe seu email da UFF.'
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[4]|max_length[20]'
        ),
        array(
            'field' => 'confirmation',
            'label' => 'Confirmation',
            'rules' => 'trim|required|matches[password]'
        )
    ),
    'update' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|min_length[3]|max_length[50]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|regex_match[/^.+?uff.br$/]|is_unique[users.email]|max_length[50]',
            'errors' => array(
                'is_unique' => 'O email informado já existe.',
                'regex_match' => 'Por favor, informe seu email da UFF.'
            ),
        ),
    )
);