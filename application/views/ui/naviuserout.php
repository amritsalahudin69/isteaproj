<nav class="navbar navbar-default navbar-fixed-top ">

    <div class="container-fluid">

        <!-- <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo site_url('sys_home');?>">
            <image src="<?php echo base_url('assets/asset/img/asset.png');?>" width="90px" height="30px"></image>
          </a>
        </div> -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar">Toggle navigation</span>
                <span class="icon-bar">Toggle navigation</span>
                <span class="icon-bar">Toggle navigation</span>
            </button>
            <a class="navbar-brand"><image src="<?php echo base_url('assets/asset/img/asset.png');?>" width="90px" height="30px"></image></a>
        </div>

        <!--           awal div menu dropdown pada navigasi                  -->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">

          <!-- <ul class="nav navbar-nav">
              <li class = "dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi<span class="oret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo site_url('sys_transaksi'); ?>">Arisan</a></li>
                  </ul>
              </li>

              <ul class="nav navbar-nav">
                 <li><a href="<?php echo site_url('sys_transaksi') ?>" target="_blank">Transaksi</a></li>
                <li><a href="<?php echo site_url('sys_transaksi') ?>">Transaksi</a></li>
              </ul>
          </ul> -->

          <ul class="navbar-form navbar-right">
                <a href="<?php echo site_url ('admin/keluar'); ?>" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i>Logout</a>
          </ul>

        </div>
        <!--           akhir div menu dropdown pada navigasi                  -->

    </div>
</nav>
