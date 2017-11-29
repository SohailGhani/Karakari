<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends My_Controller {
        function __construct() {
       parent::__construct();
         $this->load->model('accounts_model');
         $this->load->model('settings_model');
         $this->load->model('report_model');
         
   }

        public function customer_summary()
	{
            if(!empty($this->input->post('date')))
                $data['date']=$this->input->post('date');
            else
                $data['date']=  date("Y-m-d");
            
            $data['hide_script']=1;
            $data['breadcrumb']='Reports / Customer Summary';
            $data['page']='reports/customer_summary';
            $data['accounts']=$this->accounts_model->get_accounts();
            $data['title']='Customers Summary';
            $data['action']=site_url("Reports/customer_summary/");
            $this->load->view('template',$data);
	}
        public function cash_summary()
	{
            if(!empty($this->input->post('date')))
                $data['date']=$this->input->post('date');
            else
                $data['date']=  date("Y-m-d");
            
            $data['hide_script']=1;
            $data['breadcrumb']='Reports / Cash Exchange Summary';
            $data['page']='reports/cash_exchange_summary';
            $data['currencies']=$this->settings_model->get_currencies();
            $data['title']='Cash Exchange Summary';
            $data['action']=site_url("Reports/cash_summary/");
            $this->load->view('template',$data);
	}
        function customer_search(){
            $data['page']='reports/search';
            $data['acc']=1; // for activating accounts loop
            $data['data']=$this->accounts_model->get_accounts();
            $data['title']='3d Party Report';
            $data['breadcrumb']='Reports / 3d Party Report';
            $data['action']=site_url('reports/customer_report');
            $this->load->view('template',$data);
        }
        function search(){
            $data['page']='reports/search';
            $data['title']='Sales Report';
            $data['breadcrumb']='Reports / Sales Search';
            $data['action']=  site_url('reports/sales_report');
            $data['accounts']=$this->accounts_model->get_accounts();
            $this->load->view('template',$data);
        }


        function search_stock(){
            $data['page']='reports/search_stock';
            $data['title']='Sales Report';
            $data['breadcrumb']='Reports / Sales Search';
            $data['action']=  site_url('reports/stock_report');
            $data['items']=$this->base_model->get_items();
            $this->load->view('template',$data);
        }



        function search_payees(){
            $data['page']='reports/search_payees';
            $data['title']='Payees Report';
            $data['breadcrumb']='Reports / Sales Search';
            $data['action']=  site_url('reports/payees_report');
            $data['items']=$this->base_model->get_payees();
            $this->load->view('template',$data);
        }

        function search_stockin(){
            $data['page']='reports/search_stockin';
            $data['title']='Stock In Report';
            $data['breadcrumb']='Reports / Sales Search';
            $data['action']=  site_url('reports/stockin_report');
            $data['items']=$this->base_model->get_items();
            $this->load->view('template',$data);
        }



    public function sales_report()
	{
            $data['breadcrumb']=' Report';
            $data['results']=$this->report_model->sales_report($this->input->post('from'),$this->input->post('to'),$this->input->post('acid'));
            $data['hide_script']=1;
            $data['title']='Sales Report ';
            $data['page']='Reports/report';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/sales_report');
            $this->load->view('template',$data);
	} 
        public function stock_report()
	{
            $data['breadcrumb']='Stock Report';
            $data['results']=$this->report_model->stock_report($this->input->post('from'),$this->input->post('to'),$this->input->post('itemid'));
            $data['hide_script']=1;
            $data['title']='Stock Report ';
            $data['page']='Reports/report_stock';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/payees_report');
            $this->load->view('template',$data);
	}

	public function payees_report()
	{
            $data['breadcrumb']='Stock Report';
            $data['results']=$this->report_model->payees_report($this->input->post('from'),$this->input->post('to'),$this->input->post('itemid'));
            $data['hide_script']=1;
            $data['title']='Stock Report ';
            $data['page']='Reports/report_payees';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/payees_report');
            $this->load->view('template',$data);
	}


	public function stockin_report()
	{
            $data['breadcrumb']='Stock Report';
            $data['results']=$this->report_model->stockin_report($this->input->post('from'),$this->input->post('to'),$this->input->post('itemid'));
            $data['hide_script']=1;
            $data['title']='Stock In Report ';
            $data['page']='Reports/report_stockin';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/stockin_report');
            $this->load->view('template',$data);
	}





    public function customer_report()
	{
            $data['breadcrumb']='Customer Report';
            $data['results']=$this->report_model->customer_report($this->input->post('from'),$this->input->post('to'),$this->input->post('selection'));
            $data['hide_script']=1;
            $data['data']=$this->accounts_model->get_accounts();
            $data['title']='3rd Party Report ';
            $data['page']='Reports/customer_report';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/customer_report');
            $this->load->view('template',$data);
	} 
        
        function account_search(){
            $data['page']='reports/search_accounts';
            $data['acc']=1; // for activating accounts loop
            $data['title']='Account Report';
            $data['breadcrumb']='Reports / Accounts';
            $data['action']=site_url('reports/report_account');
            $this->load->view('template',$data);
        }
        function report_account(){
            $data['breadcrumb']='Customer Report';
            $data['results']=$this->report_model->account_report($this->input->post('from'),$this->input->post('to'),$this->input->post('selection'));
            $data['hide_script']=1;
            $data['title']=$this->input->post('selection').' Account Report ';
            $data['page']='Reports/accounts_report';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/report_account');
            $this->load->view('template',$data);
        }
        function roznamcha_search(){
            $data['page']='reports/search_roznamcha';
            $data['acc']=1; // for activating accounts loop
            $data['title']='Roznamcha Report';
            $data['breadcrumb']='Reports / Accounts';
            $data['action']=site_url('reports/roznamcha_account');
            $this->load->view('template',$data);
        }
        function roznamcha_account(){
            $data['breadcrumb']='Customer Report';
            $data['results']=$this->report_model->account_report($this->input->post('from'),$this->input->post('to'),'cash');
            $data['hide_script']=1;
            $data['title']='Roznamcha Report ';
            $data['page']='Reports/roznamcha_report';
            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['action']=site_url('Reports/roznamcha_account');
            $this->load->view('template',$data);
        }
        
}
