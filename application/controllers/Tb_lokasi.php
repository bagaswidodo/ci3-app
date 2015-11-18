<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tb_lokasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tb_lokasi = $this->tb_lokasi_model->get_all();

        $data = array(
            'tb_lokasi_data' => $tb_lokasi
        );

        $this->load->view('tb_lokasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->tb_lokasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'lokasi' => $row->lokasi,
	    );
            $this->load->view('tb_lokasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_lokasi'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_lokasi/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'lokasi' => set_value('lokasi'),
	);
        $this->load->view('tb_lokasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
	    );

            $this->tb_lokasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_lokasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->tb_lokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_lokasi/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'lokasi' => set_value('lokasi', $row->lokasi),
	    );
            $this->load->view('tb_lokasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_lokasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
	    );

            $this->tb_lokasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_lokasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->tb_lokasi_model->get_by_id($id);

        if ($row) {
            $this->tb_lokasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_lokasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_lokasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', ' ', 'trim|required');
	$this->form_validation->set_rules('lokasi', ' ', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_lokasi.xls";
        $judul = "tb_lokasi";
        $tablehead = 2;
        $tablebody = 3;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        xlsWriteLabel(0, 0, $judul);

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "no");
	xlsWriteLabel($tablehead, $kolomhead++, "nama");
	xlsWriteLabel($tablehead, $kolomhead++, "lokasi");

	foreach ($this->tb_lokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

};

/* End of file Tb_lokasi.php */
/* Location: ./application/controllers/Tb_lokasi.php */