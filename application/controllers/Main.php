<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();        
    }
	public function index()
	{
		//$this->m_cache->save('foos', 'badd', 1000);
		//$data['foo']=$this->m_cache->get('foos');
		//print_r($data);
		$this->load->view('v_meta');
		$this->load->view('v_header');
		$this->load->view('v_login');
		$this->load->view('v_footer');
	}
	public function exp()
	{
		
		$this->load->view('v_meta');
		$this->load->view('v_header');
		$this->load->view('v_index');
		$this->load->view('v_footer');
	}
}
