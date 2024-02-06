<?php
include 'config.php';

if (isset($_POST['forgot_btn'])) {
    include 'config.php';
    $email = $_POST['email'];
    $sqlQuery = "SELECT * FROM `register` WHERE email = '$email' ";
    $query = mysqli_query($con, $sqlQuery);
    
    $emailcount = mysqli_num_rows($query);
    
    
    if ($emailcount) {
        $data = mysqli_fetch_array($query);
        $username = $data['name'];
        $token = $data['token'];
        $subject = "Password Reset";
        $body = "Hi, $username. click here to reset your password https://munchtimecomedy.com.au/user/reset_password.php?token=$token";
        $sender_email = "Form: dilsher.dahri10@gmail.com";
        if(mail($email, $subject, $body, $sender_email)){
            echo "
      <script>
      alert('Check your email')
      window.location.href='/';
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
    <title>Recover Email</title>
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
                                    <h1>Recovery Email</h1>
                                </div>
                                <form class="user" action="" method="POST">
                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email" required>
                                    </div>
                                    <button type="submit" name="forgot_btn" class="btn btn-primary btn-user btn-block">Send Email</button>
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