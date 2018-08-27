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
            redirect('/pageloader');
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
                redirect('/pageloader/userpage');
            }
            else {
                $this->session->set_flashdata('input_error', "Sorry, email is not registered.");
                redirect('/pageloader');
            }
        }
    }

    public function locationData($locationId) {
        echo $locationId;
        die();
        $this->load->model('nature');
        $photos = $this->nature->findMedia($locationId);
        $this->load->view('nature/location', $photos);
    }
}
