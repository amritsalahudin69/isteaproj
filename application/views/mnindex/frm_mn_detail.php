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
                            foreach ($detail as $sub) {
                                echo "<tr>";
                                echo "<th scope='row'>{$no}</th>";
                                echo "<td>{$sub->judul}</td>";
                                // echo "<td><a class= 'text-center' href='" . site_url('nonactive/' . $sub->id) . "'></a></td>";
                                echo "<td><a class='nonaktifkan' href='" . site_url('nonactive/' . $sub->id) . "'>" . aktifasi($sub->is_active) . "</a></td>";
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

        <script>
            $(document).ready(function() {
                $('.nonaktifkan').click(function() {
                    return confirm("Apakah Anda yakin Non-Aktifkan Submenu tersebut?");
                });
            });
        </script>