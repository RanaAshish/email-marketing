<?php

class Admin extends CI_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("Adminemail") == NULL) {
            redirect(base_url() . "index.php/login/adminLogin");
        } else {
            $this->data["email"] = $this->session->userdata("Adminemail");
            $this->data["name"] = $this->session->userdata("AdminName");
        }
    }

    public function index() {
        $this->data["page"] = "dashboard";
       // $this->data["result"] = json_encode($this->db->get("plan")->result());
//print_r($this->data["result"]);
        $this->data["totEmail"] = $this->db->query("select count(id) as cnt from campaign_subscriber")->row()->cnt;
        $this->data["totCampaign"] = $this->db->query("select count(id) as cnt from campaign")->row()->cnt;
        $this->data["totGroup"] = $this->db->query("select count(id) as cnt from groups")->row()->cnt;
        $this->data["totSub"] = $this->db->query("select count(id) as cnt from subscriber")->row()->cnt;
        $this->data["totUser"] = $this->db->query("select count(id) as cnt from users")->row()->cnt;
        $this->data["totTrackCampaign"] = $this->db->query("select count(distinct(campaign_id)) as cnt from trackreport")->row()->cnt;
        $this->load->view("admin/index", $this->data);
    }

    public function managePlan($type_of_op = "", $id = "") {
        if ($type_of_op == "create") {
            $this->data["page"] = "plan";
            $data["name"] = $this->input->post("txtname");
            $data["maximum_subscriber"] = $this->input->post("txtsub");
            $data["maximum_mail"] = $this->input->post("txtemail");
            $data["duration"] = $this->input->post("txtduration") . " " . $this->input->post("dur");
            $data["price"] = $this->input->post("txtprice");
            $data["description"] = $this->input->post("txtdesc");
//print_r($data);
            $this->db->insert("plan", $data);
            redirect(base_url() . "index.php/admin/managePlan/");
        } else if ($type_of_op == "delete") {
            $this->db->where("id", $id);
            $this->db->delete("plan");
            redirect(base_url() . "index.php/admin/managePlan/");
        } else if ($type_of_op == "edit") {
            $this->db->where("id", $id);
            $this->data["res_edit"] = $this->db->get("plan")->row();
        } else if ($type_of_op == "update") {
            $data["name"] = $this->input->post("name");
            $data["maximum_subscriber"] = $this->input->post("sub");
            $data["maximum_mail"] = $this->input->post("email");
            $data["duration"] = $this->input->post("duration") . " " . $this->input->post("dura");
            $data["price"] = $this->input->post("price");
            $data["description"] = $this->input->post("des");
            $this->db->where("id", $id);
            $this->db->update("plan", $data);
            redirect(base_url() . "index.php/admin/managePlan/");
        }
        $this->data["page"] = "plan";
        $this->data["result"] = json_encode($this->db->get("plan")->result());
//print_r($this->data["result"]);

        $this->load->view("admin/index", $this->data);
    }

    //Manage State
    public function state($op_type = "", $id = "") {
        //Insert state
        if ($op_type == 'insert') {
            $d = $this->input->post('data');
            $d = explode(",", $d);
            $data['name'] = $d[0];
            $data['country_id'] = $d[1];
            $this->db->insert("state", $data);
            echo $this->db->insert_id();
            die();
        }
        // Update state
        else if ($op_type == 'update') {
            $d = $this->input->post('data');
            $d = explode(",", $d);
            $data['name'] = $d[0];
            $data['country_id'] = $d[1];
            $this->db->where("id", $id);
            $this->db->update('state', $data);
            die();
        }
        //Delete State
        else if ($op_type == 'delete') {
            $this->db->where("id", $id);
            $this->db->delete('state');
            die();
        }
        $this->data['countries'] = json_encode($this->db->get('country')->result());
        $this->data['page'] = "stateView";
        $this->data['records'] = json_encode($this->db->query('select s.id,c.name  as cname, s.name from state s , country c where s.country_id=c.id')->result());
        $this->load->view("admin/index", $this->data);
    }

    //Manage City
    public function city($op_type = "", $id = "") {
        //Insert City
        if ($op_type == 'insert') {
            $d = $this->input->post('data');
            $d = explode(",", $d);
            $data['name'] = $d[0];
            $data['state_id'] = $d[2];
            $this->db->insert("city", $data);
            echo $this->db->insert_id();
            die();
        }
        //Update City
        else if ($op_type == 'update') {
            $d = $this->input->post('data');
            $d = explode(",", $d);
            $data['name'] = $d[0];
            $data['state_id'] = $d[2];
            $this->db->where("id", $id);
            $this->db->update('city', $data);
            die();
        }
        //Delete City
        else if ($op_type == 'delete') {
            $this->db->where("id", $id);
            $this->db->delete('city');
            die();
        }
        //Get State from country_id
        else if ($op_type == 'state') {
            $str = "<option value='0'>select</option>";
            try {
                $result = $this->db->query("SELECT * FROM `state` WHERE country_id=$id")->result();
                foreach ($result as $res) {
                    $str .="<option value=$res->id>$res->name</option>";
                }
                echo $str;
            } catch (Exception $e) {
                echo $e;
            }
            die();
        }
        $this->data['countries'] = json_encode($this->db->get('country')->result());
        $this->data['states'] = json_encode($this->db->get('state')->result());
        $this->data['page'] = "cityView";
        $this->data['records'] = json_encode($this->db->query('select c.name as cname,s.name as sname ,ct.id, ct.name from country c,state s,city ct where ct.state_id=s.id and c.id=s.country_id ')->result());
        $this->load->view("admin/index", $this->data);
    }

    public function trackWord($op_type = "", $id = "") {
        if ($op_type == "Insert") {
// Insert Word
            $data["word"] = $this->input->post("word");
            $this->db->insert("trackword", $data);
            echo $this->db->insert_id();
            die();
        } else if ($op_type == "Delete") {
// Delete Word
            $this->db->where("id", $id);
            $this->db->delete("trackword");
            die();
        } else if ($op_type == "update") {
// update Word
            $data["word"] = $this->input->post("word");
            $this->db->where("id", $id);
            $this->db->update("trackword", $data);
            die();
        }
//Display all records
        $this->data["page"] = "TrackWord";
        $arr = array();
        foreach ($this->db->get("trackword")->result() as $row) {
            $arr[] = $row;
        }
        $this->data["records"] = json_encode($arr);
        $this->load->view("admin/index", $this->data);
    }

//manage country
    public function country($op_type = "", $id = "") {
        if ($op_type == "Insert") {
// Insert country
            $data["name"] = $this->input->post("name");
            $this->db->insert("country", $data);
            echo $this->db->insert_id();
            die();
        } else if ($op_type == "Delete") {
// Delete Country
            $this->db->where("id", $id);
            $this->db->delete("country");
            die();
        } else if ($op_type == "update") {
// update Country
            $data["name"] = $this->input->post("name");
            $this->db->where("id", $id);
            $this->db->update("country", $data);
            die();
        }
//Display all records
        $this->data["page"] = "ViewCountry";
        $arr = array();
        foreach ($this->db->get("country")->result() as $row) {
            $arr[] = $row;
        }
        $this->data["records"] = json_encode($arr);
        $this->load->view("admin/index", $this->data);
    }

    public function user($type_of_op = "", $id = "", $block = "") {
        if ($type_of_op == "block") {
            $this->db->where("id", $id);
            if ($block == 0) {
                $data["IsActivated"] = 1;
            } else {
                $data["IsActivated"] = 0;
            }
            $this->db->update("users", $data);
            echo json_encode($this->db->query("select u.*,(select count(s.id) from subscriber s where s.user_id=u.id) as cntSub,(select sum(email_sent) from user_plan where user_id=u.id) as cntEmail from users u")->result());
            die();
        } else if ($type_of_op == "view") {
            redirect(base_url() . "index.php/admin/user/");
        }
        else if($type_of_op == "getSingleUser")
        {
            $this->db->where("id", $id);
            echo json_encode($this->db->get("users")->row());
            die();
        }
        else if($type_of_op == 'plan')
        {
            $this->data["page"] = "UserPlan";

            $this->db->where("id",$id);
            $this->db->select("username");
            $this->data["uname"] = $this->db->get("users")->row()->username;

            $this->data["result"] = json_encode($this->db->query("select plan.name,plan.maximum_subscriber,plan.maximum_mail,plan.duration,up.activation_date,up.email_sent from plan, user_plan up where plan.id = up.plan_id and up.user_id = $id order by up.activation_date desc")->result());
            $this->load->view("admin/index", $this->data);
            return;
        }
        else if($type_of_op == 'group')
        {
            if($block == "getSubscriber")
            {
                $content = "";
                $result = $this->db->query("select s.fname,s.lname,s.email,gs.AddingTime from subscriber s,group_subscriber gs where gs.subscriber_id = s.id and gs.group_id=$id")->result();

                $content .= "<table class='table table-bordered table-striped'>";
                $content .= "<tr>";
                    $content .= "<th>First Name</th>";
                    $content .= "<th>Last Name</th>";
                    $content .= "<th>Email</th>";
                    $content .= "<th>Add In This Group at</th>";
                $content .= "</tr>";
                foreach ($result as $obj) {
                    $content .= "<tr>";
                        $content .= "<td>$obj->fname</td>";
                        $content .= "<td>$obj->lname</td>";
                        $content .= "<td>$obj->email</td>";
                        $content .= "<td>$obj->AddingTime</td>";
                    $content .= "</tr>";
                }
                $content .= "</table>";
                echo $content;
                die();
            }

            $this->data["page"] = "UserGroup";

            $this->db->where("id",$id);
            $this->db->select("username");
            $this->data["uname"] = $this->db->get("users")->row()->username;

            $this->data["result"] = json_encode($this->db->query("select g.*,(select count(gs.id) from group_subscriber gs where gs.group_id = g.id) as cntSub from groups g where g.user_id = $id order by g.name asc")->result());
            $this->load->view("admin/index", $this->data);
            return;
        }
        else if($type_of_op == 'subscriber')
        {
            if($block == "getGroups")
            {
                $content = "";
                $result = $this->db->query("select g.name,g.creationTime,gs.AddingTime from groups g,group_subscriber gs where gs.group_id = g.id and gs.subscriber_id=$id")->result();

                $content .= "<table class='table table-bordered table-striped'>";
                $content .= "<tr>";
                    $content .= "<th>Group Name</th>";
                    $content .= "<th>Creation Time</th>";
                    $content .= "<th>Subscriber Add at</th>";
                $content .= "</tr>";
                foreach ($result as $obj) {
                    $content .= "<tr>";
                        $content .= "<td>$obj->name</td>";
                        $content .= "<td>$obj->creationTime</td>";
                        $content .= "<td>$obj->AddingTime</td>";
                    $content .= "</tr>";
                }
                $content .= "</table>";
                echo $content;
                die();
            }
            $this->data["page"] = "UserSubscriber";

            $this->db->where("id",$id);
            $this->db->select("username");
            $this->data["uname"] = $this->db->get("users")->row()->username;
            $this->data["result"] = json_encode($this->db->query("select c.* from (select s.*,count(cs.id) as totMail from subscriber s left join campaign_subscriber cs on s.id = cs.subscriber_id group by s.id) as c where user_id=$id order by c.fname asc")->result());
			
            $this->load->view("admin/index", $this->data);
            return;  
        }
        // Display User wise campaign
        else if ($type_of_op == 'campaign') {

            $this->data["page"] = "UserCampaign";

            $this->db->where("id",$id);
            $this->db->select("username");
            $this->data["uname"] = $this->db->get("users")->row()->username;
            $this->data["result"] = json_encode($this->db->query("SELECT id,name,email_subject,from_name,from_email,creationDate,type FROM campaign where user_id = $id order by creationDate desc")->result());
            $this->load->view("admin/index", $this->data);
            return;
        }
         else {
            $this->data["page"] = "UserView";
            $this->data["result"] = json_encode($this->db->query("select u.*,(select count(s.id) from subscriber s where s.user_id=u.id) as cntSub,(select sum(email_sent) from user_plan where user_id=u.id) as cntEmail from users u")->result());
            $this->load->view("admin/index", $this->data);
        }
    }
	
    public function getCountry() {
        foreach ($this->db->get("country")->result() as $row) {
            echo "<option value='" . $row->id . "' name='" . $row->name . "'>" . $row->name . "</option>";
        }
        die();
    }

    public function getState($cid) {
        $this->db->where("country_id", $cid);
        foreach ($this->db->get("state")->result() as $row) {
            echo "<option value='" . $row->id . "' name='" . $row->name . "'>" . $row->name . "</option>";
        }
        die();
    }

    public function changePassword($param="")
    {
        if($param=="change")
        {
            $old = $this->input->post("oldpass");
            $pass = $this->input->post("newpass");

            $this->db->where("email",$this->session->userdata("AdminEmail"));
            $row = $this->db->get("admin")->row();

           if($row->password != $old)
            {
                echo "0";
            }
            else
            {
                $data["password"] = $pass;
                $this->db->where("email",$this->session->userdata("AdminEmail"));
                $this->db->update("admin",$data);
                echo "1";
            }
            die();
        }
        if($param=="changeFname")
        {
            $data["fname"] = $this->input->post("value");
            $this->db->where("email",$this->session->userdata("AdminEmail"));
            $this->db->update("admin",$data);
            
            $this->db->where("email",$this->session->userdata("AdminEmail"));
            $row = $this->db->get("admin")->row();
            $this->session->set_userdata("AdminName",$row->fname." ".$row->lname);
            
            echo $row->fname." ".$row->lname;
            die();
        }
        if($param=="changeLname")
        {
            $data["lname"] = $this->input->post("value");
            $this->db->where("email",$this->session->userdata("AdminEmail"));
            $this->db->update("admin",$data);

            $this->db->where("email",$this->session->userdata("AdminEmail"));
            $row = $this->db->get("admin")->row();
            $this->session->set_userdata("AdminName",$row->fname." ".$row->lname);

            echo $row->fname." ".$row->lname;
            die();
        }
        $this->db->where("email",$this->session->userdata("AdminEmail"));
        $row = $this->db->get("admin")->row();

        $this->data["fname"] = $row->fname;
        $this->data["lname"] = $row->lname;
        $this->data["email"] = $row->email;
        $this->data["name"] = $this->session->userdata("AdminName");
        $this->data["page"] = "changePassword";
        $this->load->view("admin/index",$this->data);
    }

    public function trackwordReport($param1="",$id="")
    {
        if($param1=="")
        {
            $result = $this->db->query("select DISTINCT campaign_id from trackreport")->result();
            if(count($result)!=0)
            {
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
                $campaignIds = iterator_to_array($it,FALSE);

                $result = $this->db->query("SELECT c.id,c.name,c.email_subject,c.from_name,c.from_email,u.username,c.creationDate FROM campaign c,users u where c.user_id=u.id and c.id in(".implode(",", $campaignIds).") order by c.creationDate desc")->result();
            }
            $this->data["result"] = json_encode($result);
            $this->data["page"] = "trackwordReport";
            $this->load->view("admin/index", $this->data);
        }
        else if($param1=='getContent')
        {
            $this->db->where("id",$id);
            $this->db->select("content");
            $content = $this->db->get("campaign")->row()->content;

            $result = $this->db->query("select word from trackword where id in(select word_id from trackreport where campaign_id=$id)")->result();
            // $result = $this->db->query("select word from trackword")->result();
            $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($result));
            foreach(iterator_to_array($it,false) as $word)
            {
                $content = str_replace($word, "<b><span style='background-color:yellow'>".$word."</span></b>", $content);
            }

            echo $content;
            die();
        }
    }

    public function campaign($param1="",$id="")
    {
        if($param1=='getContent')
        {
             $this->db->where("id",$id);
            $row = $this->db->get("campaign")->row();
            if($row->type == "HTML Email")
            {
                echo "<center>";
                echo $row->content;
                echo "</center>";
            }
            else
            {
                echo $row->content;
            }
            die();
        }
        else if($param1=='getSubscriber')
        {
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
                        $content .= ($obj->delivered==0)?"No":"YES";
                    $content .= "</td>";
                    $content .= "<td>";
                        $content .= ($obj->opened==0)?"No":"YES";
                    $content .= "</td>";
                    $content .= "<td>";
                        $content .= ($obj->OpenInCountry==null)?"Not Found":$obj->OpenInCountry;
                    $content .= "</td>";
                $content .= "</tr>";
            }
            $content .= "</table>";
            echo $content;
            die();
        }
    }
	
	public function feedback()
    {
    	$this->data["page"] = "feedback";
		$this->db->order_by("feedbackDate","desc");
        $this->data["result"] = json_encode($this->db->get("feedback")->result());
        $this->load->view("admin/index", $this->data);
    }
}
?>