<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kartu_model extends CI_Model
{

    public $table = 't_kartu';
    public $id = 'id';
    public $order = 'DESC';
    public $nomor_kartu = '';
    public $prefix_kartu = 'I';
    function __construct()
    {
        parent::__construct();
    }
    function get_grup()
    {
        $this->db->select('distinct(id_blok)');
        $this->db->order_by('id_blok', 'asc');
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all()
    {
        $this->db->where('aktif', 1);

        $this->db->order_by('id_blok,id', 'asc');
        return $this->db->get($this->table)->result();
    }
    function romawi($angka)
    {
        $map = array(
            100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
            10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I'
        );

        $roman = '';
        foreach ($map as $num => $romanDigit) {
            while ($angka >= $num) {
                $roman .= $romanDigit;
                $angka -= $num;
            }
        }
        return $roman;
    }
    function info_kartu($id_pedagang)
    {
        $url = base_url('kartu/read/' . $id_pedagang);
        $query = 'select t_kartu.*, t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan,ifnull(detail_transaksi_iuran.periode,t_kartu.join_date) as last_payment
        from t_kartu left join t_wilayah
        on t_kartu.id_wilayah=t_wilayah.id
        left join t_jenis_dagangan
        on t_kartu.id_jenis_dagangan=t_jenis_dagangan.id
        left join transaksi_iuran
        on t_kartu.id=transaksi_iuran.id_kartu
        left join detail_transaksi_iuran
        on detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi
        where t_kartu.id= ? order by detail_transaksi_iuran.periode desc limit 1';
        $data = $this->db->query($query, [$id_pedagang])->row();
        $nama = $data->nama_pemilik;
        $alamat = $data->alamat_kartu;
        $nomor = $data->nomor_kartu;
        $penjamin = '';
        $wilayah = $data->wilayah;
        $jenis_dagangan = $data->nama_dagangan;
        $last_payment = $data->last_payment;
        $tahun = explode('-', $last_payment);

        $this->db->select('iuran');
        $this->db->from('setting_iuran');
        $this->db->where('id_jenis_dagangan', $data->id_jenis_dagangan);
        $this->db->where('periode<=', $data->last_payment);
        $this->db->order_by('periode', 'desc');
        $this->db->limit(1);
        $info_iuran = $this->db->get()->row();

        return array(
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor' => $nomor,
            'penjamin' => $penjamin,
            'wilayah' => $wilayah,
            'jenis_dagangan' => $jenis_dagangan,
            'tahun' => $tahun[0],
            'iuran' => number_format($info_iuran->iuran, 0, ',', '.'),
            'url' => $url

        );
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->select('t_kartu.*,
        t_wilayah.wilayah,t_wilayah.nomor_wilayah,
        t_jenis_dagangan.nama_dagangan,t_jenis_dagangan.prefix_dagangan,
        t_wilayah.prefix_wilayah');
        $this->db->from('t_kartu');
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->where('t_kartu.id', $id);
        $r = $this->db->get()->row();
        $this->_nomor_kartu($r->id, $this->romawi($r->nomor_wilayah), $r->id_blok, $r->prefix_dagangan);

        return $r;
    }
    function _nomor_kartu($id, $prefix_wilayah, $id_blok, $prefix_dagangan)
    {
        $this->nomor_kartu = str_pad($id, 4, '0', STR_PAD_LEFT) . '/'  . $prefix_wilayah . '-' . str_pad($id_blok, 2, '0', STR_PAD_LEFT) . '/' . $prefix_dagangan . '/' . date_format(date_create(), 'Y');
    }
    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->select('t_kartu.id');
        $this->db->from($this->table);
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id', 'left');

        $this->db->like('t_kartu.nama_pemilik', $q);
        $this->db->or_like('t_kartu.nomor_kartu', $q);
        $this->db->or_like('t_kartu.alamat_kartu', $q);
        $this->db->or_like('t_kartu.nomor_telp', $q);
        $this->db->or_like('t_wilayah.wilayah', $q);
        $this->db->or_like('t_jenis_dagangan.nama_dagangan', $q);

        return $this->db->count_all_results();
    }
    function get_by_nomor($nomor)
    {
        $this->db->where('nomor_kartu', $nomor);
        return $this->db->get($this->table)->row();
    }
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {

        $this->db->select('t_kartu.*,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan');
        $this->db->from($this->table);
        $this->db->join('t_wilayah', 't_kartu.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_kartu.id_jenis_dagangan=t_jenis_dagangan.id', 'left');

        $this->db->like('t_kartu.nama_pemilik', $q);
        $this->db->or_like('t_kartu.nomor_kartu', $q);
        $this->db->or_like('t_kartu.alamat_kartu', $q);
        $this->db->or_like('t_kartu.nomor_telp', $q);
        $this->db->or_like('t_wilayah.wilayah', $q);
        $this->db->or_like('t_jenis_dagangan.nama_dagangan', $q);

        $this->db->order_by('t_kartu.id_blok,t_kartu.id_wilayah,t_kartu.id', 'asc');
        $this->db->limit($limit, $start);

        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $id = (int) $this->db->insert_id();
        $joindate = $data['join_date'];
        $this->get_by_id($id);

        $joindate = substr($joindate, 0, 4);

        $this->db->where('id', $id);
        $this->db->update($this->table, array('nomor_kartu' => $this->nomor_kartu));
        $this->db->trans_complete();
    }

    // update data
    function update($id, $data)
    {
        $this->load->model('Wilayah_model');
        $this->load->model('Jenis_dagangan_model');
        $jenis = $this->Jenis_dagangan_model->get_by_id($data['id_jenis_dagangan']);

        $r = $this->Wilayah_model->get_by_id($data['id_wilayah']);

        $this->_nomor_kartu($id,  $this->romawi($r->nomor_wilayah), $data['id_blok'], $jenis->prefix_dagangan);

        $data['nomor_kartu'] = $this->nomor_kartu;
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

/* End of file Kartu_model.php */
/* Location: ./application/models/Kartu_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:37:35 */
/* http://harviacode.com */
