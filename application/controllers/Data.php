<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    // search data by email
    public function search() {
        // check if input is valid
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        if ($this->form_validation->run() === false) {
            //show error, redirect to index
            $this->session->set_flashdata('input_error', validation_errors());
            return 0;
        }
        else {
            // check if email is in database
            $email = $this->input->post('email');
            $this->load->model('nature');
            if ($this->nature->findUser($email)) {
                $user = $this->nature->findUser($email);
                // save userdata
                $this->session->set_userdata('username', $user['name']);
                $this->session->set_userdata('userid', $user['id']);
                return 1;
            }
            else {
                $this->session->set_flashdata('input_error', "Sorry, email is not registered.");
                return 0;
            }
        }
    }

    public function searchFirst() {
        if ($this->search() == 1) {
            redirect('/pageloader/userpage');
        }
        else {
            redirect('/pageloader');
        }
    }

    public function searchSecond() {
        if ($this->search() == 1) {
            redirect('/pageloader/userpage');
        }
        else {
            redirect('/pageloader/userpage');
        }
    }

    public function locationData($locationId) {
        $this->load->model('nature');
        $data['photos'] = $this->nature->findMedia($locationId);
        $data['coordinates'] = $this->nature->getCoordinates($locationId);
        $data['sum'] = $this->nature->calculateSqm($this->session->userdata['userid']);
        $this->load->view('nature/location', $data);
    }
}
