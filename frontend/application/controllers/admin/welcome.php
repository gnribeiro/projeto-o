<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function  __construct()  {
    
        parent::__construct();
echo "admin";            
    }

	public function index()
	{
        $this->template->set('nome' , 'gon2');
        $this->template->render();
	}
	
    public function home($id=false)
	{
        #$this->load->model('Products');    
        #$products = $this->Products->get_prd($id);
        #$products = $this->Products->get_prd_escape($id);
        $products = $this->Products->get_prd_ci($id);
        $this->template->set('nome' , 'rita');
        $this->template->set('products' , $products);

       // $tg = 'rita';
        $this->template->bind('nome2' , $tg);
        $this->template->render();
	}
    

    public function crud($id=false)
	{
        $data = array(
            'name'        => 'livro111',
            'description' => 'crud desc'
        );

        #$this->Products->add_record($data);
        #$this->Products->update_record(1 ,$data);
        $this->Products->delete_record(3);
        
        $this->template->render();
	}
    public function upload()
	{

echo "admin";

       #$this->config->set_item('language', 'portuguese'); 
      # echo $this->config->item('language');
       
       # $this->lang->load('email');
   # echo    $this->lang->line('email_must_be_array')."<br />";
      
      #  email
      $conf =$this->config->load('template', true);

    #   echo $this->config->item('template' , 'template');
        
        $this->form_validation->set_message('required', 'O Campo %s é de preenchimento obrigatorio');

        if($this->input->post('upload'))
        {
            if($this->form_validation->run('email') != FALSE)
            {
                $this->Products->upload_image();
            }
        }
        
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
