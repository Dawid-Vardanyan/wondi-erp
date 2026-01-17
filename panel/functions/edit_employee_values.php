<?php
    include dirname(__FILE__).'/../../perms/permission_check.php';
    include dirname(__FILE__).'/../../cfg/config.php';
    
    if(!isset($_GET['id'])){
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">BŁĄD: Nie wykryto ID!</p>';
        header("Location: panel_employee_list.php");
        die();
    } else if(!is_numeric($_GET['id'])) {
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">BŁĄD: Typ danych nie odpowiada typowi dla ID!</p>';
        header("Location: panel_employee_list.php");
        die();
    }

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    $id = $_GET['id'];
    $sql = "SELECT isAdmin FROM users WHERE id = '$id'";
    $result = $con -> query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if($row['isAdmin'] == 1){
        $con -> close();
        $_SESSION['delete-message'] = '<p style="text-align:center; color:red;">Nie można edytować konta administratora!</p><p style="text-align:center; color:red;">Skontaktuj się z administratorem bazy danych oraz CEO aby edytować konto administratora!</p>';
        header("Location: panel_employee_list.php");
        die(); 
    } else if($row['isAdmin'] == 0){
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $con -> query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $con -> close();

        $admin = '';
        $accountant = '';
        $employee = '';

        if($row['isAdmin'] == 1){
            $admin = 'Checked';
        } else if($row['isAccountant'] == 1) {
            $accountant = 'Checked';
        } else {
            $employee = 'Checked';
        }
    }
?>