<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2024-06-11 20:51:01 --> Config Class Initialized
INFO - 2024-06-11 20:51:01 --> Hooks Class Initialized
DEBUG - 2024-06-11 20:51:01 --> UTF-8 Support Enabled
INFO - 2024-06-11 20:51:01 --> Utf8 Class Initialized
INFO - 2024-06-11 20:51:01 --> URI Class Initialized
INFO - 2024-06-11 20:51:01 --> Router Class Initialized
INFO - 2024-06-11 20:51:01 --> Output Class Initialized
INFO - 2024-06-11 20:51:01 --> Security Class Initialized
DEBUG - 2024-06-11 20:51:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 20:51:01 --> Input Class Initialized
INFO - 2024-06-11 20:51:01 --> Language Class Initialized
INFO - 2024-06-11 20:51:01 --> Loader Class Initialized
INFO - 2024-06-11 20:51:01 --> Helper loaded: form_helper
INFO - 2024-06-11 20:51:01 --> Helper loaded: url_helper
INFO - 2024-06-11 20:51:01 --> Database Driver Class Initialized
INFO - 2024-06-11 20:51:01 --> Form Validation Class Initialized
DEBUG - 2024-06-11 20:51:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 20:51:01 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 20:51:01 --> Controller Class Initialized
INFO - 2024-06-11 20:51:01 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 20:51:01 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 20:51:01 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 20:51:01 --> Pagination Class Initialized
INFO - 2024-06-11 20:51:01 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
ORDER BY `jurnal`.`tanggal` ASC
 LIMIT 22, 0
INFO - 2024-06-11 20:51:01 --> Model "Akun_model" initialized
INFO - 2024-06-11 20:51:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 20:51:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 20:51:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 20:51:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 20:51:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 20:51:01 --> Final output sent to browser
DEBUG - 2024-06-11 20:51:01 --> Total execution time: 0.0352
INFO - 2024-06-11 21:00:27 --> Config Class Initialized
INFO - 2024-06-11 21:00:27 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:00:27 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:00:27 --> Utf8 Class Initialized
INFO - 2024-06-11 21:00:27 --> URI Class Initialized
INFO - 2024-06-11 21:00:27 --> Router Class Initialized
INFO - 2024-06-11 21:00:27 --> Output Class Initialized
INFO - 2024-06-11 21:00:27 --> Security Class Initialized
DEBUG - 2024-06-11 21:00:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:00:27 --> Input Class Initialized
INFO - 2024-06-11 21:00:27 --> Language Class Initialized
INFO - 2024-06-11 21:00:27 --> Loader Class Initialized
INFO - 2024-06-11 21:00:27 --> Helper loaded: form_helper
INFO - 2024-06-11 21:00:27 --> Helper loaded: url_helper
INFO - 2024-06-11 21:00:27 --> Database Driver Class Initialized
INFO - 2024-06-11 21:00:27 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:00:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:00:27 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:00:27 --> Controller Class Initialized
INFO - 2024-06-11 21:00:27 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:00:27 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:00:27 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:00:27 --> Pagination Class Initialized
INFO - 2024-06-11 21:00:27 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22, 0
INFO - 2024-06-11 21:00:27 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:00:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:00:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:00:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:00:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:00:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:00:27 --> Final output sent to browser
DEBUG - 2024-06-11 21:00:27 --> Total execution time: 0.0204
INFO - 2024-06-11 21:00:38 --> Config Class Initialized
INFO - 2024-06-11 21:00:38 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:00:38 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:00:38 --> Utf8 Class Initialized
INFO - 2024-06-11 21:00:38 --> URI Class Initialized
INFO - 2024-06-11 21:00:38 --> Router Class Initialized
INFO - 2024-06-11 21:00:38 --> Output Class Initialized
INFO - 2024-06-11 21:00:38 --> Security Class Initialized
DEBUG - 2024-06-11 21:00:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:00:38 --> Input Class Initialized
INFO - 2024-06-11 21:00:38 --> Language Class Initialized
INFO - 2024-06-11 21:00:38 --> Loader Class Initialized
INFO - 2024-06-11 21:00:38 --> Helper loaded: form_helper
INFO - 2024-06-11 21:00:38 --> Helper loaded: url_helper
INFO - 2024-06-11 21:00:38 --> Database Driver Class Initialized
INFO - 2024-06-11 21:00:38 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:00:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:00:38 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:00:38 --> Controller Class Initialized
INFO - 2024-06-11 21:00:38 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:00:38 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:00:38 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:00:38 --> Pagination Class Initialized
INFO - 2024-06-11 21:00:38 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
INFO - 2024-06-11 21:00:38 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:00:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:00:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:00:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Undefined variable $data_akun E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Attempt to read property "sn" on null E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Undefined variable $data_akun E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Attempt to read property "sn" on null E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Undefined variable $data_akun E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Attempt to read property "sn" on null E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Undefined variable $data_akun E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Attempt to read property "sn" on null E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Undefined variable $data_akun E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Attempt to read property "sn" on null E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Undefined variable $data_akun E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
ERROR - 2024-06-11 21:00:38 --> Severity: Warning --> Attempt to read property "sn" on null E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 61
INFO - 2024-06-11 21:00:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:00:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:00:38 --> Final output sent to browser
DEBUG - 2024-06-11 21:00:38 --> Total execution time: 0.0203
INFO - 2024-06-11 21:02:38 --> Config Class Initialized
INFO - 2024-06-11 21:02:38 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:02:38 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:02:38 --> Utf8 Class Initialized
INFO - 2024-06-11 21:02:38 --> URI Class Initialized
INFO - 2024-06-11 21:02:38 --> Router Class Initialized
INFO - 2024-06-11 21:02:38 --> Output Class Initialized
INFO - 2024-06-11 21:02:38 --> Security Class Initialized
DEBUG - 2024-06-11 21:02:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:02:38 --> Input Class Initialized
INFO - 2024-06-11 21:02:38 --> Language Class Initialized
INFO - 2024-06-11 21:02:38 --> Loader Class Initialized
INFO - 2024-06-11 21:02:38 --> Helper loaded: form_helper
INFO - 2024-06-11 21:02:38 --> Helper loaded: url_helper
INFO - 2024-06-11 21:02:38 --> Database Driver Class Initialized
INFO - 2024-06-11 21:02:38 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:02:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:02:38 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:02:38 --> Controller Class Initialized
INFO - 2024-06-11 21:02:38 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:02:38 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:02:38 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:02:38 --> Pagination Class Initialized
INFO - 2024-06-11 21:02:38 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
INFO - 2024-06-11 21:02:38 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:02:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:02:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:02:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:02:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:02:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:02:38 --> Final output sent to browser
DEBUG - 2024-06-11 21:02:38 --> Total execution time: 0.0427
INFO - 2024-06-11 21:05:15 --> Config Class Initialized
INFO - 2024-06-11 21:05:15 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:05:15 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:05:15 --> Utf8 Class Initialized
INFO - 2024-06-11 21:05:15 --> URI Class Initialized
INFO - 2024-06-11 21:05:15 --> Router Class Initialized
INFO - 2024-06-11 21:05:15 --> Output Class Initialized
INFO - 2024-06-11 21:05:15 --> Security Class Initialized
DEBUG - 2024-06-11 21:05:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:05:15 --> Input Class Initialized
INFO - 2024-06-11 21:05:15 --> Language Class Initialized
INFO - 2024-06-11 21:05:15 --> Loader Class Initialized
INFO - 2024-06-11 21:05:15 --> Helper loaded: form_helper
INFO - 2024-06-11 21:05:15 --> Helper loaded: url_helper
INFO - 2024-06-11 21:05:15 --> Database Driver Class Initialized
INFO - 2024-06-11 21:05:15 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:05:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:05:15 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:05:15 --> Controller Class Initialized
INFO - 2024-06-11 21:05:15 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:05:15 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:05:15 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:05:15 --> Pagination Class Initialized
INFO - 2024-06-11 21:05:15 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
INFO - 2024-06-11 21:05:15 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:05:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:05:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:05:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:05:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:05:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:05:15 --> Final output sent to browser
DEBUG - 2024-06-11 21:05:15 --> Total execution time: 0.0186
INFO - 2024-06-11 21:05:50 --> Config Class Initialized
INFO - 2024-06-11 21:05:50 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:05:50 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:05:50 --> Utf8 Class Initialized
INFO - 2024-06-11 21:05:50 --> URI Class Initialized
INFO - 2024-06-11 21:05:50 --> Router Class Initialized
INFO - 2024-06-11 21:05:50 --> Output Class Initialized
INFO - 2024-06-11 21:05:50 --> Security Class Initialized
DEBUG - 2024-06-11 21:05:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:05:50 --> Input Class Initialized
INFO - 2024-06-11 21:05:50 --> Language Class Initialized
INFO - 2024-06-11 21:05:50 --> Loader Class Initialized
INFO - 2024-06-11 21:05:50 --> Helper loaded: form_helper
INFO - 2024-06-11 21:05:50 --> Helper loaded: url_helper
INFO - 2024-06-11 21:05:50 --> Database Driver Class Initialized
INFO - 2024-06-11 21:05:50 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:05:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:05:50 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:05:50 --> Controller Class Initialized
INFO - 2024-06-11 21:05:50 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:05:50 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:05:50 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:05:50 --> Pagination Class Initialized
INFO - 2024-06-11 21:05:50 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
INFO - 2024-06-11 21:05:50 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:05:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:05:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:05:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:05:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:05:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:05:50 --> Final output sent to browser
DEBUG - 2024-06-11 21:05:50 --> Total execution time: 0.0225
INFO - 2024-06-11 21:07:02 --> Config Class Initialized
INFO - 2024-06-11 21:07:02 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:07:02 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:07:02 --> Utf8 Class Initialized
INFO - 2024-06-11 21:07:02 --> URI Class Initialized
INFO - 2024-06-11 21:07:02 --> Router Class Initialized
INFO - 2024-06-11 21:07:02 --> Output Class Initialized
INFO - 2024-06-11 21:07:02 --> Security Class Initialized
DEBUG - 2024-06-11 21:07:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:07:02 --> Input Class Initialized
INFO - 2024-06-11 21:07:02 --> Language Class Initialized
INFO - 2024-06-11 21:07:02 --> Loader Class Initialized
INFO - 2024-06-11 21:07:02 --> Helper loaded: form_helper
INFO - 2024-06-11 21:07:02 --> Helper loaded: url_helper
INFO - 2024-06-11 21:07:02 --> Database Driver Class Initialized
INFO - 2024-06-11 21:07:02 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:07:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:07:02 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:07:02 --> Controller Class Initialized
INFO - 2024-06-11 21:07:02 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:07:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:07:02 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:07:02 --> Pagination Class Initialized
INFO - 2024-06-11 21:07:02 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
INFO - 2024-06-11 21:07:02 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:07:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:07:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:07:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:07:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:07:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:07:02 --> Final output sent to browser
DEBUG - 2024-06-11 21:07:02 --> Total execution time: 0.0186
INFO - 2024-06-11 21:11:40 --> Config Class Initialized
INFO - 2024-06-11 21:11:40 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:11:40 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:11:40 --> Utf8 Class Initialized
INFO - 2024-06-11 21:11:40 --> URI Class Initialized
INFO - 2024-06-11 21:11:40 --> Router Class Initialized
INFO - 2024-06-11 21:11:40 --> Output Class Initialized
INFO - 2024-06-11 21:11:40 --> Security Class Initialized
DEBUG - 2024-06-11 21:11:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:11:40 --> Input Class Initialized
INFO - 2024-06-11 21:11:40 --> Language Class Initialized
INFO - 2024-06-11 21:11:40 --> Loader Class Initialized
INFO - 2024-06-11 21:11:40 --> Helper loaded: form_helper
INFO - 2024-06-11 21:11:40 --> Helper loaded: url_helper
INFO - 2024-06-11 21:11:40 --> Database Driver Class Initialized
INFO - 2024-06-11 21:11:40 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:11:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:11:40 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:11:40 --> Controller Class Initialized
INFO - 2024-06-11 21:11:40 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:11:40 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:11:40 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:11:40 --> Pagination Class Initialized
INFO - 2024-06-11 21:11:40 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:11:40 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:11:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:11:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:11:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:11:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:11:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:11:40 --> Final output sent to browser
DEBUG - 2024-06-11 21:11:40 --> Total execution time: 0.0315
INFO - 2024-06-11 21:13:29 --> Config Class Initialized
INFO - 2024-06-11 21:13:29 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:13:29 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:13:29 --> Utf8 Class Initialized
INFO - 2024-06-11 21:13:29 --> URI Class Initialized
INFO - 2024-06-11 21:13:29 --> Router Class Initialized
INFO - 2024-06-11 21:13:29 --> Output Class Initialized
INFO - 2024-06-11 21:13:29 --> Security Class Initialized
DEBUG - 2024-06-11 21:13:29 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:13:29 --> Input Class Initialized
INFO - 2024-06-11 21:13:29 --> Language Class Initialized
INFO - 2024-06-11 21:13:29 --> Loader Class Initialized
INFO - 2024-06-11 21:13:29 --> Helper loaded: form_helper
INFO - 2024-06-11 21:13:29 --> Helper loaded: url_helper
INFO - 2024-06-11 21:13:29 --> Database Driver Class Initialized
INFO - 2024-06-11 21:13:29 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:13:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:13:29 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:13:29 --> Controller Class Initialized
INFO - 2024-06-11 21:13:29 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:13:29 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:13:29 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:13:29 --> Pagination Class Initialized
INFO - 2024-06-11 21:13:29 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:13:29 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:13:29 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:13:29 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:13:29 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:13:29 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:13:29 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:13:29 --> Final output sent to browser
DEBUG - 2024-06-11 21:13:29 --> Total execution time: 0.0429
INFO - 2024-06-11 21:13:43 --> Config Class Initialized
INFO - 2024-06-11 21:13:43 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:13:43 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:13:43 --> Utf8 Class Initialized
INFO - 2024-06-11 21:13:43 --> URI Class Initialized
INFO - 2024-06-11 21:13:43 --> Router Class Initialized
INFO - 2024-06-11 21:13:43 --> Output Class Initialized
INFO - 2024-06-11 21:13:43 --> Security Class Initialized
DEBUG - 2024-06-11 21:13:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:13:43 --> Input Class Initialized
INFO - 2024-06-11 21:13:43 --> Language Class Initialized
INFO - 2024-06-11 21:13:43 --> Loader Class Initialized
INFO - 2024-06-11 21:13:43 --> Helper loaded: form_helper
INFO - 2024-06-11 21:13:43 --> Helper loaded: url_helper
INFO - 2024-06-11 21:13:43 --> Database Driver Class Initialized
INFO - 2024-06-11 21:13:43 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:13:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:13:43 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:13:43 --> Controller Class Initialized
INFO - 2024-06-11 21:13:43 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:13:43 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:13:43 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:13:43 --> Pagination Class Initialized
INFO - 2024-06-11 21:13:43 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:13:43 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:13:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:13:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:13:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:13:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:13:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:13:43 --> Final output sent to browser
DEBUG - 2024-06-11 21:13:43 --> Total execution time: 0.0193
INFO - 2024-06-11 21:13:56 --> Config Class Initialized
INFO - 2024-06-11 21:13:56 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:13:56 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:13:56 --> Utf8 Class Initialized
INFO - 2024-06-11 21:13:56 --> URI Class Initialized
INFO - 2024-06-11 21:13:56 --> Router Class Initialized
INFO - 2024-06-11 21:13:56 --> Output Class Initialized
INFO - 2024-06-11 21:13:56 --> Security Class Initialized
DEBUG - 2024-06-11 21:13:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:13:56 --> Input Class Initialized
INFO - 2024-06-11 21:13:56 --> Language Class Initialized
INFO - 2024-06-11 21:13:56 --> Loader Class Initialized
INFO - 2024-06-11 21:13:56 --> Helper loaded: form_helper
INFO - 2024-06-11 21:13:56 --> Helper loaded: url_helper
INFO - 2024-06-11 21:13:56 --> Database Driver Class Initialized
INFO - 2024-06-11 21:13:56 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:13:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:13:56 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:13:56 --> Controller Class Initialized
INFO - 2024-06-11 21:13:56 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:13:56 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:13:56 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:13:56 --> Pagination Class Initialized
INFO - 2024-06-11 21:13:56 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:13:56 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:13:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:13:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:13:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:13:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:13:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:13:56 --> Final output sent to browser
DEBUG - 2024-06-11 21:13:56 --> Total execution time: 0.0188
INFO - 2024-06-11 21:14:01 --> Config Class Initialized
INFO - 2024-06-11 21:14:01 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:14:01 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:14:01 --> Utf8 Class Initialized
INFO - 2024-06-11 21:14:01 --> URI Class Initialized
INFO - 2024-06-11 21:14:01 --> Router Class Initialized
INFO - 2024-06-11 21:14:01 --> Output Class Initialized
INFO - 2024-06-11 21:14:01 --> Security Class Initialized
DEBUG - 2024-06-11 21:14:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:14:01 --> Input Class Initialized
INFO - 2024-06-11 21:14:01 --> Language Class Initialized
INFO - 2024-06-11 21:14:01 --> Loader Class Initialized
INFO - 2024-06-11 21:14:01 --> Helper loaded: form_helper
INFO - 2024-06-11 21:14:01 --> Helper loaded: url_helper
INFO - 2024-06-11 21:14:01 --> Database Driver Class Initialized
INFO - 2024-06-11 21:14:01 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:14:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:14:01 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:14:01 --> Controller Class Initialized
INFO - 2024-06-11 21:14:01 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:14:01 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:14:01 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:14:01 --> Pagination Class Initialized
INFO - 2024-06-11 21:14:01 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:14:01 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:14:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:14:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:14:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:14:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:14:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:14:01 --> Final output sent to browser
DEBUG - 2024-06-11 21:14:01 --> Total execution time: 0.0199
INFO - 2024-06-11 21:14:42 --> Config Class Initialized
INFO - 2024-06-11 21:14:42 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:14:42 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:14:42 --> Utf8 Class Initialized
INFO - 2024-06-11 21:14:42 --> URI Class Initialized
INFO - 2024-06-11 21:14:42 --> Router Class Initialized
INFO - 2024-06-11 21:14:42 --> Output Class Initialized
INFO - 2024-06-11 21:14:42 --> Security Class Initialized
DEBUG - 2024-06-11 21:14:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:14:42 --> Input Class Initialized
INFO - 2024-06-11 21:14:42 --> Language Class Initialized
INFO - 2024-06-11 21:14:42 --> Loader Class Initialized
INFO - 2024-06-11 21:14:42 --> Helper loaded: form_helper
INFO - 2024-06-11 21:14:42 --> Helper loaded: url_helper
INFO - 2024-06-11 21:14:42 --> Database Driver Class Initialized
INFO - 2024-06-11 21:14:42 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:14:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:14:42 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:14:42 --> Controller Class Initialized
INFO - 2024-06-11 21:14:42 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:14:42 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:14:42 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:14:42 --> Pagination Class Initialized
INFO - 2024-06-11 21:14:42 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:14:42 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:14:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:14:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:14:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:14:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:14:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:14:42 --> Final output sent to browser
DEBUG - 2024-06-11 21:14:42 --> Total execution time: 0.0403
INFO - 2024-06-11 21:15:21 --> Config Class Initialized
INFO - 2024-06-11 21:15:21 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:15:21 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:15:21 --> Utf8 Class Initialized
INFO - 2024-06-11 21:15:21 --> URI Class Initialized
INFO - 2024-06-11 21:15:21 --> Router Class Initialized
INFO - 2024-06-11 21:15:21 --> Output Class Initialized
INFO - 2024-06-11 21:15:21 --> Security Class Initialized
DEBUG - 2024-06-11 21:15:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:15:21 --> Input Class Initialized
INFO - 2024-06-11 21:15:21 --> Language Class Initialized
INFO - 2024-06-11 21:15:21 --> Loader Class Initialized
INFO - 2024-06-11 21:15:21 --> Helper loaded: form_helper
INFO - 2024-06-11 21:15:21 --> Helper loaded: url_helper
INFO - 2024-06-11 21:15:21 --> Database Driver Class Initialized
INFO - 2024-06-11 21:15:21 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:15:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:15:21 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:15:21 --> Controller Class Initialized
INFO - 2024-06-11 21:15:21 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:15:21 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:15:21 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:15:21 --> Pagination Class Initialized
INFO - 2024-06-11 21:15:21 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:15:21 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:15:21 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:15:21 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:15:21 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:15:21 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:15:21 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:15:21 --> Final output sent to browser
DEBUG - 2024-06-11 21:15:21 --> Total execution time: 0.0419
INFO - 2024-06-11 21:16:04 --> Config Class Initialized
INFO - 2024-06-11 21:16:04 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:16:04 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:16:04 --> Utf8 Class Initialized
INFO - 2024-06-11 21:16:04 --> URI Class Initialized
INFO - 2024-06-11 21:16:04 --> Router Class Initialized
INFO - 2024-06-11 21:16:04 --> Output Class Initialized
INFO - 2024-06-11 21:16:04 --> Security Class Initialized
DEBUG - 2024-06-11 21:16:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:16:04 --> Input Class Initialized
INFO - 2024-06-11 21:16:04 --> Language Class Initialized
INFO - 2024-06-11 21:16:04 --> Loader Class Initialized
INFO - 2024-06-11 21:16:04 --> Helper loaded: form_helper
INFO - 2024-06-11 21:16:04 --> Helper loaded: url_helper
INFO - 2024-06-11 21:16:04 --> Database Driver Class Initialized
INFO - 2024-06-11 21:16:04 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:16:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:16:04 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:16:04 --> Controller Class Initialized
INFO - 2024-06-11 21:16:04 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:16:04 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:16:04 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:16:04 --> Pagination Class Initialized
INFO - 2024-06-11 21:16:04 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:16:04 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:16:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:16:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:16:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:16:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:16:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:16:04 --> Final output sent to browser
DEBUG - 2024-06-11 21:16:04 --> Total execution time: 0.0419
INFO - 2024-06-11 21:16:33 --> Config Class Initialized
INFO - 2024-06-11 21:16:33 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:16:33 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:16:33 --> Utf8 Class Initialized
INFO - 2024-06-11 21:16:33 --> URI Class Initialized
INFO - 2024-06-11 21:16:33 --> Router Class Initialized
INFO - 2024-06-11 21:16:33 --> Output Class Initialized
INFO - 2024-06-11 21:16:33 --> Security Class Initialized
DEBUG - 2024-06-11 21:16:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:16:33 --> Input Class Initialized
INFO - 2024-06-11 21:16:33 --> Language Class Initialized
INFO - 2024-06-11 21:16:33 --> Loader Class Initialized
INFO - 2024-06-11 21:16:33 --> Helper loaded: form_helper
INFO - 2024-06-11 21:16:33 --> Helper loaded: url_helper
INFO - 2024-06-11 21:16:33 --> Database Driver Class Initialized
INFO - 2024-06-11 21:16:33 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:16:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:16:33 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:16:33 --> Controller Class Initialized
INFO - 2024-06-11 21:16:33 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:16:33 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:16:33 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:16:33 --> Pagination Class Initialized
INFO - 2024-06-11 21:16:33 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:16:33 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:16:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:16:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:16:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:16:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:16:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:16:33 --> Final output sent to browser
DEBUG - 2024-06-11 21:16:33 --> Total execution time: 0.0310
INFO - 2024-06-11 21:16:37 --> Config Class Initialized
INFO - 2024-06-11 21:16:37 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:16:37 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:16:37 --> Utf8 Class Initialized
INFO - 2024-06-11 21:16:37 --> URI Class Initialized
INFO - 2024-06-11 21:16:37 --> Router Class Initialized
INFO - 2024-06-11 21:16:37 --> Output Class Initialized
INFO - 2024-06-11 21:16:37 --> Security Class Initialized
DEBUG - 2024-06-11 21:16:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:16:37 --> Input Class Initialized
INFO - 2024-06-11 21:16:37 --> Language Class Initialized
INFO - 2024-06-11 21:16:37 --> Loader Class Initialized
INFO - 2024-06-11 21:16:37 --> Helper loaded: form_helper
INFO - 2024-06-11 21:16:37 --> Helper loaded: url_helper
INFO - 2024-06-11 21:16:37 --> Database Driver Class Initialized
INFO - 2024-06-11 21:16:37 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:16:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:16:37 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:16:37 --> Controller Class Initialized
INFO - 2024-06-11 21:16:37 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:16:37 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:16:37 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:16:37 --> Pagination Class Initialized
INFO - 2024-06-11 21:16:37 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:16:37 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:16:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:16:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:16:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:16:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:16:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:16:37 --> Final output sent to browser
DEBUG - 2024-06-11 21:16:37 --> Total execution time: 0.0193
INFO - 2024-06-11 21:18:09 --> Config Class Initialized
INFO - 2024-06-11 21:18:09 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:18:09 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:18:09 --> Utf8 Class Initialized
INFO - 2024-06-11 21:18:09 --> URI Class Initialized
DEBUG - 2024-06-11 21:18:09 --> No URI present. Default controller set.
INFO - 2024-06-11 21:18:09 --> Router Class Initialized
INFO - 2024-06-11 21:18:09 --> Output Class Initialized
INFO - 2024-06-11 21:18:09 --> Security Class Initialized
DEBUG - 2024-06-11 21:18:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:18:09 --> Input Class Initialized
INFO - 2024-06-11 21:18:09 --> Language Class Initialized
INFO - 2024-06-11 21:18:09 --> Loader Class Initialized
INFO - 2024-06-11 21:18:09 --> Helper loaded: form_helper
INFO - 2024-06-11 21:18:09 --> Helper loaded: url_helper
INFO - 2024-06-11 21:18:09 --> Database Driver Class Initialized
INFO - 2024-06-11 21:18:09 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:18:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:18:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:18:09 --> Controller Class Initialized
INFO - 2024-06-11 21:18:09 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-11 21:18:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:18:09 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:18:09 --> Pagination Class Initialized
INFO - 2024-06-11 21:18:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:18:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:18:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-11 21:18:09 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
INFO - 2024-06-11 21:18:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/pedagang_list.php
INFO - 2024-06-11 21:18:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:18:09 --> Final output sent to browser
DEBUG - 2024-06-11 21:18:09 --> Total execution time: 0.0287
INFO - 2024-06-11 21:18:12 --> Config Class Initialized
INFO - 2024-06-11 21:18:12 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:18:12 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:18:12 --> Utf8 Class Initialized
INFO - 2024-06-11 21:18:12 --> URI Class Initialized
INFO - 2024-06-11 21:18:12 --> Router Class Initialized
INFO - 2024-06-11 21:18:12 --> Output Class Initialized
INFO - 2024-06-11 21:18:12 --> Security Class Initialized
DEBUG - 2024-06-11 21:18:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:18:12 --> Input Class Initialized
INFO - 2024-06-11 21:18:12 --> Language Class Initialized
INFO - 2024-06-11 21:18:12 --> Loader Class Initialized
INFO - 2024-06-11 21:18:12 --> Helper loaded: form_helper
INFO - 2024-06-11 21:18:12 --> Helper loaded: url_helper
INFO - 2024-06-11 21:18:12 --> Database Driver Class Initialized
INFO - 2024-06-11 21:18:13 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:18:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:18:13 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:18:13 --> Controller Class Initialized
INFO - 2024-06-11 21:18:13 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:18:13 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:18:13 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:18:13 --> Pagination Class Initialized
INFO - 2024-06-11 21:18:13 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:18:13 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:18:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:18:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:18:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-11 21:18:13 --> Severity: error --> Exception: Undefined constant "id" E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 36
INFO - 2024-06-11 21:18:44 --> Config Class Initialized
INFO - 2024-06-11 21:18:44 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:18:44 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:18:44 --> Utf8 Class Initialized
INFO - 2024-06-11 21:18:44 --> URI Class Initialized
INFO - 2024-06-11 21:18:44 --> Router Class Initialized
INFO - 2024-06-11 21:18:44 --> Output Class Initialized
INFO - 2024-06-11 21:18:44 --> Security Class Initialized
DEBUG - 2024-06-11 21:18:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:18:44 --> Input Class Initialized
INFO - 2024-06-11 21:18:44 --> Language Class Initialized
INFO - 2024-06-11 21:18:44 --> Loader Class Initialized
INFO - 2024-06-11 21:18:44 --> Helper loaded: form_helper
INFO - 2024-06-11 21:18:44 --> Helper loaded: url_helper
INFO - 2024-06-11 21:18:44 --> Database Driver Class Initialized
INFO - 2024-06-11 21:18:44 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:18:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:18:44 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:18:44 --> Controller Class Initialized
INFO - 2024-06-11 21:18:44 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:18:44 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:18:44 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:18:44 --> Pagination Class Initialized
INFO - 2024-06-11 21:18:44 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:18:44 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:18:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:18:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:18:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:18:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:18:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:18:44 --> Final output sent to browser
DEBUG - 2024-06-11 21:18:44 --> Total execution time: 0.0407
INFO - 2024-06-11 21:18:50 --> Config Class Initialized
INFO - 2024-06-11 21:18:50 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:18:50 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:18:50 --> Utf8 Class Initialized
INFO - 2024-06-11 21:18:50 --> URI Class Initialized
INFO - 2024-06-11 21:18:50 --> Router Class Initialized
INFO - 2024-06-11 21:18:50 --> Output Class Initialized
INFO - 2024-06-11 21:18:50 --> Security Class Initialized
DEBUG - 2024-06-11 21:18:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:18:50 --> Input Class Initialized
INFO - 2024-06-11 21:18:50 --> Language Class Initialized
INFO - 2024-06-11 21:18:50 --> Loader Class Initialized
INFO - 2024-06-11 21:18:50 --> Helper loaded: form_helper
INFO - 2024-06-11 21:18:50 --> Helper loaded: url_helper
INFO - 2024-06-11 21:18:50 --> Database Driver Class Initialized
INFO - 2024-06-11 21:18:50 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:18:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:18:50 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:18:50 --> Controller Class Initialized
INFO - 2024-06-11 21:18:50 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:18:50 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:18:50 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:18:50 --> Pagination Class Initialized
INFO - 2024-06-11 21:18:50 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:18:50 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:18:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:18:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:18:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:18:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:18:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:18:50 --> Final output sent to browser
DEBUG - 2024-06-11 21:18:50 --> Total execution time: 0.0200
INFO - 2024-06-11 21:18:53 --> Config Class Initialized
INFO - 2024-06-11 21:18:53 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:18:53 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:18:53 --> Utf8 Class Initialized
INFO - 2024-06-11 21:18:53 --> URI Class Initialized
INFO - 2024-06-11 21:18:53 --> Router Class Initialized
INFO - 2024-06-11 21:18:53 --> Output Class Initialized
INFO - 2024-06-11 21:18:53 --> Security Class Initialized
DEBUG - 2024-06-11 21:18:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:18:53 --> Input Class Initialized
INFO - 2024-06-11 21:18:53 --> Language Class Initialized
INFO - 2024-06-11 21:18:53 --> Loader Class Initialized
INFO - 2024-06-11 21:18:53 --> Helper loaded: form_helper
INFO - 2024-06-11 21:18:53 --> Helper loaded: url_helper
INFO - 2024-06-11 21:18:53 --> Database Driver Class Initialized
INFO - 2024-06-11 21:18:53 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:18:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:18:53 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:18:53 --> Controller Class Initialized
INFO - 2024-06-11 21:18:53 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:18:53 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:18:53 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:18:53 --> Pagination Class Initialized
INFO - 2024-06-11 21:18:53 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:18:53 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:18:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:18:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:18:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:18:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:18:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:18:53 --> Final output sent to browser
DEBUG - 2024-06-11 21:18:53 --> Total execution time: 0.0395
INFO - 2024-06-11 21:18:57 --> Config Class Initialized
INFO - 2024-06-11 21:18:57 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:18:57 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:18:57 --> Utf8 Class Initialized
INFO - 2024-06-11 21:18:57 --> URI Class Initialized
INFO - 2024-06-11 21:18:57 --> Router Class Initialized
INFO - 2024-06-11 21:18:57 --> Output Class Initialized
INFO - 2024-06-11 21:18:57 --> Security Class Initialized
DEBUG - 2024-06-11 21:18:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:18:57 --> Input Class Initialized
INFO - 2024-06-11 21:18:57 --> Language Class Initialized
INFO - 2024-06-11 21:18:57 --> Loader Class Initialized
INFO - 2024-06-11 21:18:57 --> Helper loaded: form_helper
INFO - 2024-06-11 21:18:57 --> Helper loaded: url_helper
INFO - 2024-06-11 21:18:57 --> Database Driver Class Initialized
INFO - 2024-06-11 21:18:57 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:18:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:18:57 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:18:57 --> Controller Class Initialized
INFO - 2024-06-11 21:18:57 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:18:57 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:18:57 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:18:57 --> Pagination Class Initialized
INFO - 2024-06-11 21:18:57 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:18:57 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:18:57 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:18:57 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:18:57 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:18:57 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:18:57 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:18:57 --> Final output sent to browser
DEBUG - 2024-06-11 21:18:57 --> Total execution time: 0.0191
INFO - 2024-06-11 21:23:03 --> Config Class Initialized
INFO - 2024-06-11 21:23:03 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:23:03 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:23:03 --> Utf8 Class Initialized
INFO - 2024-06-11 21:23:03 --> URI Class Initialized
INFO - 2024-06-11 21:23:03 --> Router Class Initialized
INFO - 2024-06-11 21:23:03 --> Output Class Initialized
INFO - 2024-06-11 21:23:03 --> Security Class Initialized
DEBUG - 2024-06-11 21:23:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:23:03 --> Input Class Initialized
INFO - 2024-06-11 21:23:03 --> Language Class Initialized
INFO - 2024-06-11 21:23:03 --> Loader Class Initialized
INFO - 2024-06-11 21:23:03 --> Helper loaded: form_helper
INFO - 2024-06-11 21:23:03 --> Helper loaded: url_helper
INFO - 2024-06-11 21:23:03 --> Database Driver Class Initialized
INFO - 2024-06-11 21:23:03 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:23:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:23:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:23:03 --> Controller Class Initialized
INFO - 2024-06-11 21:23:03 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:23:03 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:23:03 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:23:03 --> Pagination Class Initialized
INFO - 2024-06-11 21:23:03 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:23:03 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:23:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:23:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:23:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-11 21:23:03 --> Severity: error --> Exception: date(): Argument #2 ($timestamp) must be of type ?int, string given E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 17
INFO - 2024-06-11 21:23:41 --> Config Class Initialized
INFO - 2024-06-11 21:23:41 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:23:41 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:23:41 --> Utf8 Class Initialized
INFO - 2024-06-11 21:23:41 --> URI Class Initialized
INFO - 2024-06-11 21:23:41 --> Router Class Initialized
INFO - 2024-06-11 21:23:41 --> Output Class Initialized
INFO - 2024-06-11 21:23:41 --> Security Class Initialized
DEBUG - 2024-06-11 21:23:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:23:41 --> Input Class Initialized
INFO - 2024-06-11 21:23:41 --> Language Class Initialized
INFO - 2024-06-11 21:23:41 --> Loader Class Initialized
INFO - 2024-06-11 21:23:41 --> Helper loaded: form_helper
INFO - 2024-06-11 21:23:41 --> Helper loaded: url_helper
INFO - 2024-06-11 21:23:41 --> Database Driver Class Initialized
INFO - 2024-06-11 21:23:41 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:23:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:23:41 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:23:41 --> Controller Class Initialized
INFO - 2024-06-11 21:23:41 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:23:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:23:41 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:23:41 --> Pagination Class Initialized
INFO - 2024-06-11 21:23:41 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:23:41 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:23:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:23:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:23:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-11 21:23:41 --> Severity: error --> Exception: date(): Argument #2 ($timestamp) must be of type ?int, DateTime given E:\xampp\htdocs\ppdal\application\views\laporan\buku_besar.php 17
INFO - 2024-06-11 21:24:25 --> Config Class Initialized
INFO - 2024-06-11 21:24:25 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:24:25 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:24:25 --> Utf8 Class Initialized
INFO - 2024-06-11 21:24:25 --> URI Class Initialized
INFO - 2024-06-11 21:24:25 --> Router Class Initialized
INFO - 2024-06-11 21:24:25 --> Output Class Initialized
INFO - 2024-06-11 21:24:25 --> Security Class Initialized
DEBUG - 2024-06-11 21:24:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:24:25 --> Input Class Initialized
INFO - 2024-06-11 21:24:25 --> Language Class Initialized
INFO - 2024-06-11 21:24:25 --> Loader Class Initialized
INFO - 2024-06-11 21:24:25 --> Helper loaded: form_helper
INFO - 2024-06-11 21:24:25 --> Helper loaded: url_helper
INFO - 2024-06-11 21:24:25 --> Database Driver Class Initialized
INFO - 2024-06-11 21:24:25 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:24:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:24:25 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:24:25 --> Controller Class Initialized
INFO - 2024-06-11 21:24:25 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:24:25 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:24:25 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:24:25 --> Pagination Class Initialized
INFO - 2024-06-11 21:24:25 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:24:25 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:24:25 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:24:25 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:24:25 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:24:25 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:24:25 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:24:25 --> Final output sent to browser
DEBUG - 2024-06-11 21:24:25 --> Total execution time: 0.0408
INFO - 2024-06-11 21:24:59 --> Config Class Initialized
INFO - 2024-06-11 21:24:59 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:24:59 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:24:59 --> Utf8 Class Initialized
INFO - 2024-06-11 21:24:59 --> URI Class Initialized
INFO - 2024-06-11 21:24:59 --> Router Class Initialized
INFO - 2024-06-11 21:24:59 --> Output Class Initialized
INFO - 2024-06-11 21:24:59 --> Security Class Initialized
DEBUG - 2024-06-11 21:24:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:24:59 --> Input Class Initialized
INFO - 2024-06-11 21:24:59 --> Language Class Initialized
INFO - 2024-06-11 21:24:59 --> Loader Class Initialized
INFO - 2024-06-11 21:24:59 --> Helper loaded: form_helper
INFO - 2024-06-11 21:24:59 --> Helper loaded: url_helper
INFO - 2024-06-11 21:24:59 --> Database Driver Class Initialized
INFO - 2024-06-11 21:24:59 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:24:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:24:59 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:24:59 --> Controller Class Initialized
INFO - 2024-06-11 21:24:59 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:24:59 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:24:59 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:24:59 --> Pagination Class Initialized
INFO - 2024-06-11 21:24:59 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:24:59 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:24:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:24:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:24:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:24:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:24:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:24:59 --> Final output sent to browser
DEBUG - 2024-06-11 21:24:59 --> Total execution time: 0.0479
INFO - 2024-06-11 21:25:13 --> Config Class Initialized
INFO - 2024-06-11 21:25:13 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:25:13 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:25:13 --> Utf8 Class Initialized
INFO - 2024-06-11 21:25:13 --> URI Class Initialized
INFO - 2024-06-11 21:25:13 --> Router Class Initialized
INFO - 2024-06-11 21:25:13 --> Output Class Initialized
INFO - 2024-06-11 21:25:13 --> Security Class Initialized
DEBUG - 2024-06-11 21:25:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:25:13 --> Input Class Initialized
INFO - 2024-06-11 21:25:13 --> Language Class Initialized
INFO - 2024-06-11 21:25:13 --> Loader Class Initialized
INFO - 2024-06-11 21:25:13 --> Helper loaded: form_helper
INFO - 2024-06-11 21:25:13 --> Helper loaded: url_helper
INFO - 2024-06-11 21:25:13 --> Database Driver Class Initialized
INFO - 2024-06-11 21:25:13 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:25:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:25:13 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:25:13 --> Controller Class Initialized
INFO - 2024-06-11 21:25:13 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:25:13 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:25:13 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:25:13 --> Pagination Class Initialized
INFO - 2024-06-11 21:25:13 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:25:13 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:25:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:25:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:25:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:25:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:25:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:25:13 --> Final output sent to browser
DEBUG - 2024-06-11 21:25:13 --> Total execution time: 0.0441
INFO - 2024-06-11 21:25:24 --> Config Class Initialized
INFO - 2024-06-11 21:25:24 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:25:24 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:25:24 --> Utf8 Class Initialized
INFO - 2024-06-11 21:25:24 --> URI Class Initialized
INFO - 2024-06-11 21:25:24 --> Router Class Initialized
INFO - 2024-06-11 21:25:24 --> Output Class Initialized
INFO - 2024-06-11 21:25:24 --> Security Class Initialized
DEBUG - 2024-06-11 21:25:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:25:24 --> Input Class Initialized
INFO - 2024-06-11 21:25:24 --> Language Class Initialized
INFO - 2024-06-11 21:25:24 --> Loader Class Initialized
INFO - 2024-06-11 21:25:24 --> Helper loaded: form_helper
INFO - 2024-06-11 21:25:24 --> Helper loaded: url_helper
INFO - 2024-06-11 21:25:24 --> Database Driver Class Initialized
INFO - 2024-06-11 21:25:24 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:25:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:25:24 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:25:24 --> Controller Class Initialized
INFO - 2024-06-11 21:25:24 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:25:24 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:25:24 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:25:24 --> Pagination Class Initialized
INFO - 2024-06-11 21:25:24 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:25:24 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:25:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:25:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:25:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:25:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:25:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:25:24 --> Final output sent to browser
DEBUG - 2024-06-11 21:25:24 --> Total execution time: 0.0442
INFO - 2024-06-11 21:25:33 --> Config Class Initialized
INFO - 2024-06-11 21:25:33 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:25:33 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:25:33 --> Utf8 Class Initialized
INFO - 2024-06-11 21:25:33 --> URI Class Initialized
INFO - 2024-06-11 21:25:33 --> Router Class Initialized
INFO - 2024-06-11 21:25:33 --> Output Class Initialized
INFO - 2024-06-11 21:25:33 --> Security Class Initialized
DEBUG - 2024-06-11 21:25:33 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:25:33 --> Input Class Initialized
INFO - 2024-06-11 21:25:33 --> Language Class Initialized
INFO - 2024-06-11 21:25:33 --> Loader Class Initialized
INFO - 2024-06-11 21:25:33 --> Helper loaded: form_helper
INFO - 2024-06-11 21:25:33 --> Helper loaded: url_helper
INFO - 2024-06-11 21:25:33 --> Database Driver Class Initialized
INFO - 2024-06-11 21:25:33 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:25:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:25:33 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:25:33 --> Controller Class Initialized
INFO - 2024-06-11 21:25:33 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:25:33 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:25:33 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:25:33 --> Pagination Class Initialized
INFO - 2024-06-11 21:25:33 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:25:33 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:25:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:25:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:25:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:25:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:25:33 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:25:33 --> Final output sent to browser
DEBUG - 2024-06-11 21:25:33 --> Total execution time: 0.0190
INFO - 2024-06-11 21:25:54 --> Config Class Initialized
INFO - 2024-06-11 21:25:54 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:25:54 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:25:54 --> Utf8 Class Initialized
INFO - 2024-06-11 21:25:54 --> URI Class Initialized
INFO - 2024-06-11 21:25:54 --> Router Class Initialized
INFO - 2024-06-11 21:25:54 --> Output Class Initialized
INFO - 2024-06-11 21:25:54 --> Security Class Initialized
DEBUG - 2024-06-11 21:25:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:25:54 --> Input Class Initialized
INFO - 2024-06-11 21:25:54 --> Language Class Initialized
INFO - 2024-06-11 21:25:54 --> Loader Class Initialized
INFO - 2024-06-11 21:25:54 --> Helper loaded: form_helper
INFO - 2024-06-11 21:25:54 --> Helper loaded: url_helper
INFO - 2024-06-11 21:25:54 --> Database Driver Class Initialized
INFO - 2024-06-11 21:25:54 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:25:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:25:54 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:25:54 --> Controller Class Initialized
INFO - 2024-06-11 21:25:54 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:25:54 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:25:54 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:25:54 --> Pagination Class Initialized
INFO - 2024-06-11 21:25:54 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:25:54 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:25:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:25:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:25:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:25:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:25:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:25:54 --> Final output sent to browser
DEBUG - 2024-06-11 21:25:54 --> Total execution time: 0.0433
INFO - 2024-06-11 21:26:12 --> Config Class Initialized
INFO - 2024-06-11 21:26:12 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:26:12 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:26:12 --> Utf8 Class Initialized
INFO - 2024-06-11 21:26:12 --> URI Class Initialized
INFO - 2024-06-11 21:26:12 --> Router Class Initialized
INFO - 2024-06-11 21:26:12 --> Output Class Initialized
INFO - 2024-06-11 21:26:12 --> Security Class Initialized
DEBUG - 2024-06-11 21:26:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:26:12 --> Input Class Initialized
INFO - 2024-06-11 21:26:12 --> Language Class Initialized
INFO - 2024-06-11 21:26:12 --> Loader Class Initialized
INFO - 2024-06-11 21:26:12 --> Helper loaded: form_helper
INFO - 2024-06-11 21:26:12 --> Helper loaded: url_helper
INFO - 2024-06-11 21:26:12 --> Database Driver Class Initialized
INFO - 2024-06-11 21:26:12 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:26:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:26:12 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:26:12 --> Controller Class Initialized
INFO - 2024-06-11 21:26:12 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:26:12 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:26:12 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:26:12 --> Pagination Class Initialized
INFO - 2024-06-11 21:26:12 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:26:12 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:26:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:26:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:26:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:26:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:26:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:26:12 --> Final output sent to browser
DEBUG - 2024-06-11 21:26:12 --> Total execution time: 0.0413
INFO - 2024-06-11 21:27:14 --> Config Class Initialized
INFO - 2024-06-11 21:27:14 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:27:14 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:27:14 --> Utf8 Class Initialized
INFO - 2024-06-11 21:27:14 --> URI Class Initialized
INFO - 2024-06-11 21:27:14 --> Router Class Initialized
INFO - 2024-06-11 21:27:14 --> Output Class Initialized
INFO - 2024-06-11 21:27:14 --> Security Class Initialized
DEBUG - 2024-06-11 21:27:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:27:14 --> Input Class Initialized
INFO - 2024-06-11 21:27:14 --> Language Class Initialized
INFO - 2024-06-11 21:27:14 --> Loader Class Initialized
INFO - 2024-06-11 21:27:14 --> Helper loaded: form_helper
INFO - 2024-06-11 21:27:14 --> Helper loaded: url_helper
INFO - 2024-06-11 21:27:14 --> Database Driver Class Initialized
INFO - 2024-06-11 21:27:14 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:27:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:27:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:27:14 --> Controller Class Initialized
INFO - 2024-06-11 21:27:14 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:27:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:27:14 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:27:14 --> Pagination Class Initialized
INFO - 2024-06-11 21:27:14 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:27:14 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:27:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:27:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:27:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:27:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:27:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:27:14 --> Final output sent to browser
DEBUG - 2024-06-11 21:27:14 --> Total execution time: 0.0414
INFO - 2024-06-11 21:27:24 --> Config Class Initialized
INFO - 2024-06-11 21:27:24 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:27:24 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:27:24 --> Utf8 Class Initialized
INFO - 2024-06-11 21:27:24 --> URI Class Initialized
INFO - 2024-06-11 21:27:24 --> Router Class Initialized
INFO - 2024-06-11 21:27:24 --> Output Class Initialized
INFO - 2024-06-11 21:27:24 --> Security Class Initialized
DEBUG - 2024-06-11 21:27:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:27:24 --> Input Class Initialized
INFO - 2024-06-11 21:27:24 --> Language Class Initialized
INFO - 2024-06-11 21:27:24 --> Loader Class Initialized
INFO - 2024-06-11 21:27:24 --> Helper loaded: form_helper
INFO - 2024-06-11 21:27:24 --> Helper loaded: url_helper
INFO - 2024-06-11 21:27:24 --> Database Driver Class Initialized
INFO - 2024-06-11 21:27:24 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:27:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:27:24 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:27:24 --> Controller Class Initialized
INFO - 2024-06-11 21:27:24 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:27:24 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:27:24 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:27:24 --> Pagination Class Initialized
INFO - 2024-06-11 21:27:24 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:27:24 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:27:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:27:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:27:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:27:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:27:24 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:27:24 --> Final output sent to browser
DEBUG - 2024-06-11 21:27:24 --> Total execution time: 0.0185
INFO - 2024-06-11 21:28:16 --> Config Class Initialized
INFO - 2024-06-11 21:28:16 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:28:16 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:28:16 --> Utf8 Class Initialized
INFO - 2024-06-11 21:28:16 --> URI Class Initialized
INFO - 2024-06-11 21:28:16 --> Router Class Initialized
INFO - 2024-06-11 21:28:16 --> Output Class Initialized
INFO - 2024-06-11 21:28:16 --> Security Class Initialized
DEBUG - 2024-06-11 21:28:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:28:16 --> Input Class Initialized
INFO - 2024-06-11 21:28:16 --> Language Class Initialized
INFO - 2024-06-11 21:28:16 --> Loader Class Initialized
INFO - 2024-06-11 21:28:16 --> Helper loaded: form_helper
INFO - 2024-06-11 21:28:16 --> Helper loaded: url_helper
INFO - 2024-06-11 21:28:16 --> Database Driver Class Initialized
INFO - 2024-06-11 21:28:16 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:28:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:28:16 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:28:16 --> Controller Class Initialized
INFO - 2024-06-11 21:28:16 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:28:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:28:16 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:28:16 --> Pagination Class Initialized
INFO - 2024-06-11 21:28:16 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:28:16 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:28:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:28:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:28:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:28:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:28:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:28:16 --> Final output sent to browser
DEBUG - 2024-06-11 21:28:16 --> Total execution time: 0.0189
INFO - 2024-06-11 21:29:03 --> Config Class Initialized
INFO - 2024-06-11 21:29:03 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:29:03 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:29:03 --> Utf8 Class Initialized
INFO - 2024-06-11 21:29:03 --> URI Class Initialized
INFO - 2024-06-11 21:29:03 --> Router Class Initialized
INFO - 2024-06-11 21:29:03 --> Output Class Initialized
INFO - 2024-06-11 21:29:03 --> Security Class Initialized
DEBUG - 2024-06-11 21:29:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:29:03 --> Input Class Initialized
INFO - 2024-06-11 21:29:03 --> Language Class Initialized
INFO - 2024-06-11 21:29:03 --> Loader Class Initialized
INFO - 2024-06-11 21:29:03 --> Helper loaded: form_helper
INFO - 2024-06-11 21:29:03 --> Helper loaded: url_helper
INFO - 2024-06-11 21:29:03 --> Database Driver Class Initialized
INFO - 2024-06-11 21:29:03 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:29:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:29:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:29:03 --> Controller Class Initialized
INFO - 2024-06-11 21:29:03 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:29:03 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:29:03 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:29:03 --> Pagination Class Initialized
INFO - 2024-06-11 21:29:03 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:29:03 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:29:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:29:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:29:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:29:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:29:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:29:03 --> Final output sent to browser
DEBUG - 2024-06-11 21:29:03 --> Total execution time: 0.0412
INFO - 2024-06-11 21:29:09 --> Config Class Initialized
INFO - 2024-06-11 21:29:09 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:29:09 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:29:09 --> Utf8 Class Initialized
INFO - 2024-06-11 21:29:09 --> URI Class Initialized
INFO - 2024-06-11 21:29:09 --> Router Class Initialized
INFO - 2024-06-11 21:29:09 --> Output Class Initialized
INFO - 2024-06-11 21:29:09 --> Security Class Initialized
DEBUG - 2024-06-11 21:29:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:29:09 --> Input Class Initialized
INFO - 2024-06-11 21:29:09 --> Language Class Initialized
INFO - 2024-06-11 21:29:09 --> Loader Class Initialized
INFO - 2024-06-11 21:29:09 --> Helper loaded: form_helper
INFO - 2024-06-11 21:29:09 --> Helper loaded: url_helper
INFO - 2024-06-11 21:29:09 --> Database Driver Class Initialized
INFO - 2024-06-11 21:29:09 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:29:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:29:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:29:09 --> Controller Class Initialized
INFO - 2024-06-11 21:29:09 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:29:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:29:09 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:29:09 --> Pagination Class Initialized
INFO - 2024-06-11 21:29:09 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:29:09 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:29:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:29:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:29:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:29:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:29:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:29:09 --> Final output sent to browser
DEBUG - 2024-06-11 21:29:09 --> Total execution time: 0.0183
INFO - 2024-06-11 21:29:14 --> Config Class Initialized
INFO - 2024-06-11 21:29:14 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:29:14 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:29:14 --> Utf8 Class Initialized
INFO - 2024-06-11 21:29:14 --> URI Class Initialized
INFO - 2024-06-11 21:29:14 --> Router Class Initialized
INFO - 2024-06-11 21:29:14 --> Output Class Initialized
INFO - 2024-06-11 21:29:14 --> Security Class Initialized
DEBUG - 2024-06-11 21:29:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:29:14 --> Input Class Initialized
INFO - 2024-06-11 21:29:14 --> Language Class Initialized
INFO - 2024-06-11 21:29:14 --> Loader Class Initialized
INFO - 2024-06-11 21:29:14 --> Helper loaded: form_helper
INFO - 2024-06-11 21:29:14 --> Helper loaded: url_helper
INFO - 2024-06-11 21:29:14 --> Database Driver Class Initialized
INFO - 2024-06-11 21:29:14 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:29:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:29:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:29:14 --> Controller Class Initialized
INFO - 2024-06-11 21:29:14 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:29:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:29:14 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:29:14 --> Pagination Class Initialized
INFO - 2024-06-11 21:29:14 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:29:14 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:29:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:29:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:29:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:29:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:29:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:29:14 --> Final output sent to browser
DEBUG - 2024-06-11 21:29:14 --> Total execution time: 0.0182
INFO - 2024-06-11 21:30:19 --> Config Class Initialized
INFO - 2024-06-11 21:30:19 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:30:19 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:30:19 --> Utf8 Class Initialized
INFO - 2024-06-11 21:30:19 --> URI Class Initialized
INFO - 2024-06-11 21:30:19 --> Router Class Initialized
INFO - 2024-06-11 21:30:19 --> Output Class Initialized
INFO - 2024-06-11 21:30:19 --> Security Class Initialized
DEBUG - 2024-06-11 21:30:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:30:19 --> Input Class Initialized
INFO - 2024-06-11 21:30:19 --> Language Class Initialized
INFO - 2024-06-11 21:30:19 --> Loader Class Initialized
INFO - 2024-06-11 21:30:19 --> Helper loaded: form_helper
INFO - 2024-06-11 21:30:19 --> Helper loaded: url_helper
INFO - 2024-06-11 21:30:19 --> Database Driver Class Initialized
INFO - 2024-06-11 21:30:19 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:30:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:30:19 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:30:19 --> Controller Class Initialized
INFO - 2024-06-11 21:30:19 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:30:19 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:30:19 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:30:19 --> Pagination Class Initialized
INFO - 2024-06-11 21:30:19 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:30:19 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:30:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:30:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:30:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:30:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:30:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:30:19 --> Final output sent to browser
DEBUG - 2024-06-11 21:30:19 --> Total execution time: 0.0205
INFO - 2024-06-11 21:32:47 --> Config Class Initialized
INFO - 2024-06-11 21:32:47 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:32:47 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:32:47 --> Utf8 Class Initialized
INFO - 2024-06-11 21:32:47 --> URI Class Initialized
INFO - 2024-06-11 21:32:47 --> Router Class Initialized
INFO - 2024-06-11 21:32:47 --> Output Class Initialized
INFO - 2024-06-11 21:32:47 --> Security Class Initialized
DEBUG - 2024-06-11 21:32:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:32:47 --> Input Class Initialized
INFO - 2024-06-11 21:32:47 --> Language Class Initialized
INFO - 2024-06-11 21:32:47 --> Loader Class Initialized
INFO - 2024-06-11 21:32:47 --> Helper loaded: form_helper
INFO - 2024-06-11 21:32:47 --> Helper loaded: url_helper
INFO - 2024-06-11 21:32:47 --> Database Driver Class Initialized
INFO - 2024-06-11 21:32:47 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:32:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:32:47 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:32:47 --> Controller Class Initialized
INFO - 2024-06-11 21:32:47 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:32:47 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:32:47 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:32:47 --> Pagination Class Initialized
INFO - 2024-06-11 21:32:47 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:32:47 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:32:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:32:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:32:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:32:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:32:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:32:47 --> Final output sent to browser
DEBUG - 2024-06-11 21:32:47 --> Total execution time: 0.0420
INFO - 2024-06-11 21:33:01 --> Config Class Initialized
INFO - 2024-06-11 21:33:01 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:33:01 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:33:01 --> Utf8 Class Initialized
INFO - 2024-06-11 21:33:01 --> URI Class Initialized
INFO - 2024-06-11 21:33:01 --> Router Class Initialized
INFO - 2024-06-11 21:33:01 --> Output Class Initialized
INFO - 2024-06-11 21:33:01 --> Security Class Initialized
DEBUG - 2024-06-11 21:33:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:33:01 --> Input Class Initialized
INFO - 2024-06-11 21:33:01 --> Language Class Initialized
INFO - 2024-06-11 21:33:01 --> Loader Class Initialized
INFO - 2024-06-11 21:33:01 --> Helper loaded: form_helper
INFO - 2024-06-11 21:33:01 --> Helper loaded: url_helper
INFO - 2024-06-11 21:33:01 --> Database Driver Class Initialized
INFO - 2024-06-11 21:33:01 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:33:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:33:01 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:33:01 --> Controller Class Initialized
INFO - 2024-06-11 21:33:01 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:33:01 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:33:01 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:33:01 --> Pagination Class Initialized
INFO - 2024-06-11 21:33:01 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:33:01 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:33:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:33:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:33:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:33:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:33:01 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:33:01 --> Final output sent to browser
DEBUG - 2024-06-11 21:33:01 --> Total execution time: 0.0421
INFO - 2024-06-11 21:33:16 --> Config Class Initialized
INFO - 2024-06-11 21:33:16 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:33:16 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:33:16 --> Utf8 Class Initialized
INFO - 2024-06-11 21:33:16 --> URI Class Initialized
INFO - 2024-06-11 21:33:16 --> Router Class Initialized
INFO - 2024-06-11 21:33:16 --> Output Class Initialized
INFO - 2024-06-11 21:33:16 --> Security Class Initialized
DEBUG - 2024-06-11 21:33:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:33:16 --> Input Class Initialized
INFO - 2024-06-11 21:33:16 --> Language Class Initialized
INFO - 2024-06-11 21:33:16 --> Loader Class Initialized
INFO - 2024-06-11 21:33:16 --> Helper loaded: form_helper
INFO - 2024-06-11 21:33:16 --> Helper loaded: url_helper
INFO - 2024-06-11 21:33:16 --> Database Driver Class Initialized
INFO - 2024-06-11 21:33:16 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:33:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:33:16 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:33:16 --> Controller Class Initialized
INFO - 2024-06-11 21:33:16 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:33:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:33:16 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:33:16 --> Pagination Class Initialized
INFO - 2024-06-11 21:33:16 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:33:16 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:33:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:33:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:33:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:33:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:33:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:33:16 --> Final output sent to browser
DEBUG - 2024-06-11 21:33:16 --> Total execution time: 0.0422
INFO - 2024-06-11 21:33:34 --> Config Class Initialized
INFO - 2024-06-11 21:33:34 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:33:34 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:33:34 --> Utf8 Class Initialized
INFO - 2024-06-11 21:33:34 --> URI Class Initialized
INFO - 2024-06-11 21:33:34 --> Router Class Initialized
INFO - 2024-06-11 21:33:34 --> Output Class Initialized
INFO - 2024-06-11 21:33:34 --> Security Class Initialized
DEBUG - 2024-06-11 21:33:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:33:34 --> Input Class Initialized
INFO - 2024-06-11 21:33:34 --> Language Class Initialized
INFO - 2024-06-11 21:33:34 --> Loader Class Initialized
INFO - 2024-06-11 21:33:34 --> Helper loaded: form_helper
INFO - 2024-06-11 21:33:34 --> Helper loaded: url_helper
INFO - 2024-06-11 21:33:34 --> Database Driver Class Initialized
INFO - 2024-06-11 21:33:34 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:33:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:33:34 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:33:34 --> Controller Class Initialized
INFO - 2024-06-11 21:33:34 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:33:34 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:33:34 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:33:34 --> Pagination Class Initialized
INFO - 2024-06-11 21:33:34 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:33:34 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:33:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:33:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:33:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:33:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:33:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:33:34 --> Final output sent to browser
DEBUG - 2024-06-11 21:33:34 --> Total execution time: 0.0397
INFO - 2024-06-11 21:33:56 --> Config Class Initialized
INFO - 2024-06-11 21:33:56 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:33:56 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:33:56 --> Utf8 Class Initialized
INFO - 2024-06-11 21:33:56 --> URI Class Initialized
INFO - 2024-06-11 21:33:56 --> Router Class Initialized
INFO - 2024-06-11 21:33:56 --> Output Class Initialized
INFO - 2024-06-11 21:33:56 --> Security Class Initialized
DEBUG - 2024-06-11 21:33:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:33:56 --> Input Class Initialized
INFO - 2024-06-11 21:33:56 --> Language Class Initialized
INFO - 2024-06-11 21:33:56 --> Loader Class Initialized
INFO - 2024-06-11 21:33:56 --> Helper loaded: form_helper
INFO - 2024-06-11 21:33:56 --> Helper loaded: url_helper
INFO - 2024-06-11 21:33:56 --> Database Driver Class Initialized
INFO - 2024-06-11 21:33:56 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:33:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:33:56 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:33:56 --> Controller Class Initialized
INFO - 2024-06-11 21:33:56 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:33:56 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:33:56 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:33:56 --> Pagination Class Initialized
INFO - 2024-06-11 21:33:56 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:33:56 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:33:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:33:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:33:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:33:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:33:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:33:56 --> Final output sent to browser
DEBUG - 2024-06-11 21:33:56 --> Total execution time: 0.0410
INFO - 2024-06-11 21:43:22 --> Config Class Initialized
INFO - 2024-06-11 21:43:22 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:43:22 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:43:22 --> Utf8 Class Initialized
INFO - 2024-06-11 21:43:22 --> URI Class Initialized
INFO - 2024-06-11 21:43:22 --> Router Class Initialized
INFO - 2024-06-11 21:43:22 --> Output Class Initialized
INFO - 2024-06-11 21:43:22 --> Security Class Initialized
DEBUG - 2024-06-11 21:43:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:43:22 --> Input Class Initialized
INFO - 2024-06-11 21:43:22 --> Language Class Initialized
INFO - 2024-06-11 21:43:22 --> Loader Class Initialized
INFO - 2024-06-11 21:43:22 --> Helper loaded: form_helper
INFO - 2024-06-11 21:43:22 --> Helper loaded: url_helper
INFO - 2024-06-11 21:43:22 --> Database Driver Class Initialized
INFO - 2024-06-11 21:43:22 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:43:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:43:22 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:43:22 --> Controller Class Initialized
INFO - 2024-06-11 21:43:22 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:43:22 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:43:22 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:43:22 --> Pagination Class Initialized
INFO - 2024-06-11 21:43:22 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:43:22 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:43:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:43:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:43:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:43:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:43:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:43:22 --> Final output sent to browser
DEBUG - 2024-06-11 21:43:22 --> Total execution time: 0.0428
INFO - 2024-06-11 21:43:48 --> Config Class Initialized
INFO - 2024-06-11 21:43:48 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:43:48 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:43:48 --> Utf8 Class Initialized
INFO - 2024-06-11 21:43:48 --> URI Class Initialized
INFO - 2024-06-11 21:43:48 --> Router Class Initialized
INFO - 2024-06-11 21:43:48 --> Output Class Initialized
INFO - 2024-06-11 21:43:48 --> Security Class Initialized
DEBUG - 2024-06-11 21:43:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:43:48 --> Input Class Initialized
INFO - 2024-06-11 21:43:48 --> Language Class Initialized
INFO - 2024-06-11 21:43:48 --> Loader Class Initialized
INFO - 2024-06-11 21:43:48 --> Helper loaded: form_helper
INFO - 2024-06-11 21:43:48 --> Helper loaded: url_helper
INFO - 2024-06-11 21:43:48 --> Database Driver Class Initialized
INFO - 2024-06-11 21:43:48 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:43:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:43:48 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:43:48 --> Controller Class Initialized
INFO - 2024-06-11 21:43:48 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:43:48 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:43:48 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:43:48 --> Pagination Class Initialized
INFO - 2024-06-11 21:43:48 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:43:48 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:43:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:43:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:43:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:43:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:43:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:43:48 --> Final output sent to browser
DEBUG - 2024-06-11 21:43:48 --> Total execution time: 0.0403
INFO - 2024-06-11 21:44:07 --> Config Class Initialized
INFO - 2024-06-11 21:44:07 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:44:07 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:44:07 --> Utf8 Class Initialized
INFO - 2024-06-11 21:44:07 --> URI Class Initialized
INFO - 2024-06-11 21:44:07 --> Router Class Initialized
INFO - 2024-06-11 21:44:07 --> Output Class Initialized
INFO - 2024-06-11 21:44:07 --> Security Class Initialized
DEBUG - 2024-06-11 21:44:07 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:44:07 --> Input Class Initialized
INFO - 2024-06-11 21:44:07 --> Language Class Initialized
INFO - 2024-06-11 21:44:07 --> Loader Class Initialized
INFO - 2024-06-11 21:44:07 --> Helper loaded: form_helper
INFO - 2024-06-11 21:44:07 --> Helper loaded: url_helper
INFO - 2024-06-11 21:44:07 --> Database Driver Class Initialized
INFO - 2024-06-11 21:44:07 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:44:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:44:07 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:44:07 --> Controller Class Initialized
INFO - 2024-06-11 21:44:07 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:44:07 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:44:07 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:44:07 --> Pagination Class Initialized
INFO - 2024-06-11 21:44:07 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:44:07 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:44:07 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:44:07 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:44:07 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:44:07 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:44:07 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:44:07 --> Final output sent to browser
DEBUG - 2024-06-11 21:44:07 --> Total execution time: 0.0192
INFO - 2024-06-11 21:44:14 --> Config Class Initialized
INFO - 2024-06-11 21:44:14 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:44:14 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:44:14 --> Utf8 Class Initialized
INFO - 2024-06-11 21:44:14 --> URI Class Initialized
INFO - 2024-06-11 21:44:14 --> Router Class Initialized
INFO - 2024-06-11 21:44:14 --> Output Class Initialized
INFO - 2024-06-11 21:44:14 --> Security Class Initialized
DEBUG - 2024-06-11 21:44:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:44:14 --> Input Class Initialized
INFO - 2024-06-11 21:44:14 --> Language Class Initialized
INFO - 2024-06-11 21:44:14 --> Loader Class Initialized
INFO - 2024-06-11 21:44:14 --> Helper loaded: form_helper
INFO - 2024-06-11 21:44:14 --> Helper loaded: url_helper
INFO - 2024-06-11 21:44:14 --> Database Driver Class Initialized
INFO - 2024-06-11 21:44:14 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:44:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:44:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:44:14 --> Controller Class Initialized
INFO - 2024-06-11 21:44:14 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:44:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:44:14 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:44:14 --> Pagination Class Initialized
INFO - 2024-06-11 21:44:14 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:44:14 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:44:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:44:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:44:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:44:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:44:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:44:14 --> Final output sent to browser
DEBUG - 2024-06-11 21:44:14 --> Total execution time: 0.0189
INFO - 2024-06-11 21:47:05 --> Config Class Initialized
INFO - 2024-06-11 21:47:05 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:47:05 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:47:05 --> Utf8 Class Initialized
INFO - 2024-06-11 21:47:05 --> URI Class Initialized
INFO - 2024-06-11 21:47:05 --> Router Class Initialized
INFO - 2024-06-11 21:47:05 --> Output Class Initialized
INFO - 2024-06-11 21:47:05 --> Security Class Initialized
DEBUG - 2024-06-11 21:47:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:47:05 --> Input Class Initialized
INFO - 2024-06-11 21:47:05 --> Language Class Initialized
INFO - 2024-06-11 21:47:05 --> Loader Class Initialized
INFO - 2024-06-11 21:47:05 --> Helper loaded: form_helper
INFO - 2024-06-11 21:47:05 --> Helper loaded: url_helper
INFO - 2024-06-11 21:47:05 --> Database Driver Class Initialized
INFO - 2024-06-11 21:47:05 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:47:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:47:05 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:47:05 --> Controller Class Initialized
INFO - 2024-06-11 21:47:05 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:47:05 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:47:05 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:47:05 --> Pagination Class Initialized
INFO - 2024-06-11 21:47:05 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:47:05 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:47:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:47:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:47:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:47:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:47:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:47:05 --> Final output sent to browser
DEBUG - 2024-06-11 21:47:05 --> Total execution time: 0.0399
INFO - 2024-06-11 21:48:06 --> Config Class Initialized
INFO - 2024-06-11 21:48:06 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:48:06 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:48:06 --> Utf8 Class Initialized
INFO - 2024-06-11 21:48:06 --> URI Class Initialized
INFO - 2024-06-11 21:48:06 --> Router Class Initialized
INFO - 2024-06-11 21:48:06 --> Output Class Initialized
INFO - 2024-06-11 21:48:06 --> Security Class Initialized
DEBUG - 2024-06-11 21:48:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:48:06 --> Input Class Initialized
INFO - 2024-06-11 21:48:06 --> Language Class Initialized
INFO - 2024-06-11 21:48:06 --> Loader Class Initialized
INFO - 2024-06-11 21:48:06 --> Helper loaded: form_helper
INFO - 2024-06-11 21:48:06 --> Helper loaded: url_helper
INFO - 2024-06-11 21:48:06 --> Database Driver Class Initialized
INFO - 2024-06-11 21:48:06 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:48:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:48:06 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:48:06 --> Controller Class Initialized
INFO - 2024-06-11 21:48:06 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:48:06 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:48:06 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:48:06 --> Pagination Class Initialized
INFO - 2024-06-11 21:48:06 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:48:06 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:48:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:48:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:48:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:48:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:48:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:48:06 --> Final output sent to browser
DEBUG - 2024-06-11 21:48:06 --> Total execution time: 0.0395
INFO - 2024-06-11 21:49:10 --> Config Class Initialized
INFO - 2024-06-11 21:49:10 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:49:10 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:49:10 --> Utf8 Class Initialized
INFO - 2024-06-11 21:49:10 --> URI Class Initialized
INFO - 2024-06-11 21:49:10 --> Router Class Initialized
INFO - 2024-06-11 21:49:10 --> Output Class Initialized
INFO - 2024-06-11 21:49:10 --> Security Class Initialized
DEBUG - 2024-06-11 21:49:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:49:10 --> Input Class Initialized
INFO - 2024-06-11 21:49:10 --> Language Class Initialized
INFO - 2024-06-11 21:49:10 --> Loader Class Initialized
INFO - 2024-06-11 21:49:10 --> Helper loaded: form_helper
INFO - 2024-06-11 21:49:10 --> Helper loaded: url_helper
INFO - 2024-06-11 21:49:10 --> Database Driver Class Initialized
INFO - 2024-06-11 21:49:10 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:49:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:49:10 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:49:10 --> Controller Class Initialized
INFO - 2024-06-11 21:49:10 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:49:10 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:49:10 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:49:10 --> Pagination Class Initialized
INFO - 2024-06-11 21:49:10 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:49:10 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:49:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:49:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:49:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:49:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:49:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:49:10 --> Final output sent to browser
DEBUG - 2024-06-11 21:49:10 --> Total execution time: 0.0413
INFO - 2024-06-11 21:49:19 --> Config Class Initialized
INFO - 2024-06-11 21:49:19 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:49:19 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:49:19 --> Utf8 Class Initialized
INFO - 2024-06-11 21:49:19 --> URI Class Initialized
INFO - 2024-06-11 21:49:19 --> Router Class Initialized
INFO - 2024-06-11 21:49:19 --> Output Class Initialized
INFO - 2024-06-11 21:49:19 --> Security Class Initialized
DEBUG - 2024-06-11 21:49:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:49:19 --> Input Class Initialized
INFO - 2024-06-11 21:49:19 --> Language Class Initialized
INFO - 2024-06-11 21:49:19 --> Loader Class Initialized
INFO - 2024-06-11 21:49:19 --> Helper loaded: form_helper
INFO - 2024-06-11 21:49:19 --> Helper loaded: url_helper
INFO - 2024-06-11 21:49:19 --> Database Driver Class Initialized
INFO - 2024-06-11 21:49:19 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:49:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:49:19 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:49:19 --> Controller Class Initialized
INFO - 2024-06-11 21:49:19 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:49:19 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:49:19 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:49:19 --> Pagination Class Initialized
INFO - 2024-06-11 21:49:19 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:49:19 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:49:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:49:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:49:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:49:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:49:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:49:19 --> Final output sent to browser
DEBUG - 2024-06-11 21:49:19 --> Total execution time: 0.0184
INFO - 2024-06-11 21:50:03 --> Config Class Initialized
INFO - 2024-06-11 21:50:03 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:50:03 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:50:03 --> Utf8 Class Initialized
INFO - 2024-06-11 21:50:03 --> URI Class Initialized
INFO - 2024-06-11 21:50:03 --> Router Class Initialized
INFO - 2024-06-11 21:50:03 --> Output Class Initialized
INFO - 2024-06-11 21:50:03 --> Security Class Initialized
DEBUG - 2024-06-11 21:50:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:50:03 --> Input Class Initialized
INFO - 2024-06-11 21:50:03 --> Language Class Initialized
INFO - 2024-06-11 21:50:03 --> Loader Class Initialized
INFO - 2024-06-11 21:50:03 --> Helper loaded: form_helper
INFO - 2024-06-11 21:50:03 --> Helper loaded: url_helper
INFO - 2024-06-11 21:50:03 --> Database Driver Class Initialized
INFO - 2024-06-11 21:50:03 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:50:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:50:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:50:03 --> Controller Class Initialized
INFO - 2024-06-11 21:50:03 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:50:03 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:50:03 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:50:03 --> Pagination Class Initialized
INFO - 2024-06-11 21:50:03 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:50:03 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:50:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:50:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:50:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:50:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:50:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:50:03 --> Final output sent to browser
DEBUG - 2024-06-11 21:50:03 --> Total execution time: 0.0423
INFO - 2024-06-11 21:50:15 --> Config Class Initialized
INFO - 2024-06-11 21:50:15 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:50:15 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:50:15 --> Utf8 Class Initialized
INFO - 2024-06-11 21:50:15 --> URI Class Initialized
INFO - 2024-06-11 21:50:15 --> Router Class Initialized
INFO - 2024-06-11 21:50:15 --> Output Class Initialized
INFO - 2024-06-11 21:50:15 --> Security Class Initialized
DEBUG - 2024-06-11 21:50:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:50:15 --> Input Class Initialized
INFO - 2024-06-11 21:50:15 --> Language Class Initialized
INFO - 2024-06-11 21:50:15 --> Loader Class Initialized
INFO - 2024-06-11 21:50:15 --> Helper loaded: form_helper
INFO - 2024-06-11 21:50:15 --> Helper loaded: url_helper
INFO - 2024-06-11 21:50:15 --> Database Driver Class Initialized
INFO - 2024-06-11 21:50:15 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:50:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:50:15 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:50:15 --> Controller Class Initialized
INFO - 2024-06-11 21:50:15 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:50:15 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:50:15 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:50:15 --> Pagination Class Initialized
INFO - 2024-06-11 21:50:15 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:50:15 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:50:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:50:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:50:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:50:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:50:15 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:50:15 --> Final output sent to browser
DEBUG - 2024-06-11 21:50:15 --> Total execution time: 0.0185
INFO - 2024-06-11 21:51:10 --> Config Class Initialized
INFO - 2024-06-11 21:51:10 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:51:10 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:51:10 --> Utf8 Class Initialized
INFO - 2024-06-11 21:51:10 --> URI Class Initialized
INFO - 2024-06-11 21:51:10 --> Router Class Initialized
INFO - 2024-06-11 21:51:10 --> Output Class Initialized
INFO - 2024-06-11 21:51:10 --> Security Class Initialized
DEBUG - 2024-06-11 21:51:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:51:10 --> Input Class Initialized
INFO - 2024-06-11 21:51:10 --> Language Class Initialized
INFO - 2024-06-11 21:51:10 --> Loader Class Initialized
INFO - 2024-06-11 21:51:10 --> Helper loaded: form_helper
INFO - 2024-06-11 21:51:10 --> Helper loaded: url_helper
INFO - 2024-06-11 21:51:10 --> Database Driver Class Initialized
INFO - 2024-06-11 21:51:10 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:51:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:51:10 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:51:10 --> Controller Class Initialized
INFO - 2024-06-11 21:51:10 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:51:10 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:51:10 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:51:10 --> Pagination Class Initialized
INFO - 2024-06-11 21:51:10 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '1'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:51:10 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:51:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:51:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:51:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:51:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:51:10 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:51:10 --> Final output sent to browser
DEBUG - 2024-06-11 21:51:10 --> Total execution time: 0.0190
INFO - 2024-06-11 21:53:14 --> Config Class Initialized
INFO - 2024-06-11 21:53:14 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:53:14 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:53:14 --> Utf8 Class Initialized
INFO - 2024-06-11 21:53:14 --> URI Class Initialized
INFO - 2024-06-11 21:53:14 --> Router Class Initialized
INFO - 2024-06-11 21:53:14 --> Output Class Initialized
INFO - 2024-06-11 21:53:14 --> Security Class Initialized
DEBUG - 2024-06-11 21:53:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:53:14 --> Input Class Initialized
INFO - 2024-06-11 21:53:14 --> Language Class Initialized
INFO - 2024-06-11 21:53:14 --> Loader Class Initialized
INFO - 2024-06-11 21:53:14 --> Helper loaded: form_helper
INFO - 2024-06-11 21:53:14 --> Helper loaded: url_helper
INFO - 2024-06-11 21:53:14 --> Database Driver Class Initialized
INFO - 2024-06-11 21:53:14 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:53:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:53:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:53:14 --> Controller Class Initialized
INFO - 2024-06-11 21:53:14 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:53:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:53:14 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:53:14 --> Pagination Class Initialized
INFO - 2024-06-11 21:53:14 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:53:14 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:53:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:53:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:53:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:53:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:53:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:53:14 --> Final output sent to browser
DEBUG - 2024-06-11 21:53:14 --> Total execution time: 0.0187
INFO - 2024-06-11 21:55:16 --> Config Class Initialized
INFO - 2024-06-11 21:55:16 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:55:16 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:55:16 --> Utf8 Class Initialized
INFO - 2024-06-11 21:55:16 --> URI Class Initialized
INFO - 2024-06-11 21:55:16 --> Router Class Initialized
INFO - 2024-06-11 21:55:16 --> Output Class Initialized
INFO - 2024-06-11 21:55:16 --> Security Class Initialized
DEBUG - 2024-06-11 21:55:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:55:16 --> Input Class Initialized
INFO - 2024-06-11 21:55:16 --> Language Class Initialized
INFO - 2024-06-11 21:55:16 --> Loader Class Initialized
INFO - 2024-06-11 21:55:16 --> Helper loaded: form_helper
INFO - 2024-06-11 21:55:16 --> Helper loaded: url_helper
INFO - 2024-06-11 21:55:16 --> Database Driver Class Initialized
INFO - 2024-06-11 21:55:16 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:55:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:55:16 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:55:16 --> Controller Class Initialized
INFO - 2024-06-11 21:55:16 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:55:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:55:16 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:55:16 --> Pagination Class Initialized
INFO - 2024-06-11 21:55:16 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:55:16 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:55:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:55:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:55:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:55:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:55:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:55:16 --> Final output sent to browser
DEBUG - 2024-06-11 21:55:16 --> Total execution time: 0.0415
INFO - 2024-06-11 21:57:03 --> Config Class Initialized
INFO - 2024-06-11 21:57:03 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:57:03 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:57:03 --> Utf8 Class Initialized
INFO - 2024-06-11 21:57:03 --> URI Class Initialized
INFO - 2024-06-11 21:57:03 --> Router Class Initialized
INFO - 2024-06-11 21:57:03 --> Output Class Initialized
INFO - 2024-06-11 21:57:03 --> Security Class Initialized
DEBUG - 2024-06-11 21:57:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:57:03 --> Input Class Initialized
INFO - 2024-06-11 21:57:03 --> Language Class Initialized
INFO - 2024-06-11 21:57:03 --> Loader Class Initialized
INFO - 2024-06-11 21:57:03 --> Helper loaded: form_helper
INFO - 2024-06-11 21:57:03 --> Helper loaded: url_helper
INFO - 2024-06-11 21:57:03 --> Database Driver Class Initialized
INFO - 2024-06-11 21:57:03 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:57:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:57:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:57:03 --> Controller Class Initialized
INFO - 2024-06-11 21:57:03 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:57:03 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:57:03 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:57:03 --> Pagination Class Initialized
INFO - 2024-06-11 21:57:03 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '0'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:57:03 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:57:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:57:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:57:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:57:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:57:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:57:03 --> Final output sent to browser
DEBUG - 2024-06-11 21:57:03 --> Total execution time: 0.0414
INFO - 2024-06-11 21:57:20 --> Config Class Initialized
INFO - 2024-06-11 21:57:20 --> Hooks Class Initialized
DEBUG - 2024-06-11 21:57:20 --> UTF-8 Support Enabled
INFO - 2024-06-11 21:57:20 --> Utf8 Class Initialized
INFO - 2024-06-11 21:57:20 --> URI Class Initialized
INFO - 2024-06-11 21:57:20 --> Router Class Initialized
INFO - 2024-06-11 21:57:20 --> Output Class Initialized
INFO - 2024-06-11 21:57:20 --> Security Class Initialized
DEBUG - 2024-06-11 21:57:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-11 21:57:20 --> Input Class Initialized
INFO - 2024-06-11 21:57:20 --> Language Class Initialized
INFO - 2024-06-11 21:57:20 --> Loader Class Initialized
INFO - 2024-06-11 21:57:20 --> Helper loaded: form_helper
INFO - 2024-06-11 21:57:20 --> Helper loaded: url_helper
INFO - 2024-06-11 21:57:20 --> Database Driver Class Initialized
INFO - 2024-06-11 21:57:20 --> Form Validation Class Initialized
DEBUG - 2024-06-11 21:57:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-11 21:57:20 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-11 21:57:20 --> Controller Class Initialized
INFO - 2024-06-11 21:57:20 --> Model "Jurnal_model" initialized
DEBUG - 2024-06-11 21:57:20 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-11 21:57:20 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-11 21:57:20 --> Pagination Class Initialized
INFO - 2024-06-11 21:57:20 --> SELECT `jurnal`.*, `akun`.`kode_akun`, `akun`.`nama_akun`, `jenis_akun`.`sn`
FROM `jurnal`
JOIN `transaksi_iuran` ON `transaksi_iuran`.`id_transaksi`=`jurnal`.`id_transaksi`
JOIN `akun` ON `akun`.`id`=`jurnal`.`id_akun`
JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `jurnal`.`id_akun` = '3'
AND date(jurnal.tanggal) > '2024-06-01'
 LIMIT 22
INFO - 2024-06-11 21:57:20 --> Model "Akun_model" initialized
INFO - 2024-06-11 21:57:20 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-11 21:57:20 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-11 21:57:20 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-11 21:57:20 --> File loaded: E:\xampp\htdocs\ppdal\application\views\laporan/buku_besar.php
INFO - 2024-06-11 21:57:20 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-11 21:57:20 --> Final output sent to browser
DEBUG - 2024-06-11 21:57:20 --> Total execution time: 0.0197
