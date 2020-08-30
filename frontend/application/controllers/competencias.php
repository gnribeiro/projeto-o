<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Competencias extends MY_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
            
    }

	public function index($permlink = false , $id=false)
	{
       if($id== false)  redirect('competencias/Novas-Tecnologias-de-Informacao-e-Comunicacao/11/');
       
       if(preg_match('/^[0-9]+$/' , $id)) {
       
            $this->load->model('contents');
      
            if($id == 15) {
                $data = $this->contents->get_content($id , $this->lang->lang());
            }
            else {
                $data = $this->contents->get_content_images($id , $this->lang->lang());
            }
      
            $data = (count($data)!= 0) ? $data[0] : ''; 
        
            $this->template->set('data' , $data);     
            $this->template->render();
	    }
        else{
            $this->show_404();
        }
    }
}	
