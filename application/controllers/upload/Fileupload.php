<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fileupload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }
    public function add_campaign_file()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        if ($_POST['filename'] != ""&&$_POST['campaign_id'] != ""&&$_POST['new_filename'] != ""&&$_POST['campaign_folder'] != "") {
            $filename = $_POST['filename'];
            $ext = explode(".", $filename);
            $new_ext = $ext[count($ext) - 1];
            $new_filename = $_POST['new_filename']. "." . $new_ext;
            $file = './media/temp/' . $filename;
            $newfile = './media/campaign/'.$_POST['campaign_folder']."/" . $new_filename;
            
            if (!copy($file, $newfile)) {
                $json['flag']="failed to copy $file...\n" . $file . " to " . $newfile . "  and  ";
                
                @unlink("./media/temp/" . $filename);
            } 
            else {
                $json['flag']="OK";
                $json['new_filename']=$new_filename;
                @unlink("./media/temp/" . $filename);
            }
        }else{
            $json['flag']="File or work ID not receive ";
        }
        
        echo json_encode($json);
		
	}
}