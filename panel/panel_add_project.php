<?php
include('../perms/permission_check.php');
include('../cfg/config.php');

// Pobierz listę pracowników z bazy danych
$query = "SELECT id, name, surname, position FROM users";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-panel-add-employee.css">
    <title>Dodaj projekt</title>
</head>
<body>
<div class="h-screen">
  <section class="container mx-auto">
    <header class="mt-14 flex items-center justify-between">
      <div></div>
      <a href="panel.php" class="absolute left-1/2 -translate-x-1/2 transform">
        <img src="https://i.imgur.com/PygCFSV.png" alt="">
      </a>
      <a href="functions/logout.php" class="font-bold">
        Wyloguj się
      </a>
    </header>

    <section class="w-2/3 mx-auto mt-20">
      <form action="functions/add_project.php" method="post">
        <h2 class="text-3xl font-bold text-center">Panel dodawania projektów</h2>
        <div class="grid grid-cols-3 gap-16 mt-20">
          <div class="mt-4">
            <label for="nazwa">Nazwa projektu</label>
            <input name="project_name" id="project_name" type="text" class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="data_rozpoczecia">Data rozpoczęcia</label>
            <input name="start_date" id="start_date" type="date" class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="data_zakonczenia">Data zakończenia</label>
            <input name="end_date" id="end_date" type="date" class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4 col-span-3">
            <label for="przypisani_pracownicy">Wybierz lidera projektu</label>
            <select name="assigned_employees[]" id="assigned_employees" class="mt-2 block w-full rounded border p-2">
              <?php
              // Wyświetl opcje z listą pracowników
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['id'] . '">' . $row['name'] . ' ' . $row['surname'] . ' - ' . $row['position'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="mt-4 col-span-3">
            <label for="opis">Opis projektu</label>
            <textarea name="project_description" id="project_description" multiple class="mt-2 block w-full rounded border p-2"></textarea>
          </div>
        </div>
        <div class="mt-16 text-center">
          <input type="submit" class="mt-2 rounded bg-primary text-white inline-block py-2 px-8 font-bold" value="Dodaj projekt">
          <?php if(isset($_SESSION['project-add'])){echo $_SESSION['project-add']; $_SESSION['project-add'] = '';} //Show if user was added or display error?>
        </div>
      </form>
    </section>
  </section>
</div>
</body>
</html>