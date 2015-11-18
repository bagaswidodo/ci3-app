<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gmap_marker extends CI_Controller {
  public function index()
  {
      $this->load->view('gmap/markers');
  }

  public function read_ajax()
  {
    $this->load->view('gmap/ajax');
  }

  public function location_lbs()
  {
    $this->load->view('gmap/lbs');
  }

  public function simple_directions()
  {
      $this->load->view('gmap/directions');
  }

  public function markers()
  {
    $this->db->select('zip,latitude,longitude');
    $this->db->limit('10');
    $db = $this->db->get('zip');

    return $db;
  }
  public function marker_json()
  {
      $hasil = $this->markers();

      echo  json_encode($hasil->result());
      //$data['res'] =  json_encode($hasil->result());
      //$this->load->view('gmap/markers',$data);
      // $json = array();
      // foreach ($hasil->result() as $r) {
      //     $data['zip'] = $r->zip;
      //     $data['latitude'] =  $r->latitude;
      //     $data['longitude'] = $r->longitude;
      //     array_push($json,$data);
      // }
      // header('Access-Control-Allow-Origin: *');
      // header("Content-Type: application/json");
      //  echo json_encode($json);
      // echo "<pre>";
      // print_r($json);
      // echo "</pre>";

  }
}
