<?php

class test extends CI_Controller {

    private $data = array();

    public function __construct() {

        parent::__construct();
//        if ($this->session->userdata("email") == NULL) {
//            redirect(base_url() . "index.php/login");
//        } else {
//            $this->data["email"] = $this->session->userdata("email");
//        }
    }

		
    public function index() {
    
    }

    public function checkopen($cid="",$sid="",$uid="")
    {
        $dta["userid"] = $uid;
		if($cid!="")
		{
			$this->db->where("campaign_id",$cid);
			$this->db->where("subscriber_id",$sid);
			$row = $this->db->get("campaign_subscriber")->row();

			if(!$row->opened)
			{
				$ip = $_SERVER["REMOTE_ADDR"];
				$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=$ip"));
				
				$data["delivered"] = "1";
				$data["opened"] = "1";
				$data["OpenInCountry"] = $details->geoplugin_countryName;
				
				$this->db->where("id",$row->id);
				$this->db->update("campaign_subscriber",$data);
			}
		}
		$this->load->view("user/test",$dta);
    }

    public function changedb()
	{
		// $this->db->query("alter table campaign_subscriber drop foreign key campaign_subscriber_ibfk_1");
		// $this->db->query("alter table campaign_subscriber change OpenInCountry OpenInCountry varchar(255)");
     //   $this->db->query("ALTER TABLE `template` ADD `type` VARCHAR(255) NULL AFTER `creationTime`");
	    // $this->db->query("delete from template where id in (15,16,17)");
	}
}

?>