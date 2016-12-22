<?php
class M_cache extends CI_Model {
 
    public function __construct(){
	date_default_timezone_set('Asia/Bangkok');
        parent::__construct();
        $this->load->driver('cache',
	        array('adapter' => 'memcached', 'backup' => 'file')
		);
	}
	
	public function save($name, $value,$time) {
		$this->cache->save($name, $value, $time);
	}
	
	public function get ($name) {
		return $this->cache->get($name);
	}
	
	public function delete ($name) {
		$this->cache->delete($name);
	}
	
}
?>