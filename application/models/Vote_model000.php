<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_model extends CI_Model
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

    public function checkDuplicatevote($pcode) {
        $this->db->where('pcode', $pcode);
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

    
}