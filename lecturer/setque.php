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
                <p class="card-title text-center">Set Exam Question</p>
                <form method="post" class="form-horizontal m-t-30" id="" action="">
                  <div class="form-group">        
                    <?php
                      $fetchResponse = $fetchData->displayAddExam();
                      if(is_array($fetchResponse) ){
                        if(isset($fetchResponse['status'])){
                            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                        }else {
                          $count = 1;

                    ?>    
                    <label class="form-label">Exam Name</label>
                    <select name="examname" class="form-control form-control-line"  id="examnam" required>
                      <?php  foreach($fetchResponse as $row){ ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['batchid'].' &nbsp; '.$row['examname'].' Exam'?></option>
                        <?php }?>
                    </select>
                    <?php 
                      $count+=1;
                      // }
                    }}?>
                </div>
                <div class="form-group">        
                  <?php
                      $fetchResponse = $fetchData->displayAllocateCouseToLecturer();
                      if(is_array($fetchResponse) ){
                        if(isset($fetchResponse['status'])){
                          // var_dump($fetchResponse);
                            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                        }else {
                          $count = 1;

                    ?>    
                    <label class="form-label">Select Course</label>
                    <select name="coursetitle" class="form-control form-control-line" required>
                      <?php  foreach($fetchResponse as $row){ ?>
                        <option value="<?php echo $row['coursetitle']?>"><?php echo $row['coursetitle']?></option>
                        <?php }?>
                    </select>
                    <?php 
                      $count+=1;
                      // }
                    }}?>
                </div>
                <div class="form-group">
                    <label for="exampleInputName" class="form-label">Question:</label>
                    <input type="text" class="form-control" name="fullname" id="exampleInputNam" aria-describedby="nameHelp"  required>
                </div>
                <div class="form-group">
                  <label for="exampleInputName" class="form-label">Option One:</label>
                  <input type="text" class="form-control" name="1" id="exampleInputNam" aria-describedby="nameHelp"  required>
                </div>
                <div class="form-group">
                  <label for="exampleInputName" class="form-label">Option Two:</label>
                  <input type="text" class="form-control" name="2" id="exampleInputNam" aria-describedby="nameHelp"  required>
                </div>
                <div class="form-group">
                  <label for="exampleInputName" class="form-label">Option Three:</label>
                  <input type="text" class="form-control" name="3" id="exampleInputNam" aria-describedby="nameHelp"  required>
                </div>
                <div class="form-group">
                  <label for="exampleInputName" class="form-label">Option Four:</label>
                  <input type="text" class="form-control" name="4" id="exampleInputNam" aria-describedby="nameHelp"  required>
                </div>
                <div class="form-group">
                  <label class="form-label">Select Answer</label>
                  <select name="duration" class="form-control form-control-line" required>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                      <option value="4">Option 4</option>
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
                      <h4 class="card-title text-center"><p class="text-center">List of added Questions</p></h4>
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Exam Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Question</th>
                                <th scope="col">Option One</th>
                                <th scope="col">Option Two</th>
                                <th scope="col">Option Three</th>
                                <th scope="col">Option Four</th>
                                <th scope="col">Option Answer</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>                              
                              <th>Winter</th>
                              <td>Database Management</td>
                              <td>What is database</td>
                              <td>Fasting</td>
                              <td>Porgramming</td>
                              <td>Coding</td>
                              <td>Storage</td>
                              <td>Storage</td>
                            </tr>
                          </tbody>
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