<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

  public function __construct() {
      parent::__construct();
      if ( $this->session->userdata('logged_in')=="") {
        redirect('warung/auth/login');

      }

      $this->load->model('warung/warung_model');
      $this->load->library('form_validation');
    }


    public function index()
    {
      $this->load->view('warung/backend/templates/head');
      $this->load->view('warung/backend/admin');
      //
       $this->load->view('warung/backend/templates/footer');
    }

    public function data_warung()
    {
      $warung = $this->warung_model->get_all();

      $data = array(
          'warung_data' => $warung
      );

      $this->load->view('warung/frontend/templates/head');
      $this->load->view('warung/backend/warung_list', $data);

      $this->load->view('warung/frontend/templates/footer');

    }






}
