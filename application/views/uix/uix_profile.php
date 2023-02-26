                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <!-- First Column -->
                        <div class="col-lg-4">

                            <!-- Custom Text Color Utilities -->
                            <div class="card shadow mb-4">
                                <img src="<?= base_url('assets/media/jpeg/'); ?><?= $duser->file_fp; ?>"
                                    class="card-img-top">
                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
                                </div>
                                <div class="card-body">
                                    <div class="p-3 bg-gray-100">Nama : <?= $duser->nama; ?></div>
                                    <div class="p-3 bg-gray-200">Nik : <?= $duser->nik; ?></div>
                                    <div class="p-3 bg-gray-100">Status User :
                                        <?= role($duser->id_role) . ' || ' . status($duser->status); ?></div>
                                    <div class="p-3 bg-gray-200">Cabang Aktif :
                                        <?= $duser->kcab . ' || Kode : ' . $duser->cabang; ?></div>
                                    <div class="p-3 bg-gray-300">ID : <?= $psdata->ktp; ?></div>
                                    <div class="p-3 bg-gray-400">Phone : <?= $psdata->tlp; ?></div>
                                    <div class="p-3 bg-gray-300">Alamat : <?= status($psdata->alamat); ?></div>
                                    <div class="p-3 bg-gray-400">Diskripsi lain : <br> <?= $psdata->diskrep; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br>
                    <hr>

                    <div class="container-fluid">

                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="p-3 bg-gray-400" style="width: 160px;">Buka file</th>
                                                <th class="p-3 bg-gray-400" style="width: 106px;">Nama File</th>
                                                <th class="p-3 bg-gray-400" style="width: 244px;">Ukuran</th>
                                                <th class="p-3 bg-gray-400" style="width: 115px;">Ekstensi</th>
                                                <th class="p-3 bg-gray-400" style="width: 50px;">Tipe File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($pdfs as $pdf) {
                                                echo "<tr role='row' class='odd'>";
                                                echo "<td> <a href='assets/media/dokumen/{$pdf->open}' target='_blank' class='fa fa-file'></a></td>";
                                                echo "<td>{$pdf->nama}</td>";
                                                echo "<td>{$pdf->ekstens}</td>";
                                                echo "<td>{$pdf->ukuran}</td>";
                                                echo "<td>{$pdf->tipe}</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br>
                    <hr>

                    <div class="container-fluid">
                        <div class="row">

                            <?php foreach ($fotos as $foto) : ?>
                            <div class="col-md-4>">
                                <div class="card mb-6" style="width: 18rem;">
                                    <a href="assets/media/jpeg/<?= $foto->nama; ?>" target="_blank">
                                        <img src="assets/media/jpeg/<?= $foto->nama; ?>" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <h7 class="card-title"><?= $foto->open; ?></h7>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->