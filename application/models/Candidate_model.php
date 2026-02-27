<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_model extends CI_Model
{
	public function __construct()
	{
        // Call the Model constructor
		parent::__construct();
	}

	function fetch_all()
	{
		$query = $this->db->order_by('c_number','ASC')->get("tbl_candidate");
		return $query->result();
	}

	 public function get_candidate_by_group($group_id){
         $this->db->where('c_group', $group_id);
         $query = $this->db->get('tbl_candidate');
         return $query->result();
     }

	 public function get_score1(){
		$this->db->order_by('score_order1','ASC');
		$this->db->where('c_group', '1');
		$query = $this->db->get('tbl_score_announce');
		return $query->result();
	}

	public function get_score2(){

		$this->db->order_by('score_order1','ASC');
                $this->db->order_by('c_number');
		$this->db->where('c_group', '2');
		$query = $this->db->get('tbl_score_announce');
		return $query->result();
	}
	public function get_score3(){
                //$this->db->order_by('c_number');
		$this->db->order_by('score_order1','ASC');
                $this->db->order_by('c_number');
		$this->db->where('c_group', '3');
		$query = $this->db->get('tbl_score_announce');
		return $query->result();
	}


}
