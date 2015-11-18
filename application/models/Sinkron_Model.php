<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sinkron_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function nm_kelas()
	{
		$q = $this->db->query("select * from tbl_kelas");
		return $q;
	}
	function nm_siswa($id)
	{
		$q = $this->db->query("select * from tbl_siswa_kelas left join tbl_kelas on tbl_siswa_kelas.id_kelas=tbl_kelas.id_kelas where tbl_siswa_kelas.id_kelas='$id'");
		return $q;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
