                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo get_message('msg'); ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dossier Kredit</h6>
                        </div>
                <!-- ----------------------search------------------------------------------- -->
                        <div class="card-body">
                            <div class="table-responsive col-sm-12 text-left">
                            <?php
                            $inorek = array(
                                'name' => 'norek',
                                'id' => 'norek',
                                'class' => 'form-control',
                                'value' => set_value('norek'),
                                'placeholder' => 'Nomor rekening'
                            );

                            $inama = array(
                                'name' => 'nama',
                                'id' => 'nama',
                                'class' => 'form-control',
                                'value' => set_value('nama'),
                                'placeholder' => 'Nama Anggota'
                            );

                            $iktp = array(
                                'name' => 'ktp',
                                'id' => 'ktp',
                                'class' => 'form-control',
                                'value' => set_value('ktp'),
                                'placeholder' => 'KTP'
                                
                            );

                            echo form_open('054a562', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));
                            
                            echo "<div class='form-group'>" . form_label('Nomor rekening', 'norek', array('class' => 'control-label sr-only')) . form_input($inorek) . "</div> ";
                            echo "<div class='form-group'>" . form_label('Nama Anggota', 'nama', array('class' => 'control-label sr-only')) . form_input($inama) . "</div> "; 
                            echo "<div class='form-group'>" . form_label('KTP', 'ktp', array('class' => 'control-label sr-only')) . form_input($iktp) . "</div> ";
                            echo form_submit('ok', 'Cari', 'class="btn btn-primary"');
                            echo form_close();
                            ?>
                            </div>
                        </div>
                <!-- ----------------------search------------------------------------------- -->
                        <?php $role_id = $this->session->userdata('log_idgroup');?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-left">No. Rekening</th>
                                            <th class="text-left">Nama</th>
                                            <th class="text-left">No. KTP</th>
                                            <th class="text-left">Cabang</th>
                                            <th class="text-left">Nama Resort</th>
                                            <th class="text-left">Kode Resort Cabang</th>
                                            <th class="text-center">Opsi</th>
                                            <th class="text-center">Detail</th>
                                            <?php
                                            if($role_id==1){
                                                echo "<th class='text-center'>Hapus</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $cabang = "Cabang_dummy";
                                        $Resort = "Nama Resort_dummy";
                                        $Kode_Resort = "Kode Resort Cabang_dummy";
                                        foreach ($dossiers as $dossier) {
                                            echo "<tr>";
                                            echo "<td>{$no}</td>";
                                            echo "<td>{$dossier->rekno}</td>";
                                            echo "<td>{$dossier->nama}</td>";
                                            echo "<td>{$dossier->inno_id}</td>";
                                            echo "<td>{$dossier->nama_cab}</td>";
                                            echo "<td>{$dossier->resort_name}</td>";
                                            echo "<td>{$dossier->idres_ori}</td>";
                                            echo "<td class='text-center'>
                                                    <a href='" . site_url('054a562edit/' . $dossier->id_sys_enduser) . "' target = '_blank'><i class='fa fa-edit'></i></a>
                                                    <!--<a class='hapus' href='" . site_url('054a562del/' . $dossier->id_sys_enduser) . "'><i class='fa fa-trash'></i> </a>-->
                                                    </td>";
                                            if($role_id==1){
                                                if($dossier->cek1==1){
                                                    echo "<td class='text-center'><a href='" . site_url('054a452/' . $dossier->id_sys_enduser) . "' target = '_blank'>
                                                        <i class='fa fa-list'></i></a> <span class='badge badge-danger badge-counter'>Baru</span></td>";
                                                }else{
                                                    echo "<td class='text-center'><a href='" . site_url('054a452/' . $dossier->id_sys_enduser) . "' target = '_blank'>
                                                        <i class='fa fa-list'></i></a></td>";
                                                }
                                                
                                                echo "<td class='text-center'><a class='hapus' href='" . site_url('054a562del/' . $dossier->id_sys_enduser) . "'>
                                                        <i class='fa fa-trash'></i></a></td>";
                                                
                                            }else{
                                                echo "<td class='text-center'><a href='" . site_url('054a452/' . $dossier->id_sys_enduser) . "' target = '_blank'>
                                                        <i class='fa fa-list'></i></a></td>";
                                                
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
        $('.hapus').click(function() {
            return confirm("Manghapus data tersebut tidak akan dapat di restore kembali, Apakah Yakin untuk menghapus data tsb?");
        });
    });
</script>