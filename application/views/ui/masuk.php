<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <?php
                    echo get_message('msg');
                    $iusername = array(
                        'name' => 'username',
                        'id' => 'username',
                        'class' => 'form-control'
                    );
                    $ipassword = array(
                        'name' => 'password',
                        'id' => 'password',
                        'class' => 'form-control'
                    );
                    echo form_open('', array('role' => 'form'));
                    echo "<div class='form-group'>" . form_label('Username', 'username') . form_input($iusername) . "</div>";
                    echo "<div class='form-group'>" . form_label('Password', 'password') . form_password($ipassword) . "</div>";
                    echo form_submit('masuk', 'Masuk', 'class="btn btn-default"');
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>