<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Simple_gis extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('simple_gis_model', 'gis');
  }
  public function index()
  {
    $this->load->view('simple_gis/index');
  }

  public function lokasi_tersimpan()
  {
    $data['locations'] = $this->gis->get_all_locations();
    $this->load->view('simple_gis/lokasi_tersimpan', $data);
  }

  public function simpan_lokasi_baru()
  {
    $x = $this->input->get('koordinat_x');
    $y = $this->input->get('koordinat_y');
    $nama_tempat = $this->input->get('nama_tempat');

    $data = array(
        'x' => $x,
        'y' => $y,
        'nama_tempat' => $nama_tempat
    );

    $this->gis->simpan_lokasi($data);
  }

  public function hapus_lokasi()
  {
    $nomor = $this->input->post('nomor');
    $this->gis->hapus_lokasi($nomor);
  }
}
