<?php

class PrediosModel extends CI_Model {
    public function set_predio($id = 0, $data) {
        if ($id == 0) {
            $this->db->insert('predios', $data);
            return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('predios', $data);
        }
    }
}
