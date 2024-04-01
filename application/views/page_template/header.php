<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPPDAL</title>

    <!-- Custom fonts for this template-->
    <link href=<?= base_url("assets/vendor/fontawesome-free/css/all.min.css") ?> rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href=<?= base_url("assets/css/sb-admin-2.min.css") ?> rel="stylesheet">
    <?php if (isset($external_css)) : ?>
        <?php foreach ($external_css as $extra) : ?>
            <link href="<?= base_url('assets/css/' . $extra) ?>" rel="stylesheet" type="text/css">
        <?php endforeach; ?>
    <?php endif; ?>
</head>