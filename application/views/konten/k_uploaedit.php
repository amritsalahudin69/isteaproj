<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Unggah File Kredit Anggota</h6>
        </a>
        <!-- Card Content - Collapse -->
        <!-- <form class="add" method="POST" enctype="multipart/form-data"> -->
        <!-- <form class="add" method="POST"> -->
        <?php
        $ifilename = array(
            'name' => 'filename',
            'id' => 'filename',
            'class' => 'form-control',
            'value' => set_value('filename', $byid->file_name)
        );
        $ino_surat = array(
            'name' => 'no_surat',
            'id' => 'no_surat',
            'class' => 'form-control',
            'value' => set_value('no_surat', $byid->no_surat)
        );
        $iindesc = array(
            'name' => 'indesc',
            'id' => 'indesc',
            'class' => 'form-control',
            'value' => set_value('indesc')
        );
        // $ifile = array(
        //     'name' => 'file',
        //     'id'    => 'file',
        //     'type'  => 'file'
        // );


        echo form_open_multipart('', array('role' => 'form', 'class' => 'form-horizontal'));
        ?>
        <div class="card-body">

            <div class="form-group">
                <?php echo form_label('Jenis File Surat', 'idsck', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-5">
                    <?php foreach ($dropdown1 as $dropdown) : ?>
                        <label class="radio-inline"><?php echo form_radio('idsck', $dropdown->id_sys_ref_dokument, set_radio('idsck', set_value('idsck', $byid->id_sys_ref_dokument, true))); ?> <?php echo $dropdown->keterangan; ?></label>
                        <br />
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Nama File', 'filename', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-sm-3"><?php echo form_input($ifilename) . form_error('filename'); ?></div>
            </div>

            <div class="form-group">
                <?php echo form_label('No. Surat', 'no_surat', array('class' => 'control-label col-sm-6')); ?>
                <div class="col-sm-6">
                    <?php echo form_input($ino_surat) . form_error('desc_loan'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Keterangan', 'indesc', array('class' => 'control-label col-sm-6')); ?>
                <div class="col-sm-6">
                    <?php echo form_textarea($iindesc) . form_error('indesc'); ?>
                </div>
            </div>

            <!-- <div class="form-group">
                    <?php echo form_label('Pilih File', 'file', array('class' => 'control-label col-sm-3')); ?>
                    <div class="col-sm-4"><?php echo form_upload($ifile) . form_error('file'); ?></div>
                </div> -->


            <div name="masuk" id="masuk" class="form-group">
                <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Ubah', 'class="btn btn-primary"'); ?></div>
            </div>

            <?php
            echo form_close();
            ?>

            </form>

        </div>


    </div>
</div>