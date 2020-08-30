<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turnminify extends CI_Controller {
    
    public function  __construct()  {
    
        parent::__construct();
        if(!$this->input->is_cli_request()){
            $this->show_404('error404'); 
        }
    }

    public function js() {
        if($this->input->is_cli_request()){
           
            $path      = preg_replace('[frontend/application/]', 'www/', APPPATH);
            $dir       = $path.'dev.oelenergia.com/static/js/index/';
            $file_new  = $path.'dev.oelenergia.com/static/js/index.js';
            $output    = $this->minify_files ($dir , $file_new);
            
            echo  $output.PHP_EOL;
        }
    }

    public function css() {
        if($this->input->is_cli_request()){
           
            $path      = preg_replace('[frontend/application/]', 'www/', APPPATH);
            $dir       = $path.'dev.oelenergia.com/static/css/index/';
            $file_new  = $path.'dev.oelenergia.com/static/css/index.css';
            $output    =  $this->minify_files ($dir , $file_new);
            
            echo  $output.PHP_EOL;
        }
    }

    private function minify_files ($dir , $file_new)
    {
            $this->load->spark('minify/1.0.0');
            $this->load->driver('minify');
            
            $files = scandir($dir);
            
            if(file_exists($file_new))
            {
                unlink($file_new);
            }
        
            
            foreach ($files as $file){
                if(is_file($dir.$file)) {
                    
                    $minified = $this->minify->min($dir.$file);
                
                    file_put_contents($file_new, $minified, FILE_APPEND | LOCK_EX);
                }
            }

            return  $file_new; 
    }
    
    protected function show_404($page = ''){

        header("HTTP/1.1 404 Not Found");
        
        $this->load->helper('language');
        $this->load->helper('url');
        
        if($this->lang->lang() === NULL) {
            $this->config->set_item('language', 'portuguese');
        };
        $this->lang->load('errors');        
        
         $this->load->view('errors/404');

    }

}

	
