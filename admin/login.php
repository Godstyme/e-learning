<?php
require_once '../includes/header.php';
?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <form action="" method="post" class="form" id="adminLogin">
          <h1>Log in to your account</h1>
    
          <label for="exampleInputEmail1" class="form-label">Email:</label>
          <input type="email" class="form-control forminput" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>


          <label for="inputPassword5" class="form-label">Password</label>
          <input type="password" id="inputPassword5" class="form-control forminput" name="password" aria-describedby="passwordHelpBlock" required>
          <button type="submit" class="btn btn-primary loginbtn">Login</button>
        </form>
      </div>
      </div>
    </div> 
<?php
require_once 'foot.php';
?>
  </div>
  
</section>

