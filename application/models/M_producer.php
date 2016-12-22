<?php
class M_producer extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
    }
    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('producer', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function check_dup_username($username) {
        $isuniq = FALSE;
        $query = $this->db->get_where('producer', array('username' => $username));
            if ($query->num_rows() == 0) {
                $isuniq = TRUE;
            }
        
        return $isuniq;
    }
    function delete_producer($id) { //no use
        $this->delete_bu_by_producer_id($id);
        $this->db->where('id', $id);
        $this->db->delete('producer');
    }
    function delete_bu($id) { //no use
        $this->db->where('id', $id);
        $this->db->delete('producer_has_bu');
    }
    function delete_bu_by_producer_id($id) { //no use
        $this->db->where('producer_id', $id);
        $this->db->delete('producer_has_bu');
    }

    function add_producer($data) {
        $this->db->insert('producer', $data);
    }
    function add_bu($data) { //no use
        $this->db->insert('producer_has_bu', $data);
    }
    function update_bu($data, $id) { //no use
        $this->db->where('id', $id);
        $this->db->update('producer_has_bu', $data);
    }
    function update_producer($data, $id) { //no use
        $this->db->where('id', $id);
        $this->db->update('producer', $data);
    }
    function get_all_producer() { //no use
        $g_list = array();
        $this->db->order_by("name", "asc");
        $query = $this->db->get('producer');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_bu_by_producer_id($id) { //no use
        $g_list = array();
        $this->db->where('producer_id', $id);
        $this->db->order_by("bu_name", "asc");
        $query = $this->db->get('producer_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_all_bu() {//no use
        $g_list = array();
        $this->db->order_by("bu_name", "asc");
        $query = $this->db->get('producer_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_bu_by_id($id) {//no use
        $g_list = new stdClass();
        $this->db->where('id', $id);
        $query = $this->db->get('producer_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            $g_list = $g_list[0];
            //$g_list->bu=$this->get_bu_by_producer_id($id);
        }
        return $g_list;
    }

    function get_producer_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('producer', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
    function get_producer_by_username_password($username,$password) {
        $producer = new stdClass();
        $query = $this->db->get_where('producer', array('username' => $username,'password' => $password));
        
        if ($query->num_rows() > 0) {
            $producer = $query->result();
            $producer = $producer[0];
        }
        return $producer;
    }
}
