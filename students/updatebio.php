<?php
	require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $student = $_SESSION['email'];
  $fetchData = new fetchData;
  $fetchResponse = $fetchData->displayStudentProfile($student);
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 text-gray-800 text-center">Update Student</h1>
          <div class="row">
            
            <div class="col-lg-6 col-md-12 offset-lg-3">
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
                <!-- <div class="mb-3"> -->
                  <!-- <label for="exampleInputName" class="form-label">Id:</label> -->
                  <input type="text" class="form-control" id="exapleInputNme" name="id" value="<?php echo $id; ?>" aria-describedby="nameHelp" hidden>
                <!-- </div> -->
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>
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
        // header("refresh: 1; url = https://www.geeksforgeeks.org/");
    } 
?>