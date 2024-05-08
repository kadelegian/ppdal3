<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Akun_model');
            $this->load->library('form_validation');
        } else {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'akun/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'akun/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'akun/';
            $config['first_url'] = base_url() . 'akun/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Akun_model->total_rows($q);
        $data_akun = $this->Akun_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_akun' => $data_akun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('akun/akun_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $row = $this->Akun_model->get_by_id($id);
        if ($row) {

            $this->load->view('jenis_dagangan/t_jenis_dagangan_read', $row);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url());
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('akun/create_action'),
            'id' => set_value('id'),
            'nama_akun' => set_value('nama_akun'),
            'alias' => set_value('alias'),
            'keterangan' => set_value('keterangan'),
            'nomor_rekening' => set_value('nomor_rekening'),
            'is_bank' => false,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('akun/akun_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $is_bank = $this->input->post('is_bank');
            if ($is_bank == null) {
                $is_bank = 0;
            }
            $data = array(
                'nama_akun' => strtoupper($this->input->post('nama_akun', TRUE)),
                'alias' => strtoupper($this->input->post('alias', TRUE)),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
                'creator' => $this->session->userdata('id_user'),
                'bank' => $is_bank,
            );

            $this->Akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('akun'));
        }
    }

    public function update($id)
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('akun/update_action'),
                'id' => set_value('id', $id),
                'nama_akun' => set_value('nama_akun', $row->nama_akun),
                'alias' => set_value('alias', $row->alias),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'nomor_rekening' => set_value('prefix_dagangan', $row->nomor_rekening),
                'is_bank' => set_value('is_bank', $row->bank),
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('akun/akun_form', $data);
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
            $is_bank = $this->input->post('is_bank');
            if ($is_bank == null) {
                $is_bank = 0;
            }
            $data = array(
                'nama_akun' => strtoupper($this->input->post('nama_akun', TRUE)),
                'alias' => strtoupper($this->input->post('alias', TRUE)),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
                'creator' => $this->session->userdata('id_user'),
                'bank' => $is_bank,
            );

            $this->Akun_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('akun'));
        }
    }
    public function nonaktifkan($id)
    {
        if ($this->Akun_model->non_aktifkan($id)) {
            $this->session->set_flashdata('message', 'Akun Di-Non Aktifkan');
            redirect(site_url('akun'));
        } else {
            $this->session->set_flashdata('message', 'Akun Gagal Di-Non Aktifkan');
            redirect(site_url('akun'));
        }
    }

    public function delete($id)
    {
        $this->load->model('Akun_model');
        if (is_numeric($id)) {
            $data_akun = $this->Akun_model->get_by_id($id);
            if ($data_akun) {
                $this->session->set_flashdata('message', 'Invalid Request');
                redirect(site_url());
            } else {
                $this->Akun_model->update($id, array('aktif', 0));
                $this->session->set_flashdata('message', 'Success');
                redirect(site_url('akun'));
            }
        } else {
            redirect(site_url());
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_akun', 'nama akun', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jenis_dagangan.php */
/* Location: ./application/controllers/Jenis_dagangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:38:14 */
/* http://harviacode.com */
