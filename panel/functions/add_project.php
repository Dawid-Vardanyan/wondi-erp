<?php
include dirname(__FILE__).'/../../perms/permission_check.php';
include dirname(__FILE__).'/../../cfg/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz dane z formularza
    $projectName = $_POST['project_name'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $assignedEmployees = $_POST['assigned_employees'];
    $projectDescription = $_POST['project_description'];

    // Przetwórz przypisanych pracowników do postaci ciągu znaków
    $assignedEmployeesString = implode(',', $assignedEmployees);

    // Dodaj projekt do bazy danych
    $query = "INSERT INTO projects (project_name, start_date, end_date, user_id, project_description) 
              VALUES ('$projectName', '$startDate', '$endDate', '$assignedEmployeesString', '$projectDescription')";

    if (mysqli_query($con, $query)) {
        $_SESSION['project-add'] = '<p style="text-align:center; color:green;">Projekt został dodany do bazy!</p>';
        $con -> close();
        header("Location: ../panel_add_project.php");
    } else {
        $_SESSION['project-add'] = '<p style="text-align:center; color:red;">Błąd podczas dodawania projektu: </p>' . mysqli_error($con);
        
    }
}

mysqli_close($con);
?>