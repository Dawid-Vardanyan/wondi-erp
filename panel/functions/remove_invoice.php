<?php
    include dirname(__FILE__).'/../../perms/permission_check_acc.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    if(!isset($_POST['usuwaniefaktury'])){
        $con -> close();
        header('Location: ../panel_remove_invoice.php');
    }
    
    date_default_timezone_set('CET');
    $date = date('Y-m-d H:i:s');

    $id = $_POST['usuwaniefaktury'];

    $user_name = $_SESSION['name'];
    $user_surname = $_SESSION['surname'];

    $sql = "SELECT file_name FROM files WHERE id = '$id'";
    $remSql = "DELETE FROM files WHERE id = '$id'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $filename = $row['file_name'];
    $url = '../../invoices/' . $filename;

    $logSql = "INSERT INTO invoicelogs (file_name, user_name, user_surname, log_date, action) VALUES ('$filename', '$user_name', '$user_surname', '$date', 'REMOVE')";

    clearstatcache();

    if(file_exists($url)){
        if(unlink($url)){
            $con -> query($remSql);
            $con -> query($logSql);
            $con -> close();
            $_SESSION['file-message'] = '<p style="text-align:center; color:green;">Plik pomyślnie usunięty!</p>';
            header('Location: ../panel_remove_invoice.php');
            die();
        } else {
            $con -> close();
            $_SESSION['file-message'] = '<p style="text-align:center; color:red;">Błąd podczas usuwania pliku: '. $filename .'!</p>';
            header('Location: ../panel_remove_invoice.php');
        }
    } else {
        $con -> close();
        $_SESSION['file-message'] = '<p style="text-align:center; color:red;">Nie znaleziono pliku!</p>';
        header('Location: ../panel_remove_invoice.php');
        die();
    }
?>