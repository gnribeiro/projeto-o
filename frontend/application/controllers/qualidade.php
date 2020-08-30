<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qualidade extends MY_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
            
    }

	public function index()
	{
        
        $this->load->model('contents');
        $data = $this->contents->get_content_images(6 , $this->lang->lang());
        $data = (count($data)!= 0) ? $data[0] : ''; 
        
        
        $this->template->set('data' , $data);     
        $this->template->render();
	}
}	
