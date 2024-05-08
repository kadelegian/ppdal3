<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('page_template/footer');
    }
    public function umum()
    { }

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


    public function excel($namaFile = "t_pedagang.xls", $judul = "t_pedagang")
    {
        $this->load->helper('exportexcel');


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
