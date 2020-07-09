<?php 
session_start();
if(isset($_SESSION['kor_id'])){
  header("Location: index.php");
}
include "konekcija.php";

if(isset($_POST['submit'])){
  if(empty($_POST['username']) || empty($_POST['password'])){
    $msg = "Popunite sva polja!";
  } else{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

    $password = md5($password);

    $sql = "SELECT * FROM korisnici WHERE Username = '$username' AND Password = '$password'";
    $q = $mysqli->query($sql);

    if(mysqli_num_rows($q) > 0){
        $red = $q->fetch_object();
        $_SESSION['kor_id'] = $red->Id;
        $_SESSION['kor_username'] = $red->Username;
        $_SESSION['kor_admin'] = $red->Admin;
        header("Location: index.php");
    } else{
      $msg = "Pogrešan username i/ili password!";
    }
}
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #ffdd99">
  

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <?php include "includes/jumbotron.php"; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
       <div class="page-header">
          <h1 style="color: maroon">Login <small style="color: maroon"> Ulogujte se</small></h1>
        </div>
    </div>
  </div>
  <div class="row pretraga_vesti">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <div class="well">
        <?php 
          if(isset($msg)){
            echo $msg;
          }
         ?>
        <form action="" method="POST">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username:">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password:">
        <br>
        <input type="submit" id="submit" name="submit" class="btn btn-block btn-primary" value="Login">

      </form>
      </div>
    </div>
    <div class="col-lg-4"></div>
  </div>
  </div>
 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>