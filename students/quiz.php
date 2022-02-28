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
                        <th scope="col">Name</th>
                        <!-- <th scope="col">Total Questions</th> -->
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Wrong Answer</th>
                        <!-- <th scope="col">Total Marks</th> -->
                        <!-- <th scope="col">Time Limit</th> -->
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <?php
                  $fetchResponse = $fetchData->displayQuiz();
                  // var_dump($fetchResponse);
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
                      <td name="cos[]"><?php echo $row['coursetitle'];?></td>
                      <td name="cos[]"><?php echo "+ ".$row['markperitque'];?></td>
                      <td name="cos[]"><?php echo "- ". $row['markperongque'];?></td>
                      <!-- <form action="" method="post"> -->
                        <td>
                          <a href="cbt.php?id=<?php echo $row['id']?>" class="btn btn-success text-light btn-rounded waves-effect waves-light">Start</a>
                          <!-- <button type="submit" href="cbt.php?id=<?php echo $row['id']?>"  class="btn btn-success text-light btn-rounded waves-effect waves-light" name="btnAdd"> stat</button> -->
                        </td>
                      <!-- </form> -->
                    </tr>
                  </tbody>
                  <?php $count+=1; } }}?>
                  
              </table>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>

<?php
  require_once '../server/classes/insertData.php';
  if (isset($_POST['btnAdd'])){
    $username = $_SESSION['email'];
    $examid = $row['id'];
    

    $insertData = new insertData;
    $insertResponse =  $insertData->setInsertExamUserDetail($username,$examid);
    
    // var_dump($insertResponse);
    echo "<script>window.location = 'cbt.php'</script>";
  }
?>



<!-- <a class="text-light" href="cbt.php?id=<?php echo $row['id']?>">Start</a>  -->