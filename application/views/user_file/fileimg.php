<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Scanner, Gambar dan Foto</h1>
        </div>
    </div>
    <div class="row">
        <!-- startloop -->
        <?php foreach ($files as $file) : ?>
            <div class="col-md-2">
                <div class="card mb-4">
                <img src="<?php echo $_dircab . $file->gen_fname; ?>" width="200" height="300" class="card-img-top">
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

        <!-- endloop -->
    </div>

</div>