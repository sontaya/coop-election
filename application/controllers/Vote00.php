<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('candidate_model','vote_model','user_model'));
        $this->load->helper('general');
        $this->load->library('user_agent');
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';
        $data['candidates'] = $this->candidate_model->fetch_all();  

        $this->load->view('vote_otp',$data);	
    }
    
    function add_vote()
    {
        if($this->input->post('checkbox_value'))
        {
            $id = $this->input->post('checkbox_value');
            $otpcode = $this->input->post('otpcode');
            //$card_id = $this->input->post('cardid');
            $vdata = $this->input->post('v_data');
            $vcount = $this->input->post('v_count');
            $ip =$this->input->ip_address();

             $xdata =array(
                'otpcode' =>$otpcode,
                //'card_id' =>$card_id,
                'vdata' =>$vdata,
                'vcount' =>$vcount,
                'ip_address' =>$ip ,
                'device' => $this->agent->platform(),
                'ip_address' => get_myclient_ip(), 
                'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),                   
                'created_at' => date('Y-m-d H:i:s'),
            );

            $results = $this->vote_model->checkOtpDuplicate($otpcode);
            if ($results === TRUE) {

                     echo false;
            }else{
                    $idx = $this->vote_model->insert_vote($xdata);
                    if($idx){
                        for($count = 0; $count < count($id); $count++)
                        {
                            $data =array(                                
                                'otpcode' =>$otpcode,
                                //'card_id' =>$card_id,
                                'c_num' =>$id[$count],                            
                                'created_at' => date('Y-m-d H:i:s'),
                            );
                           $this->vote_model->insert_vote_detail($data); 
                        } 
                    
                    }
                     //sendmail($this->session->userdata['email'],$this->session->userdata['fullname']);
                    echo true; 
            }

        }
    }

    public function user_exists() {
        if ($this->user_model->user_exists($this->input->post('card_id')) == TRUE) {
            //echo json_encode(FALSE);
            return FALSE;
        } else {
            return TRUE;
            //echo json_encode(TRUE);
        }
    }

    public function card_exists() {
        $cardid =$this->input->post('cardid');
        $pcode =$this->input->post('pcode');
        //$hrcode = $this->session->userdata['hrcode'];
  
        if ($this->user_model->card_exists($cardid,$pcode) == TRUE) {
           $data = array("status" => "ok", "message"=> "Sucess");            
            echo json_encode($data);
            //return FALSE;
        } else {
            $data = array("status" => "error", "message"=> "Not Found.");           
            echo json_encode($data);
             //return TRUE;
        }        
    }

    public function success() {
        //clear session data        
        foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
        $this->session->sess_destroy();
        //redirect
        $this->load->view('otp_success');
    }

    public function write_logs(){
        $data=$id.'~'.$expense_type.'~'.$amount.'~'.$exp_date.'<br>';
        $todate= date('Y-m-d');
        
        //if ( ! write_file(APPPATH."assets/login/log_$todate.txt", $data))
        if ( ! write_file(FCPATH .'/assets/login/log_'.$todate.'.txt', $data)){
           echo 'Unable to write the file';
        }
        else{ 
           echo 'File written!';
        }
    }

    function check_session(){
        echo isset($this->session->userdata['logged_in']);   
    }

    public function election_check()
	{
        $data['title'] = 'SDU eVote';

        $this->load->view('election_check');	
    }

    public function get_profile()
    {
        $cardid =$this->input->post('cardid');
        $profile = $this->user_model->get_profile_by_card_id($cardid);   
        if($profile){
            $data = array(
                'status' => true,
                'profile' =>$profile,
                'message'=> 'Success'
            ); 
        }else{
            $data = array(
                'status' => false,
                'message'=> 'Not Found'
            ); 
        }
        
        echo json_encode($data);
    }

/*
    public function getotp(){
        $data = $this->db->get('tbl_user');
        foreach( $data->result() as $r) {
            $sql="update tbl_user set refcode='" .generateNumericOTP(6). "' where pcode='" .$r->pcode."'";
            $query = $this->db->query($sql);
            if($query){
            echo "excute sql id: ".$r->pcode ."<br>";
           }
        }
        //$sql="update tbl_user set refcode=" .generateNumericOTP(6);

    }*/

  /*  public function genotp(){
        for($i=1;$i<=529;$i++){
       
            $sql="insert tbl_otp (refcode) values('" .generateNumericOTP(5)."')";
            $query = $this->db->query($sql);
            
        }
    }*/
    
}
