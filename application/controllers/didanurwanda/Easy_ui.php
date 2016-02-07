<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Easy_ui extends CI_Controller {
	
	 public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Auth');
        $this->load->database();
    }

	public function index()
	{
		$this->load->view('didanurwanda/easy_ui/index');
	}
    
    public function main()
    {
        $this->load->view('didanurwanda/easy_ui/main');
    }

	public function login()
	{
        $this->load->view('didanurwanda/easy_ui/login');
	}
	public function logout()
	{
        $this->auth->logout();
	}
    
    public function proses_login()
    {
        $this->output->set_content_type('application/json');
        if (isset($_POST))
        {
            $this->db->where('username', $this->input->post('username'));
            $this->db->where('password', md5($this->input->post('password')));
            $db = $this->db->get('tbl_user');

            if($db->num_rows() > 0) {
                $this->auth->authenticate($db);
                echo json_encode(array(
                    'success'=>true, 
                    'auth_id'=>$this->auth->get_id()
                ));
            } else {
                echo json_encode(array('success'=>false));
            }
        }
    }
}