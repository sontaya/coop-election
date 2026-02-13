<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   /* function fetch_candidate_all()
    {
        $query = $this->db->order_by('c_number','ASC')->get("tbl_candidate");
        return $query->result();
    }*/

    public function insert_vote($data){
        $this->db->insert('tbl_vote', $data);
        //$insert_id = $this->db->insert_id();
        //return  $insert_id;
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_vote_detail($data){
        $this->db->insert('tbl_vote_detail', $data);
       
       if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDuplicatevote($otpcode) {
        $this->db->where('otpcode', $otpcode);
        $query = $this->db->get('tbl_vote');
        
        if ($query->num_rows() > 0) {
            return TRUE;
        }        
        return FALSE;
    }

    public function checkOtpDuplicate($otpcode) {
        $this->db->where('otpcode', $otpcode);
        $query = $this->db->get('tbl_vote');
        
        if ($query->num_rows() > 0) {
            return TRUE;
        }        
        return FALSE;
    }

    public function get_otp_status($userid){
        $this->db->where('otpcode', $userid);
        //$this->db->where('created_at', $adate);
        $query = $this->db->get('tbl_vote');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    function otp_validate($pcode){
        $this->db->where('refcode', $pcode);
        //$this->db->where('status', 1);
        $result = $this->db->get('tbl_otp',1);
        return $result;
    }

     public function otp_exists($cardid){
        $this->db->where('refcode', $cardid);                
        $query = $this->db->get('tbl_otp');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }
    
}