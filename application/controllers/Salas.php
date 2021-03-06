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

    public function index() {
        $text = $this->input->post('search');

        $limit = 10;
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $query = $this->salas->get_salas($text, $limit, $offset);

        $data['data'] = $query->result_array();
        $data['view'] = 'salas/index';

        $config['base_url'] = site_url('salas/index');
        $config['total_rows'] = $query->num_rows();

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function new() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('msg', 'Faça seu login para cadastrar uma sala.');
            redirect(base_url().'login');
        }

        $data['view'] = 'salas/new';
        $data['disciplinas'] = $this->disciplinas->get_disciplinas();

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
    	$sala = $this->input->post('sala');
    	$campus = $this->input->post('campus');
    	$predio = $this->input->post('predio');
    	$turma = $this->input->post('turma');
    	$usuario = $this->session->userdata('user_id');

    	$data_predio = [
    	    'nome' => $predio
    	];
        $predio = $this->predios->set_predio(0, $data_predio);

    	$data_campus = [
    	    'nome' => $campus
    	];
        $campus = $this->campus->set_campus(0, $data_campus);

    	$data_sala = [
    	    'idCampus' => $campus, 'idPredio' => $predio, 'idTurma' => $turma, 'idUsuario' => $usuario, 'num' => $sala
    	];

    	$insert_data = $this->salas->set_sala(0, $data_sala);

    	if ($insert_data) {
    	    $this->session->set_flashdata('msg', 'Cadastro efetuado com sucesso. Faça seu login!');
    	    redirect(base_url().'login');
    	}
    }
}
