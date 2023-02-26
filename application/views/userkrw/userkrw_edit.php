<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Karyawan</h6>
        </a>
        <!-- Card Content - Collapse -->
        <form class="add" method="POST">
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

            // $ipass = array(
            //     'name' => 'pass_krw',
            //     'id' => 'pass_krw',
            //     'type' => 'password',
            //     'class' => 'form-control form-control-user',
            //     'value' => set_value('pass_krw')
            // );

            $inama_krw = array(
                'name' => 'nama_krw',
                'id' => 'nama_krw',
                'class' => 'form-control',
                'value' => set_value('nama_krw', $byid->nama_krw)
            );

            echo form_open('', array('role' => 'form'));
            ?>
            <div class="card-body">

                <div class="col-sm-8">
                    <div class="form-group">
                        <?php echo form_label('Nama Cabang', 'cab') . form_dropdown('cab', $icab, set_value('cab', $byid->id_sys_cab), 'class="form-control"') . form_error('cab'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <?php echo form_label('NIK Karyawan', 'nik', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($inik) . form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <?php echo form_label('Password', 'pass_krw', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($ipass) . form_error('pass_krw'), '<small class="text-danger pl-3">', '</small>'; ?>
                    </div>
                </div> -->

                <div class="form-group">
                    <?php echo form_label('Nama Lengkap', 'nama_krw', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($inama_krw) . form_error('nama_krw', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


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