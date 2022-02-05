<?php 
require_once '../server/classes/fetchData.php';
?>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
    <p class="text-center text-bold">Please select the Level/Session and Semester you want to register the courses</p><hr>
      <div class="row">
          <div class="col col-lg-12 col-md-12">
            <div class="card card-body">
                  <form method="post" class="form-horizontal m-t-30" id="addCourse" action="" post="registercourse.php">
                    <div class="mb-3">            
                      <label>Select Level</label>
                      <select name="level" class="form-control form-control-line" required>
                        <option value="Year One">Year One</option>
                        <option value="Year Two">Year Two</option>
                        <option value="Year Three">Year Three</option>
                        <option value="Year Four">Year Four</option>
                      </select>
                  </div>
                  <div class="form-group mb-3">            
                    <label>Select Semester</label>
                    <select name="semester" class="form-control form-control-line" required>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                    </select>
                  </div>
                  <div class="form-group mt-3">
                    <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Proceed</button>
                  </div>
                  </form>
              </div>
            </div>
      </div>
    </div>
  </div>