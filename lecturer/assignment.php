<?php 
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>
<div class="container">
  <div class="row align-items-center" style="margin: 0 auto;">
    <div class="col-md-6 offset-md-3 text-dark">
      <div class="card card-body">
          <h4 class="card-title text-center">Set Assignment</h4>
          <form method="post" class="form-horizontal m-t-30" id="" action="">
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
                <select name="courseid" class="form-control form-control-line" required>
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
              <label for="exampleFormControlTextarea1" class="form-label">Question</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="assignment" require></textarea>
            </div>

              <div class="form-group mt-3 text-center">
                  <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Set Assignment</button>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>

<?php
  require_once '../server/classes/insertData.php';
  if (isset($_POST['btnAdd'])){
    $username = $_SESSION['id'];
    $coursetitle = $_POST['courseid'];
    $assignment = $_POST['assignment'];
    $date = date('d-m-Y');
    

    $insertData = new insertData;
    $insertResponse =  $insertData->assignment($username,$coursetitle,$assignment,$date);
    echo "<script>alert('Successful')</script>";
  }
?>