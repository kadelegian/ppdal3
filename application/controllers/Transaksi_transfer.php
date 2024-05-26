<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_transfer extends CI_Controller
{
    private $akun_tujuan;
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {

            $this->load->library('form_validation');
            $this->load->model('Transaksi_transfer_model', 'transaksi_transfer_model');
            $this->load->model('Transaksi_pemasukan_model', 'transaksi_pemasukan_model');
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

        if ($a <> '' && $b <> '') {

            $config['base_url'] = base_url() . 'transaksi_transfer/index?awal_periode=' . $a . '&akhir_periode=' . $b;
            $config['first_url'] = base_url() . 'transaksi_transfer/index?awal_periode=' . $a . '&akhir_periode=' . $b;
        } else {
            $config['base_url'] = base_url() . 'transaksi_transfer';
            $config['first_url'] = base_url() . 'transaksi_transfer';
        }

        $config['per_page'] = 30;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->transaksi_transfer_model->total_rows($a, $b);
        $transaksi = $this->transaksi_transfer_model->get_limit_data($config['per_page'],  $a, $b, $start);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $js['js_script'] = array('jquery-ui.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery-ui.css');
        $data = array(
            'data_transaksi' => $transaksi,
            'pagination' => $this->pagination->create_links(),
            'awal_periode' => $a,
            'sampai_dengan' => $b,
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_transfer/transfer_list', $data);
        $this->load->view('page_template/footer', $js);
    }


    public function create()
    {
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

    public function create_action()
    {
        $dari_akun = $this->input->post('dari_akun');
        $this->akun_tujuan = $this->input->post('ke_akun');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nominal = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data_transfer = array(
                'nominal' => $nominal,
                'tanggal' => date('Y-m-d h:i:s')
            );
            $id_transfer = $this->transaksi_transfer_model->insert($data_transfer);
            // ------ insert data jurnal dulu ---------

            $data = array(
                'id_akun' => $this->input->post('dari_akun'),
                'tanggal' => date('Y-m-d h:i:s'),
                'keterangan' => $this->input->post('keterangan'),
                'kode' => 1001,
                'kredit' => $nominal,
                'debet' => 0,
                'id_user' => $_SESSION['id_user'],
            );

            $id_pengeluaran = $this->transaksi_pengeluaran_model->insert($data);
            $data = array(
                'id_akun' => $this->input->post('ke_akun'),
                'tanggal' => date('Y-m-d h:i:s'),
                'keterangan' => $this->input->post('keterangan'),
                'kode' => 1001,
                'kredit' => 0,
                'debet' => $nominal,
                'id_user' => $_SESSION['id_user'],
            );
            $id_pemasukan = $this->transaksi_pemasukan_model->insert($data);
            $data = array(
                array(
                    'id_transfer' => $id_transfer,
                    'id_jurnal' => $id_pengeluaran,
                    'urutan' => 1
                ),
                array(
                    'id_transfer' => $id_transfer,
                    'id_jurnal' => $id_pemasukan,
                    'urutan' => 2
                ),
            );
            $this->transaksi_transfer_model->insert_detail($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_transfer'));
        }
    }

    public function update($id)
    {
        $this->load->model('Akun_model', 'akun_model');

        $data_akun = $this->akun_model->get_active_acc();
        $transaksi = $this->transaksi_transfer_model->get_by_id($id);
        $data = array(
            'button' => 'Update',
            'action' => site_url('transaksi_transfer/update_action'),
            'id' => $id,
            'data_akun' => $data_akun,
            'ke_akun' => set_value('id_akun', $transaksi->rekening_tujuan),
            'dari_akun' => set_value('dari_akun', $transaksi->rekening_sumber),
            'tanggal' => date('d/m/Y', strtotime($transaksi->tanggal)),
            'keterangan' => set_value('keterangan', $transaksi->keterangan),
            'nominal' => set_value('nominal', $transaksi->nominal)
        );
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_transfer/transfer_form', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function update_action()
    {
        $id = $this->input->post('id');
        $this->akun_tujuan = $this->input->post('ke_akun');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $data_transaksi = $this->transaksi_transfer_model->get_by_id($id);

            if ($data_transaksi) {
                $nominal = preg_replace('/\D/', '', $this->input->post('nominal'));
                $data_transfer = array(
                    'nominal' => $nominal,
                );
                $id_transfer = $this->transaksi_transfer_model->update($id, $data_transfer);
                // ------ update data jurnal dulu ---------

                $data = array(
                    array(
                        'id' => $data_transaksi->id_jurnal_sumber,
                        'id_akun' => $this->input->post('dari_akun'),
                        'tanggal' => date('Y-m-d h:i:s'),
                        'keterangan' => $this->input->post('keterangan'),
                        'kode' => 1001,
                        'kredit' => $nominal,
                        'debet' => 0,
                        'id_user' => $_SESSION['id_user'],
                    ), array(
                        'id' => $data_transaksi->id_jurnal_tujuan,
                        'id_akun' => $this->input->post('ke_akun'),
                        'tanggal' => date('Y-m-d h:i:s'),
                        'keterangan' => $this->input->post('keterangan'),
                        'kode' => 1001,
                        'kredit' => 0,
                        'debet' => $nominal,
                        'id_user' => $_SESSION['id_user'],
                    )

                );
                $this->transaksi_transfer_model->update_jurnal_transfer($data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('transaksi_transfer'));
            }
        }
    }

    public function delete($id)
    {

        $this->transaksi_transfer_model->delete($id);
        redirect(base_url('transaksi_pengeluaran'));
    }
    public function cekAkunTransfer($id)
    {
        if ($id == $this->akun_tujuan) {
            $this->form_validation->set_message('cekAkunTransfer', '{field} tidak boleh sama dengan tujuan');
            return false;
        } else {
            return true;
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('dari_akun', 'Sumber Kas', 'callback_cekAkunTransfer');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
