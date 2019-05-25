<?php

class UsersModel extends CI_Model {

    public function set_user($id = 0, $data) {
        if ($id == 0) {
            return $this->db->insert('users', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }
    }

    public function get_user($id = 0) {
    	$this->db->where('id', $id);
    	return $this->db->get('users')->row();
    }

	public function delete_user($id = 0) {
    	$this->db->where('id', $id);
    	return $this->db->delete('users');
	}

	public function get_users($params = array()) {
		$this->db->order_by('id', 'desc');

		if(isset($params) && !empty($params)) {
			$this->db->limit($params['limit'], $params['offset']);
		}

		return $this->db->get('users')->result_array();
	}

	public function count_users() {
		$this->db->from('users');
		return $this->db->count_all_results();
	}
}
