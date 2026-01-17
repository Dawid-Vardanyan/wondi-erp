<?php
@session_start();

//Check if logged in
if(!isset($_SESSION['loggedin'])){
    echo('<p1> UNAUTHORIZED </p1>');
    exit();
  };

//Check if have permission to view this page
if(!isset($_SESSION['isAdmin'])){
    //Do nothing
} else if ($_SESSION['isAdmin'] == 1){
    echo '
    <a href="panel_invoice_logs.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
    Dziennik faktur
    </a>
    ';

    echo '
    <a href="panel_remove_invoice.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
    Usuwanie faktur
    </a>
    ';
} else if ($_SESSION['isAccountant' == 1]){
    echo '
    <a href="panel_remove_invoice.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
    Usuwanie faktur
    </a>
    ';
}
?>