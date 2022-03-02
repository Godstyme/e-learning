<?php 
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>
<div class="container">
  <div class="row align-items-center" style="margin: 0 auto;">
    <div class="col-md-10 offset-md-1 text-dark">
      <div class="card card-body">
          <h4 class="card-title text-center">List of students</h4>
          <div class="table-responsive" style="overflow-x:scroll;">
              <table class="table table-hover">
                  <thead>
                      <tr>
                      <th scope="col">S/N</th>
                          <th scope="col">Fullname</th>
                          <th scope="col">Email</th>
                      </tr>
                  </thead>
                  <?php
                    $fetchData = new fetchData;
                    $fetchResponse = $fetchData->displayStudents();
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
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['regnumber']?></td>
                      <td><?php echo $row['level']?></td>
                    </tr>
                  </tbody>
                  <?php 
                    $count+=1;
                    }}}
                  ?>
    
              </table>
          </div>
        </div>
    </div>
  </div>
</div>

