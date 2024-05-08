<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    private $periode_kas;

    function __construct()
    {
        parent::__construct();
        $p = $this->get_latest_period();
        if (isset($p->periode)) {
            $this->periode_kas = '';
        } else {
            $this->periode_kas = $p->periode;
        }
    }
    function get_latest_period()
    {
        $this->db->select('max(periode) as periode');
        $this->db->from('periode_laporan');
        return $this->db->get()->row();
    }
    function kas_umum()
    {

        if ($this->periode_kas == '') {
            return $this->db->get('jurnal')->result();
        } else {
            $query = 'select * from jurnal 
        where tanggal>' . $this->periode_kas;
            return $this->db->query($query)->result();
        }
    }
    function kas_spesifik($id_kas)
    {
        $this->db->where('id_akun', $id_kas);
        if ($this->periode_kas <> '') {

            $this->db->where('tanggal >', $this->periode_kas);
        }
        return $this->db->get('jurnal')->result();
    }
    function pendapatan_asongan()
    {
        $q = 'select t_wilayah.prefix_wilayah,t_jenis_dagangan.nama_dagangan, sum(detail_transaksi_iuran.iuran) as iuran,
        sum(detail_transaksi_iuran.charge) as penjamin,sum(detail_transaksi_iuran.iuran)+sum(detail_transaksi_iuran.charge) as total
        from t_pedagang inner join transaksi_iuran 
        on transaksi_iuran.id_kartu=t_pedagang.id 
        INNER JOIN t_jenis_dagangan
        on t_pedagang.id_jenis_dagangan=t_jenis_dagangan.id
        inner join detail_transaksi_iuran 
        on transaksi_iuran.id_transaksi=detail_transaksi_iuran.id_transaksi 
        inner join t_wilayah 
        on t_pedagang.id_wilayah=t_wilayah.id';
    }
}
