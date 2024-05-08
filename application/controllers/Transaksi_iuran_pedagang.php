<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_iuran_pedagang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {
            $this->load->model('Transaksi_iuran_pedagang_model');
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
            $config['base_url'] = base_url() . 'transaksi_iuran_pedagang/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_iuran_pedagang/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_iuran_pedagang/';
            $config['first_url'] = base_url() . 'transaksi_iuran_pedagang/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_iuran_pedagang_model->total_rows($q);
        $transaksi_iuran = $this->Transaksi_iuran_pedagang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_transaksi' => $transaksi_iuran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_asongan/transaksi_asongan_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id = 0)
    {
        if ($id > 0) {
            $data = $this->Transaksi_iuran_pedagang_model->read_transaksi($id);
            if (!$data) {
                redirect(base_url());
            } else {

                //$style['external_css'] = array('tabel_nota.css');
                //$this->load->view('page_template/header', $style);
                //$this->load->view('page_template/side_bar');
                //$this->load->view('page_template/top_bar');
                $this->load->view('transaksi_asongan/transaksi_asongan_download', $data);
                $this->load->view('transaksi_asongan/transaksi_asongan_print_bar', $data);
                //$this->load->view('page_template/footer');
            }
        } else {
            redirect(base_url());
        }
    }
    function download()
    {

        $id = $this->input->post('id_transaksi');
        if ($id) {
            $data = $this->Transaksi_iuran_pedagang_model->read_transaksi($id);
            if (!$data) {
                redirect(base_url());
            } else {

                require_once "vendor/autoload.php";
                $dompdf = new \Dompdf\Dompdf(['isRemoteEnabled' => true]);

                $surat = $this->load->view('transaksi_asongan/transaksi_asongan_download', $data, true);
                $dompdf->setPaper('a4', 'potrait');
                $dompdf->loadHtml($surat);
                $dompdf->render();
                $dompdf->stream($data['nama_pemilik'] . '_' . $data['jenis_dagangan'] . '.pdf');
            }
        }
    }
    public function create()
    {

        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Pilih Akhir Periode Untuk Melanjutkan');
            $id_pedagang = $this->input->post('id_pedagang');
            redirect(base_url('pedagang/read/' . $id_pedagang));
        } else {
            $this->load->model('users_model');
            $user_data = $this->users_model->get_by_id($_SESSION['id_user']);
            if ($user_data->role > 1) { //harus admin

                $iuran = (int) $this->input->post('iuran');
                $charge = (int) $this->input->post('extra_charge');
                $diskon = (int) $this->input->post('diskon');
                $nomor_kartu = $this->input->post('nomor_kartu');
                $nama_pedagang = $this->input->post('nama_pedagang');

                $total_iuran = 0;
                $total_xcharge = 0;

                $sub_total = 0;
                $i = 0;
                $awal_periode = date_create_from_format('Y-m-d', $this->input->post('awal_periode'));
                $dari = date_create_from_format('Y-m-d', $this->input->post('awal_periode'));
                $akhir_periode = date_create_from_format('Y-m-d', $this->input->post('sampai_dengan'));
                date_date_set($awal_periode, date_format($awal_periode, 'Y'), date_format($awal_periode, 'm'), '1');
                date_date_set($dari, date_format($dari, 'Y'), date_format($dari, 'm'), '1');
                date_date_set($akhir_periode, date_format($akhir_periode, 'Y'), date_format($akhir_periode, 'm'), '1');

                $periode = $awal_periode;
                $print_periode = array();
                $detail_iuran = array();


                if ($akhir_periode >= $awal_periode) {
                    do {
                        $i++;

                        $total_iuran = $total_iuran + $iuran;
                        $total_xcharge = $total_xcharge + $charge;

                        $detail_iuran[$i] = array('periode' => date_format($periode, 'Y-m-d'));
                        $periode = date_add($periode, date_interval_create_from_date_string("1 month"));
                    } while ($akhir_periode >= $periode);

                    $sampai_dengan = '';
                    if ($i > 1) {
                        $sampai_dengan = ' - ' . date_format($akhir_periode, 'M, Y');
                    }
                    $keterangan_iuran = 'Iuran Periode ' . date_format($dari, 'M, Y') . $sampai_dengan;
                    $print_periode['iuran'] = array(
                        'keterangan' => 'Iuran Periode ' . date_format($dari, 'M, Y') . $sampai_dengan,
                        'kali' => $i,
                        'nominal' => number_format($iuran, 0, ",", "."),
                        'jumlah' => number_format($total_iuran, 0, ',', '.')
                    );
                    $print_periode['xcharge'] = array(
                        'keterangan' => 'Penjamin',
                        'kali' => $i,
                        'nominal' => number_format($charge, 0, ',', '.'),
                        'jumlah' => number_format($total_xcharge, 0, ',', '.')

                    );
                }
                $sub_total = $total_iuran + $total_xcharge;
                $this->load->model('Akun_model');
                $data_akun = $this->Akun_model->get_bank_acc();
                $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('transaksi_iuran_pedagang/create_action'),
                    'id_transaksi' => set_value('id_transaksi'),
                    'nomor_transaksi' => set_value('nomor_transaksi'),
                    'id_pedagang' => $this->input->post('id_pedagang'),
                    'nomor_kartu' => $nomor_kartu,
                    'nama_pedagang' => $nama_pedagang,
                    'jenis_dagangan' => $this->input->post('jenis_dagangan'),
                    'wilayah' => $this->input->post('wilayah'),
                    'tanggal_transaksi' => date('d/m/Y h:i:s A'),
                    'id_user' => $_SESSION['id_user'],
                    'detail_print' => $print_periode,
                    'keterangan_iuran' => $keterangan_iuran,
                    'iuran' => $iuran,
                    'extra_charge' => $charge,
                    'diskon' => 0,
                    'total_iuran' => $total_iuran,
                    'total_extra_charge' => $total_xcharge,
                    'total_diskon' => 0,
                    'total_pembayaran' => $sub_total,
                    'detail_iuran' => $detail_iuran,
                    'data_akun' => $data_akun,

                );
                $this->load->view('page_template/header');
                $this->load->view('page_template/side_bar');
                $this->load->view('page_template/top_bar');
                $this->load->view('transaksi_asongan/transaksi_asongan_form', $data);
                $this->load->view('page_template/footer');
            } else {
                redirect(base_url());
            }
        }
    }

    public function create_action()
    {
        $id_user = $_SESSION['id_user'];
        $periode = array();
        $periode =  $this->input->post('periode', true);
        $iuran = $this->input->post('iuran', true);
        $charge = $this->input->post('extra_charge', true);
        $keterangan_iuran = $this->input->post('keterangan_iuran', true);

        $id_pedagang = $this->input->post('id_pedagang', TRUE);
        $nomor_kartu = $this->input->post('nomor_kartu', true);
        $nama_pedagang = $this->input->post('nama_pemilik', true);

        $total_pembayaran = $this->input->post('total_pembayaran', true);
        $id_akun = $this->input->post('akun', true);

        $tanggal_transaksi = date('Y-m-d h:i:s A');
        $data = array(

            'id_kartu' => $id_pedagang,
            'tanggal_transaksi' => $tanggal_transaksi,
            'id_user' => $id_user,
            'ke_akun' => $id_akun
        );
        $id = $this->Transaksi_iuran_pedagang_model->insert($data);
        if ($id > 0) {
            $detail = array();

            foreach ($periode as $p) {
                array_push($detail, array(
                    'periode' => $p,
                    'id_transaksi' => $id,
                    'iuran' => $iuran,
                    'charge' => $charge,
                ));
            }
            //input kas
            $kas = array(
                'tanggal' => $tanggal_transaksi,
                'id_akun' => $id_akun,
                'debet' => $total_pembayaran,
                'keterangan' => 'Asongan ' . $keterangan_iuran . ' ' . $nama_pedagang . ' ' . $nomor_kartu,
                'debet' => $total_pembayaran,
                'id_user' => $id_user,
                'id_transaksi' => $id,
            );
            $this->load->model('Jurnal_model');
            $this->Jurnal_model->insert($kas);
            //input detail untuk commit db
            $row_affected = $this->Transaksi_iuran_pedagang_model->detail($detail);
            if ($row_affected > 0) {
                $this->load->model('Akun_model');
                $data_akun = $this->Akun_model->get_by_id($id_akun);
                //$this->session->set_flashdata('message', 'Transaksi Berhasil Disimpan Ke ' . strtoupper($data_akun->alias) . ' Sejumlah ' . number_format($total_pembayaran, 0, ',', '.'));
                redirect(base_url('transaksi_iuran_pedagang/read/' . $id));
            } else {
                $this->session->set_flashdata('error', 'Terjadi Kesalahan Pada Detail Transaksi');
                error_log('gagal insert detail transaksi', 0);
                redirect(base_url('pedagang/read/' . $id_pedagang));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi Kesalahan Pada Insert Transaksi');
            error_log('gagal insert data transaksi', 0);
            redirect(base_url('pedagang/read/' . $id_pedagang));
        }
    }

    public function update($id)
    {
        $this->load->model('users_model');
        $user_data = $this->users_model->get_by_id($_SESSION['id_user']);
        if ($user_data->role == 1) {
            $row = $this->Transaksi_iuran_pedagang_model->get_detail_trans($id);

            if ($row) {
                $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('transaksi_iuran_pedagang/update_action'),
                    'id_transaksi' => set_value('id_transaksi', $id),
                    'data_transaksi' => $row,
                );
                $this->load->view('transaksi_asongan/transaksi_asongan_form', $data);
            } else {
                $this->session->set_flashdata('error', 'Record Not Found');
                redirect(site_url('transaksi_iuran'));
            }
        } else {
            $this->session->set_flashdata('error', 'Anda Tidak Meiliki Akses');
            redirect(base_url());
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('transaksi_iuran_pedagang/update/' . $this->input->post('id_transaksi')));
        } else {
            $data = array(
                'nomor_transaksi' => $this->input->post('nomor_transaksi', TRUE),
                'id_kartu' => $this->input->post('id_kartu', TRUE),
                'id_pedagang' => $this->input->post('id_pedagang', TRUE),
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
            );

            $this->Transaksi_iuran_pedagang_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_iuran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Transaksi_iuran_pedagang_model->get_by_id($id);
        $iduser = $_SESSION['id_user'];

        if ($row) {
            if ($row->status > 1) {
                $this->session->set_flashdata('message', 'Data Sudah Ter-Posting, Tidak Boleh Dihapus');
            } elseif ($iduser != $row->id_user) {
                $this->session->set_flashdata('message', 'Anda Tidak Diizinkan Menghapus Data ini');
            } else {
                $this->Transaksi_iuran_pedagang_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
        }
        redirect(site_url('transaksi_iuran'));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('sampai_dengan', 'Periode', 'required');
        // $this->form_validation->set_rules('id_kartu', 'id kartu', 'trim|required');
        // $this->form_validation->set_rules('id_pedagang', 'id pedagang', 'trim|required');
        // $this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
        // $this->form_validation->set_rules('id_user', 'id user', 'trim|required');

        // $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Transaksi_iuran.php */
/* Location: ./application/controllers/Transaksi_iuran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-05 07:15:59 */
/* http://harviacode.com */
