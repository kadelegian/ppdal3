<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kartu_model extends CI_Model
{

    public $table = 't_kartu';
    public $id = 'id';
    public $order = 'DESC';
    public $nomor_kartu = '';

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
        $this->db->select('t_kartu.*,t_pedagang.id as id_pedagang,t_pedagang.nama_pedagang,
        t_pedagang.diskon_pedagang,t_pedagang.charge_pedagang,t_tipe_kartu.tipe_kartu,
        t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan,t_jenis_dagangan.iuran,t_extra_charge.extra_charge,
        t_diskon.nominal_diskon,t_wilayah.prefix_wilayah');
        $this->db->from('t_kartu');
        $this->db->join('t_pedagang', 't_kartu.id_pedagang=t_pedagang.id', 'left');
        $this->db->join('t_tipe_kartu', 't_kartu.id_tipe_kartu=t_tipe_kartu.id', 'left');
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->join('t_extra_charge', 't_tipe_kartu.id_extra_charge=t_extra_charge.id');
        $this->db->join('t_diskon', 't_tipe_kartu.id_diskon=t_diskon.id');

        $this->db->where('t_kartu.id', $id);
        $r = $this->db->get()->row();
        $this->nomor_kartu = str_pad($r->nomor_kartu, 4, '0', STR_PAD_LEFT) . '/' . str_pad($r->id_tipe_kartu, 2, '0', STR_PAD_LEFT) . '/' . $r->prefix_wilayah . '/' . date_format(date_create($r->join_date), 'Y');
        return $r;
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('id_pedagang', $q);
        $this->db->or_like('nama_pemilik', $q);
        $this->db->or_like('nomor_kartu', $q);
        $this->db->or_like('alamat_kartu', $q);
        $this->db->or_like('nomor_telp', $q);
        $this->db->or_like('id_tipe_kartu', $q);
        $this->db->or_like('join_date', $q);
        $this->db->or_like('id_wilayah', $q);
        $this->db->or_like('id_jenis_dagangan', $q);
        $this->db->or_like('hash', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function get_by_nomor($nomor)
    {
        $this->db->where('nomor_kartu', $nomor);
        return $this->db->get($this->table)->row();
    }
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->select('t_kartu.id,t_kartu.id_pedagang,t_pedagang.nama_pedagang,t_kartu.nama_pemilik,t_kartu.nomor_kartu,
        t_tipe_kartu.tipe_kartu,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan,t_kartu.join_date');
        $this->db->from('t_kartu');
        $this->db->join('t_pedagang', 't_kartu.id_pedagang=t_pedagang.id', 'left');
        $this->db->join('t_tipe_kartu', 't_kartu.id_tipe_kartu=t_tipe_kartu.id', 'left');
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->like('t_kartu.id', $q);
        $this->db->or_like('t_kartu.id_pedagang', $q);
        $this->db->or_like('t_kartu.nama_pemilik', $q);
        $this->db->or_like('t_kartu.nomor_kartu', $q);
        $this->db->or_like('t_kartu.alamat_kartu', $q);
        $this->db->or_like('t_kartu.nomor_telp', $q);
        $this->db->or_like('t_kartu.id_tipe_kartu', $q);
        $this->db->or_like('t_kartu.join_date', $q);
        $this->db->or_like('t_kartu.id_wilayah', $q);
        $this->db->or_like('t_kartu.id_jenis_dagangan', $q);
        $this->db->or_like('t_kartu.hash', $q);
        $this->db->order_by('t_kartu.id', $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id = (int) $this->db->insert_id();
        $joindate = $data['join_date'];

        $joindate = substr($joindate, 0, 4);
        $query = 'UPDATE t_kartu SET nomor_kartu =
        ( SELECT CONCAT(' . $id . ', "/", t1.prefix, "/", t2.prefix_wilayah, "/", t3.prefix_dagangan, "/",' . $joindate . ' ) 
        FROM t_kartu JOIN t_tipe_kartu t1 ON t1.id = t_kartu.id_tipe_kartu 
        JOIN t_wilayah t2 ON t2.id = t_kartu.id_wilayah 
        JOIN t_jenis_dagangan t3 ON t3.id=t_kartu.id_jenis_dagangan 
        WHERE t_kartu.id = ' . $id . ') 
        WHERE id=' . $id;
        $this->db->query($query);
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
    function set_crc32($id)
    {
        $data = $this->get_all($id);
    }
}

/* End of file Kartu_model.php */
/* Location: ./application/models/Kartu_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:37:35 */
/* http://harviacode.com */
