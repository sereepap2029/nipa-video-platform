<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_brand'); 
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
		
		$this->load->view('brand/v_meta');
		$this->load->view('brand/v_header');
		$this->load->view('brand/v_creator_list');
		$this->load->view('brand/v_footer');
	}
}
