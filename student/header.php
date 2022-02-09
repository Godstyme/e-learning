<?php 
  require_once('../config/config.php');
  session_start();
    if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
      header("location:../login.php");
      die("Sorry Your Session Has Expired, Please Visit The Login Page To Continue...");
    }
    // echo "<div class='text-primary text-center'>"."Here are you ". $_SESSION['email']."</div>";

?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Distance learning system</title>
    <!-- css link -->
    <!-- <link rel="stylesheet" href="../assets/css/loader.css" type="text/css"> -->
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
  </head>

  <body style="background:#2E4FC3;">
    <!-- <div class="page-loader">
      <div class="spinner"></div>
      <div class="txt">AKWUKWO</div>
    </div> -->
    <div class="con" style="background: #2E4FC3;">
      <header>
        <div class="container-fluid overflow-hidden">
          <div class="row vh-100 overflow-auto">
              <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 d-flex sticky-top nav-bg">
                  <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                      <a href="" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="../assets/images/navLogo.JPG" class="navLogo">
                      </a>
                      <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                          <li class="nav-item">
                              <a href="index.php" class="nav-link px-sm-0 px-2 text-dark">
                                <i class="fas fa-home"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                              </a>
                          </li>
                          <li>
                            <a href="" class="px-sm-0 px-2 nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown">
                              <i class="fas fa-plus-circle"></i><span class="ms-1 d-none d-sm-inline">Courses</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="index.php?a=register&b=course" class="dropdown-item text-dark">Course Registration</a>
                                <a href="index.php?a=registered&b=course" class="dropdown-item">Registered Courses</a>
                            </div>
                          </li>
                          <li>
                            <a href="index.php?a=res&b=lecture" class="nav-link px-sm-0 px-2 text-dark">
                              <i class="fas fa-chalkboard-teacher"></i><span class="ms-1 d-none d-sm-inline">Get Lecture Resourses</span>
                            </a>
                          </li>
                          <li>
                            <a href="index.php?a=class&b=link" class="nav-link px-sm-0 px-2 text-dark">
                              <i class="fas fa-chalkboard-teacher"></i><span class="ms-1 d-none d-sm-inline">Take Class</span>
                            </a>
                          </li>
                          <li>
                            <a href="index.php?a=quiz&b=exam" class="nav-link px-sm-0 px-2 text-dark">
                              <i class="fas fa-chalkboard-teacher"></i><span class="ms-1 d-none d-sm-inline">Take Quiz</span> 
                            </a>
                          </li>
                          <li>
                            <a href="index.php?a=assignment&b=homework" class="nav-link px-sm-0 px-2 text-dark">
                              <i class="fas fa-plus-circle"></i><span class="ms-1 d-none d-sm-inline">Submit Assignment</span> 
                            </a>
                          </li>
                      </ul>
                      <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                          <a href="" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                              <span class="d-none d-sm-inline mx-1"><?php echo  $_SESSION['email'];?></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
                              <li><a class="dropdown-item text-dark" href="index.php?a=profile&b=student">Profile</a></li> 
                              
                              <li><a class="dropdown-item text-dark" href="logout.php">Sign out</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col d-flex flex-column h-sm-100">
                <main class="row overflow-auto text-light">
                    <div class="col pt-4">
                        <h6 class="text-end"><?php echo "Welcome Back ". $_SESSION['email'];?></h6>
                        <hr />
                        <div>
                          <?php 
                            if(isset($_GET['a']) && isset($_GET['b'])){
                                if($_GET["a"] === "class" && $_GET["b"] === "link"){
                                  include_once("class.php");
                                }else if($_GET["a"] === "res" && $_GET["b"] === "lecture"){
                                  include_once("res.php");
                                }else if($_GET["a"] === "assignment" && $_GET["b"] === "homework"){
                                  include_once("assignment.php");
                                }else if($_GET["a"] === "register" && $_GET["b"] === "course"){
                                  include_once("registercourse.php");
                                }else if($_GET["a"] === "registered" && $_GET["b"] === "course"){
                                    include_once("registered.php");
                                }else if($_GET["a"] === "profile" && $_GET["b"] === "student"){
                                  include_once("profile.php");
                                } else if($_GET["a"] === "quiz" && $_GET["b"] === "exam"){
                                  include_once("cbt.php");
                                } else{
                                  include_once("index.php");
                                }
                            }else{
                              include_once("index.php");
                            }
                          ?>
                        </div>
                    </div>
                </main>
    