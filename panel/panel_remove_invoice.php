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
    <title>Usuwanie faktury</title>
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
      <h2 class="text-3xl font-bold text-center">Usuwanie faktur</h2>
      <form class="mt-10" method = "POST" action = "functions/remove_invoice.php">
        <div class="flex justify-center">
          <div class="mb-3 xl:w-96 relative">
            <select name="usuwaniefaktury" class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
              <option selected disabled>Wybierz fakturę</option>
              <?php include('functions/get_invoices.php'); ?>
            </select>
            <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
              </svg>

            </div>
          </div>
        </div>
        <div class="text-center">
          <input type="submit" class="mt-8 rounded bg-primary text-white inline-block py-2 px-8 font-bold cursor-pointer" value="Usuń fakturę" />
        </div>
      </form>
      <?php if(isset($_SESSION['file-message'])){echo $_SESSION['file-message']; $_SESSION['file-message'] = '';}?>

    </section>
  </section>
</div>
</body>
</html>