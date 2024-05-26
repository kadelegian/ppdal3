<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_lembaga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {

            $this->load->library('form_validation');
        } else {
            redirect(base_url('auth'));
        }
    }



    public function index()
    {
        $row = $this->db->get('info_lembaga')->row();
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('info_lembaga/simpan'),
                'id' => $row->id,
                'nama_lembaga' => $row->nama_lembaga,
                'alamat' => $row->alamat,
                'kecamatan' => $row->kecamatan,
                'kabupaten' => $row->kabupaten,
                'telp' => $row->telp,
                'ketua' => $row->ketua,
                'bendahara' => $row->bendahara,
                'bendesa' => $row->bendesa,
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('info_lembaga/form', $data);
            $this->load->view('page_template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url());
        }
    }


    public function simpan()
    {
        $id = $this->input->post('id', true);
        $data = array(
            'id' => $id,
            'nama_lembaga' => $this->input->post('nama_lembaga', true),
            'alamat' => $this->input->post('alamat', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kabupaten' => $this->input->post('kabupaten', true),
            'telp' => $this->input->post('telp', true),
            'ketua' => $this->input->post('ketua', true),
            'bendahara' => $this->input->post('bendahara', true),
            'bendesa' => $this->input->post('bendesa', true),
        );

        $this->db->update('info_lembaga', $data);
        $this->session->set_flashdata('message', 'Berhasil Disimpan');
        redirect(site_url('info_lembaga'));
    }
}
