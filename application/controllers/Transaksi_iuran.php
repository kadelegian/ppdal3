<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_iuran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {
            $this->load->model('Transaksi_iuran_model');
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
            $config['base_url'] = base_url() . 'transaksi_iuran/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_iuran/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_iuran/';
            $config['first_url'] = base_url() . 'transaksi_iuran/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_iuran_model->total_rows($q);
        $transaksi_iuran = $this->Transaksi_iuran_model->get_limit_data($config['per_page'], $start, $q);

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
        $this->load->view('transaksi_iuran/transaksi_iuran_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id = 0)
    {
        if ($id > 0) {
            $data = $this->Transaksi_iuran_model->read_transaksi($id);
            if (!$data) {
                redirect(base_url());
            } else {

                //$style['external_css'] = array('tabel_nota.css');
                //$this->load->view('page_template/header', $style);
                //$this->load->view('page_template/side_bar');
                //$this->load->view('page_template/top_bar');
                $this->load->view('transaksi_iuran/transaksi_iuran_download', $data);
                $this->load->view('transaksi_iuran/transaksi_iuran_print_bar', $data);
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
            $data = $this->Transaksi_iuran_model->read_transaksi($id);
            if (!$data) {
                redirect(base_url());
            } else {
                //$this->load->view('transaksi_iuran/transaksi_iuran_download', $data);
                //return;
                require_once "vendor/autoload.php";
                $dompdf = new \Dompdf\Dompdf(['isRemoteEnabled' => true]);
                //$mpdf = new \Mpdf\Mpdf();
                //$mpdf = new \Mpdf\Mpdf();
                //$mpdf->AddPage('P', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', 'half-letter');
                $surat = $this->load->view('transaksi_iuran/transaksi_iuran_download', $data, true);
                $dompdf->setPaper('a4', 'potrait');
                $dompdf->loadHtml($surat);
                $dompdf->render();
                $dompdf->stream($data['nama_pedagang'] . '_' . $data['jenis_dagangan'] . '.pdf');
                //$mpdf->WriteHTML($surat);
                //$mpdf->Output('nota.pdf', "D");
            }
        }
    }
    public function create()
    {

        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Pilih Akhir Periode Untuk Melanjutkan');
            $id_kartu = $this->input->post('id_kartu');
            redirect(base_url('kartu/read/' . $id_kartu));
        } else {
            $this->load->model('users_model');
            $user_data = $this->users_model->get_by_id($_SESSION['id_user']);
            if ($user_data->role == 1) { //harus admin

                $iuran = (int) $this->input->post('iuran');
                $charge = (int) $this->input->post('charge');
                $diskon = (int) $this->input->post('diskon');
                $diskon_pedagang = (int) $this->input->post('diskon_pedagang');
                $charge_pedagang = (int) $this->input->post('charge_pedagang');
                $charge = $charge_pedagang + $charge;
                $diskon = $diskon_pedagang + $diskon;
                $total_iuran = 0;
                $total_xcharge = 0;
                $total_diskon = 0;
                $sub_total = 0;
                $i = 0;
                $awal_periode = date_create_from_format('Y-m-d', $this->input->post('awal_periode'));
                $dari = date_create_from_format('Y-m-d', $this->input->post('awal_periode'));
                $akhir_periode = date_create_from_format('Y-m-d', $this->input->post('sampai_dengan'));
                date_date_set($awal_periode, date_format($awal_periode, 'Y'), date_format($awal_periode, 'm'), '1');
                date_date_set($dari, date_format($dari, 'Y'), date_format($dari, 'm'), '1');
                date_date_set($akhir_periode, date_format($akhir_periode, 'Y'), date_format($akhir_periode, 'm'), '1');
                $nomor_kartu = $this->input->post('nomor_kartu');
                $nama_pedagang = $this->input->post('nama_pedagang');
                $periode = $awal_periode;
                $print_periode = array();
                $detail_iuran = array();


                if ($akhir_periode >= $awal_periode) {
                    do {
                        $i++;

                        $total_iuran = $total_iuran + $iuran;
                        $total_xcharge = $total_xcharge + $charge;
                        $total_diskon = $total_diskon + $diskon;
                        $detail_iuran[$i] = array('periode' => date_format($periode, 'Y-m-d'));
                        $periode = date_add($periode, date_interval_create_from_date_string("1 month"));
                    } while ($akhir_periode >= $periode);
                    $sampai_dengan = '';
                    if ($i > 1) {
                        $sampai_dengan = ' - ' . date_format($akhir_periode, 'M, Y');
                    }

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
                    $print_periode['diskon'] = array(
                        'keterangan' => 'Diskon',
                        'kali' => $i,
                        'nominal' => number_format($diskon, 0, ',', '.'),
                        'jumlah' => number_format($total_diskon, 0, ',', '.')
                    );
                }
                $sub_total = ($total_iuran + $total_xcharge) - $total_diskon;
                $this->load->model('Akun_model');
                $data_akun = $this->Akun_model->get_bank_acc();
                $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('transaksi_iuran/create_action'),
                    'id_transaksi' => set_value('id_transaksi'),
                    'nomor_transaksi' => set_value('nomor_transaksi'),
                    'id_kartu' => set_value('id_kartu'),
                    'nomor_kartu' => $nomor_kartu,
                    'id_pedagang' => set_value('id_pedagang'),
                    'nama_pedagang' => $nama_pedagang,
                    'jenis_dagangan' => $this->input->post('jenis_dagangan'),
                    'wilayah' => $this->input->post('wilayah'),
                    'tanggal_transaksi' => date('d/m/Y'),
                    'id_user' => $_SESSION['id_user'],
                    'detail_print' => $print_periode,
                    'iuran' => $iuran,
                    'charge' => $charge,
                    'diskon' => $diskon,
                    'total_iuran' => $total_iuran,
                    'total_charge' => $total_xcharge,
                    'total_diskon' => $total_diskon,
                    'total_pembayaran' => $sub_total,
                    'detail_iuran' => $detail_iuran,
                    'data_akun' => $data_akun,

                );
                $this->load->view('page_template/header');
                $this->load->view('page_template/side_bar');
                $this->load->view('page_template/top_bar');
                $this->load->view('transaksi_iuran/transaksi_iuran_form', $data);
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
        $charge = $this->input->post('charge', true);
        $diskon = $this->input->post('diskon', true);
        $id_kartu = $this->input->post('id_kartu', TRUE);
        $total_pembayaran = $this->input->post('total_pembayaran', true);
        $nomor = $this->Transaksi_iuran_model->nomor_transaksi($id_user);
        $id_akun = $this->input->post('akun', true);
        $id_pedagang = $this->input->post('id_pedagang', TRUE);
        $nomor_kartu = $this->input->post('nomor_kartu', true);
        $nama_pedagang = $this->input->post('nama_pedagang', true);

        $data = array(
            'nomor_transaksi' => $nomor,
            'id_kartu' => $id_kartu,
            'id_pedagang' => $id_pedagang,
            'tanggal_transaksi' => date('Y-m-d'),
            'id_user' => $id_user,
            'ke_akun' => $id_akun
        );
        $id = $this->Transaksi_iuran_model->insert($data);
        if ($id > 0) {
            $detail = array();

            foreach ($periode as $p) {
                array_push($detail, array(
                    'periode' => $p,
                    'id_transaksi' => $id,
                    'iuran' => $iuran,
                    'charge' => $charge,
                    'diskon' => $diskon
                ));
            }
            //input kas
            $kas = array(
                'tanggal' => date('Y-m-d'),
                'id_akun' => $id_akun,
                'debet' => $total_pembayaran,
                'keterangan' => 'Iuran ' . date_format(date_create_from_format('Y-m-d', $p), 'M Y') . ' ' . $nama_pedagang . ' ' . $nomor_kartu,
                'debet' => $total_pembayaran,
                'id_user' => $id_user,
                'id_transaksi' => $id,
            );
            $this->load->model('Jurnal_model');
            $this->Jurnal_model->insert($kas);
            //input detail untuk commit db
            $row_affected = $this->Transaksi_iuran_model->detail($detail);
            if ($row_affected > 0) {
                $this->load->model('Akun_model');
                $data_akun = $this->Akun_model->get_by_id($id_akun);
                $this->session->set_flashdata('message', 'Transaksi Berhasil Disimpan Ke ' . strtoupper($data_akun->alias) . ' Sejumlah ' . number_format($total_pembayaran, 0, ',', '.'));
                $this->read($id);
            } else {
                $this->session->set_flashdata('error', 'Terjadi Kesalahan Pada Detail Transaksi');
                error_log('gagal insert detail transaksi', 0);
                redirect(base_url('kartu/read/' . $id_kartu));
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi Kesalahan Pada Insert Transaksi');
            error_log('gagal insert data transaksi', 0);
            redirect(base_url('kartu/read/' . $id_kartu));
        }
    }

    public function update($id)
    {
        $this->load->model('users_model');
        $user_data = $this->users_model->get_by_id($_SESSION['id_user']);
        if ($user_data->role == 1) {
            $row = $this->Transaksi_iuran_model->get_detail_trans($id);

            if ($row) {
                $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('transaksi_iuran/update_action'),
                    'id_transaksi' => set_value('id_transaksi', $id),
                    'data_transaksi' => $row,
                );
                $this->load->view('transaksi_iuran/transaksi_iuran_form', $data);
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
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
                'nomor_transaksi' => $this->input->post('nomor_transaksi', TRUE),
                'id_kartu' => $this->input->post('id_kartu', TRUE),
                'id_pedagang' => $this->input->post('id_pedagang', TRUE),
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
                'id_user' => $this->input->post('id_user', TRUE),
            );

            $this->Transaksi_iuran_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_iuran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Transaksi_iuran_model->get_by_id($id);
        $iduser = $_SESSION['id_user'];

        if ($row) {
            if ($row->status > 1) {
                $this->session->set_flashdata('message', 'Data Sudah Ter-Posting, Tidak Boleh Dihapus');
            } elseif ($iduser != $row->id_user) {
                $this->session->set_flashdata('message', 'Anda Tidak Diizinkan Menghapus Data ini');
            } else {
                $this->Transaksi_iuran_model->delete($id);
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
