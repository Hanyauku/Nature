<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    // search data by email
    public function search() {
        // check if input is valid
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $idiom = $this->session->userdata('lang');
        $this->lang->load('nature',$idiom);
        if ($this->form_validation->run() === false) {
            //show error, redirect to index
            $this->session->set_flashdata('input_error', $this->lang->line('error_empty_email'));
            return 0;
        }
        else {
            // check if email is in database
            $email = $this->input->post('email');
            $this->load->model('nature');
            if ($this->nature->finduser($email)) {
                $user = $this->nature->finduser($email);
                // save userdata
                $this->session->set_userdata('username', $user['name']);
                $this->session->set_userdata('userid', $user['id']);
                return 1;
            }
            else {
                $this->session->set_flashdata('input_error', $this->lang->line('error_email'));
                return 0;
            }
        }
    }

    public function searchfirst() {
        if ($this->search() == 1) {
            redirect('/pageloader/userpage');
        }
        else {
            redirect("","refresh");
        }
    }

    public function searchsecond() {
        if ($this->search() == 1) {
            redirect('/pageloader/userpage');
        }
        else {
            redirect('/pageloader/userpage');
        }
    }

    public function locationdata($locationId) {
        $idiom = $this->session->get_userdata('lang');
        if (empty($idiom['lang'])) {
            $this->session->set_userdata('lang','english');
            $idiom = $this->session->get_userdata('lang');
        }
        // load chosen language
        $this->lang->load('nature',$idiom['lang']);
        $this->load->model('nature');
        $data['photos'] = $this->nature->findmedia($locationId);
        $data['coordinates'] = $this->nature->getcoordinates($locationId);
        $data['sum'] = $this->nature->calculatesqm($this->session->userdata['userid']);
        $this->load->view('nature/location', $data);
    }
}
