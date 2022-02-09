<?php 
require_once '../server/classes/fetchData.php';
$fetchData = new fetchData;
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
      <!-- <h2 class="text-center">List of added admin</h2> -->
      <hr>
      <div class="row">
      <div class="col col-lg-4 col-md-12 text-dark">
        <div class="card card-body">
            <h4 class="card-title text-center">Assign Course to Exam</h4>
            <form method="post" class="form-horizontal m-t-30" action="">
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
                <label class="form-label">Total Questions</label>
                <select name="totalque" class="form-control form-control-line" required>
                    <option value="5">5 Questions</option>
                    <option value="10">10 Questions</option>
                    <option value="15">15 Questions</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Mark for Correct Ans</label>
                <select name="markperitque" class="form-control form-control-line" required>
                    <option value="1">+1 Mark</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Mark for Wrong Ans</label>
                <select name="markperongque" class="form-control form-control-line" required>
                    <option value="1">-1 Mark</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Exam Date</label>
                <input type="datetime-local" class="form-control" name="examdate" id="exampleInputNam" aria-describedby="nameHelp"  required>
              </div>


                <div class="form-group mt-3 text-center">
                    <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Proceed</button>
                </div>
            </form>
          </div>
        </div>
        <div class="col col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"><p class="text-center">Exam Schedule Details</p></h4>
                </div>
                <div class="table-responsive" style="overflow-x:scroll;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                              <th scope="col">S/N</th>
                              <th scope="col">Course Name</th>
                              <th scope="col">Exam Date</th>
                              <th scope="col">Exam Duraton</th>
                              <th scope="col">Total Questions</th>
                              <th scope="col">Correct Answer Marks</th>
                              <th scope="col">Wrong Answer Marks</th>
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
                            <td><?php echo $row['examdate']?></td>
                            <td><?php echo $row['examduration'].' Minutes'?></td>
                            <td><?php echo $row['totalque']?></td>
                            <td><?php echo $row['markperitque']?></td>
                            <td><?php echo $row['markperongque']?></td>
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
  <script src="../server/js/request.js"></script>
<?php

require_once '../server/classes/updateData.php';
require_once 'ajax.php';

  if (isset($_POST['btnAdd'])) {
    $id = $_POST['examname'];
    $coursetitle = $_POST['coursetitle']; 
    $totalque = $_POST['totalque'];  
    $markperitque = $_POST['markperitque'];
    $markperongque = $_POST['markperongque'];
    $examdate = $_POST['examdate'];
    $updateResponse = $update->updateExam($id,$coursetitle,$totalque,$markperitque,$markperongque,$examdate);
    echo "<script>alert('Update Successfull  Thank You !!')</script>";
  } else {
      // echo '<h4 style="color:red;margin-top:150px;margin-bottom:150px;text-align:center">  There was an error Updating the Transaction Data  <br> Please go back and try again.</h4>';;
  }
?>



<!-- check later  -->
<!-- https://digitalwebplus.com/cbt-source-code/ -->
<!-- https://sourceforge.net/directory/os:windows/?q=cbt+exam+php -->