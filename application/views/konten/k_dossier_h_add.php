<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Anggota</h6>
        </a>
        <!-- Card Content - Collapse -->
        <form class="add" method="POST">
        <?php
        $inorek = array(
            'name' => 'norek',
            'id' => 'norek',
            'class' => 'form-control',
            'value' => set_value('norek')
        );

        $inama = array(
            'name' => 'nama',
            'id' => 'nama',
            'class' => 'form-control',
            'value' => set_value('nama')
        );

        $iktp = array(
            'name' => 'ktp',
            'id' => 'ktp',
            'class' => 'form-control',
            'value' => set_value('ktp')
        );

        $inamasc = array(
            'name' => 'namasc',
            'id' => 'namasc',
            'class' => 'form-control',
            'value' => set_value('namasc')
        );

        $iktpsc = array(
            'name' => 'ktpsc',
            'id' => 'ktpsc',
            'class' => 'form-control',
            'value' => set_value('ktpsc')
        );
        echo form_open('', array('role' => 'form'));
        ?>
            <div class="card-body">

                <div class="form-group">
                    <?php echo form_label('No. Rekening', 'norek', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($inorek) . form_error('norek', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Nama Anggota', 'nama', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($inama) . form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <?php echo form_label('No. KTP', 'ktp', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($iktp) . form_error('ktp'),'<small class="text-danger pl-3">', '</small>'; ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Nama Pasangan', 'namasc', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($inamasc) . form_error('namasc', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('No. KTP', 'ktpsc', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($iktpsc) . form_error('ktpsc'); ?>
                    </div>
                </div>

                <div name="masuk" id="masuk" class="form-group">
                    <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Tambah', 'class="btn btn-primary"'); ?></div>
                </div>

                <?php
                echo form_close();
                ?>

                </form>

            </div>


    </div>
</div>