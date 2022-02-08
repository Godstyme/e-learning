<?php 
require_once '../server/classes/fetchData.php';
$fetchData = new fetchData;
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
      <!-- <h2 class="text-center">List of added admin</h2> -->
      <hr>
      <div class="row">
          <div class="col col-lg-4 col-md-12">
            <div class="card card-body">
                <p class="card-title text-center">Add Exams</p>
                <form method="post" class="form-horizontal m-t-30" id="" action="">
                  <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Exam Name:</label>
                    <input type="text" class="form-control" name="fullname" id="exampleInputNam" aria-describedby="nameHelp"  required>
                  </div>
                  <div class="mb-3">
                  <?php
                    $fetchResponse = $fetchData->displayAllAcademicSession();
                    // print_r($fetchResponse );
                    if(is_array($fetchResponse)){
                      if(isset($fetchResponse['status'])){
                          '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                      }else {
                        $count = 1;

                  ?>
                  <div class="form-group mb-3">            
                    <label class="form-label">Select Batch</label>
                    <select name="batch" class="form-control form-control-line" required>
                      <?php  foreach($fetchResponse as $row){ ?>
                        <option value="<?php echo $row['batch']?>"><?php echo $row['batch']?></option>
                        <?php }}}?>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Select Duration</label>
                    <select name="duration" class="form-control form-control-line" required>
                        <option value="10">10 Minutes</option>
                        <option value="20">20 Minutes</option>
                        <option value="30">30 Minutes</option>
                        <option value="40">40 Minutes</option>
                        <option value="50">50 Minutes</option>
                        <option value="60">One Hour</option>
                    </select>
                  </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Add Exam</button>
                    </div>
                </form>
              </div>
            </div>
          <div class="col col-lg-8 col-md-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title text-center"><p class="text-center">List of added Exams</p></h4>
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Batch Name</th>
                                <th scope="col">Exam Duraton</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <?php
                            $fetchData = new fetchData;
                            $fetchResponse = $fetchData->displayAddExam();
                            if(is_array($fetchResponse)){
                              if(isset($fetchResponse['status'])){
                                  '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                              }else {
                                $count = 1;
                                foreach($fetchResponse as $row){

                          ?>
                          <tbody>
                            <tr>
                              <th scope="row"><?php echo $count; ?></th>                              
                              <th><?php echo $row['examname'] ?></th>
                              <td><?php echo $row['batchid']?></td>
                              <td><?php echo $row['examduration'].' Minutes'?></td>
                              <td><a href="" class="btn btn-danger ti-trash" style="color:#F2F2F2"><?php echo $row['examstatus']?></a></td>
                              <td><?php echo $row['datecreated']?></td>
                              <td><a href="" class="btn btn-danger ti-trash" style="color:#F2F2F2">Edit</a></td>
                            </tr>
                          </tbody>
                          <?php 
                            $count+=1;
                            }}}
                          ?>
		        
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>


<?php
  require_once '../server/classes/insertData.php';
  if (isset($_POST['btnAdd'])){
    $username = $_SESSION['id'];
    $fullname = $_POST['fullname'];
    $batch = $_POST['batch'];
    $duration = $_POST['duration'];
    $date = date('d-m-Y');
    $status = "pending";
    

    $insertData = new insertData;
    $insertResponse =  $insertData->setExam($username,$fullname,$batch,$duration,$date,$status);
    echo "<script>alert('Successful')</script>";
  }
?>