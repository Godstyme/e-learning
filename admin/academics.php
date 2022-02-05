<?php 
require_once '../server/classes/fetchData.php';
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
    <h2 class="text-center text-bold">Set Academic Session</h2><hr>
      <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card card-body">
              <form method="post" class="form-horizontal m-t-30" id="allocateCourse" action="">
                <div class="mb-3">            
                  <input type="text" class="form-control" name="academics" id="exampleInputNam" aria-describedby="nameHelp" placeholder="Enter 2020/2021" required>
                </div>
                
                <div class="form-group mt-3">
                  <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Set Academic Session</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>


<?php
require_once '../server/classes/insertData.php';
$date = date('d-m-Y');
if (isset($_POST['btnAdd'])){
  $batch = $_POST['academics'];
  $insertData = new insertData;
  $insertResponse =  $insertData->setAcademicSession($batch,$date);
  echo "<script>alert('Academic session created Successfully')</script>";
}
?>