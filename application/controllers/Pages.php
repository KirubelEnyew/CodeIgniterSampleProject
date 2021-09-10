<?php

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("newModel");
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    function validator(){
        $this->form_validation->set_rules("username","UserName","required|max_length[15]|alpha");
        $this->form_validation->set_rules("password","Password","required|min_length[6]");
        $this->form_validation->set_rules("rePassword","ConfirmPass","required|min_length[6]|matches[password]");
        if ($this->form_validation->run() == false) {
            $this->load->view('newView');
        }else{
            $this->load->view("formSuccess");
        }
        
    }
    public function view()
    {
        $this->load->view("templates/header");
        $this->validator();
        $this->load->view("templates/footer");
    }
    public function index()
    {

        $this->load->view('newView');
    }
}
