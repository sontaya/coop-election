<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
   
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function validate($pcode,$card_id){
        $this->db->where('pcode', $pcode);
        $this->db->where('card_id', $card_id);
        $result = $this->db->get('tbl_user',1);
        return $result;
    }
//ALTER table <user_table> ADD COLUMN session_id varchar(50);
    public function setSession($userid,$sessionid){
        $oldsessionid =$this->db->select("session_id")
        ->where(array('hrcode'=>$userid))
        ->get("tbl_user")
        ->row('session_id');

        //Destroy session
        $this->db->where('id',array('id'=>$oldsessionid));
        $this->db->delete('ci_sessions');
        //$this->db->delete('ci_sessions',$u_data);

        //Map new session
        $this->db->where('hrcode',$userid);
        $this->db->update('tbl_user',array('session_id'=>$sessionid));

    }
    
}
