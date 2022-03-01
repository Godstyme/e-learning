<?php 
  require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Live class link</h1>
  <div class="card card-register mx-auto mt-5">
      <div class="card-body">
        <div class="table-responsive" style="overflow-x:scroll;">
            <form action="" method="POST">
              <table class="table table-hover">
                  <thead>
                      <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Link</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                    $fetchResponse = $fetchData->displayLiveLink();
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
                      <td name="cos[]"> <a href="www.googlemeet?id=<?php echo $row['link']?>"><?php echo $row['link']?></a> </td>
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
<?php
	require_once 'footer.php';
?>
