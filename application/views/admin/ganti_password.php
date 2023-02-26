<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Ganti password</h1>
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
            echo form_open('', array('role' => 'form', 'class' => 'form-horizontal'));
            ?>
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
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <?php echo form_submit('ok', 'Ganti password', 'class="btn btn-danger"'); ?>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>