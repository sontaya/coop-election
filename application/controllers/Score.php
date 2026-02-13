<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Score extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('candidate_model','user_model'));
        $this->load->helper('general');
        $this->load->library('user_agent');
    }

	public function index()
	{
        $data['title'] = 'สหกรณ์ออมทรัพย์ มหาวิทยาลัยสวนดุสิต';

        $this->data = $data;
        $this->middle = 'coop67/score_login';
        $this->layout2();
    }


public function s_signin()
{
   $pcode = $this->input->post('username');

   if($pcode == '1596'){
        $sess_prof = array(
            'uid' => '0001',
            'logged_in' => TRUE
         );
        $this->session->set_userdata($sess_prof);
        redirect('score/scoredetail');
   } else{
    $data['title'] = 'Coop eVote';
    $this->session->set_flashdata('error_message',"รหัสยืนยันไม่ถูกต้อง.");
    $this->data = $data;
    $this->middle = 'coop67/score_login';
    $this->layout2();

   }
}
/*public function score_login(){
    $data['title'] = 'Coop eVote';

    $this->data = $data;
    $this->middle = 'coop67/score_login';
    $this->layout2();
} */

 public function scoredetail(){

    if (!isset($this->session->userdata['logged_in']))
    {
        redirect('score');
    }

    $data['title'] = 'Coop eVote';

    // $data['score1'] = $this->candidate_model->get_score1();
    $data['score2'] = $this->candidate_model->get_score2();
    // $data['score3'] = $this->candidate_model->get_score3();

    $this->data = $data;
    $this->middle = 'coop68/score_detail';
    $this->layout2();
}

public function score_summary(){
    if (!isset($this->session->userdata['logged_in']))
    {
        redirect('score');
    }

    $data['title'] = 'Coop eVote';

    $data['score_sum1'] = $this->candidate_model->get_score_sum1();
    $data['score_sum2'] = $this->candidate_model->get_score_sum2();

    $this->data = $data;
    $this->middle = 'coop67/score_summary';
    $this->layout2();
}

}
