<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class PageLoader extends CI_Controller {

    public function index() {
        $idiom = $this->session->get_userdata('lang');
        //var_dump($idiom);
        //die;
//        $idiom = 'english';
    	$this->lang->load('nature',$idiom['lang']);
        $this->load->view('nature/index');
    }

    public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		redirect("","refresh");
	}

    public function userpage() {
        $this->load->view('nature/userpage');
    }
}
