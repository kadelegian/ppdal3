<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iuran_asongan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {
            $this->load->model('Pedagang_model');
            $this->load->library('form_validation');
        } else {
            $dest = $this->uri->segment(2);
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
            $config['base_url'] = base_url() . 'iuran_asongan/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'iuran_asongan/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'iuran_asongan/';
            $config['first_url'] = base_url() . 'iuran_asongan/';
        }
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pedagang_model->total_rows($q);
        $pedagang = $this->Pedagang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);


        $data = array(
            'pedagang_data' => $pedagang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

        );

        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('iuran/asongan_list', $data);
        $this->load->view('page_template/footer');
    }



    function checkDateFormat($date)
    {
        if (preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $date)) {
            if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))

                return true;
            else
                $this->form_validation->set_message('checkDateFormat', 'Invalid {field}');
            return false;
        } else {
            $this->form_validation->set_message('checkDateFormat', 'Invalid {field}');
            return false;
        }
    }


    public function _rules()
    {

        $this->form_validation->set_rules('nama_pedagang', 'nama pedagang', 'trim|required');
        $this->form_validation->set_rules('join_date', 'Join Date', 'callback_checkDateFormat|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
