<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{

    public $table = 'jurnal';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_saldo_rekening($tanggal = null)
    {
        if ($tanggal == null) {
            $tanggal = date('Y-m-d');
        }
        $q = 'select * from akun where aktif=1';
        $data_akun = $this->db->query($q)->result();
        $q = '';

        $j = count($data_akun);
        $i = 0;
        foreach ($data_akun as $ak) {
            $i++;
            $q = $q . 'Select COALESCE(sum(jurnal.debet),0)as debet,COALESCE(sum(jurnal.kredit),0) as kredit, (COALESCE(sum(jurnal.debet),0)-COALESCE(sum(jurnal.kredit),0))+ COALESCE(saldo_akun.saldo,0) as "saldo","' . $ak->nama_akun . '" as "nama_akun" 
            from saldo_akun
            left join jurnal
            on jurnal.id_akun=saldo_akun.id_akun and jurnal.tanggal>= saldo_akun.periode           
            where saldo_akun.id_akun=' . $ak->id . ' group by saldo_akun.id_akun';
            if ($i < $j) {
                $q = $q . ' union ';
            }
        }
        $data_saldo = $this->db->query($q)->result();
        return $data_saldo;
    }
    function saldo_awal()
    {
        $this->db->select('akun.*, saldo_akun.saldo');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'akun.id=saldo_akun.id_akun', 'left');
        $this->db->where('akun.aktif', 1);
        return $this->db->get()->result();
    }
    function pemasukan()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $this->db->select('jenis_pemasukan.*, sum(jurnal.debet) as debet ');
        $this->db->from('jenis_pemasukan');
        $this->db->join('jurnal', 'jurnal.kode=jenis_pemasukan.id');
        $this->db->where('month(jurnal.tanggal)', $bulan);
        $this->db->where('year(jurnal.tanggal)', $tahun);
        $this->db->where('jenis_pemasukan.aktif', 1);
        $this->db->group_by('jurnal.kode');
        return $this->db->get()->result();
    }
    function pengeluaran()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $this->db->select('jenis_pengeluaran.*, sum(jurnal.kredit) as kredit ');
        $this->db->from('jenis_pengeluaran');
        $this->db->join('jurnal', 'jurnal.kode_pengeluaran=jenis_pengeluaran.id');
        $this->db->where('month(jurnal.tanggal)', $bulan);
        $this->db->where('year(jurnal.tanggal)', $tahun);
        $this->db->where('jenis_pengeluaran.aktif', 1);
        $this->db->group_by('jurnal.kode_pengeluaran');
        return $this->db->get()->result();
    }
    // get all

    function set_saldo($id_akun, $tanggal = null, $nominal = 0)
    {
        if ($tanggal == null) {
            $tanggal = date('Y-m-d h:i:s');
        }
        $this->db->where('id_akun', $id_akun);
        $cek = $this->db->get('saldo_akun')->row();
        if ($cek) {
            $this->db->update('saldo_akun', array('saldo' => $nominal));
        } else {
            $data = array(
                'id_akun' => $id_akun,
                'periode' => $tanggal,
                'saldo' => $nominal
            );
            $this->db->insert('saldo_akun', $data);
        }
    }
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

        $this->db->or_like('nama_akun', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);

        $this->db->or_like('nama_akun', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function insert_pedagang($data)
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
    function get_summary($data_akun)
    {
        $query = '';
        $jumlah_akun = sizeof($data_akun);
        foreach ($data_akun as $akun) {
            $query = $query . "select ifnull((sum(debet)-sum(kredit)),0) as saldo,'" . $akun->nama_akun . "' as nama_akun 
from " . $this->table . " where id_akun=" . $akun->id;

            $jumlah_akun = $jumlah_akun - 1;
            if ($jumlah_akun > 0) {
                $query = $query . ' union ';
            }
        }
        return $this->db->query($query)->result();
    }
}
