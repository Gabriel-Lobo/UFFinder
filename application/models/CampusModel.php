<?php

class CampusModel extends CI_Model {
    public function set_campus($id = 0, $data) {
        if ($id == 0) {
            $this->db->insert('campus', $data);
            return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('campus', $data);
        }
    }
}
