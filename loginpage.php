<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <?php include('logincode.php') ?>
    <?php session_start(); 
    if(isset($_COOKIE['user'])) { ?>
        <meta http-equiv="refresh" content="20">
    <?php
        echo $_COOKIE['user'];
    }
    else {
    ?>
    <?php if (!isset($_SESSION['$verification_code'])) { ?>
        <h1>Welcome To Our Website...</h1>

        <form class="loginpageform" method="post" accent-charset="utf-8" action="" enctype="multipart/form-data">
        <h4>Login</h4>     
        <div class="loginform">
            <input type="email" name="login_email" placeholder="Enter Email" />
            <br /><br />
            <input type="password" name="login_password" placeholder="Enter Password" />
            <br /><br />
            <input type="submit" class="btn1" name="submit" placeholder="login" value="Login" />
            <a href="signuppage.php">Register</a>
            </div>
        </form>
        
    <?php } else { ?>
        <form method="post" class="verifyform" accent-charset="utf-8" action="" enctype="multipart/form-data">
        <div class="varclass">    
        <input type="text" class="vartext"  name="login_verification_code" placeholder="Enter Verefication Code" />
            <br /><br />
           
         <input type="submit" name="verify" class="varbtn" placeholder="Verify" value="Verify" />
         <div>
        </form>
    <?php } ?>

    <?php } ?>
    <?php include('logincode.php') ?>
</body>

</html>