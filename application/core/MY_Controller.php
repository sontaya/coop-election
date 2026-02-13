<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
//set the class variable.
    var $fronttemplate = array();    
    var $admintemplate = array();
    var $counciltemplate = array(); 
    var $data = array();
    var $v_home ='coop67';

    public function __construct() {
        parent::__construct();

       /* $allowedIPSArr = array(
            '10.129.35.15',            
            '10.210.192.126',
            '127.0.0.2',
        );

        if(!in_array($this->getClientIp(),$allowedIPSArr, true)){
          //redirect('403');
           //$this->load->view('error403');
            echo 'access denied';
           die();

        }*/
        //enable ip check
        //$this->check_access();
        
    }

    public function check_access(){
        $query =$this->db->select('ip_address')->where('astatus',1)->get('tbl_access_list');          

        $allowedIPSArr = array();

        foreach ($query->result_array() as $value) {
          array_push($allowedIPSArr,$value['ip_address']);        
         
        }
		
      //Array ( [0] => 10.129.35.15 [1] => 10.210.192.126 [2] => 127.0.0.2 )

        if(!in_array($this->getClientIp(),$allowedIPSArr, true)){

            echo $this->getClientIp() .' access denied';
           die();

        }

    }

    public function load_admin_info(){
        $query =$this->db->select('exec_process')->where('id',1)->get('sitesettings');
            
        $this->data = array('c_exec' => $query->row()->exec_process);

    }

    public function load_admin_global(){
        //Check login or redirect to logout
        if($this->session->userdata('logged_admin')!=true){ redirect(base_url().'admin/logout','refresh');}
        $this->load_admin_info();

    }

    public function load_info(){                       

        $query =$this->db->select('site_name,version,start_time,end_time')->where('id',1)->get('sitesettings');
        //date_default_timezone_set(trim($query->row()->timezone));
        //$time_format = (trim($query->row()->time_format)=='24') ? date("h:i:s") : date("h:i:s a");
        //$date_view_format = trim($query->row()->date_format);
        //$this->session->set_userdata(array('view_date'  => $date_view_format));
        //$this->session->set_userdata(array('view_time'  => $query->row()->time_format));

        $this->data = array('base_url'      => base_url(),
                            'SITE_TITLE'    => $query->row()->site_name,
                            'VERSION'       => $query->row()->version,
                            'start_time'       => $query->row()->start_time,
                            'end_time' => $query->row()->end_time,                                
                            'CUR_DATE'      => date("Y-m-d"),                              
                            //'CUR_USERNAME'  => $this->session->userdata('inv_username'),
                            //'CUR_USERID'    => $this->session->userdata('inv_userid'),
                            );
      }
      
    public function load_global(){
        //Check login or redirect to logout
        if($this->session->userdata('logged_in')!=true){ redirect(base_url().'logout','refresh');    }
        $this->load_info();
    }

    //Load layout
    public function layout() {
        // making temlate and send data to view.
        $this->fronttemplate['header'] = $this->load->view('layouts/header', $this->data, true);        
        $this->fronttemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->fronttemplate['footer'] = $this->load->view('layouts/footer', $this->data, true);
        $this->load->view('layout/template', $this->fronttemplate);
    }

    public function layout2() {
        // making temlate and send data to view.
        $this->fronttemplate['header'] = $this->load->view('layout/header2', $this->data, true);
        //$this->fronttemplate['sidebar']   = $this->load->view('front/layout/sidebar', $this->data, true);
        $this->fronttemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->fronttemplate['footer'] = $this->load->view('layout/footer', $this->data, true);
        $this->load->view('layout/template2', $this->fronttemplate);
    }

    public function admin_layout() {
       // $this->load_admin_global();
        // making temlate and send data to view.
        $this->admintemplate['header'] = $this->load->view('admin/layout/header', $this->data, true);
        $this->admintemplate['sidebar']   = $this->load->view('admin/layout/sidebar', $this->data, true);
        $this->admintemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->admintemplate['footer'] = $this->load->view('admin/layout/footer', $this->data, true);
        $this->load->view('admin/layout/template', $this->admintemplate);       
    }

    function is($arr = array(), $key){
        if(isset($arr[$key]) && $arr[$key]){
            return $arr[$key];
        }
        return false;
    }

    function getClientIp() {
        $ipAddress = '';
        if ($this->is($_SERVER, 'HTTP_CLIENT_IP')) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if ($this->is($_SERVER, 'HTTP_X_FORWARDED_FOR')) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if ($this->is($_SERVER, 'HTTP_X_FORWARDED')) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if ($this->is($_SERVER, 'HTTP_FORWARDED_FOR')) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if ($this->is($_SERVER, 'HTTP_FORWARDED')) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if ($this->is($_SERVER, 'REMOTE_ADDR')) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = 'UNKNOWN';
        }

        return $ipAddress;
    }
	
}
