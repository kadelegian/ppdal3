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
    // get all
    function get_active_acc()
    {
        $this->db->where('aktif', 1);
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
        $this->db->select('akun.*,saldo_akun.saldo as saldo');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id', 'left');

        $this->db->order_by($this->id, $this->order);

        $this->db->or_like('nama_akun', $q);
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    function set_saldo($data)
    {
        $id_akun = $data['id_akun'];
        $this->db->where('id_akun', $id_akun);
        $cek = $this->db->get('saldo_akun')->row();
        if ($cek) {
            //update
            $this->db->where('id', $cek->id);
            $this->db->update('saldo_akun', $data);
        } else {

            $this->db->insert('saldo_akun', $data);
        }
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
