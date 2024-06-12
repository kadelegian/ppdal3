<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Diskon extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Diskon_model');
            $this->load->library('form_validation');
            if ($_SESSION['role'] > 0) {
                $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
                redirect(base_url());
            }
        } else {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'diskon/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'diskon/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'diskon/';
            $config['first_url'] = base_url() . 'diskon/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Diskon_model->total_rows($q);
        $diskon = $this->Diskon_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'diskon_data' => $diskon,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('diskon/t_diskon_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $row = $this->Diskon_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'keterangan_diskon' => $row->keterangan_diskon,
                'nominal_diskon' => $row->nominal_diskon,
            );
            $this->load->view('diskon/t_diskon_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('diskon/create_action'),
            'id' => set_value('id'),
            'keterangan_diskon' => set_value('keterangan_diskon'),
            'nominal_diskon' => set_value('nominal_diskon'),
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('diskon/t_diskon_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nominal = preg_replace('/\D/', '', $this->input->post('nominal_diskon', true));

            $data = array(
                'keterangan_diskon' => $this->input->post('keterangan_diskon', TRUE),
                'nominal_diskon' => $nominal,
            );

            $this->Diskon_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('diskon'));
        }
    }

    public function update($id)
    {
        $row = $this->Diskon_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('diskon/update_action'),
                'id' => set_value('id', $row->id),
                'keterangan_diskon' => set_value('keterangan_diskon', $row->keterangan_diskon),
                'nominal_diskon' => set_value('nominal_diskon', $row->nominal_diskon),
            );
            $this->load->view('diskon/t_diskon_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $nominal = preg_replace('/\D/', '', $this->input->post('nominal_diskon', true));
            $data = array(
                'keterangan_diskon' => $this->input->post('keterangan_diskon', TRUE),
                'nominal_diskon' => $nominal
            );

            $this->Diskon_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('diskon'));
        }
    }

    public function delete($id)
    {
        $row = $this->Diskon_model->get_by_id($id);

        if ($row) {
            $this->Diskon_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('diskon'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('diskon'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('keterangan_diskon', 'keterangan diskon', 'trim|required');
        $this->form_validation->set_rules('nominal_diskon', 'nominal diskon', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Diskon.php */
/* Location: ./application/controllers/Diskon.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:38:51 */
/* http://harviacode.com */
