<?php

class DisciplinesModel extends CI_Model {

	public function get_disciplines() {
		$this->db->order_by('id', 'desc');

		return $this->db->get('disciplines')->result_array();
	}
}