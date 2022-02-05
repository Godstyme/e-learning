<?php 
require_once '../server/classes/fetchData.php';
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
    <p class="text-center text-bold">Upload Courses</p><hr>
      <div class="row">
          <div class="col col-lg-4 col-md-12">
            <div class="card card-body">
                  <p class="card-title text-center">Add Courses</p>
                  <form method="post" class="form-horizontal m-t-30" id="addCourse">
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Course Title:</label>
                      <input type="text" class="form-control" id="exampleInputNam" aria-describedby="nameHelp" name="ctitle" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Course Code:</label>
                      <input type="text" class="form-control" id="exampleInputNae" aria-describedby="nameHelp" name="ccode" required>
                    </div>
                  
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Course Unit:</label>
                      <input type="text" class="form-control" id="exampleInptName" aria-describedby="nameHelp" name="cunit" required>
                    </div>
                    <div class="form-group mt-3">
                      <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Upload Course</button>
                    </div>
                  </form>
              </div>
            </div>
          <div class="col col-lg-8 col-md-12">
              <div class="card">
                  <div class="card-body">
                    <p class="card-title text-center">List of Available Courses</p>
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Course Title</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Course Unit</th>
                                <th scope="col">Delete</th>
                              </tr>
                          </thead>
                          <?php
                            $fetchData = new fetchData;
                            $fetchResponse = $fetchData->displayAllCourses();
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
                              <td><?php echo $row['coursetitle']?></td>
                              <td><?php echo $row['coursecode']?></td>
                              <td><?php echo $row['unit']?></td>
                              <td><a href="" class="btn btn-danger ti-trash" style="color:#F2F2F2">Remove</a></td>
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