<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $data['page']='home_view';
            $data['breadcrumb']='Home';
            $this->load->model('settings_model');
            $data['items']=$this->settings_model->get_items();
            $this->load->model('accounts_model');
            $data['accounts']=$this->accounts_model->get_accounts();
            $data['totals']=$this->accounts_model->get_totals();
            $this->load->view('template',$data);
	}
       
}
