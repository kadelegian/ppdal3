 <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Content Row -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Pedagang</h6>
         </div>
         <div class="card-body">


             <div class="form-group">
                 <label for="nama_pedagang">Nama Pedagang <?php echo form_error('nama_pedagang') ?></label>
                 <input type="text" class="form-control" name="nama_pedagang" id="nama_pedagang" placeholder="Nama Pedagang" value="<?php echo $nama_pedagang; ?>" />
             </div>
             <div class="form-group">
                 <label for="alamat_pedagang">Alamat Pedagang <?php echo form_error('alamat_pedagang') ?></label>
                 <textarea class="form-control" rows="3" name="alamat_pedagang" id="alamat_pedagang" placeholder="Alamat Pedagang"><?php echo $alamat_pedagang; ?></textarea>
             </div>
             <div class="form-group">
                 <label for="no_hp">No Hp <?php echo form_error('no_hp') ?></label>
                 <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
             </div>
             <div class="form-group">
                 <label for="join_date">Join Date <?php echo form_error('join_date') ?></label>
                 <input type="text" name="join_date" class="datepicker form-control" id="join_date" value="<?php echo $join_date != null ? $join_date : '' ?>" />
             </div>
             <input type="hidden" name="id" value="<?php echo $id; ?>" />

             <a href="<?php echo site_url('pedagang') ?>" class="btn btn-success">Cancel</a>

         </div>
     </div>

     <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->