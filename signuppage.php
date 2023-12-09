<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="style2.css" rel="stylesheet">

    <title>Signup</title>
</head>

<body class="signupbody">
    <form class="signupform" method="post" accent-charset="utf-8" action="" enctype="multipart/form-data">
    <h4 class="tt">Signup</h4>

    <div class="signupclass">   

    <input type="text" name="signup_name" placeholder="Enter Name" />
        <br /><br />
        <input type="email" name="signup_email" placeholder="Enter Email" />
        <br /><br />
        <input type="password" name="signup_password" placeholder="Enter Password" />
        <br /><br />
        <input type="submit" class="btn" name="submit" value="Signup" />
        </div> 
    </form>
    
    <?php include 'signupcode.php' ?>
</body>

</html>