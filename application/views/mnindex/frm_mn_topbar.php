 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">
         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">
                 <!-- Nav Item - User Information -->              
                 
                 <div class="topbar-divider d-none d-sm-block"></div>
                 <li class="nav-item dropdown no-arrow">
                     <?php
                        $id     = $this->session->userdata('log_idres');
                        $data   = "SELECT
                                `sys_user_data`.`id_sys_user_data`,
                                `sys_user_data`.`resort_name`,
                                `sys_cab`.`id_sys_cab`,
                                `sys_cab`.`nama_cab`
                                FROM `sys_user_data`
                                JOIN `sys_cab` on `sys_user_data`.`id_sys_cab` = `sys_cab`. `id_sys_cab`
                                WHERE `sys_user_data`.`id_sys_user_data` = $id
                        ";
                        $niks = $this->db->query($data)->row();
                     ?>

                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                         <i class="fas fa-grin-squint fa-sm fa-fw mr-2 text-gray-400"></i>
                         <?= $niks->resort_name . ' | ' . $niks->nama_cab; ?>
                     </a>

                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="<?php echo site_url('koc') ?>">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Ubah Password
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="<?php echo site_url('6977') ?>">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Sign in as Personal
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->