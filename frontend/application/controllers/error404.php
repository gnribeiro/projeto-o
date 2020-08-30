<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
        $this->load->helper('language');
        $this->load->helper('url');
        
        if($this->lang->lang() === NULL) {
            $this->config->set_item('language', 'portuguese');
        };
            
    }

	public function index()
	{
        $this->lang->load('errors');        
        $this->load->view('errors/404');
    }
}	
