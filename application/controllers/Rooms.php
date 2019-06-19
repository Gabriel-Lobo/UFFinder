<?php

class Rooms extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('RoomsModel', 'room');
        $this->load->model('DisciplinesModel', 'disciplines');
    }

    public function new() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url().'login');
        }

        $data['view'] = 'rooms/new';
        $data['data'] = $this->disciplines->get_disciplines();

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }
}