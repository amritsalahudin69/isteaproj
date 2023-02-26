<?php
if ($role_id > 1) {
    echo "
        <div class='col ml-3 mb-1'>
            <a class='btn btn-primary btn-icon-split' href='" . site_url('90ordadd') . "'>
                <span class='icon text-white-50'><i class='fas fa-plus'></i></span>
                <span class='text'>Tambah data</span>
            </a>
        </div>
        ";
}
// var_dump($role_id);
?>
 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo get_message('msg'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order</h6>
                        </div>
                        <!-- ----------------------search------------------------------------------- -->

                        <div class="card-body">
                            <div class="table-axponsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-left">Cabang</th>
                                            <th class="text-left">No Rekening</th>
                                            <th class="text-left">User</th>
                                            <th class="text-left">Tgl Masuk</th>
                                            <th class="text-center">Order</th>
                                            <th class="text-center">File Order</th>
                                            <th class="text-center">Tiket Order</th>
                                            <th class="text-center">Status</th>
                                            <?php
                                                if($role_id == 1){
                                                    echo "<th class='text-center'>Koreksi</th>";
                                                    echo "<th class='text-center'>Koreksi</th>";
                                                    // echo "<th class='text-center'>Dossier</th>";
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($ax as $ax) {
                                            echo "<tr>";
                                            // echo "<td>{$no}</td>";
                                            if($role_id==1){
                                                if($ax->status == 1){
                                                    echo "<td>{$no} <span class='badge badge-danger badge-counter'>Baru</span> </td>";
                                                }else{
                                                    echo "<td>{$no}</td>";
                                                }
                                            }else{
                                                echo "<td>{$no}</td>";
                                            }
                                            echo "<td>{$ax->nama_cab}</td>";
                                            echo "<td>{$ax->rekno}</td>";
                                            echo "<td>{$ax->user_log}</td>";
                                            echo "<td>{$ax->indate}</td>";
                                            echo "<td>{$ax->indesc}</td>";
                                            echo "<td>{$ax->data_order}</td>";
                                            echo "<td>{$ax->notiket}</td>";
                                            echo "<td>" . status($ax->status) . "</td>";
                                            if($role_id == 1){
                                                echo "<td class='text-center'>
                                                <a class='ubah' href='" . site_url('ordac90/' . $ax->id) . "'>
                                                <i class='btn btn-danger btn-icon-split'>
                                                <span class='text'>non-aktif</span>
                                                </i>
                                                </a>
                                              </td>";

                                              echo "<td class='text-center'>
                                                <a class='ubah' href='" . site_url('ordac91/' . $ax->id) . "'>
                                                <i class='btn btn-success btn-icon-split'>
                                                <span class='text'>aktif</span>
                                                </i>
                                                </a>
                                              </td>";
                                            //   if(isset($ax->rekno)){
                                            //     echo "<td class='text-center'>
                                            //     <a class='dossier' href='" . site_url('ordac91/' . $ax->rekno) . "'>
                                            //     <i class='btn btn-info btn-icon-split'>
                                            //     <span class='text'>klik sii</span>
                                            //     </i>
                                            //     </a>
                                            //   </td>";
                                            //   }
                                            }
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
                            return confirm("Apakah Anda yakin ingin mengubah status ax?");
                        });
                    });
                </script>