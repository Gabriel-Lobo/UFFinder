<?php

class SalasModel extends CI_Model {
    public function set_sala($id = 0, $data) {
        if ($id == 0) {
            $this->db->insert('salas', $data);
            return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('salas', $data);
        }
    }
}
