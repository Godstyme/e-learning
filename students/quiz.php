<?php
	require_once 'header.php';
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
                        <th scope="col">Total Questions</th>
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Wrong Answer</th>
                        <th scope="col">Total Marks</th>
                        <th scope="col">Time Limit</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td name="cos[]">Intro to DB</td>
                      <td name="cos[]">3</td>
                      <td name="cos[]">+1</td>
                      <td name="cos[]">-1</td>
                      <td name="cos[]">3</td>
                      <td name="cos[]">10 Mins</td>
                      <td>
                        <a  href="updatebio.php?id=<?php echo $id?>" class="btn btn-success text-light btn-rounded waves-effect waves-light">Start</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td name="cos[]">Intro to DB</td>
                      <td name="cos[]">3</td>
                      <td name="cos[]">+1</td>
                      <td name="cos[]">-1</td>
                      <td name="cos[]">3</td>
                      <td name="cos[]">10 Mins</td>
                      <td>
                        <button class="btn btn-success text-light btn-rounded waves-effect waves-light" name="btnAdd" type="submit">Start</button>
                      </td>
                    </tr>
                  </tbody>
                  
                  
              </table>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
	require_once 'footer.php';
?>