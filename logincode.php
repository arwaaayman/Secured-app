<?php
session_start();
error_reporting(0);//hide warning and error in page

// unset($_SESSION['user']);
if (isset($_SESSION['user'])) {
    header("location:profile.php");
}

if (isset($_SESSION['admin'])) {
    header("location:admin.php");
}

$conn = new Mysqli("localhost", "root", "", "cyber_security");
if ($conn->connect_error) {
    echo $conn->connect_error;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($name, $email)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'main.email411@gmail.com';
        $mail->Password = 'zqdkvhhadkozlopx';

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->isHTML(true);
        $mail->setFrom('main.email411@gmail.com', "Cyber Security Project");
        $mail->addAddress($email, $name);
        $mail->Subject = 'Email verification from Cyber Security Project';

        $_SESSION['$verification_code'] = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Body = '<p>Your verificatoin code is: <b style="font-size=30px;">' . $_SESSION['$verification_code'] . '</b></p>';
   
        $mail->send();
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent, Try again. Mailer Error: ', $mail->ErrorInfo;
    }
}

if (isset($_POST["submit"])) {

    unset($email);
    unset($password);
    $email = $_POST["login_email"];
    $password = $_POST["login_password"];
    

    if (!empty($email) && !empty($password)) {
        $pre_stmt = $conn->prepare("SELECT * FROM users where email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute();
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["name"];
            if ($row["email"] == $email && password_verify($password, $row["password"])) {
                if ($row["type"]== "admin") {
                    $_SESSION['admin'] = $email;
                    header("location:admin.php");
                } else {
                    echo "<p class='login_success'>Login Successful..</p>";
                    echo "<br/>";
                    sendMail("$name", "$email");
                    echo "<p class='mail'>Check your mail for (Two-factor authntication)</p>";
                }
            } else {
                $_SESSION['u'] += 1;
                echo $_SESSION['u'];
                if ($_SESSION['u'] > 2) {
                    header('location:time.php');
                }
                echo "<p class='echo_msg_login'>Login Failed, Make sure from your data..</p>";
            }
        } else {
            echo "<p class='echo_msg_login'>Make sure from your data..</p>";
        }
    } else
       echo '<p class="echo_msg_login">Fill Your Data First</p>';
}


if (isset($_POST["verify"])) {

    $code = $_POST["login_verification_code"];
    if ($code == $_SESSION['$verification_code']) {
        $_SESSION['user'] = $code;
        $_SESSION['u'] = 0;
        header("location:profile.php");
    }
}
?>