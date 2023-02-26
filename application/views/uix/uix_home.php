<?php foreach ($infos as $info) : ?>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <div class="d-block card-header py-3" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $info->judul; ?></h6>
                                </div>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <?php
                                        if(isset($info->file)==null){
                                            echo '<div class="card-body">'. $info->konten .'</div>';        
                                        } else{
                                            echo '<div class="card-body">'. $info->konten .'</div>';
                                            echo '<img src="./assets/info/'.$info->file .'" width="100%" height="100%" alt=""/>';
                                        }
                                    ?>
                                </div>
                </div>
                
            </div>
<?php endforeach; ?>
                <!-- End of Main Content -->

                <!-- Footer -->