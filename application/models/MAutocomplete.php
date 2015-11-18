<?php
class MAutocomplete extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
  function lookup($keyword){
  		$this->db->select('*')->from('propinsi');
          $this->db->like('propinsi',$keyword,'after');
          $query = $this->db->get();

          return $query->result();
  	}

    function getPropinsiList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('propinsi');
		$this->db->order_by('propinsi','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Propinsi-';
            $result[$row->propinsi_id]= $row->propinsi;
        }

        return $result;
	}

		function findPropinsiData($q){
				//$result = array();
				$this->db->select('*');
				$this->db->from('propinsi');
				$this->db->like('propinsi', $q);
				$this->db->order_by('propinsi','ASC');
				$array_keys_values = $this->db->get();
				return $array_keys_values->result();
		}

	function getKotaList(){
		$propinsi_id = $this->input->post('propinsi_id');
		$result = array();
		$this->db->select('*');
		$this->db->from('kota_kabupaten');
		$this->db->where('propinsi_id',$propinsi_id);
		$this->db->order_by('kota_kabupaten','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kota / Kabupaten-';
            $result[$row->kota_id]= $row->kota_kabupaten;
        }

        return $result;
	}
}
