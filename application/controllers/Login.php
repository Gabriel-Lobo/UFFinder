<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('LoginModel', 'login');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $data['view'] = 'login/login';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('senha');

        $user = $this->login->verify_login($email, $password);

        if (count($user) === 1) {
            $this->load->model('UsuariosModel', 'usuarios');
            $this->usuarios->set_session($user[0]->id, $email, $user[0]->isAdmin);

            redirect(base_url());
        } else {
            $this->session->set_flashdata('msg', 'Email ou Senha invalidos.');
            redirect(base_url().'login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
 }
