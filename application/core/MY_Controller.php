<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    
    public function __construct() {        
       parent::__construct();
       //ini_set('output_buffering' ,'on');
       if(!($this->session->userdata('userId'))){
           $this->session->set_userdata('login_msg','Login First');
           redirect('auth/login');
           exit();
       }
   }
 
}