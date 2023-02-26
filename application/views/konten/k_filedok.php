<?php
$role_id = $this->session->userdata('log_idgroup');
if ($role_id > 2) {
    echo "
        <div class='col ml-3 mb-1'>
            <a class='btn btn-primary btn-icon-split' href='" . site_url('054hj44adddok/' . $tambah->id_sys_dnumloan) . "'>
                <span class='icon text-white-50'><i class='fas fa-plus'></i></span>
                <span class='text'>Unggah Dokumen PDF</span>
            </a>
        </div>
        ";
}
?>
<?php foreach ($doks as $dok) : ?>
    <div class="col-md-3">

        <div class="card mb-4">

            <img src="<?= base_url('assets/media/internal/PDF.svg'); ?>" width="10%" height="10%" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $dok->file_name; ?></h5>
                <h5 class="card-title"><?php echo $dok->keterangan; ?></h5>
                <p class="card-text"><?php echo $dok->gen_fname; ?></p>
                <p class="card-text"><?php echo $dok->indesc; ?></p>
                <a href="<?php echo $_dircab . $dok->gen_fname; ?>" target="_blank" class="btn btn-primary">
                    Unduh
                </a>
                <?php
                    $role_id = $this->session->userdata('log_idgroup');
                    if ($role_id == 1) {
                        echo
                        "<td class='text-center'>
                            <a class='hapus' href='" . site_url("hapus/" . $dok->id_sys_file_loan) . "'>
                            <i class='btn btn-warning btn-icon-split'>
                            <span class='text'>hapus</span>
                            </i>
                            </a>";
                    }
                    ?>      
            </div>
        </div>

    </div>
    <!-- endloop -->
<?php endforeach; ?>

<!-- </div> -->
</div>

<script>
    $(document).ready(function() {
        $('.hapus').click(function() {
            return confirm("Apakah Anda yakin menghapus data tersebut?");
        });
    });
</script>