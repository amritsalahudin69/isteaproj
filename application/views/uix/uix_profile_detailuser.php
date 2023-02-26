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
                                    <div class="p-3 bg-gray-300">Alamat : <br> <?= $psdata->alamat; ?></div>
                                    <!-- <div class="p-3 bg-gray-300">Alamat : <?= status($psdata->status); ?></div> -->
                                    <div class="p-3 bg-gray-400">Diskripsi lain : <br> <?= $psdata->diskrep; ?></div>
                                </div>
                            </div>
                        </div>

                        </div>

                        <br>
                        <hr>