<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            //cari nama dan NIP User
            $id = $this->session->userdata('log_iduser1');
            $qnik = "SELECT
                        `id`,
                        `nik`,
                        `id_adm_user_role`,
                        `nama_krw`
                        FROM  `sys_krwenduser`
                        WHERE `id` = $id
                    ";
            $niks = $this->db->query($qnik)->row();
            ?>
            <a class="navbar-brand" href="<?php echo site_url('2741724'); ?>">Update Data : <?= $niks->nik . ' | ' . $niks->nama_krw; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
    </div><!-- /.container-fluid -->
</nav>