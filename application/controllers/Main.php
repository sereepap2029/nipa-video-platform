<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    }
	public function index()
	{
		$this->load->view('v_meta');
		$this->load->view('v_header');
		$this->load->view('v_index');
		$this->load->view('v_footer');
	}
	public function index2()
	{
		$this->load->view('welcome_message');
	}
}
