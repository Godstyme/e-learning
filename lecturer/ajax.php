<?php
// $db = require_once '../server/classes/dbconnection.php';
$pdo = new PDO('mysql:host=localhost;dbname=e-learning', 'root', '');
// session_start();
if (isset($_GET['examname'])){
  $id = $_GET['examname'];
  $_SESSION['updateid'] = $id;
}

?>