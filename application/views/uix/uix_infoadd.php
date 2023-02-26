<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Info</h6>
        </a>
        <!-- Card Content - Collapse -->
        <!-- <form class="add" method="POST"> -->
        <?php
        $ijudul = array(
            'name' => 'judul',
            'id' => 'judul',
            'class' => 'form-control',
            'value' => set_value('judul')
        );

        $ikonten = array(
            'name' => 'konten',
            'id' => 'konten',
            'type' => 'password',
            'class' => 'form-control form-control-user',
            'value' => set_value('konten')
        );
        $ifile = array(
            'name' => 'file',
            'id'    => 'file',
            'type'  => 'file'
        );
        echo form_open_multipart('', array('role' => 'form', 'class' => 'form-horizontal'));
        ?>
            <div class="card-body">

                <div class="form-group">
                    <?php echo form_label('Judul', 'judul', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($ijudul) . form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Isi Info', 'konten', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_textarea($ikonten) . form_error('konten'),'<small class="text-danger pl-3">', '</small>'; ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Pilih File', 'file', array('class' => 'control-label col-sm-3')); ?>
                    <div class="col-sm-4"><?php echo form_upload($ifile) . form_error('file'); ?></div>
                </div>

                <div name="masuk" id="masuk" class="form-group">
                    <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Tambah', 'class="btn btn-primary"'); ?></div>
                </div>

                <?php
                echo form_close();
                ?>

                <!-- </form> -->

            </div>


    </div>
</div>