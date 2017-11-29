<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model {

        public function get_accounts(){
            $this->db->select('*');
            $query=$this->db->get('accounts');
            return $query->result();
        }

        public function get_payeesaccounts(){
            $this->db->select('*');
            $query=$this->db->get('payeesaccounts');
            return $query->result();
        }
        public function get_totals(){
            $this->db->select('*');
            $query=$this->db->get('banks_total');
            return $query->result();
        }
        public function get_account($id){
            $this->db->select('*');
            $this->db->where('acId',$id);
            $query=$this->db->get('accounts');
            return $query->row_array();
        }

        public function get_payeesAccount($id){
            $this->db->select('*');
            $this->db->where('acId',$id);
            $query=$this->db->get('payeesaccounts');
            return $query->row_array();
        }
        public function get_depositions($id){
            $this->db->select('*');
            $this->db->where('acId',$id);
            $this->db->where('transactions.transactionForm',2);
            $this->db->order_by('transactionDate','Asc');
            $query=$this->db->get('transactions');
//            echo $this->db->last_query();exit;
            return $query->result();
        }
        function account_insert($data){
            
            $this->db->insert('accounts',$data);
            return $this->db->insert_id();
        }

        function payeesAccount_insert($data){

            $this->db->insert('payeesaccounts',$data);
            return $this->db->insert_id();
        }
        function account_update($data,$id){
            $this->db->where('acId',$id);
            $this->db->update('accounts', $data);
        }

        function payeesAccount_update($data,$id){
            $this->db->where('acId',$id);
            $this->db->update('payeesaccounts', $data);
        }
        function account_delete($id){
            $this->db->where('acId',$id);
            $this->db->delete('accounts');
        }

        function payeesAccount_delete($id){
            $this->db->where('acId',$id);
            $this->db->delete('payeesaccounts');
        }
        function update_stock($id,$quantity){
            $this->db->query("UPDATE items SET itemQuantity=(itemQuantity-$quantity) where itemId = $id");
        }
        public function get_transactions($id){
            $this->db->select('*');
            $this->db->distinct();
            $this->db->group_by('invoice');
            $this->db->where('acId',$id);
            $this->db->where('transactions.transactionForm',1);
            $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');
//            $this->db->join('items','sales_metas.items=items.itemName');
            $this->db->order_by('transactionDate','DESC');
            $query=$this->db->get('transactions');
            
            $result=$query->result();
            //echo $this->db->last_query();
//            print_r($result);exit;
            foreach($result as $recordy):
                $recordy->itemNames='';
                $this->db->select('*');
                $this->db->where('transId',$recordy->transId);
                $this->db->join('items','transaction_metas.items=items.itemId');
                $meta_query=$this->db->get('transaction_metas');
                $meta_result=$meta_query->result();
                foreach ($meta_result as $items):
                    $recordy->itemNames.=$items->itemName."($items->tquantity)($items->per_price), ";
//                    $this->update_stock($items->itemId, $items->quantity);
                endforeach;
            endforeach;
            return $result;
        }


        public function get_payeesTransactions($id){
            $this->db->select('*');
            $this->db->distinct();
            $this->db->group_by('paidAmount');
            $this->db->where('acId',$id);
//            $this->db->where('payeestransection.payeestransection',);
           /* $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');*/
//            $this->db->join('items','sales_metas.items=items.itemName');
            $this->db->order_by('date','DESC');
            $query=$this->db->get('payeestransection');

            $result=$query->result();
//            print_r($result);exit;
            foreach($result as $recordy):
                $recordy->itemNames='';
                $this->db->select('*');
                $this->db->where('acId',$recordy->acId);
                /*$this->db->join('items','transaction_metas.items=items.itemId');*/
                /*$meta_query=$this->db->get('transaction_metas');*/
                /*$meta_result=$meta_query->result();*/
                /*foreach ($meta_result as $items):
                    $recordy->itemNames.=$items->itemName."($items->quantity)($items->per_price), ";
//                    $this->update_stock($items->itemId, $items->quantity);
                endforeach;*/
            endforeach;
            return $result;
        }
        public function get_sale($id){
            $this->db->select('*');
            $this->db->where('transactions.transId',$id);
            $this->db->where('transactions.transactionForm',1);
            $this->db->join('transaction_metas','transaction_metas.transId=transactions.transId');
            $this->db->join('accounts','accounts.acId=transactions.acId');
//            $this->db->join('items','sales_metas.items=items.itemName');
            $this->db->order_by('transactionDate','DESC');
            $query=$this->db->get('transactions');
            
            $result=$query->row_array();
//            print_r($result);exit;
                $result['itemNames']='';
                $this->db->select('*');
                $this->db->where('transId',$result['transId']);
                $this->db->join('items','transaction_metas.items=items.itemId');
                $meta_query=$this->db->get('transaction_metas');
                $result['itemNames']=$meta_query->result();
//                foreach ($meta_result as $items):
//                    $result['itemNames'].=$items->itemName."($items->quantity), ";
////                    $this->update_stock($items->itemId, $items->quantity);
//                endforeach;
            return $result;
        }
        function get_item_name($id){
            $this->db->select('itemName');
            $this->db->where('itemId',$id);
            $query=$this->db->get('items');
            $res=$query->row_array();
            return $res['itemName'];
        }
        public function get_transaction($id){
            $this->db->select('*');
            $this->db->where('transId',$id);
            $query=$this->db->get('transactions');
            return $query->row_array();
        }
        function transaction_insert($data){
            
            $this->db->insert('transactions',$data);
            return $this->db->insert_id();
        }

        function payeestransaction_insert($data,$paid){

            $this->db->insert('payeestransection',$data);
            $idn =  $this->db->insert_id();
            $this->db->query("UPDATE payeestransection SET balance=balance+".$paid." WHERE id='$idn'");

            return  $idn;

        }
        function bank_transaction_insert($total,$by,$bank,$date,$trans){
            $this->db->query("UPDATE banks_total SET total=total+".$total." WHERE bank_name='$bank'");
//            echo $this->db->last_query();exit;
            $this->db->select('total');
            $this->db->where('bank_name',$bank);
            $query=$this->db->get('banks_total')->row_array();
            $this->db->insert('bank_transactions',array('deposite'=>$total,'doneBy'=>$by,'bank_name'=>$bank,'date'=>$date,'balance'=>$query['total'],'transId'=>$trans));
        }
        function transaction_delete($id){
            $this->db->select('acId,balance');
            $this->db->where('transId',$id);
            $query=$this->db->get('transactions')->row_array();
            $this->db->where('transId',$id);
            $this->db->delete('transactions');
            $this->db->where('transId',$id);
            $this->db->delete('bank_transactions');
             $this->db->query("UPDATE ccounts SET balance=balance-".$query['balance']." WHERE acId=".$query['acId']);
            }


            function payeeTransaction_delete($id){
            $this->db->select('id,balance,acId');
            $this->db->where('id',$id);
            $query=$this->db->get('payeestransection')->row_array();
            $this->db->where('id',$id);
            $this->db->delete('payeestransection');
            $this->db->where('transId',$id);
            $this->db->delete('bank_transactions');
             $this->db->query("UPDATE payeesaccounts SET balance=balance+".$query['balance']." WHERE acId=".$query['acId']);
            }
         function deposition_delete($id){
            $this->db->select('acId,depositAmount,depositMethod');
            $this->db->where('transId',$id);
            $query=$this->db->get('transactions')->row_array();
            $this->db->query("UPDATE accounts SET balance=balance+".$query['depositAmount']." WHERE acId=".$query['acId']);
            $this->db->query("UPDATE banks_total SET total=total-".$query['depositAmount']." WHERE bank_name='".$query['depositMethod']."'");
            $this->db->where('transId',$id);
            $this->db->delete('transactions');
            $this->db->where('transId',$id);
            $this->db->delete('bank_transactions');
            }   
         
//        function transfer_payment($from,$to,$amount,$date){
//            $this->db->query("UPDATE accounts SET balance=balance+".$query['depositAmount']." WHERE acId=".$query['acId']);
//            $this->db->query("UPDATE banks_total SET total=total-".$query['depositAmount']." WHERE bank_name='".$query['depositMethod']."'");
//            $this->db->insert('bank_transactions',array('deposite'=>$amount,'deposite'=>$amount,'doneBy'=>1000,'bank_name'=>$from,'date'=>$date,'balance'=>$query['total'],'transId'=>$trans));
//            
//        }   
            
        function meta_insert($data){
            
            $this->db->insert('transaction_metas',$data);
//            $this->update_stock($data['items'], $data['quantity']);
        }
//        function transaction_update($data,$id){
//            $this->db->where('transId',$id);
//            $this->db->update('transactions', $data);
//            $pw=$this->input->post('withdraw')-$this->input->post('prevwithdraw');
//            $pd=$this->input->post('deposit')-$this->input->post('prevdeposit');
//            $this->db->query("UPDATE accounts SET balance+= (".$pd."), balance(".$pw.") WHERE acId=".$data['acId']);
//        }

        function payeesInsert_account_transection($bank,$paid,$date,$transid,$desc)
        {
            $insert['bank_name']=  $bank;
            $paid=$insert['withdraw']=  $paid;
            $insert['date']=  $date;
            $insert['transId']=  $transid;
            $insert['transId']=  $transid;
            $insert['comment']=  $desc;

            $this->db->insert('bank_transactions',$insert);

        }

        function update_account_blance($id,$balance){
            $this->db->query("UPDATE accounts SET balance=balance+(".$balance.") WHERE acId=".$id);
            
        }


        function payeesUpdate_account_blance($id,$balance){
                    $this->db->query("UPDATE payeesaccounts SET balance=balance-(".$balance.") WHERE acId=".$id);

                }


        function payeesUpdate_bank_blance($bank,$paidAmount){
            $this->db->query("UPDATE banks_total SET total=total-(".$paidAmount.") WHERE id=".$bank);
        }



        function get_balance($id){
            $this->db->select('balance');
            $this->db->where('acId',$id);
            $query=$this->db->get('accounts')->row_array();
            return $query['balance'];
        }
        function get_stock($id){
            $this->db->select('itemQuantity');
            $this->db->where('itemId',$id);
            $query=$this->db->get('items')->row_array();
            return $query['itemQuantity'];
        }
//                function transaction_delete($id,$ac){
//            
//            $this->db->select('deposit,withdraw');
//            $this->db->where('acId',$ac);
//            $query=$this->db->get('transactions');
//            $res=$query->row_array();
//            $this->db->query("UPDATE accounts SET balance=balance-".$res['deposit'].", balance=balance+".$res['withdraw']." WHERE acId=".$ac);
//
//            $this->db->where('transId',$id);
//            $this->db->delete('transactions');
//            
//        }
        function deposite($id,$amount,$method,$date){
            $this->db->query("UPDATE accounts SET balance=balance-(".$amount.") WHERE acId=".$id);
            $query=$this->db->query("select `balance` from accounts WHERE acId=".$id);
            $res=$query->row_array();
            $this->db->insert('transactions',array('acId'=>$id,'depositAmount'=>$amount,'depositMethod'=>$method,'transactionDate'=>$date,'transactionForm'=>2,'lastBalance'=>$res['balance']));
            return $this->db->insert_id();
//$query=$this->db->query("update banks_total SET total =total+$amount WHERE bank_name='$method'");
        }
        function get_bank(){
            $this->db->select('*');
            $query=$this->db->get('bank_transactions')->result();
            return $query;
        }
    function account_latest_date(){
            $this->db->select('accounts_meta.entryDate');
            $this->db->order_by('accounts_meta.entryDate','desc');
            $query = $this->db->get('accounts_meta',1);
            $res=$query->row_array();
            if($this->db->affected_rows()>0)
                return $res['entryDate'];
            else return false;
    }
    function next_day($data){
//        print_r($data);exit;
        $this->db->insert('accounts_meta',$data);
    }
    function get_closing($acId,$date){
        $this->db->select('closing');
        $this->db->where('acId',$acId);
        $this->db->where('entryDate',$date);
        $query = $this->db->get('accounts_meta',1);
        $res=$query->row_array();
        return $res['closing'];
    }    
    function get_qp(){
        $this->db->select('sales.amount_paid,sales.quantity');
        $query = $this->db->get('sales')->result();
        $result['quantity']=0;
        $result['amount_paid']=0;
        foreach($query as $temp):
            $result['quantity']+=$temp->quantity; 
            $result['amount_paid']+=($temp->amount_paid*$temp->quantity);
        endforeach;
        return $result;
    }
    function save_pay($data){
            
            $this->db->query("update banks_total SET total =total-".$data['withdraw']." WHERE bank_name='".$data['bank_name']."'");
            $query=$this->db->query("select `total` from banks_total WHERE bank_name='".$data['bank_name']."'");
            $res=$query->row_array();
            $data['balance']=$res['total'];
            $this->db->insert('bank_transactions',$data);
        }
}