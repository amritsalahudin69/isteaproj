                    <div class="container-fluid">

                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">

                                        <?php echo get_message('file'); ?>
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
                                                echo "<td>{$pdf->file_view}</td>";
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