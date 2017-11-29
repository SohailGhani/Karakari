<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function get_users(){
            $this->db->select('users.userId,users.user_name,users.email,users.password,users.contact_no');
            $query=$this->db->get('users');
            return $query->result();
        }
    public function get_user($id){
        $this->db->select('*');
        $this->db->where('userId',$id);
        $query=$this->db->get('users');
        return $query->row_array();
    }
    function user_insert($data){
            $this->db->insert('users', $data);
        }
    function user_update($data,$id){
            $this->db->where('userId',$id);
            $this->db->update('users', $data);
        }
    function user_delete($id){
        $this->db->where('userId',$id);
        $this->db->delete('users');
    }
    public function can_login($data){
            
            $this->db->select('*');
            $this->db->where($data);
            $query=$this->db->get('users')->row_array();
  
            if($this->db->affected_rows()<1):
                return FALSE;
            else: 
                $id=$query['userId'];
                $name=$query['name'];
                $email=$query['email'];
                $this->session->set_userdata(array('userId'=>$id,'username'=>$name,'email'=>$email));
              
                return TRUE;
            
            endif;
                      
        }
 //===================================================================   

}