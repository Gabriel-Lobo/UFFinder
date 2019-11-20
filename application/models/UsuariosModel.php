<?php

class UsuariosModel extends CI_Model {

    public function set_usuario($id = 0, $data) {
        if ($id == 0) {
			$this->db->insert('usuarios', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('usuarios', $data);
		}
    }

    public function get_usuario($id = 0) {
    	$this->db->where('id', $id);
    	return $this->db->get('usuarios')->row();
    }

	public function delete_usuario($id = 0) {
    	$this->db->where('id', $id);
    	return $this->db->delete('usuarios');
	}

	public function get_usuarios($params = array()) {
		$this->db->order_by('id', 'usuarios');

		if(isset($params) && !empty($params)) {
			$this->db->limit($params['limit'], $params['offset']);
		}

		return $this->db->get('usuarios')->result_array();
	}

	public function count_usuarios() {
		$this->db->from('usuarios');
		return $this->db->count_all_results();
	}

	public function set_session($user_id, $email, $isAdmin = 0) {
		$data = array(
			'logged_in' => true,
			'is_admin' => $isAdmin,
			'email' => $email,
			'user_id' => $user_id
		);

		$this->session->set_userdata($data);
	}

	public function validate_email($email, $code) {
		$this->db->where('email', $email);

		$result = $this->db->get('usuarios', 1)->row();

		if (md5((string)$result->datetime) === $code) {
			return true;
		}
	}

	public function activate_account($email) {
		$this->db->where('email', $email);

		$result = $this->db->get('usuarios', 1)->row();

		if (!$result->active) {
			$data = array('active' => 1);

			$this->db->where('email', $email);

			return $this->db->update('usuarios', $data);
		} else {
			return false;
		}
	}
}
