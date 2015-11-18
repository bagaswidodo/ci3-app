<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faskes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('faskes_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $faskes = $this->faskes_model->get_all();

        $data = array(
            'faskes_data' => $faskes
        );

        $this->load->view('tb_faskes_list', $data);
    }

    public function read($id) 
    {
        $row = $this->faskes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_faskes' => $row->id_faskes,
		'nama_faskes' => $row->nama_faskes,
		'id_tipe' => $row->id_tipe,
		'alamat' => $row->alamat,
		'no_telpon' => $row->no_telpon,
		'foto' => $row->foto,
		'location' => $row->location,
	    );
            $this->load->view('tb_faskes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faskes'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faskes/create_action'),
	    'id_faskes' => set_value('id_faskes'),
	    'nama_faskes' => set_value('nama_faskes'),
	    'id_tipe' => set_value('id_tipe'),
	    'alamat' => set_value('alamat'),
	    'no_telpon' => set_value('no_telpon'),
	    'foto' => set_value('foto'),
	    'location' => set_value('location'),
	);
        $this->load->view('tb_faskes_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_faskes' => $this->input->post('nama_faskes',TRUE),
		'id_tipe' => $this->input->post('id_tipe',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'location' => $this->input->post('location',TRUE),
	    );

            $this->faskes_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faskes'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->faskes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faskes/update_action'),
		'id_faskes' => set_value('id_faskes', $row->id_faskes),
		'nama_faskes' => set_value('nama_faskes', $row->nama_faskes),
		'id_tipe' => set_value('id_tipe', $row->id_tipe),
		'alamat' => set_value('alamat', $row->alamat),
		'no_telpon' => set_value('no_telpon', $row->no_telpon),
		'foto' => set_value('foto', $row->foto),
		'location' => set_value('location', $row->location),
	    );
            $this->load->view('tb_faskes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faskes'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_faskes', TRUE));
        } else {
            $data = array(
		'nama_faskes' => $this->input->post('nama_faskes',TRUE),
		'id_tipe' => $this->input->post('id_tipe',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'location' => $this->input->post('location',TRUE),
	    );

            $this->faskes_model->update($this->input->post('id_faskes', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faskes'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->faskes_model->get_by_id($id);

        if ($row) {
            $this->faskes_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faskes'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faskes'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_faskes', ' ', 'trim|required');
	$this->form_validation->set_rules('id_tipe', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('alamat', ' ', 'trim|required');
	$this->form_validation->set_rules('no_telpon', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('foto', ' ', 'trim|required');
	$this->form_validation->set_rules('location', ' ', 'trim|required');

	$this->form_validation->set_rules('id_faskes', 'id_faskes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_faskes.xls";
        $judul = "tb_faskes";
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
	xlsWriteLabel($tablehead, $kolomhead++, "nama_faskes");
	xlsWriteLabel($tablehead, $kolomhead++, "id_tipe");
	xlsWriteLabel($tablehead, $kolomhead++, "alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "no_telpon");
	xlsWriteLabel($tablehead, $kolomhead++, "foto");
	xlsWriteLabel($tablehead, $kolomhead++, "location");

	foreach ($this->faskes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_faskes);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tipe);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_telpon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->location);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

};

/* End of file Faskes.php */
/* Location: ./application/controllers/Faskes.php */