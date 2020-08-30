<?php

class Languages extends CI_Model {
    
    public function get_langs()
    {
       $data  = array() ;

        $sql   = "select * from `languages` ";         
        $query = $this->db->query($sql);
        
        
        if ($query->num_rows() > 0)
        {    
                foreach($query->result() as $row)
                {
                    $data[] = $row;
                }
                
                $query->free_result();
        }
    
            
       return $data;
    }
    
    public function default_lang()
    {
       $data  = array() ;

        $sql   = "SELECT * FROM  `languages` WHERE  `default` = 1";         
        $query = $this->db->query($sql);
        
        
        if ($query->num_rows() > 0)
        {    
                foreach($query->result() as $row)
                {
                    $data[] = $row;
                }
                
                $query->free_result();
        }
    
            
       return $data;
    }
    
    public function id_lang($i18n)
    {

        $sql   = "SELECT id FROM  `languages` WHERE  `i18n` = ?";         
        $query = $this->db->query($sql , $i18n);
        
        
        if ($query->num_rows() > 0)
        {    
                foreach($query->result() as $row)
                {
                    $data = $row->id;
                }
                
                $query->free_result();
        }
    
            
       return $data;
    }

}
