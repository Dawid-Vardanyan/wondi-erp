<?php
    include dirname(__FILE__).'/../../perms/permission_check.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    $sql = "SELECT id, file_name, user_name, user_surname, log_date, action FROM invoicelogs ORDER BY id";
    $result = $con->query($sql);

    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo '
            <tbody>
            <tr>
            <td class="p-4">'.$row["id"].'.</td>
            <td class="p-4">'.$row["user_name"].'</td>
            <td class="p-4">'.$row["user_surname"].'</td>
            <td class="p-4">'.$row["file_name"].'</td>
            <td class="p-4">'.$row["log_date"].'</td>
            <td class="p-4">'.$row["action"].'</td>
            </tr>
        </tbody>
            ';
        }
    } else {

    };

    $con->close();
?>