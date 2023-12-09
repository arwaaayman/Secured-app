<?php
    session_start();
    error_reporting(0);//hide warning and error in page
    if(!isset($_SESSION["user"])){
        header("location:loginpage.php");
    }

    $connection = new Mysqli("localhost", "root", "", "cyber_security");
    if ($connection->connect_error) {echo $connection->connect_error;}
    
    // unset($_SESSION['user']);
    if (isset($_POST["submit"])) {
        session_destroy();  
        header("location:loginpage.php");
    }

    if (isset($_POST['upload']) && isset($_FILES['user_photo'])) {

        $img_name = $_FILES['user_photo']['name'];
        $img_tmp = $_FILES['user_photo']['tmp_name'];
        $img_size = $_FILES['user_photo']['size'];
        $allow_ex = array('gif', 'png', "jpg");
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);

        $msg = htmlspecialchars($_POST["msg"]);
        $msg = filter_var ($_REQUEST['msg'], FILTER_SANITIZE_STRING); //remove tags from text
        $method = "AES-128-CTR";
        $iv = openssl_random_pseudo_bytes(16, $cstrong);
        $key = openssl_random_pseudo_bytes(16, $cstrong);
        $encrypted_msg = openssl_encrypt($msg, $method, $key, 0, $iv);
    
        if (!in_array($ext, $allow_ex)) {
            echo "<p class='notallow'>Not Allowed Extension</p>";
        } elseif ($img_size > 125000) {
            echo "<p class='large'>Large Image</p>";
        } else {
            $sql = "INSERT INTO images (image, description) VALUES ('$img_name', '$encrypted_msg')";
            if ($connection->query($sql)) {
                move_uploaded_file($img_tmp, $img_name);
                echo "<p class='success'>insert success</p>";
            }
        }
    }
?> 