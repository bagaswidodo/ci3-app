<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sinkron extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->database();
		$this->load->model('sinkron_model');
	}
	function index()
	{
		$data['kelas'] = $this->sinkron_model->nm_kelas();
        $this->load->view('sinkron/depan',$data);
	}
	function siswa()
	{
		$id = $this->input->post('id_kelas');
		$data['siswa'] = $this->sinkron_model->nm_siswa($id);
        $this->load->view('sinkron/siswa',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
