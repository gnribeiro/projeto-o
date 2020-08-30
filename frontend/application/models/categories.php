<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Model {
    
    /**FRONTEND METHODS**/

    public function menu ($parent_id , $lang){
       $data = array();

       $sql = "select categories.permalink, categories.id, categories.have_childs, languages.i18n, category_translation.title, category_translation.language_id from category_translation inner join categories on categories.id = category_translation.category_id  inner join languages on  category_translation.language_id = languages.id where parent_id  = ? and category_translation.language_id = (select id from languages where i18n = ?) and categories.active=1 order by categories.position;";

       $query = $this->db->query($sql , array($parent_id , $lang));
       
       if ($query->num_rows() > 0){
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            
            $query->free_result();
       }
        
       return $data;
    }


    /*END*/


    /*CRUD*/

    public function get_parent_details($id)
    {
       $data  = array() ;
       $sql   = "select id, name , parent_id from categories where id = (select parent_id from categories where id = ?)";         
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





    public function get_parent($id)
    {
       $data  = array() ;
       $sql   = "select id, name , parent_id, permalink from categories where id = ? order by id ASC";         
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





    public function get_catg($id)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) {

            $sql   = "select * from categories where id = ?";         
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

    public function count_catg($parent)
    {
       $data  = 0;
       $sql   = "select count(id) as num_childs from categories where parent_id = ?";         
       $query = $this->db->query($sql , $parent);
       
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


    public function &get_parents($id)
    {
        $parents = array(); 
        $parent  = $this->get_parent($id);
   
        foreach ($parent as $value)
        { 
        
            if($value->parent_id != '')
            {
                $parents[] = $value;
                $parents   =   array_merge($this->get_parents($value->parent_id), $parents);
            
            }
        }

        return $parents;
    }




    public function get_parents_path($id)
    {
        $path = array(); 
        $parent  = $this->get_parent($id);
   
        foreach ($parent as $value)
        { 
        
            if($value->parent_id != '')
            {
                $path[] = $value->parent_id;
                $path   = array_merge($this->get_parents($value->parent_id), $path);
            
            }
        }

        return $path;
    }


	public function &tree_ajax($id , $current_ctg)
	{
        
        $parents = array();    
        $tree_parents = $this->get_parents_path($current_ctg);

            foreach($tree_parents as $v)
            {
                array_push($parents , $v);
            }
        
        $category = $this->get_children_tree($id);

        
        foreach ($category as $values)
        {

            $tree_nodes = &$ref_tree_nodes[$values->id];
            $tree_nodes['data']['title'] = $values->name;
            $tree_nodes['data']['attr']['href'] = '/admin/'.$values->type_content.'/lista/'.$values->id.'/';
            $tree_nodes['attr']['id']= $values->id;
            
            if( $values->have_childs)
            {
                if(in_array($values->id , $parents))
                {
                    
                    $tree_nodes['state'] = 'open';
                    $tree_nodes['children'] = $this->tree_ajax($values->id , $current_ctg);
                }
                else{
                    $tree_nodes['attr']['class']= 'jstree-closed';
                }
            }

                $category_tree[] = &$tree_nodes;

        }
        
        return  $category_tree;

	}



    public function get_children_tree($id)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) 
       {
            $sql   = "select id, name, have_childs, parent_id, permalink, type_content from categories where parent_id = ? order by position asc";      
    
            $query = $this->db->query($sql , array($id));
       
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



        
    public function count_children($id)
    {
       $data  = 0;
       $sql   = "select count(id) as num_childs from categories where parent_id = ?";         
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




    
    public function last_children($id)
    {
       $data  = array() ;
       $sql   = "select id, position from categories where parent_id = ? order by position desc  limit 1";         
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




    
    public function get_children($id, $offset , $itens)
    {
       $data  = array() ;

       if(preg_match('/^[0-9]+$/' , $id)) 
       {
            $sql   = "select id, name, parent_id, permalink, active, user_edit,  position, module, have_childs, (select id from categories where parent_id = ? order by position desc  limit 1) as last_child, (select id from categories where parent_id = ? order by position asc  limit 1) as first_child from categories where parent_id = ? order by position asc limit ? , ?";         
    
            $query = $this->db->query($sql , array($id , $id, $id, $offset , $itens));
       
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



        
	public function catg_exist($id , $name, $permalink)
	{
		$check = false;
        $sql   = "select id, name , permalink  from categories where parent_id = ? ";         
        $query = $this->db->query($sql , 2);
            
            
            if ($query->num_rows() > 0)
            {    
                    foreach($query->result() as $values)
                    {
                        if(($values->name == $name) OR ($values->permalink == $permalink))
                        {
                            $check = true;
                            break;
                        }

                    }
                    
                    $query->free_result();
            }

            return $check;
	}




    public function add_category($id , $data)
    {
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id))
        {
            if($this->categories->catg_exist($id , $data['name'], permalink_admin($data['name']))){
      
              throw new Exception ('Esta categoria já existe');   
      
            }

            $last_children =  $this->last_children($id);
            $position      = ($this->count_children($id) != 0) ? $last_children[0]->position + 1  : 1;
            $other_fields  = array(
                                'permalink' => permalink_admin($data['name']),
                                'position'  => $position
                            
                            );
         
            $query = $this->db->insert( "categories", (array_merge($data , $other_fields)));
        } 
       
        return $query;
    }

   
   
    
    public function update_category($id , $data)
    {
        $query     = false;
        $category  = $this->get_catg($id);
            
        if(preg_match('/^[0-9]+$/' , $id))
        {
            if($category[0]->permalink !=  permalink_admin($data['name']))
            {
            
                if($this->categories->catg_exist($id , $data['name'], permalink_admin($data['name'])))
                {
        
                    throw new Exception ('Esta categoria já existe');   
        
                }
            }
            
            $query = $this->db->update( "categories", (array_merge($data , array('permalink' => permalink_admin($data['name'])))) , array('id' => $id)) ;
        } 
       
        return $query;
    }



    
    public function &delete_category($id)
    {
        
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id))
        {
             $query  = $this->db->delete('categories' , array('id ' => $id));
             $sql    = "select id from categories where parent_id = ?";
             $result = $this->db->query($sql , array('id ' => $id));
             
             if($result->num_rows() > 0)
             {
                foreach($result->result() as $row)
                {
                    $this->delete_category($row->id);
                }

             }       
            
             $result->free_result();
            
        }
             
        return $query; 
    }





    public function active_category($id , $action)
    {
        
        $query  = false;

        if(preg_match('/^[0-9]+$/' , $id) AND preg_match('/^(1|0){1,1}$/' , $action))
        {
             $query = $this->db->update('categories' , array('active'=> $action) , array('id ' => $id));
        }
             
        return $query; 
    }




    public function move_category($id , $action)
    {
        if(!preg_match('/^[0-9]+$/' , $id) AND !preg_match('/^(up|down)$/' , $action)) return;

        $sql_escape     = array($id , $id, $id , $id, $id);
        $query_alter    = false;
        $query_id       = false;
        $sql_action     = array(
                            'condition' => ($action == 'up') ? '<': '>', 
                            'orderby'   => ($action == 'up') ? 'desc': 'ASC'
                          ); 

        $sql ="select id, position, (select id from categories where parent_id=(select parent_id from categories where id=?) and position ".$sql_action['condition']." (select position from categories where id= ? )  order by position ".$sql_action['orderby']." limit 1) as alter_id, (select position from categories where parent_id=(select parent_id from categories where id=?) and position ".$sql_action['condition']."(select position from categories where id= ?) order by position ".$sql_action['orderby']." limit 1) as alter_position from categories where id= ?";

        $query = $this->db->query($sql , $sql_escape);
        $data  = $this->fetch_category($query);
        $data  = $data[0];

        if($data->alter_id != NULL AND $data->alter_position != NULL){ 
            $query_alter  = $this->db->update('categories' , array('position'=> $data->position) , array('id ' => $data->alter_id));
            $query_id     = $this->db->update('categories' , array('position'=> $data->alter_position) , array('id ' => $id));
        }
        
    } 




    
    public function fetch_category($query)
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

}
