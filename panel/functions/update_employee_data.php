<?php
    include dirname(__FILE__).'/../../perms/permission_check.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['position']) || empty($_POST['contract_nr']) || empty($_POST['email']) || empty($_POST['password'])) {
        // Could not get the data that should have been sent.
        $_SESSION['edit-message'] = '<p style="text-align:center; color:red;">Wypełnij wszystkie pola!</p>';
        header("Location: ../panel_edit_employee.php?id=".$_GET['id']);
        die();
    }

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $position = $_POST['position'];
    $contract_nr = $_POST['contract_nr'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_GET['id'];

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

    if($password != ""){
        //Password hashing
        $pwd_peppered = hash_hmac("sha256", $password, $pepper);
        $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET email = '$email', password = '$pwd_hashed', isAdmin = '$isAdmin', isAccountant = '$isAccountant', name = '$name', surname = '$surname', position = '$position', contract_number = '$contract_nr' WHERE id = '$id'";
    } else {
        $sql = "UPDATE users SET email = '$email', isAdmin = '$isAdmin', isAccountant = '$isAccountant', name = '$name', surname = '$surname', position = '$position', contract_number = '$contract_nr' WHERE id = '$id'";
    }
    
    if ($con->query($sql) === TRUE) {
        $_SESSION['edit-message'] = '<p style="text-align:center; color:green;">Pomyślnie zaktualizowano dane użytkownika!</p>';
        $con -> close();
        header("Location: ../panel_edit_employee.php?id=".$id);
        die();
      } else {
        $_SESSION['edit-message'] = '<p style="text-align:center; color:red;">Błąd:' . $con->error . '</p>';
        $con -> close();
        header("Location: ../panel_edit_employee.php?id=".$id);
        die();
      }
?>