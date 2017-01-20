<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Influencer extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_influencer');
        $this->load->model('m_brand'); 
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
    	if ($this->m_session_cache->get('influencer_id')) {
            $user_data = $this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
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
		$data['profile']=$this->m_influencer->get_influencer_by_id($id);
		if (isset($this->user_brand_data)) {
			$data['brand_data']=$this->user_brand_data;
			$data['campaign_list']=$this->m_campaign->get_all_campaign($this->user_brand_data->id);
			$data['invited_campaign']=$this->m_campaign->get_campaign_has_creator_by_creator_id_and_brand_id($id,$this->user_brand_data->id);
		}
		$this->load->view('influencer/v_meta');
		$this->load->view('influencer/v_header');
		$this->load->view('influencer/v_profile',$data);
		$this->load->view('influencer/v_footer');
	}
	public function dashboard()
	{
		$this->require_auth();
		$data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
		$this->load->view('influencer/v_meta');
		$this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
		$this->load->view('influencer/v_dashboard',$data);
		$this->load->view('influencer/v_footer');
	}
    public function sponsorship()
    {
        $this->require_auth();
        $data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
        $data['campaign_list']=$this->m_campaign->get_all_campaign("all","active");
        shuffle($data['campaign_list']);
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_sponsorship',$data);
        $this->load->view('influencer/v_footer');
    }
    public function partnership()
    {
        $this->require_auth();
        $data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
        $data['campaign_list']=$this->m_campaign->get_all_campaign("all","active");
        shuffle($data['campaign_list']);
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_partnership',$data);
        $this->load->view('influencer/v_footer');
    }
}
