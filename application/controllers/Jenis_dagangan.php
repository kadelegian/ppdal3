<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_dagangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Jenis_dagangan_model');
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
            $config['base_url'] = base_url() . 'jenis_dagangan/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_dagangan/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_dagangan/';
            $config['first_url'] = base_url() . 'jenis_dagangan/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_dagangan_model->total_rows($q);
        $jenis_dagangan = $this->Jenis_dagangan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_dagangan_data' => $jenis_dagangan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('jenis_dagangan/t_jenis_dagangan_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $row = $this->Jenis_dagangan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_dagangan' => $row->nama_dagangan,
                'prefix_dagangan' => $row->prefix_dagangan,
                'iuran' => $row->iuran,
            );
            $this->load->view('jenis_dagangan/t_jenis_dagangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dagangan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_dagangan/create_action'),
            'id' => set_value('id'),
            'nama_dagangan' => set_value('nama_dagangan'),
            'prefix_dagangan' => set_value('prefix_dagangan'),
            'iuran' => set_value('iuran'),
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('jenis_dagangan/t_jenis_dagangan_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nominal = preg_replace('/\D/', '', $this->input->post('iuran', true));
            $data = array(
                'nama_dagangan' => $this->input->post('nama_dagangan', TRUE),
                'prefix_dagangan' => $this->input->post('prefix_dagangan', TRUE),
                'iuran' => $nominal,
            );

            $this->Jenis_dagangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_dagangan'));
        }
    }

    public function update($id)
    {
        $row = $this->Jenis_dagangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_dagangan/update_action'),
                'id' => set_value('id', $row->id),
                'nama_dagangan' => set_value('nama_dagangan', $row->nama_dagangan),
                'prefix_dagangan' => set_value('prefix_dagangan', $row->prefix_dagangan),
                'iuran' => set_value('iuran', $row->iuran),
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('jenis_dagangan/t_jenis_dagangan_form', $data);
            $this->load->view('page_template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dagangan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $nominal = preg_replace('/\D/', '', $this->input->post('iuran', true));
            $data = array(
                'nama_dagangan' => $this->input->post('nama_dagangan', TRUE),
                'prefix_dagangan' => $this->input->post('prefix_dagangan', TRUE),
                'iuran' => $nominal,
            );

            $this->Jenis_dagangan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_dagangan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jenis_dagangan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_dagangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_dagangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dagangan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_dagangan', 'nama dagangan', 'trim|required');
        $this->form_validation->set_rules('prefix_dagangan', 'prefix dagangan', 'trim|required');
        $this->form_validation->set_rules('iuran', 'iuran', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jenis_dagangan.php */
/* Location: ./application/controllers/Jenis_dagangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:38:14 */
/* http://harviacode.com */
