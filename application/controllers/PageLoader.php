<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageLoader extends CI_Controller {

    // loads index page
    public function index() {
        $this->load->view('nature/index');
    }

    // loads second (users) page
    public function userpage() {
        $this->load->model('nature');
        $this->nature->findCoordinates($this->session->userdata('userid'));
        $this->load->view('nature/userpage');
    }
}
