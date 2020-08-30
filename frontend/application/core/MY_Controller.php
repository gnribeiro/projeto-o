<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  

class MY_Controller extends CI_Controller {
    

    public function __construct()
    {
        parent::__construct();
        
        /** SET DEFAULT LANGUAGE IF ANY IS SET***/

        if($this->lang->lang() === NULL) {
            $this->config->set_item('language', 'portuguese');
        }
        /*END**/
        $this->lang->load('site');

        $menu       = $this->get_menu();
        $title      =  'Home';
        $breadcumbs =  $this->get_breadcumbs($menu , &$title);

        $this->template->set('breadcumbs_data' , ''); 
        $this->template->set('menu_data'       , $menu); 
        $this->template->set('title'           , $title); 
        $this->template->set('breadcumbs'      , $breadcumbs); 
        $this->template->set_layout('template');
    }




    public function get_breadcumbs ($ctg = array() , $title){
            $this->load->spark('breadcrumb/1.0.0'); # Don't forget to add the version!
            $this->load->library('breadcrumb');
            $this->breadcrumb->append_crumb('Home', '/'.$this->lang->lang().'/home/'); 
            
            $current_ctg     =  $this->router->fetch_class();
            $total_segments  =  $this->uri->total_segments();
            $current_segment =  ($total_segments > 4) ? $this->uri->segment(4) : $this->uri->segment($total_segments);

            if ($current_ctg != 'home'){
                foreach($ctg[1] as $value){
                    if ($value->permalink == $current_ctg) {
                        $this->breadcrumb->append_crumb( $value->title, '/'.$this->lang->lang().'/'.$value->permalink.'/');
                        $title = $value->title;
                            
                        if($value->have_childs == 1 and $total_segments > 2){
                            foreach ($ctg[$current_ctg] as $v) {
                                if($v->id == $current_segment) {
                                    $this->breadcrumb->append_crumb( $v->title, '/'.$this->lang->lang().'/'.$value->permalink.'/'.$v->permalink.'/'.$v->id.'/');
                                $title = $value->title.' :: '.$v->title;
                                } 
                            }
                        }
                    }              
                }
            }
            
        return $this->breadcrumb->output(); 

    }


    private function get_menu()
    {
        $this->load->model('categories');    
       
        $menu_data = array(
            '1'            => $this->categories->menu(1 , $this->lang->lang()),
            'competencias' => $this->categories->menu(5 , $this->lang->lang()),
            'obras'        => $this->categories->menu(7 , $this->lang->lang())
        );
        
        return  $menu_data;
    }
    
    protected function show_404($page = ''){

        header("HTTP/1.1 404 Not Found");
        
        $heading = "404 Page Not Found";
        $message = "The page you requested was not found ";
        
        $CI =& get_instance();
        $CI->load->view('/*Name of you custom 404 error page.*/');

    }
    
}

