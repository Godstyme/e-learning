<?php
	require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $id = $_GET['id'];
  $fetchData = new fetchData;
  $fetchResponse = $fetchData->displayQuestion($id);
  
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="text-center">
            <h3>Take Exam</h3>
            <h4>Answer Correctly the Questions</h4>
            <p>Please ensure you choose your answers correctly as any wrong choice can not be reversed after Submission.</p>
          </div>
          <div class="col-lg-8 offset-lg-2 mt-4">
            <?php
              if(is_array($fetchResponse)){
                if(isset($fetchResponse['status'])){
                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                }else {
                    foreach($fetchResponse as $row){
                      // var_dump($fetchResponse);
            ?>
            <form action="" method="post">
              <div class="mb-3 px-3 py-2 Regular shadow rounded border border-dark" style="background: #fff;">
                <p style="font-weight: bolder;font-size:larger;">
                  1.&nbsp;&nbsp;<?php echo $row['questiontitle'];?>
                </p>
                <div class="form-check px-1">
                    <div class="bg-light rounded py-2 my-2 pl-2">
                      <label class="form-check-label normal-label">
                        <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $row['option1'];?>
                      </label>
                    </div>
                    <div class="bg-light rounded py-2 my-2 pl-2">
                      <label class="form-check-label normal-label">
                        <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $row['option2'];?>
                      </label>
                    </div>
                    <div class="bg-light rounded py-2 my-2 pl-2">
                      <label class="form-check-label normal-label">
                        <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $row['option3'];?>
                      </label>
                    </div>
                    <div class="bg-light rounded py-2 my-2 pl-2">
                      <label class="form-check-label normal-label">
                        <input type="radio" class="mr-3" id="id_form-0-user_answer input" value="2" name="radAnswer"><?php echo $row['option4'];?>
                      </label>
                    </div>    
                </div>
              </div>
              <div class="row pt-3">
                <div class="col-lg-6">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination ">
                      <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <div class="col-lg-6 text-right">
                  <button class="btn btn-success text-light btn-rounded waves-effect waves-light" name="btnAdd" type="submit">Submit</button>
                </div>
              </div>
            </form>  
            <?php }}} ?>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>
<!-- https://www.daniweb.com/programming/web-development/threads/508092/pagination-with-while-loop -->