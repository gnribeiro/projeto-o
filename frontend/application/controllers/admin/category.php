<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller 
{
    public function  __construct()  
    {
        parent::__construct();
        
        $this->load->model('categories');    
        $this->load->helper('admin');    
    }



	
	public function lista($id = false, $offset=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $offset         = ($offset) ? (int) $offset : 0 ; 
        $itens_per_page = 10;
        $category       = $this->categories->get_catg($id);
        $data           = $this->categories->get_children($id, $offset, $itens_per_page);
        $tree           = $this->categories->tree_ajax(1 , $id);
        
        $config['base_url']    = '/admin/category/lista/'.$id.'/';
        $config['total_rows']  = $this->categories->count_catg($id);
        $config['per_page']    = $itens_per_page; 
        $config['num_links']   = 2;
        $config['uri_segment'] = 5;


        $this->pagination->initialize($config);
     
        $this->template->set('id'       , $id);
        $this->template->set('category' , $category[0]);
        $this->template->set('data'     , $data) ;
        $this->template->set('tree_menu' ,  json_encode($tree)) ;
        $this->template->set('offset'     , $offset) ;
        $this->template->render();
    }




	public function insert($id = false)
	{
        if($id===false)  redirect('/', 'refresh');
        
        $errors  = '';
        $message = '';

        if($_POST)
        {
            if($this->form_validation->run('category_insert') != FALSE)
            {
                try
                {
                     $message = $this->categories->add_category( $id , $_POST);
                }    
        
                catch(Exception $e)
                {
                    $errors = $e->getMessage();
                }
            }
        }       
        
        $this->template->set('id' , $id);
        $this->template->set('message' , $message);
        $this->template->set('errors' , $errors);
        $this->template->render();
	}





	public function edit($id = false)
	{
        if($id===false)  redirect('/', 'refresh');
      
        $errors  = '';
        $message = '';

        if($_POST)
        {
            if($this->form_validation->run('category_insert') != FALSE)
            {
                try
                {
                     $message = $this->categories->update_category( $id , $_POST);
                }    
        
                catch(Exception $e)
                {
                    $errors = $e->getMessage();
                }
            }
        }       
        
        $data = $this->categories->get_catg($id); 
        
        $this->template->bind('data' , $data[0]);
        $this->template->set('id' , $id);
        $this->template->set('message' , $message);
        $this->template->set('errors' , $errors);
        $this->template->render();
	}





	public function delete($id = false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $category = $this->categories->delete_category($id);
        $offset  = ($this->uri->segment(7)) ? (int) $this->uri->segment(7) : 0 ; 

	    redirect('/admin/category/lista/'.$parent.'/');
    }




    public function active($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $category = $this->categories->active_category($id , $action);
        $offset  = ($this->uri->segment(7)) ? (int) $this->uri->segment(7) : 0 ; 

	    redirect('/admin/category/lista/'.$parent.'/'.$offset);
        
    }
   
   
   
    
    public function move($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');
        
        $category = $this->categories->move_category($id , $action);
        $offset  = ($this->uri->segment(7)) ? (int) $this->uri->segment(7) : 0 ; 

	    redirect('/admin/category/lista/'.$parent.'/'.$offset);
       
    }
 
 
 
  
    public function tree($id = false) 
    {
        $tree = $this->categories->tree_ajax(1 , 2);
   
            echo 'teste'.json_encode($tree);
    
        $this->template->set('tree_menu' ,  json_encode($tree));
        $this->template->render();
    } 
   



    public function tree_ajax($id = false) 
    {
       
       $tree = $this->categories->tree_ajax($id , $id);
       
       echo  json_encode($tree);
                
    } 
}

