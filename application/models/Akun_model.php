<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun_model extends CI_Model
{

    public $table = 'akun';
    public $id = 'id';
    public $order = 'asc';

    function __construct()
    {
        parent::__construct();
    }
    function get_bank_acc()
    {
        $this->db->where('bank', 1);
        $this->db->where('aktif', 1);
        return $this->db->get($this->table)->result();
    }

    function get_active_acc()
    {
        $select = 'akun.id,akun.kode_akun,akun.nama_akun,akun.alias,akun.nomor_rekening,akun.bank,akun.debet,akun.kredit,akun.kode_jenis,jenis_akun.keterangan,jenis_akun.sn,jenis_akun.pos';
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');
        $this->db->where('akun.aktif', 1);
        return $this->db->get($this->table)->result();
    }
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $select = 'akun.id,akun.kode_akun,akun.nama_akun,akun.keterangan,
        akun.alias,akun.nomor_rekening,akun.bank,akun.debet,akun.kredit,akun.kode_jenis,
        akun.is_iuran,akun.is_penjamin,
        jenis_akun.keterangan as jenis_akun,jenis_akun.sn,jenis_akun.pos';
        $this->db->select($select);
        $this->db->from($this->table);
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');
        $this->db->where('akun.id', $id);
        return $this->db->get()->row();
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
        $this->db->select('akun.*,
        CASE 
        WHEN saldo_akun.debet IS NULL THEN 0
        WHEN saldo_akun.debet = 0 THEN akun.debet
        ELSE saldo_akun.debet
    END as debet,
    CASE 
        WHEN saldo_akun.kredit IS NULL THEN 0
        WHEN saldo_akun.kredit = 0 THEN akun.kredit
        ELSE saldo_akun.kredit
    END as kredit,
     jenis_akun.keterangan as tipe', false);
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id', 'left');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');
        $this->db->order_by('akun.kode_akun', 'asc');

        $this->db->or_like('nama_akun', $q);
        $this->db->limit($limit, $start);

        return $this->db->get()->result();
    }
    function get_akun_sistem()
    {
        $q = 'select id from akun where is_iuran=1 union select id from akun where is_penjamin=1';
        return $this->db->query($q);
    }
    // insert data
    function insert($data)
    {
        if ($data['is_penjamin'] == 1) {
            $this->db->query('update akun set is_penjamin=0');
        }
        if ($data['is_iuran'] == 1) {
            $this->db->query('update akun set is_iuran=0');
        }

        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        if ($data['is_penjamin'] == 1) {
            $this->db->query('update akun set is_penjamin=0');
        }
        if ($data['is_iuran'] == 1) {
            $this->db->query('update akun set is_iuran=0');
        }
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    function non_aktifkan($id)
    {
        $query = 'select id 
        from jurnal 
        where month(tanggal)=month(current_date) 
        and year(tanggal)=year(current_date) 
        and id_akun=' . $id;
        $data = $this->db->query($query);
        if ($data->row()) {
            return false;
        } else {
            $this->update($id, array('aktif' => 0));
            return true;
        }
    }
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
