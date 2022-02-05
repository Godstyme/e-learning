<?php
require_once 'heada.php';
?>
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6 offset-md-2">
        <form action="" method="post" class="form" id="lecturerLogin">
          <h1 class="text-center">Login</h1>
    
          <label for="exampleInputEmail1" class="form-label">Email:</label>
          <input type="email" class="form-control forminput" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>


          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" id="inputPassword5" class="form-control forminput" name="password" aria-describedby="passwordHelpBlock" required>
          <div class="text-center">
            <button type="submit" class="btn btn-primary loginbtn">Login</button>
          </div>
          <div class="text-center py-3">
            <span class="sign__text"><a href="index.php">Back to Home?</a></span>
          </div>
        </form>
      </div>
    </div>
  </div> 
<?php
require_once 'footer.php';
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?php echo MULTIPATH;?>js/jquery-3.2.1.min.js"></script>
    <script src="../server/js/request.js"></script>
</body>



</html>


