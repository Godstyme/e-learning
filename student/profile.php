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
              <a href="profileprocess.php?id=<?php echo $id?>" class="btn btn-outline-primary">UPDATE</a>
            </td>
          </tr>
          </tbody>
          <?php  }}?>
        </table>
      </div>
    </div>
  </div>
</div>