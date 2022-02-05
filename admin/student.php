<?php 
require_once '../server/classes/fetchData.php';
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
      <h2 class="text-center">Register Students</h2><hr>
      <div class="row">
          <div class="col col-lg-4 col-md-12">
              <div class="card card-body">
                  <h4 class="card-title text-center">Add Students</h4>
                  <form method="post" class="form-horizontal m-t-30" id="addStudent">
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Full Name:</label>
                      <input type="text" class="form-control" id="exapleInputNme" aria-describedby="nameHelp" name="fname">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Email:</label>
                      <input type="email" class="form-control" id="examplInputName" name="email" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Reg Number:</label>
                      <input type="text" class="form-control" id="exampleIputName" aria-describedby="nameHelp" name="regnumber">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Faculty:</label>
                      <input type="text" class="form-control" id="examplInptName" aria-describedby="nameHelp" name="faculty">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Department:</label>
                      <input type="text" class="form-control" id="eampleInputNme" aria-describedby="nameHelp" name="dept">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"  class="form-control" placeholder="Enter your password" name="password">
                    </div>
  
                      <div class="form-group mt-3">
                          <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Add Student</button>
                      </div>
                  </form>
              </div>
          </div>
          <div class="col col-lg-8 col-md-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title text-center">Students List</h4>
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th scope="col">S/N</th>
                                  <th scope="col">Fullname</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Reg Number</th>
                                  <th scope="col">Faculty</th>
                                  <th scope="col">Department</th>
                                  <th scope="col">Delete</th>
                              </tr>
                          </thead>
                          <?php
                            $fetchData = new fetchData;
                            $fetchResponse = $fetchData->displayAllStudents();
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
                              <td><?php echo $row['name']?></td>
                              <td><?php echo $row['email']?></td>
                              <td><?php echo $row['regnumber']?></td>
                              <td><?php echo $row['faculty']?></td>
                              <td><?php echo $row['dept']?></td>
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