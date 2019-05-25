<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('UsersModel', 'user');
    }

    public function index() {
        if (!$this->session->userdata('is_admin')) {
            redirect(base_url());
        }
        $config['base_url'] = site_url('user/index');
        $config['total_rows'] = $this->user->count_users();

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $params['limit'] = 10;
        $params['offset'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['data'] = $this->user->get_users($params);

        $data['view'] = 'users/index';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function new() {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $data['view'] = 'users/new';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if ($this->form_validation->run('create') == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url().'users/new');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $data = [
                'name' => $name, 'email' => $email, 'password' => $password
            ];

            $insert_data = $this->user->set_user(0, $data);

            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully Register, Login now!');
                redirect(base_url().'login');
            }
        }
    }

    public function show() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $id = $this->session->userdata('user_id');

        $data['data'] = $this->user->get_user($id);
        $data['view'] = 'users/show';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function edit() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        } else {
            $id = $this->session->userdata('user_id');
        } 
        
        $data['data'] = $this->user->get_user($id);
        $data['view'] = 'users/edit';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');

    }

    public function update() {
        if ($this->form_validation->run('update') == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url().'users/edit');
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $data = [
                'name' => $name, 'email' => $email
            ];

            $insert_data = $this->user->set_user($id, $data);

            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully Register, Login now!');
                redirect(base_url().'users/index');
            }
        }
    }

    public function destroy() {        
        if (!$this->input->post('id') || $this->input->post('id') === $this->session->userdata('user_id')) {
            $id = $this->session->userdata('user_id');        
            $this->user->delete_user($id);

            $this->session->sess_destroy();
            redirect(base_url());
        } else {
            $id = $this->input->post('id');        
            $this->user->delete_user($id);

            redirect(base_url().'users');
        }
    }
}
