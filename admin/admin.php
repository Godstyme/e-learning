<?php 
require_once '../server/classes/fetchData.php';
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
      <!-- <h2 class="text-center">List of added admin</h2> -->
      <hr>
      <div class="row">
          <div class="col col-lg-4 col-md-12">
            <div class="card card-body">
                <p class="card-title text-center">Add Admin</p>
                <form method="post" class="form-horizontal m-t-30" id="addAdmin">
                  <div class="form-group mb-3">
                    <label for="exampleInputName" class="form-label">Full Name:</label>
                    <input type="text" class="form-control" name="fullname" id="exampleInputNam" aria-describedby="nameHelp"  required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="exampleInputName" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="exampleInputame" aria-describedby="nameHelp" required>
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                  </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Add Admin</button>
                    </div>
                </form>
              </div>
            </div>
          <div class="col col-lg-8 col-md-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title text-center"><p class="text-center">List of added admin</p></h4>
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                              <th scope="col">S/N</th>
                                  <th scope="col">Fullname</th>
                                  <th scope="col">Email</th>
                              </tr>
                          </thead>
                          <?php
                            $fetchData = new fetchData;
                            $fetchResponse = $fetchData->displayAllAdmin();
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
                              <td><?php echo $row['username']?></td>
                              <td><a href="index.php?a=admin&b=add&id=<?php echo $row['id']?>" class="btn btn-danger ti-trash" style="color:#F2F2F2">Remove</a></td>
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
    require_once '../server/classes/deleteData.php';

    $id = $_GET['id'];
    $delete= new delete;
    $deleteResponse = $delete->deleteAdmin($id);
    echo "<script>console.log('The Record Was Deleted Successful')</script>";
?>