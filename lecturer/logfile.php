$qry = $pdo ->prepare($sql);
  $exec = $qry->execute(array(':id'=>$id));
  if ($qry->rowCount() > 0) {
      $data = $qry->fetchAll(PDO::FETCH_ASSOC);
      $id = $data['id'];
      echo $id;
  }else{
      echo "oopps";
  }
  $sql = "SELECT * FROM quiz WHERE id = :id";
  totalque = :totalque, markperitque = :markperitque, markperongque = :markperongque,	examdate = :examdate
  ,':totalque'=>$totalque,':markperitque'=>$markperitque,':markperongque'=>$markperongque,':examdate'=>$examdate


<!-- https://www.doabledanny.com/Deploy-PHP-And-MySQL-to-Heroku -->
<!-- mobile-phone-repair-consultant.epizy.com -->z1ARAb177YS5VLd   epiz_31060842

  <?php
// $db = require_once '../server/classes/dbconnection.php';
$pdo = new PDO('mysql:host=localhost;dbname=e-learning', 'root', '');
session_start();
if (isset($_POST['btnAdd'])){
  $_SESSION['examname'] = $updateid;
  echo $updateid;
  $coursetitle = $_POST['coursetitle'];
  $sql = "UPDATE quiz SET coursetitle = $coursetitle WHERE id = 8";
  $query = $pdo->prepare($sql);
  $exec = $query->execute(array($coursetitle));
  if ($query->errorCode() == 0) {
    echo "<div class='text-red'>Course Registration Successful</div>";
  } else {
    echo "<div class='text-red'>Something went wrong</div>";
  }
    
}





  // $coursetitle = $_POST['coursetitle'];
  // $sql = "UPDATE quiz SET coursetitle = $coursetitle WHERE id = $id";
  // $query = $pdo->prepare($sql);
  // $exec = $query->execute(array($id,$coursetitle));
  // if ($query->errorCode() == 0) {
  //   echo "<div class='text-red'>Course Registration Successful</div>";
  // } else {
  //   echo "<div class='text-red'>Something went wrong</div>";
  // }

?>