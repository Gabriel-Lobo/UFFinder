<?php

class TurmasModel extends CI_Model {

	public function get_turmas($id = 0) {
		$this->db->order_by('id', 'desc');

		$query = $this->db->query(
			"SELECT turmas.cod, turmas.id
			 FROM disciplinas, turmas
			 WHERE disciplinas.id = turmas.idDisc
			 AND disciplinas.id = " . strval($id));

		return $query->result_array();
	}
}
