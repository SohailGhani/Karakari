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


    function stock_report($from,$to,$itemid){
            $this->db->select('*');
//            $this->db->distinct();
//            $this->db->group_by('invoice');
//            $this->db->group_by('');
            $this->db->join('transactions', 'transactions.transId=transaction_metas.transId');
            $this->db->query('SELECT quantity FROM stockin UNION SELECT total FROM transactions');
            $this->db->where('transactionDate >=', $from);
            $this->db->where('transactionDate <=',$to);
            $this->db->where('transactionForm',1);


//            $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');
//            $this->db->join('accounts','accounts.acId=transactions.acId');
            $this->db->where('transaction_metas.items',$itemid);
//            $this->db->join('items','sales_metas.items=items.itemName');
//            $this->db->order_by('transactionDate','ASC');
            
            $q=$this->db->get('transaction_metas')->result();
            return $q;
    }

    function payees_report($from,$to,$itemid){
            $this->db->select('*');
//            $this->db->distinct();
//            $this->db->group_by('invoice');
//            $this->db->group_by('');
            $this->db->join('payeesaccounts', 'payeestransection.acId=payeesaccounts.acId');

            $this->db->where('date >=', $from);
            $this->db->where('date <=',$to);


//            $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');
//            $this->db->join('accounts','accounts.acId=transactions.acId');
            $this->db->where('payeesaccounts.acId',$itemid);
//            $this->db->join('items','sales_metas.items=items.itemName');
//            $this->db->order_by('transactionDate','ASC');

            $q=$this->db->get('payeestransection')->result();
            return $q;
    }


    function stockin_report($from,$to,$itemid){
            $this->db->select('*');
//            $this->db->distinct();
//            $this->db->group_by('invoice');
//            $this->db->group_by('');



            $this->db->where('inDate >=', $from);
            $this->db->where('inDate <=',$to);
        $this->db->join('items', 'stockin.itemId=items.itemId');
        $this->db->join('transaction_metas', 'stockin.itemId=transaction_metas.items');
        $this->db->where('transaction_metas.items',$itemid);



//            $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');
//            $this->db->join('accounts','accounts.acId=transactions.acId');

//            $this->db->join('items','sales_metas.items=items.itemName');
//            $this->db->order_by('transactionDate','ASC');

            $q=$this->db->get('stockin')->result();

            return $q;
    }


     function sales_report($from,$to,$acid){
            $this->db->select('*');
//            $this->db->distinct();
//            $this->db->group_by('lastBalance');
//            $this->db->group_by('transactionDate');
            $this->db->where('transactionDate >=', $from);
            $this->db->where('transactionDate <=',$to);
//            $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');
//            $this->db->join('accounts','accounts.acId=transactions.acId');
            $this->db->where('transactions.acId',$acid);
//            $this->db->join('items','sales_metas.items=items.itemName');
            $this->db->order_by('transactionDate','transId');
            
            $q=$this->db->get('transactions')->result();
            return $q;
//            $subquery1=$this->db->last_query();
////            _reset_select();
////            $result=$query->result();
//            
//            
////            $this->db->join('items','sales_metas.items=items.itemName');
////            $this->db->order_by('depositeDate','DESC');
//            $this->db->get('transactions');
//            $subquery3=$this->db->last_query();
//            _reset_select();
//            $final=array_merge($query1,$result);
//            print_r($result);exit;
//            foreach($result as $recordy):
//                $recordy->itemNames='';
//                $this->db->select('*');
//                $this->db->where('saleId',$recordy->saleId);
//                $this->db->join('items','sales_metas.items=items.itemId');
//                $meta_query=$this->db->get('sales_metas');
//                $meta_result=$meta_query->result();
//                foreach ($meta_result as $items):
//                    $recordy->itemNames.=$items->itemName."($items->quantity), ";
////                    $this->update_stock($items->itemId, $items->quantity);
//                endforeach;
//            endforeach;
//            $this->db->from("$subquery1 UNION $subquery3 as union_table");
//            $final=$q->result();   
//            $this->db->select('transactions.depositAmount,transactions.lastBalance,depositMethod');
//            $this->db->where('transactions.depositeDate >=', $from);
//            $this->db->where('transactions.depositeDate <=',$to);
//            $this->db->where('transactions.acId',147);
//            $q3=$this->db->get('transactions')->result_array();
////            print_r($final);
//            return array_merge($q1,$q3);
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
        public function account_report($from,$to,$acc){
            $this->db->select('bank_transactions.*,accounts.name');
            $this->db->where('bank_transactions.date >=', $from);
            $this->db->where('bank_transactions.date <=',$to);
            $this->db->where('bank_transactions.bank_name',$acc);
            if($acc!='cash')
                $this->db->join('accounts','accounts.acId=bank_transactions.doneBy');
            else
                $this->db->join('accounts','accounts.acId=1000');
            
            $query=$this->db->get('bank_transactions');
            return $query->result();
        }

}