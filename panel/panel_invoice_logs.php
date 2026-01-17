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
    <title>Dziennik faktur</title>
    <style>
      .table-container {
        max-height: 600px; /* Maksymalna wysokość kontenera tabeli */
        overflow: auto; /* Dodanie paska przewijania */
      }
    </style>
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
      <h2 class="text-3xl font-bold text-center">Dziennik faktur</h2>
      <div class="table-container mt-20">
        <table class="table-auto w-full border border-collapse text-left">
          <thead>
            <tr class="border-b text-gray-600">
              <th class="p-4 font-normal">ID informacji</th>
              <th class="p-4 font-normal">Imię użytkownika</th>
              <th class="p-4 font-normal">Nazwisko użytkownika</th>
              <th class="p-4 font-normal">Nazwa pliku</th>
              <th class="p-4 font-normal">Czas operacji na pliku</th>
              <th class="p-4 font-normal">Typ operacji na pliku</th>
            </tr>
          </thead>
          <?php include('functions/invoice_logs.php'); ?>
        </table>
      </div>
    </section>
  </section>
</div>
</body>
</html>