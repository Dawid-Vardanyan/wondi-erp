<?php
  include('../perms/permission_check_acc.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-panel.css">
    <title>Obsługa faktur</title>
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
      <h2 class="text-3xl font-bold text-center">Obsługa faktur</h2>
        <div class="grid grid-cols-2 gap-16 mt-20">
          <a href="panel_add_invoice.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
            Dodaj fakturę
          </a>
          <a href="panel_download_invoice.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
            Pobierz fakturę
          </a>
          <?php include('functions/show_invoice_admin_button.php'); ?>
        </div>
      </section>
    </section>
  </div>
</body>
</html>