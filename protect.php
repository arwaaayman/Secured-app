<?php
  error_reporting(0);//hide warning and error in page
  session_start();

  if(! isset($_SESSION["user"])){
      header("location:loginpage.php");
  }

?>