<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php echo $daftar; ?></h1>
                            </div>
                            <?php echo get_message('daftar'); ?>

                            <form class="user" method="POST">
                                <?php
                                $inik = array(
                                    'name' => 'nik',
                                    'id' => 'nik',
                                    'type' => 'text',
                                    'class' => 'form-control form-control-user',
                                    'placeholder' => 'NIK',
                                    'set_value' => 'nik'
                                );
                                $iname = array(
                                    'name' => 'name',
                                    'id' => 'name',
                                    'type' => 'name',
                                    'class' => 'form-control form-control-user',
                                    'placeholder' => "Nama lengkap Berserta Gelar"
                                );
                                $ipassword1 = array(
                                    'name' => 'password1',
                                    'id' => 'password1',
                                    'type' => 'password',
                                    'class' => 'form-control form-control-user',
                                    'placeholder' => "Masukan Password"
                                );
                                $ipassword2 = array(
                                    'name' => 'password2',
                                    'id' => 'password2',
                                    'type' => 'password',
                                    'class' => 'form-control form-control-user',
                                    'placeholder' => "Ulangi Password"
                                );

                                $iopsicabang[0] = 'Pilih Cabang';
                                foreach ($cabangs as $cabang) {
                                    $iopsicabang[$cabang->id_sys_cab] = "$cabang->idwil - $cabang->nama_cab";
                                }

                                echo form_open('', array('role' => 'form'));
                                ?>
                                <div class="form-group">
                                    <?php echo  form_input($inik, set_value('nik')) . form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo  form_input($iname, set_value('name')) . form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row align-content-lg-center">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <?php echo  form_input($ipassword1) . form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo  form_input($ipassword2); ?>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <?php echo  form_dropdown('cabang', $iopsicabang, set_value('cabang'), 'class="btn btn-primary dropdown-toggle"'); ?>
                                </div>

                                <div name="daftarbtn" id="daftarbtn">
                                    <?php echo form_submit('ok', 'Daftar', 'class="btn btn-primary btn-user btn-block"'); ?>
                                </div>
                                <?php
                                echo form_close();
                                ?>

                                <!-- <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button> -->
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="<?php echo site_url('6977') ?>">Sudah ada akun? masuk
                                    Disini!</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>


<!-- <hr>
<a href="index.html" class="btn btn-google btn-user btn-block">
    <i class="fab fa-google fa-fw"></i> Register with Google
</a>
<a href="index.html" class="btn btn-facebook btn-user btn-block">
    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
</a> 
-->

<!-- <div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
    </div>
    <div class="col-sm-6">
        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
    </div>
</div> -->
<!-- 
<div class="form-group">
    <input type="name" class="form-control form-control-user" id="exampleInputname" placeholder="name Address">
</div>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <div class="col-sm-6">
        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
    </div>
</div>
<a href="login.html" class="btn btn-primary btn-user btn-block">
    Register Account
</a> -->