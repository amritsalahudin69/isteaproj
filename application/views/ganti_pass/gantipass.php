<div class="container-fluid">
    <!-- <div class="card shadow mb-2"> -->
    <!-- Card Header - Accordion -->
    <a class="d-block card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
    </a>
    <?php echo get_message('msg'); ?>
    <!-- Card Content - Collapse -->
    <form class="add" method="POST">
        <?php
        $ipassword = array(
            'name' => 'password',
            'id' => 'password',
            'class' => 'form-control'
        );
        $inewpass = array(
            'name' => 'newpass',
            'id' => 'newpass',
            'class' => 'form-control'
        );
        $iconfirm = array(
            'name' => 'confirm',
            'id' => 'confirm',
            'class' => 'form-control'
        );

        echo form_open('', array('role' => 'form'));
        ?>
        <div class="card-body">

            <div class="form-group">
                <?php echo form_label('Password', 'password', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_password($ipassword) . form_error('password'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo form_label('Password baru', 'newpass', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_password($inewpass) . form_error('newpass'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Konfirmasi password baru', 'confirm', array('class' => 'control-label col-sm-3')); ?>
                <div class="col-sm-4">
                    <?php echo form_password($iconfirm) . form_error('confirm'); ?>
                </div>

                <div class="dropdown-divider"></div>

                <div name="masuk" id="masuk" class="form-group">
                    <div class="col-sm-offset-3 col-sm-9"><?php echo form_submit('ok', 'Ubah', 'class="btn btn-primary"'); ?></div>
                </div>

                <?php
                echo form_close();
                ?>
        </div>
    </form>

    <!-- </div> -->


</div>
</div>