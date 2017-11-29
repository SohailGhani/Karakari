<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Settings extends My_Controller {
     function __construct() {
       parent::__construct();
         $this->load->model('items_model');
         $this->load->model('Settings_model');
   }
	public function setting_index()
	{
            $data['breadcrumb']='Settings';
            $data['page']='settings_view/setting_view';
            $this->load->view('template',$data);
	}     
   public function colors_info()
	{
            $data['breadcrumb']='Settings / Colors';
            $data['hide_script']=1;
            $this->load->library('form_validation');
            $data['colors']=  $this->Settings_model->get_colors();
            $data['page']='settings_view/colors/colors_view';
            $this->load->view('template',$data);
	}
        public function colors_json()
	{
            $data=  $this->Settings_model->get_colors();
            
            echo '{ "colors": '.json_encode($data).'}';
	}
   public function item_view()
	{
            $data['breadcrumb']='Settings / items';
              $data['hide_script']=1;
             $this->load->library('form_validation');
             $data['items']=  $this->Settings_model->get_items();
            $data['page']='settings_view/items/item_view';
            $data['action']=site_url("items/item_insert");
            $this->load->view('template',$data);
	}
        public function item_add()
	{
            $data['breadcrumb']='Settings / items';
            $data['page']='settings_view/items/item_add';
            $data['action']=site_url("settings/item_insert");
            $this->load->view('template',$data);
	}

        public function item_insert()
	{
            
            
            $data['itemName']=  $this->input->post('item');
            $data['itemQuantity']=  $this->input->post('qty');
            $data['date']=  $this->input->post('date');
                $this->items_model->item_insert($data);
                $this->session->set_userdata('msg','Item has been successfully added');
                $this->session->set_userdata('msg_class','success');
                redirect('settings/item_view');
        }
        
        public function items_json()
	{
            $data=  $this->Settings_model->get_items();
            
            echo '{ "item": '.json_encode($data).'}';
	}
        public function item_edit($id)
	{
            $data['breadcrumb']='Settings / Item_Edit';
            $data['item']=$this->Settings_model->get_item($id);
            $data['page']='settings_view/items/item_edit';
            $data['action']=site_url("Settings/item_update/$id");
            $this->load->view('template',$data);
	}
        public function item_update($id)
	{
            
            $data['itemName']=  $this->input->post('item');
            $data['itemQuantity']=  $this->input->post('qty');
                    $this->Settings_model->item_update($data,$id);
                    $this->session->set_userdata('msg','Item has been successfully Updated');
                    $this->session->set_userdata('msg_class','success');
                    redirect('settings/item_view');
	
        }
        public function item_delete($id){
            $this->Settings_model->item_delete($id);
            $this->session->set_userdata('msg','Item has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect('Settings/item_view');
        }
        
        public function search_reload($id)
	{
            $data['breadcrumb']='Settings / items';
//              $data['hide_script']=1;
//             $this->load->library('form_validation');
//             $data['reloads']=  $this->Settings_model->get_reloads($id);
            $data['title']='Stock History';
            $data['page']='reports/search_reload';
            $data['action']=site_url("settings/item_reloads/$id");
            $this->load->view('template',$data);
	}
        public function item_reloads($id)
	{
            $data['breadcrumb']='Settings / items';
//              $data['hide_script']=1;
//             $this->load->library('form_validation');
                        $data['title']='Stock History';

            $data['from']=  $this->input->post('from');
            $data['to']  =  $this->input->post('to');
            $data['reloads']=$this->Settings_model->get_reloads($this->input->post('from'),$this->input->post('to'),$id);
            $data['page']='reports/stock_in_report';
//            $data['action']=site_url("items/item_insert");
            $this->load->view('template',$data);
	}
        public function reload_add($id)
	{
            $data['breadcrumb']='Settings / items';
//            $data['id']=$id;
            $data['page']='settings_view/items/reload_add';
            $data['action']=site_url("settings/reload_insert/$id");
            $this->load->view('template',$data);
	}

        public function reload_insert($id)
	{
            
            
            $data['itemId']=  $id;
            $data['quantity']=  $this->input->post('qty');
            $data['inDate']=  $this->input->post('date');
                $this->Settings_model->reload_insert($data);
                $this->session->set_userdata('msg','History has been successfully added');
                $this->session->set_userdata('msg_class','success');
                redirect('settings/item_view');
        }
        
//        public function reloads_json($id)
//	{
//            $data=  $this->Settings_model->get_reloads($id);
//            
//            echo '{ "item": '.json_encode($data).'}';
//	}
        
        public function reload_delete($id){
            $this->Settings_model->item_delete($id);
            $this->session->set_userdata('msg','History has been successfully Deleted');
            $this->session->set_userdata('msg_class','danger');
            redirect('Settings/item_view');
        }
}