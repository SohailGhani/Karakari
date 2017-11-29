<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accounts extends My_Controller {
        function __construct() {
       parent::__construct();
         $this->load->model('accounts_model');
   }
    
        function index(){
            $this->account_view();
        }
        public function account_view(){
            $data['breadcrumb']='Accounts';
            $data['page']='accounts/account_view';
            $this->load->view('template',$data);
        }
        public function accounts_info(){
            $data['breadcrumb']='Accounts';
            $data['accounts']=$this->accounts_model->get_accounts();
            $data['title']="Accounts Information";
            $data['page']='accounts/accounts';
            $this->load->view('template',$data);
        }


        public function payeesAccounts_info(){
            $data['breadcrumb']='Accounts';
            $data['accounts']=$this->accounts_model->get_payeesaccounts();
            $data['title']="Payees Accounts Information";
            $data['page']='accounts/payeesaccounts';
            $this->load->view('template',$data);
        }
        public function accounts_json()
	{
            $data=  $this->accounts_model->get_accounts();
            
            echo '{ "accounts": '.json_encode($data).'}';
	}
        
        public function account_add(){
             $data['breadcrumb']='Accounts / Add Account';
            $this->load->library('form_validation');
            $data['page']='accounts/account_add';
            $data['action']=site_url("accounts/account_insert");
            $this->load->view('template',$data);
            
        }

        public function payeesAccountAdd(){
             $data['breadcrumb']='Accounts / Add Account';
            $this->load->library('form_validation');
            $data['page']='accounts/payeesAccountAdd';
            $data['action']=site_url("accounts/payeesAccount_insert");
            $this->load->view('template',$data);

        }
        public function account_insert(){
            
            $data['name']=  $this->input->post('name');
            $data['address']=  $this->input->post('address');
            $data['nic']=  $this->input->post('nic');
            $data['entryDate']=  $this->input->post('entrydate');
            $data['phone']=  $this->input->post('phone');
            $data['email']=  $this->input->post('email');
            $data['fax']=  $this->input->post('fax');
            $data['balance']=  $this->input->post('balance');
            $this->accounts_model->account_insert($data);
            $this->session->set_userdata('msg','New Account has been successfully added');
            $this->session->set_userdata('msg_class','success');
            
            
            redirect("accounts/accounts_info/");
            
	}


	public function payeesAccount_insert(){

            $data['name']=  $this->input->post('name');
            $data['address']=  $this->input->post('address');
            $data['nic']=  $this->input->post('nic');
            $data['entryDate']=  $this->input->post('entrydate');
            $data['phone']=  $this->input->post('phone');
            $data['email']=  $this->input->post('email');
            $data['fax']=  $this->input->post('fax');
            $data['balance']=  $this->input->post('balance');
            $this->accounts_model->payeesAccount_insert($data);
            $this->session->set_userdata('msg','New Account has been successfully added');
            $this->session->set_userdata('msg_class','success');


            $data['breadcrumb']='Accounts';
            $data['accounts']=$this->accounts_model->get_payeesaccounts();
            $data['title']="Payees Accounts Information";
            $data['page']='accounts/payeesaccounts';
            $this->load->view('template',$data);

	}
        public function invoice($id,$acid){
            
            $data['breadcrumb']='Sales/ Sale_Edit';
            $data['sale']=$this->accounts_model->get_sale($id);
            $data['page']='accounts/invoice';
            $data['id']=$acid;
            $data['action']=site_url("accounts/account_update/$id");
            $this->load->view($data['page'],$data);
            
	}
        public function account_edit($id)
	{
            $data['breadcrumb']='Sales/ Sale_Edit';
            $data['account']=$this->accounts_model->get_account($id);
            $data['page']='accounts/account_edit';
            $data['action']=site_url("accounts/account_update/$id");
            $this->load->view('template',$data);
	}

	public function payeesAccount_edit($id)
	{
            $data['breadcrumb']='Sales/ Sale_Edit';
            $data['account']=$this->accounts_model->get_payeesAccount($id);
            $data['page']='accounts/payeesAccount_edit';
            $data['action']=site_url("accounts/payeesAccount_update/$id");
            $this->load->view('template',$data);
	}
        public function account_update($id){
            
            $data['name']=  $this->input->post('name');
            $data['address']=  $this->input->post('address');
            $data['nic']=  $this->input->post('nic');
            $data['entryDate']=  $this->input->post('entrydate');
            $data['phone']=  $this->input->post('phone');
            $data['email']=  $this->input->post('email');
            $data['fax']=  $this->input->post('fax');
            $data['balance']=  $this->input->post('balance');
           
            $this->accounts_model->account_update($data,$id);
            $this->session->set_userdata('msg','Account has been successfully Updated');
            $this->session->set_userdata('msg_class','success');
            redirect('accounts/accounts_info');
	}

	public function payeesAccount_update($id){

            $data['name']=  $this->input->post('name');
            $data['address']=  $this->input->post('address');
            $data['nic']=  $this->input->post('nic');
            $data['entryDate']=  $this->input->post('entrydate');
            $data['phone']=  $this->input->post('phone');
            $data['email']=  $this->input->post('email');
            $data['fax']=  $this->input->post('fax');
            $data['balance']=  $this->input->post('balance');

            $this->accounts_model->payeesAccount_update($data,$id);
            $this->session->set_userdata('msg','Account has been successfully Updated');
            $this->session->set_userdata('msg_class','success');
            redirect('accounts/payeesAccounts_info');
	}
        public function account_delete($id){
            $this->accounts_model->account_delete($id);
            $this->session->set_userdata('msg','Account has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect('accounts/accounts_info');
        }

        public function payeesAccount_delete($id){
            $this->accounts_model->payeeTransaction_delete($id);
            $this->session->set_userdata('msg','Account has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');

            $data['breadcrumb']='Accounts';
            $data['accounts']=$this->accounts_model->get_payeesaccounts();
            $data['title']="Payees Accounts Information";
            $data['page']='accounts/payeesaccounts';
            $this->load->view('template',$data);


        }
        
        public function transactions_info($id){
            $data['breadcrumb']='Accounts';
            $data['account']=$this->accounts_model->get_account($id);
            $data['hide_script']=1;
            $data['id']=$id;
            $data['title']="Accounts Information";
            $data['page']='accounts/transactions';
            $this->load->view('template',$data);
        }


        public function payeesTransactions_info($id){
            $data['breadcrumb']='Accounts';
            $data['account']=$this->accounts_model->get_payeesAccount($id);
            $data['hide_script']=1;
            $data['id']=$id;
            $data['title']="Payees Accounts Information";
            $data['page']='accounts/payeesTransactions';
            $this->load->view('template',$data);
        }


        public function deposition_info($id){
            $data['breadcrumb']='Deposition';
//            $data['deposition']=$this->accounts_model->get_depositions($id);
            $data['hide_script']=1;
            $data['id']=$id;
            $data['title']="Accounts Information";
            $data['page']='accounts/depositions';
            $this->load->view('template',$data);
        }
        public function depositions_json($id)
	{
            $data=  $this->accounts_model->get_depositions($id);
            
            echo '{ "depositions": '.json_encode($data).'}';
	}
        public function transactions_json($id)
	{
            $data=  $this->accounts_model->get_transactions($id);
            
            echo '{ "transactions": '.json_encode($data).'}';
	}


	public function payeesTransactions_json($id)
	{
            $data=  $this->accounts_model->get_payeesTransactions($id);

            echo '{ "payeesTransactions": '.json_encode($data).'}';
	}
        
        public function transaction_add($id){
            $data['breadcrumb']='Accounts / Add Transaction';
            $data['id']=$id;
            $data['items']=$this->base_model->get_items();
            $data['accounts']=$this->accounts_model->get_accounts();
            $data['page']='accounts/transaction_add';
            $data['action']=site_url("accounts/transaction_insert");
            $this->load->view('template',$data);
            
        }

        public function payeesTransaction_add($id)
        {
            $data['breadcrumb']='Accounts / Add Transaction';
            $data['id']=$id;
            $data['items']=$this->base_model->get_items();
            $data['accounts']=$this->accounts_model->get_payeesaccounts();
            $data['page']='accounts/payeesTransaction_add';
            $data['action']=site_url("accounts/payeesTransaction_insert");
            $this->load->view('template',$data);
        }


        public function deposite($id){
            $data['breadcrumb']='Accounts / Balance Desposite';
            $data['items']=$this->base_model->get_items();
            $data['accounts']=$this->accounts_model->get_accounts();
            $data['page']='accounts/balance_deposite';
            $data['action']=site_url("accounts/deposite_insert/$id");
            $this->load->view('template',$data);
            
        }
        public function deposite_insert($id){
            $deposit=$this->input->post('deposite');
            $deposit_method=$this->input->post('deposite_method');
            $deposit_date=$this->input->post('depositedate');
            $id2=$this->accounts_model->deposite($id,$deposit,$deposit_method,$deposit_date);
            $this->accounts_model->bank_transaction_insert($deposit,$id,$deposit_method,$deposit_date,$id2);
             redirect("accounts/transactions_info/$id");
        }
        public function transaction_insert(){
            
            $id=$data['acId']=  $this->input->post('acid');
            $data['paid']=  $this->input->post('paid');
            $data['depositMethod']=  $this->input->post('paidby');
            $data['total']=  $this->input->post('total');
            $data['transactionDate']=  $this->input->post('date');
            $data['balance']=  $this->input->post('balance');
            $data['invoice']=  $this->input->post('invoice');
            $data['discount']=  $this->input->post('discount');
            $data['transactionForm']=  1;// for sale
            $this->accounts_model->update_account_blance($id,$data['balance']);
           $data['lastBalance']=$this->accounts_model->get_balance($id);
           $transid= $this->accounts_model->transaction_insert($data);
           if($data['depositMethod']!='cash'&&$data['paid']>0){
           $this->accounts_model->bank_transaction_insert($data['total'],$data['acId'],$data['depositMethod'],$data['transactionDate'],$transid);
           }
           if($data['depositMethod']=='cash'&&$data['paid']>0){
           $this->accounts_model->bank_transaction_insert($data['total'],$data['acId'],$data['depositMethod'],$data['transactionDate'],$transid);
           }
           $meta['items']=0;
           $meta['quantity']=0;
//           print_r($this->input->post('items'));exit;
            for($i=0;$i<count($this->input->post('items'));$i++):
                $meta['items']=$this->input->post('items')[$i];
                $meta['quantity']=$this->input->post('quantity')[$i];
                $meta['per_price']=$this->input->post('per_price')[$i];
                $meta['price']=$this->input->post('price')[$i];
//                $meta['per_price']=$this->input->post('per_price')[$i];
                $meta['transId']=$transid;
                $this->accounts_model->update_stock($meta['items'],$meta['quantity']);
                $last_stock=$this->accounts_model->get_stock($meta['items']);
                $meta['lastStock']=$last_stock;
                $this->accounts_model->meta_insert($meta);
            endfor;
            $this->session->set_userdata('msg','New Transaction has been successfully added');
            $this->session->set_userdata('msg_class','success');
            
            redirect("accounts/invoice/$transid/$id");
            
	}


	public function payeesTransaction_insert(){


            $id=$data['acId']=  $this->input->post('acid');
            $paid=$data['paidAmount']=  $this->input->post('paid');
            $bank=$data['paidby']=  $this->input->post('paidby');
            $desc=$data['description']=  $this->input->post('paidDescroption');
            $date=$data['date']=  $this->input->post('date');

            $transid= $this->accounts_model->payeestransaction_insert($data,$paid,$id);


            $this->accounts_model->payeesUpdate_bank_blance($bank,$data['paidAmount']);
            $this->accounts_model->payeesInsert_account_transection($bank,$paid,$date,$transid,$desc);
            $this->accounts_model->payeesUpdate_account_blance($id,$data['paidAmount']);


            $data['breadcrumb']='Accounts';
            $data['account']=$this->accounts_model->get_payeesAccount($id);
            $data['hide_script']=1;
            $data['id']=$id;
            $data['title']="Payees Accounts Information";
            $data['page']='accounts/payeesTransactions';
            $this->load->view('template',$data);

	}








//        public function transaction_edit($id)
//	{
//            $data['breadcrumb']='Sales/ Sale_Edit';
//            $data['transaction']=$this->accounts_model->get_transaction($id);
//            $data['page']='accounts/transaction_edit';
//            $data['id']=$id;
//            $data['action']=site_url("accounts/transaction_update/$id");
//            $this->load->view('template',$data);
//	}
//        public function transaction_update($id){
//            
//            $data['deposit']=  $this->input->post('deposit');
//            $data['withdraw']=  $this->input->post('withdraw');
//            $data['date']=  $this->input->post('date');
//            $data['acId']=  $this->input->post('acid');;
//            $this->accounts_model->transaction_update($data,$id);
//            $this->session->set_userdata('msg','Transaction has been successfully Updated');
//            $this->session->set_userdata('msg_class','success');
//            $id=$data['acId'];
//            redirect("accounts/transactions_info/$id");
//	}
            public function transaction_delete($id,$ac){
            $this->accounts_model->transaction_delete($id,$ac);
            $this->session->set_userdata('msg','Transaction has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect("accounts/transactions_info/$ac");
        }

        public function payeesTransaction_delete($id,$ac){
            $this->accounts_model->payeeTransaction_delete($id,$ac);
            $this->session->set_userdata('msg','Transaction has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect("accounts/payeesTransactions_info/$ac");
        }
        public function delete_deposite($id,$ac){
            $this->accounts_model->deposition_delete($id,$ac);
            $this->session->set_userdata('msg','Transaction has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect("accounts/transactions_info/$ac");
        }
        public function bank_info(){
            $data['breadcrumb']='Deposition';
//          $data['deposition']=$this->accounts_model->get_depositions($id);
            $data['hide_script']=1;
//            $data['id']=$id;
            $data['title']="Accounts Information";
            $data['page']='bank/bank_trans';
            $this->load->view('template',$data);
        }
        public function bank_json()
	{
            $data=  $this->accounts_model->get_bank();
            echo '{ "bank": '.json_encode($data).'}';
	}
        public function add_pay(){
            $data['breadcrumb']='Accounts / Balance Desposite';
            $data['page']='bank/add_deposite';
            $data['action']=site_url("accounts/save_pay/");
            $this->load->view('template',$data);
        }
        public function save_pay(){
            $data['bank_name'] =  $this->input->post('deposite_method');
            $data['withdraw']  =  $this->input->post('deposite');
            $data['date']      =  $this->input->post('depositedate');
            $data['comment']   =  $this->input->post('detail');
            $data['doneBy']  = 1000;
            $this->accounts_model->save_pay($data);
            redirect('');
        }
}


