<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pemasukan_model extends CI_Model
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
        $this->db->select('jurnal.*,users.username,jenis_pemasukan.keterangan as jenis_pemasukan');
        $this->db->from('jurnal');
        $this->db->join('users', 'users.id=jurnal.id_user', 'left');
        $this->db->join('jenis_pemasukan', 'jenis_pemasukan.id=jurnal.kode', 'left');
        $this->db->where('jurnal.debet>', 0);
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
        $this->db->select('sum(jurnal.debet) as total_pemasukan');
        $this->db->from('jurnal');
        $this->db->where('jurnal.debet>', 0);
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
        $this->db->select('jurnal.*,users.username,jenis_pemasukan.keterangan as jenis_pemasukan,akun.nama_akun');
        $this->db->from('jurnal');
        $this->db->join('users', 'users.id=jurnal.id_user', 'left');
        $this->db->join('jenis_pemasukan', 'jenis_pemasukan.id=jurnal.kode', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun', 'left');
        $this->db->where('jurnal.debet>', 0);
        $this->db->where('date(jurnal.tanggal) >=', $start_date);
        $this->db->where('date(jurnal.tanggal) <=', $end_date);

        $this->db->order_by($this->id, 'desc');
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

        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Transaksi_iuran_model.php */
/* Location: ./application/models/Transaksi_iuran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-05 07:15:59 */
/* http://harviacode.com */
