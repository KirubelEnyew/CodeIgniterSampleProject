<?php

class ValidationLibrary
{
    protected $CI;
    public function __construct()
    {
        //loads the validation config rules file and validation library
        $this->CI = &get_instance();
        $this->CI->config->load('pizzarules');
        $this->CI->load->library('form_validation');
    }
    public function validator(){
        //sets the validation rules to the config rules
        $this->CI->form_validation->set_rules($this->CI->config->item('validationRules'));
    }
}
