<?php
require_once 'header.php';
require_once '../server/classes/fetchData.php';
$student = $_SESSION['email'];
?>
<div class="col col-lg-4 col-md-12">
    <div class="card card-body">
      <h4 class="card-title text-center">Update Students</h4>
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
        <form method="post" class="form-horizontal m-t-30" action="editProcess.php">
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Id:</label>
            <input type="text" class="form-control" id="exapleInputNme" name="id" value="<?php echo $id; ?>" aria-describedby="nameHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Faculty:</label>
            <input type="text" class="form-control" id="examplInptName"  aria-describedby="nameHelp" name="faculty" value="<?php echo $faculty; ?>">
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
              <option value="<?php echo $level; ?>">Year One</option>
              <option value="<?php echo $level; ?>">Year Two</option>
              <option value="<?php echo $level; ?>">Year Three</option>
              <option value="<?php echo $level; ?>">Year Four</option>
            </select>
          </div>
          <div class="form-group mt-3">
              <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40 w-50" name="submit" type="submit">Update</button>
          </div>
        </form>
        <?php  }}?>
    </div>
  </div>