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
                        `nama_krw`,
                        `file_fp`
                        FROM  `sys_krwenduser`
                        WHERE `id` = $id
                    ";
            $niks = $this->db->query($qnik)->row();
            
            ?>
            <a class="navbar-brand" href="<?php echo site_url('2741724'); ?>"><?= $niks->nik . ' | ' . $niks->nama_krw; ?></a>
            <?php
            $paths = "SELECT * FROM `ornamen` WHERE `id` = 2";
            $paths = $this->db->query($paths)->row();
            $path = $paths->prfix. $paths->path_pp;
            ?>
            <img class="img-profile rounded-circle" src="<?php echo $path .  $niks->file_fp; ?>" width="60" height="60">
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                // Cari id dari user role
                $id_ur      = $niks->id_adm_user_role;
                $qauserrole = "SELECT
                                `id`,
                                `name_role`
                                FROM `adm_user_role`
                                Where `id` = $id_ur
                ";
                $nurole = $this->db->query($qauserrole)->row();
                $iduserrole = $nurole->id;
                ?>
                <?php
                //cari menu
                $qidumr = "SELECT
                                    `adm_user_menu_role`.`id`,
                                    `adm_user_menu_role`.`id_adm_user_menu`,
                                    `adm_user_menu_role`.`id_adm_user_role`,
                                    `adm_user_menu_role`.`insatus`,
                                    `adm_user_menu`.`id` as `idm`,
                                    `adm_user_menu`.`nama_menu`,
                                    `adm_user_menu`.`instatus`,
                                    `adm_user_menu`.`indesc`
                                    FROM `adm_user_menu_role`
                                    JOIN `adm_user_menu` ON `adm_user_menu_role`.`id_adm_user_menu` = `adm_user_menu`.`id`
                                    WHERE `adm_user_menu_role`.`id_adm_user_role` = $iduserrole
                                    AND `adm_user_menu_role`.`insatus` = 1
                        ";
                $nmus = $this->db->query($qidumr)->result_array();
                ?>

                <?php foreach ($nmus as $nmu) : ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="oret"><?php echo $nmu['nama_menu']; ?> <?php $nmu['idm']; ?></span></a>

                        <?php
                        $sbm = $nmu['idm'];
                        $qsubmnu = "SELECT
                        `adm_user_menu`.`id` as `ids`,
                        `adm_user_menu_sub`.`nama_menu`,
                        `adm_user_menu_sub`.`inlink`,
                        `adm_user_menu_sub`.`inicon`,
                        `adm_user_menu_sub`.`indesc`
                        FROM `adm_user_menu_sub`
                        JOIN `adm_user_menu` on `adm_user_menu_sub`. `id_user_menu` = `adm_user_menu`.`id`
                        JOIN `adm_user_menu_role` on `adm_user_menu`.`id`= `adm_user_menu_role` .`id_adm_user_menu`
                        WHERE `adm_user_menu`.`id` = $sbm
                        AND `adm_user_menu_role`.`insatus` = 1
                        ";
                        $sb = $this->db->query($qsubmnu)->result_array();
                        ?>
                        <ul class="dropdown-menu">
                            <?php foreach ($sb as $s) : ?>
                                <li><a href="<?php echo $s['inlink']; ?>"><?php echo $s['nama_menu']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </li>
                <?php endforeach; ?>



            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>