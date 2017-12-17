<?php

class login extends CI_Controller {

    public function index() {
        $this->data["page"] = "user_login";
        $this->load->view("welcome_message", $this->data);
    }

    public function adminLogin($type = "") {
        if ($type == "check") {
            $this->db->where('email', $this->input->post('txtemail'));
            $this->db->where('password', $this->input->post('txtpwd'));
            $data = $this->db->get('admin')->row();
            if (count($data) == 1) {
                $this->session->set_userdata("AdminName", $data->fname . " " . $data->lname);
                $this->session->set_userdata("Adminemail", $data->email);
                redirect(base_url() . "index.php/admin");
            } else {
                $this->load->view("error404");
                return;
            }
        }
        $this->load->view("admin_login");
    }

    public function logout() {
        if ($this->session->userdata("Adminemail") != null) {
            $this->session->sess_destroy();
            redirect(base_url() . "index.php/login/adminLogin/");
        }
        $this->session->sess_destroy();
        redirect(base_url() . "index.php/login/userLogin/");
    }

    public function register($type_of_op = "") {
        if ($type_of_op == "create") {
            $data["email"] = $this->input->post("txtemail");
            $data["username"] = $this->input->post("txtuname");
            $data["password"] = $this->input->post("txtpwd");
            $data["IsActivated"] = True;
            $data["profile_status"] = FALSE;
            $data["RegisteredTime"] = date("Y-m-d h:i:s a");
            $this->db->insert("users", $data);

            $id = $this->db->insert_id();

            $planid = $this->db->get("plan")->row()->id;
            $data = array();
            $data["user_id"] = $id;
            $data["plan_id"] = $planid;
            $data["activation_date"] = date("Y/m/d");
            $this->db->insert("user_plan", $data);

            mkdir('template/BasicTemplate/' . $id);
            mkdir('template/BasicTemplate/' . $id . '/img/');
            mkdir('template/BasicTemplate/' . $id . '/thumbnil/');
            mkdir('template/BasicTemplate/' . $id . '/saveTemplate/');
            copy('template/BasicTemplate/ProfileImage.jpg', 'template/BasicTemplate/' . $id . '/ProfileImage.jpg');
            copy('template/BasicTemplate/emailMarketing.jpeg', 'template/BasicTemplate/' . $id . '/emailMarketing.jpeg');
            redirect(base_url() . 'index.php/login/');
        }
        $this->data["page"] = "register";
        $this->load->view("welcome_message", $this->data);
    }

    public function userLogin($type_of_op = "") {
        if ($type_of_op == "check") {
            $this->db->where('email', $this->input->post('txtemail'));
            $this->db->where('password', $this->input->post('txtpwd'));
            $data = $this->db->get('users')->row();
           
            if (count($data) == 1) {
                $todayDate = date_create(date('Y/m/d'));

                $this->db->where("user_id", $data->id);
                $this->db->order_by("activation_date", "desc");
                $row = $this->db->get("user_plan")->row();

                $this->db->where("id", $row->plan_id);
                $plan = $this->db->get("plan")->row();


                $expireDate = date_create(date("Y/m/d", strtotime($row->activation_date . "+" . $plan->duration)));
                $diff = date_diff($todayDate, $expireDate, false);
                $str = $diff->format("%R%a");

                if (substr($str, 0, 1) == "-") {
                    $this->load->view("errorExpire");
                    return;
                } else {
                    
                    if ($data->IsActivated == "1") {
                        $data = (Array)$data;
                        $this->session->set_userdata($data);
                        redirect(base_url() . "index.php/user/");
                        
                    } else {
                        //echo "Block";
                        $this->load->view("errorBlock");
                        return;
                    }
                }
            } else {
                //echo "Fail";
                $this->load->view("error404");
                return;
            }
        }
        $this->data["page"] = "user_login";
        $this->load->view("welcome_message", $this->data);
    }

}

?>