<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();       
        $this->load->model('m_brand'); 
        $this->load->model('m_influencer'); 
        $this->load->model('m_producer'); 
    }
	public function brand()
	{
		if (isset($_POST['username'])&&$_POST['username']!="") {
			$isuniq=$this->m_brand->check_dup_username($_POST['username']);
			if (!$isuniq) {
				$dat=$this->m_brand->get_brand_by_username_password($_POST['username'],$_POST['password']);
				$this->m_session_cache->save('brand_id',$dat->id);
				redirect("brand");
				
			}else{
				$this->session->set_userdata('login_error', 'Invalid username or password');
				redirect();
			}			
		}else{
			redirect();
		}
	}
	public function producer()
	{
		if (isset($_POST['username'])&&$_POST['username']!="") {
			$isuniq=$this->m_producer->check_dup_username($_POST['username']);
			if (!$isuniq) {
				$dat=$this->m_producer->get_producer_by_username_password($_POST['username'],$_POST['password']);
				$this->m_session_cache->save('producer_id',$dat->id);
				redirect("producer/dashboard");
				
			}else{
				$this->session->set_userdata('login_error', 'Invalid username or password');
				redirect();
			}			
		}else{
			redirect();
		}
	}
	public function influencer()
	{
		if (isset($_POST['username'])&&$_POST['username']!="") {
			$isuniq=$this->m_influencer->check_dup_username($_POST['username']);
			if (!$isuniq) {
				$dat=$this->m_influencer->get_influencer_by_username_password($_POST['username'],$_POST['password']);
				$this->m_session_cache->save('influencer_id',$dat->id);
				redirect("influencer/dashboard");
				
			}else{
				$this->session->set_userdata('login_error', 'Invalid username or password');
				redirect();
			}			
		}else{
			redirect();
		}
	}
	public function logout()
	{
		$this->m_session_cache->delete('brand_id');
		redirect();
	}

}
