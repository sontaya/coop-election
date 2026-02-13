<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_admin'])) 
        {
            redirect('admin/login');
        }
        $this->load_admin_global();
        $this->load->model(array('admin/admin_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('general_helper');
    }

	 public function index()
    {  
        $data['title'] = 'รายงานผลการเลือกตั้ง';
        $this->data = $data;
        $this->middle = 'admin/report/home';
        $this->admin_layout();
    }

 public function view()
    {  
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        //$data['group1'] = $this->admin_model->get_report11();
        //$data['group2'] = $this->admin_model->get_report21();
        $data['group2'] = $this->admin_model->get_report22();
       
        $this->data = $data;
        $this->middle = 'admin/report/view';
        $this->admin_layout();
    }

    public function election_process()
    {
        //$data1=$this->data;
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        //$data=array_merge($data1,$data2);
        //$data['results'] = $this->admin_model->get_election_process();
        
        $this->data = $data;

        $this->middle = 'admin/report/election_process';
        $this->admin_layout();
    }

    public function process_score()
    {
        $data1['group1'] = $this->admin_model->get_report11();
        $data2['group2'] = $this->admin_model->get_report21();
       
         $output[] = array(
          $data1,
         $data2
        );
        echo json_encode($output);
    }

    public function election_report()
    {
        $data1=$this->data;
        $data2['title'] = 'รายงานจำนวนผู้มาใช้สิทธิ';
        $data2['orgs'] = $this->admin_model->get_election_report();
        $data2['currents'] = $this->admin_model->get_current_election_report();
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/election_report';
        $this->admin_layout();
    }

    public function election_result()
    {
        $data1=$this->data;
        $data2['title'] = 'ผลการเลือกตั้ง';
        $data2['score1'] = $this->admin_model->get_election_score(1);
        $data2['score2'] = $this->admin_model->get_election_score(2);
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/election_result';
        $this->admin_layout();
    }

     function fetch_chart()
     {      
       $chart_data = $this->admin_model->fetch_chart_data();
       
       foreach($chart_data->result_array() as $row)
       {
        $output[] = array(
         'c_number'  => $row["c_number"],
         'profit' => floatval($row["total"])
        );
       }
       echo json_encode($output);
      
     }

    public function vote_list()
    {
        $data1=$this->data;
        $data2['title'] = 'รายชื่อผู้ลงคะแนนเลือกตั้ง';       
        $data2['votelist'] = $this->admin_model->vote_list();
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/vote_list';
        $this->admin_layout();
    }

    public function summary()
    {
      
        $data['title'] = 'สรุปผลการเลือกตั้ง';
   
        $data['group1'] = $this->admin_model->unvote();
        $data['group2'] = $this->admin_model->novote();
        
        $this->data = $data;       
        $this->middle = 'admin/summary';
        $this->admin_layout();
    }

    public function report11()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง คะแนนรายบุคลเรียงตามหมายเลข';
        $data['allvote'] = $this->admin_model->get_election_total() ;
        $data['vote'] = $this->admin_model->allvote01();
        $data['unvote'] = $this->admin_model->unvote(1);
        $data['novote'] = $this->admin_model->novote(1);
        $data['userscore'] = $this->admin_model->get_report11();
        
        $this->data = $data;        
        $this->middle = 'admin/report/print11';
        $this->admin_layout();
    }

    public function report12()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง คะแนนรายบุคคลเรียงตามคะแนน';
        $data['allvote'] = $this->admin_model->get_election_total() ;
        $data['vote'] = $this->admin_model->allvote01();
        $data['unvote'] = $this->admin_model->unvote(1);
        $data['novote'] = $this->admin_model->novote(1);
        $data['userscore'] = $this->admin_model->get_report12();
        
        $this->data = $data;        
        $this->middle = 'admin/report/print12';
        $this->admin_layout();
    }

    public function report21()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง คะแนนรายบุคลเรียงตามหมายเลข';
        $data['allvote'] = $this->admin_model->get_election_total() ;
        $data['vote'] = $this->admin_model->allvote02();
        $data['unvote'] = $this->admin_model->unvote(2);
        $data['novote'] = $this->admin_model->novote(2);
        $data['userscore'] = $this->admin_model->get_report21();
        
        $this->data = $data;        
        $this->middle = 'admin/report/print21';
        $this->admin_layout();
    }

    public function report22()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง คะแนนรายบุคคลเรียงตามคะแนน';
        $data['allvote'] = $this->admin_model->get_election_total() ;
        $data['vote'] = $this->admin_model->allvote02();
        $data['unvote'] = $this->admin_model->unvote(2);
        $data['novote'] = $this->admin_model->novote(2);
        $data['userscore'] = $this->admin_model->get_report22();
        
        $this->data = $data;        
        $this->middle = 'admin/report/print22';
        $this->admin_layout();
    }

    public function lotto(){ 
         
        $data['title'] = 'จับรางวัล';
        $chart_data = $this->admin_model->get_lotto();
       
       foreach($chart_data  as $row)
       {
        $output[] = array(
          $row->otpcode,
        );
       }
  
        $data['otpcodes'] = $output;   
        $this->data = $data;
        $this->middle = 'admin/lotto';
        $this->admin_layout();
    }

  
    
}
