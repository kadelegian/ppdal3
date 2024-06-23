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
            //$this->load->helper('tanggal_indo');
        } else {
            redirect(base_url('auth'));
        }
    }

    public function jurnal_umum()
    {
        $awal_periode = $this->input->get('awal_periode');
        $sampai_dengan =  $this->input->get('akhir_periode');
        $start_date = $awal_periode ? date('Y-m-d', strtotime(str_replace('/', '-', $awal_periode))) : NULL;
        $end_date = $sampai_dengan ? date('Y-m-d', strtotime(str_replace('/', '-', $sampai_dengan))) : NULL;

        $start = intval($this->input->get('start'));
        if ($awal_periode <> '' && $sampai_dengan <> '') {
            $config['base_url'] = base_url() . 'laporan/jurnal_umum?awal_periode=' . $awal_periode . '&akhir_periode=' . $sampai_dengan;
            $config['first_url'] = base_url() . 'laporan/jurnal_umum?awal_periode=' . $awal_periode . '&akhir_periode=' . $sampai_dengan;
        } else {
            $config['base_url'] = base_url() . 'laporan/jurnal_umum';
            $config['first_url'] = base_url() . 'laporan/jurnal_umum';
        }

        $config['per_page'] = 22;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->jurnal_model->total_rows_jurnal_umum($start_date, $end_date);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data_jurnal = $this->jurnal_model->get_jurnal_umum($start_date, $end_date, $config['per_page'], $start);
        $summary = $this->jurnal_model->get_summary_jurnal_umum($start_date, $end_date);

        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'filter_tanggal/filter_tanggal.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $data = array(
            'summary' => $summary,
            'data_jurnal' => $data_jurnal,
            'awal_periode' => $awal_periode,
            'sampai_dengan' => $sampai_dengan,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'pagination' => $this->pagination->create_links(),
        );
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('laporan/jurnal_umum', $data);
        $this->load->view('page_template/footer', $js);
    }
    public function buku_besar()
    {

        $start = intval($this->input->get('start'));
        $saldo = $this->input->get('saldo');
        $id_akun = $this->input->get('id_akun');
        $data_semua_akun = $this->jurnal_model->get_akun_buku_besar();
        if ($id_akun <> '') {
            $config['base_url'] = base_url() . 'laporan/buku_besar?id_akun=' . $id_akun;
            $config['first_url'] = base_url() . 'laporan/buku_besar?id_akun=' . $id_akun;
        } else {
            $id_akun = $data_semua_akun[0]->id;
            $config['base_url'] = base_url() . 'laporan/buku_besar';
            $config['first_url'] = base_url() . 'laporan/buku_besar';
        }

        $config['per_page'] = 24;
        $config['page_query_string'] = true;
        $config['total_rows'] =  $this->jurnal_model->get_num_row_buku_besar($id_akun);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data_bb = $this->jurnal_model->get_buku_besar($id_akun, $start, $config['per_page']);

        $summary = $this->jurnal_model->get_summary_buku_besar($id_akun);


        $saldo_awal = $this->jurnal_model->get_saldo_akun($id_akun);
        $saldo_page = $this->jurnal_model->get_page_saldo_buku_besar($id_akun, $start, $config['per_page']);
        log_message('info', $this->db->last_query());
        $this->load->model('Akun_model', 'akun_model');
        $info_akun_terpilih = $this->akun_model->get_by_id($id_akun);
        $data = array(
            'periode' => $this->jurnal_model->periode_laporan,
            'summary' => $summary,
            'saldo_awal' => $saldo_awal,
            'saldo_page' => $saldo_page,
            'saldo' => $saldo,
            'info_akun_terpilih' => $info_akun_terpilih,
            'data_semua_akun' => $data_semua_akun,
            'data_buku_besar' => $data_bb,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'pagination' => $this->pagination->create_links(),
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('laporan/buku_besar', $data);
        $this->load->view('page_template/footer');
    }
    public function laba_rugi()
    {
        $i = 0;
        $total_pemasukan = 0;
        $total_pengeluaran = 0;

        $data_akun_pemasukan = array();
        $data_akun_pengeluaran = array();

        $saldo_awal_pemasukan = $this->jurnal_model->get_saldo_awal_akun_laba_rugi(true);

        $saldo_awal_pengeluaran = $this->jurnal_model->get_saldo_awal_akun_laba_rugi(false);

        $data_summary_pemasukan = $this->jurnal_model->get_laba_rugi(true);
        $data_summary_pengeluaran = $this->jurnal_model->get_laba_rugi(false);

        foreach ($data_summary_pemasukan as $pemasukan) {
            $id_akun = $pemasukan->id_akun;
            $saldo = $pemasukan->kredit - $pemasukan->debet;
            $saldo_awal = 0;
            foreach ($saldo_awal_pemasukan as $sap) {
                if ($sap->id == $id_akun) {
                    $saldo_awal = $sap->kredit - $sap->debet;
                }
            }

            $temp_pemasukan = array(
                'id' => $id_akun,
                'kode_akun' => $pemasukan->kode_akun,
                'nama_akun' => $pemasukan->nama_akun,
                'saldo' => $saldo_awal + $saldo
            );
            array_push($data_akun_pemasukan, $temp_pemasukan);
        }

        foreach ($data_summary_pengeluaran as $pengeluaran) {
            $id_akun_pengeluaran = $pengeluaran->id_akun;
            $saldo = $pengeluaran->debet - $pengeluaran->kredit;
            $saldo_awal = 0;
            foreach ($saldo_awal_pengeluaran as $sapeng) {
                if ($sapeng->id == $id_akun_pengeluaran) {
                    $saldo_awal = $sapeng->debet - $sapeng->kredit;
                }
            }

            $temp_pengeluaran = array(
                'id' => $id_akun_pengeluaran,
                'kode_akun' => $pengeluaran->kode_akun,
                'nama_akun' => $pengeluaran->nama_akun,
                'saldo' => $saldo_awal + $saldo,
            );
            array_push($data_akun_pengeluaran, $temp_pengeluaran);
            $total_pengeluaran += $saldo_awal + $saldo;
        }

        $data = array(
            'data_pendapatan' => $data_akun_pemasukan,
            'data_biaya' => $data_akun_pengeluaran,
            'total_pendapatan' => $total_pemasukan,
            'total_biaya' => $total_pengeluaran,
            'periode' => $this->jurnal_model->periode_laporan,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('laporan/laba_rugi', $data);
        $this->load->view('laporan/neraca', $this->neraca());
        $this->load->view('page_template/footer');
    }
    public function neraca()
    {
        $data_saldo_per_aktiva = $this->jurnal_model->saldo_akhir_aktiva();
        $data_saldo_per_hutang = $this->jurnal_model->saldo_akhir_hutang();

        $data_saldo_per_modal = $this->jurnal_model->saldo_akhir_hutang();
        $labarugi_berjalan = $this->jurnal_model->laba_rugi_berjalan()->laba_rugi;
        $data = array(
            'data_aset' => $data_saldo_per_aktiva,
            'data_kewajiban' => $data_saldo_per_hutang,
            'data_modal' => $data_saldo_per_modal,
            'labarugi_periode' => $labarugi_berjalan,
            'periode' => $this->jurnal_model->periode_laporan,
        );
        return $data;
        // $this->load->view('page_template/header');
        // $this->load->view('page_template/side_bar');
        // $this->load->view('page_template/top_bar');
        // $this->load->view('laporan/neraca', $data);
        // $this->load->view('page_template/footer');
    }
    public function kas()
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
