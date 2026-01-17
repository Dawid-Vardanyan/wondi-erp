<?php
    include dirname(__FILE__).'/../../perms/permission_check.php';
    include dirname(__FILE__).'/../../cfg/config.php';

    mysqli_query($con,"SET CHARSET utf8");
    mysqli_query($con,"SET NAMES utf8 COLLATE utf8_polish_ci");

    $sql = "SELECT id, surname, name, position, email, contract_number FROM users ORDER BY id";
    $result = $con->query($sql);

    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo '
            <tbody>
            <tr>
            <td class="p-4">'.$row["id"].'.</td>
            <td class="p-4">'.$row["name"].'</td>
            <td class="p-4">'.$row["surname"].'</td>
            <td class="p-4">'.$row["position"].'</td>
            <td class="p-4">'.$row["email"].'</td>
            <td class="p-4">'.$row["contract_number"].'</td>
            <td class="p-4"><a href="panel_edit_employee.php?id='.$row["id"].'" class="bg-black px-4 py-2 text-white">Edytuj</a></td>
            <td class="p-4"><a href="functions/remove_employee.php?id='.$row["id"].'" class="bg-red-600 px-4 py-2 text-white">Usuń</a></td>
            </tr>
        </tbody>
            ';
        }
    }

    $con->close();
?>