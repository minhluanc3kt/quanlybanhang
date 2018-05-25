<!DOCTYPE html>
<html lang="en">
<head>

<!--
New Event
http://www.templatemo.com/tm-486-new-event
-->
<title>My Web</title>
<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
  <style>    
    /* Set black background color, white text and some padding */
    footer {
      background-color: red;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Trang Chủ</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="signup.php">Đăng Ký</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       
      </ul>
    </div>
  </div>
</nav>
<section id="register" class="parallax-section">
  <div class="container">
    <div class="row">

      <div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
        <h2>Đăng Ký Tài Khoản</h2>
        <h3>Quý khách vui lòng nhập đầy đủ các thông tin.</h3>
      </div>

      <div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
        <form action="#" method="post">
          <input name="username" type="text" class="form-control" id="username" placeholder="Tên Đăng Nhập">
          <input name="password" type="password" class="form-control" id="password" placeholder="Mật Khẩu">
          <input name="phone" type="telephone" class="form-control" id="phone" placeholder="Số Điện Thoại">
          <input name="email" type="email" class="form-control" id="email" placeholder="Email">
          <div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
            <input name="register" type="submit" class="form-control" id="submit" value="Đăng Ký">
          </div>
        </form>
      </div>

      <div class="col-md-1"></div>

    </div>
  </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset( $_POST["register"]) ) {
    $_username = $_POST['username'];
    $_password = $_POST['password'];
    $_phone = $_POST['phone'];
    // $_lname = $_POST['lname'];
    $_email = $_POST['email'];
    echo '<script language="javascript">';
      echo 'alert("Đăng ký thành công")';
      echo '</script>';
    }
}
?>

<?php

require 'database-config.php';
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_username;
    $password = $_password;
    $phone = $_phone;
    $email =$_email;
    $sql = "INSERT INTO signup(username, password,email,phone) VALUES('".$username."','".$password."','".$email."','".$phone."')";
    $result = mysqli_query($conn,$sql);
    }
?>
</section>

</head>
<body>
  
      
  <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>