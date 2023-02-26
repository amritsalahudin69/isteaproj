<div class="container-fluid">


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dossier Kredit</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Rekening</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Kode Cabang</th>
                                            <th>Cabang</th>
                                            <th>Resort</th>
                                            <th>Kode Resort</th>
                                            <th>NIK Pasangan</th>
                                            <th>Nama Pasangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><?php echo $detail->rekno; ?></td>
                                        <td><?php echo $detail->inno_id; ?></td>
                                        <td><?php echo $detail->nama; ?></td>
                                        <td><?php echo $detail->idwil; ?></td>
                                        <td><?php echo $detail->nama_cab; ?></td>
                                        <td><?php echo $detail->resort_name; ?></td>
                                        <td><?php echo $detail->idres_ori; ?></td>
                                        <td><?php echo $detail->inno_idsc; ?></td>
                                        <td><?php echo $detail->nama_sc; ?></td>

                                        </tr>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                </div>