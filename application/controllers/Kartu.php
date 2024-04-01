<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kartu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Kartu_model');
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
            $config['base_url'] = base_url() . 'kartu/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kartu/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kartu/';
            $config['first_url'] = base_url() . 'kartu/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kartu_model->total_rows($q);
        $kartu = $this->Kartu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kartu_data' => $kartu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('kartu/t_kartu_list', $data);
        $this->load->view('page_template/footer');
    }
    public function ajax_get()
    {
        $id_pedagang = $this->input->get('id_pedagang');
        if (is_numeric($this->input->get('nomor', true))) {
            $q = $this->input->get('nomor');
            $row = $this->Kartu_model->get_by_nomor($q);
            if ($row != null) {
                if ($row->id_pedagang == 0) {

                    $data = array(
                        'id_pedagang' => $id_pedagang,
                    );
                    $this->Kartu_model->update($row->id, $data);
                    //$this->load->model('Pedagang_model');
                    //$d['kartu_data'] = $this->Pedagang_model->get_kartu($id_pedagang);
                    //header('Content-Type: text/html');
                    //return $this->load->view('pedagang/tabel_kartu', $d);
                    return;
                } else {
                    http_response_code(500);
                    echo $row->id_pedagang;
                    return;
                }
            }
        }
    }
    public function read($id = 0)
    {
        $cek = $this->uri->segment(3, 0);
        $cek = html_escape($cek);
        if (is_numeric($cek)) {
            if ($cek > 0) {
                $this->load->model('Transaksi_iuran_model');
                $payment_history = $this->Transaksi_iuran_model->get_last_payment($id);
                $row = $this->Kartu_model->get_by_id($id);
                //cek apakah ada histori, jika tidak payment mulai dari tanggal join
                if ($payment_history->num_rows() > 0) {
                    $data_tgl = $payment_history->row();
                    $tgl = $data_tgl->periode;
                    $bulan = date('m', strtotime($tgl)) + 1;
                    $tahun = date('Y', strtotime($tgl));
                    if ($bulan == 12) {
                        $bulan = 1;
                        $tahun = $tahun + 1;
                    }
                    $tgl_jatuh_tempo = date_create_from_format('Y-m-d', $tahun . '-' . $bulan . '-1');
                } else {
                    $tgl_jatuh_tempo = date_create_from_format('Y-m-d', $row->join_date);
                }

                $tgl_jatuh_tempo = date_format($tgl_jatuh_tempo, 'Y-m-d');
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
                $user_role = 0;
                if (isset($_SESSION['id_user'])) {
                    $this->load->model('users_model');
                    $user_data = $this->users_model->get_by_id($_SESSION['id_user']);
                    $user_role = $user_data->role;
                    //hanya admin (2) yang boleh melakukan pembayaran
                }
                if ($row) {


                    $data = array(
                        'id' => $row->id,
                        'id_pedagang' => $row->id_pedagang,
                        'nama_pedagang' => $row->nama_pedagang,
                        'nama_pemilik' => $row->nama_pemilik,
                        'nomor_kartu' => $this->Kartu_model->nomor_kartu,
                        'alamat_kartu' => $row->alamat_kartu,
                        'nomor_telp' => $row->nomor_telp,
                        'tipe_kartu' => $row->tipe_kartu,
                        'join_date' => $row->join_date,
                        'wilayah' => $row->wilayah,
                        'jenis_dagangan' => $row->nama_dagangan,
                        'hash' => $row->hash,
                        'tanggal_jatuh_tempo' => $tgl_jatuh_tempo,
                        'histori_payment' => $payment_history->result(),
                        'iuran' => $row->iuran,
                        'extra_charge' => $row->extra_charge,
                        'min_month' => $selisih_bulan,
                        'diskon' => $row->nominal_diskon,
                        'charge_pedagang' => $row->charge_pedagang,
                        'diskon_pedagang' => $row->diskon_pedagang,
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
                    redirect(site_url('kartu'));
                }
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kartu'));
            }
        }
    }

    public function create()
    {
        $this->load->model('Diskon_model');
        $diskon = $this->Diskon_model->get_all();
        $this->load->model('Extra_charge_model');
        $extra_charge = $this->Extra_charge_model->get_all();
        $this->load->model('Wilayah_model');
        $wilayah = $this->Wilayah_model->get_all();
        $this->load->model('Jenis_dagangan_model');
        $jenis_dagangan = $this->Jenis_dagangan_model->get_all();
        $this->load->model('Tipe_kartu_model');
        $tipe_kartu = $this->Tipe_kartu_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('kartu/create_action'),
            'id' => set_value('id'),
            'id_pedagang' => 0,
            'nama_pemilik' => set_value('nama_pemilik'),
            'nomor_kartu' => set_value('nomor_kartu'),
            'alamat_kartu' => set_value('alamat_kartu'),
            'nomor_telp' => set_value('nomor_telp'),
            'id_tipe_kartu' => set_value('id_tipe_kartu'),
            'join_date' => set_value('join_date'),
            'id_wilayah' => set_value('id_wilayah'),
            'id_jenis_dagangan' => set_value('id_jenis_dagangan'),
            'hash' => set_value('hash'),
            'diskon' => $diskon,
            'extra_charge' => $extra_charge,
            'wilayah' => $wilayah,
            'jenis_dagangan' => $jenis_dagangan,
            'tipe_kartu' => $tipe_kartu,
        );
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('kartu/t_kartu_form', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $tanggal = $this->int_tanggal($this->input->post('join_date', true));
            $formatted_date = date('Y-m-d', $tanggal);

            $data = array(
                'id_pedagang' => $this->input->post('id_pedagang', TRUE),
                'nama_pemilik' => $this->input->post('nama_pemilik', TRUE),
                'nomor_kartu' => '',
                'alamat_kartu' => $this->input->post('alamat_kartu', TRUE),
                'nomor_telp' => $this->input->post('nomor_telp', TRUE),
                'id_tipe_kartu' => $this->input->post('id_tipe_kartu', TRUE),
                'join_date' => $formatted_date,
                'id_wilayah' => $this->input->post('id_wilayah', TRUE),
                'id_jenis_dagangan' => $this->input->post('id_jenis_dagangan', TRUE),
                'hash' => $this->input->post('hash', TRUE),
            );

            $this->Kartu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kartu'));
        }
    }

    public function update($id)
    {
        $row = $this->Kartu_model->get_by_id($id);

        if ($row) {
            $this->load->model('Diskon_model');
            $diskon = $this->Diskon_model->get_all();
            $this->load->model('Extra_charge_model');
            $extra_charge = $this->Extra_charge_model->get_all();
            $this->load->model('Wilayah_model');
            $wilayah = $this->Wilayah_model->get_all();
            $this->load->model('Jenis_dagangan_model');
            $jenis_dagangan = $this->Jenis_dagangan_model->get_all();
            $this->load->model('Tipe_kartu_model');
            $tipe_kartu = $this->Tipe_kartu_model->get_all();
            $data = array(
                'button' => 'Update',
                'action' => site_url('kartu/update_action'),
                'id' => set_value('id', $row->id),
                'id_pedagang' => set_value('id_pedagang', $row->id_pedagang),
                'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
                'nomor_kartu' => set_value('nomor_kartu', $row->nomor_kartu),
                'alamat_kartu' => set_value('alamat_kartu', $row->alamat_kartu),
                'nomor_telp' => set_value('nomor_telp', $row->nomor_telp),
                'id_tipe_kartu' => set_value('id_tipe_kartu', $row->id_tipe_kartu),
                'join_date' => set_value('join_date', $row->join_date),
                'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
                'id_jenis_dagangan' => set_value('id_jenis_dagangan', $row->id_jenis_dagangan),
                'hash' => set_value('hash', $row->hash),
                'diskon' => $diskon,
                'extra_charge' => $extra_charge,
                'wilayah' => $wilayah,
                'jenis_dagangan' => $jenis_dagangan,
                'tipe_kartu' => $tipe_kartu,
            );
            $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
            $css['external_css'] = array('jquery.datetimepicker.min.css');
            $this->load->view('page_template/header', $css);
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('kartu/t_kartu_form', $data);
            $this->load->view('page_template/footer', $js);
        } else {

            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kartu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $tanggal = $this->int_tanggal($this->input->post('join_date', true));
            $formatted_date = date('Y-m-d', $tanggal);
            $data = array(
                'id_pedagang' => $this->input->post('id_pedagang', TRUE),
                'nama_pemilik' => $this->input->post('nama_pemilik', TRUE),
                'nomor_kartu' => $this->input->post('nomor_kartu', TRUE),
                'alamat_kartu' => $this->input->post('alamat_kartu', TRUE),
                'nomor_telp' => $this->input->post('nomor_telp', TRUE),
                'id_tipe_kartu' => $this->input->post('id_tipe_kartu', TRUE),
                'join_date' => $formatted_date,
                'id_wilayah' => $this->input->post('id_wilayah', TRUE),
                'id_jenis_dagangan' => $this->input->post('id_jenis_dagangan', TRUE),
                'hash' => $this->input->post('hash', TRUE),
            );

            $this->Kartu_model->update($this->input->post('id', TRUE), $data);

            redirect(site_url('kartu'));
        }
    }
    public function pembayaran()
    {
        $awal = $this->input->post('tgl_awal');
        $akhir = $this->input->post('sampai_dengan');
        echo 'awal periode=' . $awal . ' akhir=' . $akhir;
    }
    public function delete($id)
    {
        $row = $this->Kartu_model->get_by_id($id);

        if ($row) {
            $this->Kartu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kartu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kartu'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
        $this->form_validation->set_rules('id_tipe_kartu', 'id tipe kartu', 'trim|required');
        $this->form_validation->set_rules('join_date', 'join date', 'trim|required');
        $this->form_validation->set_rules('id_wilayah', 'id wilayah', 'trim|required');
        $this->form_validation->set_rules('id_jenis_dagangan', 'id jenis dagangan', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    function int_tanggal($tanggal_join)
    {
        $tanggal_join = date_create_from_format('d/m/Y', $this->input->post('join_date', true));
        $tanggal_join = date_format($tanggal_join, 'Y-m-d');
        return strtotime($tanggal_join);
    }
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kartu.xls";
        $judul = "t_kartu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Pedagang");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pemilik");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Kartu");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Kartu");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Telp");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Tipe Kartu");
        xlsWriteLabel($tablehead, $kolomhead++, "Join Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Wilayah");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Dagangan");
        xlsWriteLabel($tablehead, $kolomhead++, "Hash");

        foreach ($this->Kartu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_pedagang);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pemilik);
            xlsWriteLabel($tablebody, $kolombody++, $data->nomor_kartu);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat_kartu);
            xlsWriteLabel($tablebody, $kolombody++, $data->nomor_telp);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_tipe_kartu);
            xlsWriteLabel($tablebody, $kolombody++, $data->join_date);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_wilayah);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_dagangan);
            xlsWriteLabel($tablebody, $kolombody++, $data->hash);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Kartu.php */
/* Location: ./application/controllers/Kartu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:37:35 */
/* http://harviacode.com */
