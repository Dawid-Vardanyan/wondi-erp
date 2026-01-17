<?php
    include dirname(__FILE__).'/../../perms/permission_check.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    $id = $_GET['id'];

    if(!isset($id) || $id == 0){
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">BŁĄD: Nierozpoznana wartość!</p>';
        header("Location: ../panel_employee_list.php");
        die();
    }

    $sql = "DELETE FROM projects WHERE id = '$id'";
    $ver = $con->query($sql);
    if(!$ver){
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">BŁĄD BAZY: '.mysqli_error($con).'</p>';
        header("Location: ../panel_projects_list.php");
        die();
    } else {
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:green;">Pomyślnie usunięto projekt o ID: '.$_GET['id'].'</p>';
        header("Location: ../panel_projects_list.php");
        die();
    }
?>