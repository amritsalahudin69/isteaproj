                 <!-- Begin Page Content -->
                 <div class="container-fluid">
                     <?php echo get_message('msg'); ?>

                     <div class="card shadow mb-4">
                         <div class="card-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">Data Staff</h6>
                         </div>
                         <!-- ----------------------search------------------------------------------- -->
                         <div class="card-body">
                             <div class="table-responsive col-sm-12 text-left">
                                 <!-- ----------------------------------- -->
                                 <div class="row">
                                     <div class="col-md-2">
                                         <div class="card mb-4">
                                             <img src="<?php echo $path .  $byid->file_fp; ?>" width="200" height="300" class="card-img-top">
                                             <div class="card-body">
                                                 <h5 class="card-title"><?php echo $byid->nik; ?></h5>
                                                 <span><?php echo $byid->nama_krw; ?></span>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-4">
                                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                             <tbody>
                                                 <tr>
                                                     <td class="text-right">Status :</td>
                                                     <td><?php echo status($byid->status); ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-right">Cabang :</td>
                                                     <td><?php echo $byid->cabang; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-right">No. Identitas KTP :</td>
                                                     <td><?php echo $byid->ktp; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-right">No. Identitas SIM :</td>
                                                     <td><?php echo $byid->sim; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-right">Alamat Surat Elektronik :</td>
                                                     <td><?php echo $byid->surel; ?></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="text-right">Alamat Lengkap :</td>
                                                     <td><?php echo $byid->alamat; ?></td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>

                                 </div>
                             </div>
                         </div>



                         <!--  -->
                     </div>

                 </div>
                 <!-- /.container-fluid -->