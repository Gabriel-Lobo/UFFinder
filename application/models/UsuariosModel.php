<?php

class UsuariosModel extends CI_Model {

    public function set_usuario($id = 0, $data) {
        if ($id == 0) {
            return $this->db->insert('usuarios', $data);
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
}
