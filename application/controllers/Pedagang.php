<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedagang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (isset($_SESSION['id_user'])) {
            $this->load->model('Pedagang_model');
            $this->load->library('form_validation');
        } else {
            redirect(base_url('auth'));
        }
    }
    function setting_iuran()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $iuran = $this->input->post('iuran', true);
            $iuran = preg_replace('/\D/', '', $iuran);
            if (is_numeric($iuran)) {

                $data = array(
                    'iuran' => $iuran,
                    'tanggal' => date('Y-m-d'),
                    'user_id' => $_SESSION['id_user'],
                );
                $this->Pedagang_model->simpan_iuran($data);
            }
        }
        redirect(base_url('pedagang'));
    }
    //melihat dan mencetak kartu identitas
    function kartu_identitas()
    { }
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'pedagang/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pedagang/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pedagang/';
            $config['first_url'] = base_url() . 'pedagang/';
        }


        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pedagang_model->total_rows($q);
        $pedagang = $this->Pedagang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data_iuran = $this->Pedagang_model->get_iuran();

        $data = array(
            'pedagang_data' => $pedagang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,

        );


        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('pedagang/pedagang_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $cek = $this->uri->segment(3, 0);
        $cek = html_escape($cek);
        if (is_numeric($cek)) {
            if ($cek > 0) {
                $this->load->model('Transaksi_iuran_model');
                $payment_history = $this->Transaksi_iuran_model->get_last_payment($id);
                $row = $this->Pedagang_model->get_by_id($id);
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
                $info_iuran = $this->Pedagang_model->get_iuran();

                if ($row) {
                    $data = array(
                        'id' => $cek,
                        'nama_pedagang' => $row->nama_pedagang,
                        'nomor_kartu' => $row->nomor,
                        'nomor_telp' => $row->no_hp,
                        'join_date' => $row->join_date,
                        'wilayah' => $row->wilayah,
                        'jenis_dagangan' => $row->nama_dagangan,
                        'tanggal_jatuh_tempo' => $tgl_jatuh_tempo,
                        'histori_payment' => $payment_history->result(),
                        'iuran' => $info_iuran->iuran,
                        'extra_charge' => $row->extra_charge,
                        'min_month' => $selisih_bulan,
                        'user_role' => $user_role,

                    );
                    $js['js_script'] = array('jquery-ui.min.js', 'jquery.maskedinput.min.js', 'MonthPicker.min.js', 'month_format.js');
                    $css['external_css'] = array('jquery-ui.css', 'MonthPicker.min.css');


                    $this->load->view('page_template/header', $css);
                    $this->load->view('page_template/side_bar');
                    $this->load->view('page_template/top_bar');
                    $this->load->view('pedagang/t_pedagang_read', $data);
                    $this->load->view('page_template/footer', $js);
                } else {
                    $this->session->set_flashdata('message', 'Record Not Found');
                    redirect(site_url());
                }
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url());
            }
        }
    }

    public function create()
    {
        $this->load->model('Wilayah_model');
        $data_wilayah = $this->Wilayah_model->get_all();
        $this->load->model('Extra_charge_model');
        $data_penjamin = $this->Extra_charge_model->get_all();
        $this->load->model('Jenis_dagangan_model');
        $jenis_dagangan = $this->Jenis_dagangan_model->get_all(true);
        $data = array(
            'button' => 'Create',
            'action' => site_url('pedagang/create_action'),
            'id' => set_value('id'),
            'nama_pedagang' => set_value('nama_pedagang'),
            'no_hp' => set_value('no_hp'),
            'join_date' =>  set_value('join_date'),
            'id_jenis_dagangan' => set_value('id_jenis_dagangan'),
            'id_wilayah' => set_value('id_wilayah'),
            'id_extra_charge' => set_value('id_extra_charge'),
            'extra_charge' => $data_penjamin,
            'data_wilayah' => $data_wilayah,
            'jenis_dagangan' => $jenis_dagangan,
        );
        $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js');
        $css['external_css'] = array('jquery.datetimepicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('pedagang/t_pedagang_form', $data);
        $this->load->view('page_template/footer', $js);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $tgl = date_create_from_format('d/m/Y', $this->input->post('join_date', true));

            $formatted_date = date_format($tgl, 'Y-m-d');
            $data = array(
                'nama_pedagang' => strtoupper($this->input->post('nama_pedagang', TRUE)),
                'id_wilayah' => $this->input->post('id_wilayah', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'join_date' => $formatted_date,
                'id_jenis_dagangan' => $this->input->post('id_jenis_dagangan'),
                'id_extra_charge' => $this->input->post('id_extra_charge'),
            );

            $this->Pedagang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pedagang'));
        }
    }

    public function update($id)
    {
        $row = $this->Pedagang_model->get_by_id($id);
        $this->load->model('Wilayah_model');
        $data_wilayah = $this->Wilayah_model->get_all();
        $this->load->model('Extra_charge_model');
        $data_penjamin = $this->Extra_charge_model->get_all();
        $this->load->model('Jenis_dagangan_model');
        $jenis_dagangan = $this->Jenis_dagangan_model->get_all(true);
        if ($row) {
            $tgl_indo = date_format(date_create_from_format('Y-m-d', $row->join_date), 'd/m/Y');
            $data = array(
                'button' => 'Update',
                'action' => site_url('pedagang/update_action'),
                'id' => set_value('id', $row->id),
                'nama_pedagang' => set_value('nama_pedagang', $row->nama_pedagang),
                'no_hp' => set_value('no_hp', $row->no_hp),
                'join_date' =>  set_value('join_date', $tgl_indo),
                'id_jenis_dagangan' => set_value('id_jenis_dagangan', $row->id_jenis_dagangan),
                'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
                'id_extra_charge' => set_value('id_extra_charge', $row->id_extra_charge),
                'extra_charge' => $data_penjamin,
                'data_wilayah' => $data_wilayah,
                'jenis_dagangan' => $jenis_dagangan,
            );
            $js['js_script'] = array('jquery.datetimepicker.full.min.js', 'dtpicker_format.js', 'pedagang/ajax_kartu.js');
            $css['external_css'] = array('jquery.datetimepicker.min.css');
            $this->load->view('page_template/header', $css);
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('pedagang/t_pedagang_form', $data);
            $this->load->view('page_template/footer', $js);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pedagang'));
        }
    }

    function checkDateFormat($date)
    {
        if (preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $date)) {
            if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))

                return true;
            else
                $this->form_validation->set_message('checkDateFormat', 'Invalid {field}');
            return false;
        } else {
            $this->form_validation->set_message('checkDateFormat', 'Invalid {field}');
            return false;
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id'));
            //redirect(base_url('pedagang/update/' . $this->input->post('id')));
        } else {
            $tgl = date_create_from_format('d/m/Y', $this->input->post('join_date', true));

            $formatted_date = date_format($tgl, 'Y-m-d');
            $data = array(
                'nama_pedagang' => strtoupper($this->input->post('nama_pedagang', TRUE)),
                'id_wilayah' => $this->input->post('id_wilayah', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'join_date' => $formatted_date,
                'id_jenis_dagangan' => $this->input->post('id_jenis_dagangan'),
                'id_extra_charge' => $this->input->post('id_extra_charge'),
            );

            $this->Pedagang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pedagang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pedagang_model->get_by_id($id);

        if ($row) {
            $this->Pedagang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pedagang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pedagang'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('nama_pedagang', 'nama pedagang', 'trim|required');
        $this->form_validation->set_rules('join_date', 'Join Date', 'callback_checkDateFormat|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Daftar Pedagang Asongan.xls";
        $judul = "Pedagang Asongan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No-ID");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pedagang");
        xlsWriteLabel($tablehead, $kolomhead++, "No HP");
        xlsWriteLabel($tablehead, $kolomhead++, "Wilayah");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Dagangan");

        foreach ($this->Pedagang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nomor);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pedagang);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
            xlsWriteLabel($tablebody, $kolombody++, $data->wilayah);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_dagangan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Pedagang.php */
/* Location: ./application/controllers/Pedagang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:37:11 */
/* http://harviacode.com */
