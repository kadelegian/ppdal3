<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Laporan_model', 'laporan_model');
            $this->load->model('Jurnal_model', 'jurnal_model');
            //$this->load->helper('tanggal_indo');
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
            $config['base_url'] = base_url() . 'laporan_transaksi?awal_periode=' . $awal_periode . '&akhir_periode=' . $sampai_dengan;
            $config['first_url'] = base_url() . 'laporan_transaksi?awal_periode=' . $awal_periode . '&akhir_periode=' . $sampai_dengan;
        } else {
            $config['base_url'] = base_url() . 'laporan_transaksi';
            $config['first_url'] = base_url() . 'laporan_transaksi';
        }

        $config['per_page'] = 22;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->laporan_model->total_rows($start_date, $end_date);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data_jurnal = $this->laporan_model->get_limit_data($start_date, $end_date, $config['per_page'], $start);
        $summary = $this->laporan_model->summary_cara_bayar($start_date, $end_date);

        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'filter_tanggal/filter_tanggal.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $data = array(

            'summary_cara_bayar' => $summary,
            'data_laporan' => $data_jurnal,
            'awal_periode' => $awal_periode,
            'sampai_dengan' => $sampai_dengan,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'pagination' => $this->pagination->create_links(),
        );
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('laporan/laporan_transaksi', $data);
        $this->load->view('page_template/footer', $js);
    }


    public function download()
    {
        $saldo_awal = $this->jurnal_model->saldo_awal();
        $pemasukan = $this->jurnal_model->pemasukan();
        $pengeluaran = $this->jurnal_model->pengeluaran();
        $saldo_akhir = $this->jurnal_model->get_saldo_rekening();
        $info_lembaga = $this->db->get('info_lembaga')->row();
        $tanggal = format_tanggal_indo(date('Y-m-d'));
        $data = array(
            'saldo_awal' => $saldo_awal,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo_akhir' => $saldo_akhir,
            'info_lembaga' => $info_lembaga,
            'tanggal' => $tanggal
        );
        //$this->load->view('laporan/laporan_print', $data);

        require_once "vendor/autoload.php";
        $dompdf = new \Dompdf\Dompdf(['isRemoteEnabled' => true]);
        $surat = $this->load->view('laporan/laporan_print', $data, true);
        $dompdf->setPaper('a4', 'potrait');
        $dompdf->loadHtml($surat);
        $dompdf->render();
        $dompdf->stream('laporan keuangan.pdf');
    }
}
