<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
  public $header;
  public $footer;

  public function __construct() {
      parent::__construct();
      $this->header = 'warung/frontend/templates/head';
      $this->footer = 'warung/frontend/templates/footer';
    }

    public function index()
    {

        $this->load->view($this->header);
        $this->load->view('warung/frontend/index');
        $this->load->view($this->footer);
    }

}
