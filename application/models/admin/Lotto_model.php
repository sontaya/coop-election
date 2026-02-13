<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lotto_model extends CI_Model
{
   
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   

     public function get_lotto_process4x(){ 
        $lottoArr = array();   
        for($i=0;$i < 20; $i++) {       
            $this->db->order_by('rand()');
            $this->db->limit(1);
            $query = $this->db->get('tbl_vote');

            array_push($lottoArr,$query->row()->otpcode); 
            //array_push($lottoArr,$query->row()->refcode); 
        }
        $random_keys=array_rand($lottoArr,1);
        //$array = str_split($lottoArr[$random_keys]);
        return $lottoArr[$random_keys];
    }

    public function get_lotto_process4(){ 
        $sql="SELECT * FROM vw_notin ORDER BY RAND() LIMIT 1";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_lotto_v1(){        
        $query = $this->db->get_where('winner',array('st_pass'=>'1'));
        return $query->result();
    }

    public function get_lotto_v2(){
      $query = $this->db->get_where('winner',array('st_pass'=>'2'));
        return $query->result();
    }

    public function get_lotto_v3(){
      $query = $this->db->get_where('winner',array('st_pass'=>'3'));
        return $query->result();
    }

     public function get_lotto_process1(){            
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('tbl_vote');

        return $query->result();
    }

    public function get_lotto(){
       $this->db->select('otpcode');
       $query = $this->db->get('tbl_vote');
       // $this->db->select('refcode');
       //$query = $this->db->get('tbl_otp');

        return $query->result();
    }



}
