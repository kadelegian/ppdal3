<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_kas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {

            $this->load->library('form_validation');
        } else {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $this->load->model('Akun_model');
        $data_akun = $this->Akun_model->get_active_acc();
        $this->load->model('Jurnal_model');
        $data_saldo = $this->Jurnal_model->get_summary($data_akun);
        $data = array(
            'data_saldo' => $data_saldo
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_kas/transaksi_kas_dashboard', $data);
        $this->load->view('page_template/footer');
    }
}
