<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Influencer extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_influencer');
    }
	public function profile()
	{
		$id=$this->uri->segment(3,'');
		$data['profile']=$this->m_influencer->get_influencer_by_id($id);
		$this->load->view('influencer/v_meta');
		$this->load->view('influencer/v_header');
		$this->load->view('influencer/v_profile',$data);
		$this->load->view('influencer/v_footer');
	}
}
