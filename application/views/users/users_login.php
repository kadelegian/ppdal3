<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">


                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row px-3 py-3">
                        <div class="col-lg-6 d-none d-lg-block" style="background:url(<?= base_url('assets/img/logo.jpg') ?>);background-position:center;background-size:contain;background-repeat:no-repeat;">

                        </div>
                        <div class="col-lg-6">

                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                                </div>
                                <?php echo form_open('auth/login_action'); ?>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <input type="submit" class="btn btn-primary btn-block" value="Login">
                                <hr>

                                <?php echo form_close(); ?>

                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger text-center" role="alert" id="message">
                            <?= $_SESSION['error'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>

</div>