<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
            
    }

	public function index()
	{
        $this->config->load('links', true);
        $links   = $this->config->item('links' , 'links');
        
        $help    = array();
        $tools   = array();
        $content = array();
       
       foreach($links as $value)
       {

            if($value['dashlet'] == 'help')    array_push($help    , $value);
            if($value['dashlet'] == 'tools')   array_push($tools   , $value);
            if($value['dashlet'] == 'content') array_push($content , $value);
             
        }
        
        
        $this->template->set('nome'    , 'gon2');
        $this->template->set('help'    , $help);
        $this->template->set('tools'   , $tools);
        $this->template->set('content' , $content);
        $this->template->render();
	}
}	
