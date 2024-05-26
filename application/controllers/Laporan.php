<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Jurnal_model', 'jurnal_model');
            $this->load->library('form_validation');
            $this->load->helper('tanggal_indo');
        } else {
            redirect(base_url('auth'));
        }
    }

    public function index()
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
        $css['external_css'] = array('tabel_laporan.css');
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('laporan/laporan', $data);
        $this->load->view('page_template/footer');
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
