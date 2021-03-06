<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_brand'); 
        $this->load->model('m_producer');
        $this->load->model('m_influencer');
        $this->load->model('m_campaign');
        $this->load->model('m_time');
        $auth=false;
        if ($this->m_session_cache->get('brand_id')) {
            $user_data = $this->m_brand->get_brand_by_id($this->m_session_cache->get('brand_id'));
            if (isset($user_data->username)) {
            	$auth=true;
            }
        }
        if ($this->m_session_cache->get('influencer_id')) {
            $user_data = $this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
            if (isset($user_data->username)) {
            	$auth=true;
            }
        }
        if ($this->m_session_cache->get('producer_id')) {
            $user_data = $this->m_producer->get_producer_by_id($this->m_session_cache->get('producer_id'));
            if (isset($user_data->username)) {
            	$auth=true;
            }
        }
        if (!$auth) {
        	redirect('login/logout');
        }
    }
	// ajax handle region
	public function get_camp_detail()
	{
		$campaign_id=$_GET['camp_id'];
		$data['campaign']=$this->m_campaign->get_campaign_by_id($campaign_id);
		$data['campaign']->social=$this->m_campaign->get_campaign_has_social_by_campaign_id($campaign_id);
		$data['creators_invited']=$this->m_campaign->get_campaign_has_creator_by_campaign_id($campaign_id,"invite");
		$data['creators_submit']=$this->m_campaign->get_campaign_has_creator_by_campaign_id($campaign_id,"submit");
		$this->load->view('ajax/campaign/v_creator_campaign_detail',$data);
		
	}
	public function update_camp_detail()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $campaign_id=$_POST['camp_id'];
			    $data_so = array(
					'name' => $_POST['name'], 
					'description' => $_POST['description'],
					'url' => $_POST['url'],
					'status' => $_POST['status'],
					'start_date' => $this->m_time->datepicker_to_unix($_POST['start_date']),
					'end_date' => $this->m_time->datepicker_to_unix($_POST['end_date']),
					);
				$this->m_campaign->update_campaign($data_so,$campaign_id);
        
        echo json_encode($json);
		
	}
	public function update_camp_detail_cre()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $campaign_id=$_POST['camp_id'];
        $old_campaign=$this->m_campaign->get_campaign_by_id($campaign_id);
        $data_so = array(
			'progress' => $_POST['progress'], 
		);
        if ($_POST['file']!="") {
        	@unlink("./media/campaign/submit/" . $old_campaign->file);
	        $new_filename=$campaign_id."_".time();
	        $result1=$this->m_campaign->add_campaign_file($_POST['file'],$campaign_id,$new_filename,'submit');
	        
	        if ($result1 === FALSE) { 
	                $json['data']= "false send post";
	            }else{
	            	//print_r($result1);
	            	$return_data=json_decode($result1);
	            	if ($return_data->flag!="OK") {
	            		$json['data']= $return_data->flag;
	            	}else{
						$filename=$return_data->new_filename;
						$data_so['file']=$filename;					
					}
	        }
        }
        
        $this->m_campaign->update_campaign($data_so,$campaign_id);
        echo json_encode($json);
		
	}
	public function get_propos_detail()
	{
		$id=$_GET['id'];
		$data['propos']=$this->m_campaign->get_campaign_has_creator_by_id($id);
		$this->load->view('ajax/campaign/v_brand_propos_detail',$data);
		
	}
	public function send_camp_form(){
		$campaign_id=$_GET['camp_id'];
		$data['campaign']=$this->m_campaign->get_campaign_by_id($campaign_id);
		$this->load->view('ajax/campaign/v_propos_form',$data);
	}
	public function send_camp_propos()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $campaign_id=$_POST['camp_id'];
        $this->m_campaign->delete_campaign_has_creator_by_creator_id_and_camp_id($_POST['creator_id'],$_POST['camp_id']);
        $camp=$this->m_campaign->get_campaign_has_creator_by_creator_id_and_campaign_id($_POST['creator_id'],$_POST['camp_id']);
        if (isset($camp->id)) {
        	$json['data']="Already send Proposal";
        }else{
        	$card_filename=$campaign_id."_".$_POST['creator_id']."_id_card";
        	$port_filename=$campaign_id."_".$_POST['creator_id']."_port";
        	$result1=$this->m_campaign->add_campaign_file($_POST['img_id_card'],$campaign_id,$card_filename,'proposal');
        	$result2=$this->m_campaign->add_campaign_file($_POST['img_port'],$campaign_id,$port_filename,'proposal');
            if ($result1 === FALSE||$result2 === FALSE) { 
                $json['data']= "false send post";
                //var_dump($result);
            }else{
            	$return_data=json_decode($result1);
				$card_filename=$return_data->new_filename;
				$return_data=json_decode($result2);
				$port_filename=$return_data->new_filename;
			    $data_so = array(
					'id' => $this->m_campaign->generate_campaign_has_creator_id(),
					'creator_id' => $_POST['creator_id'], 
					'creator_type' => $_POST['creator_type'],
					'campaign_id' => $_POST['camp_id'],
					'brand_id' => $_POST['brand_id'],
					'invite_type' => "submit",
					'propos_name' => $_POST['propos_name'],
					'propos_civil_id' => $_POST['propos_civil_id'],
					'propos_address' => $_POST['propos_address'],
					'propos_nickname' => $_POST['propos_nickname'],
					'propos_cost' => $_POST['propos_cost'],
					'propos_term' => $_POST['propos_term'],
					'img_id_card' => $card_filename,
					'img_port' => $port_filename,
					);
				$this->m_campaign->add_campaign_has_creator($data_so);
				$json['data']="Proposal sent!!";
				$json['res_dat1']=$result1;
				$json['res_dat2']=$result2;
			}
		}
        
        echo json_encode($json);
		
	}
	public function accept_propos()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $propos=$this->m_campaign->get_campaign_has_creator_by_id($_POST['id']);
        $data_so = array(
        		'status' => "reject", 
        	);
        $this->m_campaign->update_all_campaign_has_creator_by_campaign_id($data_so,$propos->campaign_id);
        $data_2 = array(
        		'status' => "accept", 
        	);
        $this->m_campaign->update_campaign_has_creator($data_2,$_POST['id']);
        $data_camp = array(
        		'status' => "WIP",
        		'accept_budget' => $propos->propos_cost,
        	);
        $this->m_campaign->update_campaign($data_camp,$propos->campaign_id);
        $json['data']="รับข้อเสนอ เรียบร้อยแล้ว";
        echo json_encode($json);
        
		
	}

}
