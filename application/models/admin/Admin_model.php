<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
   
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function validate($pcode,$pwd){
        $this->db->where('pcode', $pcode);
        $this->db->where('password', $pwd);
        $result = $this->db->get('tbl_admin',1);
        return $result;
    }

    public function get_applicant_total(){        
        return $this->db->count_all('tbl_candidate');
    }

    public function get_election_total(){         
        return $this->db->count_all('tbl_user');
    }

    public function allvote(){   

        return $this->db->count_all('tbl_vote');
    }

    public function allvote01(){  
        $sql="SELECT count(DISTINCT otpcode) as total FROM tbl_vote_detail WHERE vgroup='1' AND c_num not in('0')"; 
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function allvote02(){   

       $sql="SELECT count(DISTINCT otpcode) as total FROM tbl_vote_detail WHERE vgroup='2' AND c_num not in('0')"; 
        $result = $this->db->query($sql);
        return $result->row()->total;
    }

    public function unvote($group_id){      
        $sql = "SELECT * FROM tbl_user WHERE NOT EXISTS (SELECT * FROM tbl_vote_detail WHERE tbl_vote_detail.pcode = tbl_user.pcode AND tbl_vote_detail.vgroup=".$group_id.")";
        $query = $this->db->query($sql);        
        $result = $query->num_rows(); 

        return $result;
    }

    public function novote($group_id){      
        $sql = "SELECT * FROM tbl_vote_detail WHERE c_num = 0 and vgroup=".$group_id;
        $query = $this->db->query($sql);        
        $result = $query->num_rows(); 

        return $result;
    }

     public function get_election_process($group_id){
        $this->db->select('c.id,c.c_number, c.pid, c.candidate_name,COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->where('c.c_group', $group_id);
        $this->db->group_by('v.candidate_id'); 
        $this->db->order_by('COUNT(v.hrcode) DESC,c.c_number ASC');        
        $this->db->order_by('total DESC');
        $this->db->order_by('c_number ASC');
        $query = $this->db->get('vw_score');

        return $query->result();
    }

    public function get_election_process1(){
        $this->db->select('c.id,c.c_number, c.pid, c.candidate_name,COUNT(v.hrcode) AS total');
         $this->db->from('tbl_vote_demo v');    
         $this->db->join('tbl_candidate c','v.candidate_id = c.id');
         $this->db->group_by('v.candidate_id'); 
         $this->db->order_by('COUNT(v.hrcode) DESC,c.c_number ASC');  
         $query = $this->db->get();        
        /* $this->db->order_by('c_number ASC');   
         $query = $this->db->get('vw_score');*/
 
         return $query->result();
     }

    public function get_election_process2(){
       $this->db->select('c.id,c.c_number, c.pid, c.candidate_name,COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote_demo v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id'); 
        $this->db->order_by('COUNT(v.hrcode) DESC,c.c_number ASC');  
        $query = $this->db->get();     
       /* $this->db->order_by('total DESC');
        $this->db->order_by('c_number ASC');
        $query = $this->db->get('vw_score');*/

        return $query->result();
    }

    /*public function get_election_report(){
        $this->db->select('faculty_id,faculty_name,count(id) as total');
        $this->db->from('tbl_user');
        $this->db->group_by('faculty_id');
        $this->db->group_by('faculty_name');
        $this->db->order_by('faculty_id');
        $query = $this->db->get();

        return $query->result();
    }*/

     public function get_election_report(){
        $this->db->select('u.faculty_id,u.faculty_name,count(u.id) as total,count(rh.hrcode) as total2');
        $this->db->from('tbl_user u');
        $this->db->join('tbl_vote_detail rh','rh.hrcode = u.hrcode','left');
        $this->db->group_by('faculty_id');
        $this->db->group_by('faculty_name');
        $this->db->order_by('faculty_id');
        $query = $this->db->get();

        return $query->result();
    }

     public function get_current_election_report(){
        $this->db->select('u.faculty_id, u.faculty_name, COUNT(u.id) as total');
        $this->db->from('tbl_user u');    
        $this->db->join('tbl_vote v','u.hrcode = v.hrcode');
        $this->db->group_by('u.faculty_id');
        $this->db->group_by('u.faculty_name');
        $this->db->order_by('u.faculty_id');    
        
        $query = $this->db->get();

        return $query->result();
     }

     //report result
    public function get_report11(){       
       //group 1 order by number
       
       $this->db->select('cc.id AS id,cc.candidate_name AS candidate_name,cc.picture AS picture,cc.c_number AS c_number, count( vd.id ) AS total,row_number() over ( ORDER BY count( vd.id ) DESC, cc.id ) AS num_row');
       $this->db->from('tbl_candidate cc');    
       $this->db->join('tbl_vote_detail vd','cc.id = vd.candidate_id AND vd.vgroup = 1','left'); 
       $this->db->where('cc.c_group',1);
       $this->db->group_by('cc.id');
       $this->db->order_by('cc.c_number');  
       $query = $this->db->get();
       return $query->result();
     }

      public function get_report12(){       
        //group 1 order by score 

        $this->db->select('cc.id AS id,cc.candidate_name AS candidate_name,cc.picture AS picture,cc.c_number AS c_number, count( vd.id ) AS total,row_number() over ( ORDER BY count( vd.id ) DESC, cc.id ) AS num_row');
        $this->db->from('tbl_candidate cc');    
        $this->db->join('tbl_vote_detail vd','cc.id = vd.candidate_id AND vd.vgroup = 1','left'); 
        $this->db->where('cc.c_group',1);
        $this->db->group_by('cc.id');
        $this->db->order_by('total DESC');
        $this->db->order_by('vd.candidate_id'); 
         
        $query = $this->db->get();
        return $query->result();
     }

      public function get_report21(){
        //group 2 order by number
       
        $this->db->select('cc.id AS id,cc.candidate_name AS candidate_name,cc.picture AS picture,cc.c_number AS c_number, count( vd.id ) AS total,row_number() over ( ORDER BY count( vd.id ) DESC, cc.id ) AS num_row');
        $this->db->from('tbl_candidate cc');    
        $this->db->join('tbl_vote_detail vd','cc.id = vd.candidate_id AND vd.vgroup = 2','left'); 
        $this->db->where('cc.c_group',2);
        $this->db->group_by('cc.id');
        $this->db->order_by('cc.c_number');  
        $query = $this->db->get();
        return $query->result();

        //$query = $this->db->get('vw_score21');
        //return $query->result();
     }

      public function get_report22(){      
        //group 2 order by score 

        $this->db->select('cc.id AS id,cc.candidate_name AS candidate_name,cc.picture AS picture,cc.c_number AS c_number, count( vd.id ) AS total,row_number() over ( ORDER BY count( vd.id ) DESC, cc.id ) AS num_row');
        $this->db->from('tbl_candidate cc');    
        $this->db->join('tbl_vote_detail vd','cc.id = vd.candidate_id AND vd.vgroup = 2','left'); 
        $this->db->where('cc.c_group',2);
        $this->db->group_by('cc.id');
        $this->db->order_by('total DESC');
        $this->db->order_by('cc.id'); 
         
        $query = $this->db->get();
        return $query->result();

     }

     /*
     public function get_election_score($group_id){
        $this->db->select('c.id,c.c_number, c.candidate_name, COUNT(v.id) AS total');
        $this->db->from('tbl_vote_detail v');    
        $this->db->join('tbl_candidate c','v.c_num = c.c_number AND v.vgroup = c.c_group'); 
        $this->db->where('v.vgroup',$group_id);
        $this->db->group_by('v.c_num'); 
        if($group_id==1){
            $this->db->order_by('COUNT(v.id) DESC'); 
            $this->db->order_by('v.c_num ASC');
        }   else{
            $this->db->order_by('COUNT(v.id) DESC'); 
            $this->db->order_by('v.c_num ASC');  
        }            

        $query = $this->db->get();

        return $query->result();
    }

    public function get_election_score1($group_id){  

        $this->db->select('c.id,c.c_number, c.candidate_name, COUNT(v.id) AS total');
        $this->db->from('tbl_vote_detail v');    
        $this->db->join('tbl_candidate c','v.c_num = c.number');
        $this->db->where('v.vgroup',$group_id);
        $this->db->group_by('v.c_num');        
        $this->db->order_by('c.c_number');    
        
        $query = $this->db->get();

        return $query->result();
    }

    public function get_election_score2($group_id){
        $this->db->select('c.id,c.c_number, c.candidate_name, COUNT(v.id) AS total');
        $this->db->from('tbl_vote_detail v');    
        $this->db->join('tbl_candidate c','v.c_num = c.number');
        $this->db->where('v.vgroup',$group_id);                
        $this->db->order_by('COUNT(v.id) DESC'); 
        $this->db->order_by('v.c_num ASC'); 
        $this->db->group_by('v.c_num');   
        
        $query = $this->db->get();

        return $query->result();
    }
*/
    public function user_admin_exists($userid){
        $this->db->where('pcode', $userid);        
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    public function get_profile($pcode)
    {
        $this->db->where('pcode', $pcode);
        $query =$this->db->get('tbl_admin');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }  
    }

    function fetch_chart_data()
     {
        $this->db->select('c.id,c.c_number,COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id');        
        $this->db->order_by('c.c_number');    
        
        $query = $this->db->get();

        return $query;

      /*$this->db->where('year', $year);
      $this->db->order_by('year', 'ASC');
      return $this->db->get('chart_data');*/
     }

     public function get_alluser(){     
        $query = $this->db->order_by('n_order','ASC')->get("tbl_user");
        return $query->result();
 
     }

     public function card_exists($cardid,$pcode){
        $this->db->where('card_id', $cardid);
        $this->db->where('pcode', $pcode);         
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    public function set_process(){
        $data = array(
            'exec_process' => '1',
        );
        $this->db->where('id', 1);
        $this->db->update('sitesettings', $data);
    }

    public function vote_list(){
       $query = $this->db->get('vw_vote');

        return $query->result();
    }

     public function get_lotto_process(){ 
        $lottoArr = array();   
        for($i=0;$i < 20; $i++) {       
            $this->db->order_by('rand()');
            $this->db->limit(1);
            $query = $this->db->get('tbl_vote');

            array_push($lottoArr,$query->row()->otpcode); 
            //array_push($lottoArr,$query->row()->refcode); 
        }
        $random_keys=array_rand($lottoArr,1);
        //$array = str_split($lottoArr[$random_keys]);
        return $lottoArr[$random_keys];
    }

     public function get_lotto_process1(){            
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('tbl_vote');

        return $query->result();
    }

    public function get_lotto(){
       $this->db->select('otpcode');
       $query = $this->db->get('tbl_vote');
       // $this->db->select('refcode');
       //$query = $this->db->get('tbl_otp');

        return $query->result();
    }



}
