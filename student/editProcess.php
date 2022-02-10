<?php
// require_once 'header.php';
// require_once '../server/classes/updateData.php';
// $student = $_SESSION['email'];
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Update</a>
        </li>
        <li class="breadcrumb-item active">Update Record</li>
      </ol>
      <div>
    <?php
      if (isset($_POST['submit'])) {
          $id = $_POST['id'];
          $faculty = $_POST['faculty'];
          $dept = $_POST['dept'];
          $phone = $_POST['phone'];
          $level = $_POST['level'];
          $updateResponse = $update->updateProfile($id,$faculty,$dept,$phone,$level);
          echo "<script > alert('Update Successfull, Thank You !!.')</script>";
          // echo "<script>alert('Successful')</script>";
      } 
  ?>
