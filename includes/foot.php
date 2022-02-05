
    <!--Footer-->
    <footer class="page-footer text-center text-light text-md-left bg-dark pt-0">
      <div style="background-color: #572100;">
        <div class="container">
            <!--Grid row-->
          <div class="row py-4 d-flex align-items-center">

              <!--Grid column-->
              <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                  <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6 col-lg-7 text-center text-md-right">
                  <!--Facebook-->
                  <a class="fb-ic ml-0 px-2">
                      <i class="fab fa-facebook-f white-text"> </i>
                  </a>
                  <!--Twitter-->
                  <a class="tw-ic px-2">
                      <i class="fab fa-twitter white-text"> </i>
                  </a>
                  <!--Google +-->
                  <a class="gplus-ic px-2">
                      <i class="fab fa-google-plus-g white-text"> </i>
                  </a>
                  <!--Linkedin-->
                  <a class="li-ic px-2">
                      <i class="fab fa-linkedin-in white-text"> </i>
                  </a>
                  <!--Instagram-->
                  <a class="ins-ic px-2">
                      <i class="fab fa-instagram white-text"> </i>
                  </a>
              </div>
              <!--Grid column-->

          </div>
            <!--Grid row-->

        </div>
      </div>
        <!--Footer Links-->
      <div class="container mt-5 bg-dark mb-4 text-center text-md-left">
          <div class="row mt-2">

              <!--First column-->
              <div class="col-md-6 col-lg-6">
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
              <div class="col-md-6 col-lg-6 text-start">
                  <h6 class="text-uppercase font-weight-bold">
                      <strong>Contact</strong>
                  </h6>
                  <hr class="brown mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p>
                      <i class="fas fa-home mr-3"></i> <?php echo ADDRESS ?></p>
                  <p>
                      <i class="fas fa-envelope mr-3"></i> <?php echo EMAIL ?> </p>
                  <p>
                      <i class="fas fa-phone mr-3"></i> <?php echo PHONE1 ?></p>
                  <p>
                      <i class="fas fa-phone mr-3"></i> <?php echo PHONE2 ?></p>
              </div>
              <!--/.Fourth column-->

          </div>
      </div>
        <!--/.Footer Links-->

      <!-- Copyright-->
      <div class="footer-copyright py-3 text-center">
          <div class="container-fluid">
              &copy; <?php echo date('Y'); ?> Copyright: <a href="#"> <?php echo FULL_NAME ?></a> Design by <?php echo DEVELOPERNAME ?>
          </div>
      </div>
      <!--/.Copyright -->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?php echo MULTIPATH;?>js/jquery-3.2.1.min.js"></script>
    <script src="../server/js/request.js"></script>
</body>



</html>
