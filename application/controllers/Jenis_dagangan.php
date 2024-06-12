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
            $this->Jenis_dagangan_model->tipe = 0;
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

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_dagangan_model->total_rows($q);
        $jenis_dagangan = $this->Jenis_dagangan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_dagangan_data' => $jenis_dagangan,
            'btn_create' => 'jenis_dagangan/create',
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'tipe' => 0,
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
            );
            $this->load->view('jenis_dagangan/t_jenis_dagangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dagangan'));
        }
    }
    //-----------------------------------------------------------------------setting iuran-----------------------------------
    public function delete_setting_iuran()
    {
        if ($_SESSION['role'] > 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $periode = $this->input->get('p', true);
            $this->Jenis_dagangan_model->delete_setting_iuran($periode);
            redirect(base_url('jenis_dagangan/setting_iuran'));
        }
    }
    public function setting_iuran()
    {
        $periode = $this->input->post('periode');
        if (is_null($periode)) {
            $data_setting = $this->Jenis_dagangan_model->get_all_setting();
        } else {

            $data_setting = $this->Jenis_dagangan_model->get_setting($periode);
        }

        $data = array(
            'setting' => $data_setting,
            'list_periode' => $this->Jenis_dagangan_model->get_list_periode(),
        );
        $js['js_script'] = array('jquery-ui.min.js', 'jquery.maskedinput.min.js', 'MonthPicker.min.js', 'month_format.js');
        $css['external_css'] = array('jquery-ui.css', 'MonthPicker.min.css');
        $this->load->view('page_template/header', $css);
        $this->load->view('page_template/side_bar');
        $this->load->view('page_template/top_bar');
        $this->load->view('jenis_dagangan/setting_iuran_list', $data);
        $this->load->view('page_template/footer', $js);
    }
    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    public function setting_create()
    {
        if ($_SESSION['role'] > 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {

            $periode = $this->input->post('periode', true);

            if ($this->validateDate($periode)) {
                //valid periode
                $data_jenis = $this->Jenis_dagangan_model->get_periode_setting($periode);
                $data = array(
                    'button' => 'Simpan',
                    'action' => base_url('jenis_dagangan/setting_save'),
                    'data_jenis' => $data_jenis,
                    'periode' => $periode,
                );

                $this->load->view('page_template/header');
                $this->load->view('page_template/side_bar');
                $this->load->view('page_template/top_bar');
                $this->load->view('jenis_dagangan/setting_iuran_form', $data);
                $this->load->view('page_template/footer');
            } else {
                $this->session->set_flashdata('message', 'Invalid date');
                redirect(base_url('jenis_dagangan/setting_iuran'));
            }
        }
    }
    public function setting_save()
    {
        if ($_SESSION['role'] > 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $periode = $this->input->post('periode');
            $data = [];
            foreach ($_POST as $key => $value) {
                if (is_numeric($key)) {
                    $temp = array(
                        'id_jenis_dagangan' => $key,
                        'periode' => $periode,
                        'iuran' => preg_replace('/\D/', '', $value)
                    );
                    array_push($data, $temp);
                }
            }

            $this->Jenis_dagangan_model->save_iuran($data);
            redirect(base_url('jenis_dagangan/setting_iuran'));
        }
    }
    public function setting_update()
    {
        if ($_SESSION['role'] > 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $data = [];
            foreach ($_POST as $key => $value) {
                if (is_numeric($key)) {
                    $temp = array(
                        'id' => $key,
                        'iuran' => preg_replace('/\D/', '', $value)
                    );
                    array_push($data, $temp);
                }
            }

            $this->Jenis_dagangan_model->update_iuran($data);
            redirect(base_url('jenis_dagangan/setting_iuran'));
        }
    }
    public function update_iuran()
    {
        if ($_SESSION['role'] > 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $periode = $this->uri->segment(3);
            $pecahan = explode('-', $periode);
            $tahun = $pecahan[0];
            $bulan = $pecahan[1];
            if (is_numeric($tahun) && is_numeric($bulan)) {
                $setting_iuran = $this->Jenis_dagangan_model->get_periode_setting($periode);
                $data = array(
                    'button' => 'Update',
                    'action' => base_url('jenis_dagangan/setting_update'),
                    'data_jenis' => $setting_iuran,
                    'periode' => $tahun . '-' . $bulan . '-1',
                );

                $this->load->view('page_template/header');
                $this->load->view('page_template/side_bar');
                $this->load->view('page_template/top_bar');
                $this->load->view('jenis_dagangan/setting_iuran_form', $data);
                $this->load->view('page_template/footer');
            }
        }
    }
    //------------------------------------------------------------------------------------------akhir region setting iuran------------------------------------------------
    public function create()
    {
        if ($_SESSION['role'] > 1) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $data = array(
                'button' => 'Create',
                'action' => site_url('jenis_dagangan/create_action'),
                'id' => set_value('id'),
                'nama_dagangan' => set_value('nama_dagangan'),
                'prefix_dagangan' => set_value('prefix_dagangan'),
                'tipe' => set_value('tipe'),
            );
            $this->load->view('page_template/header');
            $this->load->view('page_template/side_bar');
            $this->load->view('page_template/top_bar');
            $this->load->view('jenis_dagangan/t_jenis_dagangan_form', $data);
            $this->load->view('page_template/footer');
        }
    }

    public function create_action()
    {
        if ($_SESSION['role'] > 1) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {

                $data = array(
                    'nama_dagangan' => strtoupper($this->input->post('nama_dagangan', TRUE)),
                    'prefix_dagangan' => strtoupper($this->input->post('prefix_dagangan', TRUE)),
                    'tipe' => $this->input->post('tipe')
                );

                $this->Jenis_dagangan_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('jenis_dagangan'));
            }
        }
    }

    public function update($id)
    {
        if ($_SESSION['role'] > 1) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $row = $this->Jenis_dagangan_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('jenis_dagangan/update_action'),
                    'id' => set_value('id', $row->id),
                    'nama_dagangan' => set_value('nama_dagangan', $row->nama_dagangan),
                    'prefix_dagangan' => set_value('prefix_dagangan', $row->prefix_dagangan),
                    'tipe' => set_value('tipe', $row->tipe),
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
    }

    public function update_action()
    {
        if ($_SESSION['role'] > 1) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {

                $data = array(
                    'nama_dagangan' => strtoupper($this->input->post('nama_dagangan', TRUE)),
                    'prefix_dagangan' => strtoupper($this->input->post('prefix_dagangan', TRUE)),
                    'tipe' => $this->input->post('tipe')
                );

                $this->Jenis_dagangan_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('jenis_dagangan'));
            }
        }
    }

    public function delete($id)
    {
        if ($_SESSION['role'] > 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Memiliki Akses');
            redirect(base_url());
        } else {
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
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_dagangan', 'nama dagangan', 'trim|required');
        $this->form_validation->set_rules('prefix_dagangan', 'prefix dagangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
    }
}

/* End of file Jenis_dagangan.php */
/* Location: ./application/controllers/Jenis_dagangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:38:14 */
/* http://harviacode.com */
