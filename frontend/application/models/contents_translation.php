<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_translation extends CI_Model {
    
    public function get_content_translations($id)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {

            $sql   = "SELECT  languages.default as lang_default ,  contents_translation.id as id , contents_translation.language_id  as language_id , contents_translation.title as title, contents_translation.sumary as sumary, contents_translation.description, languages.i18n as i18n, languages.name as lang_name FROM languages inner join `contents_translation` on languages.id = contents_translation.language_id   WHERE contents_translation.contents_id = ? order by languages.id asc";         
            
            $query = $this->db->query($sql , array($id ));
            
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


    public function add_translation_content($content_id , $data)    
    {
        $this->load->model('languages');    
        $langs =  $this->languages->get_langs();

        foreach ($langs as $lang){
            $translation   = array(
                                "title"       => $data['title_'.$lang->i18n],
                                "sumary"      => $data['sumary_'.$lang->i18n],
                                "description" => $data['description_'.$lang->i18n],
                                "language_id" => $data['language_id_'.$lang->i18n],
                                'contents_id' => $content_id
                            );

            $query = $this->db->insert( "contents_translation", ($translation));
        }

    }   
    
    public function update_content_translation($data)
    {
            
        $this->load->model('languages');   
         
        $query           = false;
        $langs           =  $this->languages->get_langs();


        foreach ($langs as $lang){
            $translation_id =  $data['translation_id_'.$lang->i18n];
            
            $translation    = array(
                                "title"          => $data['title_'.$lang->i18n],
                                "sumary"         => $data['sumary_'.$lang->i18n],
                                "description"    => $data['description_'.$lang->i18n],
                            );
            
            $query = $this->db->update( "contents_translation", $translation  , array('id' => $translation_id)) ;
        }
            
       
        return $query;
    }


}
