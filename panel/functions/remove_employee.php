<?php
    include dirname(__FILE__).'/../../perms/permission_check.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    $id = $_GET['id'];

    $sql = "SELECT isAdmin FROM users WHERE id = '$id'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row['isAdmin'] == 1){
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">Nie można usunąć konta administratora!</p><p style="text-align:center; color:red;">Skontaktuj się z administratorem bazy danych oraz CEO aby usunąć konto administratora!</p>';
        header("Location: ../panel_employee_list.php");
        die();
    } elseif($row['isAdmin'] == 0) {
        $sql = "DELETE FROM users WHERE id = '$id'";
        $ver = $con->query($sql);
        if(!$ver){
            $con -> close();
            $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">BŁĄD BAZY: '.mysqli_error($con).'</p>';
            header("Location: ../panel_employee_list.php");
            die();
        } else {
            $con -> close();
            $_SESSION['delete-message'] = '<p style="text-align:center; color:green;">Pomyślnie usunięto pracownika o ID: '.$_GET['id'].'</p>';
            header("Location: ../panel_employee_list.php");
            die();
        }
    } else {
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">BŁĄD: Nierozpoznana wartość!</p>';
        header("Location: ../panel_employee_list.php");
        die();
    }
?>