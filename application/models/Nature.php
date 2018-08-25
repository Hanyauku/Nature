<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nature extends CI_Model {
    public function findUser($argument) {
        $query = "SELECT users.id, users.name FROM users WHERE email = ?;";
        return $this->db->query($query, $argument)->row_array();
    }
}
