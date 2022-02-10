<?php 
require_once '../server/classes/fetchData.php';
$fetchData = new fetchData;
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
    <p class="text-center text-bold">Registered Courses</p><hr>
    <div class="text-center py-3">Here is the break down of all courses you registered for 100 Level First Semester.</div>
      <div class="row">
        <div class="col col-lg-12 col-md-12 mb-5">
              <div class="card">
                  <div class="card-body">
                  </div>
                  <div style="overflow-x:scroll;">
                    <?php
                      $fetchResponse = $fetchData->displayStudent();
                      // var_dump($fetchResponse);
                      if(is_array($fetchResponse)){
                        if(isset($fetchResponse['status'])){
                            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                        }else {
                          $count = 1;
                          foreach($fetchResponse as $row){
                    ?>
                    <h3 class="px-2">Student's Personal Details</h3>
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                <th scope="col">Full Name</th>
                                <td scope="col"><?php echo $row['name']?></td>
                              </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="col">Level</th>
                              <td scope="col">100</td>
                            </tr>
                            <tr>
                              <th scope="col">Semester</th>
                              <td scope="col">Second Semester</td>
                            </tr>
                          </tbody>		        
                      </table>
                      <?php } }}?>
                  </div>
              </div>
          </div>
          <div class="col col-lg-12 col-md-12">
              <div class="card">
                  <div class="card-body">
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                  <div class="px-2">Registered Courses</div>
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Course Title</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Course Unit</th>
                              </tr>
                          </thead>
                          <?php
                            $email = $_SESSION['email'];
                            $fetchResponse = $fetchData->displayPersonalRegisterCos($email);
                            if(is_array($fetchResponse)){
                              if(isset($fetchResponse['status'])){
                                  '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                              }else {
                                $count = 1;
                                $totalCos = 0;
                                foreach($fetchResponse as $row){

                          ?>
                          <tbody>
                            <tr>
                              <th scope="row"><?php echo $count; ?></th>
                              <td><?php echo $row['coursetitle'];?></td>
                              <td><?php echo $row['coursecode'];?></td>
                              <td><?php echo $row['unit']?></td>
                            </tr>
                          </tbody>
                          <?php 
                            $totalCos += $row['unit'];
                            $count+=1;
                            }}}
                          ?>
                          <tr>
                            <!-- <td scope="col">Total Courses</td> -->
                            <td><strong>Total Units: </strong> &nbsp;<label for=""><?php 
                             echo $totalCos;
                            ?></label></td>
                          </tr>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>