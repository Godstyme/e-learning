<?php
	require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $student = $_SESSION['email'];
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 text-center">STUDENT PERSONAL INFORMATION</h1>
          <div class="offset-md-3">
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
                <tr>
                  <td colspan="2" class="text-center pt-4">
                    <a  href="updatebio.php?id=<?php echo $id?>" class="btn btn-outline-primary w-25">EDIT</a>
                  </td>
                </tr>
              </tbody>
              <?php  }}?>
            </table>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>