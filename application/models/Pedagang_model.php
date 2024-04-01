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

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('nama_pedagang', $q);
        $this->db->or_like('alamat_pedagang', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->or_like('join_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {

        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nama_pedagang', $q);
        $this->db->or_like('alamat_pedagang', $q);
        $this->db->or_like('no_hp', $q);
        $this->db->or_like('join_date', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function get_kartu($idPedagang)
    {
        $select = 't_kartu.id, t_kartu.nomor_kartu,t_tipe_kartu.tipe_kartu, t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan';
        $this->db->select($select);
        $this->db->from('t_kartu');
        $this->db->join('t_tipe_kartu', 't_kartu.id_tipe_kartu=t_tipe_kartu.id', 'left');
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->where('id_pedagang', $idPedagang);
        return $this->db->get()->result();
    }
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
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