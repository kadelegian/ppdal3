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

    // get all
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
