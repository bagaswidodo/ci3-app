<?php

class Auth {
    
    private $id;
    
    public function __construct() {
        $this->core =& get_instance();
        $this->core->load->library('session');
    }

    public function authenticate(CI_DB_result $query) {
        $data = $query->row();
        $this->core->session->set_userdata(array(
            'id' => $data->id,
            'logged_in' => TRUE
        ));
    }
    
    public function is_guest() {
        if($this->core->session->userdata('logged_in') == TRUE) {
            return FALSE;
        }
        return TRUE;
    }
    
    public function get_id() {
        return $this->core->session->userdata('id');
    }
    
    public function logout() {
        $this->core->session->sess_destroy();
    }

}