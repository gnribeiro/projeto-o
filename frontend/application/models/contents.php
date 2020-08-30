<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
            

class Contents extends CI_Model {


    /**FRONTEND*/
    

    public function get_content_lite($id , $lang)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {

        $this->load->model("languages");
        $id_lang = $this->languages->id_lang($lang);

            $sql   = "select contents_translation.title , contents_translation.sumary , contents_translation.description from contents_translation inner join contents on contents.id = contents_translation.contents_id where contents.category_id = ? and contents.active = 1 and contents_translation.language_id = ? order by contents.pos asc";         
            $query = $this->db->query($sql , array($id , $id_lang));
            
            
            if ($query->num_rows() > 0)
            {    
                    foreach($query->result() as $row)
                    {
                        $data[] = $row;
                    }
                    
                    $query->free_result();
            }
    
       }
            
       return $data;
    }
    
    public function get_content($id , $lang)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {
        
            $this->load->model("languages");
            $id_lang = $this->languages->id_lang($lang);

            $sql   = "select contents.id , categories.permalink, category_translation.title as category_title, contents_translation.title as content_title , contents_translation.sumary, contents_translation.description  from contents left join contents_translation on contents_translation.contents_id = contents.id left join categories on contents.category_id = categories.id left join category_translation on category_translation.category_id = categories.id where contents.category_id = ? and category_translation.language_id  = ? and contents_translation.language_id  = ? and contents.active = 1 order by contents.pos asc;";         
            $query = $this->db->query($sql , array($id , $id_lang , $id_lang));
            
            
            if ($query->num_rows() > 0)
            {    
                    foreach($query->result() as $row)
                    {
                        $data[] = $row;
                    }
                    
                    $query->free_result();
            }
    
       }
            
       return $data;
    }
    
    public function get_content_images($id , $lang)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {
            
            $this->load->model("languages");
            $id_lang = $this->languages->id_lang($lang);

            $sql   = "select contents.id , categories.permalink,  category_translation.title as category_title, contents_translation.title as content_title , contents_translation.sumary, contents_translation.description , images.thumb , images.url  from contents left join contents_translation on contents_translation.contents_id = contents.id left join  images on images.content_id = contents.id left join categories on contents.category_id = categories.id left join category_translation on category_translation.category_id = categories.id where contents.category_id = ? and category_translation.language_id = ? and contents_translation.language_id = ? and contents.active = 1 and ( images.active = 1 and images.highligt = 1) order by contents.pos asc;";         
            
            $query = $this->db->query($sql , array($id , $id_lang, $id_lang));
                           
            
            if ($query->num_rows() > 0)
            {    
                    foreach($query->result() as $row)
                    {
                        $data[] = $row;
                    }
                    
                    $query->free_result();
            }
    
       }
            
       return $data;
    }

}
