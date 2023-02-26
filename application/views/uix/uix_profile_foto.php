                                      <div class="container-fluid">
                                          <div class="row">
                                              <?php foreach ($fotos as $foto) : ?>
                                              <div class="col-md-4>">
                                                  <div class="card mb-6" style="width: 18rem;">
                                                      <a href="assets/media/jpeg/<?= $foto->nama; ?>" target="_blank">
                                                          <img src="assets/media/jpeg/<?= $foto->nama; ?>"
                                                              class="card-img-top">
                                                      </a>
                                                      <div class="card-body">
                                                          <h7 class="card-title"><?= $foto->open; ?></h7>
                                                      </div>
                                                  </div>
                                              </div>
                                              <?php endforeach; ?>

                                          </div>
                                      </div>
                                      </div>

                                      </div>
                                      <!-- End of Main Content -->

                                      <!-- Footer -->