<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange extends CI_Controller {
        function __construct() {
       parent::__construct();
         $this->load->model('Exchanges_model');
   }
    public function exchanges_view(){
            $data['breadcrumb']='Exchanges';
            $data['page']='exchange/exchanges_view';
            $this->load->view('template',$data);
        }
        public function exchanges_info(){
            $data['breadcrumb']='Exchanges';
            $data['hide_script']=1;
//            $data['exchanges']=$this->Exchanges_model->get_exchanges();

            $data['title']="Exchange Records";
            $data['page']='exchange/exchanges_info';
            $this->load->view('template',$data);
        }
        public function exchanges_json()
	{
            $data=  $this->Exchanges_model->get_exchanges();
            
            echo '{ "exchanges": '.json_encode($data).'}';
	}
        
        public function get_exchanges(){
            $data['exchanges']=$this->Exchanges_model->get_exchanges();
            $data['page']='exchange/exchanges_info';
            $this->load->view('template',$data);
        }
        public function exchange_add(){
            $this->load->model('currencies_model');
            $data['hide_script']=1;
            $data['breadcrumb']='Exchanges / Exchange_Add';
            $data['page']='exchange/exchanges_entry';
            $data['currencies']=$this->currencies_model->get_items();
            $data['action']=site_url("Exchange/exchange_insert");
            $this->load->view('template',$data);
            
        }
        public function exchange_insert(){
            
            $data['payinCurrency']=  $this->input->post('payincurrency');
            $data['payin']=  $this->input->post('payin');
            $data['payout']=  $this->input->post('payout');
            $data['date']=  $this->input->post('date');
            $data['deal']=  $this->input->post('deal');
            $data['customername']=  $this->input->post('customername');
            $data['customerAddress']=  $this->input->post('customeraddress');
            $data['customerNic']=  $this->input->post('customernic');
            $data['customerContact']=  $this->input->post('customercontact');
            $this->Exchanges_model->exchange_insert($data);
            redirect('exchange/exchanges_info');
	}
        public function exchange_edit($id)
	{
            $data['breadcrumb']='Exchanges/ Exchange_Edit';
            $this->load->library('form_validation');
            //$data['cars']=  $this->Stock_model->get_cars();
            $data['exchanges']=$this->Exchanges_model->get_exchange($id);
            $data['page']='exchanges/exchange_edit';
            $data['action']=site_url("Exchange/exchange_update/$id");
            $this->load->view('template',$data);
	}
        public function exchange_update($id){
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('quantitiy', 'Quantity', 'required');
            $this->form_validation->set_rules('amount_paid', 'Amount', 'required');
            $this->form_validation->set_rules('balance', 'Balance', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
            
            $data['quantity']=  $this->input->post('quantity');
            $data['amount_paid']=  $this->input->post('amount_paid');
            $data['balance']=  $this->input->post('balance');
            $data['date']=  $this->input->post('date');
            $data['car_id']=  $this->input->post('car_name');
           
            $this->Exchanges_model->exchange_update($data,$id);
            redirect('Exchange/exchanges_info');
	}
            public function exchange_delete($id){
            $this->Exchanges_model->exchange_delete($id);
            redirect('Exchange/exchanges_info');
        }
        function calculate($cur, $payin){
            echo $this->Exchanges_model->do_calc($cur,$payin);
        }
}


