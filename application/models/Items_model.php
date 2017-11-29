<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class items_model extends CI_Model {

    public function get_items(){
            $this->db->select('*');
            $query=$this->db->get('items');
            return $query->result();
        }
        function item_insert($data){
            $this->db->insert('items', $data);

        }
}


