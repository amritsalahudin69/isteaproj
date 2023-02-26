<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Summary Data</h1>
            <?php echo get_message('msg'); ?>
            <!-- <div class="row">
                <div class="col-sm-4">
                    <p><a href="<?php echo site_url('2741edit/' . $byid->id) ?>" class="btn btn-success">Update Data</a></p>
                    <p><a href="<?php echo site_url('2741fp/' . $byid->id) ?>" class="btn btn-primary">Ganti Foto Profi</a></p>
                </div>
                <div class="col-sm-4">

                </div>
            </div> -->

            <br />
            <div class="card-body">
                <div class="table-responsive col-sm-12 text-left">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-6">
                                <img src="<?php echo $path .  $byid->file_fp; ?>" width="400" height="400" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $byid->nik; ?></h5>
                                    <p><a href="<?php echo site_url('2741fp/' . $byid->id) ?>" class="btn btn-primary">Ganti Foto Profi</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td class="text-right">NIP :</td>
                                        <td><?php echo $byid->nik; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Nama Lengkap :</td>
                                        <td><?php echo $byid->nama_krw; ?></td>
                                    </tr>
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
                            <div class="col-sm-4">
                                <p><a href="<?php echo site_url('2741edit/' . $byid->id) ?>" class="btn btn-success">Update Data</a></p>
                                <!-- <p><a href="<?php echo site_url('2741fp/' . $byid->id) ?>" class="btn btn-primary">Ganti Foto Profi</a></p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.hapus').click(function() {
            return confirm("Apakah Anda yakin ingin menghapus data tersebut?");
        });
    });
</script>