<?php
    include dirname(__FILE__).'/../../cfg/config.php';

    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['position']) || empty($_POST['contract_nr']) || empty($_POST['email']) || empty($_POST['password'])) {
        // Could not get the data that should have been sent.
        $_SESSION['user-add'] = '<p style="text-align:center; color:red;">Wypełnij wszystkie pola!</p>';
        header("Location: ../panel_add_employee.php");
        die();
    }

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $position = $_POST['position'];
    $contract_nr = $_POST['contract_nr'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    switch ($_POST['uprawnienia']){
        case "admin":
            $isAdmin = 1;
            $isAccountant = 0;
            break;
        case "ksiegowy":
            $isAdmin = 0;
            $isAccountant = 1;
            break;
        case "pracownik":
            $isAdmin = 0;
            $isAccountant = 0;
            break;
        default:
            $isAdmin = 0;
            $isAccountant = 0;
            break;
    }

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    //Password hashing
    $pwd_peppered = hash_hmac("sha256", $password, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password, isAdmin, isAccountant, name, surname, position, contract_number) VALUES ('$email', '$pwd_hashed', '$isAdmin', '$isAccountant', '$name', '$surname', '$position', '$contract_nr')";
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['user-add'] = '<p style="text-align:center; color:green;">Pomyślnie dodano użytkownika!</p>';
        $con -> query("UPDATE init SET firstInit = 0");
        $con -> close();
        header('Location: ../panel_first_init.php');
        die();
      } else {
        $_SESSION['user-add'] = '<p style="text-align:center; color:red;">Błąd:' . $sql . "<br>" . $conn->error . '</p>';
        $con -> close();
        header('Location: ../panel_first_init.php');
        die();
      }
?>