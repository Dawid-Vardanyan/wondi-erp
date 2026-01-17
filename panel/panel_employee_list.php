<?php
include('../perms/permission_check.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-panel-manage-users.css">
    <title>Spis pracowników</title>
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
      <h2 class="text-3xl font-bold text-center">Spis pracowników</h2>
      <table class="table-auto mt-20 w-full border border-collapse text-left">
        <thead>
          <tr class="border-b text-gray-600">
            <th class="p-4 font-normal">ID</th>
            <th class="p-4 font-normal">Imię</th>
            <th class="p-4 font-normal">Nazwisko</th>
            <th class="p-4 font-normal">Stanowisko</th>
            <th class="p-4 font-normal">E-mail</th>
            <th class="p-4 font-normal">Nr umowy</th>
            <th class="p-4 font-normal">Edytuj</th>
            <th class="p-4 font-normal">Usuń</th>
          </tr>
        </thead>
        <?php include('functions/employee_list.php'); ?>
      </table>
      
      <div class="text-center">
        <a href="panel_add_employee.php" class="mt-8 rounded bg-primary text-white inline-block py-2 px-8 font-bold">Dodaj pracownika</a>
      </div>
      <?php if(isset($_SESSION['delete-message'])){echo $_SESSION['delete-message']; $_SESSION['delete-message'] = '';} ?>
    </section>
  </section>
</div>
</body>
</html>