<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();        
    }
	public function index()
	{
		$this->cache->memcached->save('foos', 'badd', 1000);
		$data['foo']=$this->cache->memcached->get('foos');
		print_r($data);
		var_dump($this->cache->memcached->get_metadata('foos'));
		$this->load->view('v_meta');
		$this->load->view('v_header',$data);
		$this->load->view('v_index');
		$this->load->view('v_footer');
	}
	public function index2()
	{
		
		$data['foo']=$this->cache->memcached->get('foos');
		$this->load->view('welcome_message',$data);
	}
}
