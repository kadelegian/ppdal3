<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pemasukan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {

            $this->load->library('form_validation');
            $this->load->model('Transaksi_pemasukan_model', 'transaksi_pemasukan_model');
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

            $config['base_url'] = base_url() . 'transaksi_pemasukan/index?awal_periode=' . $a . '&akhir_periode=' . $b;
            $config['first_url'] = base_url() . 'transaksi_pemasukan/index?awal_periode=' . $a . '&akhir_periode=' . $b;
        } else {
            $config['base_url'] = base_url() . 'transaksi_pemasukan';
            $config['first_url'] = base_url() . 'transaksi_pemasukan';
        }
        $total_nominal = $this->transaksi_pemasukan_model->get_nominal_transaksi($a, $b);
        $total = $total_nominal->total_pemasukan;

        $config['per_page'] = 30;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->transaksi_pemasukan_model->total_rows($a, $b);
        $transaksi = $this->transaksi_pemasukan_model->get_limit_data($config['per_page'],  $a, $b, $start);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $js['js_script'] = array('jquery-ui.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery-ui.css');
        $data = array(
            'data_transaksi' => $transaksi,
            'pagination' => $this->pagination->create_links(),
            'total_pemasukan' => $total,
            'awal_periode' => $a,
            'sampai_dengan' => $b,
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_pemasukan/transaksi_pemasukan_list', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function read($id = 0)
    {
        $cek = $this->uri->segment(3, 0);
        $cek = html_escape($cek);
        if (is_numeric($cek)) {
            if ($cek > 0) {

                $data = array(
                    'id' => $row->id,
                    'nama_pemilik' => $row->nama_pemilik,
                    'nomor_kartu' => $this->Kartu_model->nomor_kartu,
                    'alamat_kartu' => $row->alamat_kartu,
                    'nomor_telp' => $row->nomor_telp,
                    'join_date' => $row->join_date,
                    'wilayah' => $row->wilayah,
                    'id_jenis_dagangan' => $row->id_jenis_dagangan,
                    'jenis_dagangan' => $row->nama_dagangan,
                    'tanggal_jatuh_tempo' => $tgl_jatuh_tempo,
                    'histori_payment' => $payment_history->result(),
                    'min_month' => $selisih_bulan,
                    'user_role' => $user_role,

                );
                $js['js_script'] = array('jquery-ui.min.js', 'jquery.maskedinput.min.js', 'MonthPicker.min.js', 'month_format.js');
                $css['external_css'] = array('jquery-ui.css', 'MonthPicker.min.css');


                $this->load->view('page_template/header', $css);
                $this->load->view('page_template/side_bar');
                $this->load->view('page_template/top_bar');
                $this->load->view('kartu/t_kartu_read', $data);
                $this->load->view('page_template/footer', $js);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url());
            }
        }
    }

    public function create()
    {
        $this->load->model('Akun_model', 'akun_model');
        $this->load->model('Jenis_pemasukan_model', 'jenis_pemasukan_model');
        $data_akun = $this->akun_model->get_active_acc();
        $jp = $this->jenis_pemasukan_model->get_active_data();
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_pemasukan/create_action'),
            'id' => set_value('id'),
            'data_akun' => $data_akun,
            'id_akun' => set_value('id_akun'),
            'tanggal' => date('d/m/Y'),
            'keterangan' => set_value('keterangan'),
            'kode' => set_value('kode'),
            'id_jenis_pemasukan' => set_value('id_jenis_pemasukan'),
            'data_jenis_pemasukan' => $jp,
            'nominal' => set_value('nominal')
        );
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_pemasukan/transaksi_pemasukan_form', $data);
        $this->load->view('page_template/footer', $js);
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
