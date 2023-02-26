<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <?php
                $ifile = array(
                    'name' => 'file',
                    'id'    => 'file',
                    'type'  => 'file'
                );
                echo form_open_multipart('', array('role' => 'form', 'class' => 'form-horizontal'));
                ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <!-- <?php echo form_label('Pilih File', 'file', array('class' => 'control-label col-sm-5')); ?> -->
                        <div class="col-sm-5"><?php echo form_upload($ifile) . form_error('file'); ?></div>
                        <div name="upload" id="upload class=" col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Unggah', 'class="btn btn-primary"'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>