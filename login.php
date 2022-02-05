<?php
require_once 'includes/header.php';
?>
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6 offset-md-2">
        <form action="/my-handling-form-page" method="post" class="form" id="slogin">
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
require_once 'includes/footer.php';
?>
</div>

