<?php

class admin_1 extends CI_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("Adminemail") == NULL) {
            redirect(base_url() . "index.php/login");
        } else {
            $this->data["email"] = $this->session->userdata("Adminemail");
        }
    }

    public function index() {
        $this->data["page"] = "plan";
        $this->data["result"] = json_encode($this->db->get("plan")->result());
//print_r($this->data["result"]);

        $this->load->view("adminOld/index", $this->data);
    }

    public function managePlan($type_of_op = "", $id = "") {
        if ($type_of_op == "create") {
            $this->data["page"] = "plan";
            $data["name"] = $this->input->post("txtname");
            $data["maximum_subscriber"] = $this->input->post("txtsub");
            $data["maximum_mail"] = $this->input->post("txtemail");
            $data["duration"] = $this->input->post("txtduration") . " " . $this->input->post("dur");
//print_r($data);
            $this->db->insert("plan", $data);
            redirect(base_url() . "index.php/adminOld/");
        } else if ($type_of_op == "delete") {
            $this->db->where("id", $id);
            $this->db->delete("plan");
            redirect(base_url() . "index.php/adminOld/");
        } else if ($type_of_op == "edit") {
            $this->db->where("id", $id);
            $this->data["res_edit"] = $this->db->get("plan")->row();
        } else if ($type_of_op == "update") {
            $data["name"] = $this->input->post("txtname");
            $data["maximum_subscriber"] = $this->input->post("txtsub");
            $data["maximum_mail"] = $this->input->post("txtemail");
            $data["duration"] = $this->input->post("txtduration") . " " . $this->input->post("dur");

            $this->db->where("id", $id);
            $this->db->update("plan", $data);
        }
        $this->data["page"] = "plan";
        $this->data["result"] = json_encode($this->db->get("plan")->result());
//print_r($this->data["result"]);

        $this->load->view("adminOld/index", $this->data);
    }

    //Manage State
    public function state($op_type = "", $id = "") {
        //Insert state
        if ($op_type == 'insert') {
            $data['name'] = $this->input->post('state');
            $data['country_id'] = $this->input->post('con');
            $this->db->insert("state", $data);
            redirect(base_url() . "index.php/adminOld/state");
        }
        // Update state
        else if ($op_type == 'update') {
            $data['name'] = $this->input->post('ustate');
            $data['country_id'] = $this->input->post('ucon');
            $this->db->where("id", $id);
            $this->db->update('state', $data);
            redirect(base_url() . "index.php/adminOld/state");
        }
        //Delete State
        else if ($op_type == 'delete') {
            $this->db->where("id", $id);
            $this->db->delete('state');
            redirect(base_url() . "index.php/adminOld/state");
        }
        $this->data['countries'] = json_encode($this->db->get('country')->result());
        $this->data['page'] = "stateView";
        $this->data['records'] = json_encode($this->db->query('select s.id,c.name  as cname, s.name from state s , country c where s.country_id=c.id')->result());
        $this->load->view("adminOld/index", $this->data);
    }

    //Manage City
    public function city($op_type = "", $id = "") {
        //Insert City
        if ($op_type == 'insert') {
            $data['name'] = $this->input->post('city');
            $data['state_id'] = $this->input->post('state');
            $this->db->insert("city", $data);
            redirect(base_url() . "index.php/adminOld/city");
        }
        //Update City
        else if ($op_type == 'update') {
            $data['name'] = $this->input->post('ucity');
            $data['state_id'] = $this->input->post('ustate');
            $this->db->where("id", $id);
            $this->db->update('city', $data);
            redirect(base_url() . "index.php/adminOld/city");
        }
        //Delete City
        else if ($op_type == 'delete') {
            $this->db->where("id", $id);
            $this->db->delete('city');
            redirect(base_url() . "index.php/adminOld/city");
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
            return;
        }
        $this->data['countries'] = json_encode($this->db->get('country')->result());
        $this->data['states'] = json_encode($this->db->get('state')->result());
        $this->data['page'] = "cityView";
        $this->data['records'] = json_encode($this->db->query('select c.name as cname,s.name as sname ,ct.id, ct.name from country c,state s,city ct where ct.state_id=s.id and c.id=s.country_id ')->result());
        $this->load->view("adminOld/index", $this->data);
    }

    public function trackWord($op_type = "", $id = "") {
        if ($op_type == "Insert") {
// Insert Word
            $data["word"] = $this->input->post("word");
            $this->db->insert("trackword", $data);
            redirect(base_url() . "index.php/adminOld/trackWord/");
        } else if ($op_type == "Delete") {
// Delete Word
            $this->db->where("id", $id);
            $this->db->delete("trackword");
            redirect(base_url() . "index.php/adminOld/trackWord/");
        } else if ($op_type == "update") {
// update Word
            $data["word"] = $this->input->post("word");
            $this->db->where("id", $id);
            $this->db->update("trackWord", $data);
            redirect(base_url() . "index.php/adminOld/trackWord/");
        }
//Display all records
        $this->data["page"] = "TrackWord";
        $arr = array();
        foreach ($this->db->get("trackword")->result() as $row) {
            $arr[] = $row;
        }
        $this->data["records"] = json_encode($arr);
        $this->load->view("adminOld/index", $this->data);
    }

//manage country
    public function country($op_type = "", $id = "") {
        if ($op_type == "Insert") {
// Insert country
            $data["name"] = $this->input->post("name");
            $this->db->insert("country", $data);
            redirect(base_url() . "index.php/adminOld/country/");
        } else if ($op_type == "Delete") {
// Delete Country
            $this->db->where("id", $id);
            $this->db->delete("country");
            redirect(base_url() . "index.php/adminOld/country/");
        } else if ($op_type == "update") {
// update Country
            $data["name"] = $this->input->post("Up_name");
            $this->db->where("id", $id);
            $this->db->update("country", $data);
            redirect(base_url() . "index.php/adminOld/country/");
        }
//Display all records
        $this->data["page"] = "ViewCountry";
        $arr = array();
        foreach ($this->db->get("country")->result() as $row) {
            $arr[] = $row;
        }
        $this->data["records"] = json_encode($arr);
        $this->load->view("adminOld/index", $this->data);
    }

    public function user($type_of_op = "", $id = "", $block = "") {
        if ($type_of_op == "block") {
            $this->db->where("id",$id);
            if ($block == 0) {
                $data["IsActivated"] = 1;
            } else {
                $data["IsActivated"] = 0;
            }
            $this->db->update("users", $data);
            echo json_encode($this->db->get("users")->result());
            return;
        } else if ($type_of_op == "view") {
            redirect(base_url() . "index.php/admin_1/user/");
        } else {
            $this->data["page"] = "UserView";
            $this->data["result"] = json_encode($this->db->get("users")->result());
            $this->load->view("adminOld/index", $this->data);
        }
    }

}

?>