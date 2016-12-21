<?php
class M_session_cache extends CI_Model {
 
    public function __construct(){
	date_default_timezone_set('Asia/Bangkok');
        parent::__construct();
	}
	
	public function save($name, $value,$time=3600) {
		$this->m_cache->save($name, $value, $time);
		$this->session->set_userdata($name, $value);
	}
	
	public function get ($name,$time=3600) {
		if ( ! $foo = $this->m_cache->get($name))
		{
		        // 'Saving to the cache!<br />';
		        $foo = $this->session->userdata($name);

		        // Save into the cache for 60 minutes
		        $this->m_cache->save($name, $foo, $time);
		}
		return $this->m_cache->get($name);
	}
	
	public function delete ($name) {
		$this->m_cache->delete($name);
		$this->session->unset_userdata($name);
	}
	
}
?>