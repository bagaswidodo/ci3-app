<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_user extends CI_Controller {
  public function index()
  {
      $this->load->view('api/index');
  }
}
