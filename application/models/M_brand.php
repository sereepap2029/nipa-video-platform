<?php
class M_brand extends CI_Model
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
            $query = $this->db->get_where('brand', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function delete_brand($id) { //no use
        $this->delete_bu_by_brand_id($id);
        $this->db->where('id', $id);
        $this->db->delete('brand');
    }
    function delete_bu($id) { //no use
        $this->db->where('id', $id);
        $this->db->delete('brand_has_bu');
    }
    function delete_bu_by_brand_id($id) { //no use
        $this->db->where('brand_id', $id);
        $this->db->delete('brand_has_bu');
    }

    function add_brand($data) {
        $this->db->insert('brand', $data);
    }
    function add_bu($data) { //no use
        $this->db->insert('brand_has_bu', $data);
    }
    function update_bu($data, $id) { //no use
        $this->db->where('id', $id);
        $this->db->update('brand_has_bu', $data);
    }
    function update_brand($data, $id) { //no use
        $this->db->where('id', $id);
        $this->db->update('brand', $data);
    }
    function get_all_brand() { //no use
        $g_list = array();
        $this->db->order_by("name", "asc");
        $query = $this->db->get('brand');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_bu_by_brand_id($id) { //no use
        $g_list = array();
        $this->db->where('brand_id', $id);
        $this->db->order_by("bu_name", "asc");
        $query = $this->db->get('brand_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_all_bu() {//no use
        $g_list = array();
        $this->db->order_by("bu_name", "asc");
        $query = $this->db->get('brand_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_bu_by_id($id) {//no use
        $g_list = new stdClass();
        $this->db->where('id', $id);
        $query = $this->db->get('brand_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            $g_list = $g_list[0];
            //$g_list->bu=$this->get_bu_by_brand_id($id);
        }
        return $g_list;
    }

    function get_brand_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('brand', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
    function get_brand_by_username_password($username,$password) {
        $brand = new stdClass();
        $query = $this->db->get_where('brand', array('username' => $username,'password' => $password));
       
        if ($query->num_rows() > 0) {
            $brand = $query->result();
            $brand = $brand[0];
       }
        return $brand;
    }
    function check_dup_username($username) {
       $isuniq = FALSE;
       $query = $this->db->get_where('brand', array('username' => $username));
           if ($query->num_rows() == 0) {
               $isuniq = TRUE;
           }
       
      return $isuniq;
    }
}
