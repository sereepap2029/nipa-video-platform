<?php
class M_campaign extends CI_Model
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
            $query = $this->db->get_where('campaign', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function delete_campaign($id) { //no use
        $this->delete_bu_by_campaign_id($id);
        $this->db->where('id', $id);
        $this->db->delete('campaign');
    }
    function delete_bu($id) { //no use
        $this->db->where('id', $id);
        $this->db->delete('campaign_has_bu');
    }
    function delete_bu_by_campaign_id($id) { //no use
        $this->db->where('campaign_id', $id);
        $this->db->delete('campaign_has_bu');
    }

    function add_campaign($data) {
        $this->db->insert('campaign', $data);
    }
    function add_bu($data) { //no use
        $this->db->insert('campaign_has_bu', $data);
    }
    function update_bu($data, $id) { //no use
        $this->db->where('id', $id);
        $this->db->update('campaign_has_bu', $data);
    }
    function update_campaign($data, $id) { //no use
        $this->db->where('id', $id);
        $this->db->update('campaign', $data);
    }
    function get_all_campaign() { //no use
        $g_list = array();
        $this->db->order_by("name", "asc");
        $query = $this->db->get('campaign');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_bu_by_campaign_id($id) { //no use
        $g_list = array();
        $this->db->where('campaign_id', $id);
        $this->db->order_by("bu_name", "asc");
        $query = $this->db->get('campaign_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }
    function get_all_bu() {//no use
        $g_list = array();
        $this->db->order_by("bu_name", "asc");
        $query = $this->db->get('campaign_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_bu_by_id($id) {//no use
        $g_list = new stdClass();
        $this->db->where('id', $id);
        $query = $this->db->get('campaign_has_bu');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            $g_list = $g_list[0];
            //$g_list->bu=$this->get_bu_by_campaign_id($id);
        }
        return $g_list;
    }

    function get_campaign_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('campaign', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
