<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Simple_gis_model extends CI_Model
{
    public $table = 'kordinat_gis';
    public $pk = 'nomor';
    function __construct()
    {
        parent::__construct();
    }

    function get_all_locations()
    {
        //get all entry
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function simpan_lokasi($data)
    {
        $this->db->insert($this->table, $data);
    }

    // delete data
    function hapus_lokasi($id)
    {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table);
    }




}
