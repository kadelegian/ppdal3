<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div style="width: 100%;align-content:center;display:flex;" class="print-none">
    <div style="margin-left: auto;margin-right:auto;width:auto;">
        <form class="form-inline" action="<?= base_url('transaksi_iuran/download') ?>" method="post" target="_blank">
            <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
            <input type="submit" value="Download PDF">
            <button onclick="window.print()">Print</button>
        </form>
    </div>
</div>