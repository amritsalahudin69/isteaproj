<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Tambah Data Detail</h1>
            <span>(2 dari 2 page)</span>
            <?php
            $inktp = array(
                'name' => 'nktp',
                'id' => 'nktp',
                'class' => 'form-control',
                'value' => set_value('nktp')
            );
            $intlfn = array(
                'name' => 'ntlfn',
                'id' => 'ntlfn',
                'class' => 'form-control',
                'value' => set_value('ntlfn')
            );
            $isurel = array(
                'name' => 'surel',
                'id' => 'surel',
                'class' => 'form-control',
                'value' => set_value('surel')
            );
            $inosim = array(
                'name' => 'nosim',
                'id' => 'nosim',
                'class' => 'form-control',
                'value' => set_value('nosim')
            );
            $ialamat = array(
                'name' => 'alamat',
                'id' => 'alamat',
                'class' => 'form-control',
                'value' => set_value('alamat')
            );

            echo form_open('', array('role' => 'form', 'class' => 'form-horizontal'));
            ?>

            <div class="form-group">
                <?php echo form_label('Nomor Induk Penduduk', 'nktp', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($inktp) . form_error('nktp'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Nomor Telfon Aktif', 'ntlfn', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($intlfn) . form_error('ntlfn'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Surat Elektronik yang Aktif', 'surel', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($isurel) . form_error('surel'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Nomor SIM yang Berlaku', 'nosim', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($inosim) . form_error('nosim'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Alamat Lengkap', 'alamat', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_textarea($ialamat) . form_error('alamat'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <?php echo form_submit('ok', 'Simpan', 'class="btn btn-success"'); ?>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>