<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends MY_Controller 
{
    public function  __construct()  
    {
        parent::__construct();
        
        $this->load->model('contents');    
        $this->load->helper('admin');    
    }



	
	public function lista($id = false , $offset=false)
    {
       
       
        if($id===false)  redirect('/', 'refresh');

        $this->load->model('categories');    
        $this->load->library('pagination');
        $this->load->model('languages');    
       


        $data           = array();
        $offset         = ($offset) ? (int) $offset : 0 ; 
        $itens_per_page = 10;
        $default_lang   = $this->languages->default_lang();
        $category       =(count( $this->categories->get_catg($id))!= 0)  ? $this->categories->get_catg($id) : array(' ');
        $data           = $this->contents->get_content_in_catg($id, $default_lang[0]->id , $offset, $itens_per_page);
        $tree           = $this->categories->tree_ajax(1 , $id);

        $config['base_url']    = '/admin/content/lista/'.$id.'/';
        $config['total_rows']  = $this->contents->count_contents($id);
        $config['per_page']    = $itens_per_page; 
        $config['num_links']   = 2;
        $config['uri_segment'] = 5;

        $this->pagination->initialize($config);
			
        $this->template->set('tree_menu' ,  json_encode($tree));
        $this->template->set('id'        , $id);
        $this->template->set('category'  , $category[0]);
        $this->template->set('data'      , $data) ;
        $this->template->set('offset'    , $offset) ;
        $this->template->set('lang'      , $default_lang);
        $this->template->render();
	}




	public function insert($id = false)
	{
        if($id===false)  redirect('/', 'refresh');
        
        $this->load->model('languages');    
        $message = '';

        if($_POST)
        {
        echo var_dump($this->input->post());
            if($this->form_validation->run('content_insert') != FALSE)
            {
               $message = $this->contents->add_content( $id , $_POST);
            }
        }       
        
        $languages    = $this->languages->get_langs();
        
        $this->template->set('id'            , $id);
        $this->template->set('message'       , $message);
        $this->template->set('langs'         , $this->languages->get_langs());
        $this->template->set('lang_default'  , $this->languages->default_lang());
        $this->template->render();
	}





	public function edit($id = false , $category_id = false, $lang_id = false)
	{
        if($id===false)  redirect('/', 'refresh');
      
        $this->load->model('images');    
        $this->load->model('languages');    
        $this->load->model('contents_translation');    
        
        $message = '';

        if($_POST)
        {
            if($this->form_validation->run('content_insert') != FALSE)
            {
                $message = $this->contents->update_content( $id , $_POST);
            }
        }       
        
        $data          = $this->contents->get_content($id); 
        $translation   = $this->contents_translation->get_content_translations($id); 

        $dataImages = $this->images->get_image_in_content($id , $lang_id);
         
        $this->template->bind('content'     , $data[0]);
        $this->template->bind('translations' , $translation);
        $this->template->bind('data'        , $dataImages);
        $this->template->set(  'id'         , $id);
        $this->template->set('message'      , $message);
        $this->template->render();
	}





	public function delete($id = false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $content = $this->contents->delete_content($id);

	    redirect('/admin/content/lista/'.$parent);
    }




    public function active($id=false, $action=false, $parent=false, $offset=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $content = $this->contents->active_content($id , $action);
        $offset  = ($this->uri->segment(7)) ? (int) $this->uri->segment(7) : 0 ; 

	        redirect('/admin/content/lista/'.$parent.'/'.$offset);
    }
   
   
   
    
    public function move($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');
        
        $content = $this->contents->move_content($id , $action);
        $offset  = ($this->uri->segment(7)) ? (int) $this->uri->segment(7) : 0 ; 

	    redirect('/admin/content/lista/'.$parent.'/'.$offset);
    }
 
 
 
  
    public function tree($id = false) 
    {
        $this->load->model('categories');    
        $tree = $this->categories->tree_ajax(1 , 3);
    
        $this->template->set('tree_menu' ,  json_encode($tree));
        $this->template->render();
    } 
   

    public function tree_ajax($id = false) 
    {
       
        $this->load->model('categories');    
        $tree = $this->categories->tree_ajax($id , $id);
       
        echo  json_encode($tree);
                
    } 
	


    public function delete_image($id = false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $this->load->model('images');    
        $this->images->delete_image($id);

	    redirect('/admin/content/edit/'.$parent.'#tabs-2');
    }




    public function active_image($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $this->load->model('images');    
        $this->images->active_image($id , $action);
        
	    redirect('/admin/content/edit/'.$parent.'#tabs-2');
    }
   
   
   
    
    public function highlight_image($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $this->load->model('images');    
        $this->images->highlight_image($id , $action,  $parent);
        
	    redirect('/admin/content/edit/'.$parent.'#tabs-2');
    }
   
   
   
    
    public function move_image($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');
        
        $this->load->model('images');    
        $this->images->move_image($id , $action);
       
	    redirect('/admin/content/edit/'.$parent.'#tabs-2');
    }
}

