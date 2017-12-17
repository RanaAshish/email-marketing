<?php

class user extends CI_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("email") == NULL) {
            redirect(base_url() . "index.php/login");
        } else {
            $this->data["userid"] = $this->session->userdata('id');
            $this->data["username"] = $this->session->userdata("username");
            $this->db->select("IsActivated");
            $this->db->where("id", $this->session->userdata('id'));
            $val = $this->db->get("users")->row()->IsActivated;
            if ($val == "0") {
                //echo "Block";
                redirect(base_url() . "index.php/login/logout");
            }
        }
    }

//put your code here
    public function index() {
        $this->data["page"] = "dashboard";
        $uid = $this->session->userdata("id");

        $this->data["totEmail"] = $this->db->query("select sum(email_sent) as val from user_plan where user_id=$uid")->row()->val;
        $this->data["totCampaign"] = $this->db->query("select count(id) as val from campaign where user_id=$uid")->row()->val;

        $this->data["totGroup"] = $this->db->query("select count(id) as count from groups where user_id=$uid")->row()->count;
        $this->data["totSub"] = $this->db->query("select count(id) as count from subscriber where user_id=$uid")->row()->count;

        $this->db->where("user_id", $uid);
        $this->db->order_by("activation_date", "desc");
        $up = $this->db->get("user_plan")->row();
        $this->db->where("id", $up->plan_id);
        $plan = $this->db->get("plan")->row();

        $todayDate = date_create(date('Y/m/d'));
        $expireDate = date_create(date("Y/m/d", strtotime($up->activation_date . "+" . $plan->duration)));

        $this->data["PlanDuration"] = $plan->duration;
        $this->data["PlanName"] = $plan->name;
        $this->data["PlanDate"] = $up->activation_date;
        $this->data["totPlanDay"] = date_diff(date_create(date("Y/m/d", strtotime($up->activation_date))), $expireDate, false)->days;
        $this->data["remainDay"] = date_diff($todayDate, $expireDate, false)->days;
        $this->data["totPlanMail"] = $plan->maximum_mail;
        $this->data["remainMail"] = $plan->maximum_mail - $up->email_sent;
        $this->data["maxSub"] = $plan->maximum_subscriber;
        $this->data["remainSub"] = $plan->maximum_subscriber - $this->data["totSub"];

        $this->load->view("user/index", $this->data);
    }

    public function manageGroup($type_of_op = "", $id = "") {
        if ($type_of_op == "create") {
            $data['name'] = $this->input->post("txtname");
            $data['description'] = $this->input->post("txtdesc");
            $data['creationTime'] = date("Y-m-d h:i:s a");
            $data['user_id'] = $this->session->userdata("id");
            $this->db->insert("groups", $data);
            redirect(base_url() . 'index.php/user/manageGroup/');
        } else if ($type_of_op == "delete") {
            $this->db->where("id", $id);
            $this->db->delete("groups");
            redirect(base_url() . 'index.php/user/manageGroup/');
        } elseif ($type_of_op == "edit") {
            $data['name'] = $this->input->post("uptxtname");
            $data['description'] = $this->input->post("uptxtdesc");
            $data['creationTime'] = date("Y-m-d h:i:s a");
            $data['user_id'] = $this->session->userdata("id");
            $this->db->where(array("id" => $id));
            $this->db->update("groups", $data);
            redirect(base_url() . "index.php/user/manageGroup");
        } elseif ($type_of_op == "getSubscriber") {
            $content = "";
            $result = $this->db->query("select s.fname,s.lname,s.email from subscriber s,group_subscriber gs where s.id = gs.subscriber_id and gs.group_id = $id")->result();

            $content .= "<table class='table table-bordered table-striped'>";
            $content .= "<tr>";
            $content .= "<th>First Name</th>";
            $content .= "<th>Last Name</th>";
            $content .= "<th>Email</th>";
            $content .= "</tr>";
            foreach ($result as $obj) {
                $content .= "<tr>";
                $content .= "<td>$obj->fname</td>";
                $content .= "<td>$obj->lname</td>";
                $content .= "<td>$obj->email</td>";
                $content .= "</tr>";
            }
            $content .= "</table>";
            echo $content;
            die();
        } else {
            $this->data["page"] = "groupView";
            $this->db->where("user_id", $this->session->userdata("id"));
            $this->db->order_by("name");
            $this->data["result"] = json_encode($this->db->get("groups")->result());
            $this->load->view("user/index", $this->data);
        }
    }

    public function subscriber($type_of_op = "", $id = "") {
        $this->data["errormsg"] = "";
        if ($type_of_op == "create") {
            $uid = $this->session->userdata("id");
            // Checked whether user is allowed to add more subscriber
            $cnt = $this->db->query("select count(id) as count from subscriber where user_id=$uid")->row()->count;
            $this->db->where("user_id", $uid);
            $this->db->order_by("activation_date", "desc");
            $pid = $this->db->get("user_plan")->row()->plan_id;
            $this->db->where("id", $pid);
            $allowed_subscriber = $this->db->get("plan")->row()->maximum_subscriber;

            if ($allowed_subscriber > $cnt) {
                $data["fname"] = $this->input->post("txtfname");
                $data["lname"] = $this->input->post("txtlname");
                $data["email"] = $this->input->post("txtemail");
                $data['RegistrationTime'] = date("Y-m-d H:i:s a");
                $data['user_id'] = $this->session->userdata("id");
                $this->db->insert("subscriber", $data);

                $id = $this->db->insert_id();

                $d["group_id"] = $this->input->post("groups");
                if ($d["group_id"] != null) {
                    $arr = array();
                    for ($i = 0; $i < count($d["group_id"]); $i++) {
                        $arr[$i]["group_id"] = $d["group_id"][$i];
                        $arr[$i]["subscriber_id"] = $id;
                        $arr[$i]["AddingTime"] = date("Y-m-d H:i:s a");
                    }
                    $this->db->insert_batch("group_subscriber", $arr);
                }
                redirect(base_url() . "index.php/user/subscriber/");
            } else {
                // User is not allowed to add subscriber
                $this->data["errormsg"] = "You already have maximum number of subscriber that is allowed to you.<br/>To add more subscriber activate new plan";
            }
        } elseif ($type_of_op == "update") {
            $data["fname"] = $this->input->post("fname");
            $data["lname"] = $this->input->post("lname");
            $data["email"] = $this->input->post("email");

            $this->db->where("id", $id);
            $this->db->update("subscriber", $data);

            $this->db->select("group_id");
            $this->db->where("subscriber_id", $id);

            $a["group_id"] = $this->db->get("group_subscriber")->result();
            $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($a["group_id"]));

            $a = iterator_to_array($it, FALSE);
            $d["group_id"] = $this->input->post("group");

            $insert = array_diff($d["group_id"], $a);
            $delete = array_diff($a, $d["group_id"]);
            if ($insert != null) {
                $arr = array();
                $i = 0;
                foreach ($insert as $value) {
                    $arr[$i]["group_id"] = $value;
                    $arr[$i]["subscriber_id"] = $id;
                    $arr[$i]["AddingTime"] = date("Y-m-d H:i:s a");
                    $i++;
                }
                $this->db->insert_batch("group_subscriber", $arr);
            }
            if ($delete != null) {
                $this->db->where_in("group_id", $delete);
                $this->db->delete("group_subscriber");
            }
            redirect(base_url() . "index.php/user/subscriber");
        } elseif ($type_of_op == "getSubscriber") {
            $arr = json_decode(urldecode($id), true);
            if (count($arr) != 0) {
                $this->db->select("subscriber_id");
                $this->db->where_in("group_id", $arr);
                $all_subscriber_ids = $this->db->get("group_subscriber")->result();
                if (count($all_subscriber_ids) > 0) {
                    $temp = array();
                    for ($i = 0; $i < count($all_subscriber_ids); $i++) {
                        $temp[] = $all_subscriber_ids[$i]->subscriber_id;
                    }
                    $this->db->where_in("id", $temp);
                    echo json_encode($this->db->get("subscriber")->result());
                }
            }
            die();
        } elseif ($type_of_op == "get") {
            $this->db->where("id", $id);
            echo json_encode($this->db->get("subscriber")->row());
            die();
        } elseif ($type_of_op == "getGroup") {
            $this->db->where("subscriber_id", $id);
            $this->db->select("group_id");
            echo json_encode($this->db->get("group_subscriber")->result());
            die();
        } elseif ($type_of_op == "delete") {
            $this->db->where("id", $id);
            $this->db->delete("subscriber");
            redirect(base_url() . "index.php/user/subscriber");
        }
//        $this->data["page"] = "subscriberView";
        $this->data["page"] = "subscriberList";
        $this->db->where("user_id", $this->session->userdata("id"));
        $this->db->order_by("name");
        $this->data["result"] = json_encode($this->db->get("groups")->result());
        $this->db->where("user_id", $this->session->userdata("id"));
        $this->db->order_by("fname");
        $this->data["Subresult"] = json_encode($this->db->get("subscriber")->result());
        $this->load->view("user/index", $this->data);
    }

    public function campaign($type = "", $id = "") {
        if ($type == "simpleCreate") {
            $json_arr = json_decode($this->input->post("campaign"));
            $data = array();

            $uid = $this->session->userdata("id");

            // Checking for User Plan [Maximum Mail]

            $this->db->where("user_id", $uid);
            $this->db->order_by("activation_date", "desc");
            $row = $this->db->get("user_plan")->row();

            $this->db->where("id", $row->plan_id);
            $plan = $this->db->get("plan")->row();



            if ($plan->maximum_mail < ($row->email_sent + count($json_arr[5]))) {
                echo "0";
                return;
            }
            echo "1";
            // Insert in campaign table
            $data["name"] = $json_arr[0];
            $data["from_name"] = $json_arr[1];
            $data["from_email"] = $json_arr[2];
            $data["email_subject"] = $json_arr[3];
            $data["content"] = $json_arr[4];
            $data["type"] = "Plain Text";
            $data["creationDate"] = date("Y-m-d H:i:s a");
            $data["user_id"] = $uid;
            $this->db->insert("campaign", $data);

            $campaign_id = $this->db->insert_id();

            // Insert into TrackReport
            $wordArr = $this->db->get("trackword")->result();
            foreach ($wordArr as $wordObj) {
                if (strpos($json_arr[4], $wordObj->word) != false) { // find the word is available in content
                    // Insert that word id and campaign id into databse
                    $data = array();
                    $data["word_id"] = $wordObj->id;
                    $data["campaign_id"] = $campaign_id;
                    $this->db->insert("trackreport", $data);
                }
            }

            // Sending Email To Multiple user according to parameter
            $cnt = 0;
            if (count($json_arr[5]) != 0) {
                for ($i = 0; $i < count($json_arr[5]); $i++) {
                    // Fetching Subscriber Information
                    $this->db->where("id", $json_arr[5][$i]);
                    $record = $this->db->get("subscriber")->row();

                    $to = $record->email;
                    $subject = $json_arr[3];
                    $msg = $json_arr[4];

                    //Replace Content of Email
                    $msg = str_replace('*|FName|*', $record->fname, $msg);
                    $msg = str_replace('*|LName|*', $record->lname, $msg);
                    $msg = str_replace('*|Email|*', $to, $msg);
                    $msg .= "<a href='" . base_url() . "'><img src='" . base_url() . "index.php/test/checkopen/" . $campaign_id . "/" . $json_arr[5][$i] . "/" . $this->data["userid"] . "'></a>";

                    $headers = "From: " . $json_arr[2] . "\r\n";
                    $headers .= "Reply-To: " . $json_arr[2] . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    // Sending Mail To User
                    $result = @mail($to, $subject, $msg, $headers);

                    // Insert in Campaign-Subscriber

                    $data = array();
                    $data["subscriber_id"] = $json_arr[5][$i];
                    $data["delivered"] = $result;
                    $data["opened"] = FALSE;
                    $data["campaign_id"] = $campaign_id;

                    if ($result) {
                        $cnt++;
                    }
                    $this->db->insert("campaign_subscriber", $data);
                }
                $this->db->where("id", $row->id);
                $up["email_sent"] = $row->email_sent + $cnt;
                $this->db->update("user_plan", $up);
            }

            die();
        }
        if ($type == "htmlmail") {
            $json_arr = json_decode($this->input->post("campaign"));

            $uid = $this->session->userdata("id");

            // Checking for User Plan [Maximum Mail]

            $this->db->where("user_id", $uid);
            $this->db->order_by("activation_date", "desc");
            $row = $this->db->get("user_plan")->row();

            $this->db->where("id", $row->plan_id);
            $plan = $this->db->get("plan")->row();

            if ($plan->maximum_mail < ($row->email_sent + count($json_arr[5]))) {
                // swal("Your campaign can not sent. Plan limit has been exceed");
                echo "0";
                return;
            }
            echo "1";
            $data = array();
            $data["name"] = $json_arr[0];
            $data["model"] = $json_arr[6];
            $data["creationTime"] = date("Y-m-d H:i:s a");
            $data["user_id"] = $this->session->userdata("id");
            $this->db->insert("template", $data);

            $data = array();
            $data["name"] = $json_arr[0];
            $data["from_name"] = $json_arr[1];
            $data["from_email"] = $json_arr[2];
            $data["email_subject"] = $json_arr[3];
            $data["content"] = $json_arr[4];
            $data["type"] = "HTML Email";
            $data["creationDate"] = date("Y-m-d H:i:s a");
            $data["user_id"] = $this->session->userdata("id");
            $data["template_id"] = $this->db->insert_id();
            $this->db->insert("campaign", $data);

            $campaign_id = $this->db->insert_id();

            // if (count($json_arr[5]) != 0) {
            // $data = array();
            // for ($i = 0; $i < count($json_arr[5]); $i++) {
            // $data[$i]["subscriber_id"] = $json_arr[5][$i];
            // $data[$i]["delivered"] = FALSE;
            // $data[$i]["opened"] = FALSE;
            // $data[$i]["campaign_id"] = $campaign_id;
            // }
            // $this->db->insert_batch("campaign_subscriber", $data);
            // }
            // Insert into TrackReport
            $wordArr = $this->db->get("trackword")->result();
            foreach ($wordArr as $wordObj) {
                if (strpos($json_arr[4], $wordObj->word) != false) { // find the word is available in content
                    // Insert that word id and campaign id into databse
                    $data = array();
                    $data["word_id"] = $wordObj->id;
                    $data["campaign_id"] = $campaign_id;
                    $this->db->insert("trackreport", $data);
                }
            }

            // Sending Email To Multiple user according to parameter
            $cnt = 0;
            if (count($json_arr[5]) != 0) {
                for ($i = 0; $i < count($json_arr[5]); $i++) {
                    // Fetching Subscriber Information
                    $this->db->where("id", $json_arr[5][$i]);
                    $record = $this->db->get("subscriber")->row();

                    $to = $record->email;
                    $subject = $json_arr[3];
                    $msg = $json_arr[4];



                    //Replace Content of Email
                    $msg = str_replace('*|FName|*', $record->fname, $msg);
                    $msg = str_replace('*|LName|*', $record->lname, $msg);
                    $msg = str_replace('*|Email|*', $to, $msg);
                    $msg .= "<a href='" . base_url() . "'><img src='" . base_url() . "index.php/test/checkopen/" . $campaign_id . "/" . $json_arr[5][$i] . "/" . $this->data["userid"] . "'></a>";
                    $headers = "From: " . $json_arr[2] . "\r\n";
                    $headers .= "Reply-To: " . $json_arr[2] . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    // Sending Mail To User
                    $result = mail($to, $subject, $msg, $headers);

                    $data = array();
                    $data["subscriber_id"] = $json_arr[5][$i];
                    $data["delivered"] = $result;
                    $data["opened"] = FALSE;
                    $data["campaign_id"] = $campaign_id;

                    if ($result) {
                        $cnt++;
                    }
                    $this->db->insert("campaign_subscriber", $data);
                }
                $this->db->where("id", $row->id);
                $up["email_sent"] = $row->email_sent + count($json_arr[5]);
                $this->db->update("user_plan", $up);
            }

            die();
        } else if ($type == 'getContent') {
            $this->db->where("id", $id);
            $row = $this->db->get("campaign")->row();
            if ($row->type == "HTML Email") {
                echo "<center>";
                echo $row->content;
                echo "</center>";
            } else {
                echo $row->content;
            }
            die();
        } else if ($type == 'getSubscriber') {
            $content = "";
            $result = $this->db->query("select s.fname,s.lname,s.email,cs.delivered,cs.opened,cs.OpenInCountry from subscriber s,campaign_subscriber cs where cs.subscriber_id = s.id and cs.campaign_id=$id")->result();

            $content .= "<table class='table table-bordered table-striped'>";
            $content .= "<tr>";
            $content .= "<th>Subscriber Name</th>";
            $content .= "<th>Email</th>";
            $content .= "<th>Delivered</th>";
            $content .= "<th>Opened</th>";
            $content .= "<th>Open In Country</th>";
            $content .= "</tr>";
            foreach ($result as $obj) {
                $content .= "<tr>";
                $content .= "<td>$obj->fname $obj->lname</td>";
                $content .= "<td>$obj->email</td>";
                $content .= "<td>";
                $content .= ($obj->delivered == 0) ? "No" : "YES";
                $content .= "</td>";
                $content .= "<td>";
                $content .= ($obj->opened == 0) ? "No" : "YES";
                $content .= "</td>";
                $content .= "<td>";
                $content .= ($obj->OpenInCountry == null) ? "Not Found" : $obj->OpenInCountry;
                $content .= "</td>";
                $content .= "</tr>";
            }
            $content .= "</table>";
            echo $content;
            die();
        }
        if ($type == "delete") {
            $this->data["page"] = "campaignView";
            $this->db->where("id", $id);
            $this->db->delete("campaign");
        }

        $this->data["page"] = "campaignView";
        //$this->db->where("type", "HTML Email");
        $this->db->where("user_id", $this->session->userdata("id"));
        $this->db->order_by("creationDate", "desc");
        $this->data["result"] = json_encode($this->db->get("campaign")->result());
        $this->load->view("user/index", $this->data);
    }

    public function manageTemplate($type = "", $id = "") {
        if ($type == "plain") {
            $this->data["page"] = "simpleCampaignView";

            // Display group based on user id
            $this->db->where("user_id", $this->session->userdata("id"));
            $this->data["result"] = json_encode($this->db->get("groups")->result());
        } else if ($type == "saveTemplate") {
            $this->data["type"] = "saveTemplate";
            if ($id == "1") {

                $this->data["id"] = $id;
                $this->data["page"] = "saveTemplate";
            } else if ($id == "12") {
                $this->data["id"] = $id;
                $this->data["page"] = "saveTemplate";
            } else if ($id == "121") {
                $this->data["id"] = $id;
                $this->data["page"] = "saveTemplate";
            } else if ($id == "13") {
                $this->data["id"] = $id;
                $this->data["page"] = "saveTemplate";
            } else if ($id == "131") {
                $this->data["id"] = $id;
                $this->data["page"] = "saveTemplate";
            } else if ($id == "132") {
                $this->data["id"] = $id;
                $this->data["page"] = "saveTemplate";
            } else {
                $this->data["page"] = "selectTamplate";
                $this->db->select("id,name,creationTime");
                $this->db->where("user_id", $this->session->userdata('id'));
                $this->db->where("type", "save");
                $this->data["result"] = json_encode($this->db->get("template")->result());
                $this->data["clone"] = "true";
            }
        } else {
            $this->data["type"] = "sendTemplate";
            if ($id == "1") {
                $this->data["page"] = "templat";
                // Display group based on user id
                $this->db->where("user_id", $this->session->userdata("id"));
                $this->data["result"] = json_encode($this->db->get("groups")->result());
            } else if ($id == "12") {

                $this->data["page"] = "templat_1_2";
                // Display group based on user id
                $this->db->where("user_id", $this->session->userdata("id"));
                $this->data["result"] = json_encode($this->db->get("groups")->result());
            } else if ($id == "121") {
                $this->data["page"] = "templat_1_2_1";
                // Display group based on user id
                $this->db->where("user_id", $this->session->userdata("id"));
                $this->data["result"] = json_encode($this->db->get("groups")->result());
            } else if ($id == "13") {
                $this->data["page"] = "templat_1_3";
                // Display group based on user id
                $this->db->where("user_id", $this->session->userdata("id"));
                $this->data["result"] = json_encode($this->db->get("groups")->result());
            } else if ($id == "131") {
                $this->data["page"] = "templat_1_3_1";
                // Display group based on user id
                $this->db->where("user_id", $this->session->userdata("id"));
                $this->data["result"] = json_encode($this->db->get("groups")->result());
            } else if ($id == "132") {
                $this->data["page"] = "templat_1_3_2";
                // Display group based on user id
                $this->db->where("user_id", $this->session->userdata("id"));
                $this->data["result"] = json_encode($this->db->get("groups")->result());
            } else {
                $this->data["page"] = "selectTamplate";
                $this->db->select("id,name,creationTime");
                $this->db->where("user_id", $this->session->userdata('id'));
                $this->db->where("type", "save");
                $this->data["result"] = json_encode($this->db->get("template")->result());
                $this->data["clone"] = "false";
            }
        }


        $this->load->view("user/EmailTemplate/index", $this->data);
    }

    public function editTemplate($id = "") {
        $this->data["page"] = "templatEdit";

        $this->db->where("user_id", $this->session->userdata("id"));
        $this->data["result"] = json_encode($this->db->get("groups")->result());

        $this->db->where("id", $id);
        $sql = "SELECT c.id,c.name,c.from_name,c.from_email,c.template_id,t.model,c.email_subject FROM campaign as c,template as t where c.id = $id and c.template_id = t.id";
        $res = $this->db->query($sql)->row();
        $this->data["datamodel"] = $res->model;
        $this->data["editres"] = json_encode($res);
        $this->load->view("user/EmailTemplate/index", $this->data);
    }

    public function UploadImage() {

        $target_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/img/";
        $thumb_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/thumbnil/";
        $name = "img_" . rand(0, 10000);
        $target_file = $target_dir . $name;
        $thumb_file = $thumb_dir . $name;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $_FILES["file"]["tmp_name"];
        $config['new_image'] = 'template/BasicTemplate/' . $this->session->userdata('id') . '/img/' . $name . '.jpg';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 550;
        $config['height'] = 550;
        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo "fail";
        } else {
            $config1['image_library'] = 'gd2';
            $config1['source_image'] = 'template/BasicTemplate/' . $this->session->userdata('id') . '/img/' . $name . '.jpg';
            $config1['new_image'] = 'template/BasicTemplate/' . $this->session->userdata('id') . '/thumbnil/' . $name . '.jpg';
            $config1['maintain_ratio'] = TRUE;
            $config1['width'] = 200;
            $config1['height'] = 150;
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();
            echo "success";
        }
    }

    public function thubimage() {
//        $target_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/img/";
        $thumb_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/thumbnil/";

        $this->load->helper('directory');
        $map = directory_map($thumb_dir, 1);
        echo json_encode($map);
        die();
    }

    public function ProfileImage($id = "") {
        $target_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/";
        $target_file = $target_dir . 'ProfileImage.jpg';

        $config['image_library'] = 'gd2';
        $config['source_image'] = $_FILES["file"]["tmp_name"];
        $config['new_image'] = $target_file;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 100;
        $config['height'] = 100;

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        } else {
            echo 'success';
        }
        die();
    }

    public function changePassword($param = "") {
        if ($param == "change") {
            $old = $this->input->post("oldpass");
            $pass = $this->input->post("newpass");

            if ($this->session->userdata("password") != $old) {
                echo "0";
            } else {
                $data["password"] = $pass;
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("password", $pass);
                echo "1";
            }
            die();
        } elseif ($param == "changeFname") {
            if ($this->input->post("value") == $this->session->userdata("fname")) {
                echo "0";
            } else {
                $data["fname"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("fname", $this->input->post("value"));
            }
            die();
        } elseif ($param == "changeLname") {
            if ($this->input->post("value") == $this->session->userdata("lname")) {
                echo "0";
            } else {
                $data["lname"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("lname", $this->input->post("value"));
            }
            die();
        } elseif ($param == "changeWorkforce") {
            if ($this->input->post("value") == $this->session->userdata("workforce")) {
                echo "0";
            } else {
                $data["workforce"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("workforce", $this->input->post("value"));
            }
            die();
        } elseif ($param == "changeOrgName") {
            if ($this->input->post("value") == $this->session->userdata("name_organization")) {
                echo "0";
            } else {
                $data["name_organization"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("name_organization", $this->input->post("value"));
            }
            die();
        } elseif ($param == "changeOrgAge") {
            if ($this->input->post("value") == $this->session->userdata("age_Organization")) {
                echo "0";
            } else {
                $data["age_Organization"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("age_Organization", $this->input->post("value"));
            }
            die();
        } elseif ($param == "changeWebsite") {
            if ($this->input->post("value") == $this->session->userdata("website")) {
                echo "0";
            } else {
                $data["website"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("website", $this->input->post("value"));
            }
            die();
        } elseif ($param == "changeAddress") {
            if ($this->input->post("value") == $this->session->userdata("address")) {
                echo "0";
            } else {
                $data["address"] = $this->input->post("value");
                $this->db->where("id", $this->session->userdata("id"));
                $this->db->update("users", $data);

                $this->session->set_userdata("address", $this->input->post("value"));
            }
            die();
        }

        $this->data["fname"] = $this->session->userdata("fname");
        $this->data["lname"] = $this->session->userdata("lname");
        $this->data["email"] = $this->session->userdata("email");
        $this->data["workforce"] = $this->session->userdata("workforce");
        $this->data["name_organization"] = $this->session->userdata("name_organization");
        $this->data["website"] = $this->session->userdata("website");
        $this->data["age_Organization"] = $this->session->userdata("age_Organization");
        $this->data["address"] = $this->session->userdata("address");
        $this->data["type_organization"] = $this->session->userdata("type_organization");
        $this->data["profile"] = $this->session->userdata("profile");
        $this->data["city"] = $this->session->userdata("city_id");
        $this->data["page"] = "changePassword";
        $this->load->view("user/index", $this->data);
    }

    public function UserPlan($param1 = "", $pid = "") {
        $id = $this->session->userdata("id");
        if ($param1 == "NewPlan") {
            $cnt = $this->db->query("select count(id) as count from subscriber where user_id=$id")->row()->count;
            $pid = $this->db->get("plan")->row()->id;

            $this->data["page"] = "NewPlan";
            $this->db->where("maximum_subscriber >", "$cnt");
            $this->db->where("id !=", $pid);
            $this->data["result"] = json_encode($this->db->get("plan")->result());
            $this->load->view("user/index", $this->data);
            return;
        }
        if ($param1 == "activateNew") {
            $data["user_id"] = $id;
            $data["plan_id"] = $pid;
            $data["activation_date"] = date("Y-m-d h:i:s a");
            $this->db->insert("user_plan", $data);
            redirect(base_url() . 'index.php/user/UserPlan/');
        }
        $this->data["page"] = "UserPlan";

        $this->data["result"] = json_encode($this->db->query("select up.id,plan.name,plan.maximum_subscriber,plan.maximum_mail,plan.duration,up.activation_date,up.email_sent from plan, user_plan up where plan.id = up.plan_id and up.user_id = $id order by up.activation_date desc")->result());
        $this->load->view("user/index", $this->data);
        return;
    }

    public function manageFile($type_of_op = "", $id = "") {
        if ($type_of_op == "del") {
            $data = json_decode(file_get_contents('php://input'));
            unlink($data->img);
            unlink($data->thumb);
            $thumb_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/thumbnil/";

            $this->load->helper('directory');
            $map = directory_map($thumb_dir, 1);
            echo json_encode($map);
        }

        if ($type_of_op == "edit") {
            $data = json_decode(file_get_contents('php://input'));
            rename($data->thumbold, $data->thumbnew);
            rename($data->imgold, $data->imgnew);
            $thumb_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/thumbnil/";

            $this->load->helper('directory');
            $map = directory_map($thumb_dir, 1);
            echo json_encode($map);
        }
        die();
    }

    public function UploadExcelFile() {
        $dest = "template/BasicTemplate/" . $this->session->userdata("id") . "/subscriberList.xlsx";
        move_uploaded_file($_FILES["file"]["tmp_name"], $dest);

        $this->load->library("Classes/PHPExcel");
        try {
            $ob = PHPExcel_IOFactory::load("template/BasicTemplate/" . $this->session->userdata("id") . "/subscriberList.xlsx");
            $alldata = $ob->getActiveSheet()->toArray(null, true, true, true);
            $arr = $ob->getActiveSheet()->toArray(null, true, true, true);
            $dropdown = "<select class='form-control'>";
            $dropdown .= "<option value='0'>Select Field</option>";
            $dropdown .= "<option value='fname'>First Name</option>";
            $dropdown .= "<option value='lname'>Last Name</option>";
            $dropdown .= "<option value='email'>Email</option>";
            $dropdown .= "</select>";

            $displayArr = array();

            $content = "<div class='row col-sm-12'>";
            $column = count($alldata[1]);
            $alldata = array_values($alldata[1]);
            for ($i = 0; $i < $column; ++$i) {
                $content .= "<div class='row'>";
                $content .= "<div class='col-sm-6'>";
                $content .= "<select class='sel form-control' sel='" . $i . "'>";
                $content .= "<option value='0'>Select Field</option>";
                $content .= "<option value='fname'>First Name</option>";
                $content .= "<option value='lname'>Last Name</option>";
                $content .= "<option value='email'>Email</option>";
                $content .= "</select>";
                $content .= "</div>";
                $content .= "<div class='col-sm-6'>";
                $content .= "$alldata[$i]";
                $content .= "</div>";
                $content .= "</div>";
            }

            $content .= "</div>";
            $displayArr[0] = $content;
            // echo $content;
            // var_dump($arr);
            $tbl = "<table class='table table-striped'>";
            $tbl .="<th>Select</th>";
            for ($i = 0; $i < $column; ++$i) {
                $tbl .="<th>$alldata[$i]</th>";
            }
            for ($i = 2; $i <= count($arr); $i++) {
                $ar = array_values($arr[$i]);
                $tbl .="<tr>";
                $tbl .="<td><div class='checkbox-primary' ><input type='checkbox' value='" . $i . "' name='sub[]' checked /></div></td>";
                for ($j = 0; $j < count($ar); $j++) {
                    $tbl .="<td>$ar[$j]</td>";
                }
                $tbl .="</tr>";
            }
            $tbl .="</table>";
            $displayArr[1] = $tbl;
            echo json_encode($displayArr);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }

        // print_r($_FILES);
    }

    public function ImportexcelFile() {

        $this->load->library("Classes/PHPExcel");
        try {
            $ob = PHPExcel_IOFactory::load("template/BasicTemplate/" . $this->session->userdata("id") . "/subscriberList.xlsx");
            $alldata = $ob->getActiveSheet()->toArray(null, true, true, true);

            $Jsondata = json_decode($_POST["data"]);
            $uid = $this->session->userdata("id");

            // Checked whether user is allowed to add more subscriber
            $cnt = $this->db->query("select count(id) as count from subscriber where user_id=$uid")->row()->count;
            $this->db->where("user_id", $uid);
            $this->db->order_by("activation_date", "desc");
            $pid = $this->db->get("user_plan")->row()->plan_id;
            $this->db->where("id", $pid);
            $allowed_subscriber = $this->db->get("plan")->row()->maximum_subscriber;

            if ($allowed_subscriber < ($cnt + count($Jsondata[3]))) {
                echo "0";
                return;
            }
            echo "1";
            for ($i = 0; $i < count($Jsondata[3]); ++$i) 
            {
                $data = array();
                $alldata[$Jsondata[3][$i]] = array_values($alldata[$Jsondata[3][$i]]);
                $data["fname"] = $alldata[$Jsondata[3][$i]][$Jsondata[0]];
                if ($Jsondata[1] != "")
                    $data["lname"] = $alldata[$Jsondata[3][$i]][$Jsondata[1]];
                else
                    $data["lname"] = "";
                $data["email"] = $alldata[$Jsondata[3][$i]][$Jsondata[2]];
                $data["RegistrationTime"] = date("Y-m-d H:i:s a");
                $data["user_id"] = $uid;

                $this->db->insert("subscriber", $data);
                $sid = $this->db->insert_id();

                if (count($Jsondata[4]) > 0) {
                    for ($j = 0; $j < count($Jsondata[4]); ++$j) {
                        $data = array();
                        $data["group_id"] = $Jsondata[4][$j];
                        $data["subscriber_id"] = $sid;
                        $data["AddingTime"] = date("Y-m-d H:i:s a");

                        $this->db->insert("group_subscriber", $data);
                    }
                }
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function saveTemplate($type = "", $arg = "") {
        $id = $this->session->userdata("id");
        if ($type == "view") {
            $this->data["page"] = "saveTemplateList";
            $this->db->select("id,name,creationTime");
            $this->db->where("user_id", $id);
            $this->db->where("type", "save");
            $this->data["result"] = json_encode($this->db->get("template")->result());
            $this->load->view("user/EmailTemplate/index", $this->data);
        } elseif ($type == "scrensort") {

            //Get the base-64 string from data
            if (isset($_POST['img_val'])) {
                $filteredData = substr($_POST['img_val'], strpos($_POST['img_val'], ",") + 1);
                //Decode the string
                $unencodedData = base64_decode($filteredData);
                //Save the image
                file_put_contents('template/BasicTemplate/' . $id . '/saveTemplate/' . $_POST['imgname'] . '.png', $unencodedData);

                $config['image_library'] = 'gd2';
                $config['source_image'] = 'template/BasicTemplate/' . $id . '/saveTemplate/' . $_POST['imgname'] . '.png';
                $config['new_image'] = 'template/BasicTemplate/' . $id . '/saveTemplate/' . $_POST['imgname'] . '.png';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['thumb_marker'] = '';
                $config['width'] = 100;
                $config['height'] = 100;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            }
            $this->data["page"] = "saveTemplateList";
            $this->db->select("id,name,creationTime");
            $this->db->where("user_id", $id);
            $this->db->where("type", "save");
            $this->data["result"] = json_encode($this->db->get("template")->result());
            $this->load->view("user/EmailTemplate/index", $this->data);
        } elseif ($type == "edit") {
            $this->data["page"] = "editSaveTemplate";
            $this->db->where("id", $arg);
            $this->data["result"] = $this->db->get("template")->row();
//            print_r($this->data);
            $this->load->view("user/EmailTemplate/index", $this->data);
        } elseif ($type == "editTemplate") {
            $d = json_decode(file_get_contents('php://input'));
            $data = array();
            $this->db->where("id", $d->id);
            $data["name"] = $d->tmpname;
            $data["model"] = $d->model;
            $data["creationTime"] = date("Y-m-d H:i:s a");
            $this->db->update("template", $data);
            echo $d->id;
            die();
        } else if ($type == "create") {
            $d = json_decode(file_get_contents('php://input'));
            $data = array();
            $data["name"] = $d->tmpname;
            $data["model"] = $d->model;
            $data["creationTime"] = date("Y-m-d H:i:s a");
            $data["type"] = "save";
            $data["user_id"] = $this->session->userdata("id");
            $this->db->insert("template", $data);
            $imgname = $this->db->insert_id();
            echo $imgname;
            die();
        } elseif ($type == "sendSavedTemplate") {
            $this->data["page"] = "templatEdit";
            $this->db->where("user_id", $this->session->userdata("id"));
            $this->data["result"] = json_encode($this->db->get("groups")->result());
            $this->db->where("id", $arg);
            $this->data["res"] = $this->db->get("template")->row();
            $this->data["datamodel"] = $this->data['res']->model;
            $this->data["editres"] = json_encode($this->data['res']->model);
//            print_r($this->data);
//            die();
            $this->load->view("user/EmailTemplate/index", $this->data);
        } elseif ($type == "cloneSavedTemplate") {
            $this->data["page"] = "cloneSaveTemplate";
            $this->db->where("id", $arg);
            $this->data["res"] = $this->db->get("template")->row();
            $this->data["datamodel"] = $this->data['res']->model;
            $this->load->view("user/EmailTemplate/index", $this->data);
        }
    }

    //Export Subscriber data
    public function exportSubscriber() {
        try {
            $this->db->where("user_id", $this->session->userdata('id'));
            $query = $this->db->get("subscriber");

            // Starting the PHPExcel library
            $this->load->library('Classes/PHPExcel');

            $objPHPExcel = new PHPExcel();
            PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
            $objPHPExcel->getProperties()->setTitle("Subscriber")->setDescription("Subscriber List From Email Marketing");

            $objPHPExcel->setActiveSheetIndex(0);

            // Field names in the first row
            $fields = array("Sr. No.", "First Name", "Last Name", "Email");
            $col = 0;
            foreach ($fields as $field) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
                $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(TRUE);
                $col++;
            }

            // Fetching the table data
            $row = 2;
            $srno = 1;
            foreach ($query->result() as $data) {
                $col = 0;
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $srno++);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $data->fname);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $data->lname);
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row++, $data->email);
            }

            $objPHPExcel->setActiveSheetIndex(0);

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

            // Sending headers to force the user to download the file
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Subscriber_' . date('dMy') . '.xls"');
            header('Cache-Control: max-age=0');

            $objWriter->save('php://output');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function FooterImage() {
        $target_dir = "template/BasicTemplate/" . $this->session->userdata("id") . "/";
        $target_file = $target_dir . 'emailMarketing.jpeg';
        $config['image_library'] = 'gd2';
        $config['source_image'] = $_FILES["file"]["tmp_name"];
        $config['new_image'] = $target_file;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        // $config['width'] = 50;
        // $config['height'] = 50;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        echo base_url() . $target_file . "?" . rand(10000, 1000000000);
        die();
    }

}

?>