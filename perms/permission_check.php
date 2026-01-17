<?php
@session_start();

//Check if logged in
if(!isset($_SESSION['loggedin'])){
    header("Location: ../unauthorized.php");
    exit();
  };

//Check if have permission to view this page
if(!isset($_SESSION['isAdmin'])){
    header("Location: ../unauthorized.php");
    exit();
} else if ($_SESSION['isAdmin'] != 1){
    header("Location: ../unauthorized.php");
    exit();
}
?>