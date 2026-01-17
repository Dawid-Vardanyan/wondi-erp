<?php
    session_start();

    include('../cfg/config.php');

    if (empty($_POST['email']) || empty($_POST['password'])) {
        // Could not get the data that should have been sent.
        $_SESSION['login-failed'] = '<p style="text-align:center; color:red;">Wypełnij wszystkie pola!</p>';
        header("Location: ../index.php");
        die();
    }

    $username = $_POST['email'];
    $password = $_POST['password'];

    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    //Get hashed password
    $pwd_peppered = hash_hmac("sha256", $password, $pepper);
    $result = $con->query("SELECT password FROM users WHERE email = '$username'");
    $row = mysqli_fetch_assoc($result);
    $pwd_hashed = $row['password'];

    //Check if password is correct
    if(password_verify($pwd_peppered, $pwd_hashed)){
        $result = $con -> query("SELECT * FROM users WHERE email = '$username'");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $row['name'];
        $_SESSION['surname'] = $row['surname'];
		$_SESSION['id'] = $row['id'];
        $_SESSION['isAdmin'] = $row['isAdmin'];
        $_SESSION['isAccountant'] = $row['isAccountant'];
        $con -> close();
        header("Location: ../panel/panel.php");
        die();
    } else {
        $_SESSION['login-failed'] = '<p style="text-align:center; color:red;">Nie znaleziono takiego użytkownika!</p>';
        $con -> close();
        header("Location: ../index.php");
        die();
    }
?>