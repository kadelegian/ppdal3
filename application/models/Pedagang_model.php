<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedagang_model extends CI_Model
{

    public $table = 't_pedagang';
    public $id = 'id';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }
    function _nomor_kartu($id, $prefix_wilayah, $prefix_dagangan)
    {
        $card = str_pad($id, 4, '0', STR_PAD_LEFT) . '/'  . $prefix_wilayah . '/' . $prefix_dagangan . '/' . date_format(date_create(), 'Y');
        $this->nomor_kartu = $card;
        return $card;
    }

    // get all
    function get_all()
    {
        $this->db->select('t_pedagang.*,t_extra_charge.keterangan_charge,t_extra_charge.extra_charge,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan');
        $this->db->from($this->table);
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->order_by('t_pedagang.id_wilayah', 'asc');
        $this->db->order_by('t_pedagang.id', 'asc');

        return $this->db->get()->result();
    }
    function get_iuran()
    {
        $this->db->select('iuran');
        $this->db->from('setting_iuran_asongan');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    function simpan_iuran($data)
    {
        $this->db->insert('setting_iuran_asongan', $data);
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->select('t_pedagang.*,
        t_jenis_dagangan.nama_dagangan,t_jenis_dagangan.prefix_dagangan,t_jenis_dagangan.iuran,
        t_wilayah.prefix_wilayah,t_wilayah.wilayah,
        t_extra_charge.*');
        $this->db->from('t_pedagang');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->where('t_pedagang.id', $id);
        $r = $this->db->get()->row();
        $this->_nomor_kartu($r->id, $r->prefix_wilayah, $r->prefix_dagangan);
        return $r;
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->select('t_pedagang.id');
        $this->db->from($this->table);
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->or_like('t_pedagang.nama_pedagang', $q);
        $this->db->or_like('t_extra_charge.keterangan_charge', $q);
        $this->db->or_like('t_pedagang.nomor', $q);
        $this->db->or_like('t_jenis_dagangan.nama_dagangan', $q);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {

        $this->db->select('t_pedagang.*,t_extra_charge.keterangan_charge,t_extra_charge.extra_charge,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan');
        $this->db->from($this->table);
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->order_by('t_pedagang.id_wilayah', 'asc');
        $this->db->order_by('t_pedagang.id', 'asc');

        $this->db->like('t_pedagang.nama_pedagang', $q);
        $this->db->or_like('t_extra_charge.keterangan_charge', $q);
        $this->db->or_like('t_pedagang.nomor', $q);
        $this->db->or_like('t_jenis_dagangan.nama_dagangan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id_baru = $this->db->insert_id();
        $this->load->model('Wilayah_model');
        $this->load->model('Jenis_dagangan_model');
        $jenis = $this->Jenis_dagangan_model->get_by_id($data['id_jenis_dagangan']);

        $r = $this->Wilayah_model->get_by_id($data['id_wilayah']);

        $this->_nomor_kartu($id_baru, $r->prefix_wilayah, $jenis->prefix_dagangan);
        $this->db->where($this->id, $id_baru);
        $this->db->update($this->table, array('nomor' => $this->nomor_kartu));
    }

    // update data
    function update($id, $data)
    {
        $this->load->model('Wilayah_model');
        $this->load->model('Jenis_dagangan_model');
        $jenis = $this->Jenis_dagangan_model->get_by_id($data['id_jenis_dagangan']);

        $r = $this->Wilayah_model->get_by_id($data['id_wilayah']);

        $this->_nomor_kartu($id, $r->prefix_wilayah, $jenis->prefix_dagangan);

        $data['nomor'] = $this->nomor_kartu;
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Pedagang_model.php */
/* Location: ./application/models/Pedagang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:37:11 */
/* http://harviacode.com */
