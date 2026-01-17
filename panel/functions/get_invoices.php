<?php
    include dirname(__FILE__).'/../../perms/permission_check_acc.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    $sql = "SELECT id, file_name FROM files ORDER BY id";
    $result = $con->query($sql);

    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo '
            <option value="'.$row['id'].'">'.$row['file_name'].'</option>
            ';
        }
    }

    $con->close();
?>