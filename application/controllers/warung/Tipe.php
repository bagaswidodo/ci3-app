<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipe extends CI_Controller
{
    public $header;
    public $footer;

    function __construct()
    {
        parent::__construct();
        $this->load->model('warung/Warung_tipe_model', 'warung_tipe_model');

        $this->header = 'warung/backend/templates/head';
        $this->footer =  'warung/backend/templates/footer';
        $this->load->library('form_validation');
        if ( $this->session->userdata('logged_in')=="") {
          redirect('warung/auth/login');

        }
    }

    function json()
    {


      $q = $this->input->get('q');
      $tipe = $this->warung_tipe_model->cari($q);

      foreach ($tipe as $v) {
          $data[] = array('id' => $v->id, 'text' => $v->deskripsi);
      }

      echo json_encode($data);

      //print_r($data);
    }

    public function index()
    {
        $warung_tipe = $this->warung_tipe_model->get_all();

        $data = array(
            'warung_tipe_data' => $warung_tipe
        );

        $this->load->view($this->header);
        $this->load->view('warung/backend/warung_tipe_list', $data);
        $this->load->view($this->footer);

    }

    public function read($id)
    {
        $row = $this->warung_tipe_model->get_by_id($id);
        if ($row) {
            $data = array(
              		'id' => $row->id,
              		'deskripsi' => $row->deskripsi,
	                 );
            $this->load->view('warung_tipe_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung_tipe'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warung/tipe/create_action'),
      	    'id' => set_value('id'),
      	    'deskripsi' => set_value('deskripsi'),
	         );

        $this->load->view($this->header);
        $this->load->view('warung/backend/warung_tipe_form', $data);
        $this->load->view($this->footer);
    }

    public function create_action()
    {
        $this->_rules();


         if ($this->form_validation->run() == FALSE) {
             $this->create();
         } else {
             $data = array(
		               'deskripsi' => $this->input->post('deskripsi',TRUE),
	               );

            $this->warung_tipe_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warung/tipe'));
         }
    }

    public function update($id)
    {
        $row = $this->warung_tipe_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warung/tipe/update_action'),
		'id' => set_value('id', $row->id),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
	    );
            $this->load->view($this->header);
             $this->load->view('warung/backend/warung_tipe_form', $data);
             $this->load->view($this->footer);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung/tipe'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'deskripsi' => $this->input->post('deskripsi',TRUE),
	    );

            $this->warung_tipe_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warung/tipe'));
        }
    }

    public function delete($id)
    {
        $row = $this->warung_tipe_model->get_by_id($id);

        if ($row) {
            $this->warung_tipe_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warung/tipe'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung/tipe'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('deskripsi', ' ', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Warung_tipe.php */
/* Location: ./application/controllers/Warung_tipe.php */
