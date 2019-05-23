<?php
 
class LoginModel extends CI_Model {
 
    public function verify_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
 
        return $query->result();
    }
}
