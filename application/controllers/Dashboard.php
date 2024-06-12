<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Jurnal_model', 'jurnal_model');
            $this->load->library('form_validation');
        } else {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {

        $data_saldo = $this->jurnal_model->get_saldo_rekening();

        $data = array(
            'data_saldo' =>  $data_saldo,

        );
        //$js['js_script'] = array('chart/main/Chart.min.js', 'chart/chart-area.js');
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('page_template/footer');
    }
}
