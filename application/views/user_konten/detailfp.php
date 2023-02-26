<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Ubah Foto Profile</h1>
        </div>
        <?php
        $ifile = array(
            'name' => 'file',
            'id'    => 'file',
            'type'  => 'file'
        );
        echo form_open_multipart('', array('role' => 'form', 'class' => 'form-horizontal'));
        ?>

        <div class="col-md-3">
                <div class="card mb-4">
                    <img src="<?php echo $path .  $byid->file_fp; ?>" width="400" height="400" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">

                        <div class="form-group">
                            <?php echo form_label('Pilih File', 'file', array('class' => 'control-label col-sm-5')); ?>
                            <div class="col-sm-5"><?php echo form_upload($ifile) . form_error('file'); ?></div>
                        </div>

                        </p>

                        
                        <div name="upload" id="upload">
                        <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Unggah', 'class="btn btn-primary"'); ?></div>
                        </div>

                    </div>
                </div>
    </div>
</div>