<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras_model extends CI_Model {
    
    public function get($id , $lang , $offset , $itens, $num_rows){
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {

        $this->load->model("languages");
        $id_lang = $this->languages->id_lang($lang);

            $sql   = "select category_translation.title as cat_title, obras_translation.cliente , obras_translation.ano , obras_translation.local ,obras_translation.duracao , obras_translation.descricao from obras left join obras_translation on obras.id = obras_translation.obras_id left join categories on obras.category_id = categories.id left join category_translation on category_translation.category_id = categories.id where obras.category_id = ? and obras.active = 1 and category_translation.language_id  = ? and obras_translation.language_id = ? order by obras.pos asc limit ? , ?";         
            $query = $this->db->query($sql , array($id , $id_lang,  $id_lang , $offset , $itens));
            
            
            if ($query->num_rows() > 0)
            {    
                $num_rows = $this->count($id , $id_lang);
                    foreach($query->result() as $row)
                    {
                        $data[] = $row;
                    }
                    
                    $query->free_result();
            }
    
       }
            
       return $data;
    
    }
    
    public function count($id , $id_lang){
    $data=array();
    
       if(preg_match('/^[0-9]+$/' , $id)) {

        $this->load->model("languages");

            $sql   = "select obras_translation.id from obras left join obras_translation on obras.id = obras_translation.obras_id left join categories on obras.category_id = categories.id left join category_translation on category_translation.category_id = categories.id where obras.category_id = ? and obras.active = 1 and category_translation.language_id  = ? and obras_translation.language_id = ? order by obras.pos asc ";         
            $query = $this->db->query($sql , array($id , $id_lang,  $id_lang ));
            
            
            if ($query->num_rows() > 0)
            {    
                $num_rows = $query->num_rows();
                $query->free_result();
            }
    
       }
            
       return $num_rows;
    
    }
    
}
