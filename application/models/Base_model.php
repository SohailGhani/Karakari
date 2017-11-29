<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class base_model extends CI_Model {

         public function get_items(){
            $this->db->select('*');
            $query=$this->db->get('items');
            return $query->result();
        }


        public function get_payees(){
            $this->db->select('*');
            $query=$this->db->get('payeesaccounts');
            return $query->result();
        }
       
}
