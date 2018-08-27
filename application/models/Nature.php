<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nature extends CI_Model {
    public function findUser($argument) {
        $query = "SELECT users.id, users.name, FROM users WHERE email = ?;";
        return $this->db->query($query, $argument)->row_array();
    }

    public function findCoordinates($argument) {
        $query = "SELECT location.coordinates, users_has_location.sqm
        FROM location
        INNER JOIN users_has_location
        ON users_has_location.location_id = location.id
        WHERE users_has_location.users_id = ?";
        return $this->db->query($query, $argument)->result_array();
    }

    public function findMedia($argument) {
        $query = "SELECT media.link
        FROM media
        WHERE media.location_id = ?";
        return $this->db->query($query, $argument)->result_array();
    }
}
