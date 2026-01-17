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
    <title>Moje projekty</title>
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
      <h2 class="text-3xl font-bold text-center">Moje projekty</h2>
      <table class="table-auto mt-20 w-full border border-collapse text-left">
        <thead>
          <tr class="border-b text-gray-600">
            <th class="p-4 font-normal">ID</th>
            <th class="p-4 font-normal">Nazwa projektu</th>
            <th class="p-4 font-normal">Czas rozpoczęcia</th>
            <th class="p-4 font-normal">Przewidywany czas zakończenia</th>
            <th class="p-4 font-normal">Opis projektu</th>
            <th class="p-4 font-normal">Lider projektu</th>
            <th class="p-4 font-normal">Status projektu</th>
          </tr>
        </thead>
        <?php include('functions/my_projects.php'); ?>
      </table>
    </section>
  </section>
</div>
</body>
</html>