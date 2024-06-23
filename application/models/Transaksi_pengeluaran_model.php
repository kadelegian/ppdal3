<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pengeluaran_model extends CI_Model
{

    public $table = 'transaksi_pengeluaran';
    public $id = 'id';
    public $order = 'DESC';
    public $periode;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurnal_model', 'jurnal_model');
        $this->periode = $this->jurnal_model->periode_laporan;
    }


    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_by_id($id)
    {
        $this->db->select('jurnal.*');
        $this->db->from('transaksi_pengeluaran');
        $this->db->join('jurnal', 'jurnal.id_transaksi_pengeluaran=transaksi_pengeluaran.id');
        $this->db->where('transaksi_pengeluaran.id', $id);
        $this->db->order_by('jurnal.id');
        return $this->db->get()->result();
    }

    // get total rows
    function total_rows($start_date = null, $end_date = null)
    {
        $this->db->select('id');
        $this->db->from('transaksi_pengeluaran');


        if ($start_date || $end_date) {

            $this->db->where('date(tanggal) >=', $start_date);
            $this->db->where('date(tanggal) <=', $end_date);
        } else {
            $this->db->where('date(transaksi_pengeluaran.tanggal)>', $this->jurnal_model->periode_laporan);
        }

        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start_date = null, $end_date = null, $start = 0)
    {

        $this->db->select('transaksi_pengeluaran.id,jurnal.tanggal,jurnal.debet,jurnal.kredit,jurnal.keterangan,
        akun.nama_akun,akun.kode_akun,users.username');
        $this->db->from('transaksi_pengeluaran');
        $this->db->join('jurnal', 'jurnal.id_transaksi_pengeluaran=transaksi_pengeluaran.id', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun', 'left');
        $this->db->join('users', 'users.id=transaksi_pengeluaran.id_user', 'left');

        if ($start_date || $end_date) {

            $this->db->where('date(transaksi_pengeluaran.tanggal) >=', $start_date);
            $this->db->where('date(transaksi_pengeluaran.tanggal) <=', $end_date);
        } else {
            $this->db->where('date(transaksi_pengeluaran.tanggal)>', $this->jurnal_model->periode_laporan);
        }

        //$this->db->order_by('transaksi_pemasukan.id', 'asc');
        //$this->db->order_by('transaksi_pemasukan.tanggal', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }


    function insert($data)
    {

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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
        $this->db->where('id', $id);
        $this->db->delete('transaksi_pengeluaran');
        $this->db->where('id_transaksi_pengeluaran', $id);
        $this->db->delete('jurnal');
    }
}
