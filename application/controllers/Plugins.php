<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends CI_Controller {

    public function select2()
    {
        $this->load->view('plugins/select2');
    }

    public function timepicker()
    {
      $this->load->view('plugins/timepicker');
    }

    public function select2_data()
    {
      $this->load->model('MAutocomplete','autocomplete');

      //$faskes_tipe = $this->faskes_tipe_model->get_all();
      $q = $this->input->get('q');
      $propinsi_data = $this->autocomplete->findPropinsiData($q);
      //print_r($propinsi_data);

      /*
      $data = array(
          'faskes_tipe_data' => $faskes_tipe
      );
      */
      foreach ($propinsi_data as $v) {
          $data[] = array('id' => $v->propinsi_id, 'text' => $v->propinsi);
      }

      //print_r($data);
      echo json_encode($data);
    }
}
