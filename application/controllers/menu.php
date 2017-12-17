<?php

class menu extends CI_Controller {

    public function index() {
        $this->data["page"] = "home";
        $this->load->view("welcome_message",$this->data);
    }

    public function features()
    {
    	$this->data["page"] = "features";
        $this->load->view("welcome_message",$this->data);
    }
    
    public function contact($param1="")
    {
        if($param1=="feedback")
        {
            $data["email"] = $this->input->post("txtemail");
            $data["fname"] = $this->input->post("txtfname");
            $data["lname"] = $this->input->post("txtlname");
			$data["feedbackDate"] = date("Y-m-d H:i:s a");
            $data["content"] = $this->input->post("txtcontent");

            $this->db->insert("feedback",$data);
        }
        $this->data["page"] = "contact";
        $this->load->view("welcome_message",$this->data);
    }
 }
 ?>