<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('warung_user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $warung_user = $this->warung_user_model->get_all();

        $data = array(
            'warung_user_data' => $warung_user
        );

        $this->load->view('warung_user_list', $data);
    }

    public function read($id)
    {
        $row = $this->warung_user_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'nama' => $row->nama,
		'email' => $row->email,
		'username' => $row->username,
		'password' => $row->password,
		'level' => $row->level,
	    );
            $this->load->view('warung_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung_user'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warung_user/create_action'),
	    'id_user' => set_value('id_user'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'level' => set_value('level'),
	);
        $this->load->view('warung_user_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->warung_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warung_user'));
        }
    }

    public function update($id)
    {
        $row = $this->warung_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warung_user/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'level' => set_value('level', $row->level),
	    );
            $this->load->view('warung_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung_user'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->warung_user_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warung_user'));
        }
    }

    public function delete($id)
    {
        $row = $this->warung_user_model->get_by_id($id);

        if ($row) {
            $this->warung_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warung_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warung_user'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama', ' ', 'trim|required');
	$this->form_validation->set_rules('email', ' ', 'trim|required');
	$this->form_validation->set_rules('username', ' ', 'trim|required');
	$this->form_validation->set_rules('password', ' ', 'trim|required');
	$this->form_validation->set_rules('level', ' ', 'trim|required|numeric');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Warung_user.php */
/* Location: ./application/controllers/Warung_user.php */
