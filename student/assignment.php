<div class="container">
  <div class="row align-items-center" style="margin: 0 auto;">
    <div class="col-md-6 offset-md-3 text-dark">
      <div class="card card-body">
          <h4 class="card-title text-center">Submit Assignment</h4>
          <form method="post" class="form-horizontal m-t-30" id="addLecturer">
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Course Title:</label>
              <input type="text" class="form-control" name="coursetitle" id="eampleInputName" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Course Code:</label>
              <input type="text" class="form-control" name="coursecode" id="jampleInputName" aria-describedby="nameHelp">
            </div>
            <div class="form-group">
                <label>Assignment</label>
                <input type="file" name="password" class="form-control">
            </div>

              <div class="form-group mt-3">
                  <button class="btn btn-primary submitbtn text-light btn-rounded waves-effect waves-light m-b-40" name="btnAdd" type="submit">Submit Assignment</button>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>