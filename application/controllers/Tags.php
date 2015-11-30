<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tags extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Node_model','node');
			 $this->load->library('form_validation');
		}

		public function index()
		{
			echo "";
		}

		public function node()
		{
			$this->load->view('tags/node');
		}

		public function getList()
		{
			$db = $this->db->get('nodes');
	        if ($db->num_rows() == 0) {
	            echo '<tr><td colspan="4">Masih Kosong</td></tr>';
	        } else {
	        	$no = 1;
	            foreach ($db->result_object() as $row) {
	                echo '<tr>';
	                echo '<td>' . $no . '</td>';
	                echo '<td>' . $row->latitude . ',' .$row->longitude . '</td>';
	                echo '<td>' . $row->alamat . '</td>';
	                echo '<td>';
	 
	                // EDIT BUTTON
	                // echo Tb::button('Edit', array(
	                //     'type' => Tb::BUTTON_TYPE_LINK,
	                //     'onclick' => "editUser('$row->id', '$row->nama', '$row->status')",
	                //     'size' => Tb::BUTTON_SIZE_SMALL,
	                //     'color' => Tb::BUTTON_COLOR_SUCCESS
	                // ));
	
	                 ?>
	                 <button class="btn btn-danger" onclick="hapus('<?php echo $row->id; ?>')">Delete</button>
	                 <?php
	                echo '</td>';
	                echo '</tr>';
	                $no++;
	            }
	        }
		}

		public function simpan() {
	        $this->form_validation->set_rules('location', 'Location', 'required');
	        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
	        if ($this->form_validation->run()) {
	        	$loc = explode(",", $this->input->post('location'));
	        	$latitude = $loc[0];
	        	$longitude = $loc[1];

	        	$data = array(
				        'latitude' => $latitude,
				        'longitude' => $longitude,
				        'alamat' => $this->input->post('alamat')
				);
                $this->db->insert('nodes', $data);
	            echo json_encode(array('status' => 'success', 'msg' => 'Berhasil'));
	        } else {
	            echo json_encode(array('status' => 'error', 'msg' => validation_errors()));
	        }
	    }

	    public function hapus()
	    {
	    	if (isset($_POST)) {
            	$this->db->delete('nodes', $this->input->post(NULL, true));
        	}
	    }

	    
}