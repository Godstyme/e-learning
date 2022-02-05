<?php
require_once 'includes/heada.php';
?>
<footer class="page-footer text-center text-light text-md-left bg-dark pt-0">
        <!--Footer Links-->
      <div class="container mt-5 bg-dark mb-4 text-center text-md-left">
          <div class="row mt-2">

              <!--First column-->
              <div class="col-md-6 col-lg-6 py-5">
                  <h6 class="text-uppercase font-weight-bold">
                      <strong><?php echo FULL_NAME; ?></strong>
                  </h6>
                  <hr class="brown mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p style="text-align: justify !important;">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
              </div>
              <!--/.First column-->

              <!--Fourth column-->
              <div class="col-md-6 col-lg-6 text-start py-5 px-5">
                  <h6 class="text-uppercase font-weight-bold">
                      <strong>Contact</strong>
                  </h6>
                  <hr class="brown mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p>
                      <i class="fas fa-home mr-3 "></i> <?php echo ADDRESS ?></p>
                  <p>
                      <i class="fas fa-envelope mr-3 mt-3"></i> <?php echo EMAIL ?> </p>
                  <p>
                      <i class="fas fa-phone mr-3 mt-3"></i> <?php echo PHONE1 ?></p>
                  <p>
                      <i class="fas fa-phone mr-3 mt-3"></i> <?php echo PHONE2 ?></p>
              </div>
              <!--/.Fourth column-->

          </div>
      </div>
        <!--/.Footer Links-->

    </footer>

<?php
require_once 'includes/footer.php';
?>