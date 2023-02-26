<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Anggota</h6>
        </a>
        <!-- Card Content - Collapse -->
        <form class="add" method="POST">
            <?php
            $iname_resort = array(
                'name' => 'name_resort',
                'id' => 'name_resort',
                'class' => 'form-control',
                'value' => set_value('name_resort', $byid->resort_name)
            );

            $ipass = array(
                'name' => 'user_pass',
                'id' => 'user_pass',
                'type' => 'password',
                'class' => 'form-control form-control-user',
                'value' => set_value('user_pass')
            );

            $idres = array(
                'name' => 'idres',
                'id' => 'idres',
                'class' => 'form-control',
                'value' => set_value('idres', $byid->idres)
            );

            echo form_open('', array('role' => 'form'));
            ?>
            <div class="card-body">

                <div class="form-group">
                    <?php echo form_label('Nama Resort', 'name_resort', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($iname_resort) . form_error('name_resort', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Password', 'user_pass', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($ipass) . form_error('user_pass'), '<small class="text-danger pl-3">', '</small>'; ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Id. Resort', 'idres', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($idres) . form_error('idres', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <?php
                $idwil = $this->session->userdata('log_idwil');
                $idwil_ = $this->session->userdata('log_idwil_');
                $xr = $this->model_krwenduser->allbyidwil_row($idwil);
                if(isset($xr)){
                    foreach ($krws as $krw) {
                        $ikrw[0]         = "Pilih Petugas";
                        $ikrw[$krw->id]  = "{$krw->nik} - {$krw->nama_krw}";
                    }
                }
                else{
                    $ikrw[0] = "Belum ada Petugas Terdaftar Dicabang $idwil_";
                }
    
                ?>
                <div class="col-sm-8">
                    <div class="form-group">
                        <?php echo form_label('Nama Petugas', 'krw') . form_dropdown('krw', $ikrw, set_value('krw', $byid->nama_krw), 'class="form-control"') . form_error('krw'); ?>
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