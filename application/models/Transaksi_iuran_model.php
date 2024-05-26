<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_iuran_model extends CI_Model
{

    public $table = 'transaksi_iuran';
    public $table_pedagang = 't_kartu';
    public $id = 'id_transaksi';
    public $order = 'DESC';
    public $prefix_nomor = 'BKM-PPDAL';

    function __construct()
    {
        parent::__construct();
    }
    function get_list_iuran($periode_awal, $periode_akhir, $id_jenis)
    {
        $list_iuran = array();
        $i = 0;
        while ($periode_awal <= $periode_akhir) {
            $this->db->where('periode<=', $periode_awal->format('Y-m-d'));
            $this->db->where('id_jenis_dagangan', $id_jenis);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $res = $this->db->get('setting_iuran')->row();
            $list_iuran[$i] = array(
                'periode' => date_format($periode_awal, 'Y-m-d'),
                'iuran' => $res->iuran
            );
            date_add($periode_awal, date_interval_create_from_date_string('1 month'));
            $i++;
        }
        return $list_iuran;
    }
    function get_printable_detail($data)
    {
        $this->db->select('detail_transaksi_iuran.*,transaksi_iuran.tanggal_transaksi,users.username');
        $this->db->from('detail_transaksi_iuran');
        $this->db->join('transaksi_iuran', 'detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi', 'left');
        $this->db->join('users', 'users.id=transaksi_iuran.id_user', 'left');

        foreach ($data as $id) {
            $this->db->or_where('detail_transaksi_iuran.id', $id);
        }
        return $this->db->get()->result();
    }
    function get_last_payment($id_kartu)
    {

        $query = 'select detail_transaksi_iuran.id, detail_transaksi_iuran.periode,        
        transaksi_iuran.id_kartu,transaksi_iuran.tanggal_transaksi,
        transaksi_iuran.id_user
        from detail_transaksi_iuran left join transaksi_iuran
        on detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi
         where transaksi_iuran.id_kartu=' . $id_kartu . '          
        order by detail_transaksi_iuran.periode desc limit 12';
        return $this->db->query($query);
    }
    function get_history_payment($id_kartu)
    {
        $query = 'select * from transaksi_iuran where id_kartu=' . $id_kartu . ' 
        and year(tanggal_transaksi) = (select max(year(tanggal_transaksi)) from transaksi_iuran where id_kartu=' . $id_kartu . ') 
        limit 12 order by tanggal_transaksi desc';
        return $this->db->query($query);
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
        $strselect = 'transaksi_iuran.*,
        t_kartu.nama_pemilik_kartu,
        t_kartu.nomor_kartu,
        t_jenis_dagangan.nama_dagangan, 
        t_wilayah.wilayah,
        users.full_name';
        $this->db->select($strselect);
        $this->db->from('transaksi_iuran');
        $this->db->join('t_kartu', 't_kartu.id=transaksi_iuran.id_kartu');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id');
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id');
        $this->db->join('users', 'transaksi_iuran.id_user=users.id');
        $this->db->where($this->id, $id);
        return $this->db->get()->row();
    }
    function get_detail_trans($id)
    {
        $q = 'SELECT detail_transaksi_iuran.id as id_detail,detail_transaksi_iuran.periode, 
        transaksi_iuran.tanggal_transaksi, 
        transaksi_iuran.id_kartu,
        t_kartu.nomor_kartu,
        t_kartu.nama_pemilik,
        t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan, 
        users.full_name,
        detail_transaksi_iuran.iuran,
        detail_transaksi_iuran.diskon 
        FROM detail_transaksi_iuran 
        JOIN transaksi_iuran 
        ON detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi 
        JOIN t_kartu
         ON transaksi_iuran.id_kartu=t_kartu.id 
        JOIN t_jenis_dagangan 
        ON t_kartu.id_jenis_dagangan=t_jenis_dagangan.id 
        JOIN t_wilayah on t_kartu.id_wilayah=t_wilayah.id 
        JOIN users on transaksi_iuran.id_user = users.id 
        WHERE detail_transaksi_iuran.id_transaksi=' . $id;
        $result = $this->db->query($q);
        return $result;
    }

    // get total rows
    function total_rows($start_date = null, $end_date = null)
    {
        $this->db->select('transaksi_iuran.*');
        $this->db->from('transaksi_iuran');
        $this->db->join('jurnal', 'transaksi_iuran.id_transaksi=jurnal.id_transaksi');
        $this->db->join('t_kartu', 'transaksi_iuran.id_kartu=t_kartu.id');

        if ($start_date && $end_date) {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi) >=', $start_date);
            $this->db->where('date(transaksi_iuran.tanggal_transaksi) <=', $end_date);
        }
        $this->db->order_by($this->id, 'desc');

        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_nominal_transaksi($start_date = null, $end_date = null)
    {
        $this->db->select('sum(jurnal.debet) as debet');
        $this->db->from('transaksi_iuran');
        $this->db->join('jurnal', 'transaksi_iuran.id_transaksi=jurnal.id_transaksi');
        $this->db->join('t_kartu', 'transaksi_iuran.id_kartu=t_kartu.id');

        if ($start_date && $end_date) {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi) >=', $start_date);
            $this->db->where('date(transaksi_iuran.tanggal_transaksi) <=', $end_date);
        }
        return $this->db->get()->row();
    }
    function get_limit_data($limit, $start_date = null, $end_date = null, $start = 0)
    {
        if ($start_date && $end_date) {
            $this->db->where('date(transaksi_iuran.tanggal_transaksi) >=', $start_date);
            $this->db->where('date(transaksi_iuran.tanggal_transaksi) <=', $end_date);
        }
        $query = 'transaksi_iuran.*,jurnal.debet,akun.alias,
        t_kartu.nomor_kartu,
        t_kartu.nama_pemilik,
        t_wilayah.wilayah,
        t_jenis_dagangan.nama_dagangan,
        users.full_name as nama_user';

        $this->db->select($query);
        $this->db->from('transaksi_iuran');
        $this->db->join('t_kartu', 'transaksi_iuran.id_kartu=t_kartu.id');
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id');
        $this->db->join('t_jenis_dagangan', 't_jenis_dagangan.id=t_kartu.id_jenis_dagangan');
        $this->db->join('detail_transaksi_iuran', 'detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi');
        $this->db->join('users', 'users.id=transaksi_iuran.id_user');
        $this->db->join('jurnal', 'transaksi_iuran.id_transaksi=jurnal.id_transaksi');
        $this->db->join('akun', 'transaksi_iuran.ke_akun=akun.id', 'left');
        $this->db->group_by('transaksi_iuran.id_transaksi');
        $this->db->order_by('transaksi_iuran.tanggal_transaksi', 'desc');

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

        return ($hasil == "") ? "Nol" : $hasil . ' Rupiah';
    }
    function read_transaksi($id)
    {
        $data = $this->get_detail_trans($id);
        if ($data->num_rows() > 0) {
            $data_row = $data->first_row();
            $tgl = date_create($data_row->tanggal_transaksi);
            $id_kartu = $data_row->id_kartu;
            $this->load->model('Kartu_model');
            $data_kartu = $this->Kartu_model->get_by_id($id_kartu);
            $nomor_kartu = $data_kartu->nomor_kartu;
            $nomor_transaksi = str_pad($id, 4, '0', STR_PAD_LEFT);
            $data_last_row = $data->last_row();
            $jumlah_periode = $data->num_rows();
            $total_iuran = 0;
            if ($jumlah_periode == 1) {

                $ket_periode = 'Iuran Periode ' . date_format(date_create($data_row->periode), 'M, Y');
                $total_iuran = $data_row->iuran;
            } else {
                $ket_periode = 'Iuran Periode ' . date_format(date_create($data_row->periode), 'M, Y') .
                    ' - ' . date_format(date_create($data_last_row->periode), 'M, Y');

                foreach ($data->result() as $d) {
                    $total_iuran = $total_iuran + $d->iuran;
                }
            }




            $nominal_diskon = $data_row->diskon;
            $total_diskon = 0;

            $total_bayar = $total_iuran - $total_diskon;

            $info_lembaga = $this->db->query('select * from info_lembaga')->row();

            $data_trx = array(
                'id_transaksi' => $id,
                'nomor_transaksi' => $nomor_transaksi,
                'id_kartu' => $id_kartu,
                'nomor_kartu' => $nomor_kartu,
                'nama_pemilik' => $data_row->nama_pemilik,
                'jenis_dagangan' => $data_row->nama_dagangan,
                'wilayah' => $data_row->wilayah,
                'tanggal_transaksi' => date_format($tgl, 'd/m/Y h:i:s A'),
                'nama_user' => $data_row->full_name,
                'keterangan_iuran' => $ket_periode,
                'keterangan_diskon' => 'Diskon',
                'kali_nominal' => $jumlah_periode,
                'nominal_iuran' => 0,
                'total_iuran' => $total_iuran,
                'nominal_diskon' => $nominal_diskon,
                'total_diskon' => $total_diskon,
                'total_bayar' => $total_bayar,
                'terbilang' => $this->Transaksi_iuran_model->terbilang($total_bayar),
                'info_lembaga' => $info_lembaga,

            );
            return $data_trx;
        } else {
            return false;
        }
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
            $hasil = "Seratus " . $this->terbilangSatuan($angka - 100);
        } else {
            $hasil = $huruf[floor($angka / 100)] . " Ratus " . $this->terbilangSatuan($angka % 100);
        }

        return $hasil;
    }

    // insert data
    function insert($data)
    {
        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    function detail($data)
    {
        $c = $this->db->insert_batch('detail_transaksi_iuran', $data);
        $this->db->trans_complete();
        return $c;
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
        $this->db->trans_start();
        $this->db->where('id_transaksi', $id);
        $this->db->delete('detail_transaksi_iuran');

        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        $this->db->trans_complete();
    }
}

/* End of file Transaksi_iuran_model.php */
/* Location: ./application/models/Transaksi_iuran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-05 07:15:59 */
/* http://harviacode.com */
