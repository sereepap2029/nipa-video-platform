<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_brand'); 
        $this->load->model('m_producer');
        $this->load->model('m_influencer');
        $this->load->model('m_campaign');
        $this->load->model('m_time');
        if ($this->m_session_cache->get('brand_id')) {
            $user_data = $this->m_brand->get_brand_by_id($this->m_session_cache->get('brand_id'));
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
	public function index()
	{
		
		$this->load->view('brand/v_meta');
		$this->load->view('brand/v_header');
		$this->load->view('brand/v_dashboard');
		$this->load->view('brand/v_footer');
	}
	public function creator()
	{
		
		$this->load->view('brand/v_meta');
		$this->load->view('brand/v_header');
		$this->load->view('brand/v_creator');
		$this->load->view('brand/v_footer');
	}
	public function creator_list()
	{
		$type=$this->uri->segment(3,'');
		$data['text_arr']['all']="All";
		$data['text_arr']['producer']="Producer";
		$data['text_arr']['influencer']="Influencer";
		$data['show_type']=$type;
		if ($type=="producer") {
			$data['list']=$this->m_producer->get_all_producer();
		}else if($type=="influencer"){
			$data['list']=$this->m_influencer->get_all_influencer();
		}else{
			$list1=$this->m_producer->get_all_producer();
			$list2=$this->m_influencer->get_all_influencer();
			$data['list']= array_merge($list1, $list2);
		}
		$this->load->view('brand/v_meta');
		$this->load->view('brand/v_header');
		$this->load->view('brand/v_creator_list',$data);
		$this->load->view('brand/v_footer');
	}
	public function campaign_list()
	{
		
		$this->load->view('brand/v_meta');
		$this->load->view('brand/v_header');
		$this->load->view('brand/v_campaign_list');
		$this->load->view('brand/v_footer');
	}
	public function campaign_create()
	{
		if (isset($_POST['name'])&&$_POST['name']!="") {
			$campaign_id=$this->m_campaign->generate_id();
			$ins_data = array(
					'id' => $campaign_id,
					'name' => $_POST['name'],
					'budget_start' => $_POST['budget_start'],
					'budget_end' => $_POST['budget_end'],
					'url' => $_POST['url'],
					'start_date' => $this->m_time->datepicker_to_unix($_POST['start_date']),
					'end_date' => $this->m_time->datepicker_to_unix($_POST['end_date']),
					'description' => $_POST['description'],
				);
				$this->m_campaign->add_campaign($ins_data);
				redirect("brand/campaign_list");
		}else{
			$this->load->view('brand/v_meta');
			$this->load->view('brand/v_header');
			$this->load->view('brand/v_campaign_create');
			$this->load->view('brand/v_footer');
		}
	}
}
