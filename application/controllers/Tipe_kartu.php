<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipe_kartu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Tipe_kartu_model');
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
            $config['base_url'] = base_url() . 'tipe_kartu/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tipe_kartu/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tipe_kartu/';
            $config['first_url'] = base_url() . 'tipe_kartu/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tipe_kartu_model->total_rows($q);
        $tipe_kartu = $this->Tipe_kartu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tipe_kartu_data' => $tipe_kartu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('tipe_kartu/t_tipe_kartu_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $row = $this->Tipe_kartu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tipe_kartu' => $row->tipe_kartu,
                'id_extra_charge' => $row->id_extra_charge,
                'id_diskon' => $row->id_diskon,
            );
            $this->load->view('tipe_kartu/t_tipe_kartu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kartu'));
        }
    }

    public function create()
    {
        $this->load->model('Extra_charge_model');
        $extra_charge = $this->Extra_charge_model->get_all();
        $this->load->model('Diskon_model');
        $diskon = $this->Diskon_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('tipe_kartu/create_action'),
            'id' => set_value('id'),
            'tipe_kartu' => set_value('tipe_kartu'),
            'id_extra_charge' => set_value('id_extra_charge'),
            'id_diskon' => set_value('id_diskon'),
            'extra_charge' => $extra_charge,
            'diskon' => $diskon,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('tipe_kartu/t_tipe_kartu_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tipe_kartu' => $this->input->post('tipe_kartu', TRUE),
                'id_extra_charge' => $this->input->post('id_extra_charge', TRUE),
                'id_diskon' => $this->input->post('id_diskon', TRUE),
            );

            $this->Tipe_kartu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tipe_kartu'));
        }
    }

    public function update($id)
    {
        $row = $this->Tipe_kartu_model->get_by_id($id);

        if ($row) {
            $this->load->model('Extra_charge_model');
            $extra_charge = $this->Extra_charge_model->get_all();
            $this->load->model('Diskon_model');
            $diskon = $this->Diskon_model->get_all();
            $data = array(
                'button' => 'Update',
                'action' => site_url('tipe_kartu/update_action'),
                'id' => set_value('id', $row->id),
                'tipe_kartu' => set_value('tipe_kartu', $row->tipe_kartu),
                'id_extra_charge' => set_value('id_extra_charge', $row->id_extra_charge),
                'id_diskon' => set_value('id_diskon', $row->id_diskon),
                'extra_charge' => $extra_charge,
                'diskon' => $diskon,
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('tipe_kartu/t_tipe_kartu_form', $data);
            $this->load->view('page_template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kartu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tipe_kartu' => $this->input->post('tipe_kartu', TRUE),
                'id_extra_charge' => $this->input->post('id_extra_charge', TRUE),
                'id_diskon' => $this->input->post('id_diskon', TRUE),
            );

            $this->Tipe_kartu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tipe_kartu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tipe_kartu_model->get_by_id($id);

        if ($row) {
            $this->Tipe_kartu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tipe_kartu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kartu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tipe_kartu', 'tipe kartu', 'trim|required');
        $this->form_validation->set_rules('id_extra_charge', 'id extra charge', 'trim|required');
        $this->form_validation->set_rules('id_diskon', 'id diskon', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Tipe_kartu.php */
/* Location: ./application/controllers/Tipe_kartu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:36:46 */
/* http://harviacode.com */
