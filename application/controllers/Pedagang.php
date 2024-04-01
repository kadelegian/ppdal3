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
        $row = $this->Pedagang_model->get_by_id($id);
        if ($row) {
            $tanggal = date_create_from_format('Y-m-d', $row->join_date);
            $tanggal = date_format($tanggal, 'd/m/Y');
            $data = array(
                'id' => $row->id,
                'nama_pedagang' => $row->nama_pedagang,
                'alamat_pedagang' => $row->alamat_pedagang,
                'no_hp' => $row->no_hp,
                'join_date' => $row->join_date,
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('pedagang/t_pedagang_read', $data);
            $this->load->view('page_template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pedagang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pedagang/create_action'),
            'id' => set_value('id'),
            'nama_pedagang' => set_value('nama_pedagang'),
            'alamat_pedagang' => set_value('alamat_pedagang'),
            'no_hp' => set_value('no_hp'),
            'join_date' => set_value('join_date'),
            'charge_pedagang' => 0,
            'diskon_pedagang' => 0,
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
            $join_date =  $this->input->post('join_date', true);
            $diskon_pedagang = preg_replace('/\D/', '', $this->input->post('diskon_pedagang', true));
            $charge_pedagang = preg_replace('/\D/', '', $this->input->post('charge_pedagang', true));
            $tanggal = date_create_from_format('d/m/Y', $join_date);
            $formatted_date = date_format($tanggal, 'Y-m-d');
            $data = array(
                'nama_pedagang' => $this->input->post('nama_pedagang', TRUE),
                'alamat_pedagang' => $this->input->post('alamat_pedagang', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'join_date' => $formatted_date,
                'charge_pedagang' => $charge_pedagang,
                'diskon_pedagang' => $diskon_pedagang,
            );

            $this->Pedagang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pedagang'));
        }
    }
    function unpair_kartu()
    {
        $id_kartu = $this->input->get('id');
        if (is_numeric($id_kartu)) {
            $this->load->model('Kartu_model');
            $data_kartu = $this->Kartu_model->get_by_id($id_kartu);

            $data = ['id_pedagang' => 0,];
            $this->Kartu_model->update($id_kartu, $data);
            redirect(base_url('pedagang/update') . '/' . $data_kartu->id_pedagang);
        }
    }
    public function update($id)
    {
        $row = $this->Pedagang_model->get_by_id($id);

        if ($row) {

            $dataKartu = $this->Pedagang_model->get_kartu($id);
            $data = array(
                'button' => 'Update',
                'action' => site_url('pedagang/update_action'),
                'id' => set_value('id', $row->id),
                'nama_pedagang' => set_value('nama_pedagang', $row->nama_pedagang),
                'alamat_pedagang' => set_value('alamat_pedagang', $row->alamat_pedagang),
                'no_hp' => set_value('no_hp', $row->no_hp),
                'join_date' => set_value('join_date', $row->join_date),
                'kartu_data' => $dataKartu,
                'charge_pedagang' => $row->charge_pedagang,
                'diskon_pedagang' => $row->diskon_pedagang,
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

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $diskon_pedagang = (int) preg_replace('/\D/', '', $this->input->post('diskon_pedagang', true));
            $charge_pedagang = (int) preg_replace('/\D/', '', $this->input->post('charge_pedagang', true));
            $tgl = date_create_from_format('d/m/Y', $this->input->post('join_date', true));
            $formatted_date = date_format($tgl, 'Y-m-d');
            $data = array(

                'nama_pedagang' => $this->input->post('nama_pedagang', TRUE),
                'alamat_pedagang' => $this->input->post('alamat_pedagang', TRUE),
                'no_hp' => $this->input->post('no_hp', TRUE),
                'join_date' => $formatted_date,
                'charge_pedagang' => $charge_pedagang,
                'diskon_pedagang' => $diskon_pedagang,
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
    public function add_kartu()
    {
        $id_pedagang = $this->input->post('id_pedagang', TRUE);

        $q = $this->input->post('nomorKartu', true);
        $this->load->model('Kartu_model');
        $row = $this->Kartu_model->get_by_nomor($q);
        if ($row != null) {
            if ($row->id_pedagang == 0) {

                $data = array(
                    'id_pedagang' => $id_pedagang,
                );
                $this->Kartu_model->update($row->id, $data);
            }
        }

        redirect(base_url('pedagang/update/' . $id_pedagang));
    }
    public function _rules()
    {

        $this->form_validation->set_rules('nama_pedagang', 'nama pedagang', 'trim|required');
        $this->form_validation->set_rules('alamat_pedagang', 'alamat pedagang', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
        $this->form_validation->set_rules('join_date', 'join date', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_pedagang.xls";
        $judul = "t_pedagang";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pedagang");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pedagang");
        xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
        xlsWriteLabel($tablehead, $kolomhead++, "Join Date");

        foreach ($this->Pedagang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_pedagang);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat_pedagang);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
            xlsWriteLabel($tablebody, $kolombody++, $data->join_date);

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
