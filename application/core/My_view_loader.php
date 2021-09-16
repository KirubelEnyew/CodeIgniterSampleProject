<?php

class My_View_Loader extends CI_Controller
{
    protected $CI;
    public function __construct()
    {
        parent::__construct(); 
        $this->CI = &get_instance();  
    }
    public function loaderFunction($viewName, $data = null)
    {
        if (is_null($data)) {
            $this->CI->load->view("templates/header");
            $this->CI->load->view($viewName);
            $this->CI->load->view("templates/footer");
        }else{
            $this->CI->load->view("templates/header");
            $this->CI->load->view($viewName,$data);
            $this->CI->load->view("templates/footer");
        }
    }
}
