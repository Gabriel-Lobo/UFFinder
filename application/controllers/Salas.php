<?php

class Salas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('DisciplinasModel', 'disciplinas');
        $this->load->model('TurmasModel', 'turmas');
        $this->load->model('CampusModel', 'campus');
        $this->load->model('PrediosModel', 'predios');
        $this->load->model('SalasModel', 'salas');
    }

    public function new() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url().'login');
        }

        $data['view'] = 'salas/new';
        $data['disciplinas'] = $this->disciplinas->get_disciplinas();

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
    	$disciplinas = $this->input->post('disciplinas');
    	$turmas = $this->input->post('turmas');
    	$campus = $this->input->post('campus');
    	$predio = $this->input->post('predio');
    	$sala = $this->input->post('sala');

    	$usuario = $this->session->userdata('user_id');

    	$data = [
    	    'email' => $email, 'senha' => $password
    	];

    	$insert_data = $this->usuarios->set_usuario(0, $data);

    	if ($insert_data) {
    	    $this->session->set_flashdata('msg', 'Cadastro efetuado com sucesso. Faça seu login!');
    	    redirect(base_url().'login');
    	}
    }
}
