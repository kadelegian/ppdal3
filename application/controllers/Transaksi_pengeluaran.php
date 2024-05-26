<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {

            $this->load->library('form_validation');
            $this->load->model('Transaksi_pengeluaran_model', 'transaksi_pengeluaran_model');
        } else {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $a = trim($this->input->get('awal_periode'));
        $b = trim($this->input->get('akhir_periode'));
        $total = 0;
        $start = intval($this->input->get('start'));
        $filter_rekening = $this->input->get('filter_rekening');
        $filter_petugas = $this->input->get('filter_petugas');
        if ($a <> '' && $b <> '') {

            $config['base_url'] = base_url() . 'transaksi_pengeluaran/index?awal_periode=' . $a . '&akhir_periode=' . $b;
            $config['first_url'] = base_url() . 'transaksi_pengeluaran/index?awal_periode=' . $a . '&akhir_periode=' . $b;
        } else {
            $config['base_url'] = base_url() . 'transaksi_pengeluaran';
            $config['first_url'] = base_url() . 'transaksi_pengeluaran';
        }
        $total_nominal = $this->transaksi_pengeluaran_model->get_nominal_transaksi($a, $b);
        $total = $total_nominal->total_pengeluaran;

        $config['per_page'] = 30;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->transaksi_pengeluaran_model->total_rows($a, $b);
        $transaksi = $this->transaksi_pengeluaran_model->get_limit_data($config['per_page'],  $a, $b, $start);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $js['js_script'] = array('jquery-ui.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery-ui.css');
        $data = array(
            'data_transaksi' => $transaksi,
            'pagination' => $this->pagination->create_links(),
            'total_pengeluaran' => $total,
            'awal_periode' => $a,
            'sampai_dengan' => $b,
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_pengeluaran/transaksi_pengeluaran_list', $data);
        $this->load->view('page_template/footer', $js);
    }


    public function create()
    {
        $this->load->model('Akun_model', 'akun_model');
        $this->load->model('Jenis_pengeluaran_model', 'jenis_pengeluaran_model');
        $data_akun = $this->akun_model->get_active_acc();
        $jp = $this->jenis_pengeluaran_model->get_active_data();
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_pengeluaran/create_action'),
            'id' => set_value('id'),
            'data_akun' => $data_akun,
            'id_akun' => set_value('id_akun'),
            'tanggal' => date('d/m/Y'),
            'keterangan' => set_value('keterangan'),
            'id_jenis_pengeluaran' => set_value('id_jenis_pengeluaran'),
            'data_jenis_pengeluaran' => $jp,
            'nominal' => set_value('nominal')
        );
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_pengeluaran/transaksi_pengeluaran_form', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $kredit = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data = array(
                'id_akun' => $this->input->post('id_akun'),
                'tanggal' => date('Y-m-d h:i:s'),
                'keterangan' => $this->input->post('keterangan'),
                'kode_pengeluaran' => $this->input->post('id_jenis_pengeluaran'),

                'kredit' => $kredit,
                'debet' => 0,
                'id_user' => $_SESSION['id_user'],
            );

            $this->transaksi_pengeluaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_pengeluaran'));
        }
    }

    public function update($id)
    {
        $this->load->model('Akun_model', 'akun_model');
        $this->load->model('Jenis_pengeluaran_model', 'jenis_pengeluaran_model');
        $data_akun = $this->akun_model->get_active_acc();
        $jp = $this->jenis_pengeluaran_model->get_active_data();
        $data_transaksi = $this->transaksi_pengeluaran_model->get_by_id($id);

        if ($data_transaksi) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_pengeluaran/update_action'),
                'id' => $data_transaksi->id,
                'data_akun' => $data_akun,
                'id_akun' => set_value('id_akun', $data_transaksi->id_akun),
                'tanggal' => $data_transaksi->tanggal,
                'keterangan' => set_value('keterangan', $data_transaksi->keterangan),

                'id_jenis_pengeluaran' => set_value('id_jenis_pengeluaran', $data_transaksi->kode_pengeluaran),
                'data_jenis_pengeluaran' => $jp,
                'nominal' => set_value('nominal', $data_transaksi->kredit)
            );
        }
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_pengeluaran/transaksi_pengeluaran_form', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $kredit = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data = array(
                'id_akun' => $this->input->post('id_akun'),
                'tanggal' => date('Y-m-d h:i:s'),
                'keterangan' => $this->input->post('keterangan'),
                'kode_pengeluaran' => $this->input->post('id_jenis_pengeluaran'),
                'kredit' => $kredit,
                'debet' => 0,
                'id_user' => $_SESSION['id_user'],
            );

            $this->transaksi_pengeluaran_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_pengeluaran'));
        }
    }

    public function delete($id)
    {

        $this->transaksi_pengeluaran_model->delete($id);
        redirect(base_url('transaksi_pengeluaran'));
    }

    public function _rules()
    {

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
