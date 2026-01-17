<?php
include dirname(__FILE__).'/../../perms/permission_check.php';
include dirname(__FILE__).'/../../cfg/config.php';

mysqli_query($con, "SET CHARSET utf8");
mysqli_query($con, "SET NAMES utf8 COLLATE utf8_polish_ci");

$sql = "SELECT projects.id, projects.project_name, projects.start_date, projects.end_date, projects.project_description, projects.project_status, users.name, users.surname
        FROM projects
        JOIN users ON projects.user_id = users.id
        ORDER BY projects.id";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <tbody>
        <tr>
        <td class="p-4">' . $row["id"] . '.</td>
        <td class="p-4">' . $row["project_name"] . '</td>
        <td class="p-4">' . $row["start_date"] . '</td>
        <td class="p-4">' . $row["end_date"] . '</td>
        <td class="p-4">' . $row["project_description"] . '</td>
        <td class="p-4">' . $row["name"] . ' ' . $row["surname"] . '</td>
        <td class="p-4">' . $row["project_status"] . '</td>
        <td class="p-4"><a href="functions/remove_project.php?id='.$row["id"].'" class="bg-red-600 px-4 py-2 text-white">Usuń</a></td>
        </tr>
        </tbody>
        ';
    }
} else {
    echo '<tbody><tr><td colspan="6" class="p-4">Brak danych projektów.</td></tr></tbody>';
}

$con->close();
?>