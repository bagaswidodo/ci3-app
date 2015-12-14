<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function autocomplete()
	{
		$this->load->view("autocomplete/index");
	}

	public function terbilang()
	{
		$this->load->helper("terbilang");
		$angka = "87,5";
		echo $angka;
		echo "<p>Terbilang : </p>";
		echo ucwords(number_to_words($angka));
		echo ucwords(number_to_words("1,000"));
	}

	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);
		// cari di database
		$data = $this->db->query("select nama_barang,kode_barang from coba where nama_barang like '%$keyword%' ");

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_barang,
				'data'	=>$row->kode_barang
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

	public function validasi_form_default()
	{
			$this->load->helper(array('form', 'url')); //load helper
			$this->load->library('form_validation'); //load library

			//configure validation
		//	$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			//array Version
			// $config = array(
      //          array(
      //                'field'   => 'username',
      //                'label'   => 'Username',
      //                'rules'   => 'required'
      //             ),
      //          array(
      //                'field'   => 'password',
      //                'label'   => 'Password',
      //                'rules'   => 'required'
      //             ),
      //          array(
      //                'field'   => 'passconf',
      //                'label'   => 'Password Confirmation',
      //                'rules'   => 'required'
      //             ),
      //          array(
      //                'field'   => 'email',
      //                'label'   => 'Email',
      //                'rules'   => 'required'
      //             )
      //       );
			//
			// 			$this->form_validation->set_rules($config);

			//example validation
			/*
			The above code sets the following rules:

    The username field be no shorter than 5 characters and no longer than 12.
    The password field must match the password confirmation field.
    The email field must contain a valid email address.
			*/

			// $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
			// $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
			// $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
			// $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

			//custom error
			$this->form_validation->set_message('required', 'Tidak boleh kosong');

			//error delimiter (globally)
			//single put this code (
			//  echo form_error('field name', '<div class="error">', '</div>');
			// or
			// echo validation_errors('<div class="error">', '</div>');

			//	) each form
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			//username using CallbackFilterIterator
			$this->form_validation->set_rules('username', 'User name', 'required|callback_username_check');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('form_validation/one_input');
			}
			else
			{
				$this->load->view('form_validation/form_success');
			}
	}

	//validasi form dengan dua input
	public function validas_form_dua_input()
	{
		$this->load->helper(array('form', 'url')); //load helper
		$this->load->library('form_validation'); //load library

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('angka1', 'Angka 1', 'required');
		$this->form_validation->set_rules('angka2', 'Angka 2', 'required|callback_cek_angka');


		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_validation/two_input');
		}
		else
		{
			$this->load->view('form_validation/form_success');
		}

	}

	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function cek_angka()
	{
		$angka1 = $this->input->post('angka1');
		$angka2 = $this->input->post('angka2');

		if ($angka2 < $angka1)
		{
			$this->form_validation->set_message('cek_angka', 'Angka 2 tidak boleh lebih kecil dari angka 1');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function upload_file()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->view('upload_file/upload_form', array('error' => ' ' ));
	}

	public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                //$config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

		            $config['max_size'] = 1024 * 8;
		            $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_file/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_file/upload_success', $data);
                }
        }


	public function bread()
	{
		// load Breadcrumbs
		$this->load->library('breadcrumbs');

		// add breadcrumbs
		$this->breadcrumbs->push('Section', '/section');
		$this->breadcrumbs->push('Page', '/section/page');
		$this->breadcrumbs->push('News', '/section/page/news');

		// unshift crumb
		//$this->breadcrumbs->unshift('Home', '/');

		// output
		echo $this->breadcrumbs->show();
	}
	
	public function material()
	{
		echo "Material Design soon, Here !";
	}

}
