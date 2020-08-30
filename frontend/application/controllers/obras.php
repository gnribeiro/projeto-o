<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras extends MY_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
            
    }

	public function index($permlink = false , $id=false, $offset=false)
	{
       $this->lang->load('obras');
       
       if($id== false)   redirect('obras/Concluidas/12/');
       
       if(preg_match('/^[0-9]+$/' , $id)) {
            $this->load->library('pagination');
       
            $this->load->model('obras_model');

            $data           = array();
            $offset         = ($offset) ? (int) $offset : 0 ; 
            $itens_per_page = 10; 
            $data           = $this->obras_model->get($id , $this->lang->lang(), $offset, $itens_per_page , &$num_rows);

            $config['base_url']    = '/'.$this->lang->lang().'/obras/'.$permlink.'/'.$id.'/';
            $config['total_rows']  = $num_rows;
            $config['per_page']    = $itens_per_page; 
            $config['num_links']   = 2;
            $config['uri_segment'] = 5;

            $this->pagination->initialize($config);
            
            $data = (count($data)!= 0) ? $data : ''; 
        
            $this->template->set('data' , $data);     
            $this->template->set('id' , $id);     
            $this->template->render();
	    }
        else{
            $this->show_404();
        }
        

	}
}	
