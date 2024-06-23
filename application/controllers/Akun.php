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
        $total_debet = 0;
        $total_kredit = 0;
        foreach ($data_akun as $d) {
            $total_debet += $d->debet;
            $total_kredit += $d->kredit;
        }
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_akun' => $data_akun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'total_debet' => $total_debet,
            'total_kredit' => $total_kredit
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('akun/akun_list', $data);
        $this->load->view('page_template/footer');
    }

    public function save_saldo()
    {
        $id_akun = $this->input->post('id_akun');
        $this->form_validation->set_rules('saldo', 'Nominal Saldo', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if (!$this->form_validation->run()) {
            $this->setting_saldo($id_akun);
        } else {

            $tanggal = $this->input->post('tanggal', true);
            $dateObject = DateTime::createFromFormat('d/m/Y', $tanggal);
            $tanggal = $dateObject->format('Y-m-d h:i:s');
            $saldo =  preg_replace('/\D/', '', $this->input->post('saldo'));
            $data = array(
                'id_akun' => $id_akun,
                'periode' => $tanggal,
                'saldo' => $saldo
            );
            $this->Akun_model->set_saldo($data);
            redirect(site_url());
        }
    }

    public function create()
    {
        $this->load->model('Jenis_akun_model', 'kode_jenis_model');
        $data_jenis = $this->kode_jenis_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('akun/create_action'),
            'id' => set_value('id'),
            'kode_akun' => set_value('kode_akun'),
            'nama_akun' => set_value('nama_akun'),
            'alias' => set_value('alias'),
            'keterangan' => set_value('keterangan'),
            'nomor_rekening' => set_value('nomor_rekening'),
            'is_bank' => false,
            'debet' => set_value('debet', 0),
            'kredit' => set_value('kredit', 0),
            'kode_jenis' => set_value('kode_jenis'),
            'list_kode_jenis' => $data_jenis,
            'is_penjamin' => set_value('is_penjamin', 0),
            'is_iuran' => set_value('is_iuran', 0),
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
            $debet = preg_replace('/\D/', '', $this->input->post('debet', TRUE));
            $kredit = preg_replace('/\D/', '', $this->input->post('kredit', TRUE));
            $data = array(
                'nama_akun' => strtoupper($this->input->post('nama_akun', TRUE)),
                'kode_akun' => strtoupper($this->input->post('kode_akun', TRUE)),
                'alias' => strtoupper($this->input->post('alias', TRUE)),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
                'creator' => $this->session->userdata('id_user'),
                'bank' => $is_bank,
                'debet' => $debet,
                'kredit' => $kredit,
                'kode_jenis' => $this->input->post('kode_jenis', TRUE),
                'is_iuran' => $this->input->post('is_iuran') ? 1 : 0,
                'is_penjamin' => $this->input->post('is_penjamin') ? 1 : 0,
            );

            $this->Akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('akun'));
        }
    }

    public function update($id)
    {
        $row = $this->Akun_model->get_by_id($id);
        $this->load->model('Jenis_akun_model', 'kode_jenis_model');
        $data_jenis = $this->kode_jenis_model->get_all();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('akun/update_action'),
                'id' => set_value('id', $id),
                'kode_akun' => set_value('kode_akun', $row->kode_akun),
                'nama_akun' => set_value('nama_akun', $row->nama_akun),
                'alias' => set_value('alias', $row->alias),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'nomor_rekening' => set_value('prefix_dagangan', $row->nomor_rekening),
                'is_bank' => set_value('is_bank', $row->bank),
                'debet' => set_value('debet', $row->debet),
                'kredit' => set_value('kredit', $row->kredit),
                'kode_jenis' => set_value('kode_jenis', $row->kode_jenis),
                'list_kode_jenis' => $data_jenis,
                'is_iuran' => set_value('is_iuran', $row->is_iuran),
                'is_penjamin' => set_value('is_penjamin', $row->is_penjamin),
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

            $debet = preg_replace('/\D/', '', $this->input->post('debet', TRUE));
            $kredit = preg_replace('/\D/', '', $this->input->post('kredit', TRUE));

            $data = array(
                'kode_akun' => $this->input->post('kode_akun', true),
                'nama_akun' => strtoupper($this->input->post('nama_akun', TRUE)),
                'alias' => strtoupper($this->input->post('alias', TRUE)),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
                'creator' => $this->session->userdata('id_user'),
                'bank' => $is_bank,
                'debet' => $debet,
                'kredit' => $kredit,
                'kode_jenis' => $this->input->post('kode_jenis', TRUE),
                'is_iuran' => $this->input->post('is_iuran') ? 1 : 0,
                'is_penjamin' => $this->input->post('is_penjamin') ? 1 : 0,
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
    public function cek_kode_akun()
    {
        $id = $this->input->post('id'); // Get the current record ID
        $kode = $this->input->post('kode_akun');
        $this->db->where('kode_akun', $kode);
        $this->db->where('id !=', $id);
        $query = $this->db->get('akun');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('cek_kode_akun', 'The {field} cannot be used.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_akun', 'Kode Akun', 'trim|required|callback_cek_kode_akun');
        $this->form_validation->set_rules('nama_akun', 'nama akun', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }
}
