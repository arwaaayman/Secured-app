<?php
    session_start();
    error_reporting(0);//hide warning and error in page
    if (!isset($_SESSION['admin'])) {
        if (!isset($_SESSION['user'])) {
            header("location:loginpage.php");
        }else{
            header("location:profile.php");
        }
    }


    if (isset($_POST["submit"])) {
        session_destroy();  
        header("location:loginpage.php");
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="admin.css" rel="stylesheet">
</head>

<body>
    <form method="post" class="adminform" accent-charset="utf-8" action="" enctype="multipart/form-data">
        <h1>Welcome Admin</h1>
        <form method="post" accent-charset="utf-8" action="" enctype="multipart/form-data">
        <input type="submit" class="log" name="submit" placeholder="Logout" value="Logout"/>
    </form>
    </form>
</body>

</html>
