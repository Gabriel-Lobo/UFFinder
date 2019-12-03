<?php

class Usuarios extends CI_Controller {

    private $code;

    public function __construct() {
        parent::__construct();

        $this->load->model('UsuariosModel', 'usuarios');
    }

    public function index() {
        if (!$this->session->userdata('is_admin')) {
            redirect(base_url());
        }
        $config['base_url'] = site_url('usuarios/index');
        $config['total_rows'] = $this->usuarios->count_usuarios();

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $params['limit'] = 10;
        $params['offset'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['data'] = $this->usuarios->get_usuarios($params);

        $data['view'] = 'usuarios/index';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function new() {
        if ($this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $data['view'] = 'usuarios/new';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if ($this->form_validation->run('create') == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url().'usuarios/new');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('senha');

            $this->code = date('Y-m-d H:i:s');

            $data = [
                'email' => $email, 'senha' => $password, 'datetime' => $this->code
            ];

            $user_id = $this->usuarios->set_usuario(0, $data);

            if ($this->db->affected_rows() === 1) {
                $this->session->set_flashdata('msg', 'Um link de confirmação será enviado para o email fornecido.');
                $this->send_email_validation($email);

                redirect(base_url());
            }
        }
    }

    public function show() {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $this->load->model('SalasModel', 'salas');
        $id = $this->session->userdata('user_id');

        $data['data'] = $this->usuarios->get_usuario($id);
        $data['salas'] = $this->salas->get_salas_by_user($id, 10, 20)->result_array();
        $data['view'] = 'usuarios/show';

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
        
        $data['data'] = $this->usuarios->get_usuario($id);
        $data['view'] = 'usuarios/edit';

        $this->load->view('templates/header');
        $this->load->view('layout/main', $data);
        $this->load->view('templates/footer');

    }

    public function update() {
        if ($this->form_validation->run('update') == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url().'usuarios/edit');
        } else {
            $id = $this->input->post('id');
            $email = $this->input->post('email');

            $data = [
                'email' => $email
            ];

            $insert_data = $this->usuarios->set_usuario($id, $data);

            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully Register, Login now!');
                redirect(base_url().'usuarios/index');
            }
        }
    }

    public function destroy() {        
        if (!$this->input->post('id') || $this->input->post('id') === $this->session->userdata('user_id')) {
            $id = $this->session->userdata('user_id');        
            $this->usuarios->delete_usuario($id);

            $this->session->sess_destroy();
            redirect(base_url());
        } else {
            $id = $this->input->post('id');        
            $this->usuarios->delete_usuario($id);

            redirect(base_url().'usuarios');
        }
    }

    public function validate($email, $code) {
        $validated = $this->usuarios->validate_email($email, $code);

        if ($validated) {
            $activated = $this->usuarios->activate_account($email);

            if ($activated) {
                $this->session->set_flashdata('msg', 'Sua conta foi ativada com sucesso. Faça seu login!');
                redirect(base_url().'login');
            } else {
                $this->session->set_flashdata('msg', 'Esta conta já está ativa');
                redirect(base_url());
            }
        }
    }

    private function send_email_validation($email) {
        $this->load->library('email');
        $this->email->set_newline("\r\n");

        $code = md5((string)$this->code);

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_mail'), 'Uffinder');
        $this->email->to($email);
        $this->email->subject('Ative sua conta para acessar o Uffinder');

        $message = '<!DOCTYPE html>
                    <html><head></head><body>
                    <p>Para concluir seu cadastro no Uffinder, acesse <a href="'.base_url().'usuarios/validate/'.$email.'/'.$code.'">este link</a><p>
                    </body></html>';

        $this->email->message($message);
        $this->email->send();
    }
}
