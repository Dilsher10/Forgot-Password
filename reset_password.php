<?php
session_start();
include 'config.php';

if (isset($_POST['reset_btn'])) {
    if (isset($_GET['token'])){
        $token = $_GET['token'];
    $newpassword = $_POST['newpassword'];
    $sqlQuery = "UPDATE `register` SET `password`='$newpassword' WHERE token = '$token' ";
    $query = mysqli_query($con, $sqlQuery);
    
     if ($query){
        echo "
      <script>
      alert('Password Reset Successfully')
      window.location.href='/';
      </script>
      ";
    } else {
        echo "
      <script>
      alert('Invalid Input')
      window.location.href='recover_email.php';
      </script>
      ";
    }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reset Password</title>
    <link href="css/all.css" rel="stylesheet" type="text/css">
    <link href="css/admin.css" rel="stylesheet">
    <style>
    .navbar-nav {
        background-color: #000 !important;
    }
    </style>
</head>

<body>

<div class="container Login">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1>Reset Password</h1>
                                </div>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="text" name="newpassword" class="form-control"
                                            placeholder="Enter Password" required>
                                    </div>
                                    <button type="submit" name="reset_btn" class="btn btn-primary btn-user btn-block">Reset Password</button>
                                    <hr>
                                    <p>Have an account ? <a href="/">Log in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>