<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Export_excel extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Excel_generator');
    }


    public function index() {
        $query = $this->db->get('users');
        $this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array('Username','Nama Depan','Nama Belakang','Alamat'));
        $this->excel_generator->set_column(array('username','first_name','last_name','address'));
        $this->excel_generator->set_width(array(25, 15, 30, 15));
        $this->excel_generator->exportTo2007('Laporan Users');
    }
}