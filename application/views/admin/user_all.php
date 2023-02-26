<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">User Map</h1>
            <?php echo get_message('msg'); ?>
            
            <table class="table table-responsive table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Genre</th>
                    <th>Cabang</th>
                    <!--<th class="text-center">Opsi</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
		        foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$user->nama}</td>";
                    echo "<td>{$user->Password}</td>";
                    echo "<td>{$user->Genre}</td>";
                    echo "<td>{$user->Cabang}</td>";
		            //echo "<td class='text-center'><a href='" . site_url('rcobdsuser/rco/' . $user->id) . "'><i class='fa fa-list'></i></a> </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
                </tr>
                </tbody>
            </table>
            <?php echo $link1; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.hapus').click(function () {
            return confirm("Apakah Anda yakin ingin menghapus data tersebut?");
        });
    });
</script>