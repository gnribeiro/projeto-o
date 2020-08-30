<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination extends CI_Controller {

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
    }

	public function index()
	{
        $this->load->library('pagination');

        $config['base_url'] = 'http://code.digitalgar.com/admin/pagination/index';
        $config['total_rows'] = $this->getTotalData();
        $config['per_page'] = 2; 
        $config['num_links']= 2;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
       
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0 ; 
        $sql = "SELECT name FROM categories LIMIT ".$offset.", 5";
        $q = $this->db->query($sql);
        
        foreach($q->result() as $value){
          echo   $value->name."<br>";
        }

        echo $this->pagination->create_links();
	
    
    
    
    }

	public function my_ajax()
	{
	    
        $config['base_url'] = '/admin/pagination/my_ajax';
        $config['total_rows'] = $this->getTotalData();
        $config['per_page'] = 3; 
        $config['num_links']= 5;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0 ; 
        $sql = "SELECT name FROM categories LIMIT ".$offset.", 5";
        
        $q = $this->db->query($sql);
        $data['results'] = $q->result();
        
        $data['page'] =  $this->pagination->create_links();
        $this->load->view('my_data_ajax', $data);
    
    }





	public function ajax()
	{
		$this->load->library('Table'); 
		$this->load->helper('html');
        $this->load->library('Ajax_pagination');
	    
        $data['makeColums'] = $this->makeColums();
        $data['getTotalData'] = $this->getTotalData();
        $data['perPage'] = $this->perPage();
        
        $this->load->view('my_data_page', $data);
    
    }
	

    public function getData()
    {

        $page = $this->input->post('page'); //Look at $config['postVar']
        if(!$page):
        $offset = 0;
        else:
        $offset = $page;
        endif;

        $sql = "SELECT name FROM categories LIMIT ".$offset.", ".$this->perPage();
        $q = $this->db->query($sql);
        return $q->result();
    }
    
    public function getTotalData()
    {
        $sql = "SELECT * FROM categories";
        $q = $this->db->query($sql);
        return $q->num_rows();
    }



    public function perPage()
    {
        return 2; //define total records per page
    }

    public function makeColums()
    {
        $peoples = $this->getData();
        foreach($peoples as $pep):
        $data[] = $pep->name;
        endforeach;
        return  $this->table->make_columns($data, 6);
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
