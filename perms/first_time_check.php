<?php
    session_start();
    include("../cfg/config.php");

    $password = $_POST["password"];

    $result = $con -> query("SELECT firstInit FROM init");
    $init = mysqli_fetch_assoc($result);

    if($init["firstInit"] != 1){
        header("Location: ../index.php");
    } else {
        $result = $con -> query("SELECT password FROM init");
        $pwd = mysqli_fetch_assoc($result);
        if($password == $pwd["password"]){
            $_SESSION['fPwdCrt'] = 1;
            $con -> close();
            header("Location: ../panel/panel_first_init.php");
        } else {
            $con -> close();
            $_SESSION['login-failed'] = '<p style="text-align:center; color:red;">Nie znaleziono takiego użytkownika!</p>';
            header("Location: ../panel/panel_first_init_login.php");
        }
    }
?>