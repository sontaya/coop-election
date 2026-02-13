<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function fetch_all()
    {
        $query = $this->db->order_by('c_number', 'ASC')->get("tbl_candidate");
        return $query->result();
    }

    public function save($data){
       if ($this->db->insert("tbl_candidate", $data)) { 
            return true; 
        } 
    }
 
    public function update($data, $id)
    {
        $this->db->set($data); 
        $this->db->where("id", $id); 
        $this->db->update("tbl_candidate", $data);        
    }
 
    public function delete($id)
    {
        if ($this->db->delete("tbl_candidate", "id = ".$id)) { 
            return true; 
        } 
    } 

    public function get_candidate_by_group($group_id){
        $this->db->where('c_group', $group_id);
        $query = $this->db->get('tbl_candidate');
        return $query->result();
    }
}
