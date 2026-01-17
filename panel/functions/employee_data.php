<?php
    @session_start();

    if(!isset($_SESSION['loggedin'])){
        echo('<p1> UNAUTHORIZED </p1>');
    exit();
    };

    include dirname(__FILE__).'/../../cfg/config.php';

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    $id = $_SESSION['id'];

    $sql = "SELECT id, name, surname, position, email, contract_number FROM users WHERE id='$id'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    echo '
            <tbody>
            <tr>
            <td class="p-4">'.$row["id"].'.</td>
            <td class="p-4">'.$row["name"].'</td>
            <td class="p-4">'.$row["surname"].'</td>
            <td class="p-4">'.$row["position"].'</td>
            <td class="p-4">'.$row["email"].'</td>
            <td class="p-4">'.$row["contract_number"].'</td>
            </tr>
        </tbody>
            ';
?>