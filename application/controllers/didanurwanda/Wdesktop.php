<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wdesktop extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('didanurwanda/wdesktop/index');
	}

	public function dashboard() 
	{
		echo 'dashboard coy';
	}

	public function cars() 
	{
		$all_models = json_encode($this->db->get('models')->result_array());
		$all_models = str_replace(array('"ID":', '"Model":'), array('"id":', '"text":'), $all_models);
		
		$this->load->view('didanurwanda/wdesktop/cars', array(
			'models' => $all_models
		));
	}
 
	public function car_lists()
	{
		header('Content-Type: application/json');
			
		if ( $this->input->get('cmd') == 'get-records' )
		{


			$total = $this->db->count_all_results('cars');
			$this->db->select('c.ID, c.Category, c.TransmissSpeedCount, c.TransmissAutomatic, c.Liter, m.Model, t.Trademark'); 
			$this->db->join('models m', 'm.ID = c.Model');
			$this->db->join('trademarks t', 't.ID = m.Trademark');
			$this->db->limit( $this->input->get('limit', true) , $this->input->get('offset', true) );

			// for sort
			if ( $this->input->get('sort') != null )
			{
				$sort = $this->input->get('sort');
				$field = $sort[0]['field'] == 'recid' ? 'ID' : $sort[0]['field'];
				$this->db->order_by( $field, ucwords($sort[0]['direction']) );
			}

			// for search
			if ( $this->input->get('search') != null)
			{
				// lagi males ngoding :D
				// untuk requestnya bisa lihat di firebug
			}

			$result = $this->db->get('cars c')->result_array();

			$return = array(
				"total" => $total,
				"records" => $result
			);

			// cara singkat buat yg males bikin loop, jangan ditiru :P
			echo str_replace('"ID":', '"recid":', json_encode($return));

		}
		else if ( $this->input->get('cmd') == 'delete-records' )
		{
			// support multiple delete
			foreach($this->input->get('selected') as $key => $val)
			{
				$this->db->delete('cars', array('ID' => $val));
			}

			echo json_encode(array(
				'status' => 'success'
			));
		}
		
	}

	public function car_form()
	{
		header('Content-Type: application/json');

		if ( $this->input->post('cmd') == 'get-record' )
		{
			$result = $this->db->get_where('cars', array('ID' => $this->input->post('recid')))->result();
			
			$json = json_encode(array(
				'status' => 'success',
				'record' => $result[0]
			));

			echo str_replace('"ID":', '"recid":', $json);
		}
		else if ( $this->input->post('cmd') == 'save-record' )
		{
			$action = 'insert';

			// simple script for update
			if ( $this->input->post('recid') != null )
			{
				$this->db->where('ID', $this->input->post('recid'));
				$action = 'update';
			}
			
			$record = $this->input->post('record');
					   // $action update or insert
			$this->db->$action('cars', array(
				'Model' => $record['Model']['id'],
				'Category' => $record['Category']['id'],
				'TransmissSpeedCount' => $record['TransmissSpeedCount'],
				'TransmissAutomatic' => $record['TransmissAutomatic']['id'],
				'Liter' => $record['Liter']
			));

			echo json_encode(array(
				'status' => 'success'
			));
		} 
	}


	public function models() 
	{
		echo 'model coy';
	}

	public function trademarks() 
	{
		echo 'trademarks coy';
	}
}