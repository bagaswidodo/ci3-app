<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_spa extends CI_Controller {
  public function index()
    {
        $this->load->view('todo_spa/index');
    }
}
