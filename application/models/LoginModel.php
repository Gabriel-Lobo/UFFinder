<?php
 
class LoginModel extends CI_Model {
 
    public function verify_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('senha', $password);
        $result = $this->db->get('usuarios')->row();
 
        return $result;
    }
}
