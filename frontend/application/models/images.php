<?php

class Images extends CI_Model {
    

    public function get_images($id)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {

            $sql   = "select * from images where id = ?";         
            $query = $this->db->query($sql , $id);
            
            
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




    public function count_images($id)
    {
       $data  = 0;
       $sql   = "select count(id) as num_childs from images where content_id = ?";         
       $query = $this->db->query($sql , $id);
      
       
       if ($query->num_rows() > 0)
       {    
            foreach($query->result() as $row)
            {
                $data = $row->num_childs;
            }
            
            $query->free_result();
       }
        
       return $data;
    }




    
    public function last_image($id)
    {
       $data  = array() ;
       $sql   = "select id, pos from images where content_id = ? order by pos desc  limit 1";         
       $query = $this->db->query($sql , $id);
      
       
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




    
    public function get_image_in_content($id , $language_id)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) 
       {
    
            $sql   = "select id, content_id, active,thumb, highligt, url, pos, (select id from images where content_id = ? order by pos desc  limit 1) as last_child, (select id from images where content_id = ? order by pos asc  limit 1) as first_child from images where content_id = ? and language_id= ? order by pos asc"; 
                    
            $query = $this->db->query($sql , array($id , $id, $id, $language_id));
       
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




    public function add_image($id , $data)
    {
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id))
        {

            $last_children =  $this->last_image($id);
            $position      = ($this->count_images($id) != 0) ? $last_children[0]->pos + 1  : 1;
            $other_fields  = array(
                                'pos'  => $position
                            );
         
            $query = $this->db->insert( "images", (array_merge($data , $other_fields)));
        } 
       
        return $query;
    }

   
   
    
    public function delete_image($id)
    {
        
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id))
        {
            $files = $this->get_images($id);

             $query  = $this->db->delete('images' , array('id ' => $id));
        
             $this->config->load('site', true); 
             $path = $this->config->item('host' , 'site');
            
             if( $query)
             {
                foreach($files as $value)
                {
       
                    if(file_exists($path.$value->url))   unlink($path.$value->url);
                    if(file_exists($path.$value->thumb)) unlink($path.$value->thumb);
                }
            
             }
            
        }
        return $query; 
    }





    public function active_image($id , $action)
    {
        
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id) AND preg_match('/^(1|0){1,1}$/' , $action))
        {
             $query = $this->db->update('images' , array('active'=> $action) , array('id ' => $id));
        }
             
        return $query; 
    }



    public function check_highlight($parent)
    {
        $sql    = "select id from images where content_id = ? and highligt = 1";
        $query  = $this->db->query($sql , array($parent)); 
        $result = ($query->num_rows() > 0) ? 1 : 0;
        
        return $result;
    }
    
    
    
    public function highlight_image($id , $action, $parent)
    {
        
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id) AND preg_match('/^(1|0){1,1}$/' , $action))
        {
            if($action == 1)
            {

                if( !$this->check_highlight($parent)){
                    $query = $this->db->update('images' , array('highligt'=> $action) , array('id ' => $id));
                } 
            }
            else{
                $query = $this->db->update('images' , array('highligt'=> $action) , array('id ' => $id));
            }
        }
             
        return $query; 
    }




    public function move_image($id , $action)
    {
        if(!preg_match('/^[0-9]+$/' , $id) AND !preg_match('/^(up|down)$/' , $action)) return;

        $sql_escape     = array($id , $id, $id , $id, $id);
        $query_alter    = false;
        $query_id       = false;
        $sql_action     = array(
                            'condition' => ($action == 'up') ? '<': '>', 
                            'orderby'   => ($action == 'up') ? 'desc': 'ASC'
                          ); 

        $sql ="select id, pos, (select id from images where content_id=(select content_id from images where id=?) and pos ".$sql_action['condition']." (select pos from images where id= ? )  order by pos ".$sql_action['orderby']." limit 1) as alter_id, (select pos from images where content_id=(select content_id from images where id=?) and pos ".$sql_action['condition']."(select pos from images where id= ?) order by pos ".$sql_action['orderby']." limit 1) as alter_position from images where id= ?";

        $query = $this->db->query($sql , $sql_escape);
        $data  = $this->fetch_image($query);
        $data  = $data[0];

        if($data->alter_id != NULL AND $data->alter_position != NULL){ 
            $query_alter  = $this->db->update('images' , array('pos'=> $data->pos) , array('id ' => $data->alter_id));
            $query_id     = $this->db->update('images' , array('pos'=> $data->alter_position) , array('id ' => $id));
        }
        
    } 




    
    public function fetch_image($query)
    {
        $data = array();
            
            if($query->num_rows() > 0)
            {
                foreach($query->result() as $rows)
                {
                    $data[] = $rows;
                }
            }   
        $query->free_result();
        
        return $data ;
    }
    




    public function image_upload($file , $category_id, $content_id , $language_id ,$size_thumb = array())
    {
        $this->load->library('upload');
        
        foreach($file as $key => $image)
        {
            $path       = $this->create_dir($category_id); 
            $thumb_path = $path.'thumbs/';
            
            $config['upload_path']   = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['remove_spaces'] = 'true';
            $config['file_name']     = $image['name'];

            $this->upload->initialize($config);
    


            if($this->upload->do_upload($key)){
        
                $upload_data = $this->upload->data();
            
                if(count($size_thumb)>0)
                {
                    if($size_thumb['width']  > $upload_data['image_width'] )  $size_thumb['width']  = $upload_data['image_width'];
                    if($size_thumb['height'] > $upload_data['image_height'] ) $size_thumb['height'] = $upload_data['image_height'];

                    $this->resize_image($upload_data['full_path'], $thumb_path , $size_thumb);
                }
               
               
                

                $this->config->load('site', true);
       
                $pattern = $this->config->item('host_escape' , 'site');
                $url     = preg_replace('/'.$pattern.'/' ,  '' ,  $upload_data['full_path']) ;
                $thumb   = preg_replace('/'.$pattern.'/' ,  '' ,  $thumb_path.$upload_data['file_name']);

                $data = array(
                            'url'         => $url,
                            'thumb'       => $thumb,
                            'content_id'  => $content_id,
                            'language_id' => $language_id
                        );


                $this->add_image($content_id , $data);
            }

        }
    }




    
    private function create_dir($category_id)
    {
        $this->config->load('site', true);
        $this->load->model('categories');    
       
        $path = $this->config->item('host' , 'site');
        $path = $path.'uploads/images/';
        $parents = $this->categories->get_parents(2) ;

        foreach($parents as $v)
        {
            if ($v->id != 1)
            {
                $path .= $v->permalink.'/';
            }    
        }
    
         
        if(!is_dir($path))
        {     
            try
            {
                mkdir($path, 0777, true);
                mkdir($path.'thumbs/', 0777, true);

                return $path;
            }
            
            catch(Exception $e)
            {
                return false;
            }
        }
        else
        {
            return $path;
        }
    }
 
    
    
    public function resize_image($image_path , $thumb_path , $size = array())
    {
        $config =array(
           'source_image'   => $image_path, 
           'new_image'      => $thumb_path, 
           'maintain_ratio' => true,
           'width'          => $size['width'],
           'height'         => $size['height']
        );
       
        $this->load->library('image_lib' , $config);
        $this->image_lib->resize(); 

    }
}
