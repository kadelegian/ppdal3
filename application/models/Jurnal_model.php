<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{

    public $table = 'jurnal';
    public $id = 'id';
    public $order = 'DESC';
    public $periode_laporan;

    function __construct()
    {
        parent::__construct();
        $q = 'SELECT COALESCE(max(saldo_akun.periode),max(akun.tgl_saldo)) as periode
                FROM akun LEFT JOIN saldo_akun
                on akun.id=saldo_akun.id_akun';

        $data = $this->db->query($q)->row();

        $this->periode_laporan = $data->periode;
    }

    function saldo_akhir_aktiva()
    {

        $this->db->select('akun.kode_akun,akun.nama_akun,jenis_akun.sn,jenis_akun.pos');
        $this->db->select('COALESCE(saldo_akun.debet,akun.debet)+sum(jurnal.debet)- COALESCE(saldo_akun.kredit,akun.kredit)-SUM(jurnal.kredit) as saldo_akhir');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id', 'left');
        $this->db->join('jurnal', 'jurnal.id_akun=akun.id and date(jurnal.tanggal) > "' . $this->periode_laporan . '"');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');
        $this->db->where('jenis_akun.sn', 'd');
        $this->db->where('jenis_akun.pos', 'nr');

        $this->db->group_by('akun.id');
        return $this->db->get()->result();
    }
    function saldo_akhir_hutang()
    {
        $this->db->select('akun.kode_akun,akun.nama_akun,jenis_akun.sn,jenis_akun.pos');
        $this->db->select('COALESCE(saldo_akun.kredit,akun.kredit)+sum(jurnal.kredit)- COALESCE(saldo_akun.debet,akun.debet)-SUM(jurnal.debet) as saldo_akhir');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id', 'left');
        $this->db->join('jurnal', 'jurnal.id_akun=akun.id and date(jurnal.tanggal) > "' . $this->periode_laporan . '"');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');
        $this->db->where('jenis_akun.sn', 'k');
        $this->db->where('jenis_akun.pos', 'nr');

        $this->db->group_by('akun.id');
        return $this->db->get()->result();
    }
    function saldo_akhir_modal()
    {
        $this->db->select('akun.kode_akun,akun.nama_akun,jenis_akun.sn,jenis_akun.pos');
        $this->db->select('COALESCE(saldo_akun.debet,akun.debet)+sum(jurnal.debet)- COALESCE(saldo_akun.kredit,akun.kredit)-SUM(jurnal.kredit) as saldo_akhir');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id', 'left');
        $this->db->join('jurnal', 'jurnal.id_akun=akun.id and date(jurnal.tanggal) > "' . $this->periode_laporan . '"');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');
        $this->db->like('akun.kode_akun', '3', 'left');

        $this->db->group_by('akun.id');
        return $this->db->get()->result();
    }
    function laba_rugi_berjalan()
    {
        $this->db->select('sum(jurnal.kredit)-sum(jurnal.debet) as laba_rugi');
        $this->db->from('akun');
        $this->db->join('jurnal', 'jurnal.id_akun=akun.id');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis');
        $this->db->where('jenis_akun.pos', 'lr');
        $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
        return $this->db->get()->row();
    }

    function total_rows_jurnal_umum($tanggal1 = null, $tanggal2 = null)
    {
        if ($tanggal1 && $tanggal2) {
            $this->db->where('date(jurnal.tanggal)>=', $tanggal1);
            $this->db->where('date(jurnal.tanggal)<=', $tanggal2);
        } else {
            $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
            $this->db->order_by('jurnal.tanggal', 'asc');
        }
        $this->db->select('id');
        $this->db->from('jurnal');
        return $this->db->count_all_results();
    }
    function get_jurnal_umum($tanggal1 = null, $tanggal2 = null, $limit = 10, $start = 0)
    {

        if ($tanggal1 && $tanggal2) {
            $this->db->where('date(jurnal.tanggal)>=', $tanggal1);
            $this->db->where('date(jurnal.tanggal)<=', $tanggal2);
        } else {
            $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
            $this->db->order_by('jurnal.id', 'asc');
        }
        $this->db->select('jurnal.tanggal,jurnal.debet,jurnal.kredit,jurnal.keterangan,
        CASE 
        WHEN jurnal.id_transaksi > 0 THEN jurnal.id_transaksi       
        WHEN jurnal.id_transaksi_pemasukan > 0 THEN jurnal.id_transaksi_pemasukan      
        WHEN jurnal.id_transaksi_pengeluaran > 0 THEN jurnal.id_transaksi_pengeluaran
        ELSE jurnal.id_transfer 
    END as id_transaksi,
    akun.kode_akun,akun.nama_akun,users.username', false);

        $this->db->from('jurnal');
        $this->db->join('transaksi_iuran', 'transaksi_iuran.id_transaksi=jurnal.id_transaksi', 'left');
        $this->db->join('transaksi_pemasukan', 'transaksi_pemasukan.id=jurnal.id_transaksi_pemasukan', 'left');
        $this->db->join('transaksi_pengeluaran', 'transaksi_pengeluaran.id=jurnal.id_transaksi_pengeluaran', 'left');
        $this->db->join('transfer_kas', 'transfer_kas.id=jurnal.id_transfer', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun');
        $this->db->join('users', '(users.id=transaksi_iuran.id_user 
        or users.id=transaksi_pemasukan.id_user 
        or users.id=transaksi_pengeluaran.id_user
        or users.id=transfer_kas.id_user)');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    function get_summary_jurnal_umum($tanggal1 = null, $tanggal2 = null)
    {
        if ($tanggal1 && $tanggal2) {
            $this->db->where('date(jurnal.tanggal)>=', $tanggal1);
            $this->db->where('date(jurnal.tanggal)<=', $tanggal2);
        } else {
            $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
        }
        $this->db->select('ifnull(sum(debet),0) as total_debet,ifnull(sum(kredit),0) as total_kredit');

        $this->db->from('jurnal');

        return $this->db->get()->result();
    }
    function get_saldo_akun($id_akun)
    {
        $q = 'Select akun.id, COALESCE(saldo_akun.debet,akun.debet) as debet, COALESCE(saldo_akun.kredit,akun.kredit) as kredit
            from akun
            left join saldo_akun
            on akun.id=saldo_akun.id_akun
            where akun.id=' . $id_akun . '           
            order by saldo_akun.periode desc
            limit 1';

        $data_saldo = $this->db->query($q)->row();
        return $data_saldo;
    }
    function get_saldo_awal_akun_aktiva()
    {

        $this->db->select('akun.id, COALESCE(saldo_akun.debet,akun.debet) as debet, COALESCE(saldo_akun.kredit,akun.kredit) as kredit');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id and saldo_akun.periode="' . $this->periode_laporan . '"', 'left');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis', 'left');

        $this->db->where('jenis_akun.sn', 'd');
        $this->db->where('jenis_akun.pos', 'nr');

        return $this->db->get()->result();
    }

    function get_akun_buku_besar()
    {
        $this->db->select('distinct(jurnal.id_akun) as id, akun.nama_akun, akun.kode_akun,jenis_akun.sn');
        $this->db->from('jurnal');
        $this->db->join('akun', 'akun.id=jurnal.id_akun', 'left');
        $this->db->join('jenis_akun', 'akun.kode_jenis=jenis_akun.id');
        $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
        $this->db->order_by('akun.kode_akun', 'asc');
        return $this->db->get()->result();
    }
    function get_buku_besar($id_akun, $start, $limit)
    {
        $this->db->select('jurnal.tanggal,jurnal.debet,jurnal.kredit,jurnal.keterangan,
        CASE 
        WHEN jurnal.id_transaksi > 0 THEN jurnal.id_transaksi       
        WHEN jurnal.id_transaksi_pemasukan > 0 THEN jurnal.id_transaksi_pemasukan      
        WHEN jurnal.id_transaksi_pengeluaran > 0 THEN jurnal.id_transaksi_pengeluaran
        ELSE jurnal.id_transfer
    END as id_transaksi,
    akun.kode_akun,akun.nama_akun,jenis_akun.sn', false);

        $this->db->from('jurnal');
        $this->db->join('transaksi_iuran', 'transaksi_iuran.id_transaksi=jurnal.id_transaksi', 'left');
        $this->db->join('transaksi_pemasukan', 'transaksi_pemasukan.id=jurnal.id_transaksi_pemasukan', 'left');
        $this->db->join('transaksi_pengeluaran', 'transaksi_pengeluaran.id=jurnal.id_transaksi_pengeluaran', 'left');
        $this->db->join('transfer_kas', 'transfer_kas.id=jurnal.id_transfer', 'left');
        $this->db->join('akun', 'akun.id=jurnal.id_akun');
        $this->db->join('users', '(users.id=transaksi_iuran.id_user 
        or users.id=transaksi_pemasukan.id_user 
        or users.id=transaksi_pengeluaran.id_user
        or users.id=transfer_kas.id_user)');

        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis');
        $this->db->where('jurnal.id_akun', $id_akun);
        $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
        $this->db->limit($limit, $start);

        return $this->db->get()->result();
    }
    function get_num_row_buku_besar($id_akun)
    {

        $this->db->select('jurnal.*');
        $this->db->from('jurnal');
        $this->db->where('id_akun', $id_akun);
        $this->db->where('date(tanggal)>', $this->periode_laporan);

        return $this->db->count_all_results();
    }
    function get_page_saldo_buku_besar($id_akun, $start, $limit)
    {

        $debet = 0;
        $kredit = 0;
        $this->db->select('debet, kredit');
        $this->db->from('jurnal');
        $this->db->where('id_akun', $id_akun);
        $this->db->where('date(tanggal)>', $this->periode_laporan);
        $this->db->limit($start);
        $resul = $this->db->get()->result();
        foreach ($resul as $r) {
            $debet += $r->debet;
            $kredit += $r->kredit;
        }
        $data = array(
            'debet' => $debet,
            'kredit' => $kredit
        );
        return $data;
    }


    function get_summary_buku_besar($id_akun)
    {
        $this->db->where('id_akun', $id_akun);
        $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
        $this->db->select('ifnull(sum(debet),0) as debet,ifnull(sum(kredit),0) as kredit');
        $this->db->from('jurnal');
        return $this->db->get()->row();
    }
    function get_laba_rugi($pemasukan = false)
    {

        $this->db->select('jurnal.id_akun, SUM(jurnal.debet) as debet,SUM(jurnal.kredit) as kredit, akun.nama_akun,akun.kode_akun');
        $this->db->from('jurnal');
        $this->db->join('akun', 'jurnal.id_akun=akun.id');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis');
        $this->db->where('date(jurnal.tanggal)>', $this->periode_laporan);
        if ($pemasukan) {
            $this->db->where('jenis_akun.sn', 'k');
        } else {
            $this->db->where('jenis_akun.sn', 'd');
        }
        $this->db->where('jenis_akun.pos', 'lr');
        $this->db->group_by('jurnal.id_akun');
        return $this->db->get()->result();
    }
    function get_saldo_awal_akun_laba_rugi($pemasukan = false)
    {
        if ($pemasukan) {
            $this->db->where('jenis_akun.sn', 'k');
        } else {
            $this->db->where('jenis_akun.sn', 'd');
        }
        $this->db->select('akun.id,akun.kode_akun,akun.nama_akun,COALESCE(saldo_akun.debet,akun.debet) as debet, COALESCE(saldo_akun.kredit,akun.kredit) as kredit');
        $this->db->from('akun');
        $this->db->join('saldo_akun', 'saldo_akun.id_akun=akun.id', 'left');
        $this->db->join('jenis_akun', 'jenis_akun.id=akun.kode_jenis');
        $this->db->where('jenis_akun.pos', 'lr');
        $this->db->group_by('akun.id');
        return $this->db->get()->result();
    }

    function set_saldo($id_akun, $tanggal = null, $nominal = 0) //
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
    function get_trans_iuran_by_id_trans($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);

        return $this->db->get($this->table);
    }
    function get_trans_penjamin_by_id_trans($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->where('kode', 2);
        return $this->db->get($this->table)->row();
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
    function insert_transaksi($data)
    {
        $this->db->insert_batch($this->table, $data);
    }
    function insert_pedagang($data)
    {
        $this->db->insert($this->table, $data);
    }
    // update data
    function update($data)
    {
        $this->db->update_batch('jurnal', $data, 'id');
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
