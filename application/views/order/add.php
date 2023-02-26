<div class="container-fluid">
    <div class="card shadow mb-2">
        <!-- Card Header - Accordion -->
        <a class="d-block card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Permohonan Order</h6>
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

            $iindesc = array(
                'name' => 'indesc',
                'id' => 'indesc',
                'class' => 'form-control',
                'value' => set_value('indesc')
            );

            $idata_order = array(
                'name' => 'data_order',
                'id' => 'data_order',
                'class' => 'form-control form-control-user',
                'value' => set_value('data_order')
            );

            echo form_open('', array('role' => 'form'));
            ?>
            <div class="card-body">

                <div class="form-group">
                    <?php echo form_label('No. Rekening', 'norek', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($inorek) . form_error('norek', '<small class="text-danger pl-3">', '</small>'); 
                            if($xrt == 0){
                               echo '<small class="text-danger pl-3"><a>No. Rekening tidak Ditemukan!</a></small>';
                            }
                        ?>

                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Id. File (Id Jenis data yang akan Diubah)', 'indesc', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_input($iindesc) . form_error('indesc', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php echo form_label('Keterangan', 'data_order', array('class' => 'control-label col-sm-6')); ?>
                    <div class="col-sm-8">
                        <?php echo form_textarea($idata_order) . form_error('data_order'), '<small class="text-danger pl-3">', '</small>'; ?>
                    </div>
                </div>

                <div name="masuk" id="masuk" class="form-group">
                    <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Ajukan Perubahan', 'class="btn btn-primary"'); ?></div>
                </div>

                <?php
                echo form_close();
                ?>

        </form>

    </div>


</div>
</div>