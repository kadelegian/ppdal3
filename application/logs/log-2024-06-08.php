INFO - 2024-06-08 09:42:16 --> Config Class Initialized
INFO - 2024-06-08 09:42:16 --> Hooks Class Initialized
DEBUG - 2024-06-08 09:42:16 --> UTF-8 Support Enabled
INFO - 2024-06-08 09:42:16 --> Utf8 Class Initialized
INFO - 2024-06-08 09:42:16 --> URI Class Initialized
INFO - 2024-06-08 09:42:16 --> Router Class Initialized
INFO - 2024-06-08 09:42:16 --> Output Class Initialized
INFO - 2024-06-08 09:42:16 --> Security Class Initialized
DEBUG - 2024-06-08 09:42:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 09:42:16 --> Input Class Initialized
INFO - 2024-06-08 09:42:16 --> Language Class Initialized
INFO - 2024-06-08 09:42:16 --> Loader Class Initialized
INFO - 2024-06-08 09:42:16 --> Helper loaded: form_helper
INFO - 2024-06-08 09:42:16 --> Helper loaded: url_helper
INFO - 2024-06-08 09:42:16 --> Database Driver Class Initialized
INFO - 2024-06-08 09:42:16 --> Form Validation Class Initialized
DEBUG - 2024-06-08 09:42:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 09:42:16 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 09:42:16 --> Controller Class Initialized
INFO - 2024-06-08 09:42:16 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 09:42:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 09:42:16 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 09:42:16 --> Pagination Class Initialized
INFO - 2024-06-08 09:42:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 09:42:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 09:42:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 09:42:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 09:42:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 09:42:16 --> Final output sent to browser
DEBUG - 2024-06-08 09:42:16 --> Total execution time: 0.0496
INFO - 2024-06-08 10:26:03 --> Config Class Initialized
INFO - 2024-06-08 10:26:03 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:26:03 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:26:03 --> Utf8 Class Initialized
INFO - 2024-06-08 10:26:03 --> URI Class Initialized
INFO - 2024-06-08 10:26:03 --> Router Class Initialized
INFO - 2024-06-08 10:26:03 --> Output Class Initialized
INFO - 2024-06-08 10:26:03 --> Security Class Initialized
DEBUG - 2024-06-08 10:26:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:26:03 --> Input Class Initialized
INFO - 2024-06-08 10:26:03 --> Language Class Initialized
INFO - 2024-06-08 10:26:03 --> Loader Class Initialized
INFO - 2024-06-08 10:26:03 --> Helper loaded: form_helper
INFO - 2024-06-08 10:26:03 --> Helper loaded: url_helper
INFO - 2024-06-08 10:26:03 --> Database Driver Class Initialized
INFO - 2024-06-08 10:26:03 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:26:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:26:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:26:03 --> Controller Class Initialized
INFO - 2024-06-08 10:26:03 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:26:03 --> Form_validation class already loaded. Second attempt ignored.
ERROR - 2024-06-08 10:26:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '=0, akun.debet) as debet, coalesce(saldo_akun.kredit, akun.kredit)as kredit, ...' at line 1 - Invalid query: SELECT `akun`.*, if(COALESCE(saldo_akun.debet, 0)==0, akun.debet) as debet, coalesce(saldo_akun.kredit, akun.kredit)as kredit, `jenis_akun`.`keterangan` as `tipe`
FROM `akun`
LEFT JOIN `saldo_akun` ON `saldo_akun`.`id_akun`=`akun`.`id`
LEFT JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `nama_akun` LIKE '%%' ESCAPE '!'
ORDER BY `akun`.`kode_akun` ASC
 LIMIT 10
INFO - 2024-06-08 10:26:03 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 10:26:17 --> Config Class Initialized
INFO - 2024-06-08 10:26:17 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:26:17 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:26:17 --> Utf8 Class Initialized
INFO - 2024-06-08 10:26:17 --> URI Class Initialized
INFO - 2024-06-08 10:26:17 --> Router Class Initialized
INFO - 2024-06-08 10:26:17 --> Output Class Initialized
INFO - 2024-06-08 10:26:17 --> Security Class Initialized
DEBUG - 2024-06-08 10:26:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:26:17 --> Input Class Initialized
INFO - 2024-06-08 10:26:17 --> Language Class Initialized
INFO - 2024-06-08 10:26:17 --> Loader Class Initialized
INFO - 2024-06-08 10:26:17 --> Helper loaded: form_helper
INFO - 2024-06-08 10:26:17 --> Helper loaded: url_helper
INFO - 2024-06-08 10:26:17 --> Database Driver Class Initialized
INFO - 2024-06-08 10:26:17 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:26:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:26:17 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:26:17 --> Controller Class Initialized
INFO - 2024-06-08 10:26:17 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:26:17 --> Form_validation class already loaded. Second attempt ignored.
ERROR - 2024-06-08 10:26:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') as debet, coalesce(saldo_akun.kredit, akun.kredit)as kredit, `jenis_akun`.`...' at line 1 - Invalid query: SELECT `akun`.*, if(COALESCE(saldo_akun.debet, 0)=0, akun.debet) as debet, coalesce(saldo_akun.kredit, akun.kredit)as kredit, `jenis_akun`.`keterangan` as `tipe`
FROM `akun`
LEFT JOIN `saldo_akun` ON `saldo_akun`.`id_akun`=`akun`.`id`
LEFT JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `nama_akun` LIKE '%%' ESCAPE '!'
ORDER BY `akun`.`kode_akun` ASC
 LIMIT 10
INFO - 2024-06-08 10:26:17 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 10:26:46 --> Config Class Initialized
INFO - 2024-06-08 10:26:46 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:26:46 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:26:46 --> Utf8 Class Initialized
INFO - 2024-06-08 10:26:46 --> URI Class Initialized
INFO - 2024-06-08 10:26:46 --> Router Class Initialized
INFO - 2024-06-08 10:26:46 --> Output Class Initialized
INFO - 2024-06-08 10:26:46 --> Security Class Initialized
DEBUG - 2024-06-08 10:26:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:26:46 --> Input Class Initialized
INFO - 2024-06-08 10:26:46 --> Language Class Initialized
INFO - 2024-06-08 10:26:46 --> Loader Class Initialized
INFO - 2024-06-08 10:26:46 --> Helper loaded: form_helper
INFO - 2024-06-08 10:26:46 --> Helper loaded: url_helper
INFO - 2024-06-08 10:26:46 --> Database Driver Class Initialized
INFO - 2024-06-08 10:26:46 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:26:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:26:46 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:26:46 --> Controller Class Initialized
INFO - 2024-06-08 10:26:46 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:26:46 --> Form_validation class already loaded. Second attempt ignored.
ERROR - 2024-06-08 10:26:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') as debet, coalesce(saldo_akun.kredit, akun.kredit)as kredit, `jenis_akun`.`...' at line 1 - Invalid query: SELECT `akun`.*, if(COALESCE(saldo_akun.debet, 0)<1, akun.debet) as debet, coalesce(saldo_akun.kredit, akun.kredit)as kredit, `jenis_akun`.`keterangan` as `tipe`
FROM `akun`
LEFT JOIN `saldo_akun` ON `saldo_akun`.`id_akun`=`akun`.`id`
LEFT JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `nama_akun` LIKE '%%' ESCAPE '!'
ORDER BY `akun`.`kode_akun` ASC
 LIMIT 10
INFO - 2024-06-08 10:26:46 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 10:33:50 --> Config Class Initialized
INFO - 2024-06-08 10:33:50 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:33:50 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:33:50 --> Utf8 Class Initialized
INFO - 2024-06-08 10:33:50 --> URI Class Initialized
INFO - 2024-06-08 10:33:50 --> Router Class Initialized
INFO - 2024-06-08 10:33:50 --> Output Class Initialized
INFO - 2024-06-08 10:33:50 --> Security Class Initialized
DEBUG - 2024-06-08 10:33:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:33:50 --> Input Class Initialized
INFO - 2024-06-08 10:33:50 --> Language Class Initialized
INFO - 2024-06-08 10:33:50 --> Loader Class Initialized
INFO - 2024-06-08 10:33:50 --> Helper loaded: form_helper
INFO - 2024-06-08 10:33:50 --> Helper loaded: url_helper
INFO - 2024-06-08 10:33:50 --> Database Driver Class Initialized
INFO - 2024-06-08 10:33:50 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:33:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:33:50 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:33:50 --> Controller Class Initialized
INFO - 2024-06-08 10:33:50 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:33:50 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:33:50 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:33:50 --> Pagination Class Initialized
INFO - 2024-06-08 10:33:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:33:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:33:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:33:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:33:50 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:33:50 --> Final output sent to browser
DEBUG - 2024-06-08 10:33:50 --> Total execution time: 0.0232
INFO - 2024-06-08 10:34:44 --> Config Class Initialized
INFO - 2024-06-08 10:34:44 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:34:44 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:34:44 --> Utf8 Class Initialized
INFO - 2024-06-08 10:34:44 --> URI Class Initialized
INFO - 2024-06-08 10:34:44 --> Router Class Initialized
INFO - 2024-06-08 10:34:44 --> Output Class Initialized
INFO - 2024-06-08 10:34:44 --> Security Class Initialized
DEBUG - 2024-06-08 10:34:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:34:44 --> Input Class Initialized
INFO - 2024-06-08 10:34:44 --> Language Class Initialized
INFO - 2024-06-08 10:34:44 --> Loader Class Initialized
INFO - 2024-06-08 10:34:44 --> Helper loaded: form_helper
INFO - 2024-06-08 10:34:44 --> Helper loaded: url_helper
INFO - 2024-06-08 10:34:44 --> Database Driver Class Initialized
INFO - 2024-06-08 10:34:44 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:34:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:34:44 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:34:44 --> Controller Class Initialized
INFO - 2024-06-08 10:34:44 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:34:44 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:34:44 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:34:44 --> Pagination Class Initialized
INFO - 2024-06-08 10:34:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:34:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:34:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:34:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:34:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:34:44 --> Final output sent to browser
DEBUG - 2024-06-08 10:34:44 --> Total execution time: 0.0425
INFO - 2024-06-08 10:35:54 --> Config Class Initialized
INFO - 2024-06-08 10:35:54 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:35:54 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:35:54 --> Utf8 Class Initialized
INFO - 2024-06-08 10:35:54 --> URI Class Initialized
INFO - 2024-06-08 10:35:54 --> Router Class Initialized
INFO - 2024-06-08 10:35:54 --> Output Class Initialized
INFO - 2024-06-08 10:35:54 --> Security Class Initialized
DEBUG - 2024-06-08 10:35:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:35:54 --> Input Class Initialized
INFO - 2024-06-08 10:35:54 --> Language Class Initialized
INFO - 2024-06-08 10:35:54 --> Loader Class Initialized
INFO - 2024-06-08 10:35:54 --> Helper loaded: form_helper
INFO - 2024-06-08 10:35:54 --> Helper loaded: url_helper
INFO - 2024-06-08 10:35:54 --> Database Driver Class Initialized
INFO - 2024-06-08 10:35:54 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:35:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:35:54 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:35:54 --> Controller Class Initialized
INFO - 2024-06-08 10:35:54 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:35:54 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:35:54 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:35:54 --> Pagination Class Initialized
INFO - 2024-06-08 10:35:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:35:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:35:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:35:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:35:54 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:35:54 --> Final output sent to browser
DEBUG - 2024-06-08 10:35:54 --> Total execution time: 0.0412
INFO - 2024-06-08 10:36:14 --> Config Class Initialized
INFO - 2024-06-08 10:36:14 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:36:14 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:36:14 --> Utf8 Class Initialized
INFO - 2024-06-08 10:36:14 --> URI Class Initialized
INFO - 2024-06-08 10:36:14 --> Router Class Initialized
INFO - 2024-06-08 10:36:14 --> Output Class Initialized
INFO - 2024-06-08 10:36:14 --> Security Class Initialized
DEBUG - 2024-06-08 10:36:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:36:14 --> Input Class Initialized
INFO - 2024-06-08 10:36:14 --> Language Class Initialized
INFO - 2024-06-08 10:36:14 --> Loader Class Initialized
INFO - 2024-06-08 10:36:14 --> Helper loaded: form_helper
INFO - 2024-06-08 10:36:14 --> Helper loaded: url_helper
INFO - 2024-06-08 10:36:14 --> Database Driver Class Initialized
INFO - 2024-06-08 10:36:14 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:36:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:36:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:36:14 --> Controller Class Initialized
INFO - 2024-06-08 10:36:14 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:36:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:36:14 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 10:36:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:36:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:36:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:36:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 10:36:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:36:14 --> Final output sent to browser
DEBUG - 2024-06-08 10:36:14 --> Total execution time: 0.0165
INFO - 2024-06-08 10:37:12 --> Config Class Initialized
INFO - 2024-06-08 10:37:12 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:37:12 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:37:12 --> Utf8 Class Initialized
INFO - 2024-06-08 10:37:12 --> URI Class Initialized
INFO - 2024-06-08 10:37:12 --> Router Class Initialized
INFO - 2024-06-08 10:37:12 --> Output Class Initialized
INFO - 2024-06-08 10:37:12 --> Security Class Initialized
DEBUG - 2024-06-08 10:37:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:37:12 --> Input Class Initialized
INFO - 2024-06-08 10:37:12 --> Language Class Initialized
INFO - 2024-06-08 10:37:12 --> Loader Class Initialized
INFO - 2024-06-08 10:37:12 --> Helper loaded: form_helper
INFO - 2024-06-08 10:37:12 --> Helper loaded: url_helper
INFO - 2024-06-08 10:37:12 --> Database Driver Class Initialized
INFO - 2024-06-08 10:37:12 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:37:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:37:12 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:37:12 --> Controller Class Initialized
INFO - 2024-06-08 10:37:12 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:37:12 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:37:12 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 10:37:12 --> Config Class Initialized
INFO - 2024-06-08 10:37:12 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:37:12 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:37:12 --> Utf8 Class Initialized
INFO - 2024-06-08 10:37:12 --> URI Class Initialized
INFO - 2024-06-08 10:37:12 --> Router Class Initialized
INFO - 2024-06-08 10:37:12 --> Output Class Initialized
INFO - 2024-06-08 10:37:12 --> Security Class Initialized
DEBUG - 2024-06-08 10:37:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:37:12 --> Input Class Initialized
INFO - 2024-06-08 10:37:12 --> Language Class Initialized
INFO - 2024-06-08 10:37:12 --> Loader Class Initialized
INFO - 2024-06-08 10:37:12 --> Helper loaded: form_helper
INFO - 2024-06-08 10:37:12 --> Helper loaded: url_helper
INFO - 2024-06-08 10:37:12 --> Database Driver Class Initialized
INFO - 2024-06-08 10:37:12 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:37:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:37:12 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:37:12 --> Controller Class Initialized
INFO - 2024-06-08 10:37:12 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:37:12 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:37:12 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:37:12 --> Pagination Class Initialized
INFO - 2024-06-08 10:37:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:37:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:37:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:37:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:37:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:37:12 --> Final output sent to browser
DEBUG - 2024-06-08 10:37:12 --> Total execution time: 0.0257
INFO - 2024-06-08 10:37:16 --> Config Class Initialized
INFO - 2024-06-08 10:37:16 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:37:16 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:37:16 --> Utf8 Class Initialized
INFO - 2024-06-08 10:37:16 --> URI Class Initialized
INFO - 2024-06-08 10:37:16 --> Router Class Initialized
INFO - 2024-06-08 10:37:16 --> Output Class Initialized
INFO - 2024-06-08 10:37:16 --> Security Class Initialized
DEBUG - 2024-06-08 10:37:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:37:16 --> Input Class Initialized
INFO - 2024-06-08 10:37:16 --> Language Class Initialized
INFO - 2024-06-08 10:37:16 --> Loader Class Initialized
INFO - 2024-06-08 10:37:16 --> Helper loaded: form_helper
INFO - 2024-06-08 10:37:16 --> Helper loaded: url_helper
INFO - 2024-06-08 10:37:16 --> Database Driver Class Initialized
INFO - 2024-06-08 10:37:16 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:37:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:37:16 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:37:16 --> Controller Class Initialized
INFO - 2024-06-08 10:37:16 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:37:16 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:37:16 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 10:37:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:37:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:37:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:37:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 10:37:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:37:16 --> Final output sent to browser
DEBUG - 2024-06-08 10:37:16 --> Total execution time: 0.0170
INFO - 2024-06-08 10:39:02 --> Config Class Initialized
INFO - 2024-06-08 10:39:02 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:39:02 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:39:02 --> Utf8 Class Initialized
INFO - 2024-06-08 10:39:02 --> URI Class Initialized
INFO - 2024-06-08 10:39:02 --> Router Class Initialized
INFO - 2024-06-08 10:39:02 --> Output Class Initialized
INFO - 2024-06-08 10:39:02 --> Security Class Initialized
DEBUG - 2024-06-08 10:39:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:39:02 --> Input Class Initialized
INFO - 2024-06-08 10:39:02 --> Language Class Initialized
INFO - 2024-06-08 10:39:02 --> Loader Class Initialized
INFO - 2024-06-08 10:39:02 --> Helper loaded: form_helper
INFO - 2024-06-08 10:39:02 --> Helper loaded: url_helper
INFO - 2024-06-08 10:39:02 --> Database Driver Class Initialized
INFO - 2024-06-08 10:39:02 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:39:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:39:02 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:39:02 --> Controller Class Initialized
INFO - 2024-06-08 10:39:02 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:39:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:39:02 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 10:39:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:39:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:39:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:39:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 10:39:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:39:02 --> Final output sent to browser
DEBUG - 2024-06-08 10:39:02 --> Total execution time: 0.0524
INFO - 2024-06-08 10:39:09 --> Config Class Initialized
INFO - 2024-06-08 10:39:09 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:39:09 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:39:09 --> Utf8 Class Initialized
INFO - 2024-06-08 10:39:09 --> URI Class Initialized
INFO - 2024-06-08 10:39:09 --> Router Class Initialized
INFO - 2024-06-08 10:39:09 --> Output Class Initialized
INFO - 2024-06-08 10:39:09 --> Security Class Initialized
DEBUG - 2024-06-08 10:39:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:39:09 --> Input Class Initialized
INFO - 2024-06-08 10:39:09 --> Language Class Initialized
INFO - 2024-06-08 10:39:09 --> Loader Class Initialized
INFO - 2024-06-08 10:39:09 --> Helper loaded: form_helper
INFO - 2024-06-08 10:39:09 --> Helper loaded: url_helper
INFO - 2024-06-08 10:39:09 --> Database Driver Class Initialized
INFO - 2024-06-08 10:39:09 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:39:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:39:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:39:09 --> Controller Class Initialized
INFO - 2024-06-08 10:39:09 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:39:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:39:09 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 10:39:09 --> Config Class Initialized
INFO - 2024-06-08 10:39:09 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:39:09 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:39:09 --> Utf8 Class Initialized
INFO - 2024-06-08 10:39:09 --> URI Class Initialized
INFO - 2024-06-08 10:39:09 --> Router Class Initialized
INFO - 2024-06-08 10:39:09 --> Output Class Initialized
INFO - 2024-06-08 10:39:09 --> Security Class Initialized
DEBUG - 2024-06-08 10:39:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:39:09 --> Input Class Initialized
INFO - 2024-06-08 10:39:09 --> Language Class Initialized
INFO - 2024-06-08 10:39:09 --> Loader Class Initialized
INFO - 2024-06-08 10:39:09 --> Helper loaded: form_helper
INFO - 2024-06-08 10:39:09 --> Helper loaded: url_helper
INFO - 2024-06-08 10:39:09 --> Database Driver Class Initialized
INFO - 2024-06-08 10:39:09 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:39:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:39:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:39:09 --> Controller Class Initialized
INFO - 2024-06-08 10:39:09 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:39:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:39:09 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:39:09 --> Pagination Class Initialized
INFO - 2024-06-08 10:39:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:39:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:39:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:39:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:39:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:39:09 --> Final output sent to browser
DEBUG - 2024-06-08 10:39:09 --> Total execution time: 0.0226
INFO - 2024-06-08 10:40:41 --> Config Class Initialized
INFO - 2024-06-08 10:40:41 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:40:41 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:40:41 --> Utf8 Class Initialized
INFO - 2024-06-08 10:40:41 --> URI Class Initialized
INFO - 2024-06-08 10:40:41 --> Router Class Initialized
INFO - 2024-06-08 10:40:41 --> Output Class Initialized
INFO - 2024-06-08 10:40:41 --> Security Class Initialized
DEBUG - 2024-06-08 10:40:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:40:41 --> Input Class Initialized
INFO - 2024-06-08 10:40:41 --> Language Class Initialized
INFO - 2024-06-08 10:40:41 --> Loader Class Initialized
INFO - 2024-06-08 10:40:41 --> Helper loaded: form_helper
INFO - 2024-06-08 10:40:41 --> Helper loaded: url_helper
INFO - 2024-06-08 10:40:41 --> Database Driver Class Initialized
INFO - 2024-06-08 10:40:41 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:40:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:40:41 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:40:41 --> Controller Class Initialized
INFO - 2024-06-08 10:40:41 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:40:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:40:41 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:40:41 --> Pagination Class Initialized
INFO - 2024-06-08 10:40:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:40:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:40:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:40:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:40:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:40:41 --> Final output sent to browser
DEBUG - 2024-06-08 10:40:41 --> Total execution time: 0.0512
INFO - 2024-06-08 10:48:14 --> Config Class Initialized
INFO - 2024-06-08 10:48:14 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:48:14 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:48:14 --> Utf8 Class Initialized
INFO - 2024-06-08 10:48:14 --> URI Class Initialized
INFO - 2024-06-08 10:48:14 --> Router Class Initialized
INFO - 2024-06-08 10:48:14 --> Output Class Initialized
INFO - 2024-06-08 10:48:14 --> Security Class Initialized
DEBUG - 2024-06-08 10:48:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:48:14 --> Input Class Initialized
INFO - 2024-06-08 10:48:14 --> Language Class Initialized
INFO - 2024-06-08 10:48:14 --> Loader Class Initialized
INFO - 2024-06-08 10:48:14 --> Helper loaded: form_helper
INFO - 2024-06-08 10:48:14 --> Helper loaded: url_helper
INFO - 2024-06-08 10:48:14 --> Database Driver Class Initialized
INFO - 2024-06-08 10:48:14 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:48:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:48:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:48:14 --> Controller Class Initialized
INFO - 2024-06-08 10:48:14 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:48:14 --> Form_validation class already loaded. Second attempt ignored.
ERROR - 2024-06-08 10:48:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`debet ELSE saldo_akun`.`debet END` as `debet`, if(coalesce(saldo_akun.kredi...' at line 1 - Invalid query: SELECT `akun`.*, `CASE WHEN saldo_akun`.`debet IS NULL THEN 0 WHEN saldo_akun`.`debet = 0 THEN akun`.`debet ELSE saldo_akun`.`debet END` as `debet`, if(coalesce(saldo_akun.kredit, 0)=0, `akun`.`kredit`, 0) as kredit, `jenis_akun`.`keterangan` as `tipe`
FROM `akun`
LEFT JOIN `saldo_akun` ON `saldo_akun`.`id_akun`=`akun`.`id`
LEFT JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `nama_akun` LIKE '%%' ESCAPE '!'
ORDER BY `akun`.`kode_akun` ASC
 LIMIT 10
INFO - 2024-06-08 10:48:14 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 10:51:39 --> Config Class Initialized
INFO - 2024-06-08 10:51:39 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:51:39 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:51:39 --> Utf8 Class Initialized
INFO - 2024-06-08 10:51:39 --> URI Class Initialized
INFO - 2024-06-08 10:51:39 --> Router Class Initialized
INFO - 2024-06-08 10:51:39 --> Output Class Initialized
INFO - 2024-06-08 10:51:39 --> Security Class Initialized
DEBUG - 2024-06-08 10:51:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:51:39 --> Input Class Initialized
INFO - 2024-06-08 10:51:39 --> Language Class Initialized
INFO - 2024-06-08 10:51:39 --> Loader Class Initialized
INFO - 2024-06-08 10:51:39 --> Helper loaded: form_helper
INFO - 2024-06-08 10:51:39 --> Helper loaded: url_helper
INFO - 2024-06-08 10:51:39 --> Database Driver Class Initialized
INFO - 2024-06-08 10:51:39 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:51:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:51:39 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:51:39 --> Controller Class Initialized
INFO - 2024-06-08 10:51:39 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:51:39 --> Form_validation class already loaded. Second attempt ignored.
ERROR - 2024-06-08 10:51:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`debet ELSE saldo_akun`.`debet END` as `debet`, `CASE WHEN saldo_akun`.`kred...' at line 1 - Invalid query: SELECT `akun`.*, `CASE WHEN saldo_akun`.`debet IS NULL THEN 0 WHEN saldo_akun`.`debet = 0 THEN akun`.`debet ELSE saldo_akun`.`debet END` as `debet`, `CASE WHEN saldo_akun`.`kredit IS NULL THEN 0 WHEN saldo_akun`.`kredit = 0 THEN akun`.`kredit ELSE saldo_akun`.`kredit END` as `kredit`, `jenis_akun`.`keterangan` as `tipe`
FROM `akun`
LEFT JOIN `saldo_akun` ON `saldo_akun`.`id_akun`=`akun`.`id`
LEFT JOIN `jenis_akun` ON `jenis_akun`.`id`=`akun`.`kode_jenis`
WHERE `nama_akun` LIKE '%%' ESCAPE '!'
ORDER BY `akun`.`kode_akun` ASC
 LIMIT 10
INFO - 2024-06-08 10:51:39 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 10:52:27 --> Config Class Initialized
INFO - 2024-06-08 10:52:27 --> Hooks Class Initialized
DEBUG - 2024-06-08 10:52:27 --> UTF-8 Support Enabled
INFO - 2024-06-08 10:52:27 --> Utf8 Class Initialized
INFO - 2024-06-08 10:52:27 --> URI Class Initialized
INFO - 2024-06-08 10:52:27 --> Router Class Initialized
INFO - 2024-06-08 10:52:27 --> Output Class Initialized
INFO - 2024-06-08 10:52:27 --> Security Class Initialized
DEBUG - 2024-06-08 10:52:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 10:52:27 --> Input Class Initialized
INFO - 2024-06-08 10:52:27 --> Language Class Initialized
INFO - 2024-06-08 10:52:27 --> Loader Class Initialized
INFO - 2024-06-08 10:52:27 --> Helper loaded: form_helper
INFO - 2024-06-08 10:52:27 --> Helper loaded: url_helper
INFO - 2024-06-08 10:52:27 --> Database Driver Class Initialized
INFO - 2024-06-08 10:52:27 --> Form Validation Class Initialized
DEBUG - 2024-06-08 10:52:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 10:52:27 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 10:52:27 --> Controller Class Initialized
INFO - 2024-06-08 10:52:27 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 10:52:27 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 10:52:27 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 10:52:27 --> Pagination Class Initialized
INFO - 2024-06-08 10:52:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 10:52:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 10:52:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 10:52:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 10:52:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 10:52:27 --> Final output sent to browser
DEBUG - 2024-06-08 10:52:27 --> Total execution time: 0.0230
INFO - 2024-06-08 14:44:04 --> Config Class Initialized
INFO - 2024-06-08 14:44:04 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:04 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:04 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:04 --> URI Class Initialized
INFO - 2024-06-08 14:44:04 --> Router Class Initialized
INFO - 2024-06-08 14:44:04 --> Output Class Initialized
INFO - 2024-06-08 14:44:04 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:04 --> Input Class Initialized
INFO - 2024-06-08 14:44:04 --> Language Class Initialized
INFO - 2024-06-08 14:44:04 --> Loader Class Initialized
INFO - 2024-06-08 14:44:04 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:04 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:04 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:04 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:04 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:04 --> Controller Class Initialized
INFO - 2024-06-08 14:44:04 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 14:44:04 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:44:04 --> Config Class Initialized
INFO - 2024-06-08 14:44:04 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:04 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:04 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:04 --> URI Class Initialized
INFO - 2024-06-08 14:44:04 --> Router Class Initialized
INFO - 2024-06-08 14:44:04 --> Output Class Initialized
INFO - 2024-06-08 14:44:04 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:04 --> Input Class Initialized
INFO - 2024-06-08 14:44:04 --> Language Class Initialized
INFO - 2024-06-08 14:44:04 --> Loader Class Initialized
INFO - 2024-06-08 14:44:04 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:04 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:04 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:04 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:04 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:04 --> Controller Class Initialized
INFO - 2024-06-08 14:44:04 --> Model "Users_model" initialized
INFO - 2024-06-08 14:44:04 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:04 --> Total execution time: 0.0143
INFO - 2024-06-08 14:44:04 --> Config Class Initialized
INFO - 2024-06-08 14:44:04 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:04 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:04 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:04 --> URI Class Initialized
INFO - 2024-06-08 14:44:04 --> Router Class Initialized
INFO - 2024-06-08 14:44:04 --> Output Class Initialized
INFO - 2024-06-08 14:44:04 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:04 --> Input Class Initialized
INFO - 2024-06-08 14:44:04 --> Language Class Initialized
INFO - 2024-06-08 14:44:04 --> Loader Class Initialized
INFO - 2024-06-08 14:44:04 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:04 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:04 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:04 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:04 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:04 --> Controller Class Initialized
INFO - 2024-06-08 14:44:04 --> Model "Users_model" initialized
INFO - 2024-06-08 14:44:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:44:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\users/users_login.php
INFO - 2024-06-08 14:44:04 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:44:04 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:04 --> Total execution time: 0.0257
INFO - 2024-06-08 14:44:17 --> Config Class Initialized
INFO - 2024-06-08 14:44:17 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:17 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:17 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:17 --> URI Class Initialized
INFO - 2024-06-08 14:44:17 --> Router Class Initialized
INFO - 2024-06-08 14:44:17 --> Output Class Initialized
INFO - 2024-06-08 14:44:17 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:17 --> Input Class Initialized
INFO - 2024-06-08 14:44:17 --> Language Class Initialized
INFO - 2024-06-08 14:44:17 --> Loader Class Initialized
INFO - 2024-06-08 14:44:17 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:17 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:17 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:17 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:17 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:17 --> Controller Class Initialized
INFO - 2024-06-08 14:44:17 --> Model "Users_model" initialized
INFO - 2024-06-08 14:44:17 --> Config Class Initialized
INFO - 2024-06-08 14:44:17 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:17 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:17 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:17 --> URI Class Initialized
DEBUG - 2024-06-08 14:44:17 --> No URI present. Default controller set.
INFO - 2024-06-08 14:44:17 --> Router Class Initialized
INFO - 2024-06-08 14:44:17 --> Output Class Initialized
INFO - 2024-06-08 14:44:17 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:17 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:17 --> Input Class Initialized
INFO - 2024-06-08 14:44:17 --> Language Class Initialized
INFO - 2024-06-08 14:44:17 --> Loader Class Initialized
INFO - 2024-06-08 14:44:17 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:17 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:17 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:17 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:17 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:17 --> Controller Class Initialized
INFO - 2024-06-08 14:44:17 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-08 14:44:17 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:44:17 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 14:44:17 --> Pagination Class Initialized
INFO - 2024-06-08 14:44:17 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:44:17 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:44:17 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:44:17 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
INFO - 2024-06-08 14:44:17 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/pedagang_list.php
INFO - 2024-06-08 14:44:17 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:44:17 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:17 --> Total execution time: 0.0257
INFO - 2024-06-08 14:44:22 --> Config Class Initialized
INFO - 2024-06-08 14:44:22 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:22 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:22 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:22 --> URI Class Initialized
INFO - 2024-06-08 14:44:22 --> Router Class Initialized
INFO - 2024-06-08 14:44:22 --> Output Class Initialized
INFO - 2024-06-08 14:44:22 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:22 --> Input Class Initialized
INFO - 2024-06-08 14:44:22 --> Language Class Initialized
INFO - 2024-06-08 14:44:22 --> Loader Class Initialized
INFO - 2024-06-08 14:44:22 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:22 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:22 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:22 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:22 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:22 --> Controller Class Initialized
INFO - 2024-06-08 14:44:22 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 14:44:22 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:44:22 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 14:44:22 --> Pagination Class Initialized
INFO - 2024-06-08 14:44:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:44:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:44:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 14:44:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 14:44:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:44:22 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:22 --> Total execution time: 0.0210
INFO - 2024-06-08 14:44:37 --> Config Class Initialized
INFO - 2024-06-08 14:44:37 --> Hooks Class Initialized
INFO - 2024-06-08 14:44:37 --> Config Class Initialized
INFO - 2024-06-08 14:44:37 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:37 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:37 --> Utf8 Class Initialized
DEBUG - 2024-06-08 14:44:37 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:37 --> URI Class Initialized
INFO - 2024-06-08 14:44:37 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:37 --> URI Class Initialized
INFO - 2024-06-08 14:44:37 --> Router Class Initialized
INFO - 2024-06-08 14:44:37 --> Output Class Initialized
INFO - 2024-06-08 14:44:37 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:37 --> Router Class Initialized
INFO - 2024-06-08 14:44:37 --> Input Class Initialized
INFO - 2024-06-08 14:44:37 --> Language Class Initialized
INFO - 2024-06-08 14:44:37 --> Output Class Initialized
INFO - 2024-06-08 14:44:37 --> Security Class Initialized
INFO - 2024-06-08 14:44:37 --> Loader Class Initialized
DEBUG - 2024-06-08 14:44:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:37 --> Input Class Initialized
INFO - 2024-06-08 14:44:37 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:37 --> Language Class Initialized
INFO - 2024-06-08 14:44:37 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:37 --> Loader Class Initialized
INFO - 2024-06-08 14:44:37 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:37 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:37 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:37 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:37 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:37 --> Controller Class Initialized
INFO - 2024-06-08 14:44:37 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:37 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 14:44:37 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:44:37 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 14:44:37 --> Form Validation Class Initialized
INFO - 2024-06-08 14:44:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:44:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:44:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 14:44:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 14:44:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
DEBUG - 2024-06-08 14:44:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:37 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:37 --> Total execution time: 0.0286
INFO - 2024-06-08 14:44:37 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:37 --> Controller Class Initialized
INFO - 2024-06-08 14:44:37 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 14:44:37 --> Form_validation class already loaded. Second attempt ignored.
ERROR - 2024-06-08 14:44:37 --> 404 Page Not Found: 
INFO - 2024-06-08 14:44:39 --> Config Class Initialized
INFO - 2024-06-08 14:44:39 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:39 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:39 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:39 --> URI Class Initialized
INFO - 2024-06-08 14:44:39 --> Router Class Initialized
INFO - 2024-06-08 14:44:39 --> Output Class Initialized
INFO - 2024-06-08 14:44:39 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:39 --> Input Class Initialized
INFO - 2024-06-08 14:44:39 --> Language Class Initialized
INFO - 2024-06-08 14:44:39 --> Loader Class Initialized
INFO - 2024-06-08 14:44:39 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:39 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:39 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:39 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:39 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:39 --> Controller Class Initialized
INFO - 2024-06-08 14:44:39 --> Model "Users_model" initialized
INFO - 2024-06-08 14:44:39 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:44:39 --> File loaded: E:\xampp\htdocs\ppdal\application\views\users/users_login.php
INFO - 2024-06-08 14:44:39 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:44:39 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:39 --> Total execution time: 0.0166
INFO - 2024-06-08 14:44:53 --> Config Class Initialized
INFO - 2024-06-08 14:44:53 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:44:53 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:44:53 --> Utf8 Class Initialized
INFO - 2024-06-08 14:44:53 --> URI Class Initialized
INFO - 2024-06-08 14:44:53 --> Router Class Initialized
INFO - 2024-06-08 14:44:53 --> Output Class Initialized
INFO - 2024-06-08 14:44:53 --> Security Class Initialized
DEBUG - 2024-06-08 14:44:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:44:53 --> Input Class Initialized
INFO - 2024-06-08 14:44:53 --> Language Class Initialized
INFO - 2024-06-08 14:44:53 --> Loader Class Initialized
INFO - 2024-06-08 14:44:53 --> Helper loaded: form_helper
INFO - 2024-06-08 14:44:53 --> Helper loaded: url_helper
INFO - 2024-06-08 14:44:53 --> Database Driver Class Initialized
INFO - 2024-06-08 14:44:53 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:44:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:44:53 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:44:53 --> Controller Class Initialized
INFO - 2024-06-08 14:44:53 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 14:44:53 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:44:53 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 14:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 14:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 14:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:44:53 --> Final output sent to browser
DEBUG - 2024-06-08 14:44:53 --> Total execution time: 0.0197
INFO - 2024-06-08 14:48:51 --> Config Class Initialized
INFO - 2024-06-08 14:48:51 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:48:51 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:48:51 --> Utf8 Class Initialized
INFO - 2024-06-08 14:48:51 --> URI Class Initialized
INFO - 2024-06-08 14:48:51 --> Router Class Initialized
INFO - 2024-06-08 14:48:51 --> Output Class Initialized
INFO - 2024-06-08 14:48:51 --> Security Class Initialized
DEBUG - 2024-06-08 14:48:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:48:51 --> Input Class Initialized
INFO - 2024-06-08 14:48:51 --> Language Class Initialized
INFO - 2024-06-08 14:48:51 --> Loader Class Initialized
INFO - 2024-06-08 14:48:51 --> Helper loaded: form_helper
INFO - 2024-06-08 14:48:51 --> Helper loaded: url_helper
INFO - 2024-06-08 14:48:51 --> Database Driver Class Initialized
INFO - 2024-06-08 14:48:51 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:48:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:48:51 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:48:51 --> Controller Class Initialized
INFO - 2024-06-08 14:48:51 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-08 14:48:51 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:48:51 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 14:48:51 --> Pagination Class Initialized
INFO - 2024-06-08 14:48:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:48:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:48:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:48:51 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
INFO - 2024-06-08 14:48:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/pedagang_list.php
INFO - 2024-06-08 14:48:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:48:51 --> Final output sent to browser
DEBUG - 2024-06-08 14:48:51 --> Total execution time: 0.0265
INFO - 2024-06-08 14:56:59 --> Config Class Initialized
INFO - 2024-06-08 14:56:59 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:56:59 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:56:59 --> Utf8 Class Initialized
INFO - 2024-06-08 14:56:59 --> URI Class Initialized
INFO - 2024-06-08 14:56:59 --> Router Class Initialized
INFO - 2024-06-08 14:56:59 --> Output Class Initialized
INFO - 2024-06-08 14:56:59 --> Security Class Initialized
DEBUG - 2024-06-08 14:56:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:56:59 --> Input Class Initialized
INFO - 2024-06-08 14:56:59 --> Language Class Initialized
INFO - 2024-06-08 14:56:59 --> Loader Class Initialized
INFO - 2024-06-08 14:56:59 --> Helper loaded: form_helper
INFO - 2024-06-08 14:56:59 --> Helper loaded: url_helper
INFO - 2024-06-08 14:56:59 --> Database Driver Class Initialized
INFO - 2024-06-08 14:56:59 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:56:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:56:59 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:56:59 --> Controller Class Initialized
INFO - 2024-06-08 14:56:59 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-08 14:56:59 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:56:59 --> Model "Wilayah_model" initialized
INFO - 2024-06-08 14:56:59 --> Model "Extra_charge_model" initialized
INFO - 2024-06-08 14:56:59 --> Model "Jenis_dagangan_model" initialized
INFO - 2024-06-08 14:56:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:56:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:56:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 14:56:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/t_pedagang_form.php
INFO - 2024-06-08 14:56:59 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:56:59 --> Final output sent to browser
DEBUG - 2024-06-08 14:56:59 --> Total execution time: 0.0540
INFO - 2024-06-08 14:57:06 --> Config Class Initialized
INFO - 2024-06-08 14:57:06 --> Hooks Class Initialized
DEBUG - 2024-06-08 14:57:06 --> UTF-8 Support Enabled
INFO - 2024-06-08 14:57:06 --> Utf8 Class Initialized
INFO - 2024-06-08 14:57:06 --> URI Class Initialized
INFO - 2024-06-08 14:57:06 --> Router Class Initialized
INFO - 2024-06-08 14:57:06 --> Output Class Initialized
INFO - 2024-06-08 14:57:06 --> Security Class Initialized
DEBUG - 2024-06-08 14:57:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 14:57:06 --> Input Class Initialized
INFO - 2024-06-08 14:57:06 --> Language Class Initialized
INFO - 2024-06-08 14:57:06 --> Loader Class Initialized
INFO - 2024-06-08 14:57:06 --> Helper loaded: form_helper
INFO - 2024-06-08 14:57:06 --> Helper loaded: url_helper
INFO - 2024-06-08 14:57:06 --> Database Driver Class Initialized
INFO - 2024-06-08 14:57:06 --> Form Validation Class Initialized
DEBUG - 2024-06-08 14:57:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 14:57:06 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 14:57:06 --> Controller Class Initialized
INFO - 2024-06-08 14:57:06 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-08 14:57:06 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 14:57:06 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 14:57:06 --> Pagination Class Initialized
INFO - 2024-06-08 14:57:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 14:57:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 14:57:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 14:57:06 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
INFO - 2024-06-08 14:57:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/pedagang_list.php
INFO - 2024-06-08 14:57:06 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 14:57:06 --> Final output sent to browser
DEBUG - 2024-06-08 14:57:06 --> Total execution time: 0.0270
INFO - 2024-06-08 15:10:11 --> Config Class Initialized
INFO - 2024-06-08 15:10:11 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:10:11 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:10:11 --> Utf8 Class Initialized
INFO - 2024-06-08 15:10:11 --> URI Class Initialized
INFO - 2024-06-08 15:10:11 --> Router Class Initialized
INFO - 2024-06-08 15:10:11 --> Output Class Initialized
INFO - 2024-06-08 15:10:11 --> Security Class Initialized
DEBUG - 2024-06-08 15:10:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:10:11 --> Input Class Initialized
INFO - 2024-06-08 15:10:11 --> Language Class Initialized
INFO - 2024-06-08 15:10:11 --> Loader Class Initialized
INFO - 2024-06-08 15:10:11 --> Helper loaded: form_helper
INFO - 2024-06-08 15:10:11 --> Helper loaded: url_helper
INFO - 2024-06-08 15:10:11 --> Database Driver Class Initialized
INFO - 2024-06-08 15:10:11 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:10:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:10:11 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:10:11 --> Controller Class Initialized
DEBUG - 2024-06-08 15:10:11 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:10:11 --> Model "Transaksi_pemasukan_model" initialized
ERROR - 2024-06-08 15:10:11 --> Query error: Unknown column 'jurnal.kode' in 'where clause' - Invalid query: SELECT sum(jurnal.debet) as total_pemasukan
FROM `jurnal`
WHERE `jurnal`.`debet` > 0
AND `jurnal`.`status` = 1
AND `jurnal`.`kode` < 1000
INFO - 2024-06-08 15:10:11 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 15:10:13 --> Config Class Initialized
INFO - 2024-06-08 15:10:13 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:10:13 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:10:13 --> Utf8 Class Initialized
INFO - 2024-06-08 15:10:13 --> URI Class Initialized
INFO - 2024-06-08 15:10:13 --> Router Class Initialized
INFO - 2024-06-08 15:10:13 --> Output Class Initialized
INFO - 2024-06-08 15:10:13 --> Security Class Initialized
DEBUG - 2024-06-08 15:10:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:10:13 --> Input Class Initialized
INFO - 2024-06-08 15:10:13 --> Language Class Initialized
INFO - 2024-06-08 15:10:13 --> Loader Class Initialized
INFO - 2024-06-08 15:10:13 --> Helper loaded: form_helper
INFO - 2024-06-08 15:10:13 --> Helper loaded: url_helper
INFO - 2024-06-08 15:10:13 --> Database Driver Class Initialized
INFO - 2024-06-08 15:10:13 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:10:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:10:13 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:10:13 --> Controller Class Initialized
INFO - 2024-06-08 15:10:13 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-08 15:10:13 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:10:13 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:10:13 --> Pagination Class Initialized
INFO - 2024-06-08 15:10:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:10:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:10:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 15:10:13 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
INFO - 2024-06-08 15:10:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/pedagang_list.php
INFO - 2024-06-08 15:10:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:10:13 --> Final output sent to browser
DEBUG - 2024-06-08 15:10:13 --> Total execution time: 0.0264
INFO - 2024-06-08 15:35:12 --> Config Class Initialized
INFO - 2024-06-08 15:35:12 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:35:12 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:35:12 --> Utf8 Class Initialized
INFO - 2024-06-08 15:35:12 --> URI Class Initialized
INFO - 2024-06-08 15:35:12 --> Router Class Initialized
INFO - 2024-06-08 15:35:12 --> Output Class Initialized
INFO - 2024-06-08 15:35:12 --> Security Class Initialized
DEBUG - 2024-06-08 15:35:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:35:12 --> Input Class Initialized
INFO - 2024-06-08 15:35:12 --> Language Class Initialized
INFO - 2024-06-08 15:35:12 --> Loader Class Initialized
INFO - 2024-06-08 15:35:12 --> Helper loaded: form_helper
INFO - 2024-06-08 15:35:12 --> Helper loaded: url_helper
INFO - 2024-06-08 15:35:12 --> Database Driver Class Initialized
INFO - 2024-06-08 15:35:12 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:35:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:35:12 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:35:12 --> Controller Class Initialized
INFO - 2024-06-08 15:35:12 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:35:12 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:35:12 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:35:12 --> Pagination Class Initialized
INFO - 2024-06-08 15:35:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:35:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:35:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:35:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 15:35:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:35:12 --> Final output sent to browser
DEBUG - 2024-06-08 15:35:12 --> Total execution time: 0.0269
INFO - 2024-06-08 15:45:13 --> Config Class Initialized
INFO - 2024-06-08 15:45:13 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:45:13 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:45:13 --> Utf8 Class Initialized
INFO - 2024-06-08 15:45:13 --> URI Class Initialized
INFO - 2024-06-08 15:45:13 --> Router Class Initialized
INFO - 2024-06-08 15:45:13 --> Output Class Initialized
INFO - 2024-06-08 15:45:13 --> Security Class Initialized
DEBUG - 2024-06-08 15:45:13 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:45:13 --> Input Class Initialized
INFO - 2024-06-08 15:45:13 --> Language Class Initialized
INFO - 2024-06-08 15:45:13 --> Loader Class Initialized
INFO - 2024-06-08 15:45:13 --> Helper loaded: form_helper
INFO - 2024-06-08 15:45:13 --> Helper loaded: url_helper
INFO - 2024-06-08 15:45:13 --> Database Driver Class Initialized
INFO - 2024-06-08 15:45:13 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:45:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:45:13 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:45:13 --> Controller Class Initialized
INFO - 2024-06-08 15:45:13 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:45:13 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:45:13 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:45:13 --> Pagination Class Initialized
INFO - 2024-06-08 15:45:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:45:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:45:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:45:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 15:45:13 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:45:13 --> Final output sent to browser
DEBUG - 2024-06-08 15:45:13 --> Total execution time: 0.0452
INFO - 2024-06-08 15:53:40 --> Config Class Initialized
INFO - 2024-06-08 15:53:40 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:53:40 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:53:40 --> Utf8 Class Initialized
INFO - 2024-06-08 15:53:40 --> URI Class Initialized
INFO - 2024-06-08 15:53:40 --> Router Class Initialized
INFO - 2024-06-08 15:53:40 --> Output Class Initialized
INFO - 2024-06-08 15:53:40 --> Security Class Initialized
DEBUG - 2024-06-08 15:53:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:53:40 --> Input Class Initialized
INFO - 2024-06-08 15:53:40 --> Language Class Initialized
INFO - 2024-06-08 15:53:40 --> Loader Class Initialized
INFO - 2024-06-08 15:53:40 --> Helper loaded: form_helper
INFO - 2024-06-08 15:53:40 --> Helper loaded: url_helper
INFO - 2024-06-08 15:53:40 --> Database Driver Class Initialized
INFO - 2024-06-08 15:53:40 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:53:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:53:40 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:53:40 --> Controller Class Initialized
INFO - 2024-06-08 15:53:40 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:53:40 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:53:40 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:53:40 --> Pagination Class Initialized
INFO - 2024-06-08 15:53:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:53:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:53:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:53:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 15:53:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:53:40 --> Final output sent to browser
DEBUG - 2024-06-08 15:53:40 --> Total execution time: 0.0384
INFO - 2024-06-08 15:53:42 --> Config Class Initialized
INFO - 2024-06-08 15:53:42 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:53:42 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:53:42 --> Utf8 Class Initialized
INFO - 2024-06-08 15:53:42 --> URI Class Initialized
INFO - 2024-06-08 15:53:42 --> Router Class Initialized
INFO - 2024-06-08 15:53:42 --> Output Class Initialized
INFO - 2024-06-08 15:53:42 --> Security Class Initialized
DEBUG - 2024-06-08 15:53:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:53:42 --> Input Class Initialized
INFO - 2024-06-08 15:53:42 --> Language Class Initialized
INFO - 2024-06-08 15:53:42 --> Loader Class Initialized
INFO - 2024-06-08 15:53:42 --> Helper loaded: form_helper
INFO - 2024-06-08 15:53:42 --> Helper loaded: url_helper
INFO - 2024-06-08 15:53:42 --> Database Driver Class Initialized
INFO - 2024-06-08 15:53:42 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:53:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:53:42 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:53:42 --> Controller Class Initialized
INFO - 2024-06-08 15:53:42 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:53:42 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:53:42 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:53:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:53:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:53:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:53:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:53:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:53:42 --> Final output sent to browser
DEBUG - 2024-06-08 15:53:42 --> Total execution time: 0.0164
INFO - 2024-06-08 15:54:37 --> Config Class Initialized
INFO - 2024-06-08 15:54:37 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:54:37 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:54:37 --> Utf8 Class Initialized
INFO - 2024-06-08 15:54:37 --> URI Class Initialized
INFO - 2024-06-08 15:54:37 --> Router Class Initialized
INFO - 2024-06-08 15:54:37 --> Output Class Initialized
INFO - 2024-06-08 15:54:37 --> Security Class Initialized
DEBUG - 2024-06-08 15:54:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:54:37 --> Input Class Initialized
INFO - 2024-06-08 15:54:37 --> Language Class Initialized
INFO - 2024-06-08 15:54:37 --> Loader Class Initialized
INFO - 2024-06-08 15:54:37 --> Helper loaded: form_helper
INFO - 2024-06-08 15:54:37 --> Helper loaded: url_helper
INFO - 2024-06-08 15:54:37 --> Database Driver Class Initialized
INFO - 2024-06-08 15:54:37 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:54:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:54:37 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:54:37 --> Controller Class Initialized
INFO - 2024-06-08 15:54:37 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:54:37 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:54:37 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:54:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:54:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:54:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:54:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:54:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:54:37 --> Final output sent to browser
DEBUG - 2024-06-08 15:54:37 --> Total execution time: 0.0390
INFO - 2024-06-08 15:54:53 --> Config Class Initialized
INFO - 2024-06-08 15:54:53 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:54:53 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:54:53 --> Utf8 Class Initialized
INFO - 2024-06-08 15:54:53 --> URI Class Initialized
INFO - 2024-06-08 15:54:53 --> Router Class Initialized
INFO - 2024-06-08 15:54:53 --> Output Class Initialized
INFO - 2024-06-08 15:54:53 --> Security Class Initialized
DEBUG - 2024-06-08 15:54:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:54:53 --> Input Class Initialized
INFO - 2024-06-08 15:54:53 --> Language Class Initialized
INFO - 2024-06-08 15:54:53 --> Loader Class Initialized
INFO - 2024-06-08 15:54:53 --> Helper loaded: form_helper
INFO - 2024-06-08 15:54:53 --> Helper loaded: url_helper
INFO - 2024-06-08 15:54:53 --> Database Driver Class Initialized
INFO - 2024-06-08 15:54:53 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:54:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:54:53 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:54:53 --> Controller Class Initialized
INFO - 2024-06-08 15:54:53 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:54:53 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:54:53 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:54:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:54:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:54:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:54:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:54:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:54:53 --> Final output sent to browser
DEBUG - 2024-06-08 15:54:53 --> Total execution time: 0.0161
INFO - 2024-06-08 15:55:08 --> Config Class Initialized
INFO - 2024-06-08 15:55:08 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:55:08 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:55:08 --> Utf8 Class Initialized
INFO - 2024-06-08 15:55:08 --> URI Class Initialized
INFO - 2024-06-08 15:55:08 --> Router Class Initialized
INFO - 2024-06-08 15:55:08 --> Output Class Initialized
INFO - 2024-06-08 15:55:08 --> Security Class Initialized
DEBUG - 2024-06-08 15:55:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:55:08 --> Input Class Initialized
INFO - 2024-06-08 15:55:08 --> Language Class Initialized
INFO - 2024-06-08 15:55:08 --> Loader Class Initialized
INFO - 2024-06-08 15:55:08 --> Helper loaded: form_helper
INFO - 2024-06-08 15:55:08 --> Helper loaded: url_helper
INFO - 2024-06-08 15:55:09 --> Database Driver Class Initialized
INFO - 2024-06-08 15:55:09 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:55:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:55:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:55:09 --> Controller Class Initialized
INFO - 2024-06-08 15:55:09 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:55:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:55:09 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:55:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:55:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:55:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:55:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:55:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:55:09 --> Final output sent to browser
DEBUG - 2024-06-08 15:55:09 --> Total execution time: 0.0374
INFO - 2024-06-08 15:55:18 --> Config Class Initialized
INFO - 2024-06-08 15:55:18 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:55:18 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:55:18 --> Utf8 Class Initialized
INFO - 2024-06-08 15:55:18 --> URI Class Initialized
INFO - 2024-06-08 15:55:18 --> Router Class Initialized
INFO - 2024-06-08 15:55:18 --> Output Class Initialized
INFO - 2024-06-08 15:55:18 --> Security Class Initialized
DEBUG - 2024-06-08 15:55:18 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:55:18 --> Input Class Initialized
INFO - 2024-06-08 15:55:18 --> Language Class Initialized
INFO - 2024-06-08 15:55:18 --> Loader Class Initialized
INFO - 2024-06-08 15:55:18 --> Helper loaded: form_helper
INFO - 2024-06-08 15:55:18 --> Helper loaded: url_helper
INFO - 2024-06-08 15:55:18 --> Database Driver Class Initialized
INFO - 2024-06-08 15:55:18 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:55:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:55:18 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:55:18 --> Controller Class Initialized
INFO - 2024-06-08 15:55:18 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:55:18 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:55:18 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:55:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:55:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:55:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:55:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:55:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:55:18 --> Final output sent to browser
DEBUG - 2024-06-08 15:55:18 --> Total execution time: 0.0382
INFO - 2024-06-08 15:55:27 --> Config Class Initialized
INFO - 2024-06-08 15:55:27 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:55:27 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:55:27 --> Utf8 Class Initialized
INFO - 2024-06-08 15:55:27 --> URI Class Initialized
INFO - 2024-06-08 15:55:27 --> Router Class Initialized
INFO - 2024-06-08 15:55:27 --> Output Class Initialized
INFO - 2024-06-08 15:55:27 --> Security Class Initialized
DEBUG - 2024-06-08 15:55:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:55:27 --> Input Class Initialized
INFO - 2024-06-08 15:55:27 --> Language Class Initialized
INFO - 2024-06-08 15:55:27 --> Loader Class Initialized
INFO - 2024-06-08 15:55:27 --> Helper loaded: form_helper
INFO - 2024-06-08 15:55:27 --> Helper loaded: url_helper
INFO - 2024-06-08 15:55:27 --> Database Driver Class Initialized
INFO - 2024-06-08 15:55:27 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:55:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:55:27 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:55:27 --> Controller Class Initialized
INFO - 2024-06-08 15:55:27 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:55:27 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:55:27 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:55:27 --> Pagination Class Initialized
INFO - 2024-06-08 15:55:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:55:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:55:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:55:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 15:55:27 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:55:27 --> Final output sent to browser
DEBUG - 2024-06-08 15:55:27 --> Total execution time: 0.0244
INFO - 2024-06-08 15:55:34 --> Config Class Initialized
INFO - 2024-06-08 15:55:34 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:55:34 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:55:34 --> Utf8 Class Initialized
INFO - 2024-06-08 15:55:34 --> URI Class Initialized
INFO - 2024-06-08 15:55:34 --> Router Class Initialized
INFO - 2024-06-08 15:55:34 --> Output Class Initialized
INFO - 2024-06-08 15:55:34 --> Security Class Initialized
DEBUG - 2024-06-08 15:55:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:55:34 --> Input Class Initialized
INFO - 2024-06-08 15:55:34 --> Language Class Initialized
INFO - 2024-06-08 15:55:34 --> Loader Class Initialized
INFO - 2024-06-08 15:55:34 --> Helper loaded: form_helper
INFO - 2024-06-08 15:55:34 --> Helper loaded: url_helper
INFO - 2024-06-08 15:55:34 --> Database Driver Class Initialized
INFO - 2024-06-08 15:55:34 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:55:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:55:34 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:55:34 --> Controller Class Initialized
INFO - 2024-06-08 15:55:34 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:55:34 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:55:34 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:55:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:55:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:55:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:55:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:55:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:55:34 --> Final output sent to browser
DEBUG - 2024-06-08 15:55:34 --> Total execution time: 0.0162
INFO - 2024-06-08 15:56:03 --> Config Class Initialized
INFO - 2024-06-08 15:56:03 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:56:03 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:56:03 --> Utf8 Class Initialized
INFO - 2024-06-08 15:56:03 --> URI Class Initialized
INFO - 2024-06-08 15:56:03 --> Router Class Initialized
INFO - 2024-06-08 15:56:03 --> Output Class Initialized
INFO - 2024-06-08 15:56:03 --> Security Class Initialized
DEBUG - 2024-06-08 15:56:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:56:03 --> Input Class Initialized
INFO - 2024-06-08 15:56:03 --> Language Class Initialized
INFO - 2024-06-08 15:56:03 --> Loader Class Initialized
INFO - 2024-06-08 15:56:03 --> Helper loaded: form_helper
INFO - 2024-06-08 15:56:03 --> Helper loaded: url_helper
INFO - 2024-06-08 15:56:03 --> Database Driver Class Initialized
INFO - 2024-06-08 15:56:03 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:56:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:56:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:56:03 --> Controller Class Initialized
INFO - 2024-06-08 15:56:03 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:56:03 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:56:03 --> Language file loaded: language/english/form_validation_lang.php
ERROR - 2024-06-08 15:56:03 --> Query error: Column 'is_penjamin' cannot be null - Invalid query: INSERT INTO `akun` (`nama_akun`, `kode_akun`, `alias`, `keterangan`, `nomor_rekening`, `creator`, `bank`, `debet`, `kredit`, `kode_jenis`, `is_iuran`, `is_penjamin`) VALUES ('PENGHASILAN', '4300', '', '', '', '1', 0, '0', '0', '1', '1', NULL)
INFO - 2024-06-08 15:56:03 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 15:57:44 --> Config Class Initialized
INFO - 2024-06-08 15:57:44 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:57:44 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:57:44 --> Utf8 Class Initialized
INFO - 2024-06-08 15:57:44 --> URI Class Initialized
INFO - 2024-06-08 15:57:44 --> Router Class Initialized
INFO - 2024-06-08 15:57:44 --> Output Class Initialized
INFO - 2024-06-08 15:57:44 --> Security Class Initialized
DEBUG - 2024-06-08 15:57:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:57:44 --> Input Class Initialized
INFO - 2024-06-08 15:57:44 --> Language Class Initialized
INFO - 2024-06-08 15:57:44 --> Loader Class Initialized
INFO - 2024-06-08 15:57:44 --> Helper loaded: form_helper
INFO - 2024-06-08 15:57:44 --> Helper loaded: url_helper
INFO - 2024-06-08 15:57:44 --> Database Driver Class Initialized
INFO - 2024-06-08 15:57:44 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:57:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:57:44 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:57:44 --> Controller Class Initialized
INFO - 2024-06-08 15:57:44 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:57:44 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:57:44 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:57:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:57:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:57:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:57:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:57:44 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:57:44 --> Final output sent to browser
DEBUG - 2024-06-08 15:57:44 --> Total execution time: 0.0302
INFO - 2024-06-08 15:57:46 --> Config Class Initialized
INFO - 2024-06-08 15:57:46 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:57:46 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:57:46 --> Utf8 Class Initialized
INFO - 2024-06-08 15:57:46 --> URI Class Initialized
INFO - 2024-06-08 15:57:46 --> Router Class Initialized
INFO - 2024-06-08 15:57:46 --> Output Class Initialized
INFO - 2024-06-08 15:57:46 --> Security Class Initialized
DEBUG - 2024-06-08 15:57:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:57:46 --> Input Class Initialized
INFO - 2024-06-08 15:57:46 --> Language Class Initialized
INFO - 2024-06-08 15:57:46 --> Loader Class Initialized
INFO - 2024-06-08 15:57:46 --> Helper loaded: form_helper
INFO - 2024-06-08 15:57:46 --> Helper loaded: url_helper
INFO - 2024-06-08 15:57:46 --> Database Driver Class Initialized
INFO - 2024-06-08 15:57:46 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:57:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:57:46 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:57:46 --> Controller Class Initialized
INFO - 2024-06-08 15:57:46 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:57:46 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:57:46 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:57:46 --> Pagination Class Initialized
INFO - 2024-06-08 15:57:46 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:57:46 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:57:46 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:57:46 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 15:57:46 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:57:46 --> Final output sent to browser
DEBUG - 2024-06-08 15:57:46 --> Total execution time: 0.0228
INFO - 2024-06-08 15:57:48 --> Config Class Initialized
INFO - 2024-06-08 15:57:48 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:57:48 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:57:48 --> Utf8 Class Initialized
INFO - 2024-06-08 15:57:48 --> URI Class Initialized
INFO - 2024-06-08 15:57:48 --> Router Class Initialized
INFO - 2024-06-08 15:57:48 --> Output Class Initialized
INFO - 2024-06-08 15:57:48 --> Security Class Initialized
DEBUG - 2024-06-08 15:57:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:57:48 --> Input Class Initialized
INFO - 2024-06-08 15:57:48 --> Language Class Initialized
INFO - 2024-06-08 15:57:48 --> Loader Class Initialized
INFO - 2024-06-08 15:57:48 --> Helper loaded: form_helper
INFO - 2024-06-08 15:57:48 --> Helper loaded: url_helper
INFO - 2024-06-08 15:57:48 --> Database Driver Class Initialized
INFO - 2024-06-08 15:57:48 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:57:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:57:48 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:57:48 --> Controller Class Initialized
INFO - 2024-06-08 15:57:48 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:57:48 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:57:48 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 15:57:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:57:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:57:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:57:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 15:57:48 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:57:48 --> Final output sent to browser
DEBUG - 2024-06-08 15:57:48 --> Total execution time: 0.0375
INFO - 2024-06-08 15:58:02 --> Config Class Initialized
INFO - 2024-06-08 15:58:02 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:58:02 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:58:02 --> Utf8 Class Initialized
INFO - 2024-06-08 15:58:02 --> URI Class Initialized
INFO - 2024-06-08 15:58:02 --> Router Class Initialized
INFO - 2024-06-08 15:58:02 --> Output Class Initialized
INFO - 2024-06-08 15:58:02 --> Security Class Initialized
DEBUG - 2024-06-08 15:58:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:58:02 --> Input Class Initialized
INFO - 2024-06-08 15:58:02 --> Language Class Initialized
INFO - 2024-06-08 15:58:02 --> Loader Class Initialized
INFO - 2024-06-08 15:58:02 --> Helper loaded: form_helper
INFO - 2024-06-08 15:58:02 --> Helper loaded: url_helper
INFO - 2024-06-08 15:58:02 --> Database Driver Class Initialized
INFO - 2024-06-08 15:58:02 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:58:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:58:02 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:58:02 --> Controller Class Initialized
INFO - 2024-06-08 15:58:02 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:58:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:58:02 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 15:58:02 --> Config Class Initialized
INFO - 2024-06-08 15:58:02 --> Hooks Class Initialized
DEBUG - 2024-06-08 15:58:02 --> UTF-8 Support Enabled
INFO - 2024-06-08 15:58:02 --> Utf8 Class Initialized
INFO - 2024-06-08 15:58:02 --> URI Class Initialized
INFO - 2024-06-08 15:58:02 --> Router Class Initialized
INFO - 2024-06-08 15:58:02 --> Output Class Initialized
INFO - 2024-06-08 15:58:02 --> Security Class Initialized
DEBUG - 2024-06-08 15:58:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 15:58:02 --> Input Class Initialized
INFO - 2024-06-08 15:58:02 --> Language Class Initialized
INFO - 2024-06-08 15:58:02 --> Loader Class Initialized
INFO - 2024-06-08 15:58:02 --> Helper loaded: form_helper
INFO - 2024-06-08 15:58:02 --> Helper loaded: url_helper
INFO - 2024-06-08 15:58:02 --> Database Driver Class Initialized
INFO - 2024-06-08 15:58:02 --> Form Validation Class Initialized
DEBUG - 2024-06-08 15:58:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 15:58:02 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 15:58:02 --> Controller Class Initialized
INFO - 2024-06-08 15:58:02 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 15:58:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 15:58:02 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 15:58:02 --> Pagination Class Initialized
INFO - 2024-06-08 15:58:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 15:58:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 15:58:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 15:58:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 15:58:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 15:58:02 --> Final output sent to browser
DEBUG - 2024-06-08 15:58:02 --> Total execution time: 0.0249
INFO - 2024-06-08 16:02:19 --> Config Class Initialized
INFO - 2024-06-08 16:02:19 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:02:19 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:02:19 --> Utf8 Class Initialized
INFO - 2024-06-08 16:02:19 --> URI Class Initialized
INFO - 2024-06-08 16:02:19 --> Router Class Initialized
INFO - 2024-06-08 16:02:19 --> Output Class Initialized
INFO - 2024-06-08 16:02:19 --> Security Class Initialized
DEBUG - 2024-06-08 16:02:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:02:19 --> Input Class Initialized
INFO - 2024-06-08 16:02:19 --> Language Class Initialized
INFO - 2024-06-08 16:02:19 --> Loader Class Initialized
INFO - 2024-06-08 16:02:19 --> Helper loaded: form_helper
INFO - 2024-06-08 16:02:19 --> Helper loaded: url_helper
INFO - 2024-06-08 16:02:19 --> Database Driver Class Initialized
INFO - 2024-06-08 16:02:19 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:02:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:02:19 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:02:19 --> Controller Class Initialized
INFO - 2024-06-08 16:02:19 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:02:19 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:02:19 --> Model "Jenis_akun_model" initialized
ERROR - 2024-06-08 16:02:19 --> Severity: Warning --> Undefined property: stdClass::$is_iuran E:\xampp\htdocs\ppdal\application\controllers\Akun.php 164
ERROR - 2024-06-08 16:02:19 --> Severity: Warning --> Undefined property: stdClass::$is_penjamin E:\xampp\htdocs\ppdal\application\controllers\Akun.php 165
INFO - 2024-06-08 16:02:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:02:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:02:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:02:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:02:19 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:02:19 --> Final output sent to browser
DEBUG - 2024-06-08 16:02:19 --> Total execution time: 0.0331
INFO - 2024-06-08 16:03:22 --> Config Class Initialized
INFO - 2024-06-08 16:03:22 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:22 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:22 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:22 --> URI Class Initialized
INFO - 2024-06-08 16:03:22 --> Router Class Initialized
INFO - 2024-06-08 16:03:22 --> Output Class Initialized
INFO - 2024-06-08 16:03:22 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:22 --> Input Class Initialized
INFO - 2024-06-08 16:03:22 --> Language Class Initialized
INFO - 2024-06-08 16:03:22 --> Loader Class Initialized
INFO - 2024-06-08 16:03:22 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:22 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:22 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:22 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:22 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:22 --> Controller Class Initialized
INFO - 2024-06-08 16:03:22 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:22 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:22 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 16:03:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:03:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:03:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:03:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:03:22 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:03:22 --> Final output sent to browser
DEBUG - 2024-06-08 16:03:22 --> Total execution time: 0.0161
INFO - 2024-06-08 16:03:28 --> Config Class Initialized
INFO - 2024-06-08 16:03:28 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:28 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:28 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:28 --> URI Class Initialized
INFO - 2024-06-08 16:03:28 --> Router Class Initialized
INFO - 2024-06-08 16:03:28 --> Output Class Initialized
INFO - 2024-06-08 16:03:28 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:28 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:28 --> Input Class Initialized
INFO - 2024-06-08 16:03:28 --> Language Class Initialized
INFO - 2024-06-08 16:03:28 --> Loader Class Initialized
INFO - 2024-06-08 16:03:28 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:28 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:28 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:28 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:28 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:28 --> Controller Class Initialized
INFO - 2024-06-08 16:03:28 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:28 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:28 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:03:28 --> Config Class Initialized
INFO - 2024-06-08 16:03:28 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:28 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:28 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:28 --> URI Class Initialized
INFO - 2024-06-08 16:03:28 --> Router Class Initialized
INFO - 2024-06-08 16:03:28 --> Output Class Initialized
INFO - 2024-06-08 16:03:28 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:28 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:28 --> Input Class Initialized
INFO - 2024-06-08 16:03:28 --> Language Class Initialized
INFO - 2024-06-08 16:03:28 --> Loader Class Initialized
INFO - 2024-06-08 16:03:28 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:28 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:28 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:28 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:28 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:28 --> Controller Class Initialized
INFO - 2024-06-08 16:03:28 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:28 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:28 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:03:28 --> Pagination Class Initialized
INFO - 2024-06-08 16:03:28 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:03:28 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:03:28 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:03:28 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:03:28 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:03:28 --> Final output sent to browser
DEBUG - 2024-06-08 16:03:28 --> Total execution time: 0.0220
INFO - 2024-06-08 16:03:41 --> Config Class Initialized
INFO - 2024-06-08 16:03:41 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:41 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:41 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:41 --> URI Class Initialized
INFO - 2024-06-08 16:03:41 --> Router Class Initialized
INFO - 2024-06-08 16:03:41 --> Output Class Initialized
INFO - 2024-06-08 16:03:41 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:41 --> Input Class Initialized
INFO - 2024-06-08 16:03:41 --> Language Class Initialized
INFO - 2024-06-08 16:03:41 --> Loader Class Initialized
INFO - 2024-06-08 16:03:41 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:41 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:41 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:41 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:41 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:41 --> Controller Class Initialized
INFO - 2024-06-08 16:03:41 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:41 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 16:03:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:03:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:03:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:03:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:03:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:03:41 --> Final output sent to browser
DEBUG - 2024-06-08 16:03:41 --> Total execution time: 0.0166
INFO - 2024-06-08 16:03:45 --> Config Class Initialized
INFO - 2024-06-08 16:03:45 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:45 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:45 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:45 --> URI Class Initialized
INFO - 2024-06-08 16:03:45 --> Router Class Initialized
INFO - 2024-06-08 16:03:45 --> Output Class Initialized
INFO - 2024-06-08 16:03:45 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:45 --> Input Class Initialized
INFO - 2024-06-08 16:03:45 --> Language Class Initialized
INFO - 2024-06-08 16:03:45 --> Loader Class Initialized
INFO - 2024-06-08 16:03:45 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:45 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:45 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:45 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:45 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:45 --> Controller Class Initialized
INFO - 2024-06-08 16:03:45 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:45 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:45 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:03:45 --> Config Class Initialized
INFO - 2024-06-08 16:03:45 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:45 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:45 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:45 --> URI Class Initialized
INFO - 2024-06-08 16:03:45 --> Router Class Initialized
INFO - 2024-06-08 16:03:45 --> Output Class Initialized
INFO - 2024-06-08 16:03:45 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:45 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:45 --> Input Class Initialized
INFO - 2024-06-08 16:03:45 --> Language Class Initialized
INFO - 2024-06-08 16:03:45 --> Loader Class Initialized
INFO - 2024-06-08 16:03:45 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:45 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:45 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:45 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:45 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:45 --> Controller Class Initialized
INFO - 2024-06-08 16:03:45 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:45 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:45 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:03:45 --> Pagination Class Initialized
INFO - 2024-06-08 16:03:45 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:03:45 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:03:45 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:03:45 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:03:45 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:03:45 --> Final output sent to browser
DEBUG - 2024-06-08 16:03:45 --> Total execution time: 0.0222
INFO - 2024-06-08 16:03:47 --> Config Class Initialized
INFO - 2024-06-08 16:03:47 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:47 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:47 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:47 --> URI Class Initialized
INFO - 2024-06-08 16:03:47 --> Router Class Initialized
INFO - 2024-06-08 16:03:47 --> Output Class Initialized
INFO - 2024-06-08 16:03:47 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:47 --> Input Class Initialized
INFO - 2024-06-08 16:03:47 --> Language Class Initialized
INFO - 2024-06-08 16:03:47 --> Loader Class Initialized
INFO - 2024-06-08 16:03:47 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:47 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:47 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:47 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:47 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:47 --> Controller Class Initialized
INFO - 2024-06-08 16:03:47 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:47 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:47 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 16:03:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:03:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:03:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:03:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:03:47 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:03:47 --> Final output sent to browser
DEBUG - 2024-06-08 16:03:47 --> Total execution time: 0.0184
INFO - 2024-06-08 16:03:51 --> Config Class Initialized
INFO - 2024-06-08 16:03:51 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:51 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:51 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:51 --> URI Class Initialized
INFO - 2024-06-08 16:03:51 --> Router Class Initialized
INFO - 2024-06-08 16:03:51 --> Output Class Initialized
INFO - 2024-06-08 16:03:51 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:51 --> Input Class Initialized
INFO - 2024-06-08 16:03:51 --> Language Class Initialized
INFO - 2024-06-08 16:03:51 --> Loader Class Initialized
INFO - 2024-06-08 16:03:51 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:51 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:51 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:51 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:51 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:51 --> Controller Class Initialized
INFO - 2024-06-08 16:03:51 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:51 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:51 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:03:51 --> Config Class Initialized
INFO - 2024-06-08 16:03:51 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:03:51 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:03:51 --> Utf8 Class Initialized
INFO - 2024-06-08 16:03:51 --> URI Class Initialized
INFO - 2024-06-08 16:03:51 --> Router Class Initialized
INFO - 2024-06-08 16:03:51 --> Output Class Initialized
INFO - 2024-06-08 16:03:51 --> Security Class Initialized
DEBUG - 2024-06-08 16:03:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:03:51 --> Input Class Initialized
INFO - 2024-06-08 16:03:51 --> Language Class Initialized
INFO - 2024-06-08 16:03:51 --> Loader Class Initialized
INFO - 2024-06-08 16:03:51 --> Helper loaded: form_helper
INFO - 2024-06-08 16:03:51 --> Helper loaded: url_helper
INFO - 2024-06-08 16:03:51 --> Database Driver Class Initialized
INFO - 2024-06-08 16:03:51 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:03:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:03:51 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:03:51 --> Controller Class Initialized
INFO - 2024-06-08 16:03:51 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:03:51 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:03:51 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:03:51 --> Pagination Class Initialized
INFO - 2024-06-08 16:03:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:03:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:03:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:03:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:03:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:03:51 --> Final output sent to browser
DEBUG - 2024-06-08 16:03:51 --> Total execution time: 0.0246
INFO - 2024-06-08 16:04:09 --> Config Class Initialized
INFO - 2024-06-08 16:04:09 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:09 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:09 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:09 --> URI Class Initialized
INFO - 2024-06-08 16:04:09 --> Router Class Initialized
INFO - 2024-06-08 16:04:09 --> Output Class Initialized
INFO - 2024-06-08 16:04:09 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:09 --> Input Class Initialized
INFO - 2024-06-08 16:04:09 --> Language Class Initialized
INFO - 2024-06-08 16:04:09 --> Loader Class Initialized
INFO - 2024-06-08 16:04:09 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:09 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:09 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:09 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:09 --> Controller Class Initialized
INFO - 2024-06-08 16:04:09 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:09 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:04:09 --> Pagination Class Initialized
INFO - 2024-06-08 16:04:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:04:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:04:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:04:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:04:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:04:09 --> Final output sent to browser
DEBUG - 2024-06-08 16:04:09 --> Total execution time: 0.0225
INFO - 2024-06-08 16:04:11 --> Config Class Initialized
INFO - 2024-06-08 16:04:11 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:11 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:11 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:11 --> URI Class Initialized
INFO - 2024-06-08 16:04:11 --> Router Class Initialized
INFO - 2024-06-08 16:04:11 --> Output Class Initialized
INFO - 2024-06-08 16:04:11 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:11 --> Input Class Initialized
INFO - 2024-06-08 16:04:11 --> Language Class Initialized
INFO - 2024-06-08 16:04:11 --> Loader Class Initialized
INFO - 2024-06-08 16:04:11 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:11 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:11 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:11 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:11 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:11 --> Controller Class Initialized
INFO - 2024-06-08 16:04:11 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:11 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:11 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 16:04:11 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:04:11 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:04:11 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:04:11 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:04:11 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:04:11 --> Final output sent to browser
DEBUG - 2024-06-08 16:04:11 --> Total execution time: 0.0160
INFO - 2024-06-08 16:04:31 --> Config Class Initialized
INFO - 2024-06-08 16:04:31 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:31 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:31 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:31 --> URI Class Initialized
INFO - 2024-06-08 16:04:31 --> Router Class Initialized
INFO - 2024-06-08 16:04:31 --> Output Class Initialized
INFO - 2024-06-08 16:04:31 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:31 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:31 --> Input Class Initialized
INFO - 2024-06-08 16:04:31 --> Language Class Initialized
INFO - 2024-06-08 16:04:31 --> Loader Class Initialized
INFO - 2024-06-08 16:04:31 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:31 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:31 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:31 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:31 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:31 --> Controller Class Initialized
INFO - 2024-06-08 16:04:31 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:31 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:31 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:04:31 --> Config Class Initialized
INFO - 2024-06-08 16:04:31 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:31 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:31 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:31 --> URI Class Initialized
INFO - 2024-06-08 16:04:31 --> Router Class Initialized
INFO - 2024-06-08 16:04:31 --> Output Class Initialized
INFO - 2024-06-08 16:04:31 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:31 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:31 --> Input Class Initialized
INFO - 2024-06-08 16:04:31 --> Language Class Initialized
INFO - 2024-06-08 16:04:31 --> Loader Class Initialized
INFO - 2024-06-08 16:04:31 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:31 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:31 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:31 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:31 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:31 --> Controller Class Initialized
INFO - 2024-06-08 16:04:31 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:31 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:31 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:04:31 --> Pagination Class Initialized
INFO - 2024-06-08 16:04:31 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:04:31 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:04:31 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:04:31 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:04:31 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:04:31 --> Final output sent to browser
DEBUG - 2024-06-08 16:04:31 --> Total execution time: 0.0235
INFO - 2024-06-08 16:04:38 --> Config Class Initialized
INFO - 2024-06-08 16:04:38 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:38 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:38 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:38 --> URI Class Initialized
INFO - 2024-06-08 16:04:38 --> Router Class Initialized
INFO - 2024-06-08 16:04:38 --> Output Class Initialized
INFO - 2024-06-08 16:04:38 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:38 --> Input Class Initialized
INFO - 2024-06-08 16:04:38 --> Language Class Initialized
INFO - 2024-06-08 16:04:38 --> Loader Class Initialized
INFO - 2024-06-08 16:04:38 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:38 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:38 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:38 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:38 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:38 --> Controller Class Initialized
INFO - 2024-06-08 16:04:38 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:38 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:38 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 16:04:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:04:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:04:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:04:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:04:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:04:38 --> Final output sent to browser
DEBUG - 2024-06-08 16:04:38 --> Total execution time: 0.0156
INFO - 2024-06-08 16:04:41 --> Config Class Initialized
INFO - 2024-06-08 16:04:41 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:41 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:41 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:41 --> URI Class Initialized
INFO - 2024-06-08 16:04:41 --> Router Class Initialized
INFO - 2024-06-08 16:04:41 --> Output Class Initialized
INFO - 2024-06-08 16:04:41 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:41 --> Input Class Initialized
INFO - 2024-06-08 16:04:41 --> Language Class Initialized
INFO - 2024-06-08 16:04:41 --> Loader Class Initialized
INFO - 2024-06-08 16:04:41 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:41 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:41 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:41 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:41 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:41 --> Controller Class Initialized
INFO - 2024-06-08 16:04:41 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:41 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:04:41 --> Config Class Initialized
INFO - 2024-06-08 16:04:41 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:41 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:41 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:41 --> URI Class Initialized
INFO - 2024-06-08 16:04:41 --> Router Class Initialized
INFO - 2024-06-08 16:04:41 --> Output Class Initialized
INFO - 2024-06-08 16:04:41 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:41 --> Input Class Initialized
INFO - 2024-06-08 16:04:41 --> Language Class Initialized
INFO - 2024-06-08 16:04:41 --> Loader Class Initialized
INFO - 2024-06-08 16:04:41 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:41 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:41 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:41 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:41 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:41 --> Controller Class Initialized
INFO - 2024-06-08 16:04:41 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:41 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:41 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:04:41 --> Pagination Class Initialized
INFO - 2024-06-08 16:04:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:04:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:04:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:04:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:04:41 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:04:41 --> Final output sent to browser
DEBUG - 2024-06-08 16:04:41 --> Total execution time: 0.0223
INFO - 2024-06-08 16:04:56 --> Config Class Initialized
INFO - 2024-06-08 16:04:56 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:04:56 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:04:56 --> Utf8 Class Initialized
INFO - 2024-06-08 16:04:56 --> URI Class Initialized
INFO - 2024-06-08 16:04:56 --> Router Class Initialized
INFO - 2024-06-08 16:04:56 --> Output Class Initialized
INFO - 2024-06-08 16:04:56 --> Security Class Initialized
DEBUG - 2024-06-08 16:04:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:04:56 --> Input Class Initialized
INFO - 2024-06-08 16:04:56 --> Language Class Initialized
INFO - 2024-06-08 16:04:56 --> Loader Class Initialized
INFO - 2024-06-08 16:04:56 --> Helper loaded: form_helper
INFO - 2024-06-08 16:04:56 --> Helper loaded: url_helper
INFO - 2024-06-08 16:04:56 --> Database Driver Class Initialized
INFO - 2024-06-08 16:04:56 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:04:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:04:56 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:04:56 --> Controller Class Initialized
INFO - 2024-06-08 16:04:56 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:04:56 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:04:56 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:04:56 --> Pagination Class Initialized
INFO - 2024-06-08 16:04:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:04:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:04:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:04:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:04:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:04:56 --> Final output sent to browser
DEBUG - 2024-06-08 16:04:56 --> Total execution time: 0.0232
INFO - 2024-06-08 16:05:14 --> Config Class Initialized
INFO - 2024-06-08 16:05:14 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:05:14 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:05:14 --> Utf8 Class Initialized
INFO - 2024-06-08 16:05:14 --> URI Class Initialized
INFO - 2024-06-08 16:05:14 --> Router Class Initialized
INFO - 2024-06-08 16:05:14 --> Output Class Initialized
INFO - 2024-06-08 16:05:14 --> Security Class Initialized
DEBUG - 2024-06-08 16:05:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:05:14 --> Input Class Initialized
INFO - 2024-06-08 16:05:14 --> Language Class Initialized
INFO - 2024-06-08 16:05:14 --> Loader Class Initialized
INFO - 2024-06-08 16:05:14 --> Helper loaded: form_helper
INFO - 2024-06-08 16:05:14 --> Helper loaded: url_helper
INFO - 2024-06-08 16:05:14 --> Database Driver Class Initialized
INFO - 2024-06-08 16:05:14 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:05:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:05:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:05:14 --> Controller Class Initialized
INFO - 2024-06-08 16:05:14 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:05:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:05:14 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:05:14 --> Pagination Class Initialized
INFO - 2024-06-08 16:05:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:05:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:05:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:05:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:05:14 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:05:14 --> Final output sent to browser
DEBUG - 2024-06-08 16:05:14 --> Total execution time: 0.0444
INFO - 2024-06-08 16:05:34 --> Config Class Initialized
INFO - 2024-06-08 16:05:34 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:05:34 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:05:34 --> Utf8 Class Initialized
INFO - 2024-06-08 16:05:34 --> URI Class Initialized
INFO - 2024-06-08 16:05:34 --> Router Class Initialized
INFO - 2024-06-08 16:05:34 --> Output Class Initialized
INFO - 2024-06-08 16:05:34 --> Security Class Initialized
DEBUG - 2024-06-08 16:05:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:05:34 --> Input Class Initialized
INFO - 2024-06-08 16:05:34 --> Language Class Initialized
INFO - 2024-06-08 16:05:34 --> Loader Class Initialized
INFO - 2024-06-08 16:05:34 --> Helper loaded: form_helper
INFO - 2024-06-08 16:05:34 --> Helper loaded: url_helper
INFO - 2024-06-08 16:05:34 --> Database Driver Class Initialized
INFO - 2024-06-08 16:05:34 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:05:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:05:34 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:05:34 --> Controller Class Initialized
INFO - 2024-06-08 16:05:34 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:05:34 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:05:34 --> Model "Jenis_akun_model" initialized
INFO - 2024-06-08 16:05:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:05:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:05:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:05:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_form.php
INFO - 2024-06-08 16:05:34 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:05:34 --> Final output sent to browser
DEBUG - 2024-06-08 16:05:34 --> Total execution time: 0.0197
INFO - 2024-06-08 16:05:36 --> Config Class Initialized
INFO - 2024-06-08 16:05:36 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:05:36 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:05:36 --> Utf8 Class Initialized
INFO - 2024-06-08 16:05:36 --> URI Class Initialized
INFO - 2024-06-08 16:05:36 --> Router Class Initialized
INFO - 2024-06-08 16:05:36 --> Output Class Initialized
INFO - 2024-06-08 16:05:36 --> Security Class Initialized
DEBUG - 2024-06-08 16:05:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:05:36 --> Input Class Initialized
INFO - 2024-06-08 16:05:36 --> Language Class Initialized
INFO - 2024-06-08 16:05:36 --> Loader Class Initialized
INFO - 2024-06-08 16:05:36 --> Helper loaded: form_helper
INFO - 2024-06-08 16:05:36 --> Helper loaded: url_helper
INFO - 2024-06-08 16:05:36 --> Database Driver Class Initialized
INFO - 2024-06-08 16:05:36 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:05:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:05:36 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:05:36 --> Controller Class Initialized
INFO - 2024-06-08 16:05:36 --> Model "Akun_model" initialized
DEBUG - 2024-06-08 16:05:36 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:05:36 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:05:36 --> Pagination Class Initialized
INFO - 2024-06-08 16:05:36 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:05:36 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:05:36 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:05:36 --> File loaded: E:\xampp\htdocs\ppdal\application\views\akun/akun_list.php
INFO - 2024-06-08 16:05:36 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:05:36 --> Final output sent to browser
DEBUG - 2024-06-08 16:05:36 --> Total execution time: 0.0284
INFO - 2024-06-08 16:19:03 --> Config Class Initialized
INFO - 2024-06-08 16:19:03 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:19:03 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:19:03 --> Utf8 Class Initialized
INFO - 2024-06-08 16:19:03 --> URI Class Initialized
INFO - 2024-06-08 16:19:03 --> Router Class Initialized
INFO - 2024-06-08 16:19:03 --> Output Class Initialized
INFO - 2024-06-08 16:19:03 --> Security Class Initialized
DEBUG - 2024-06-08 16:19:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:19:03 --> Input Class Initialized
INFO - 2024-06-08 16:19:03 --> Language Class Initialized
INFO - 2024-06-08 16:19:03 --> Loader Class Initialized
INFO - 2024-06-08 16:19:03 --> Helper loaded: form_helper
INFO - 2024-06-08 16:19:03 --> Helper loaded: url_helper
INFO - 2024-06-08 16:19:03 --> Database Driver Class Initialized
INFO - 2024-06-08 16:19:03 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:19:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:19:03 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:19:03 --> Controller Class Initialized
INFO - 2024-06-08 16:19:03 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:19:03 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:19:03 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:19:03 --> Pagination Class Initialized
INFO - 2024-06-08 16:19:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:19:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:19:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:19:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 16:19:03 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:19:03 --> Final output sent to browser
DEBUG - 2024-06-08 16:19:03 --> Total execution time: 0.0199
INFO - 2024-06-08 16:19:05 --> Config Class Initialized
INFO - 2024-06-08 16:19:05 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:19:05 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:19:05 --> Utf8 Class Initialized
INFO - 2024-06-08 16:19:05 --> URI Class Initialized
INFO - 2024-06-08 16:19:05 --> Router Class Initialized
INFO - 2024-06-08 16:19:05 --> Output Class Initialized
INFO - 2024-06-08 16:19:05 --> Security Class Initialized
DEBUG - 2024-06-08 16:19:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:19:05 --> Input Class Initialized
INFO - 2024-06-08 16:19:05 --> Language Class Initialized
INFO - 2024-06-08 16:19:05 --> Loader Class Initialized
INFO - 2024-06-08 16:19:05 --> Helper loaded: form_helper
INFO - 2024-06-08 16:19:05 --> Helper loaded: url_helper
INFO - 2024-06-08 16:19:05 --> Database Driver Class Initialized
INFO - 2024-06-08 16:19:05 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:19:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:19:05 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:19:05 --> Controller Class Initialized
INFO - 2024-06-08 16:19:05 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:19:05 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:19:05 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:19:05 --> Model "Users_model" initialized
INFO - 2024-06-08 16:19:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:19:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:19:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:19:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:19:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:19:05 --> Final output sent to browser
DEBUG - 2024-06-08 16:19:05 --> Total execution time: 0.0199
INFO - 2024-06-08 16:19:09 --> Config Class Initialized
INFO - 2024-06-08 16:19:09 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:19:09 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:19:09 --> Utf8 Class Initialized
INFO - 2024-06-08 16:19:09 --> URI Class Initialized
INFO - 2024-06-08 16:19:09 --> Router Class Initialized
INFO - 2024-06-08 16:19:09 --> Output Class Initialized
INFO - 2024-06-08 16:19:09 --> Security Class Initialized
DEBUG - 2024-06-08 16:19:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:19:09 --> Input Class Initialized
INFO - 2024-06-08 16:19:09 --> Language Class Initialized
INFO - 2024-06-08 16:19:09 --> Loader Class Initialized
INFO - 2024-06-08 16:19:09 --> Helper loaded: form_helper
INFO - 2024-06-08 16:19:09 --> Helper loaded: url_helper
INFO - 2024-06-08 16:19:09 --> Database Driver Class Initialized
INFO - 2024-06-08 16:19:09 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:19:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:19:09 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:19:09 --> Controller Class Initialized
INFO - 2024-06-08 16:19:09 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:19:09 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:19:09 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:19:09 --> Model "Users_model" initialized
INFO - 2024-06-08 16:19:09 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:19:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:19:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:19:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:19:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_form.php
INFO - 2024-06-08 16:19:09 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:19:09 --> Final output sent to browser
DEBUG - 2024-06-08 16:19:09 --> Total execution time: 0.0457
INFO - 2024-06-08 16:19:14 --> Config Class Initialized
INFO - 2024-06-08 16:19:14 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:19:14 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:19:14 --> Utf8 Class Initialized
INFO - 2024-06-08 16:19:14 --> URI Class Initialized
INFO - 2024-06-08 16:19:14 --> Router Class Initialized
INFO - 2024-06-08 16:19:14 --> Output Class Initialized
INFO - 2024-06-08 16:19:14 --> Security Class Initialized
DEBUG - 2024-06-08 16:19:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:19:14 --> Input Class Initialized
INFO - 2024-06-08 16:19:14 --> Language Class Initialized
INFO - 2024-06-08 16:19:14 --> Loader Class Initialized
INFO - 2024-06-08 16:19:14 --> Helper loaded: form_helper
INFO - 2024-06-08 16:19:14 --> Helper loaded: url_helper
INFO - 2024-06-08 16:19:14 --> Database Driver Class Initialized
INFO - 2024-06-08 16:19:14 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:19:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:19:14 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:19:14 --> Controller Class Initialized
INFO - 2024-06-08 16:19:14 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:19:14 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:19:14 --> Model "Akun_model" initialized
ERROR - 2024-06-08 16:19:14 --> Severity: error --> Exception: Call to a member function first_row() on array E:\xampp\htdocs\ppdal\application\controllers\Transaksi_iuran.php 248
INFO - 2024-06-08 16:21:12 --> Config Class Initialized
INFO - 2024-06-08 16:21:12 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:21:12 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:21:12 --> Utf8 Class Initialized
INFO - 2024-06-08 16:21:12 --> URI Class Initialized
INFO - 2024-06-08 16:21:12 --> Router Class Initialized
INFO - 2024-06-08 16:21:12 --> Output Class Initialized
INFO - 2024-06-08 16:21:12 --> Security Class Initialized
DEBUG - 2024-06-08 16:21:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:21:12 --> Input Class Initialized
INFO - 2024-06-08 16:21:12 --> Language Class Initialized
INFO - 2024-06-08 16:21:12 --> Loader Class Initialized
INFO - 2024-06-08 16:21:12 --> Helper loaded: form_helper
INFO - 2024-06-08 16:21:12 --> Helper loaded: url_helper
INFO - 2024-06-08 16:21:12 --> Database Driver Class Initialized
INFO - 2024-06-08 16:21:12 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:21:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:21:12 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:21:12 --> Controller Class Initialized
INFO - 2024-06-08 16:21:12 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:21:12 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:21:12 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:21:12 --> Pagination Class Initialized
INFO - 2024-06-08 16:21:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:21:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:21:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:21:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 16:21:12 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:21:12 --> Final output sent to browser
DEBUG - 2024-06-08 16:21:12 --> Total execution time: 0.0226
INFO - 2024-06-08 16:21:15 --> Config Class Initialized
INFO - 2024-06-08 16:21:15 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:21:15 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:21:15 --> Utf8 Class Initialized
INFO - 2024-06-08 16:21:15 --> URI Class Initialized
INFO - 2024-06-08 16:21:15 --> Router Class Initialized
INFO - 2024-06-08 16:21:15 --> Output Class Initialized
INFO - 2024-06-08 16:21:15 --> Security Class Initialized
DEBUG - 2024-06-08 16:21:15 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:21:15 --> Input Class Initialized
INFO - 2024-06-08 16:21:15 --> Language Class Initialized
INFO - 2024-06-08 16:21:15 --> Loader Class Initialized
INFO - 2024-06-08 16:21:15 --> Helper loaded: form_helper
INFO - 2024-06-08 16:21:15 --> Helper loaded: url_helper
INFO - 2024-06-08 16:21:15 --> Database Driver Class Initialized
INFO - 2024-06-08 16:21:15 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:21:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:21:15 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:21:15 --> Controller Class Initialized
INFO - 2024-06-08 16:21:15 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:21:15 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:21:15 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:21:16 --> Model "Users_model" initialized
INFO - 2024-06-08 16:21:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:21:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:21:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:21:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:21:16 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:21:16 --> Final output sent to browser
DEBUG - 2024-06-08 16:21:16 --> Total execution time: 0.0171
INFO - 2024-06-08 16:21:18 --> Config Class Initialized
INFO - 2024-06-08 16:21:18 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:21:18 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:21:18 --> Utf8 Class Initialized
INFO - 2024-06-08 16:21:18 --> URI Class Initialized
INFO - 2024-06-08 16:21:18 --> Router Class Initialized
INFO - 2024-06-08 16:21:18 --> Output Class Initialized
INFO - 2024-06-08 16:21:18 --> Security Class Initialized
DEBUG - 2024-06-08 16:21:18 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:21:18 --> Input Class Initialized
INFO - 2024-06-08 16:21:18 --> Language Class Initialized
INFO - 2024-06-08 16:21:18 --> Loader Class Initialized
INFO - 2024-06-08 16:21:18 --> Helper loaded: form_helper
INFO - 2024-06-08 16:21:18 --> Helper loaded: url_helper
INFO - 2024-06-08 16:21:18 --> Database Driver Class Initialized
INFO - 2024-06-08 16:21:18 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:21:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:21:18 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:21:18 --> Controller Class Initialized
INFO - 2024-06-08 16:21:18 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:21:18 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:21:18 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:21:18 --> Model "Users_model" initialized
INFO - 2024-06-08 16:21:18 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:21:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:21:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:21:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:21:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_form.php
INFO - 2024-06-08 16:21:18 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:21:18 --> Final output sent to browser
DEBUG - 2024-06-08 16:21:18 --> Total execution time: 0.0191
INFO - 2024-06-08 16:21:21 --> Config Class Initialized
INFO - 2024-06-08 16:21:21 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:21:21 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:21:21 --> Utf8 Class Initialized
INFO - 2024-06-08 16:21:21 --> URI Class Initialized
INFO - 2024-06-08 16:21:21 --> Router Class Initialized
INFO - 2024-06-08 16:21:21 --> Output Class Initialized
INFO - 2024-06-08 16:21:21 --> Security Class Initialized
DEBUG - 2024-06-08 16:21:21 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:21:21 --> Input Class Initialized
INFO - 2024-06-08 16:21:21 --> Language Class Initialized
INFO - 2024-06-08 16:21:21 --> Loader Class Initialized
INFO - 2024-06-08 16:21:21 --> Helper loaded: form_helper
INFO - 2024-06-08 16:21:21 --> Helper loaded: url_helper
INFO - 2024-06-08 16:21:21 --> Database Driver Class Initialized
INFO - 2024-06-08 16:21:21 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:21:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:21:21 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:21:21 --> Controller Class Initialized
INFO - 2024-06-08 16:21:21 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:21:21 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:21:21 --> Model "Akun_model" initialized
ERROR - 2024-06-08 16:21:21 --> Severity: error --> Exception: sizeof(): Argument #1 ($value) must be of type Countable|array, CI_DB_mysqli_result given E:\xampp\htdocs\ppdal\application\controllers\Transaksi_iuran.php 247
INFO - 2024-06-08 16:23:37 --> Config Class Initialized
INFO - 2024-06-08 16:23:37 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:23:37 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:23:37 --> Utf8 Class Initialized
INFO - 2024-06-08 16:23:37 --> URI Class Initialized
INFO - 2024-06-08 16:23:37 --> Router Class Initialized
INFO - 2024-06-08 16:23:37 --> Output Class Initialized
INFO - 2024-06-08 16:23:37 --> Security Class Initialized
DEBUG - 2024-06-08 16:23:37 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:23:37 --> Input Class Initialized
INFO - 2024-06-08 16:23:37 --> Language Class Initialized
INFO - 2024-06-08 16:23:37 --> Loader Class Initialized
INFO - 2024-06-08 16:23:37 --> Helper loaded: form_helper
INFO - 2024-06-08 16:23:37 --> Helper loaded: url_helper
INFO - 2024-06-08 16:23:37 --> Database Driver Class Initialized
INFO - 2024-06-08 16:23:37 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:23:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:23:37 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:23:37 --> Controller Class Initialized
INFO - 2024-06-08 16:23:37 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:23:37 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:23:37 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:23:37 --> Pagination Class Initialized
INFO - 2024-06-08 16:23:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:23:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:23:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:23:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 16:23:37 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:23:37 --> Final output sent to browser
DEBUG - 2024-06-08 16:23:37 --> Total execution time: 0.0225
INFO - 2024-06-08 16:23:40 --> Config Class Initialized
INFO - 2024-06-08 16:23:40 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:23:40 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:23:40 --> Utf8 Class Initialized
INFO - 2024-06-08 16:23:40 --> URI Class Initialized
INFO - 2024-06-08 16:23:40 --> Router Class Initialized
INFO - 2024-06-08 16:23:40 --> Output Class Initialized
INFO - 2024-06-08 16:23:40 --> Security Class Initialized
DEBUG - 2024-06-08 16:23:40 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:23:40 --> Input Class Initialized
INFO - 2024-06-08 16:23:40 --> Language Class Initialized
INFO - 2024-06-08 16:23:40 --> Loader Class Initialized
INFO - 2024-06-08 16:23:40 --> Helper loaded: form_helper
INFO - 2024-06-08 16:23:40 --> Helper loaded: url_helper
INFO - 2024-06-08 16:23:40 --> Database Driver Class Initialized
INFO - 2024-06-08 16:23:40 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:23:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:23:40 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:23:40 --> Controller Class Initialized
INFO - 2024-06-08 16:23:40 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:23:40 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:23:40 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:23:40 --> Model "Users_model" initialized
INFO - 2024-06-08 16:23:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:23:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:23:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:23:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:23:40 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:23:40 --> Final output sent to browser
DEBUG - 2024-06-08 16:23:40 --> Total execution time: 0.0177
INFO - 2024-06-08 16:23:43 --> Config Class Initialized
INFO - 2024-06-08 16:23:43 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:23:43 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:23:43 --> Utf8 Class Initialized
INFO - 2024-06-08 16:23:43 --> URI Class Initialized
INFO - 2024-06-08 16:23:43 --> Router Class Initialized
INFO - 2024-06-08 16:23:43 --> Output Class Initialized
INFO - 2024-06-08 16:23:43 --> Security Class Initialized
DEBUG - 2024-06-08 16:23:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:23:43 --> Input Class Initialized
INFO - 2024-06-08 16:23:43 --> Language Class Initialized
INFO - 2024-06-08 16:23:43 --> Loader Class Initialized
INFO - 2024-06-08 16:23:43 --> Helper loaded: form_helper
INFO - 2024-06-08 16:23:43 --> Helper loaded: url_helper
INFO - 2024-06-08 16:23:43 --> Database Driver Class Initialized
INFO - 2024-06-08 16:23:43 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:23:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:23:43 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:23:43 --> Controller Class Initialized
INFO - 2024-06-08 16:23:43 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:23:43 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:23:43 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:23:43 --> Model "Users_model" initialized
INFO - 2024-06-08 16:23:43 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:23:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:23:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:23:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:23:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_form.php
INFO - 2024-06-08 16:23:43 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:23:43 --> Final output sent to browser
DEBUG - 2024-06-08 16:23:43 --> Total execution time: 0.0339
INFO - 2024-06-08 16:23:46 --> Config Class Initialized
INFO - 2024-06-08 16:23:46 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:23:46 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:23:46 --> Utf8 Class Initialized
INFO - 2024-06-08 16:23:46 --> URI Class Initialized
INFO - 2024-06-08 16:23:46 --> Router Class Initialized
INFO - 2024-06-08 16:23:46 --> Output Class Initialized
INFO - 2024-06-08 16:23:46 --> Security Class Initialized
DEBUG - 2024-06-08 16:23:46 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:23:46 --> Input Class Initialized
INFO - 2024-06-08 16:23:46 --> Language Class Initialized
INFO - 2024-06-08 16:23:46 --> Loader Class Initialized
INFO - 2024-06-08 16:23:46 --> Helper loaded: form_helper
INFO - 2024-06-08 16:23:46 --> Helper loaded: url_helper
INFO - 2024-06-08 16:23:46 --> Database Driver Class Initialized
INFO - 2024-06-08 16:23:46 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:23:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:23:46 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:23:46 --> Controller Class Initialized
INFO - 2024-06-08 16:23:46 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:23:46 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:23:46 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:33:55 --> Config Class Initialized
INFO - 2024-06-08 16:33:55 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:33:55 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:33:55 --> Utf8 Class Initialized
INFO - 2024-06-08 16:33:55 --> URI Class Initialized
DEBUG - 2024-06-08 16:33:55 --> No URI present. Default controller set.
INFO - 2024-06-08 16:33:55 --> Router Class Initialized
INFO - 2024-06-08 16:33:55 --> Output Class Initialized
INFO - 2024-06-08 16:33:55 --> Security Class Initialized
DEBUG - 2024-06-08 16:33:55 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:33:55 --> Input Class Initialized
INFO - 2024-06-08 16:33:55 --> Language Class Initialized
INFO - 2024-06-08 16:33:55 --> Loader Class Initialized
INFO - 2024-06-08 16:33:55 --> Helper loaded: form_helper
INFO - 2024-06-08 16:33:55 --> Helper loaded: url_helper
INFO - 2024-06-08 16:33:55 --> Database Driver Class Initialized
INFO - 2024-06-08 16:33:55 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:33:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:33:55 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:33:55 --> Controller Class Initialized
INFO - 2024-06-08 16:33:55 --> Model "Pedagang_model" initialized
DEBUG - 2024-06-08 16:33:55 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:33:55 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:33:55 --> Pagination Class Initialized
INFO - 2024-06-08 16:33:55 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:33:55 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:33:55 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Undefined variable $kartu E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
ERROR - 2024-06-08 16:33:55 --> Severity: Warning --> Attempt to read property "id" on null E:\xampp\htdocs\ppdal\application\views\pedagang\pedagang_list.php 80
INFO - 2024-06-08 16:33:55 --> File loaded: E:\xampp\htdocs\ppdal\application\views\pedagang/pedagang_list.php
INFO - 2024-06-08 16:33:55 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:33:55 --> Final output sent to browser
DEBUG - 2024-06-08 16:33:55 --> Total execution time: 0.0324
INFO - 2024-06-08 16:34:00 --> Config Class Initialized
INFO - 2024-06-08 16:34:00 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:34:00 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:34:00 --> Utf8 Class Initialized
INFO - 2024-06-08 16:34:00 --> URI Class Initialized
INFO - 2024-06-08 16:34:00 --> Router Class Initialized
INFO - 2024-06-08 16:34:00 --> Output Class Initialized
INFO - 2024-06-08 16:34:00 --> Security Class Initialized
DEBUG - 2024-06-08 16:34:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:34:00 --> Input Class Initialized
INFO - 2024-06-08 16:34:00 --> Language Class Initialized
INFO - 2024-06-08 16:34:00 --> Loader Class Initialized
INFO - 2024-06-08 16:34:00 --> Helper loaded: form_helper
INFO - 2024-06-08 16:34:00 --> Helper loaded: url_helper
INFO - 2024-06-08 16:34:00 --> Database Driver Class Initialized
INFO - 2024-06-08 16:34:00 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:34:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:34:00 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:34:00 --> Controller Class Initialized
INFO - 2024-06-08 16:34:00 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:34:00 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:34:00 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:34:00 --> Pagination Class Initialized
INFO - 2024-06-08 16:34:00 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:34:00 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:34:00 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:34:00 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 16:34:00 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:34:00 --> Final output sent to browser
DEBUG - 2024-06-08 16:34:00 --> Total execution time: 0.0188
INFO - 2024-06-08 16:34:02 --> Config Class Initialized
INFO - 2024-06-08 16:34:02 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:34:02 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:34:02 --> Utf8 Class Initialized
INFO - 2024-06-08 16:34:02 --> URI Class Initialized
INFO - 2024-06-08 16:34:02 --> Router Class Initialized
INFO - 2024-06-08 16:34:02 --> Output Class Initialized
INFO - 2024-06-08 16:34:02 --> Security Class Initialized
DEBUG - 2024-06-08 16:34:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:34:02 --> Input Class Initialized
INFO - 2024-06-08 16:34:02 --> Language Class Initialized
INFO - 2024-06-08 16:34:02 --> Loader Class Initialized
INFO - 2024-06-08 16:34:02 --> Helper loaded: form_helper
INFO - 2024-06-08 16:34:02 --> Helper loaded: url_helper
INFO - 2024-06-08 16:34:02 --> Database Driver Class Initialized
INFO - 2024-06-08 16:34:02 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:34:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:34:02 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:34:02 --> Controller Class Initialized
INFO - 2024-06-08 16:34:02 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:34:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:34:02 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:34:02 --> Model "Users_model" initialized
INFO - 2024-06-08 16:34:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:34:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:34:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:34:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:34:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:34:02 --> Final output sent to browser
DEBUG - 2024-06-08 16:34:02 --> Total execution time: 0.0182
INFO - 2024-06-08 16:34:05 --> Config Class Initialized
INFO - 2024-06-08 16:34:05 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:34:05 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:34:05 --> Utf8 Class Initialized
INFO - 2024-06-08 16:34:05 --> URI Class Initialized
INFO - 2024-06-08 16:34:05 --> Router Class Initialized
INFO - 2024-06-08 16:34:05 --> Output Class Initialized
INFO - 2024-06-08 16:34:05 --> Security Class Initialized
DEBUG - 2024-06-08 16:34:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:34:05 --> Input Class Initialized
INFO - 2024-06-08 16:34:05 --> Language Class Initialized
INFO - 2024-06-08 16:34:05 --> Loader Class Initialized
INFO - 2024-06-08 16:34:05 --> Helper loaded: form_helper
INFO - 2024-06-08 16:34:05 --> Helper loaded: url_helper
INFO - 2024-06-08 16:34:05 --> Database Driver Class Initialized
INFO - 2024-06-08 16:34:05 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:34:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:34:05 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:34:05 --> Controller Class Initialized
INFO - 2024-06-08 16:34:05 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:34:05 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:34:05 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:34:05 --> Model "Users_model" initialized
INFO - 2024-06-08 16:34:05 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:34:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:34:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:34:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:34:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_form.php
INFO - 2024-06-08 16:34:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:34:05 --> Final output sent to browser
DEBUG - 2024-06-08 16:34:05 --> Total execution time: 0.0343
INFO - 2024-06-08 16:34:08 --> Config Class Initialized
INFO - 2024-06-08 16:34:08 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:34:08 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:34:08 --> Utf8 Class Initialized
INFO - 2024-06-08 16:34:08 --> URI Class Initialized
INFO - 2024-06-08 16:34:08 --> Router Class Initialized
INFO - 2024-06-08 16:34:08 --> Output Class Initialized
INFO - 2024-06-08 16:34:08 --> Security Class Initialized
DEBUG - 2024-06-08 16:34:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:34:08 --> Input Class Initialized
INFO - 2024-06-08 16:34:08 --> Language Class Initialized
INFO - 2024-06-08 16:34:08 --> Loader Class Initialized
INFO - 2024-06-08 16:34:08 --> Helper loaded: form_helper
INFO - 2024-06-08 16:34:08 --> Helper loaded: url_helper
INFO - 2024-06-08 16:34:08 --> Database Driver Class Initialized
INFO - 2024-06-08 16:34:08 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:34:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:34:08 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:34:08 --> Controller Class Initialized
INFO - 2024-06-08 16:34:08 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:34:08 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:34:08 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:34:08 --> Model "Jurnal_model" initialized
ERROR - 2024-06-08 16:34:08 --> Severity: Warning --> Array to string conversion E:\xampp\htdocs\ppdal\system\database\DB_query_builder.php 1543
ERROR - 2024-06-08 16:34:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Array' at line 1 - Invalid query: INSERT INTO `jurnal` () VALUES ('600000','3',579,'1','Iuran Periode Apr, 2024 - May, 2024 I Wayan Sudiarjaya - 001/I/MK/2024','2024-06-08 04:34:08 PM'), Array
DEBUG - 2024-06-08 16:34:08 --> DB Transaction Failure
INFO - 2024-06-08 16:34:08 --> Language file loaded: language/english/db_lang.php
INFO - 2024-06-08 16:42:38 --> Config Class Initialized
INFO - 2024-06-08 16:42:38 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:42:38 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:42:38 --> Utf8 Class Initialized
INFO - 2024-06-08 16:42:38 --> URI Class Initialized
INFO - 2024-06-08 16:42:38 --> Router Class Initialized
INFO - 2024-06-08 16:42:38 --> Output Class Initialized
INFO - 2024-06-08 16:42:38 --> Security Class Initialized
DEBUG - 2024-06-08 16:42:38 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:42:38 --> Input Class Initialized
INFO - 2024-06-08 16:42:38 --> Language Class Initialized
INFO - 2024-06-08 16:42:38 --> Loader Class Initialized
INFO - 2024-06-08 16:42:38 --> Helper loaded: form_helper
INFO - 2024-06-08 16:42:38 --> Helper loaded: url_helper
INFO - 2024-06-08 16:42:38 --> Database Driver Class Initialized
INFO - 2024-06-08 16:42:38 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:42:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:42:38 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:42:38 --> Controller Class Initialized
INFO - 2024-06-08 16:42:38 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:42:38 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:42:38 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:42:38 --> Model "Users_model" initialized
INFO - 2024-06-08 16:42:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:42:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:42:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:42:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:42:38 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:42:38 --> Final output sent to browser
DEBUG - 2024-06-08 16:42:38 --> Total execution time: 0.1526
INFO - 2024-06-08 16:42:42 --> Config Class Initialized
INFO - 2024-06-08 16:42:42 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:42:42 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:42:42 --> Utf8 Class Initialized
INFO - 2024-06-08 16:42:42 --> URI Class Initialized
INFO - 2024-06-08 16:42:42 --> Router Class Initialized
INFO - 2024-06-08 16:42:42 --> Output Class Initialized
INFO - 2024-06-08 16:42:42 --> Security Class Initialized
DEBUG - 2024-06-08 16:42:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:42:42 --> Input Class Initialized
INFO - 2024-06-08 16:42:42 --> Language Class Initialized
INFO - 2024-06-08 16:42:42 --> Loader Class Initialized
INFO - 2024-06-08 16:42:42 --> Helper loaded: form_helper
INFO - 2024-06-08 16:42:42 --> Helper loaded: url_helper
INFO - 2024-06-08 16:42:42 --> Database Driver Class Initialized
INFO - 2024-06-08 16:42:42 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:42:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:42:42 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:42:42 --> Controller Class Initialized
INFO - 2024-06-08 16:42:42 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:42:42 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:42:42 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:42:42 --> Model "Users_model" initialized
INFO - 2024-06-08 16:42:42 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:42:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:42:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:42:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:42:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_form.php
INFO - 2024-06-08 16:42:42 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:42:42 --> Final output sent to browser
DEBUG - 2024-06-08 16:42:42 --> Total execution time: 0.0332
INFO - 2024-06-08 16:42:44 --> Config Class Initialized
INFO - 2024-06-08 16:42:44 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:42:44 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:42:44 --> Utf8 Class Initialized
INFO - 2024-06-08 16:42:44 --> URI Class Initialized
INFO - 2024-06-08 16:42:44 --> Router Class Initialized
INFO - 2024-06-08 16:42:44 --> Output Class Initialized
INFO - 2024-06-08 16:42:44 --> Security Class Initialized
DEBUG - 2024-06-08 16:42:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:42:44 --> Input Class Initialized
INFO - 2024-06-08 16:42:44 --> Language Class Initialized
INFO - 2024-06-08 16:42:44 --> Loader Class Initialized
INFO - 2024-06-08 16:42:44 --> Helper loaded: form_helper
INFO - 2024-06-08 16:42:44 --> Helper loaded: url_helper
INFO - 2024-06-08 16:42:44 --> Database Driver Class Initialized
INFO - 2024-06-08 16:42:44 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:42:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:42:44 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:42:44 --> Controller Class Initialized
INFO - 2024-06-08 16:42:44 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:42:44 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:42:44 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:42:44 --> Model "Jurnal_model" initialized
INFO - 2024-06-08 16:44:51 --> Config Class Initialized
INFO - 2024-06-08 16:44:51 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:44:51 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:44:51 --> Utf8 Class Initialized
INFO - 2024-06-08 16:44:51 --> URI Class Initialized
INFO - 2024-06-08 16:44:51 --> Router Class Initialized
INFO - 2024-06-08 16:44:51 --> Output Class Initialized
INFO - 2024-06-08 16:44:51 --> Security Class Initialized
DEBUG - 2024-06-08 16:44:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:44:51 --> Input Class Initialized
INFO - 2024-06-08 16:44:51 --> Language Class Initialized
INFO - 2024-06-08 16:44:51 --> Loader Class Initialized
INFO - 2024-06-08 16:44:51 --> Helper loaded: form_helper
INFO - 2024-06-08 16:44:51 --> Helper loaded: url_helper
INFO - 2024-06-08 16:44:51 --> Database Driver Class Initialized
INFO - 2024-06-08 16:44:51 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:44:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:44:51 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:44:51 --> Controller Class Initialized
INFO - 2024-06-08 16:44:51 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:44:51 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:44:51 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:44:51 --> Pagination Class Initialized
INFO - 2024-06-08 16:44:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:44:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:44:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:44:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 16:44:51 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:44:51 --> Final output sent to browser
DEBUG - 2024-06-08 16:44:51 --> Total execution time: 0.0577
INFO - 2024-06-08 16:44:53 --> Config Class Initialized
INFO - 2024-06-08 16:44:53 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:44:53 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:44:53 --> Utf8 Class Initialized
INFO - 2024-06-08 16:44:53 --> URI Class Initialized
INFO - 2024-06-08 16:44:53 --> Router Class Initialized
INFO - 2024-06-08 16:44:53 --> Output Class Initialized
INFO - 2024-06-08 16:44:53 --> Security Class Initialized
DEBUG - 2024-06-08 16:44:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:44:53 --> Input Class Initialized
INFO - 2024-06-08 16:44:53 --> Language Class Initialized
INFO - 2024-06-08 16:44:53 --> Loader Class Initialized
INFO - 2024-06-08 16:44:53 --> Helper loaded: form_helper
INFO - 2024-06-08 16:44:53 --> Helper loaded: url_helper
INFO - 2024-06-08 16:44:53 --> Database Driver Class Initialized
INFO - 2024-06-08 16:44:53 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:44:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:44:53 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:44:53 --> Controller Class Initialized
INFO - 2024-06-08 16:44:53 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:44:53 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:44:53 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:44:53 --> Model "Users_model" initialized
INFO - 2024-06-08 16:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:44:53 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:44:53 --> Final output sent to browser
DEBUG - 2024-06-08 16:44:53 --> Total execution time: 0.0192
INFO - 2024-06-08 16:44:56 --> Config Class Initialized
INFO - 2024-06-08 16:44:56 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:44:56 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:44:56 --> Utf8 Class Initialized
INFO - 2024-06-08 16:44:56 --> URI Class Initialized
INFO - 2024-06-08 16:44:56 --> Router Class Initialized
INFO - 2024-06-08 16:44:56 --> Output Class Initialized
INFO - 2024-06-08 16:44:56 --> Security Class Initialized
DEBUG - 2024-06-08 16:44:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:44:56 --> Input Class Initialized
INFO - 2024-06-08 16:44:56 --> Language Class Initialized
INFO - 2024-06-08 16:44:56 --> Loader Class Initialized
INFO - 2024-06-08 16:44:56 --> Helper loaded: form_helper
INFO - 2024-06-08 16:44:56 --> Helper loaded: url_helper
INFO - 2024-06-08 16:44:56 --> Database Driver Class Initialized
INFO - 2024-06-08 16:44:56 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:44:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:44:56 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:44:56 --> Controller Class Initialized
INFO - 2024-06-08 16:44:56 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:44:56 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:44:56 --> Language file loaded: language/english/form_validation_lang.php
INFO - 2024-06-08 16:44:56 --> Model "Users_model" initialized
INFO - 2024-06-08 16:44:56 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:44:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:44:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:44:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:44:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_form.php
INFO - 2024-06-08 16:44:56 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:44:56 --> Final output sent to browser
DEBUG - 2024-06-08 16:44:56 --> Total execution time: 0.0336
INFO - 2024-06-08 16:44:58 --> Config Class Initialized
INFO - 2024-06-08 16:44:58 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:44:58 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:44:58 --> Utf8 Class Initialized
INFO - 2024-06-08 16:44:58 --> URI Class Initialized
INFO - 2024-06-08 16:44:58 --> Router Class Initialized
INFO - 2024-06-08 16:44:58 --> Output Class Initialized
INFO - 2024-06-08 16:44:58 --> Security Class Initialized
DEBUG - 2024-06-08 16:44:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:44:58 --> Input Class Initialized
INFO - 2024-06-08 16:44:58 --> Language Class Initialized
INFO - 2024-06-08 16:44:58 --> Loader Class Initialized
INFO - 2024-06-08 16:44:58 --> Helper loaded: form_helper
INFO - 2024-06-08 16:44:58 --> Helper loaded: url_helper
INFO - 2024-06-08 16:44:58 --> Database Driver Class Initialized
INFO - 2024-06-08 16:44:58 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:44:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:44:58 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:44:58 --> Controller Class Initialized
INFO - 2024-06-08 16:44:58 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:44:58 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:44:58 --> Model "Akun_model" initialized
INFO - 2024-06-08 16:44:58 --> Model "Jurnal_model" initialized
INFO - 2024-06-08 16:44:58 --> Config Class Initialized
INFO - 2024-06-08 16:44:58 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:44:58 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:44:58 --> Utf8 Class Initialized
INFO - 2024-06-08 16:44:58 --> URI Class Initialized
INFO - 2024-06-08 16:44:58 --> Router Class Initialized
INFO - 2024-06-08 16:44:58 --> Output Class Initialized
INFO - 2024-06-08 16:44:58 --> Security Class Initialized
DEBUG - 2024-06-08 16:44:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:44:58 --> Input Class Initialized
INFO - 2024-06-08 16:44:58 --> Language Class Initialized
INFO - 2024-06-08 16:44:58 --> Loader Class Initialized
INFO - 2024-06-08 16:44:58 --> Helper loaded: form_helper
INFO - 2024-06-08 16:44:58 --> Helper loaded: url_helper
INFO - 2024-06-08 16:44:58 --> Database Driver Class Initialized
INFO - 2024-06-08 16:44:58 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:44:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:44:58 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:44:58 --> Controller Class Initialized
INFO - 2024-06-08 16:44:58 --> Model "Transaksi_iuran_model" initialized
DEBUG - 2024-06-08 16:44:58 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:44:58 --> Model "Kartu_model" initialized
INFO - 2024-06-08 16:44:58 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_download.php
INFO - 2024-06-08 16:44:58 --> File loaded: E:\xampp\htdocs\ppdal\application\views\transaksi_iuran/transaksi_iuran_print_bar.php
INFO - 2024-06-08 16:44:58 --> Final output sent to browser
DEBUG - 2024-06-08 16:44:58 --> Total execution time: 0.0796
INFO - 2024-06-08 16:45:02 --> Config Class Initialized
INFO - 2024-06-08 16:45:02 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:45:02 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:45:02 --> Utf8 Class Initialized
INFO - 2024-06-08 16:45:02 --> URI Class Initialized
INFO - 2024-06-08 16:45:02 --> Router Class Initialized
INFO - 2024-06-08 16:45:02 --> Output Class Initialized
INFO - 2024-06-08 16:45:02 --> Security Class Initialized
DEBUG - 2024-06-08 16:45:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:45:02 --> Input Class Initialized
INFO - 2024-06-08 16:45:02 --> Language Class Initialized
INFO - 2024-06-08 16:45:02 --> Loader Class Initialized
INFO - 2024-06-08 16:45:02 --> Helper loaded: form_helper
INFO - 2024-06-08 16:45:02 --> Helper loaded: url_helper
INFO - 2024-06-08 16:45:02 --> Database Driver Class Initialized
INFO - 2024-06-08 16:45:02 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:45:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:45:02 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:45:02 --> Controller Class Initialized
INFO - 2024-06-08 16:45:02 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:45:02 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:45:02 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-06-08 16:45:02 --> Pagination Class Initialized
INFO - 2024-06-08 16:45:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:45:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:45:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:45:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_list.php
INFO - 2024-06-08 16:45:02 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:45:02 --> Final output sent to browser
DEBUG - 2024-06-08 16:45:02 --> Total execution time: 0.0177
INFO - 2024-06-08 16:45:05 --> Config Class Initialized
INFO - 2024-06-08 16:45:05 --> Hooks Class Initialized
DEBUG - 2024-06-08 16:45:05 --> UTF-8 Support Enabled
INFO - 2024-06-08 16:45:05 --> Utf8 Class Initialized
INFO - 2024-06-08 16:45:05 --> URI Class Initialized
INFO - 2024-06-08 16:45:05 --> Router Class Initialized
INFO - 2024-06-08 16:45:05 --> Output Class Initialized
INFO - 2024-06-08 16:45:05 --> Security Class Initialized
DEBUG - 2024-06-08 16:45:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-06-08 16:45:05 --> Input Class Initialized
INFO - 2024-06-08 16:45:05 --> Language Class Initialized
INFO - 2024-06-08 16:45:05 --> Loader Class Initialized
INFO - 2024-06-08 16:45:05 --> Helper loaded: form_helper
INFO - 2024-06-08 16:45:05 --> Helper loaded: url_helper
INFO - 2024-06-08 16:45:05 --> Database Driver Class Initialized
INFO - 2024-06-08 16:45:05 --> Form Validation Class Initialized
DEBUG - 2024-06-08 16:45:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2024-06-08 16:45:05 --> Session: Class initialized using 'files' driver.
INFO - 2024-06-08 16:45:05 --> Controller Class Initialized
INFO - 2024-06-08 16:45:05 --> Model "Kartu_model" initialized
DEBUG - 2024-06-08 16:45:05 --> Form_validation class already loaded. Second attempt ignored.
INFO - 2024-06-08 16:45:05 --> Model "Transaksi_iuran_model" initialized
INFO - 2024-06-08 16:45:05 --> Model "Users_model" initialized
INFO - 2024-06-08 16:45:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/header.php
INFO - 2024-06-08 16:45:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/side_bar.php
INFO - 2024-06-08 16:45:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/top_bar.php
INFO - 2024-06-08 16:45:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\kartu/t_kartu_read.php
INFO - 2024-06-08 16:45:05 --> File loaded: E:\xampp\htdocs\ppdal\application\views\page_template/footer.php
INFO - 2024-06-08 16:45:05 --> Final output sent to browser
DEBUG - 2024-06-08 16:45:05 --> Total execution time: 0.0178
