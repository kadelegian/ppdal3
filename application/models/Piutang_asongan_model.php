<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piutang_asongan_model extends CI_Model
{
    function clear_tabel_piutang()
    {
        $q = 'delete from piutang_asongan';
        $this->db->query($q);
        $q = 'alter table piutang_asongan auto_increment=1';
        $this->db->query($q);
    }
    function create_batch()
    {
        $sekarang = date_create_from_format('Y-m-d', date('Y') . '-' . date('m') . '-01');
        $q = "SELECT t_pedagang.id, t_pedagang.nama_pedagang
from t_pedagang LEFT JOIN transaksi_iuran  ON t_pedagang.id=transaksi_iuran.id_kartu
LEFT JOIN detail_transaksi_iuran ON detail_transaksi_iuran.id_transaksi=transaksi_iuran.id_transaksi
WHERE t_pedagang.id NOT in (
SELECT DISTINCT transaksi_iuran.id_kartu FROM t_pedagang
    JOIN transaksi_iuran ON transaksi_iuran.id_kartu=t_pedagang.id
    JOIN detail_transaksi_iuran ON detail_transaksi_iuran.id_transaksi= transaksi_iuran.id_transaksi
    WHERE detail_transaksi_iuran.periode >= '" . $sekarang->format('Y-m-d') . "')   
    GROUP BY t_pedagang.id
    ORDER BY t_pedagang.id asc";
        $list_penunggak = $this->db->query($q)->result();
        foreach ($list_penunggak as $penunggak) {
            $this->proses_pedagang($penunggak->id);
            usleep(100000);
        }
    }
    function proses_pedagang($id = null)
    {
        if ($id) {
            $this->db->where('id_pedagang', $id);
            $this->db->delete('piutang_pedagang');
            if (is_numeric($id)) {

                $this->load->model('Transaksi_iuran_model');
                $this->load->model('Pedagang_model');

                $data_pedagang = $this->Pedagang_model->get_by_id($id);

                $payment_history = $this->Transaksi_iuran_model->get_last_payment($id);
                $row = $data_pedagang;
                //cek apakah ada histori, jika tidak payment mulai dari tanggal join
                if ($payment_history->num_rows() > 0) {
                    $data_tgl = $payment_history->row();
                    $tgl = $data_tgl->periode;
                    $bulan = date('m', strtotime($tgl)) + 1;
                    $tahun = date('Y', strtotime($tgl));
                    if ($bulan == 12) {
                        $bulan = 1;
                        $tahun = $tahun + 1;
                    }
                    $tgl_jatuh_tempo = date_create_from_format('Y-m-d', $tahun . '-' . $bulan . '-1');
                } else {
                    $tgl_jatuh_tempo = date_create_from_format('Y-m-d', $row->join_date);
                }


                $tgl_sekarang = date_create_from_format('Y-m-d', date('Y') . '-' . date('m') . '-1');

                $list_iuran = $this->Transaksi_iuran_model->get_list_iuran($tgl_jatuh_tempo, $tgl_sekarang, $data_pedagang->id_jenis_dagangan);
                $i = 0;
                foreach ($list_iuran as $data_iuran) {

                    $detail_iuran[$i] = array('id_pedagang' => $id, 'periode' => date_format(date_create_from_format('Y-m-d', $data_iuran['periode']), 'Y-m-d'), 'iuran' => $data_iuran['iuran'], 'penjamin' => $data_pedagang->extra_charge);
                    $i++;
                }
                $this->db->insert_batch('piutang_asongan', $detail_iuran);
            }
        }
    }
}
