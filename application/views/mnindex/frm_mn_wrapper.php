<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <!-- <i class="fab fa-grav"></i> -->
                <div class="sidebar-brand-text ">
                    <!-- <a href="<?php echo site_url('0036g56'); ?>"> -->
                    <!-- <span ><?php echo $title; ?></span> -->
                    <span>Dokumentasi Berkas Kredit</span>
                    <!-- </a> -->
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo site_url('0036g56'); ?>">
                        <i class="fas fa-fw fa-acc"></i>
                        <span>Home</span>
                    </a>

            <hr class="sidebar-divider">

            <!-- looping menu -->
            <?php
            $role_id = $this->session->userdata('log_idgroup');
            $querymenu = "  SELECT
                            `sys_user_role`.`id_sys_user_role`,
                            `sys_user_role`.`name_role` as `nama`,
                            `sys_user_role`.`kode`
                            FROM `sys_user_role`
                            WHERE `sys_user_role`.`id_sys_user_role` = $role_id
                            ORDER BY `sys_user_role`.`id_sys_user_role` ASC ";
            $menus = $this->db->query($querymenu)->result_array();
            ?>
            <?php foreach ($menus as $menu) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-acc"></i>
                        <span><?php echo $menu['nama']; ?></span>
                    </a>
                    <!-- looping sub menu -->
                    <?php
                    $menuid = $menu['id_sys_user_role'];
                    $querysubmenu = " SELECT 
                                `sys_user_menu_role`.`id_sys_user_menu_role`,
                                `sys_user_menu_role`.`id_sys_user_menu`,
                                `sys_user_menu_role`.`id_sys_user_role`,
                                `sys_user_menu_role`.`INSATUS`,
                                `sys_user_menu`.`nama_menu`,
                                `sys_user_menu`.`inlink`,
                                `sys_user_menu`.`inicon`,
                                `sys_user_menu`.`indesc`,
                                `sys_user_menu`.`act_`
                                FROM `sys_user_menu_role` 
                                join `sys_user_menu` on `sys_user_menu`. `id_sys_user_menu` = `sys_user_menu_role`. `id_sys_user_menu`
                                WHERE `id_sys_user_role` = $menuid
                                AND    `sys_user_menu_role`.`INSATUS` = 1
                                ORDER BY `sys_user_menu`.`incode` ASC ";
                    $submenu = $this->db->query($querysubmenu)->result_array();
                    ?>
                    <?php foreach ($submenu as $sub) : ?>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?php echo $sub['inlink']; ?>" target="<?php echo $sub['act_']; ?>"><?php  echo $sub['nama_menu'];?>
                                <?php 
                                if($menu['id_sys_user_role'] == 1){
                                    if($sub['inlink']== '054a562' ){ //054a562
                                        $q = "SELECT count(*) as `cek`
                                                from `sys_dnumloan`
                                                where `cek1` = 1";
                                        $data = $this->db->query($q)->row();
                                        echo "<i class='fas fa-bell fa-fw'></i>
                                        <span class='badge badge-danger badge-counter'>". $data->cek ."</span>"
                                        ;
                                    }
                                    if($sub['inlink']== 'ord01' ){ //054a562
                                        $q = "SELECT count(*) as `cek`
                                                from `sys_order`
                                                where `status` = 1";
                                        $data = $this->db->query($q)->row();
                                        echo "<i class='fas fa-bell fa-fw'></i>
                                        <span class='badge badge-danger badge-counter'>". $data->cek ."</span>"
                                        ;
                                    }
                                };
                                ?>
                            </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </li>
            <?php endforeach; ?>
            <!-- End loopingmenu -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->