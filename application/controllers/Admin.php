<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {
        $this->load->view('nature/admin_login');
    }

    public function login() {

        // validate input

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

        if ($this->form_validation->run() === false) {

            //show error

			$this->session->set_flashdata('input_error', validation_errors());

            redirect('/admin/ ');

		}

        else {

            $email = $this->input->post('email');

            $password = $this->input->post('password');

            // check if email is in database

            $this->load->model('nature');

            if ($this->nature->findAdmin($email)) {

                $admin = $this->nature->findAdmin($email);

                // compare passwords

                if ($admin['password'] == $password) {
                	$this->session->set_userdata('admin',true);
                    redirect('/admin/load');

                }

                else {

                    $this->session->set_flashdata('input_error', "Sorry, password is incorrect");

                    redirect('/admin/');

                }

            }

            else {

                $this->session->set_flashdata('input_error', "Sorry, email is not registered.");

                redirect('/admin/');

            }

        }

    }
    public function load(){
    	if ($this->session->userdata('admin !== true')) {
    		redirect ('/admin/ ');
    	}
    	$this->load->view('nature/admin_upload');
    }

}