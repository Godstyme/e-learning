<?php 
require_once '../server/classes/fetchData.php';
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
    <h2 class="text-center text-bold">Course Allocation</h2><hr>
      <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card card-body">
              <?php
                $fetchData = new fetchData;
                $fetchResponse = $fetchData->displayAllCourses();
                $fetchResponse1 = $fetchData->displayAllLecturer();
                // print_r($fetchResponse );
                if(is_array($fetchResponse)  || is_array($fetchResponse1)){
                  if(isset($fetchResponse['status']) || isset($fetchResponse1['status'])){
                      '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                  }else {
                    $count = 1;

              ?>
              <form method="post" class="form-horizontal m-t-30" id="allocateCourse" action="">
                <div class="mb-3">            
                  <label class="form-label">Select Course</label>
                  <select name="courseid" class="form-control form-control-line" required>
                    <?php  foreach($fetchResponse as $row){ ?>
                      <option value="<?php echo $row['id']?>"><?php echo $row['coursetitle'].' '.$row['coursecode']?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="form-group mb-3">            
                  <label class="form-label">Select Lecturer</label>
                  <select name="lecturerid" class="form-control form-control-line" required>
                    <?php  foreach($fetchResponse1 as $row){ ?>
                      <option value="<?php echo $row['id']?>"><?php echo $row['staffnumber']?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group mt-3">
                  <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Allocate Course</button>
                </div>
              </form>
              <?php 
                $count+=1;
                // }
              }}
              ?>
            </div>
          </div>
      </div>
    </div>
  </div>


<?php

require_once '../server/classes/insertData.php';
if (isset($_POST['btnAdd'])){
  $courseid = $_POST['courseid'];
  $lecturerid = $_POST['lecturerid'];
  

  $insertData = new insertData;
  $insertResponse =  $insertData->courseallocation($courseid, $lecturerid);
  echo "<script>alert('Course allocation Successful')</script>";
}
  // else {
  //   echo '<h1 style="color:red;text-align:center;"> Sorry The Operation Was Not Successful Please Try Again	</h1>';
  // }
?>