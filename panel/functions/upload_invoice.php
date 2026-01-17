<?php
    include dirname(__FILE__).'/../../perms/permission_check_acc.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    if(empty($_POST['file_name'])){
        $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Wypełnij wszystkie pola i dodaj plik z fakturą!</p>';
        $con -> close();
        header("Location: ../panel_add_invoice.php");
        exit();
    }
    date_default_timezone_set('CET');
    $date = date('Y-m-d H:i:s');

    $uploader_name = $_SESSION['name'];
    $uploader_surname = $_SESSION['surname'];

    $targetDir = "../../invoices/";
    $fileName = $_POST['file_name'];
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if(preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $_POST['file_name'])){
        $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Niedozwolone znaki w nazwie pliku!</p>';
        $con -> close();
        header("Location: ../panel_add_invoice.php");
        exit();
    }

    $filename = $_POST['file_name'] . '.' . $extension;
    $winfilename= iconv('utf-8', 'cp1252', $filename);

    $allowTypes = array('pdf', 'xml');

    if(!is_dir('../../invoices/')){
        $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Nie znaleziono takiej ścieżki!</p>';
        $con -> close();
        header("Location: ../panel_add_invoice.php");
        exit();
    }

    if(file_exists($targetDir . $winfilename)){
        $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Plik o takiej nazwie już istnieje!</p>';
        $con -> close();
        header("Location: ../panel_add_invoice.php");
        exit();
    }

    if(!empty($_FILES["file"]["name"])){
        if(in_array($extension, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $winfilename)){
                mysqli_query($con,"SET CHARSET utf8");
                mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");
                $insert = $con->query("INSERT INTO files (file_name, uploader_name, uploader_surname, upload_date) VALUES ('$filename', '$uploader_name', '$uploader_surname', '$date')");
                if($insert){
                    $_SESSION['invoice-message'] = '<p style="text-align:center; color:green;">Pomyślnie dodano plik!</p>';
                    $logSql = $con->query("INSERT INTO invoicelogs (file_name, user_name, user_surname, log_date, action) VALUES ('$filename', '$uploader_name', '$uploader_surname', '$date', 'ADD')");
                    $con -> close();
                    header("Location: ../panel_add_invoice.php");
                    exit();
                } else {
                    $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Błąd podczas dodawania wpisu do bazy danych!</p>';
                    $con -> close();
                    header("Location: ../panel_add_invoice.php");
                    exit();
                }
            } else {
                $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Błąd podczas przesyłania pliku! <br> Kod błędu: '.$_FILES['file']['error'].' <br> Nazwa pliku: '.$fileName.'</p>';
                $con -> close();
                header("Location: ../panel_add_invoice.php");
                exit();
            }
        } else {
            $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Nieprawidłowy format pliku! Znaleziony format: '. $extension .'</p>';
            $con -> close();
            header("Location: ../panel_add_invoice.php");
            exit();
        }
    } else {
        $_SESSION['invoice-message'] = '<p style="text-align:center; color:red;">Dodaj plik z fakturą!</p>';
        $con -> close();
        header("Location: ../panel_add_invoice.php");
        exit();
    }
?>