<?php 
require_once '../server/classes/fetchData.php';
?>

<style>
  fieldset {
      overflow: hidden
    }
    
    .some-class {
      float: left;
      clear: none;
    }
    
    label {
      float: left;
      clear: none;
      display: block;
      padding: 0px 1em 0px 8px;
    }
  
</style>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
      <div class="text-center">
        <h3>Take Exam</h3>
        <h4>Answer Correctly the Questions</h4>
        <p>Please ensure you choose your answers correctly as any wrong choice can not be reversed after Submission.</p>
      </div>
      
    <hr>
      <div class="row">
        <div class="col col-lg-12 col-md-12">
          <form action="" method="post">
            <div class="mb-3" style="background: #F8F9FA;">
              <p>
                1.&nbsp;&nbsp;What is Computer?
              </p>
              <div class="form-check">
                <label class="form-check-label normal-label">
                  <input type="radio" class="" name=""id="id_form-0-user_answer" value="2">An eatery
                  <input type=radio name=group value=1>hh
                </label>
              </div>
            </div>
            <div class="mb-3" style="background: #F8F9FA;">
              <p>
                1.&nbsp;&nbsp;What is Computer?
              </p>
              <div class="form-check">
                <label class="form-check-label normal-label">
                  <input type="radio" class="" name=""id="id_form-0-user_answer" value="2">An eatery
                  <input type="radio" name="imgsel" value="" checked>
                </label>
              </div>
            </div>
          </form>  
        </div>
    </div>
  </div>
</div>