<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_transfer extends CI_Controller
{

    public $akun_tujuan;
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {

            $this->load->library('form_validation');
            $this->load->model('Transaksi_transfer_model', 'transaksi_transfer_model');
        } else {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $awal_periode = $this->input->get('awal_periode');
        $sampai_dengan =  $this->input->get('akhir_periode');
        $start_date = $awal_periode ? date('Y-m-d', strtotime(str_replace('/', '-', $awal_periode))) : NULL;
        $end_date = $sampai_dengan ? date('Y-m-d', strtotime(str_replace('/', '-', $sampai_dengan))) : NULL;
        $start = intval($this->input->get('start'));

        if ($awal_periode <> '' && $sampai_dengan <> '') {

            $config['base_url'] = base_url() . 'transaksi_transfer/index?awal_periode=' . $awal_periode . '&akhir_periode=' . $sampai_dengan;
            $config['first_url'] = base_url() . 'transaksi_transfer/index?awal_periode=' . $awal_periode . '&akhir_periode=' . $sampai_dengan;
        } else {
            $config['base_url'] = base_url() . 'transaksi_transfer';
            $config['first_url'] = base_url() . 'transaksi_transfer';
        }

        $config['per_page'] = 30;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->transaksi_transfer_model->total_rows($start_date, $end_date);
        $transaksi = $this->transaksi_transfer_model->get_limit_data($config['per_page'],  $start_date, $end_date, $start);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'filter_tanggal/filter_tanggal.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $data = array(
            'data_transaksi' => $transaksi,
            'pagination' => $this->pagination->create_links(),
            'awal_periode' => $awal_periode,
            'sampai_dengan' => $sampai_dengan,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'jumlah_baris' => $config['per_page']
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

        $data_kas = $this->akun_model->get_akun_kas();

        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_transfer/create_action'),
            'id' => set_value('id'),
            'data_akun_sumber' => $data_kas,
            'data_akun_tujuan' => $data_kas,
            'id_akun_sumber' => set_value('id_akun_sumber'),
            'id_akun_tujuan' => set_value('id_akun_tujuan'),
            'tanggal' => date('d/m/Y'),
            'keterangan' => set_value('keterangan'),
            'nominal' => set_value('nominal')
        );

        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_transfer/transfer_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->akun_tujuan = $this->input->post('id_akun_tujuan');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nominal = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data = array(
                'tanggal' => date('Y-m-d h:i:s'),
                'id_user' => $_SESSION['id_user']
            );

            $id_trx = $this->transaksi_transfer_model->insert($data);
            $data = array(
                array(
                    'tanggal' => date('Y-m-d h:i:s'),
                    'id_akun' => $this->input->post('id_akun_tujuan'),
                    'debet' => $nominal,
                    'kredit' => 0,
                    'keterangan' => $this->input->post('keterangan'),
                    'id_user' => $_SESSION['id_user'],
                    'id_transaksi' => 0,
                    'id_transaksi_pemasukan' => 0,
                    'id_transaksi_pengeluaran' => 0,
                    'id_transfer' => $id_trx
                ), array(
                    'tanggal' => date('Y-m-d h:i:s'),
                    'id_akun' => $this->input->post('id_akun_sumber'),
                    'debet' => 0,
                    'kredit' =>  $nominal,
                    'keterangan' => $this->input->post('keterangan'),
                    'id_user' => $_SESSION['id_user'],
                    'id_transaksi' => 0,
                    'id_transaksi_pemasukan' => 0,
                    'id_transaksi_pengeluaran' => 0,
                    'id_transfer' => $id_trx
                )
            );

            $this->load->model('Jurnal_model', 'jurnal_model');
            $this->jurnal_model->insert_transaksi($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_transfer'));
        }
    }

    public function update($id)
    {
        $data_transaksi = $this->transaksi_transfer_model->get_by_id($id);
        if (sizeof($data_transaksi) > 1) {
            $this->load->model('Akun_model', 'akun_model');
            $data_kas = $this->akun_model->get_akun_kas();
            $nominal = 0;
            if ($data_transaksi[0]->kredit > 0) {
                $id_akun_sumber = $data_transaksi[0]->id_akun;
                $id_akun_tujuan = $data_transaksi[1]->id_akun;
                $nominal = $data_transaksi[0]->kredit;
            } else {
                $id_akun_sumber = $data_transaksi[1]->id_akun;
                $id_akun_tujuan = $data_transaksi[0]->id_akun;
                $nominal = $data_transaksi[0]->debet;
            }
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_transfer/update_action'),
                'id' => $id,
                'data_akun_sumber' => $data_kas,
                'data_akun_tujuan' => $data_kas,
                'id_akun_sumber' => set_value('id_akun_sumber', $id_akun_sumber),
                'id_akun_tujuan' => set_value('id_akun_tujuan', $id_akun_tujuan),
                'tanggal' => date_format(date_create_from_format('Y-m-d h:i:s', $data_transaksi[0]->tanggal), 'd/m/Y'),
                'keterangan' => set_value('keterangan', $data_transaksi[0]->keterangan),
                'nominal' => set_value('nominal', $nominal)
            );

            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('transaksi_transfer/transfer_form', $data);
            $this->load->view('page_template/footer');
        }
    }

    public function update_action()
    {
        $this->_rules();

        $id = $this->input->post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->update($id);
        } else {
            $data_transaksi = $this->transaksi_transfer_model->get_by_id($id);
            $id1 = 0;
            $id2 = 0;
            if ($data_transaksi[0]->debet > 0) {
                $id1 = $data_transaksi[0]->id;
                $id2 = $data_transaksi[1]->id;
            } else {
                $id1 = $data_transaksi[1]->id;
                $id2 = $data_transaksi[0]->id;
            }
            $nominal = preg_replace('/\D/', '', $this->input->post('nominal'));
            $data = array(
                'id' => $id,
                'tanggal' => date('Y-m-d h:i:s'),
                'id_user' => $_SESSION['id_user']
            );
            $this->transaksi_transfer_model->update($id, $data);

            $data = array(
                array(
                    'id' => $id1,
                    'tanggal' => date('Y-m-d h:i:s'),
                    'id_akun' => $this->input->post('id_akun_tujuan'),
                    'debet' => $nominal,
                    'kredit' => 0,
                    'keterangan' => $this->input->post('keterangan'),
                    'id_user' => $_SESSION['id_user'],
                    'id_transaksi' => 0,
                    'id_transaksi_pemasukan' => 0,
                    'id_transaksi_pengeluaran' => 0,
                    'id_transfer' => $id
                ), array(
                    'id' => $id2,
                    'tanggal' => date('Y-m-d h:i:s'),
                    'id_akun' => $this->input->post('id_akun_sumber'),
                    'debet' => 0,
                    'kredit' =>  $nominal,
                    'keterangan' => $this->input->post('keterangan'),
                    'id_user' => $_SESSION['id_user'],
                    'id_transaksi' => 0,
                    'id_transaksi_pemasukan' => 0,
                    'id_transaksi_pengeluaran' => 0,
                    'id_transfer' => $id
                )
            );

            $this->load->model('Jurnal_model', 'jurnal_model');
            $this->jurnal_model->update($data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_transfer'));
        }
    }

    public function delete($id)
    {

        $this->transaksi_transfer_model->delete($id);
        redirect(base_url('transaksi_transfer'));
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
        $this->form_validation->set_rules('id_akun_sumber', 'Akun SUmber', 'callback_cekAkunTransfer');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
