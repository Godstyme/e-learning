<?php 
  require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  require_once '../server/classes/insertData.php';
  $insertData = new insertData;
  $fetchData = new fetchData;
?>
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Register Courses</h1>
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Please Register Your Courses For 100 Level First Semester</div>
      <div class="card-body">
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
                  
                  <tbody>
                  <?php
                    $fetchResponse = $fetchData->displayAllCourses();
                    if(is_array($fetchResponse)){
                      if(isset($fetchResponse['status'])){
                          '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                      }else {
                        $count = 1;
                        foreach($fetchResponse as $row){
                        $crs = $row['id'].",".$row['coursetitle'].",".$row['coursecode'].",".$row['unit'];
                  ?>
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td name="cos[]"><?php echo $row['coursetitle']?></td>
                      <td name="cos[]"><?php echo $row['coursecode']?></td>
                      <td name="cos[]"><?php echo $row['unit']?></td>
                      <td>
                        <input type="checkbox" name="courses[]" id="checkbox" value="<?php echo $crs ?>">
                      </td>
                    </tr>
                    <?php 
                    $count+=1;
                    }}}
                  ?>
                  <tr>
                    <div><?php $msg; ?></div>
                    <div class="text-right px-5 pb-3">
                      <button class="btn btn-primary" name="btnAdd">Register Course</button>
                    </div>
                  </tr>
                  </tbody>
                  
                  
              </table>
              
            </form>
                        
        </div>
      </div>

      <div>
        <?php
            if (isset($_POST['btnAdd'])){
              $all_courses = $_POST['courses'];
              $username = $_SESSION['email'];

                $error="These courses could not be registered:\n";
                // $msg = "Course Registration Successful";
                $has_error = FALSE;

                foreach($all_courses as $course){
                  $course_info = explode(",",$course);
                  $courseid = $course_info[0];
                  $coursetitle = $course_info[1];
                  $coursecode = $course_info[2];
                  $unit = $course_info[3];

                  $insertResponse =  $insertData->registeredcourse($username,$courseid,$coursetitle,$coursecode,$unit);
                  // var_dump($insertResponse);
                    if (!$insertResponse['status']) {
                        $error .= $coursecode." Error Message: ".$insertResponse['message']."\n";
                        $has_error = TRUE;
                    }
                }
              if ($has_error) {
                echo "<script>alert('$error')</script>";
              }else {
                  echo "<h2 class='text-success text-center'>Course Registration Successful</h2>";
                }
            }
        ?>
      </div>
  </div>
</div>
<?php
	require_once 'footer.php';
?>
