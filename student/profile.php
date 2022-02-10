<?php
require_once '../server/classes/fetchData.php';
$student = $_SESSION['email'];
?>
<div class="container" style="width:50%;">
  <div class="row">
    <h2>
      <!-- <?php echo "<strong class='text-light text-center'>". $student ." Bio Data</strong>";?> -->
    </h2>
    <div class="text-dark">
      <h3 class="text-center">STUDENT PERSONAL INFORMATION</h3>
      <div style="display: flex;
justify-content: center;">
        <table class="table text-dark w-75">
        <?php
            $fetchData = new fetchData;
            $fetchResponse = $fetchData->displayStudentProfile($student);
            
            if(is_array($fetchResponse)){
                if(isset($fetchResponse['status'])){
                  // print_r($fetchResponse);
                  $status = $fetchResponse['status'];
                  $data = $fetchResponse['data'][0];
                  $id = $data['id'];
                  $name = $data['name'];
                  $email = $data['email'];
                  $regnumber = $data['regnumber'];
                  $jambid = $data['jambid'];
                  $level = $data['level'];                  
                  $faculty = $data['faculty']; 
                  $dept = $data['dept']; 
                  $phone = $data['phone']; 
          ?>
          <tbody>
            <tr class="text-start">
              <td>Name</td>
              <td><?php echo $name; ?></td>
            </tr>
            <tr class="text-start">
              <td>Email</td>
              <td><?php echo $email; ?></td>
            </tr>
            <tr class="text-start">
              <td>Ebsu Reg Number</td>
              <td><?php echo $regnumber; ?></td>
            </tr>
            <tr class="text-start">
              <td>Jamb Number</td>
              <td><?php echo $jambid; ?></td>
            </tr>
            <tr class="text-start">
              <td>Phone</td>
              <td><?php echo $phone; ?></td>
            </tr>
            <tr class="text-start">
              <td>Faculty</td>
              <td><?php echo $faculty; ?></td>
            </tr>
            <tr class="text-start">
              <td>Dept</td>
              <td><?php echo $dept; ?></td>
            </tr>
            <tr class="text-start">
              <td>Level</td>
              <td><?php echo $level; ?></td>
            </tr>
            <tr class="text-end">
            <td>
              <a data-bs-toggle="modal" data-bs-target="#signUp" href="index.php?a=profile&b=student?id=<?php echo $id?>" class="btn btn-outline-primary">EDIT</a>
            </td>
          </tr>
          </tbody>
          <?php  }}?>
        </table>
      </div>
    </div>
  </div>
</div>


<?php
require_once '../server/classes/fetchData.php';
$fetchData = new fetchData;
$fetchResponse = $fetchData->displayStudentProfile($student);
?>
<div class="modal fade" id="signUp">

    <div class="modal-dialog modal-md text-dark" role="document">

      <div class="modal-content">

        <!-- modal header -->
        <div class="modal-header">
          <h3 class="modal-title">Update Student</h3>
          <button type="button" class="close text-danger" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- modal header end here-->

        <!-- modal body -->
        <div class="modal-body">
          <div class="row">
            
            <div class="col-lg-12 col-md-12">
              <?php

                if(is_array($fetchResponse)){
                  if(isset($fetchResponse['status'])){
                    // print_r($fetchResponse);
                    $status = $fetchResponse['status'];
                    $data = $fetchResponse['data'][0];
                    $id = $data['id'];
                    $name = $data['name'];
                    $email = $data['email'];
                    $regnumber = $data['regnumber'];
                    $jambid = $data['jambid'];
                    $level = $data['level'];                  
                    $faculty = $data['faculty']; 
                    $dept = $data['dept']; 
                    $phone = $data['phone']; 

                ?>
              <form method="post" class="form-horizontal m-t-30" action="">
                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">Id:</label>
                  <input type="text" class="form-control" id="exapleInputNme" name="id" value="<?php echo $id; ?>" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">Faculty:</label>
                  <input type="text" class="form-control" id="examplInptName"  aria-describedby="nameHelp" name="faculty" value="<?php echo $faculty; ?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">Jamb No:</label>
                  <input type="text" class="form-control" id="examplInptName"  aria-describedby="nameHelp" name="jambid" value="<?php echo $jambid; ?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">Department:</label>
                  <input type="text" class="form-control" id="eampleInputNme" value="<?php echo $dept; ?>" aria-describedby="nameHelp" name="dept">
                </div>
                <div class="form-group mb-3">
                    <label>Phone</label>
                    <input type="text"  class="form-control" value="<?php echo $phone; ?>" name="phone">
                </div>
                <div class="form-group mb-3">            
                  <label>Select Level</label>
                  <select name="level" class="form-control form-control-line" required>
                    <option value="">Select your level</option>
                    <option value="100">Year One</option>
                    <option value="200">Year Two</option>
                    <option value="300">Year Three</option>
                    <option value="400">Year Four</option>
                  </select>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40 w-50" name="submit" type="submit">Update</button>
                </div>
              </form>
              <?php  }}?>
              <!-- form for registration end here -->
            </div>

          </div>
        </div>
        <!-- modal body end here -->
      </div>
    </div>
  </div>

<?php
  require_once '../server/classes/updateData.php';
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $faculty = $_POST['faculty'];
        $dept = $_POST['dept'];
        $jambid = $_POST['jambid'];
        $phone = $_POST['phone'];
        $level = $_POST['level'];
        $updateResponse = $update->updateProfile($id,$faculty,$jambid,$dept,$phone,$level);
        echo "<script > alert('Update Successfull, Thank You !!.')</script>";
        header("refresh: 1; url = https://www.geeksforgeeks.org/");
    } 
?>