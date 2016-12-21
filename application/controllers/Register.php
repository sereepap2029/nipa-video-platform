<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();       
        $this->load->model('m_brand'); 
    }
	public function brand()
	{
		//$this->m_cache->save('foos', 'badd', 1000);
		//$data['foo']=$this->m_cache->get('foos');
		//print_r($data);
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
	public function login()
	{
		
		$this->load->view('v_meta');
		$this->load->view('v_header');
		$this->load->view('v_index');
		$this->load->view('v_footer');
	}
}
