<?php
    include dirname(__FILE__).'/../../perms/permission_check_acc.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    if(!isset($_POST['pobieraniefaktury'])){
        $con -> close();
        header('Location: ../panel_download_invoice.php');
    }
    
    $id = $_POST['pobieraniefaktury'];

    $sql = "SELECT file_name FROM files WHERE id = '$id'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $filename = $row['file_name'];
    $url = '../../invoices/' . $filename;

    clearstatcache();

    if(file_exists($url)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($url).'"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');

    //Clear system output buffer
    flush();

    //Read the size of the file
    readfile($url,true);
    $con -> close();
    header('Location: ../panel_download_invoice.php');
    die();
    } else {
        $con -> close();
        $_SESSION['file-message'] = '<p style="text-align:center; color:red;">Nie znaleziono pliku!</p>';
        header('Location: ../panel_download_invoice.php');
        die();
    }
?>