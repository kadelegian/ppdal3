<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public $periode_laporan;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jurnal_model', 'jurnal_model');
        $this->periode_laporan = $this->jurnal_model->periode_laporan;
    }
    function total_rows($tanggal1 = null, $tanggal2 = null)
    {
        if ($tanggal1 && $tanggal2) {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)>=', $tanggal1);
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)<=', $tanggal2);
        } else {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)>', $this->periode_laporan);
            $this->db->order_by('transaksi_iuran.tanggal_transaksi', 'asc');
        }
        $this->db->select('id_transaksi');
        $this->db->from('transaksi_iuran');
        return $this->db->count_all_results();
    }
    function get_limit_data($tanggal1 = null, $tanggal2 = null, $limit = 10, $start = 0)
    {

        if ($tanggal1 && $tanggal2) {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)>=', $tanggal1);
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)<=', $tanggal2);
        } else {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)>', $this->periode_laporan);
            $this->db->order_by('transaksi_iuran.id_transaksi', 'asc');
        }
        $this->db->select('transaksi_iuran.id_transaksi,CONCAT(COALESCE(t_kartu.nama_pemilik,t_pedagang.nama_pedagang)," ",
        COALESCE(t_kartu.nomor_kartu,t_pedagang.nomor)) as keterangan,
        transaksi_iuran.tanggal_transaksi, transaksi_iuran.total_bayar,users.username,akun.alias as cara_bayar', false);

        $this->db->from('transaksi_iuran');
        $this->db->join('t_kartu', 't_kartu.id=transaksi_iuran.id_kartu', 'left');
        $this->db->join('t_pedagang', 't_pedagang.id=transaksi_iuran.id_kartu', 'left');
        $this->db->join('users', 'users.id=transaksi_iuran.id_user', 'left');
        $this->db->join('akun', 'akun.id=transaksi_iuran.ke_akun', 'left');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    function summary_cara_bayar($tanggal1 = null, $tanggal2 = null)
    {
        if ($tanggal1 && $tanggal2) {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)>=', $tanggal1);
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)<=', $tanggal2);
        } else {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi)>', $this->periode_laporan);
            $this->db->order_by('transaksi_iuran.id_transaksi', 'asc');
        }
        $this->db->select('DISTINCT(transaksi_iuran.ke_akun) as id, akun.alias as cara_bayar,sum(total_bayar) as total_nominal', false);
        $this->db->from('transaksi_iuran');
        $this->db->join('akun', 'akun.id=transaksi_iuran.ke_akun', 'left');
        $this->db->group_by('transaksi_iuran.ke_akun');
        return $this->db->get()->result();
    }
}
