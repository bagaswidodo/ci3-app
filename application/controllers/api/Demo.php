<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {

  public function index()
  {
      echo anchor('api/example/users','Get All Users');
      echo anchor('api/example/user/1','Get User With id 1');
  }
}
