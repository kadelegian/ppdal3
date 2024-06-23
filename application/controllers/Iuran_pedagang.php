<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iuran_pedagang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $dest = $this->uri->segment(2);
        $this->load->model('Kartu_model');
        $this->load->library('form_validation');
        if (!isset($_SESSION['id_user'])) {
            if ($dest !== 'read') {
                redirect(base_url('auth'));
            }
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'iuran_pedagang/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'iuran_pedagang/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'iuran_pedagang/';
            $config['first_url'] = base_url() . 'iuran_pedagang/';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kartu_model->total_rows($q);
        $kartu = $this->Kartu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kartu_data' => $kartu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('iuran/pedagang_list', $data);
        $this->load->view('page_template/footer');
    }
}
