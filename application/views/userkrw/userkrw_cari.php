                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo get_message('msg'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Staff dan Petugas</h6>
                        </div>
                        <!-- ----------------------search------------------------------------------- -->
                        <div class="card-body">
                            <div class="table-responsive col-sm-12 text-left">
                                <?php

                                foreach ($cabs as $cab) {
                                    $incabang[0] = '--Semua Cabang--';
                                    $incabang[$cab->nama_cab]  = "$cab->idwil - $cab->nama_cab";
                                }

                                $inik = array(
                                    'name' => 'nik',
                                    'id' => 'nik',
                                    'class' => 'form-control',
                                    'value' => set_value('nik'),
                                    'placeholder' => 'NIK Petugas'
                                );

                                $inama_krw = array(
                                    'name' => 'nama_krw',
                                    'id' => 'nama_krw',
                                    'class' => 'form-control',
                                    'value' => set_value('nama_krw'),
                                    'placeholder' => 'Nama Karyawan'

                                );

                                echo form_open('9696ip', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));

                                echo "<div class='form-group'>" .
                                    form_label('Produk', 'ncabang', array('class' => 'control-label sr-only')) .
                                    form_dropdown('ncabang', $incabang, set_value('ncabang'), 'class="form-control"') . "</div> ";

                                echo "<div class='form-group'>" . form_label('NIK', 'nik', array('class' => 'control-label sr-only')) . form_input($inik) . "</div> ";
                                // echo "<div class='form-group'>" . form_label('Nama Karyawan', 'nama_krw', array('class' => 'control-label sr-only')) . form_input($inama_krw) . "</div> ";
                                echo form_submit('ok', 'Cari', 'class="btn btn-primary"');
                                echo form_close();
                                ?>
                            </div>
                        </div>



                        <!--  -->
                    </div>

                </div>
                <!-- /.container-fluid -->