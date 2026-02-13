<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lotto extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_admin'])) 
        {
            redirect('admin/login');
        }
        $this->load_admin_global();
        $this->load->model(array('admin/lotto_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('general_helper');
    }

	

    public function lotto1()
    {  
        $data['title'] = 'จับรางวัล';
              
       
        $this->data = $data;
        $this->middle = 'admin/lotto/lotto1';
        $this->admin_layout();
    }

    public function lotto2()
    {  
        $data['title'] = 'จับรางวัล';
              
        
        $this->data = $data;
        $this->middle = 'admin/lotto/lotto2';
        $this->admin_layout();
    }

    public function lotto3()
    {  
        $data['title'] = 'จับรางวัล';
        
        $this->data = $data;
        $this->middle = 'admin/lotto/lotto3';
        $this->admin_layout();
    }


    public function lotto4()
    {  
        $data['title'] = 'จับรางวัล';
              
      
        $this->data = $data;
        $this->middle = 'admin/lotto/lotto4';
        $this->admin_layout();
    }


    public function lotto5()
    {  
        $data['title'] = 'จับรางวัล';
        $chart_data = $this->lotto_model->get_lotto();
       
       foreach($chart_data  as $row)
       {
        $output[] = array(
          $row->otpcode,
        );
       }
  
        $data['otpcodes'] = $output;   
        $this->data = $data;
        $this->middle = 'admin/lotto/lotto3';
        $this->admin_layout();
    }

    public function process_lotto1()
    {
        $results =array();
        $results = $this->lotto_model->get_lotto_v1();
        $i=1;
        if($results){
            $msg = '<div class="card" id="card_form"><div class="card-header bg-danger"><h4>ผลรางวัล</h4></div><div class="card-body"><div class="table-responsive">';
            $msg .= '<table id="desktop" class="table table-sm table-bordered"><thead> <tr>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">#</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">รหัสสมาชิก</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">ชื่อ - สกุล</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">Round</th></tr></thead><tbody>';
            foreach($results as $r){
               $msg .= '<tr><td style="text-align: center; vertical-align: middle;">'. $i.'</d>';
               $msg .= '<td >'. $r->pcode .'</d> ';
               $msg .= '<td >'. $r->fullname.'</d> '; 
               $msg .= '<td >'. $r->st_pass.'</d>  </tr>';
               $i+=1;
            }
            $msg .= '</tbody></table>';
            $msg .= "</div></div></div>";
            
            $data =$msg;

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
        
        //echo json_encode($data);
    }

    public function process_lotto2()
    {
        $results =array();
        $results = $this->lotto_model->get_lotto_v2();
        $i=1;
        if($results){
            $msg = '<div class="card" id="card_form"><div class="card-header bg-danger"><h4>ผลรางวัล</h4></div><div class="card-body"><div class="table-responsive">';
            $msg .= '<table id="desktop" class="table table-sm table-bordered"><thead> <tr>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">#</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">รหัสสมาชิก</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">ชื่อ - สกุล</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">Round</th></tr></thead><tbody>';
            foreach($results as $r){
               $msg .= '<tr><td style="text-align: center; vertical-align: middle;">'. $i.'</d>';
               $msg .= '<td >'. $r->pcode .'</d> ';
               $msg .= '<td >'. $r->fullname.'</d>';
               $msg .= '<td >'. $r->st_pass.'</d>  </tr>'; 
               $i+=1;
            }
            $msg .= '</tbody></table>';
            $msg .= "</div></div></div>";
            
            $data =$msg;

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
        
        //echo json_encode($data);
    }

    public function process_lotto3()
    {
        $results =array();
        $results = $this->lotto_model->get_lotto_v3();
        $i=1;
        if($results){
            $msg = '<div class="card" id="card_form"><div class="card-header bg-danger"><h4>ผลรางวัล</h4></div><div class="card-body"><div class="table-responsive">';
            $msg .= '<table id="desktop" class="table table-sm table-bordered"><thead> <tr>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">#</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">รหัสสมาชิก</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">ชื่อ - สกุล</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">Round</th></tr></thead><tbody>';
            foreach($results as $r){
               $msg .= '<tr><td style="text-align: center; vertical-align: middle;">'. $i.'</d>';
               $msg .= '<td >'. $r->pcode .'</d> ';
               $msg .= '<td >'. $r->fullname.'</d>'; 
               $msg .= '<td >'. $r->st_pass.'</d>  </tr>'; 
               $i+=1;
            }
            $msg .= '</tbody></table>';
            $msg .= "</div></div></div>";
            
            $data =$msg;

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
        
        //echo json_encode($data);
    }

     public function process_lotto4()
    {
        $results =array();
        $results = $this->lotto_model->get_lotto_process4();
        
        $i=1;
        if($results){
            $msg = '<div class="card" id="card_form"><div class="card-header bg-danger"><h4>ผลรางวัล</h4></div><div class="card-body"><div class="table-responsive">';
            $msg .= '<table id="desktop" class="table table-sm table-bordered"><thead> <tr>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">#</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">รหัสสมาชิก</th>';
            $msg .= '<th  style="text-align: center; vertical-align: middle;">ชื่อ - สกุล</th></tr></thead><tbody>';
            
            foreach($results as $r){
               $msg .= '<tr><td style="text-align: center; vertical-align: middle;">'. $i.'</d>';
               $msg .= '<td >'. $r->pcode .'</d> ';
               $msg .= '<td >'. $r->fullname.'</d> </tr>'; 
              
               $i+=1;
            }
            $msg .= '</tbody></table>';
            $msg .= "</div></div></div>";
            
            $data =$msg;

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
    }


    public function process_lotto4x()
    {
        $results =array();
        $results = $this->lotto_model->get_lotto_process4();
        
        echo json_encode($results);
    }
  /*  public function index()
    {  
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
        $this->middle = 'admin/lotto/lotto';
        $this->admin_layout();
    }*/
 
}
