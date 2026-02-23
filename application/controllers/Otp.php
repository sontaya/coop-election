<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** @property CI_Router $router */
class Otp extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $exclude = array('election_check', 'do_election_check');
        if (!in_array($this->router->method, $exclude) && !isset($this->session->userdata['logged_in']))
        {
            redirect('login');
        }

        $this->load->model(array('candidate_model','otp_model','user_model'));
        $this->load->helper('general');
        $this->load->helper('file');
        $this->load->library('user_agent');

    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';
        $data['cds1'] = $this->candidate_model->get_candidate_by_group(1);
        $data['cds2'] = $this->candidate_model->get_candidate_by_group(2);
        $data['cds3'] = $this->candidate_model->get_candidate_by_group(3);


        // $this->load->view('coop69/vote_1group',$data);
        $this->load->view('coop69/vote3_3group',$data);
    }

    public function add_vote()
    {
        if($this->input->post('checkbox_value'))
        {
            $pizza = $this->input->post('checkbox_value');
            $otpcode = $this->input->post('otpcode');
            $pcode = $this->input->post('pcode');
            //$vdata = $this->input->post('v_data');
            //$vcount = $this->input->post('v_count');
            $ip =$this->input->ip_address();

             $xdata =array(
                'otpcode' =>$otpcode,
                'pcode' =>$pcode,
                //'vdata' =>$vdata,
                //'vcount' =>$vcount,
                'ip_address' =>$ip ,
                'device' => $this->agent->platform(),
                //'ip_address' => get_myclient_ip(),
                'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),
                'created_at' => date('Y-m-d H:i:s'),
            );

            $results = $this->otp_model->checkDuplicatevote($otpcode);
            if ($results === TRUE) {
                 echo false;
            }else{
                    $idx = $this->otp_model->insert_vote($xdata);
                    if($idx){
                        for($i = 0; $i < count($pizza); $i++)
                        {
                            $pieces = explode(":", $pizza[$i]);
                            $data =array(
                                'otpcode' =>$otpcode,
                                'pcode' =>$pcode,
                                'candidate_id' =>$pieces[0],
                                'vgroup' => $pieces[1],
                                'a_num' => $pizza[$i],
                                'c_num' => get_candidate_number($pieces[0]),
                                'created_at' => date('Y-m-d H:i:s'),
                            );
                           $this->otp_model->insert_vote_detail($data);
                         $this->write_logs($pcode,$pizza[$i],$pieces[0],$pieces[1]);
                        }

                    }else{
                        echo false;
                     //sendmail($this->session->userdata['email'],$this->session->userdata['fullname']);
                    }
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

    public function otp_exists() {
        $otpid =$this->input->post('otpid');

        if ($this->otp_model->otp_exists($otpid) == TRUE) {
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
        $this->load->view('coop69/otp_success');
    }

    function check_session(){
        echo isset($this->session->userdata['logged_in']);
    }

    public function election_check()
	{
        $data['title'] = 'SDU eVote';

        $this->load->view('coop69/election_check');
    }

    public function do_election_check()
	{
        $otpcode    = $this->input->post('otpcode',TRUE);
		$check_res = $this->otp_model->get_otp_status($otpcode);
		echo json_encode($check_res);
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

    public function write_logs($pcode,$a_num,$c_num,$vgroup){

        $data = date('Y-m-d H:i:s') .','.$pcode.','.$a_num.','.$c_num.','.$vgroup."\r\n";
        $todate = date("Y-m-d");

        $file_path = FCPATH . "/logs/log_".$todate.".txt";
        if(file_exists($file_path))
        {
            write_file($file_path,$data , 'a+');
        }
        else
        {
            write_file($file_path,$data,'wb');
        }

    }

}
