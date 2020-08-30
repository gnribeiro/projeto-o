<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends MY_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
            
    }

	public function index()
	{
        $this->lang->load('contacts');
        
        if($_POST){
                      
            if($this->form_validation->run('contacts') != FALSE){
                
                $this->load->helper('security'); 
                $this->load->spark('swift-mailer');

                $transport = Swift_SmtpTransport::newInstance('mail.oelenergia.com', 25)
                                            ->setUsername('site+oelenergia.com')
                                            ->setPassword('Eot{_r_A(3{/<DGmf'); 
                
                $mailer  = Swift_Mailer::newInstance($transport); 
                                $from       = xss_clean($_POST['email']);
                                $from_name  = xss_clean($_POST['nome']);
                                $assunto    = xss_clean($_POST['assunto']);
                                $mensagem   = xss_clean($_POST['mensagem']);
            
                $data['mensage'] = $mensagem; 
                $data['nome']    = $from_name; 
                $data['email']   = $from; 
        
                $view    = $this->load->view('mail/contact', $data, TRUE);;
                            
                $message = Swift_Message::newInstance()
                            ->setSubject($assunto )
                            ->setFrom(array('site@oelenergia.com' => $from_name))
                            ->setTo(array('geral@oelenergia.com'))
                            ->addPart($view , 'text/html');
                            
                $callbak_msg  = $mailer->send($message);
            }       
        }
     
        $this->load->model('contents');
        $data = $this->contents->get_content_images(8 , $this->lang->lang());
        $data = (count($data)!= 0) ? $data[0] : ''; 
        
        
        $this->template->set('data'        , $data);     
        $this->template->bind('message' , $callbak_msg);     
        $this->template->render();

	}
}	
