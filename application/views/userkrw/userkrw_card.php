<!-- -- -->
<div class="container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                        <!-- startloop -->
                        <?php foreach ($user as $usr) : ?>
                                <div class="col-md-3">
                                    <div class="card mb-4">
                                        <img src="<?php echo $path .  $usr->file_fp; ?>" width="50%" height="50%" class="card-img-top">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo $usr->nik .' || '  .status($usr->status); ?></h6>
                                            <p class="card-text"><?php echo $usr->nama_krw; ?></p>
                                            <p class="card-text"><?php echo $usr->cabang; ?></p>

                                            <a href="<?php echo site_url('9696iedit/'. $usr->id) ?>"  class="btn btn-primary">
                                                Ubah
                                            </a>

                                            <a class='ubah' href="<?php echo site_url('96961/'. $usr->id) ?>" >
                                            <i class="btn btn-success">
                                            aktif
                                            </i>
                                            </a>

                                            <a class='ubah' href="<?php echo site_url('96960/'. $usr->id) ?>">
                                            <i class="btn btn-danger">
                                            non-aktif
                                            </i>
                                            </a>

                                            <a href="<?php echo site_url('9696detail/'. $usr->id) ?>" target="_blank">
                                            <i class="btn btn-info">
                                            Detail
                                            </i>
                                            </a>

                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        <br />
                </div>
            </div>
        </div>
</div>
<!--  -->

<!-- /.container-fluid -->
<!-- End of Main Content -->

<!-- Footer -->
<script>
    $(document).ready(function() {
        $('.ubah').click(function() {
            return confirm("Apakah Anda yakin ingin mengubah status Staff?");
        });
    });
</script>
