<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();       
        $this->load->model('m_brand'); 
        $this->load->model('m_producer');
        $this->load->model('m_influencer'); 
    }
	public function brand()
	{
		if (isset($_POST['username'])&&$_POST['username']!="") {
			$brand_id=$this->m_brand->generate_id();
			$ins_data = array(
					'id' => $brand_id,
					'username' => $_POST['username'],
					'password' => $_POST['password'], 
				);
			$isuniq=$this->m_brand->check_dup_username($_POST['username']);
			if ($isuniq) {
				$this->m_brand->add_brand($ins_data);
				redirect();
			}else{
				echo "dupplicate username";
			}			
		}else{
			$this->load->view('v_meta');
			$this->load->view('v_header');
			$this->load->view('register/v_brand_register');
			$this->load->view('v_footer');
		}
	}
	public function producer()
	{
		if (isset($_POST['username'])&&$_POST['username']!="") {
			$producer_id=$this->m_producer->generate_id();
			$ins_data = array(
					'id' => $producer_id,
					'username' => $_POST['username'],
					'password' => $_POST['password'], 
				);
			$isuniq=$this->m_producer->check_dup_username($_POST['username']);
			if ($isuniq) {
				$this->m_producer->add_producer($ins_data);
				redirect();
			}else{
				echo "dupplicate username";
			}			
		}else{
			$this->load->view('v_meta');
			$this->load->view('v_header');
			$this->load->view('register/v_producer_register');
			$this->load->view('v_footer');
		}
	}
	public function influencer()
	{
		if (isset($_POST['username'])&&$_POST['username']!="") {
			$influencer_id=$this->m_influencer->generate_id();
			$ins_data = array(
					'id' => $influencer_id,
					'username' => $_POST['username'],
					'password' => $_POST['password'], 
				);
			$isuniq=$this->m_influencer->check_dup_username($_POST['username']);
			if ($isuniq) {
				$this->m_influencer->add_influencer($ins_data);
				redirect();
			}else{
				echo "dupplicate username";
			}			
		}else{
			$this->load->view('v_meta');
			$this->load->view('v_header');
			$this->load->view('register/v_influencer_register');
			$this->load->view('v_footer');
		}
	}
	public function login()
	{
		
		$this->load->view('v_meta');
		$this->load->view('v_header');
		$this->load->view('v_index');
		$this->load->view('v_footer');
	}
}
