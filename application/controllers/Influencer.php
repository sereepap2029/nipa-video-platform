<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Influencer extends CI_Controller {

	public function __construct() {
        parent::__construct();        
        $this->load->model('m_influencer');
        $this->load->model('m_brand'); 
        $this->load->model('m_campaign');
        $this->load->model('m_time');
        $this->load->model('m_creator_campaign');
        if ($this->m_session_cache->get('brand_id')) {
            $user_brand_data = $this->m_brand->get_brand_by_id($this->m_session_cache->get('brand_id'));
            if (isset($user_brand_data->username)) {
                $this->user_brand_data = $user_brand_data;
            }
        }
    }
    private function require_auth(){
    	if ($this->m_session_cache->get('influencer_id')) {
            $user_data = $this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
            if (isset($user_data->username)) {
                $this->user_data = $user_data;
            }
            else {
                redirect('login/logout');
            }
        }
        else {
            redirect('login/logout');
        }
    }
	public function profile()
	{
		$id=$this->uri->segment(3,'');
		$data['profile']=$this->m_influencer->get_influencer_by_id($id);
		if (isset($this->user_brand_data)) {
			$data['brand_data']=$this->user_brand_data;
			$data['campaign_list']=$this->m_campaign->get_all_campaign($this->user_brand_data->id);
			$data['invited_campaign']=$this->m_campaign->get_campaign_has_creator_by_creator_id_and_brand_id($id,$this->user_brand_data->id);
		}
		$this->load->view('influencer/v_meta');
		$this->load->view('influencer/v_header');
		$this->load->view('influencer/v_profile',$data);
		$this->load->view('influencer/v_footer');
	}
	public function dashboard()
	{
		$this->require_auth();
		$data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
		$this->load->view('influencer/v_meta');
		$this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
		$this->load->view('influencer/v_dashboard',$data);
		$this->load->view('influencer/v_footer');
	}
    public function sponsorship()
    {
        $this->require_auth();
        $data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
        $data['campaign_list']=$this->m_campaign->get_all_campaign("all","active");
        shuffle($data['campaign_list']);
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_sponsorship',$data);
        $this->load->view('influencer/v_footer');
    }
    public function partnership()
    {
        $this->require_auth();
        $data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
        $data['my_campaign']=$this->m_creator_campaign->get_all_campaign($this->m_session_cache->get('influencer_id'));
        $data['campaign_list']=$this->m_creator_campaign->get_all_invite_campaign($this->m_session_cache->get('influencer_id'),"active");
        shuffle($data['campaign_list']);
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_partnership',$data);
        $this->load->view('influencer/v_footer');
    }
    public function campaign_create()
    {
        $this->require_auth();
        if (isset($_POST['name'])&&$_POST['name']!="") {
            $campaign_id=$this->m_creator_campaign->generate_id();
            $ins_data = array(
                    'id' => $campaign_id,
                    'name' => $_POST['name'],
                    'budget_start' => $_POST['budget_start'],
                    'budget_end' => $_POST['budget_end'],
                    'start_date' => $this->m_time->datepicker_to_unix($_POST['start_date']),
                    'end_date' => $this->m_time->datepicker_to_unix($_POST['end_date']),
                    'description' => $_POST['description'],
                    'privacy' => $_POST['privacy'],
                    'create_by' => $this->user_data->id,
                );
            print_r($_POST);
            $result=$this->m_creator_campaign->add_campaign_file($_POST['filename'],$campaign_id,$campaign_id."_profile",'profile');
            if ($result === FALSE) { 
                echo "false send post";
                var_dump($result);
            }else{
                //print_r(json_decode($result));
                var_dump($result);
                $return_data=json_decode($result);
                $ins_data['picture']=$return_data->new_filename;
                $this->m_creator_campaign->add_campaign($ins_data);
                if (isset($_POST['partner'])) {
                    
                    foreach ($_POST['partner'] as $key => $value) {
                        $partner_id=$this->m_creator_campaign->generate_campaign_has_creator_id();
                        $partner_dat = array(
                            'id' => $partner_id,
                            'creator_type' => "influencer",
                            'creator_id' => $value,
                            'campaign_id' => $campaign_id,
                            'invite_type' => "invite",
                            'create_by' => $this->user_data->id, 
                            'response' => "pending",
                            );
                        $this->m_creator_campaign->add_campaign_has_creator($partner_dat);
                    }
                }
                
                redirect("influencer/partnership");
            }

            
            
        }else{
            // something
        }
    }
    public function campaign_edit()
    {
        $this->require_auth();
        $campaign_id=$this->uri->segment(3,'');
        $data['campaign_detail']=$this->m_creator_campaign->get_campaign_by_id($campaign_id);
        $data['campaign_has_creator']=$this->m_creator_campaign->get_campaign_has_creator_by_campaign_id($campaign_id);
        if (isset($_POST['name'])&&$_POST['name']!="") {
            $ins_data = array(
                    'name' => $_POST['name'],
                    'budget_start' => $_POST['budget_start'],
                    'budget_end' => $_POST['budget_end'],
                    'start_date' => $this->m_time->datepicker_to_unix($_POST['start_date']),
                    'end_date' => $this->m_time->datepicker_to_unix($_POST['end_date']),
                    'description' => $_POST['description'],
                    'privacy' => $_POST['privacy'],
                );
            if ($_POST['filename']!="no_file") {
                $newfile = './media/campaign_creator/profile/' . $data['campaign_detail']->picture;
                @unlink($newfile);
                $result=$this->m_creator_campaign->add_campaign_file($_POST['filename'],$campaign_id,$campaign_id."_profile_".time(),'profile');
                if ($result === FALSE) { 
                    echo "false send post";
                    var_dump($result);
                }else{
                    //print_r(json_decode($result));
                    var_dump($result);
                    $return_data=json_decode($result);
                    $ins_data['picture']=$return_data->new_filename;
                    $this->m_creator_campaign->update_campaign($ins_data,$campaign_id);
                    $this->m_creator_campaign->delete_campaign_has_creator_by_campaign_id($campaign_id);
                    if (isset($_POST['partner'])) {
                        
                        foreach ($_POST['partner'] as $key => $value) {
                            $partner_id=$this->m_creator_campaign->generate_campaign_has_creator_id();
                            $partner_dat = array(
                                'id' => $partner_id,
                                'creator_type' => "influencer",
                                'creator_id' => $value,
                                'campaign_id' => $campaign_id,
                                'invite_type' => "invite",
                                'create_by' => $this->user_data->id, 
                                'response' => "pending",
                                );
                            $this->m_creator_campaign->add_campaign_has_creator($partner_dat);
                        }
                    }
                    
                    redirect("influencer/partnership");
                }
            }else{
                    $this->m_creator_campaign->update_campaign($ins_data,$campaign_id);
                    $this->m_creator_campaign->delete_campaign_has_creator_by_campaign_id($campaign_id);
                    if (isset($_POST['partner'])) {
                        
                        foreach ($_POST['partner'] as $key => $value) {
                            $partner_id=$this->m_creator_campaign->generate_campaign_has_creator_id();
                            $partner_dat = array(
                                'id' => $partner_id,
                                'creator_type' => "influencer",
                                'creator_id' => $value,
                                'campaign_id' => $campaign_id,
                                'invite_type' => "invite",
                                'create_by' => $this->user_data->id, 
                                'response' => "pending",
                                );
                            $this->m_creator_campaign->add_campaign_has_creator($partner_dat);
                        }
                    }
                    
                    redirect("influencer/partnership");
            }
            

            
            
        }else{
            $this->load->view('influencer/v_meta');
            $this->load->view('influencer/v_header');
            $this->load->view('influencer/v_header_button');
            $this->load->view('influencer/v_campaign_edit',$data);
            $this->load->view('influencer/v_footer');
        }
    }
    public function campaign_delete()
    {
        $this->require_auth();
        $campaign_id=$this->uri->segment(3,'');
        $data['campaign_detail']=$this->m_creator_campaign->get_campaign_by_id($campaign_id);
        $newfile = './media/campaign_creator/profile/' . $data['campaign_detail']->picture;
        @unlink($newfile);
        $this->m_creator_campaign->delete_campaign($campaign_id);
        redirect("influencer/partnership");
    }




    public function myjob()
    {
        $this->require_auth();
        $data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
        $data['my_campaign']=$this->m_creator_campaign->get_all_campaign($this->m_session_cache->get('influencer_id'));
        $data['my_wip_campaign']=$this->m_campaign->get_wip_campaign_for_creator($this->m_session_cache->get('influencer_id'));
        $data['my_reject_campaign']=$this->m_campaign->get_reject_campaign_for_creator($this->m_session_cache->get('influencer_id'));
        $data['my_complete_campaign']=$this->m_campaign->get_complete_campaign_for_creator($this->m_session_cache->get('influencer_id'));
        $data['campaign_list']=$this->m_creator_campaign->get_all_invite_campaign($this->m_session_cache->get('influencer_id'),"active");
        
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_myjob',$data);
        $this->load->view('influencer/v_footer');
    }
    public function job_detail()
    {
        $this->require_auth();
        $campaign_id=$this->uri->segment(3,'');
        $data['campaign']=$this->m_campaign->get_campaign_by_id($campaign_id);
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_campaign_detail_wip',$data);
        $this->load->view('influencer/v_footer');
    }
    public function reward()
    {
        $this->require_auth();
        $data['profile']=$this->m_influencer->get_influencer_by_id($this->m_session_cache->get('influencer_id'));
        $data['my_campaign']=$this->m_creator_campaign->get_all_campaign($this->m_session_cache->get('influencer_id'));
        $data['campaign_list']=$this->m_creator_campaign->get_all_invite_campaign($this->m_session_cache->get('influencer_id'),"active");
        
        $this->load->view('influencer/v_meta');
        $this->load->view('influencer/v_header');
        $this->load->view('influencer/v_header_button');
        $this->load->view('influencer/v_reward',$data);
        $this->load->view('influencer/v_footer');
    }

    // AJAX region
    public function show_partner()
    {
        $this->require_auth();
        $data['partner_list']=$this->m_influencer->get_all_influencer();
        $this->load->view('ajax/influencer/v_partner_list',$data);
    }
    public function add_partner()
    {
        $this->require_auth();
        $data['partner']=$this->m_influencer->get_influencer_by_id($_GET['partner_id']);
        $this->load->view('ajax/influencer/v_add_partner_element',$data);
    }
    public function send_camp_resp()
    {
        header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $camp=$this->m_creator_campaign->get_campaign_has_creator_by_creator_id_and_campaign_id($_POST['creator_id'],$_POST['camp_id']);
        if (isset($camp->id)) {            
            $data_so = array(
                'response' => $_POST['resp'],
                );
            $this->m_creator_campaign->update_campaign_has_creator($data_so,$camp->id);
            $json['data']="response :".$_POST['resp'];
        }
        
        echo json_encode($json);
        
    }
}
