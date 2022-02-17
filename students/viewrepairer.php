<?php
	require_once 'header.php';
  require_once '../server/classes/fetchData.php';
  $fetchData = new fetchData;
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h2 class="h3 mb-4 text-gray-800">View Faults and its Solution</h2>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input type="text" id="searchInput" class="form-control bg-light border-2 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Shop Name</th>
                      <th>Street</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Specialty</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $fetchResponse = $fetchData->displayAllEngineers();
                        if(is_array($fetchResponse)){
                          if(isset($fetchResponse['status'])){
                              '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                          }else {
                            $count = 1;
                            foreach($fetchResponse as $row){
                      ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['phone']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['gender']?></td>
                      <td><?php echo $row['shopname']?></td>
                      <td><?php echo $row['street']?></td>
                      <td><?php echo $row['city']?></td>
                      <td><?php echo $row['state']?></td>
                      <td><?php echo $row['specialty']?></td>
                    </tr>
                    <?php 
                      $count+=1;
                    }}}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>

<?php
	require_once 'footer.php';
?>