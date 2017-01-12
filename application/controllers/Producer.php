<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producer extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_brand'); 
        $this->load->model('m_producer');
        $this->load->model('m_campaign');
        $this->load->model('m_time');
        if ($this->m_session_cache->get('brand_id')) {
            $user_brand_data = $this->m_brand->get_brand_by_id($this->m_session_cache->get('brand_id'));
            if (isset($user_brand_data->username)) {
                $this->user_brand_data = $user_brand_data;
            }
        }
    }
    private function require_auth(){
    	if ($this->m_session_cache->get('producer_id')) {
            $user_data = $this->m_producer->get_producer_by_id($this->m_session_cache->get('producer_id'));
            if (isset($user_data->username)) {
                $this->user_data = $user_data;
            }
            else {
                redirect('login/logout');
            }
        }
        else {
            redirect('login/logout');
        }
    }
	public function profile()
	{
		$id=$this->uri->segment(3,'');
		$data['profile']=$this->m_producer->get_producer_by_id($id);
		if (isset($this->user_brand_data)) {
			$data['brand_data']=$this->user_brand_data;
			$data['campaign_list']=$this->m_campaign->get_all_campaign($this->user_brand_data->id);
			$data['invited_campaign']=$this->m_campaign->get_campaign_has_creator_by_creator_id_and_brand_id($id,$this->user_brand_data->id);
		}
		$this->load->view('producer/v_meta');
		$this->load->view('producer/v_header');
		$this->load->view('producer/v_profile',$data);
		$this->load->view('producer/v_footer');
	}
}
