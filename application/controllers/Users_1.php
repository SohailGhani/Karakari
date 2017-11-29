<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends My_Controller {
        function __construct() {
       parent::__construct();
         $this->load->model('User_model');
   }
        public function user_info(){
             $data['breadcrumb']='Users';
            $data['hide_script']=1;
            $data['users']=$this->User_model->get_users();
            $data['page']='users/user_info';
            $this->load->view('template',$data);
        }
        public function user_json()
	{
            $data=  $this->User_model->get_users();
            
            echo '{ "users": '.json_encode($data).'}';
	}
        public function user_add(){
            $this->load->library('form_validation');
            $data['breadcrumb']='User / User Add';
            $data['users']=  $this->User_model->get_users();
            $data['page']='users/user_add';
            $data['action']=site_url("Users/user_insert");
            $this->load->view('template',$data);
            
        }
        public function user_insert(){
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
           if($this->form_validation->run()==true){ 
            $data['user_name']=  $this->input->post('user_name');
            $data['email']=  $this->input->post('email');
            $data['password']=  md5($this->input->post('password')).'#ptc&mardan';
            $data['contact_no']=  $this->input->post('contact_no');
           
            $this->User_model->user_insert($data);
            $this->session->set_userdata('msg','User has been successfully added');
            $this->session->set_userdata('msg_class','success');
            redirect('Users/user_info');
        }
            else {
                $this->user_add();
            }
	}
         public function user_edit($id)
	{
             $data['breadcrumb']='Users / User Edit';
            $this->load->library('form_validation');
            $data['users']=$this->User_model->get_user($id);
            $data['page']='users/user_edit';
            $data['action']=site_url("Users/user_update/$id");
            $this->load->view('template',$data);
	}
        public function user_update($id){
             $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
            
            $data['user_name']=  $this->input->post('user_name');
            $data['email']=  $this->input->post('email');
           $data['password']=  md5($this->input->post('password')).'#ptc&mardan';
            $data['contact_no']=  $this->input->post('contact_no');
           
            $this->User_model->user_update($data,$id);
            $this->session->set_userdata('msg','User has been successfully Updated');
            $this->session->set_userdata('msg_class','success');
            redirect('Users/user_info');
	}
         public function user_delete($id){
            $this->User_model->user_delete($id);
            $this->session->set_userdata('msg','User has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect('Users/user_info');
        }
         public function logout()
	{       $this->session->sess_destroy();
                $this->session->set_userdata('login_msg','Logout');
                redirect('auth/login');
	}
}