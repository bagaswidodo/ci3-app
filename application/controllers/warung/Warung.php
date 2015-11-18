<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warung extends CI_Controller
{
    public $id_user;
    public $header;
    public $footer;
    function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('logged_in')=="") {
          redirect('warung/auth/login');

        }
        $this->header =  'warung/backend/templates/head';
        $this->footer =   'warung/backend/templates/footer';

        $this->id_user = $this->session->userdata('uid');
        $this->load->model('warung/warung_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
      $warung = $this->warung_model->get_all();

      $data = array(
          'warung_data' => $warung
      );


      $this->load->view($this->header);
      $this->load->view('warung/backend/warung_list', $data);
      $this->load->view($this->footer);


    }

    public function read($id)
    {
        $row = $this->warung_model->get_by_id($id);
        if ($row) {
            $data = array(
              		'id' => $row->id,
              		'nama_lokasi' => $row->nama_lokasi,
              		'id_tipe' => $row->id_tipe,
              		'jam_buka' => $row->jam_buka,
              		'jam_tutup' => $row->jam_tutup,
              		'latitude' => $row->latitude,
              		'longitude' => $row->longitude,
              		'id_user' => $row->id_user,
              		'rate' => $row->rate,
	               );
                 $this->load->view($this->header);
                $this->load->view('backend/warung/warung_read', $data);
                 $this->load->view($this->footer);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warung/warung/create_action'),
      	    'id' => set_value('id'),
      	    'nama_lokasi' => set_value('nama_lokasi'),
      	    'id_tipe' => set_value('id_tipe'),
      	    'jam_buka' => set_value('jam_buka'),
      	    'jam_tutup' => set_value('jam_tutup'),
      	    'latitude' => set_value('latitude'),
      	    'longitude' => set_value('longitude'),
      	    'id_user' => $this->id_user,
      	    'rate' => set_value('rate'),
	         );

           $this->load->view($this->header);
           $this->load->view('warung/backend/warung_form', $data);
           $this->load->view($this->footer);

    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                  		'nama_lokasi' => $this->input->post('nama_lokasi',TRUE),
                  		'id_tipe' => $this->input->post('id_tipe',TRUE),
                  		'jam_buka' => $this->input->post('jam_buka',TRUE),
                  		'jam_tutup' => $this->input->post('jam_tutup',TRUE),
                  		'latitude' => $this->input->post('latitude',TRUE),
                  		'longitude' => $this->input->post('longitude',TRUE),
                  		'id_user' => $this->input->post('id_user',TRUE),
                  		'rate' => $this->input->post('rate',TRUE),
	            );



            $this->warung_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warung/warung'));
        }
    }

    public function update($id)
    {
        $row = $this->warung_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warung/warung/update_action'),
            		'id' => set_value('id', $row->id),
            		'nama_lokasi' => set_value('nama_lokasi', $row->nama_lokasi),
            		'id_tipe' => set_value('id_tipe', $row->id_tipe),
            		'jam_buka' => set_value('jam_buka', $row->jam_buka),
            		'jam_tutup' => set_value('jam_tutup', $row->jam_tutup),
            		'latitude' => set_value('latitude', $row->latitude),
            		'longitude' => set_value('longitude', $row->longitude),
            		'id_user' => set_value('id_user', $row->id_user),
            		'rate' => set_value('rate', $row->rate),
	             );
            $this->load->view($this->header);
            $this->load->view('warung/backend/warung_form', $data);
              $this->load->view($this->footer);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung/warung'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                		'nama_lokasi' => $this->input->post('nama_lokasi',TRUE),
                		'id_tipe' => $this->input->post('id_tipe',TRUE),
                		'jam_buka' => $this->input->post('jam_buka',TRUE),
                		'jam_tutup' => $this->input->post('jam_tutup',TRUE),
                		'latitude' => $this->input->post('latitude',TRUE),
                		'longitude' => $this->input->post('longitude',TRUE),
                		'id_user' => $this->input->post('id_user',TRUE),
                		'rate' => $this->input->post('rate',TRUE),
	                 );

            $this->warung_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warung/warung'));
        }
    }

    public function delete($id)
    {
        $row = $this->warung_model->get_by_id($id);

        if ($row) {
            $this->warung_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warung/warung'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung/warung'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nama_lokasi', ' ', 'trim|required');
    	$this->form_validation->set_rules('id_tipe', ' ', 'trim|required|numeric');
    	$this->form_validation->set_rules('jam_buka', ' ', 'trim|required|callback_waktu');
    	$this->form_validation->set_rules('jam_tutup', ' ', 'trim|required|callback_waktu');
    	$this->form_validation->set_rules('latitude', ' ', 'trim|required');
    	$this->form_validation->set_rules('longitude', ' ', 'trim|required');
    	$this->form_validation->set_rules('id_user', ' ', 'trim|required|numeric');
    	$this->form_validation->set_rules('rate', ' ', 'trim|required|numeric');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function waktu()
    {
      $jam_buka = new DateTime($this->input->post('jam_buka'));
      $jam_tutup = new DateTime($this->input->post('jam_tutup'));

      if(($jam_buka < $jam_tutup) ==FALSE)
      {
        $this->form_validation->set_message('waktu', 'Jam kerja yang anda inputkan tidak valid');
                       return FALSE;
      }
      else {

                         return TRUE;
      }
    }

}

/* End of file Warung.php */
/* Location: ./application/controllers/Warung.php */
