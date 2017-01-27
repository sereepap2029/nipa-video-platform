<?php
class M_creator_campaign extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
        $this->load->model("m_influencer");
        $this->load->model("m_producer");
    }
    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('campaign_creator', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function generate_campaign_has_creator_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('campaign_creator_has_creator', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }
    function delete_campaign($id) { //no use
        $this->delete_campaign_has_creator_by_campaign_id($id);
        $this->db->where('id', $id);
        $this->db->delete('campaign_creator');
    }
    function delete_campaign_has_creator_by_campaign_id($campaign_id) {
        $this->db->where('campaign_id', $campaign_id);
        $this->db->delete('campaign_creator_has_creator');
    }

    function add_campaign($data) {
        $this->db->insert('campaign_creator', $data);
    }
    function add_campaign_has_creator($data) {
        $this->db->insert('campaign_creator_has_creator', $data);
    }
    function update_campaign($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('campaign_creator', $data);
    }
    function update_campaign_has_creator($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('campaign_creator_has_creator', $data);
    }
    function get_all_campaign($creator_id="all",$status="all",$privacy="all",$get_creator=true) {
        $g_list = array();
        $this->db->order_by("name", "asc");
        if ($creator_id!="all") {
            $this->db->where('create_by', $creator_id);
        }
        if ($status!="all") {
            $this->db->where('status', $status);
        }
        if ($privacy!="all") {
            $this->db->where('privacy', $privacy);
        }
        $query = $this->db->get('campaign_creator');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            if ($get_creator) {
                foreach ($g_list as $key => $value) {
                    $g_list[$key]->create_by=$this->m_influencer->get_influencer_by_id($value->create_by);
                }
            }
        }
        return $g_list;
    }
    function get_all_invite_campaign($creator_id="all",$status="all",$get_creator=true,$no_reject=true) {
        $g_list = array();
        $this->db->order_by("name", "asc");
        if ($creator_id!="all") {
            $this->db->where('campaign_creator_has_creator.creator_id', $creator_id);
        }
        if ($status!="all") {
            $this->db->where('campaign_creator.status', $status);
        }
        if ($no_reject) {
                $this->db->where('campaign_creator_has_creator.response !=', "reject");
        }
        $this->db->select('campaign_creator.*,campaign_creator_has_creator.response');
        $this->db->join('campaign_creator_has_creator', 'campaign_creator_has_creator.campaign_id = campaign_creator.id', 'right');
        $query = $this->db->get('campaign_creator');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            if ($get_creator) {
                foreach ($g_list as $key => $value) {
                    $g_list[$key]->create_by=$this->m_influencer->get_influencer_by_id($value->create_by);
                }
            }
        }
        return $g_list;
    }
    function get_campaign_has_creator_by_campaign_id($id,$invite_type="all",$create_by="all") { 
        $g_list = array();
        $this->db->where('campaign_id', $id);
        if ($invite_type!="all") {
            $this->db->where('invite_type', $invite_type);
        }  
        if ($create_by!="all") {
            $this->db->where('create_by', $create_by);
        }        
        $query = $this->db->get('campaign_creator_has_creator');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
            foreach ($g_list as $key => $value) {
                if ($value->creator_type=="producer") {
                    $g_list[$key]=$this->m_producer->get_producer_by_id($value->creator_id);
                }else{
                    $g_list[$key]=$this->m_influencer->get_influencer_by_id($value->creator_id);
                }
            }
        }
        return $g_list;
    }
    function get_campaign_has_creator_by_creator_id_and_campaign_id($creator_id,$campaign_id) { 
        $g_list = array();
        $g_list2 = new stdClass();
        $this->db->where('creator_id', $creator_id);
        $this->db->where('campaign_id', $campaign_id);
        $query = $this->db->get('campaign_creator_has_creator');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
                $g_list2=$g_list[0];
        }
        return $g_list2;
    }

    function get_campaign_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('campaign_creator', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
    function add_campaign_file($filename,$campaign_id,$new_filename,$campaign_folder) {
        // send post request to save file
            $url = upload_site_url('upload/fileupload/add_campaign_creator_file');
            $data = array(
                'filename' => $filename, 
                'campaign_id' => $campaign_id, 
                'new_filename' => $new_filename, 
                'campaign_folder' => $campaign_folder,
                );

            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            return $result;
    }

}
