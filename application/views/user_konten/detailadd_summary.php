<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Tambah Data Detail</h1>
            <span>(1 dari 2 page)</span>
            <?php
            foreach ($cabs as $cab) {
                // $icab[0] = '-';
                $icab[$cab->id_sys_cab]  = "$cab->idwil - $cab->nama_cab";
            }
            $inik = array(
                'name' => 'nik',
                'id' => 'nik',
                'class' => 'form-control',
                'value' => set_value('nik', $byid->nik)
            );
            $inama_krw = array(
                'name' => 'nama_krw',
                'id' => 'nama_krw',
                'class' => 'form-control',
                'value' => set_value('nama_krw', $byid->nama_krw)
            );

            echo form_open('', array('role' => 'form', 'class' => 'form-horizontal'));
            ?>
            <div class="form-group">
                <?php echo form_label('Nama Cabang', 'cab', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_dropdown('cab', $icab, set_value('cab', $byid->id_sys_cab), "class='form-control'") ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Nomor Induk Pegawai', 'nik', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($inik) . form_error('nik'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Nama Lengkap', 'nama_krw', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_input($inama_krw) . form_error('nama_krw'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <?php echo form_submit('ok', 'Ubah', 'class="btn btn-success"'); ?>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>