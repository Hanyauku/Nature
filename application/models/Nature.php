<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nature extends CI_Model {
    // returns user id and name, search by email
    public function findUser($argument) {
        $query = "SELECT users.id, users.name FROM users WHERE email = ?;";
        return $this->db->query($query, $argument)->row_array();
    }

    // returns locations and sq meters for certain user, search by user id
    public function findCoordinates($argument) {
        $query = "SELECT location.latitude, location.longitude, location.id, users_has_location.sqm
        FROM location
        INNER JOIN users_has_location
        ON users_has_location.location_id = location.id
        WHERE users_has_location.users_id = ?";
        return $this->db->query($query, $argument)->result_array();
    }

    // returns all images and videos for certain location, search by location id
    public function findMedia($argument) {
        $query = "SELECT media.link
        FROM media
        WHERE media.location_id = ?";
        return $this->db->query($query, $argument)->result_array();
    }
}
