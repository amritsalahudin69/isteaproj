<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="title1">Import</h1>
            <?php
            echo $this->upload->display_errors("<div class='help-block error1'>", "</div>");
            $ifile = array(
                'name' => 'userfile',
                'id' => 'userfile'
            );
            echo form_open_multipart('', array('role' => 'form'));
            echo "<div class='form-group'>" . form_label('File (xls) : ', 'userfile') . form_upload($ifile) . "</div>";
            echo form_submit('ok', 'Import', 'class="btn btn-info"');
            echo form_close();
            ?>

            </br>
            <div class="col-sm-8" align="center">
                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                    <tr>
                        <td class="center"><image src="../../assets/asset/Excel.JPG"></td>
                    </tr>
                    </thead>
                </table>
            </div>


        </div>
    </div>
</div>