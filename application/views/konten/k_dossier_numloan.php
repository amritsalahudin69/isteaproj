<?php
$role_id = $this->session->userdata('log_idgroup');
if ($role_id > 2) {
    echo "
        <div class='col ml-3 mb-1'>
            <a class='btn btn-primary btn-icon-split' href='" . site_url('054a452add/' . $detail->id_sys_enduser) . "'>
                <span class='icon text-white-50'><i class='fas fa-plus'></i></span>
                <span class='text'>Unggah Dokumen Foto</span>
            </a>
        </div>
        ";
}
// $cek_db = "select * from sys_file_loan where id_sys_dnumloan = $id";
// $cekx = $this->db->query($cek_db)->result_array();

// var_dump($id);

// if (isset($cekx)){
//   $cek = true;
//   return $cek;
// }
// if($cek){
  // var_dump ($cekx);
// }
?>

            <div class="card shadow mb-">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Histori Pinjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-left">Tahun Pinjam</th>
                                        <th class="text-left">No. Berkas</th>
                                        <th class="text-center">File Kredit</th>
                                        <?php if($role_id ==1):?>
                                        <th class="text-center">Hapus data beserta file Foto dan Dok</th>
                                        <th class="text-center">Ubah Tanggal Drop</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($loans as $loan) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>{$no}</td>";
                                        echo "<td>{$loan->yloan}</td>";
                                        echo "<td>{$loan->noberkas}</td>";
                                        echo "<td class='text-center'>
                                                        <a class='buka' href='" . site_url('054hj44/' . $loan->id_sys_dnumloan) . "' target = '_blank'>
                                                        <i class='fa fa-book' aria-hidden='true'></i>
                                                        </a>
                                                </td>";
                                        if ($role_id == 1) {
                                        echo "<td class='text-center'>
                                                        <a class='hapus' href='" . site_url('deldet/' . $loan->id_sys_dnumloan) . "'>
                                                        <i class='fa fa-trash' aria-hidden='true'></i>
                                                        </a>
                                                </td>";
                                          echo "<td class='text-center'>
                                                  <a class='ubah' href='" . site_url('editnumberloan/' . $ubah->id_sys_enduser) . "'>
                                                  <i class='fa fa-edit' aria-hidden='true'></i>
                                                  </a>
                                          </td>";
                                        }
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

<script>
    $(document).ready(function() {
        $('.hapus').click(function() {
            return confirm("Manghapus data tersebut tidak akan dapat di restore kembali, Apakah Yakin untuk menghapus data tsb?");
        });
    });
    $(document).ready(function() {
        $('.buka').click(function() {
            return confirm("Apakah Anda yakin membuka semua Record file kredit data enduser tersebut?");
        });
    });
</script>
