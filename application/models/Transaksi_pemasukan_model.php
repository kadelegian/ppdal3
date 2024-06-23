<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pemasukan_model extends CI_Model
{

    public $table = 'transaksi_pemasukan';
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
        $this->db->from('transaksi_pemasukan');
        $this->db->join('jurnal', 'jurnal.id_transaksi_pemasukan=transaksi_pemasukan.id');
        $this->db->where('transaksi_pemasukan.id', $id);
        $this->db->order_by('jurnal.id');
        return $this->db->get()->result();
    }

    // get total rows
    function total_rows($start_date = null, $end_date = null)
    {

        $this->db->select('id');
        $this->db->from('transaksi_pemasukan');


        if ($start_date || $end_date) {

            $this->db->where('date(tanggal) >=', $start_date);
            $this->db->where('date(tanggal) <=', $end_date);
        } else {
            $this->db->where('date(transaksi_pemasukan.tanggal)>', $this->jurnal_model->periode_laporan);
        }

        return $this->db->count_all_results();
    }
    function get_limit_data($limit, $start_date = null, $end_date = null, $start = 0)
    {

        $this->db->select('transaksi_pemasukan.id,jurnal.tanggal,jurnal.debet,jurnal.kredit,jurnal.keterangan,
        akun.nama_akun,akun.kode_akun,users.username');
        $this->db->from('transaksi_pemasukan');
        $this->db->join('jurnal', 'jurnal.id_transaksi_pemasukan=transaksi_pemasukan.id', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun', 'left');
        $this->db->join('users', 'users.id=transaksi_pemasukan.id_user', 'left');

        if ($start_date || $end_date) {

            $this->db->where('date(transaksi_pemasukan.tanggal) >=', $start_date);
            $this->db->where('date(transaksi_pemasukan.tanggal) <=', $end_date);
        } else {
            $this->db->where('date(transaksi_pemasukan.tanggal)>', $this->jurnal_model->periode_laporan);
        }

        //$this->db->order_by('transaksi_pemasukan.id', 'asc');
        //$this->db->order_by('transaksi_pemasukan.tanggal', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    function integerToRoman($integer)
    {
        // Convert the integer into an integer (just to make sure)
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );

        foreach ($lookup as $roman => $value) {
            // Determine the number of matches
            $matches = intval($integer / $value);

            // Add the same number of characters to the string
            $result .= str_repeat($roman, $matches);

            // Set the integer to be the remainder of the integer and the value
            $integer = $integer % $value;
        }

        // The Roman numeral should be built, return it
        return $result;
    }
    function terbilang($angka)
    {
        $angka = abs($angka);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");
        $ribu = array("", "Ribu", "Juta", "Miliar", "Triliun");

        $hasil = "";

        for ($i = 0; $i < count($ribu) && $angka > 0; $i++) {
            $sisa = $angka % 1000;
            if ($sisa > 0) {
                $hasil = $this->terbilangSatuan($sisa) . " " . $ribu[$i] . " " . $hasil;
            }
            $angka = floor($angka / 1000);
        }

        return ($hasil == "") ? "nol" : $hasil . ' Rupiah';
    }

    function terbilangSatuan($angka)
    {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan");
        $belasan = array("", "Sebelas", "Dua Belas", "Tiga Belas", "Empat Belas", "Lima Belas", "Enam Belas", "Tujuh Belas", "Delapan Belas", "Sembilan Belas");

        $hasil = "";

        if ($angka < 10) {
            $hasil = $huruf[$angka];
        } elseif ($angka < 20) {
            $hasil = $belasan[$angka - 10];
        } elseif ($angka < 100) {
            $hasil = $huruf[floor($angka / 10)] . " Puluh " . $huruf[$angka % 10];
        } elseif ($angka < 200) {
            $hasil = "Seratus " . terbilangSatuan($angka - 100);
        } else {
            $hasil = $huruf[floor($angka / 100)] . " Ratus " . $this->terbilangSatuan($angka % 100);
        }

        return $hasil;
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
        $this->db->delete('transaksi_pemasukan');
        $this->db->where('id_transaksi_pemasukan', $id);
        $this->db->delete('jurnal');
    }
}
