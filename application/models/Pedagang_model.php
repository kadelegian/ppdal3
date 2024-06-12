<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedagang_model extends CI_Model
{

    public $table = 't_pedagang';
    public $id = 'id';
    public $order = 'DESC';


    function __construct()
    {
        parent::__construct();
    }
    function _nomor_kartu($id, $prefix_wilayah, $prefix_dagangan)
    {
        $card = str_pad($id, 3, '0', STR_PAD_LEFT) . '/'  . $prefix_wilayah . '/' . $prefix_dagangan . '/' . date_format(date_create(), 'Y');
        $this->nomor_kartu = $card;
        return $card;
    }

    // get all
    function get_all()
    {
        $this->db->select('t_pedagang.*,t_extra_charge.keterangan_charge,t_extra_charge.extra_charge,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan');
        $this->db->from($this->table);
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->order_by('t_pedagang.id_wilayah', 'asc');
        $this->db->order_by('t_pedagang.id', 'asc');

        return $this->db->get()->result();
    }

    function simpan_iuran($data)
    {
        $this->db->insert('setting_iuran_asongan', $data);
    }
    // get data by id
    function get_header_kartu($id_pedagang)
    {
        $this->db->select("t_pedagang.*,t_extra_charge.keterangan_charge,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan");
        $this->db->select('t_extra_charge.extra_charge');
        $this->db->from('t_pedagang');
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->where('t_pedagang.id', $id_pedagang);
        return $this->db->get()->row();
    }
    function get_by_alias($alias)
    {
        $this->db->select('t_pedagang.*,
        t_jenis_dagangan.nama_dagangan,t_jenis_dagangan.prefix_dagangan,t_jenis_dagangan.nama_dagangan,
        t_wilayah.prefix_wilayah,t_wilayah.wilayah,
        t_extra_charge.keterangan_charge, t_extra_charge.extra_charge');
        $this->db->from('t_pedagang');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->where('t_pedagang.alias', $alias);
        $r = $this->db->get()->row();

        return $r;
    }
    function get_by_id($id)
    {
        $this->db->select('t_pedagang.*,
        t_jenis_dagangan.nama_dagangan,t_jenis_dagangan.prefix_dagangan,t_jenis_dagangan.nama_dagangan,
        t_wilayah.prefix_wilayah,t_wilayah.wilayah,
        t_extra_charge.keterangan_charge, t_extra_charge.extra_charge');
        $this->db->from('t_pedagang');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->where('t_pedagang.id', $id);
        $r = $this->db->get()->row();
        $this->_nomor_kartu($r->id, $r->prefix_wilayah, $r->prefix_dagangan);
        return $r;
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->select('t_pedagang.id');
        $this->db->from($this->table);
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->or_like('t_pedagang.nama_pedagang', $q);
        $this->db->or_like('t_extra_charge.keterangan_charge', $q);
        $this->db->or_like('t_pedagang.nomor', $q);
        $this->db->or_like('t_jenis_dagangan.nama_dagangan', $q);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {

        $this->db->select('t_pedagang.*,t_extra_charge.keterangan_charge,t_extra_charge.extra_charge,t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan');
        $this->db->from($this->table);
        $this->db->join('t_extra_charge', 't_pedagang.id_extra_charge=t_extra_charge.id', 'left');
        $this->db->join('t_wilayah', 't_pedagang.id_wilayah=t_wilayah.id', 'left');
        $this->db->join('t_jenis_dagangan', 't_pedagang.id_jenis_dagangan=t_jenis_dagangan.id', 'left');
        $this->db->order_by('t_pedagang.id_wilayah', 'asc');
        $this->db->order_by('t_pedagang.id', 'asc');

        $this->db->like('t_pedagang.nama_pedagang', $q);
        $this->db->or_like('t_extra_charge.keterangan_charge', $q);
        $this->db->or_like('t_pedagang.nomor', $q);
        $this->db->or_like('t_jenis_dagangan.nama_dagangan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id_baru = $this->db->insert_id();
        $this->load->model('Wilayah_model');
        $this->load->model('Jenis_dagangan_model');
        $jenis = $this->Jenis_dagangan_model->get_by_id($data['id_jenis_dagangan']);

        $r = $this->Wilayah_model->get_by_id($data['id_wilayah']);

        $this->_nomor_kartu($id_baru, $r->prefix_wilayah, $jenis->prefix_dagangan);
        $this->db->where($this->id, $id_baru);
        $this->db->update($this->table, array('nomor' => $this->nomor_kartu));
        if ($data['alias'] == '-') {
            $this->set_alias_url($id_baru);
        }
    }

    // update data
    function update($id, $data)
    {
        $this->load->model('Wilayah_model');
        $this->load->model('Jenis_dagangan_model');
        $jenis = $this->Jenis_dagangan_model->get_by_id($data['id_jenis_dagangan']);

        $r = $this->Wilayah_model->get_by_id($data['id_wilayah']);

        $this->_nomor_kartu($id, $this->romawi($r->nomor_wilayah), $jenis->prefix_dagangan);

        $data['nomor'] = $this->nomor_kartu;

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        if ($data['alias'] == '-') {
            $this->set_alias_url($id);
        }
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
    function set_alias_url($id_pedagang)
    {
        $data = $this->get_by_id($id_pedagang);
        if (strlen($data->alias) < 4) {
            do {
                $alias = substr(str_shuffle('0123456789'), 0, 5);
                $this->db->where('alias', $alias);
                $query = $this->db->get('t_pedagang');
            } while ($query->num_rows() > 0);
            $this->db->where('id', $id_pedagang);
            $this->db->update($this->table, array('alias' => $alias));
        } else {
            $alias = $data->alias;
        }
        $url = base_url('kartu/pedagang/' . $alias);
        return $url;
    }
    function generate_alias($length = 6)
    {

        do {
            $alias = substr(str_shuffle('0123456789'), 0, $length);
            $this->db->where('alias', $alias);
            $query = $this->db->count_all_results();
        } while ($query > 0);

        return $alias;
    }
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function info_kartu($id_pedagang)
    {
        $url = base_url('pedagang/read/' . $id_pedagang);
        $query = 'select t_pedagang.*, t_wilayah.wilayah,t_jenis_dagangan.nama_dagangan,ifnull(detail_transaksi_iuran.periode,
        t_pedagang.join_date) as last_payment,t_extra_charge.keterangan_charge
        from t_pedagang left join t_wilayah
        on t_pedagang.id_wilayah=t_wilayah.id
        left join t_jenis_dagangan
        on t_pedagang.id_jenis_dagangan=t_jenis_dagangan.id
        left join transaksi_iuran
        on t_pedagang.id=transaksi_iuran.id_kartu
        left join detail_transaksi_iuran
        on detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi
        left join t_extra_charge 
        on t_pedagang.id_extra_charge=t_extra_charge.id
        where t_pedagang.id= ? order by detail_transaksi_iuran.periode desc limit 1';
        $data = $this->db->query($query, [$id_pedagang])->row();
        $nama = $data->nama_pedagang;
        $alamat = '';
        $nomor = $data->nomor;
        $penjamin = $data->keterangan_charge;
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
}

/* End of file Pedagang_model.php */
/* Location: ./application/models/Pedagang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-12-04 23:37:11 */
/* http://harviacode.com */
