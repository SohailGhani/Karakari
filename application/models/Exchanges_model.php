<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchanges_model extends CI_Model {

        public function get_exchanges(){
            $this->db->select('exchanges.*,currencies.currency,currencies.symbol');
            $this->db->join('currencies','exchanges.payinCurrency=currencies.id');
            $query=$this->db->order_by('date','DESC');
            $query=$this->db->get('exchanges');
            return $query->result();
        }
        public function get_exchange($id){
            $this->db->select('*');
            $this->db->where('exId',$id);
            $query=$this->db->get('exchanges');
            return $query->row_array();
        }
        function exchange_insert($data){
//            $this->db->select('rate,remitRate');
//            $this->db->where('id',$data['payinCurrency']);
//            $query=$this->db->get('currencies')->row_array();
            $data['payoutRate']=$this->input->post('rate');
            $data['payoutRemit']=$this->input->post('remitRate');
            $this->db->insert('exchanges',$data);
            if($this->input->post('deal')==1){
                $this->db->query("UPDATE currencies SET total=total-".$this->input->post('payin')." WHERE id=". $data['payinCurrency']);
                $this->db->query("UPDATE cash SET amount=amount+".$this->input->post('payout'));
                }
            else {
                $this->db->query("UPDATE currencies SET total=total+".$this->input->post('payin')." WHERE id=". $data['payinCurrency']);
		$this->db->query("UPDATE cash SET amount=amount-".$this->input->post('payout'));
		}
            // creating meta
            $this->db->select('entryDate');
            $this->db->where('entryDate',$data['date']);
            $this->db->where('currencyId',$data['payinCurrency']);
            $this->db->get('currencies_meta');
            if($this->db->affected_rows()>0){
                if($this->input->post('deal')==1)
                    $this->db->query("UPDATE currencies_meta SET avgRate=(avgRate+".$this->input->post('rate').")/2, closing=closing-".$this->input->post('payin').", closing_pkr=closing_pkr-".$this->input->post('payout').", out_currency=out_currency+".$this->input->post('payin').",out_PKR=out_PKR+".$this->input->post('payout')." WHERE currencyId=".$data['payinCurrency']." AND entryDate='".$data['date']."'");
                else
                    $this->db->query("UPDATE currencies_meta SET avgRate=(avgRate+".$this->input->post('rate').")/2, closing=closing+".$this->input->post('payin').", closing_pkr=closing_pkr+".$this->input->post('payout').", in_currency=in_currency+".$this->input->post('payin').",in_PKR=in_PKR+".$this->input->post('payout')." WHERE currencyId=".$data['payinCurrency']." AND entryDate='".$data['date']."'");
                
                
            }
            else
                if($this->input->post('deal')==1)
                    $this->db->query('INSERT INTO currencies_meta(out_currency,out_PKR,entryDate,currencyId,avgRate) VALUES('.$this->input->post('payin').','.$this->input->post('payout').",'".date('Y-m-d',  strtotime($data['date']))."',".$data['payinCurrency'].','.$this->input->post('rate').')');
                else
			
                    $this->db->query('INSERT INTO currencies_meta(in_currency,in_PKR,entryDate,currencyId,avgRate) VALUES('.$this->input->post('payin').','.$this->input->post('payout').",'".date('Y-m-d',  strtotime($data['date']))."',".$data['payinCurrency'].','.$this->input->post('rate').')');
        }
        function exchange_update($data,$id){
            $this->db->where('acId',$id);
            $this->db->update('exchanges', $data);
        }
        function exchange_delete($id){
	    $this->db->select('deal,payin,payout,payinCurrency,date');
            $this->db->where('exId',$id);
            $res=$this->db->get('exchanges')->row_array();
             if($res['deal']==1){
                    $this->db->query("UPDATE currencies_meta SET closing=closing+".$res['payin'].", closing_pkr=closing_pkr+".$res['payout'].", out_currency=out_currency-".$res['payin'].",out_PKR=out_PKR-".$res['payout']." WHERE currencyId=".$res['payinCurrency']." AND entryDate='".$res['date']."'");
              		$this->db->query("UPDATE currencies SET total=total+".$res['payin']." WHERE id=". $res['payinCurrency']);
                	$this->db->query("UPDATE cash SET amount=amount-".$res['payin']);
		}
		else
		{	
		    $this->db->query("UPDATE currencies SET total=total-".$res['payin']." WHERE id=". $res['payinCurrency']);
		    $this->db->query("UPDATE cash SET amount=amount+".$res['payout']);	
                    $this->db->query("UPDATE currencies_meta SET closing=closing-".$res['payin'].", closing_pkr=closing_pkr-".$res['payout'].", in_currency=in_currency-".$res['payin'].",in_PKR=in_PKR-".$res['payout']." WHERE currencyId=".$res['payinCurrency']." AND entryDate='".$res['date']."'");
                }
	    $this->db->where('exId',$id);
            $this->db->delete('exchanges');
        }
        
        function do_calc($cur,$paying){
            $this->db->select('rate');
            $this->db->where('id',$cur);
            $res=$this->db->get('currencies')->row_array();
            return ($paying*$res['rate']);
        }
        public function get_transactions($id){
            $this->db->select('*');
            $this->db->where('acId',$id);
            $this->db->order_by('date','DESC');
            $query=$this->db->get('transactions');
            return $query->result();
        }
        
}