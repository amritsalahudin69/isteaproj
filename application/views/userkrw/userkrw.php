                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo get_message('msg'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resort</h6>
                        </div>
                        <!-- ----------------------search------------------------------------------- -->
                        <div class="card-body">
                            <div class="table-responsive col-sm-12 text-left">
                                <?php
                                $incabang = array(
                                    'name' => 'ncabang',
                                    'id' => 'ncabang',
                                    'class' => 'form-control',
                                    'value' => set_value('ncabang'),
                                    'placeholder' => 'Nama Cabang'
                                );

                                $inik = array(
                                    'name' => 'nik',
                                    'id' => 'nik',
                                    'class' => 'form-control',
                                    'value' => set_value('nik'),
                                    'placeholder' => 'NIK Petugas'
                                );

                                $iuser = array(
                                    'name' => 'user',
                                    'id' => 'user',
                                    'class' => 'form-control',
                                    'value' => set_value('user'),
                                    'placeholder' => 'User'

                                );

                                echo form_open('888a562', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));

                                echo "<div class='form-group'>" . form_label('Nomor rekening', 'ncabang', array('class' => 'control-label sr-only')) . form_input($incabang) . "</div> ";
                                echo "<div class='form-group'>" . form_label('nik Anggota', 'nik', array('class' => 'control-label sr-only')) . form_input($inik) . "</div> ";
                                echo "<div class='form-group'>" . form_label('user', 'user', array('class' => 'control-label sr-only')) . form_input($iuser) . "</div> ";
                                echo form_submit('ok', 'Cari', 'class="btn btn-primary"');
                                echo form_close();
                                ?>
                            </div>
                        </div>
                        <!-- ----------------------search------------------------------------------- -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-left">Nama Resort</th>
                                            <th class="text-left">User</th>
                                            <th class="text-left">Id. Resort</th>
                                            <th class="text-left">Status Resort</th>
                                            <th class="text-left">Kantor Cabang</th>
                                            <th class="text-left">NIK Petugas</th>
                                            <th class="text-left">Nama Petugas</th>
                                            <th class="text-left">Status Petugas</th>
                                            <th class="text-center">Ubah Data</th>
                                            <th class="text-center">Aktifkan</th>
                                            <th class="text-center">Non-aktifkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($resort as $res) {
                                            echo "<tr>";
                                            echo "<td>{$no}</td>";
                                            echo "<td>{$res->resort_name}</td>";
                                            echo "<td>{$res->user}</td>";
                                            echo "<td>{$res->idres}</td>";
                                            echo "<td>" . status($res->instatus) . "</td>";
                                            echo "<td>{$res->nama_cab}</td>";
                                            echo "<td>{$res->nik}</td>";
                                            echo "<td>{$res->nama_krw}</td>";
                                            echo "<td>" . status($res->aktif) . "</td>";
                                            echo "<td class='text-center'>
                                                    <a href='" . site_url('888a562edit/' . $res->id) . "'><i class='fa fa-edit'></i></a>
                                                  </td>";
                                
                                            echo "<td class='text-center'>
                                                  <a class='ubah' href='" . site_url('8881/'. $res->id) . "'>
                                                  <i class='btn btn-success btn-icon-split'>
                                                  <span class='text'>aktif</span>
                                                  </i>
                                                  </a>
                                                </td>";
                                            echo "<td class='text-center'>
                                                <a class='ubah' href='" . site_url('8880/'. $res->id) . "'>
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
    $(document).ready(function () {
        $('.ubah').click(function () {
            return confirm("Apakah Anda yakin ingin mengubah status Resort?");
        });
    });
</script>