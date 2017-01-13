<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_brand'); 
        $this->load->model('m_producer');
        $this->load->model('m_influencer');
        $this->load->model('m_campaign');
        $this->load->model('m_time');
    }
	// ajax handle region
	public function get_camp_detail()
	{
		$campaign_id=$_GET['camp_id'];
		$data['campaign']=$this->m_campaign->get_campaign_by_id($campaign_id);
		$data['campaign']->social=$this->m_campaign->get_campaign_has_social_by_campaign_id($campaign_id);
		$data['creators_invited']=$this->m_campaign->get_campaign_has_creator_by_campaign_id($campaign_id,"invite");
		$data['creators_submit']=$this->m_campaign->get_campaign_has_creator_by_campaign_id($campaign_id,"submit");
		$this->load->view('ajax/campaign/v_creator_campaign_detail',$data);
		
	}
	public function invite_influencer_to_camp()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $this->m_campaign->delete_campaign_has_creator_by_creator_id_and_brand_id($_POST['creator_id'],$this->user_data->id);
        if (isset($_POST['select'])) {
	        foreach ($_POST['select'] as $key => $value) {
	        	$data_so = array(
					'id' => $this->m_campaign->generate_campaign_has_creator_id(),
					'creator_id' => $_POST['creator_id'], 
					'creator_type' => "influencer",
					'campaign_id' => $value,
					'invite_type' => "invite",
					'brand_id' => $this->user_data->id,
					);
				$this->m_campaign->add_campaign_has_creator($data_so);
	        }
	    }
        
        echo json_encode($json);
		
	}

}
