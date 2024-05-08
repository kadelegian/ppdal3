<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (isset($_SESSION['id_user'])) {
			$this->load->model('Users_model');
		} else {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{

		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));
		$userinfo = 'pengguna';

		if ($q <> '') {
			$config['base_url'] = base_url() . 'users/?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'users/?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'users/';
			$config['first_url'] = base_url() . 'users/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Users_model->total_rows($q);
		$users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'users_data' => $users,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->load->view('page_template/header');
		$this->load->view('page_template/side_bar');
		$this->load->view('page_template/top_bar');
		$this->load->view('users/users_list', $data);
		$this->load->view('page_template/footer');
	}

	public function aktifkan($id)
	{
		$row = $this->Users_model->get_by_id($id);
		if ($row) {
			$data = array(
				'active' => 1,

			);
			$this->Users_model->update($id, $data);
			redirect(site_url('users'));
		}
	}
	public function disable($id)
	{
		$row = $this->Users_model->get_by_id($id);
		if ($row) {
			$data = array(
				'active' => 0,

			);
			$this->Users_model->update($id, $data);
			redirect(site_url('users'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('users/create_action'),
			'id' => set_value('id'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'email' => set_value('email'),
			'created_on' => set_value('created_on'),
			'active' => 1,
			'full_name' => set_value('full_name'),
			'role' => set_value('role'),
		);
		$this->load->view('page_template/header');
		$this->load->view('page_template/side_bar');
		$this->load->view('page_template/top_bar');
		$this->load->view('users/users_form', $data);
		$this->load->view('page_template/footer');
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			$pasword_enc = $this->Users_model->enkripsi($this->input->post('password', true));
			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => $pasword_enc,
				'email' => $this->input->post('email', TRUE),
				'created_on' => time(),
				'full_name' => $this->input->post('full_name', TRUE),
				'role' => $this->input->post('role')

			);

			$this->Users_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('users'));
		}
	}

	public function update($id)
	{
		$row = $this->Users_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('users/update_action'),
				'id' => set_value('id', $row->id),
				'username' => set_value('username', $row->username),
				'password' => set_value('password'),
				'email' => set_value('email', $row->email),
				'full_name' => set_value('full_name', $row->full_name),
				'role' => set_value('role', $row->role),
			);
			$this->load->view('page_template/header');
			$this->load->view('page_template/side_bar');
			$this->load->view('page_template/top_bar');
			$this->load->view('users/users_form', $data);
			$this->load->view('page_template/footer');
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			//back to update form
			$this->update($this->input->post('id', TRUE));
		} else {
			$pwd = $this->Users_model->enkripsi($this->input->post('password', TRUE));
			$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => $pwd,
				'email' => $this->input->post('email', TRUE),
				'full_name' => $this->input->post('full_name', TRUE),
				'role' => $this->input->post('role')
			);

			$this->Users_model->update($this->input->post('id', TRUE), $data);

			redirect(site_url('users'));
		}
	}

	public function delete($id)
	{
		$row = $this->Users_model->get_by_id($id);

		if ($row) {
			$this->Users_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('users'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('full_name', 'full name', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
