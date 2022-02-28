<?php
	require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div>
          <table class="table table-hover">
                  <thead>
                      <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Course</th>
                        <th scope="col">Questions</th>
                        <!-- <th scope="col">Action</th> -->
                      </tr>
                  </thead>
                  <?php 
                      $fetchResponse = $fetchData->displayAssignmentToStudent();
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
                      <td name="cos[]"><?php echo $row['coursetitle']?></td>
                      <td name="cos[]"><?php echo $row['assignment']?></td>
                      <!-- <td>
                        <a  href="" class="btn btn-success text-light btn-rounded waves-effect waves-light">Start</a>
                      </td> -->
                    </tr>
                  </tbody>
                  
                  <?php 
                      $count+=1;
                    }}}?>
                  
              </table>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>