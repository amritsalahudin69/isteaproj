<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Upload File</h1>
        </div>
        <?php
            $ifilename = array(
                'name' => 'filename',
                'id' => 'filename',
                'class' => 'form-control',
                'value' => set_value('filename')
            );

            $iindesc = array(
                'name' => 'indesc',
                'id' => 'indesc',
                'class' => 'form-control',
                'value' => set_value('indesc')
            );

            $ifile = array(
                'name' => 'file',
                'id'    => 'file',
                'type'  => 'file'
            );
            echo form_open_multipart('', array('role' => 'form', 'class' => 'form-horizontal'));
            ?>
            <div class="form-group">
                <?php echo form_label('Nama File', 'filename', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($ifilename) . form_error('filename'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Keterangan', 'indesc', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_textarea($iindesc) . form_error('indesc'); ?>
                </div>
            </div>

            <div class="form-group">
                    <?php echo form_label('', 'file', array('class' => 'control-label col-sm-3')); ?>
                    <div class="col-sm-6"><?php echo form_upload($ifile) . form_error('file'); ?></div>
            </div>

            <div name="masuk" id="masuk" class="form-group">
                    <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Unggah', 'class="btn btn-primary"'); ?></div>
            </div>


    </div>
</div>