<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wilayah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Wilayah_model');
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
            $config['base_url'] = base_url() . 'wilayah/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wilayah/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wilayah/';
            $config['first_url'] = base_url() . 'wilayah/';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wilayah_model->total_rows($q);
        $this->Wilayah_model->order = 'asc';
        $wilayah = $this->Wilayah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wilayah_data' => $wilayah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('wilayah/t_wilayah_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $row = $this->Wilayah_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'wilayah' => $row->wilayah,
                'prefix_wilayah' => $row->prefix_wilayah,
                'nomor_wilayah' => $row->nomor_wilayah,
            );
            $this->load->view('wilayah/t_wilayah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('wilayah/create_action'),
            'id' => set_value('id'),
            'wilayah' => set_value('wilayah'),
            'prefix_wilayah' => set_value('prefix_wilayah'),
            'nomor_wilayah' => set_value('nomor_wilayah'),
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('wilayah/t_wilayah_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'wilayah' => $this->input->post('wilayah', TRUE),
                'prefix_wilayah' => $this->input->post('prefix_wilayah', TRUE),
                'nomor_wilayah' => $this->input->post('nomor_wilayah', TRUE),
            );

            $this->Wilayah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('wilayah'));
        }
    }

    public function update($id)
    {
        $row = $this->Wilayah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('wilayah/update_action'),
                'id' => set_value('id', $row->id),
                'wilayah' => set_value('wilayah', $row->wilayah),
                'prefix_wilayah' => set_value('prefix_wilayah', $row->prefix_wilayah),
                'nomor_wilayah' => set_value('nomor_wilayah', $row->nomor_wilayah),
            );
            $this->load->view('wilayah/t_wilayah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'wilayah' => $this->input->post('wilayah', TRUE),
                'prefix_wilayah' => $this->input->post('prefix_wilayah', TRUE),
                'nomor_wilayah' => $this->input->post('nomor_wilayah', TRUE),
            );

            $this->Wilayah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('wilayah'));
        }
    }

    public function delete($id)
    {
        $row = $this->Wilayah_model->get_by_id($id);

        if ($row) {
            $this->Wilayah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('wilayah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('wilayah', 'wilayah', 'trim|required');
        $this->form_validation->set_rules('prefix_wilayah', 'prefix wilayah', 'trim|required');
        $this->form_validation->set_rules('nomor_wilayah', 'nomor wilayah', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_wilayah.xls";
        $judul = "t_wilayah";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Wilayah");
        xlsWriteLabel($tablehead, $kolomhead++, "Prefix Wilayah");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Wilayah");

        foreach ($this->Wilayah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->wilayah);
            xlsWriteLabel($tablebody, $kolombody++, $data->prefix_wilayah);
            xlsWriteNumber($tablebody, $kolombody++, $data->nomor_wilayah);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Wilayah.php */
/* Location: ./application/controllers/Wilayah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:35:43 */
/* http://harviacode.com */
