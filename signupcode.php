<?php
session_start();
error_reporting(0);//hide warning and error in page
$conn = new Mysqli("localhost", "root", "", "cyber_security");
if ($conn->connect_error) {
    echo $conn->connect_error;
}

if (isset($_POST["submit"])) {

    unset($email);
    unset($name);
    $name = $_POST["signup_name"];
    $email = $_POST["signup_email"];
    $password = $_POST["signup_password"];
    $hasedpassword = password_hash($password, PASSWORD_ARGON2I);

    if ($name != NULL && $email != NULL && $hasedpassword != NULL) {
        $pre_stmt = $conn->prepare("SELECT * FROM users where email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute();
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<p class='invalid'>Invalid email user another one</p>";
        } else {
            $query = "INSERT INTO users VALUES (DEFAULT,'$name', '$email', '$hasedpassword', 'user')";
            if ($conn->query($query)) {
                $name = NULL;
                $email = NULL;
                $password = NULL;
                $hasedpasswor = NULL;
                header("location:loginpage.php"); //change this to login page.
                echo "<p class='inserted'>User inserted</p>";
            } else{
                echo "<p class='notinserted'>User not insrted</p>";
            }     
        }
    } else{
        echo "<p class='fill'>Fill your data first</p>";
    }    
}
?>