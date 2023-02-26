<div class="container-fluid">


    <div class="card shadow mb-4">


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-left">NIK</th>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Status</th>
                            <th class="text-left">Kantor Cabang</th>
                            <th class="text-center">Ubah Data</th>
                            <th class="text-center">Aktifkan</th>
                            <th class="text-center">Non-aktifkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $usr) {
                            echo "<tr>";
                            echo "<td>{$no}</td>";
                            echo "<td>{$usr->nik}</td>";
                            echo "<td>{$usr->nama_krw}</td>";
                            echo "<td>" . status($usr->status) . "</td>";
                            echo "<td>{$usr->cabang}</td>";
                            echo "<td class='text-center'>
                                                    <a href='" . site_url('9696iedit/' . $usr->id) . "'><i class='fa fa-edit'></i></a>
                                                  </td>";

                            echo "<td class='text-center'>
                                                  <a class='ubah' href='" . site_url('96961/' . $usr->id) . "'>
                                                  <i class='btn btn-success btn-icon-split'>
                                                  <span class='text'>aktif</span>
                                                  </i>
                                                  </a>
                                                </td>";
                            echo "<td class='text-center'>
                                                <a class='ubah' href='" . site_url('96960/' . $usr->id) . "'>
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
<!-- End of Main Content -->

<!-- Footer -->
<script>
    $(document).ready(function() {
        $('.ubah').click(function() {
            return confirm("Apakah Anda yakin ingin mengubah status Staff?");
        });
    });
</script>