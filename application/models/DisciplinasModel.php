<?php

class DisciplinasModel extends CI_Model {

	public function get_disciplinas() {
		$this->db->order_by('id', 'desc');

		return $this->db->get('disciplinas')->result_array();
	}
}
