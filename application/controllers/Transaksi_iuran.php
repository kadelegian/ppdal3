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

        $a = trim($this->input->get('awal_periode'));
        $b = trim($this->input->get('akhir_periode'));
        $total = 0;
        $start = intval($this->input->get('start'));
        if ($a <> '' && $b <> '') {

            $config['base_url'] = base_url() . 'transaksi_iuran/index?awal_periode=' . $a . '&akhir_periode=' . $b;
            $config['first_url'] = base_url() . 'transaksi_iuran/index?awal_periode=' . $a . '&akhir_periode=' . $b;
            $total_nominal = $this->Transaksi_iuran_model->get_nominal_transaksi($a, $b);
            $total = $total_nominal->debet;
        } else {
            $config['base_url'] = base_url() . 'transaksi_iuran';
            $config['first_url'] = base_url() . 'transaksi_iuran';
        }


        $config['per_page'] = 30;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_iuran_model->total_rows($a, $b);
        $transaksi_iuran = $this->Transaksi_iuran_model->get_limit_data($config['per_page'],  $a, $b, $start);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $js['js_script'] = array('jquery-ui.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery-ui.css');
        $data = array(
            'data_transaksi' => $transaksi_iuran,
            'pagination' => $this->pagination->create_links(),
            'awal_periode' => $a,
            'sampai_dengan' => $b,
            'total_nominal' => $total,
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('transaksi_iuran/transaksi_iuran_list', $data);
        $this->load->view('page_template/footer', $js);
    }


    public function read($id = 0)
    {
        if ($id > 0) {
            $data = $this->Transaksi_iuran_model->read_transaksi($id);
            if (!$data) {
                redirect(base_url());
            } else {

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
                $dompdf->stream($data['nama_pemilik'] . '_' . $data['jenis_dagangan'] . '.pdf');
                //$mpdf->WriteHTML($surat);
                //$mpdf->Output('nota.pdf', "D");
            }
        }
    }
    public function create()
    {

        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Pilih Akhir Periode Untuk Melanjutkan');
            $id_kartu = $this->input->post('id_kartu');
            redirect(base_url('kartu/read/' . $id_kartu));
        } else {
            $id_jenis = (int) $this->input->post('id_jenis_dagangan');
            $this->load->model('users_model');
            $user_data = $this->users_model->get_by_id($_SESSION['id_user']);
            if ($user_data->role < 2) { //harus admin

                $iuran = 0;
                $diskon = 0;
                $total_iuran = 0;
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
                $nama_pemilik = $this->input->post('nama_pemilik');
                $periode = $awal_periode;
                $print_periode = array();
                $detail_iuran = array();

                $list_iuran = $this->Transaksi_iuran_model->get_list_iuran($awal_periode, $akhir_periode, $id_jenis);

                foreach ($list_iuran as $data_iuran) {
                    $total_iuran = $total_iuran + $data_iuran['iuran'];
                    $detail_iuran[$i] = array('periode' => date_format(date_create_from_format('Y-m-d', $data_iuran['periode']), 'Y-m-d'), 'iuran' => $data_iuran['iuran']);
                    $i++;
                }

                $sampai_dengan = '';
                if ($i > 1) {
                    $sampai_dengan = ' - ' . date_format($akhir_periode, 'M, Y');
                }

                $keterangan_iuran = 'Iuran Periode ' . date_format($dari, 'M, Y') . $sampai_dengan;
                $print_periode['iuran'] = array(
                    'keterangan' => 'Iuran Periode ' . date_format($dari, 'M, Y') . $sampai_dengan,
                    'jumlah' => number_format($total_iuran, 0, ',', '.')
                );
                if ($total_diskon > 0) {

                    $print_periode['diskon'] = array(
                        'keterangan' => 'Diskon',
                        'kali' => $i,
                        'nominal' => number_format($diskon, 0, ',', '.'),
                        'jumlah' => number_format($total_diskon, 0, ',', '.')
                    );
                }

                $sub_total = $total_iuran - $total_diskon;
                $this->load->model('Akun_model');
                $data_akun = $this->Akun_model->get_bank_acc();
                $data = array(
                    'button' => 'Simpan',
                    'action' => site_url('transaksi_iuran/create_action'),
                    'id_transaksi' => set_value('id_transaksi'),
                    'nomor_transaksi' => set_value('nomor_transaksi'),
                    'id_kartu' => set_value('id_kartu'),
                    'nomor_kartu' => $nomor_kartu,
                    'nama_pemilik' => $nama_pemilik,
                    'jenis_dagangan' => $this->input->post('jenis_dagangan'),
                    'wilayah' => $this->input->post('wilayah'),
                    'tanggal_transaksi' => date('d/m/Y'),
                    'id_user' => $_SESSION['id_user'],
                    'detail_print' => $print_periode,
                    'keterangan_iuran' => $keterangan_iuran,
                    'iuran' => $iuran,
                    'diskon' => $diskon,
                    'total_iuran' => $total_iuran,
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
        $iuran = array();
        $this->load->model('Akun_model', 'akun_model');
        $akun_sistem = $this->akun_model->get_akun_sistem();

        if ($akun_sistem->num_rows() > 1) {
            $akun_iuran = $akun_sistem->first_row()->id;
        } else {

            $this->session->set_flashdata('message', 'Akun Sistem belum ter-setting');
            redirect(base_url('kartu'));
        }
        $periode =  $this->input->post('periode', true);
        $iuran = $this->input->post('iuran', true);
        $diskon = $this->input->post('diskon', true);
        $id_kartu = $this->input->post('id_kartu', TRUE);
        $total_pembayaran = $this->input->post('total_pembayaran', true);
        $keterangan_iuran = $this->input->post('keterangan_iuran', true);

        $id_akun = $this->input->post('akun', true);

        $nomor_kartu = $this->input->post('nomor_kartu', true);
        $nama_pemilik = $this->input->post('nama_pemilik', true);
        $tanggal_transaksi = date('Y-m-d h:i:s A');
        $data = array(
            'id_kartu' => $id_kartu,
            'tanggal_transaksi' => $tanggal_transaksi,
            'id_user' => $id_user,
            'ke_akun' => $id_akun,
            'total_bayar' => $total_pembayaran
        );
        $id = $this->Transaksi_iuran_model->insert($data);

        if ($id > 0) {
            $detail = array();
            $counter = 0;
            foreach ($periode as $p) {
                array_push($detail, array(
                    'periode' => $p,
                    'id_transaksi' => $id,
                    'iuran' => $iuran[$counter],
                    'diskon' => $diskon
                ));
                $counter++;
            }
            //input kas, cek akun untuk transaksi iuran


            $kas = array(
                array(
                    'tanggal' => $tanggal_transaksi,
                    'id_akun' => $id_akun,
                    'debet' => $total_pembayaran,
                    'kredit' => 0,
                    'keterangan' => $keterangan_iuran . ' '  . $nama_pemilik . ' - ' . $nomor_kartu,
                    'id_user' => $id_user,
                    'id_transaksi' => $id,

                ),
                array(
                    'tanggal' => $tanggal_transaksi,
                    'id_akun' => $akun_iuran,
                    'debet' => 0,
                    'kredit' => $total_pembayaran,
                    'keterangan' => $keterangan_iuran . ' '  . $nama_pemilik . ' - ' . $nomor_kartu,
                    'id_user' => $id_user,
                    'id_transaksi' => $id,

                )
            );
            $this->load->model('Jurnal_model');

            $this->Jurnal_model->insert_transaksi($kas);
            //input detail untuk commit db
            $row_affected = $this->Transaksi_iuran_model->detail($detail);

            if ($row_affected > 0) {
                redirect(base_url('transaksi_iuran/read/' . $id));
            } else {
                $this->session->set_flashdata('message', 'Terjadi Kesalahan Pada Detail Transaksi');
                $this->db->trans_rollback();
                redirect(base_url('transaksi_iuran'));
            }
        } else {
            $this->session->set_flashdata('message', 'Terjadi Kesalahan Pada Insert Transaksi');

            redirect(base_url('transaksi_iuran'));
        }
    }
    public function kalkulasi_update()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $this->form_validation->set_rules('catatan', 'Catatan Edit', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if (!$this->form_validation->run()) {

            $this->update($id_transaksi);
        } else {
            $catatan = $this->input->post('catatan');
            $periode_awal = $this->input->post('awal_periode', true);
            $periode_akhir = $this->input->post('sampai_dengan', true);

            $id_jenis_dagangan = $this->input->post('id_jenis_dagangan', true);
            $id_pedagang = $this->input->post('id_pedagang', true);


            $periode_awal = date_create_from_format('Y-m-d', $periode_awal);
            $periode_akhir = date_create_from_format('Y-m-d', $periode_akhir);


            $var1 = date_create_from_format('Y-m-d', $this->input->post('awal_periode'));
            $var2 = date_create_from_format('Y-m-d', $this->input->post('sampai_dengan'));
            $list_iuran = $this->Transaksi_iuran_model->get_list_iuran($var1, $var2, $id_jenis_dagangan);

            $print_periode = array();
            $detail_iuran = array();
            $i = 0;
            $total_iuran = 0;


            foreach ($list_iuran as $li) {
                $i++;
                $total_iuran = $total_iuran + $li['iuran'];
                $detail_iuran[$i] = array('periode' => date_format(date_create_from_format('Y-m-d', $li['periode']), 'Y-m-d'), 'iuran' => $li['iuran']);
            }
            $sampai_dengan = '';
            if ($i > 1) {
                $sampai_dengan = ' - ' . date_format($periode_akhir, 'M, Y');
            }
            $keterangan_iuran = 'Iuran Periode ' . date_format($periode_awal, 'M, Y') . $sampai_dengan;
            $print_periode['iuran'] = array(
                'keterangan' => 'Iuran Periode ' . date_format($periode_awal, 'M, Y') . $sampai_dengan,
                'kali' => $i,
                'jumlah' => number_format($total_iuran, 0, ',', '.')
            );

            $sub_total = $total_iuran;
            $this->load->model('Akun_model');
            $data_akun = $this->Akun_model->get_bank_acc();
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('transaksi_iuran/update_action'),
                'id_transaksi' => $id_transaksi,
                'id_pedagang' => $id_pedagang,
                'nomor_kartu' => $this->input->post('nomor_kartu'),
                'nama_pedagang' => $this->input->post('nama_pemilik'),
                'jenis_dagangan' => $this->input->post('jenis_dagangan'),
                'wilayah' => $this->input->post('wilayah'),
                'detail_print' => $print_periode,
                'keterangan_iuran' => $keterangan_iuran,
                'diskon' => 0,
                'total_iuran' => $total_iuran,
                'total_diskon' => 0,
                'total_pembayaran' => $sub_total,
                'detail_iuran' => $detail_iuran,
                'data_akun' => $data_akun,
                'catatan' => $catatan
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('transaksi_iuran/transaksi_iuran_form_update', $data);
            $this->load->view('page_template/footer');
        }
    }
    public function update($id)
    {
        if ($_SESSION['role'] == 0) {
            $data_transaksi = $this->Transaksi_iuran_model->get_detail_trans($id);
            $this->load->model('Kartu_model', 'kartu_model');
            $r = $data_transaksi->first_row();

            $id_pedagang = $r->id_kartu;
            //cek last payment harus sama id nya(hanya last payment yang bisa di update)
            $this->db->select('max(id_transaksi) as id_transaksi');
            $this->db->where('id_kartu', $id_pedagang);
            $result = $this->db->get('transaksi_iuran')->row();

            if ($result->id_transaksi == $id) {
                $periode_awal = $r->periode;

                $data_pedagang = $this->kartu_model->get_by_id($id_pedagang);
                $r = $data_transaksi->last_row();
                $periode_akhir = $r->periode;
                if ($data_transaksi) {
                    $data = array(
                        'button' => 'Kalkulasi',
                        'action' => site_url('transaksi_iuran/kalkulasi_update'),
                        'id_transaksi' => $id,
                        'data_pedagang' => $data_pedagang,
                        'periode_awal' => $periode_awal,
                        'periode_akhir' => $periode_akhir,
                        'min_month' => $this->_get_selisih_bulan($periode_awal)
                    );
                    $js['js_script'] = array('jquery-ui.min.js', 'jquery.maskedinput.min.js', 'MonthPicker.min.js', 'month_format.js');
                    $css['external_css'] = array('jquery-ui.css', 'MonthPicker.min.css');

                    $this->load->view('page_template/header', $css);
                    $this->load->view('page_template/side_bar');
                    $this->load->view('page_template/top_bar');
                    $this->load->view('transaksi_iuran/transaksi_iuran_update', $data);
                    $this->load->view('page_template/footer', $js);
                } else {
                    $this->session->set_flashdata('message', 'Record Not Found');
                    redirect(site_url('transaksi_iuran_pedagang'));
                }
            } else {
                $this->session->set_flashdata('message', 'Hanya transaksi terbaru yang boleh di-edit');
                redirect(site_url('transaksi_iuran_pedagang'));
            }
        } else {
            $this->session->set_flashdata('message', 'Anda Tidak Meiliki Akses');
            redirect(base_url('transaksi_iuran_pedagang'));
        }
    }

    public function update_action()
    {
        $id_user = $_SESSION['id_user'];
        $this->load->model('Users_model', 'users_model');
        $user = $this->users_model->get_by_id($id_user);

        $id_transaksi = $this->input->post('id_transaksi');

        $periode = array();
        $periode =  $this->input->post('periode', true);
        $iuran = $this->input->post('iuran', true);

        $keterangan_iuran = $this->input->post('keterangan_iuran', true);

        $nomor_kartu = $this->input->post('nomor_kartu', true);
        $nama_pedagang = $this->input->post('nama_pemilik', true);

        $total_pembayaran = $this->input->post('total_pembayaran');
        $id_akun = $this->input->post('akun', true);

        $data = array(
            'id_transaksi' => $id_transaksi,
            'id_user' => $id_user,
            'ke_akun' => $id_akun,
            'total_bayar' => $total_pembayaran,
            'edit' => 'Edit by.' . $user->full_name . '. ' . $this->input->post('catatan', true)
        );

        $this->Transaksi_iuran_model->update($id_transaksi, $data);

        $total_pembayaran = 0;

        $detail = array();
        $i = 0;
        foreach ($periode as $p) {

            $total_pembayaran = $total_pembayaran + $iuran[$i];
            array_push($detail, array(
                'periode' => $p,
                'id_transaksi' => $id_transaksi,
                'iuran' => $iuran[$i],
                'charge' => 0,
            ));
            $i++;
        }
        //input kas
        $this->load->model('Jurnal_model');
        $data_jurnal_trans = $this->Jurnal_model->get_trans_iuran_by_id_trans($id_transaksi);
        $this->load->model('Akun_model', 'akun_model');
        $akun_sistem = $this->akun_model->get_akun_sistem();
        if ($akun_sistem->num_rows() > 1) {
            $akun_iuran = $akun_sistem->first_row()->id;
        } else {
            $this->db->trans_rollback();
            $this->session->set_flashdata('message', 'Akun Sistem belum ter-setting');
            redirect(base_url('akun'));
        }
        $kas = array(
            array(
                'id' => $data_jurnal_trans->first_row()->id,
                'id_akun' => $id_akun,
                'debet' => $total_pembayaran,
                'kredit' => 0,
                'keterangan' => $keterangan_iuran . ' '  . $nama_pedagang . ' - ' . $nomor_kartu,

            ),
            array(
                'id' => $data_jurnal_trans->last_row()->id,
                'id_akun' => $akun_iuran,
                'debet' => 0,
                'kredit' => $total_pembayaran,
                'keterangan' => $keterangan_iuran . ' '  . $nama_pedagang . ' - ' . $nomor_kartu,

            )
        );

        $this->Jurnal_model->update($kas);

        //input detail untuk commit db
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('detail_transaksi_iuran');
        $row_affected = $this->Transaksi_iuran_model->detail($detail);
        if ($row_affected > 0) {
            // $this->load->model('Akun_model');
            // $data_akun = $this->Akun_model->get_by_id($id_akun);
            //$this->session->set_flashdata('message', 'Transaksi Berhasil Disimpan Ke ' . strtoupper($data_akun->alias) . ' Sejumlah ' . number_format($total_pembayaran, 0, ',', '.'));
            redirect(base_url('transaksi_iuran/read/' . $id_transaksi));
        } else {
            $this->session->set_flashdata('message', 'Terjadi Kesalahan Pada Detail Transaksi');
            error_log('gagal insert detail transaksi', 0);
            redirect(base_url('transaksi_iuran'));
        }
    }

    public function delete($id)
    {

        $row = $this->Transaksi_iuran_model->get_by_id($id);

        $posisi = $this->Transaksi_iuran_model->get_posisi_transaksi($row->ke_akun);

        if ($row) {
            $tanggal_trx = date($row->tanggal_transaksi);
            $tanggal_posisi = date($posisi->periode);
            if ($tanggal_trx < $tanggal_posisi) {
                $this->session->set_flashdata('message', 'Data Sudah Ter-Posting, Tidak Boleh Dihapus');
            } else {
                $this->session->set_flashdata('message', 'tgl_trx:' . $tanggal_trx->format('d/m/Y') . ' | tgl posisi: ' . $tanggal_posisi->format('d/m/Y'));
                $this->Transaksi_iuran_model->delete($id);
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
        }
        redirect(site_url('transaksi_iuran'));
    }

    function _get_selisih_bulan($tanggal_awal)
    {
        $tgl_awal = date_create_from_format('Y-m-d', $tanggal_awal);
        $tgl_jatuh_tempo = date_format($tgl_awal, 'Y-m-d');
        $tahun_sekarang = (int) date('Y');
        $bulan_sekarang = (int) date('m');
        $tahun_jt = (int) date_format(date_create_from_format('Y-m-d', $tgl_jatuh_tempo), 'Y');
        $bulan_jt = (int) date_format(date_create_from_format('Y-m-d', $tgl_jatuh_tempo), 'm');

        if ($tgl_jatuh_tempo > date('Y-m-d')) {
            $selisih_tahun = $tahun_jt - $tahun_sekarang;
            $selisih_bulan = (($selisih_tahun * 12) + $bulan_jt) - $bulan_sekarang;
        } else {
            $selisih_tahun =  $tahun_sekarang - $tahun_jt;
            $selisih = ($selisih_tahun * 12) + $bulan_sekarang;
            $selisih = $selisih - $bulan_jt;
            $selisih_bulan = $selisih * -1;
        }
        return $selisih_bulan;
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
