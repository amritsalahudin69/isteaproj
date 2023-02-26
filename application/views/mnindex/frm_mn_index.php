        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="div row">
                <div class="col-lg-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No. </th>
                                <th scope="col">Nama</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($allmenu as $menu) {
                                echo "<tr>";
                                echo "<th scope='row'>{$no}</th>";
                                echo "<td>{$menu->nama_mn}</td>";
                                echo "<td><a class= 'text-center' href='" . site_url('menudetail/' . $menu->id) . "'><i class='fa fa-list'></i></a></td>";
                                echo "</tr>";
                                $no++;
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
            </div>



        </div>
        <!-- End of Main Content -->

        <!-- Footer -->