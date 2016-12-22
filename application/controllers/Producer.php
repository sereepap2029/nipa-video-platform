<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producer extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_producer');
    }
	public function profile()
	{
		$id=$this->uri->segment(3,'');
		$data['profile']=$this->m_producer->get_producer_by_id($id);
		$this->load->view('producer/v_meta');
		$this->load->view('producer/v_header');
		$this->load->view('producer/v_profile',$data);
		$this->load->view('producer/v_footer');
	}
}
