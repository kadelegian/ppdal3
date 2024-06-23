<?php

use function PHPUnit\Framework\isNull;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piutang_kartu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Piutang_kartu_model', 'piutang_kartu_model');
    }
    public function create_batch()
    {
        $this->piutang_kartu_model->clear_tabel_piutang();
        $this->piutang_kartu_model->create_batch();
    }
}
