<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function get_items(){
            $this->db->select('*');
            $query=$this->db->get('items');
            return $query->result();
        }
    public function get_item($id){
            $this->db->select('*');
            $this->db->where('itemId',$id);
            $query=$this->db->get('items');
            return $query->row_array();
        }
        public function get_reloads($from,$to,$id){
            $this->db->select('stockin.*,items.itemName');
            $this->db->join('items', 'items.itemId=stockin.itemid');
            $this->db->where('inDate >=', $from);
            $this->db->where('inDate <=',$to);
            $this->db->where('stockin.itemId',$id);
            $this->db->order_by('inDate','ASC');
            $query=$this->db->get('stockin');
            return $query->result();
        }
        function reload_insert($data){
             $this->db->query("UPDATE items SET itemQuantity=itemQuantity+".$data['quantity']." WHERE itemId=".$data['itemId']);

            $this->db->select('itemQuantity');
            $this->db->where('itemId',$data['itemId']);
            $query=$this->db->get('items');
            $res=$query->row_array();

             $data['lastStock']=$res['itemQuantity'];
            $this->db->insert('stockin',$data);

        }
        function reload_delete($id){
            $this->db->select('quantity');
            $this->db->where('id',$id);
            $query=$this->db->get('items')->row_array;
            $this->db->where('id',$id);
            $this->db->delete('stockin', $data);
             $this->db->query("UPDATE items SET itemQuantity=itemQuantity-".$query['quantity']." WHERE id=".$id);
            }
        function currency_insert($data){
            $this->db->insert('items', $data);
            }
        function item_update($data,$id){
            $this->db->where('itemId',$id);
            $this->db->update('items', $data);
        }
        function item_delete($id){
            $this->db->where('itemId',$id);
            $this->db->delete('items');
        }
        
          
   
}
