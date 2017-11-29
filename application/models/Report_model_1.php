<?php

class report_model extends CI_Model{

    function get_customer_summary($acid,$date){ // 
                $this->db->select('*');
                $this->db->where('entryDate', $date);
                
                $this->db->where('acId',$acid);
                $query = $this->db->get('accounts_meta');
                return $query->row_array();
                 
    }
    function get_cash_summary($curid,$date){ // 
                $this->db->select('*');
                $this->db->where('entryDate', $date);
                
                $this->db->where('currencyId',$curid);
                $query = $this->db->get('currencies_meta');
                return $query->row_array();
                 
    }
    public function sales_report($from,$to){
            $this->db->select('*');
            $this->db->where('saleDate >=', $from);
            $this->db->where('saleDate <=',$to);
            $this->db->join('sales_metas','sales_metas.saleId=sales.saleId');
            $this->db->join('accounts','accounts.acId=sales.acId');
//            $this->db->join('items','sales_metas.items=items.itemName');
            $this->db->order_by('saleDate','DESC');
            $query=$this->db->get('sales');
            $result=$query->result();
            
            $this->db->select('*');
            $this->db->where('saleDate >=', $from);
            $this->db->where('saleDate <=',$to);
            $this->db->join('sales_metas','sales_metas.saleId=sales.saleId');
            $this->db->join('accounts','accounts.acId=sales.acId');
//            $this->db->join('items','sales_metas.items=items.itemName');
            $this->db->order_by('saleDate','DESC');
            $query1=$this->db->get('sales')->$query->result();
            $final=array_merge($query1,$result);
//            print_r($result);exit;
            foreach($result as $recordy):
                $recordy->itemNames='';
                $this->db->select('*');
                $this->db->where('saleId',$recordy->saleId);
                $this->db->join('items','sales_metas.items=items.itemId');
                $meta_query=$this->db->get('sales_metas');
                $meta_result=$meta_query->result();
                foreach ($meta_result as $items):
                    $recordy->itemNames.=$items->itemName."($items->quantity), ";
//                    $this->update_stock($items->itemId, $items->quantity);
                endforeach;
            endforeach;
            return $final;
        }
    public function customer_report($from,$to,$id){
            $this->db->select('transactions.*,accounts.name');
            $this->db->where('transactions.entrydate >=', $from);
            $this->db->where('transactions.entrydate <=',$to);
            $this->db->where('transactions.acId',$id);
            $this->db->join('accounts','accounts.acId=transactions.acId');
            $query=$this->db->get('transactions');
            return $query->result();
        }

}