<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // public function __construct() {
  	// 	parent::__construct();
  	// 	$this->load->model('model_nilai');
  	// 	if ( $this->session->userdata('username')=="") {
  	// 		redirect('login');
  	// 	}
  	// 	//$this->load->helper('text');
  	// }

    public function login()
    {

       $this->load->view('warung/backend/templates/head');
       $data['email'] = '';
       $this->load->view('warung/backend/login',$data);
      //
        $this->load->view('warung/backend/templates/footer');

    }

    public function cek_login()
    {

        $this->load->library('form_validation');
        $data = array(
            'username' => $this->input->post('username', TRUE),
  					 'password' => $this->input->post('password', TRUE)
  			);


        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
          array(
            'required' => 'Anda belum mengisi Email %s.',
            'valid_email' => 'Email yang anda inputkan tidak valid'
          ));
        $this->form_validation->set_rules('password', 'Password', 'required',
          array('required' => 'Anda belum mengisi password %s.')
        );

        if ($this->form_validation->run() == FALSE)
        {

          $this->load->view('warung/backend/templates/head');

          $data['email'] = $this->input->post('email');
          $this->load->view('warung/backend/login',$data);

           $this->load->view('warung/backend/templates/footer');


        }
        else
        {
            $this->load->model('warung/Warung_user_model','user_model'); // load model_user

            $data = array(
              'email'=>  $this->input->post('email'),
              'password' =>  $this->input->post('password')
            );

            $hasil = $this->user_model->getUser($data);

            if ($hasil->num_rows() == 1) {
              print_r($hasil->row());

                  $sess_data['logged_in'] = 'Sudah Loggin';
                  $sess_data['uid'] = $hasil->row()->id_user;
                 $sess_data['nama'] = $hasil->row()->nama;
                  $this->session->set_userdata($sess_data);

              redirect('warung/backend');

            }
            else {
              redirect('warung/backend');
            }
        }
    }
    // end login

    public function logout() {
    		$this->session->unset_userdata('logged_in');
    		$this->session->unset_userdata('uid');
        	$this->session->unset_userdata('nama');
    		session_destroy();
    		redirect('warung/backend');
    		//$this->load->view('index');
    	}

}
