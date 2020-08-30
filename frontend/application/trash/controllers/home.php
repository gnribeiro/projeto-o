<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
            
    }

	public function index()
	{
        $this->template->set('nome' , 'gon2');
        $this->template->render();
	}
}	
