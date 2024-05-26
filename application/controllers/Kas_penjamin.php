<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kas_penjamin extends CI_Controller
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
        $q = 'SELECT sum(jurnal.debet) as jumlah ,saldo_akun.periode,akun.nama_akun,akun.id
FROM jurnal
LEFT JOIN saldo_akun on saldo_akun.id_akun=jurnal.id_akun
LEFT JOIN akun on jurnal.id_akun=akun.id
WHERE jurnal.tanggal>= saldo_akun.periode AND jurnal.kode=2
group by akun.id';

        $data_pj = $this->db->query($q)->result();
        $data = array('data_kas_penjamin' => $data_pj);
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('kas_penjamin/kas_penjamin_list', $data);
        $this->load->view('page_template/footer');
    }

    public function transfer()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $akun_sumber = $this->input->post('id_akun');
            $nominal = $this->input->post('nominal');
            $this->load->model('Akun_model', 'akun_model');

            $data_akun = $this->akun_model->get_active_acc();

            $data = array(
                'button' => 'Create',
                'action' => site_url('transaksi_transfer/create_action'),
                'id' => set_value('id'),
                'data_akun' => $data_akun,
                'ke_akun' => set_value('id_akun'),
                'dari_akun' => set_value('dari_akun'),
                'tanggal' => date('d/m/Y'),
                'keterangan' => set_value('keterangan'),
                'nominal' => set_value('nominal')
            );
            $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
            $css['external_css'] = array('jquery.datetimepicker.min.css');
            $this->load->view('page_template/header', $css);
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('transaksi_transfer/transfer_form', $data);
            $this->load->view('page_template/footer', $js);
        }
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $debet = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data = array(
                'id_akun' => $this->input->post('id_akun'),
                'tanggal' => date('Y-m-d h:i:s'),
                'keterangan' => $this->input->post('keterangan'),
                'kode' => $this->input->post('id_jenis_pemasukan'),
                'debet' => $debet,
                'kredit' => 0,
                'id_user' => $_SESSION['id_user'],
            );

            $this->transaksi_pemasukan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_pemasukan'));
        }
    }

    public function update($id)
    {
        $this->load->model('Akun_model', 'akun_model');
        $this->load->model('Jenis_pemasukan_model', 'jenis_pemasukan_model');
        $data_akun = $this->akun_model->get_active_acc();
        $jp = $this->jenis_pemasukan_model->get_active_data();
        $data_transaksi = $this->transaksi_pemasukan_model->get_by_id($id);

        if ($data_transaksi) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_pemasukan/update_action'),
                'id' => $data_transaksi->id,
                'data_akun' => $data_akun,
                'id_akun' => set_value('id_akun', $data_transaksi->id_akun),
                'tanggal' => $data_transaksi->tanggal,
                'keterangan' => set_value('keterangan', $data_transaksi->keterangan),

                'id_jenis_pemasukan' => set_value('id_jenis_pemasukan', $data_transaksi->kode),
                'data_jenis_pemasukan' => $jp,
                'nominal' => set_value('nominal', $data_transaksi->debet)
            );
        }
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_pemasukan/transaksi_pemasukan_form', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $debet = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data = array(
                'id_akun' => $this->input->post('id_akun'),
                'tanggal' => date('Y-m-d h:i:s'),
                'keterangan' => $this->input->post('keterangan'),
                'kode' => $this->input->post('id_jenis_pemasukan'),
                'debet' => $debet,
                'kredit' => 0,
                'id_user' => $_SESSION['id_user'],
            );

            $this->transaksi_pemasukan_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_pemasukan'));
        }
    }

    public function delete($id)
    {

        $this->transaksi_pemasukan_model->delete($id);
        redirect(base_url('transaksi_pemasukan'));
    }

    public function _rules()
    {

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
