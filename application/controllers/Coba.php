<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('coba_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $coba = $this->coba_model->get_all();

        $data = array(
            'coba_data' => $coba
        );

        $this->load->view('coba_list', $data);
    }

    public function read($id) 
    {
        $row = $this->coba_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Kode_Barang' => $row->Kode_Barang,
		'Nama_Barang' => $row->Nama_Barang,
	    );
            $this->load->view('coba_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('coba/create_action'),
	    'Kode_Barang' => set_value('Kode_Barang'),
	    'Nama_Barang' => set_value('Nama_Barang'),
	);
        $this->load->view('coba_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Barang' => $this->input->post('Nama_Barang',TRUE),
	    );

            $this->coba_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('coba'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->coba_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('coba/update_action'),
		'Kode_Barang' => set_value('Kode_Barang', $row->Kode_Barang),
		'Nama_Barang' => set_value('Nama_Barang', $row->Nama_Barang),
	    );
            $this->load->view('coba_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Kode_Barang', TRUE));
        } else {
            $data = array(
		'Nama_Barang' => $this->input->post('Nama_Barang',TRUE),
	    );

            $this->coba_model->update($this->input->post('Kode_Barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('coba'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->coba_model->get_by_id($id);

        if ($row) {
            $this->coba_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('coba'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Barang', ' ', 'trim|required');

	$this->form_validation->set_rules('Kode_Barang', 'Kode_Barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Coba.php */
/* Location: ./application/controllers/Coba.php */