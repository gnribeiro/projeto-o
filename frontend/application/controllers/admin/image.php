<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends MY_Controller 
{
    public function  __construct()  
    {
        parent::__construct();
        
        $this->load->model('images');    
    }



	
	public function lista($id = false , $id_lang=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $data['data']    = $this->images->get_image_in_content($id , $id_lang);

    #echo var_dump($data); 
      $this->load->view('content/list_image.php' , $data);
    }




    public function upload (){
    
        if($_FILES)
        {
            $this->images->image_upload($_FILES , $_POST['category_id'], $_POST['id'] ,$_POST['language_id'] ,  array('width'=>'150' , 'height'=>'150'));
        }
    }
 
    

	public function delete($id = false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

        $this->images->delete_image($id);

	    redirect('/admin/image/lista/'.$parent);
    }




    public function active($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');

         $this->images->active_image($id , $action);
        
	    redirect('/admin/image/lista/'.$parent);
    }
   
   
   
    
    public function move($id=false, $action=false, $parent=false)
	{
        if($id===false)  redirect('/', 'refresh');
        
        $this->images->move_image($id , $action);
       
	    redirect('/admin/image/lista/'.$parent);
    }
}

