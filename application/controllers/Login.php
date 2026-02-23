<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('login_model');
        $this->load->model('otp_model');
        $this->load->library('user_agent');
        $this->load->helper('general');
    }

    public function index()
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

        $data['myip'] = get_myclient_ip();
        $this->data = $data;
        $this->load->view('coop69/login',$data);

    }

    public function user_exists($pcode)
    {
        if ($this->user_model->user_exists($pcode) == TRUE) {
            //echo json_encode(FALSE);
            return FALSE;
        } else {
            return TRUE;
            //echo json_encode(TRUE);
        }
    }

    function verify_account()
    {
        $pcode = $this->input->post('username');
        $card_id = $this->input->post('password');


        if($this->user_model->check_user($pcode,$card_id)==1){
            return true;
        } else {
            return false;
        }

    }

	function otpauth(){
        $otpcode    = $this->input->post('username',TRUE);
        if($this->otp_model->get_otp_status($otpcode)==TRUE){
            $this->session->set_flashdata('error_message',"คุณใช้สิทธิลงคะแนนเลือกตั้งแล้ว");
            redirect('login');
        }else{

            $validate = $this->otp_model->otp_validate($otpcode);
            if($validate->num_rows() > 0){
               $data  = $validate->row_array();
               $otpcode  = $data['refcode'];
               $pcode  = $data['pcode'];

               $data = array(
                'pid'=>$otpcode,
                'hrcode' =>$pcode,
                'login_time' =>date('H:i:s'),
                'device' => $this->agent->platform(),
                'ip_address' => get_myclient_ip(),
                'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),
                //'mac_address' => GetClientMac(),
                'created_at' => date('Y-m-d H:i:s')
            );
               $id = $this->user_model->add_login_log($data);

               $sesdata = array(
                'otpcode' =>$otpcode,
                'pcode' =>$pcode,
                'logged_in' => TRUE
                );
               $this->session->set_userdata($sesdata);
               redirect('otp');

           }else{
            $this->session->set_flashdata('error_message','รหัส OTP ไม่ถูกต้อง.');
            redirect('login');
        }
    }

}

function signout(){
    foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
    $this->session->sess_destroy();
    redirect('login');
}

/*public function loginSubmit(){
    $username = $this->input->post('txtusername');

    if($this->session->userdata('is_logged_in')==true){
        $sessiondata =$this->session->all_userdata();
        $userid = $sessiondata['userid'];
        redirect('dashboard');
    }else{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtusername','User name','required|trim|callback_verify_user');
        $this->form_validation->set_rules('txtpassword','Password','required|trim');
        if($this->form_validation->run()){
            $userid = $this->input->post('txtusername');
            $u_data=array(
                'userid'=>$userid,
                'is_logged_in'=>true
            );
                //create session of current user
            $this->session->set_userdata($u_data);
                //fetch new session
            $sessionid = session_id();
                //Map new session
            $this->login_model->setsession($userid,$sessionid);
            redirect('dashboard');
        }else{
                //validate fail
            $this->loadLogin();
        }
    }
}*/

public function error403() {


    $this->load->view('error403');
}


}
