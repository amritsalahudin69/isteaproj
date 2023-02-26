<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 text-center"><?php echo $masuk; ?></h1>
                                        <h4 class="h4 text-gray-900 mb-4 text-center"><?php echo $title; ?></h4>

                                        <!-- div untuk form dalam -->
                                    </div>
                                    <!--pesan status berhasil dari registrasi-->
                                    <?php echo get_message('daftar'); ?>
                                    <!--pesan status berhasil dari registrasi-->

                                    <form class="userlogin" method="POST">
                                        <?php
                                        $iuser_log = array(
                                            'name' => 'user_log',
                                            'id' => 'user_log',
                                            'type' => 'text',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => "Nomor Induk Pegawai"
                                        );
                                        $ipass = array(
                                            'name' => 'password',
                                            'id' => 'password',
                                            'type' => 'password',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => "Sandi"
                                        );
                                        echo form_open('', array('role' => 'form'));
                                        ?>

                                        <div class="form-group">
                                            <?php echo  form_input($iuser_log,  set_value('user_log')) . form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo  form_input($ipass,  set_value('password')) . form_error('password',  '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div name="masuk" id="masuk">
                                            <?php echo form_submit('ok', 'Masuk', 'class="btn btn-primary btn-user btn-block"'); ?>
                                        </div>
                                        <?php
                                        echo form_close();
                                        ?>


                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" name="lupapassword" id="lupapassword" href="<?php echo site_url('login') ?>">Login di Dokumentasi Kredit Utama Karya Group</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" name="daftar" id="daftar" href="<?php echo site_url('697701') ?>">Buat Akun Disini</a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
<!--
<div class="form-group">
  <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
</div>

<div class="form-group">
  <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
</div>

<a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                  -->