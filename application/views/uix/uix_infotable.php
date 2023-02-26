<div class="col ml-3 mb-1">
  <a href="<?php echo site_url('356infoadd')?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-plus "></i>
    </span>
    <span class="text">Tambah Info</span>
  </a>
</div>
 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo get_message('msg'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Info</h6>
                        </div>
                        <!-- ----------------------search------------------------------------------- -->

                        <div class="card-body">
                            <div class="table-infoponsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-left">Judul</th>
                                            <th class="text-left">Info</th>
                                            <th class="text-left">Status</th>
                                            <!-- <th class="text-center">Ubah</th> -->
                                            <th class="text-center">Aktifkan</th>
                                            <th class="text-center">Non-aktifkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($infos as $info) {
                                            echo "<tr>";
                                            echo "<td>{$no}</td>";
                                            echo "<td>{$info->judul}</td>";
                                            echo "<td>{$info->konten}</td>";
                                            echo "<td>" . status($info->aktif) . "</td>";
                                            // echo "<td class='text-center'>
                                            //         <a href='" . site_url('356info/' . $info->id_sys_info) . "'><i class='fa fa-edit'></i></a>
                                            //       </td>";

                                            echo "<td class='text-center'>
                                                  <a class='ubah' href='" . site_url('356info81/' . $info->id_sys_info) . "'>
                                                  <i class='btn btn-success btn-icon-split'>
                                                  <span class='text'>aktif</span>
                                                  </i>
                                                  </a>
                                                </td>";
                                            echo "<td class='text-center'>
                                                <a class='ubah' href='" . site_url('356info80/' . $info->id_sys_info) . "'>
                                                <i class='btn btn-danger btn-icon-split'>
                                                <span class='text'>non-aktif</span>
                                                </i>
                                                </a>
                                              </td>";
                                            echo "</tr>";

                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <script>
                    $(document).ready(function() {
                        $('.ubah').click(function() {
                            return confirm("Apakah Anda yakin ingin mengubah status Info?");
                        });
                    });
                </script>