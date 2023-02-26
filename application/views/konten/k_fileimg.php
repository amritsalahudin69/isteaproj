<?php
$role_id = $this->session->userdata('log_idgroup');
if ($role_id > 2) {
    echo "
        <div class='col ml-3 mb-1'>
            <a class='btn btn-primary btn-icon-split' href='" . site_url('054hj44addimg/' . $tambah->id_sys_dnumloan) . "'>
                <span class='icon text-white-50'><i class='fas fa-plus'></i></span>
                <span class='text'>Unggah Dokumen Foto</span>
            </a>
        </div>
        ";
}
?>
<!-- <div class="row"> -->
<!-- <div class="col mt-2"> -->
<!-- <h4> Foto dan Gambar Kredit</h4> -->
<!-- </div> -->
<div class="row">
    <!-- startloop -->
    <?php foreach ($imgs as $img) : ?>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="<?php echo $_dircab . $img->gen_fname; ?>" width="10%" height="10%" class="card-img-top">
                <!-- <?php // echo $_dircab . $img->gen_fname . '<br>'; echo $img->id_sys_file_loan; ?> -->
                <div class="card-body">
                    <h5 class="card-title"><?php echo $img->file_name; ?></h5>
                    <h5 class="card-title"><?php echo $img->keterangan; ?></h5>
                    <p class="card-text"><?php echo  $img->gen_fname; ?></p>
                    <p class="card-text"><?php echo  $img->indesc; ?></p>

                    <a href="<?php echo $_dircab . $img->gen_fname; ?>" target="_blank" class="btn btn-primary">
                        Unduh
                    </a>

                    <?php
                    $role_id = $this->session->userdata('log_idgroup');
                    if ($role_id == 1) {
                        echo
                        "<td class='text-center'>
                            <a class='hapus' href='" . site_url("hapus/" . $img->id_sys_file_loan) . "'>
                            <i class='btn btn-warning btn-icon-split'>
                            <span class='text'>hapus</span>
                            </i>
                            </a>";
                        // echo "<a class='btn btn-warning' href='" . site_url("hapus/" . $img->id_sys_file_loan) . "'>hapus</a>";
                    }
                    ?>

                </div>
            </div>

        </div>
    <?php endforeach; ?>
    <!-- endloop -->
    <br />


    <!-- </div>
</div> -->

<script>
    $(document).ready(function() {
        $('.hapus').click(function() {
            return confirm("Apakah Anda yakin menghapus data tersebut?");
        });
    });
</script>