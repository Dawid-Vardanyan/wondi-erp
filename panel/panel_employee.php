<?php
  session_start();

  if(!isset($_SESSION['loggedin'])){
    echo('<p1> UNAUTHORIZED </p1>');
    exit();
  };
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-panel.css">
    <title>Panel pracownika</title>
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
      <h2 class="text-3xl font-bold text-center">Panel pracownika</h2>
        <div class="grid grid-cols-2 gap-16 mt-20">
          <a href="panel_employee_data.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
            Moje dane
          </a>
          <a href="panel_my_projects.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
            Przypisane projekty
          </a>
        </div>
      </section>
    </section>
  </div>
</body>
</html>