<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_transfer_model extends CI_Model
{

    public $table = 'transfer_kas';
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
        $this->db->from($this->table);
        $this->db->join('jurnal', 'jurnal.id_transfer=transfer_kas.id');
        $this->db->where('transfer_kas.id', $id);
        $this->db->order_by('jurnal.id');
        return $this->db->get()->result();
    }

    // get total rows
    function total_rows($start_date = null, $end_date = null)
    {

        $this->db->select('id');
        $this->db->from('transfer_kas');


        if ($start_date || $end_date) {

            $this->db->where('date(tanggal) >=', $start_date);
            $this->db->where('date(tanggal) <=', $end_date);
        } else {
            $this->db->where('date(tanggal)>', $this->jurnal_model->periode_laporan);
        }

        return $this->db->count_all_results();
    }


    function get_limit_data($limit, $start_date = null, $end_date = null, $start = 0)
    {

        $this->db->select('transfer_kas.id,jurnal.tanggal,jurnal.debet,
        jurnal.kredit,jurnal.keterangan,
        akun.nama_akun,akun.kode_akun,users.username');
        $this->db->from('transfer_kas');
        $this->db->join('jurnal', 'jurnal.id_transfer=transfer_kas.id', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun', 'left');
        $this->db->join('users', 'users.id=transfer_kas.id_user', 'left');

        if ($start_date || $end_date) {

            $this->db->where('date(transfer_kas.tanggal) >=', $start_date);
            $this->db->where('date(transfer_kas.tanggal) <=', $end_date);
        } else {
            $this->db->where('date(transfer_kas.tanggal)>', $this->jurnal_model->periode_laporan);
        }
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

        //hapus di jurnal
        $this->db->where('id', $id);
        $this->db->delete('jurnal');
        $this->db->where('id', $id);
        $this->db->delete('transfer_kas');
    }
}
