<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();       
        $this->load->model('m_brand'); 
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
	public function logout()
	{
		$this->m_session_cache->delete('brand_id');
		redirect();
	}

}
