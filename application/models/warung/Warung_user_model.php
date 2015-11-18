<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warung_user_model extends CI_Model
{

    public $table = 'warung_user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }


    function getUser($data)
    {
      $this->db->where($data);
      return $this->db->get($this->table);
    }

    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_user', $keyword);
	$this->db->or_like('nama', $keyword);
	$this->db->or_like('email', $keyword);
	$this->db->or_like('username', $keyword);
	$this->db->or_like('password', $keyword);
	$this->db->or_like('level', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $keyword);
	$this->db->or_like('nama', $keyword);
	$this->db->or_like('email', $keyword);
	$this->db->or_like('username', $keyword);
	$this->db->or_like('password', $keyword);
	$this->db->or_like('level', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Warung_user_model.php */
/* Location: ./application/models/Warung_user_model.php */
