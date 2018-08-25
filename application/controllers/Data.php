<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageLoader extends CI_Controller {
    public function login() {
        // check if input is valid
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        if ($this->form_validation->run() === false) {
            //show error, redirect to index
            $this->session->set_flashdata('login_error', validation_errors());
            redirect('/ ');
        }
        else {
            $email = $this->input->post('email');
            // check if email is in database
            $this->load->model('nature');
            if ($this->nature->findUser($email)) {
                $user = $this->challenge->findUser($email);
                $this->session->set_userdata('username', $user['name']);
                $this->session->set_userdata('userid', $user['id']);
                redirect('/userpage');
            }
            else {
                $this->session->set_flashdata('login_error', "Sorry, email is not registered.");
                redirect('/ ');
            }
        }
    }
}
