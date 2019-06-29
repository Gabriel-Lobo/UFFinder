<?php

class Turmas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('TurmasModel', 'turmas');
    }

    public function index() {
    	$idDisc = $this->input->post('idDisc');

    	$data['turmas'] = $this->turmas->get_turmas($idDisc);

    	echo json_encode($data);
    }
}
