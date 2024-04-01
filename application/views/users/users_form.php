<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            <?= validation_errors() ?>
        </div>
        <div class="card-body">
            <?php echo form_open($action) ?>
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" oninput="validatePassword()" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                <span id="error" class="p-sm text-danger"></span>
                <input type="password" class="form-control" oninput="validatePassword()" id="password2" placeholder="Confirm Password" value="<?php echo $password; ?>" />
            </div>

            <div class="form-group">
                <label for="varchar">Nama Lengkap <?php echo form_error('full_name') ?></label>
                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Nama Lengkap" value="<?php echo $full_name; ?>" />
            </div>
            <div class="form-group">
                <label for="role">Tipe Akun </label>
                <select name="role" id="role" class="form-control">
                    <option value="0" <?= $role == 0 ? 'selected' : '' ?>>Super Admin</option>
                    <option value="1" <?= $role == 1 ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?= $role == 2 ? 'selected' : '' ?>>Pengawas</option>
                </select>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <button type="submit" id="submitButton" class="btn btn-primary" disabled><?php echo $button ?></button>
            <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
            <?php echo form_close() ?>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password2").value;
        var errorSpan = document.getElementById("error");
        var submitButton = document.getElementById("submitButton");


        if (password === confirmPassword) {
            errorSpan.textContent = ""; // Clear any previous error message
            submitButton.removeAttribute("disabled");
        } else {
            errorSpan.textContent = "Password harus sama";
            submitButton.setAttribute("disabled", "true");
        }

    }
</script>