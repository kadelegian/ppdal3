<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Extra_charge extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->load->model('Extra_charge_model');
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
            $config['base_url'] = base_url() . 'extra_charge/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'extra_charge/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'extra_charge/';
            $config['first_url'] = base_url() . 'extra_charge/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Extra_charge_model->total_rows($q);
        $extra_charge = $this->Extra_charge_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'extra_charge_data' => $extra_charge,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('extra_charge/t_extra_charge_list', $data);
        $this->load->view('page_template/footer');
    }

    public function read($id)
    {
        $row = $this->Extra_charge_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'keterangan_charge' => $row->keterangan_charge,
                'extra_charge' => $row->extra_charge,
            );
            $this->load->view('extra_charge/t_extra_charge_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('extra_charge'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('extra_charge/create_action'),
            'id' => set_value('id'),
            'keterangan_charge' => set_value('keterangan_charge'),
            'extra_charge' => set_value('extra_charge'),
        );
        $this->load->view('page_template/header');
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('extra_charge/t_extra_charge_form', $data);
        $this->load->view('page_template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $xcharge = $this->input->post('extra_charge', true);
            $isNegative = substr($xcharge, 0, 1) === '-';
            $nominal = preg_replace('/\D/', '', $xcharge);
            if ($isNegative) {

                $nominal *= -1;
            }

            $data = array(
                'keterangan_charge' => strtoupper($this->input->post('keterangan_charge', TRUE)),
                'extra_charge' => $nominal,
            );

            $this->Extra_charge_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('extra_charge'));
        }
    }

    public function update($id)
    {
        $row = $this->Extra_charge_model->get_by_id($id);

        if ($row) {

            $data = array(
                'button' => 'Update',
                'action' => site_url('extra_charge/update_action'),
                'id' => set_value('id', $row->id),
                'keterangan_charge' => set_value('keterangan_charge', $row->keterangan_charge),
                'extra_charge' => set_value('extra_charge', $row->extra_charge),
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('extra_charge/t_extra_charge_form', $data);
            $this->load->view('page_template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('extra_charge'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $xcharge = $this->input->post('extra_charge', true);
            $isNegative = substr($xcharge, 0, 1) === '-';
            $nominal = preg_replace('/\D/', '', $xcharge);
            if ($isNegative) {

                $nominal *= -1;
            }
            $data = array(
                'keterangan_charge' => strtoupper($this->input->post('keterangan_charge', TRUE)),
                'extra_charge' => $nominal,
            );

            $this->Extra_charge_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('extra_charge'));
        }
    }

    public function delete($id)
    {
        $row = $this->Extra_charge_model->get_by_id($id);

        if ($row) {
            $this->Extra_charge_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('extra_charge'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('extra_charge'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('keterangan_charge', 'keterangan charge', 'trim|required');
        $this->form_validation->set_rules('extra_charge', 'extra charge', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Extra_charge.php */
/* Location: ./application/controllers/Extra_charge.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:38:34 */
/* http://harviacode.com */
