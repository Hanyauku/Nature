<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageLoader extends CI_Controller {

    public function index() {
        $this->load->view('nature/index');
    }

    public function userpage() {
        $this->load->view('nature/userpage');
    }
}
