<?php 
  require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Resources</h1>
  <div class="row">
    <div class="col col-lg-6 col-md-12">
      <div class="card card-register mx-auto mt-5">
        <div class="card-body">
          <div class="table-responsive" style="overflow-x:scroll;">
              <form action="" method="POST">
                <table class="table table-hover">
                    <thead>
                        <tr>
                          <th scope="col">S/N</th>
                          <th scope="col">Course Title</th>
                          <th scope="col">Resources</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                      $fetchResponse = $fetchData->displayRes();
                      if(is_array($fetchResponse)){
                        if(isset($fetchResponse['status'])){
                            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                        }else {
                          $count = 1;
                          foreach($fetchResponse as $row){
                    ?>
                      <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td name="cos[]"><?php echo $row['course']?></td>
                        <td name="cos[]">
                          <img src="../upload/<?php echo $row['image']?>" alt=""  height="50" width="100" style="object-fit: cover;">
                          <br><a href="../upload/<?php echo $row['image']?>" download>Download</a>
                      </td>
                      </tr>
                      <?php 
                      $count+=1;
                      }}}
                    ?>
                    </tbody>
                    
                    
                </table>
                
              </form>
                          
          </div>
        </div>
      </div>
    </div>
    <div class="col col-lg-6 col-md-12">
      <div class="card card-register mx-auto mt-5">
        <div class="card-body">
          <div class="table-responsive" style="overflow-x:scroll;">
              <form action="" method="POST">
                <table class="table table-hover">
                    <thead>
                        <tr>
                          <th scope="col">S/N</th>
                          <th scope="col">Course Title</th>
                          <th scope="col">Resources</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                      $fetchResponse = $fetchData->displayMedia();
                      if(is_array($fetchResponse)){
                        if(isset($fetchResponse['status'])){
                            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                        }else {
                          $count = 1;
                          foreach($fetchResponse as $row){
                    ?>
                      <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td name="cos[]"><?php echo $row['course']?></td>
                        <td name="cos[]">
                          <video width="120" height="140" controls>
                            <source src="../upload/<?php echo $row['file']?>" type="video/mp4">
                          </video>
                          <br><a href="../upload/<?php echo $row['file']?>" download>Download</a>
                        </td>
                      </tr>
                      <?php 
                      $count+=1;
                      }}}
                    ?>
                    </tbody>
                    
                    
                </table>
                
              </form>
                          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	require_once 'footer.php';
?>
