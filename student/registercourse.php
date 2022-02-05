<?php 
  require_once '../server/classes/fetchData.php';
  require_once '../server/classes/insertData.php';
  $insertData = new insertData;
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
    <p class="text-center text-bold">Register Courses</p><hr>
    <div class="text-center py-3">Please Register Your Courses For 100 Level First Semester</div>
      <div class="row">
          <div class="col col-lg-12 col-md-12">
              <div class="card">
                  <div class="card-body">
                    <p class="card-title text-center">Please ensure you choose your courses correctly as any wrong choice may not be easily reversed after registration.</p>
                  </div>
                  <div class="table-responsive" style="overflow-x:scroll;">
                      <form action="" method="POST">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">S/N</th>
                                  <th scope="col">Course Title</th>
                                  <th scope="col">Course Code</th>
                                  <th scope="col">Course Unit</th>
                                  <th scope="col">Select</th>
                                </tr>
                            </thead>
                            <?php
                              $fetchData = new fetchData;
                              $fetchResponse = $fetchData->displayAllCourses();
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
                                <td name="cos[]"><?php echo $row['coursecode']?></td>
                                <td name="cos[]"><?php echo $row['unit']?></td>
                                <td>
                                  <input type="checkbox" name="courses[]" id="checkbox" value="<?php echo $row['coursetitle'],$row['coursecode'],$row['unit']?>">
                                </td>
                              </tr>
                            </tbody>
                            <?php 
                              $count+=1;
                              }}}
                            ?>
                            <div class="text-end px-5 pb-3">
                              <button class="btn btn-primary" name="btnAdd">Register Course</button>
                          </div>
                        </table>
                        
                      </form>
                      
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

<?php
if (isset($_POST['btnAdd'])){
  $checkbox1 = $_POST['courses'];
    $chk=""; 
    foreach($checkbox1 as $chk1){  
      $chk.= $chk1;  
    }
  $insertResponse =  $insertData->registeredcourse($chk,$chk,$chk,$chk);
  if ($insertResponse['status']) {
  echo "<script>alert('Course allocation Successful')</script>";
  }
}
?>

<!-- https://www.aspsnippets.com/Articles/Get-selected-checked-CheckBox-Row-values-of-HTML-Table-using-jQuery.aspx -->
  <!-- https://www.phptutorial.net/php-tutorial/php-multiple-checkboxes/ -->
  <!-- https://stackoverflow.com/questions/4997252/get-post-from-multiple-checkboxes -->
  <!-- 82595 -->