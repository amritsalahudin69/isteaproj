<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Berkas Pinjaman</h6>
        </a>
        <!-- Card Content - Collapse -->
        <form class="add" method="POST">
            <?php
            // $s  = 'Pinjaman Ke- ';
            // for ($i = 1; $i <= 10; $i++) {
            //     $iopsi[$s . $i] = $s . $i;
            // }

            // $idesc_loan = array(
            //     'name' => 'desc_loan',
            //     'id' => 'desc_loan',
            //     'class' => 'form-control',
            //     'value' => set_value('desc_loan')
            // );
            $iyloan = array(
                'name' => 'yloan',
                'id' => 'yloan',
                'class' => 'form-control tanggal',
                'value' => set_value('yloan')
            );


            echo form_open('', array('role' => 'form'));
            ?>
            <div class="card-body">

                <!-- <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo form_label('Pinjaman Ke', 'num_loan') . form_dropdown('num_loan', $iopsi, set_value('num_loan'), 'class="form-control"') . form_error('num_loan'); ?>
                    </div>
                </div> -->

                <div class="form-group">
                    <?php echo form_label('Tanggal Pengajuan/Arsip Dokumen', 'yloan', array('class' => 'control-label col-sm-4')); ?>
                    <div class="col-sm-3"><?php echo form_input($iyloan) . form_error('yloan'); ?></div>
                </div>

                <!-- <div class="form-group">
                    <?php echo form_label('Keterangan', 'desc_loan', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-6">
                        <?php echo form_textarea($idesc_loan) . form_error('desc_loan'); ?>
                    </div>
                </div> -->


                <div name="masuk" id="masuk" class="form-group">
                    <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Masukan Data', 'class="btn btn-primary"'); ?></div>
                </div>

                <?php
                echo form_close();
                ?>

        </form>

    </div>


</div>
</div>