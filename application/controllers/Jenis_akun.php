<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Jenis_akun_model', 'jenis_akun_model');
            $this->load->library('form_validation');
            if ($_SESSION['role'] > 0) {
                $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
                redirect(base_url());
            }
        } else {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_akun/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_akun/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_akun/';
            $config['first_url'] = base_url() . 'jenis_akun/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->jenis_akun_model->total_rows($q);
        $data_jenis = $this->jenis_akun_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_jenis' => $data_jenis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('jenis_akun/jenis_akun_list', $data);
        $this->load->view('page_template/footer');
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_akun/create_action'),
            'id' => set_value('id'),
            'keterangan' => set_value('keterangan'),
            'sn' => set_value('sn'),
            'pos' => set_value('pos'),

        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('jenis_akun/jenis_akun_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data = array(
                'keterangan' => $this->input->post('keterangan', true),
                'sn' => $this->input->post('sn'),
                'pos' => $this->input->post('pos'),

            );

            $this->jenis_akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_akun'));
        }
    }

    public function update($id)
    {
        $row = $this->jenis_akun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_akun/update_action'),
                'id' => set_value('id', $id),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'sn' => set_value('sn', $row->sn),
                'pos' => set_value('pos', $row->pos),

            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('jenis_akun/jenis_akun_form', $data);
            $this->load->view('page_template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url());
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

            $data = array(
                'keterangan' => $this->input->post('keterangan', TRUE),
                'sn' => $this->input->post('sn'),
                'pos' => $this->input->post('pos'),
            );

            $this->jenis_akun_model->update($this->input->post('id'), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_akun'));
        }
    }
    public function nonaktifkan($id)
    {
        if ($this->jenis_akun_model->nonaktifkan($id)) {
            $this->session->set_flashdata('message', 'Berhasil Di-Non Aktifkan');
            redirect(site_url('jenis_akun'));
        } else {
            $this->session->set_flashdata('message', 'Gagal Di-Non Aktifkan');
            redirect(site_url('jenis_akun'));
        }
    }



    public function _rules()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jenis_dagangan.php */
/* Location: ./application/controllers/Jenis_dagangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:38:14 */
/* http://harviacode.com */
