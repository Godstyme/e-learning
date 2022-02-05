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
    
    input[type=radio],
    input.radio {
      float: left;
      clear: none;
      margin: 2px 0 0 2px;
    }
</style>
<div class="mt-4 pb-3">
    <div class="container wrap pb-3 text-dark">
      <div class="text-center">
        <h3>Take Quiz</h3>
        <h4>Answer Correctly the Questions</h4>
        <p>Please ensure you choose your answers correctly as any wrong choice can not be reversed after Submission.</p>
      </div>
    <hr>
      <div class="row">
        <div class="col col-lg-12 col-md-12">
        <fieldset>
      <div class="some-class">
        <input type="radio" class="radio" name="x" value="y" id="y" />
        <label for="y">Thing 1</label>
        <input type="radio" class="radio" name="x" value="z" id="z" />
        <label for="z">Thing 2</label>
      </div>
    </fieldset>
            
        </div>
    </div>
  </div>
</div>