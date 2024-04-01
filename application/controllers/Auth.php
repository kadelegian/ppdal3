<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index()
    {
        if ($this->session->has_userdata('id_user')) {
            $this->login_ok();
        } else {
            header('location:' . base_url('auth/login'));
        }
    }
    public function logout()
    {
        unset($_SESSION['id_user']);
        unset($_SESSION['role']);
        header('location:' . base_url('auth/login'));
    }
    public function login_action()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $cek = $this->users_model->login($email, $password);
        if ($cek) {
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Akun Tidak Ditemukan');
            header('location:' . base_url('auth/login'));
        }
    }
    function login_ok()
    {
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('page_template/footer');
    }
    public function login()
    {
        $this->load->view('page_template/header');
        $this->load->view('users/users_login');
        $this->load->view('page_template/footer');
    }
}
