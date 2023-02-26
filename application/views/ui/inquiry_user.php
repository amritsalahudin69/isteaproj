<div class="container" style="margin-top: 10px">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user"></i> Inquiry User</h3>
                </div>

                <div class="panel-body"> <!--kolom tentang user pemakai(aktif) -->
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nama</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo "$id";
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>{$user->nama}</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
</div>