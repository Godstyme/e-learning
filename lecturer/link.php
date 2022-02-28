<?php 
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>
<div class="container">
  <div class="row align-items-center" style="margin: 0 auto;">
    <div class="col-md-6 offset-md-3 text-dark">
      <div class="card card-body">
          <h4 class="card-title text-center">Set Live Link Class</h4>
          <form method="post" class="form-horizontal m-t-30" id="addLecturer">
            <div class="mb-3">        
              <?php
                  $fetchResponse = $fetchData->displayAllocateCouseToLecturer();
                  if(is_array($fetchResponse) ){
                    if(isset($fetchResponse['status'])){
                      var_dump($fetchResponse);
                        '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                    }else {
                      $count = 1;

                ?>    
                <label class="form-label">Select Course</label>
                <select name="courseTitle" class="form-control form-control-line" required>
                  <?php  foreach($fetchResponse as $row){ ?>
                    <option value="<?php echo $row['coursetitle']?>"><?php echo $row['coursetitle']?></option>
                    <?php }?>
                </select>
                <?php 
                  $count+=1;
                  // }
                }}?>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Link</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="link"></textarea>
            </div>

              <div class="form-group mt-3 text-center">
                  <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Set Link</button>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>


<?php

require_once '../server/classes/insertData.php';
$insertData = new insertData;

  if (isset($_POST['btnAdd'])) {
    $username = $_SESSION['email'];
    $course = $_POST['courseTitle']; 
    $link = $_POST['link'];  
    $insertResponse =  $insertData->setLiveClass($username,$course,$link);
    echo "<script>alert('Insert Successfull  Thank You !!')</script>";
  } else {
      // echo '<h4 style="color:red;margin-top:150px;margin-bottom:150px;text-align:center">  There was an error Updating the Transaction Data  <br> Please go back and try again.</h4>';;
  }
?>