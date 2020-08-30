<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function  __construct()  
    {
        parent::__construct();
        
    }


    public function index()
    {

        
       $is_logged_in = $this->session->userdata('is_logged_in'); 
       
       if($is_logged_in == true)
        {
             redirect('/admin/home', 'refresh');
     
        }   

        $data['error'] = '' ;       
        
        if($_POST)
        {
            if($this->form_validation->run('login') != FALSE)
            {
                $this->load->model('admin');
                $login = $this->admin->validate();
                
                if($login)
               {
                    $this->session->set_userdata('username', $this->input->post('username'));                
                    $this->session->set_userdata('is_logged_in', TRUE);                
                    redirect('/admin/home', 'refresh');
                }
                else
                {
                    $data['error'] = 'Password ou Username incorrectos';    
                }
            }
        }  
       
        $this->load->view('login/login' , $data); 
    }
	
    

    function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }



    private function validation($username , $password)
    {
        
        $this->config->load('user', true); 
        $user = $this->config->item('users' , 'user');
   
    
		if(array_key_exists($username , $user))
		{
			if($user[$username]['password'] == $password )
			{
				return true;
			}

			else 
			{
				throw new Exception ('Password incorrecta');	
				return  false;
			}
		}


		else 
		{
			throw new Exception ('Username incorrecto');		
			return  false;			
		}	
    }

}

