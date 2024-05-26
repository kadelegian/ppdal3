<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pengeluaran_model extends CI_Model
{

    public $table = 'jurnal';
    public $id = 'id';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }


    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_active_data()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('aktif', 1);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($start_date = null, $end_date = null)
    {
        if (!$start_date || !$end_date) {
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
        }
        $this->db->select('jurnal.*,users.username,jenis_pengeluaran.keterangan as jenis_pengeluaran');
        $this->db->from('jurnal');
        $this->db->join('users', 'users.id=jurnal.id_user', 'left');
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id=jurnal.kode_pengeluaran', 'left');
        $this->db->where('jurnal.kredit>', 0);
        $this->db->where('date(jurnal.tanggal) >=', $start_date);
        $this->db->where('date(jurnal.tanggal) <=', $end_date);

        $this->db->order_by($this->id, 'desc');

        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_nominal_transaksi($start_date = null, $end_date = null)
    {
        if (!$start_date || !$end_date) {
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
        }
        $this->db->select('sum(ifnull(jurnal.kredit,0)) as total_pengeluaran');
        $this->db->from('jurnal');
        $this->db->where('jurnal.kredit>', 0);
        $this->db->where('date(jurnal.tanggal) >=', $start_date);
        $this->db->where('date(jurnal.tanggal) <=', $end_date);

        return $this->db->get()->row();
    }
    function get_limit_data($limit, $start_date = null, $end_date = null, $start = 0)
    {
        if (!$start_date || !$end_date) {
            $start_date = date('Y-m-01');
            $end_date = date('Y-m-t');
        }
        $this->db->select('jurnal.*,users.username,jenis_pengeluaran.keterangan as jenis_pengeluaran,akun.nama_akun');
        $this->db->from('jurnal');
        $this->db->join('users', 'users.id=jurnal.id_user', 'left');
        $this->db->join('jenis_pengeluaran', 'jenis_pengeluaran.id=jurnal.kode_pengeluaran', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun', 'left');
        $this->db->where('jurnal.kredit>', 0);
        $this->db->where('date(jurnal.tanggal) >=', $start_date);
        $this->db->where('date(jurnal.tanggal) <=', $end_date);

        $this->db->order_by($this->id, 'desc');
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

        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Transaksi_iuran_model.php */
/* Location: ./application/models/Transaksi_iuran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-05 07:15:59 */
/* http://harviacode.com */
