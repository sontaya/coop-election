<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Council extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) 
        {
            redirect('login');
        }
       
        $this->load->model(array('candidate_model','vote_model','user_model'));
        $this->load->helper('general');
        $this->load->library('user_agent');
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต'; 

        //$data['mymac'] = GetClientMac();

        $this->data = $data;
        $this->middle = 'front/vote';
        $this->layout();		
    }
    

   /* public function candidate()
    {
        $data['title'] = 'สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต';

        $data['candidates'] = $this->candidate_model->fetch_all();    

        $this->data = $data;
        $this->middle = 'front/candidate';
        $this->layout();       
    }

    public function check_election()
    {
        $data['title'] = 'สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต';

        $data['profile'] = $this->user_model->get_profile($this->session->userdata['pcode']);    

        $this->data = $data;
        $this->middle = 'front/check_election';
        $this->layout();       
    }*/

    public function vote()
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

       $data['candidates'] = $this->candidate_model->fetch_all();        

        $this->data = $data;
        $this->middle = 'front/vote';
        $this->layout();       
    }

    function add_vote3()
    {
        if($this->input->post('checkbox_value'))
        {
            $id = $this->input->post('checkbox_value');
            $pcode = $this->input->post('pcode');
            $hrcode = $this->input->post('hrcode');
            $ip =$this->input->ip_address();

            //print_r($id);
            //exit();
            //add selected vote
            //for($count = 0; $count < count($id); $count++)
            //{
                $data =array(
                    'pcode' =>$pcode,
                    'hrcode' =>$hrcode,
                    'candidate_id' =>$id[0],
                    'ip_address' =>$ip ,
                    'device' => $this->agent->platform(),
                    'ip_address' => get_myclient_ip(), 
                    'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),
                    //'mac_address' => GetClientMac(),
                    'created_at' => date('Y-m-d H:i:s'),
                );
               if($this->vote_model->insert_vote($data)){
                //sendmail($this->session->userdata['email'],$this->session->userdata['fullname']);
                echo json_encode(TRUE);
               }else{
                echo json_encode(FALSE);
               }

            //}
            //update user status

            //send mail
            
        }
    }

    function add_vote()
    {
        if($this->input->post('checkbox_value'))
        {
            $id = $this->input->post('checkbox_value');
            $pcode = $this->input->post('pcode');
            $hrcode = $this->input->post('hrcode');
            $ip =$this->input->ip_address();
            //add selected vote
            for($count = 0; $count < count($id); $count++)
            {
                $data =array(
                    'pcode' =>$pcode,
                    'hrcode' =>$hrcode,
                    'candidate_id' =>$id[$count],
                    'ip_address' =>$ip ,
                    'device' => $this->agent->platform(),
                    'ip_address' => get_myclient_ip(), 
                    'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),
                    //'mac_address' => GetClientMac(),
                    'created_at' => date('Y-m-d H:i:s'),
                );
                $results = $this->vote_model->checkDuplicatevote($hrcode);
                if ($results === TRUE) {

                     echo false;
                 }else{
                     $this->vote_model->insert_vote($data);
                     //sendmail($this->session->userdata['email'],$this->session->userdata['fullname']);
                    echo true; 
                 }
             
            }
            //update user status 

            //send mail
            //sendmail($this->session->userdata['email'],$this->session->userdata['fullname']);
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
        $hrcode =$this->input->post('hrcode');
        //$hrcode = $this->session->userdata['hrcode'];
  
        if ($this->user_model->card_exists($cardid,$hrcode) == TRUE) {
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
        $this->load->view('front/success');
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

}
