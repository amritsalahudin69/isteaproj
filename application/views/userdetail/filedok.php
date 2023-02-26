<div class="container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                        <!-- startloop -->
                        <?php foreach ($files as $file) : ?>
                        <div class="col-md-2">
                            <div class="card mb-4">
                            <img src="<?= base_url('assets/media/internal/pdf.svg'); ?>" width="200" height="300" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $file->file_name; ?></h5>
                    <!-- <p class="card-text"></p> -->
                                    <a href="<?php echo $_dircab . $file->gen_fname; ?>" target="_blank" class="btn btn-primary">
                                            Unduh
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


<!-- ./assets/media/internal/pdf.svg -->