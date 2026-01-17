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
      <h2 class="text-3xl font-bold text-center">Dodawanie faktur</h2>
      <form class="mt-10" method="post" action="functions/upload_invoice.php" enctype='multipart/form-data'>
        <div class="max-w-xl mx-auto">
          <label class="w-full text-center block p-8 transition bg-white border-2 border-black border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
            <div class="flex justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 inline-block text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
              </svg>
            </div>
            <div class="mt-4">
              <span class="block w-full font-bold text-white bg-black p-4">
                Dodaj plik
              </span>
              <p style="text-align:center;">Tylko pliki z rozszerzeniem .xml lub .pdf!</p>
            </div>
            <input type="file" name="file" class="hidden">
          </label>
        </div>
        <div class="flex mt-10 justify-center">
          <div>
            <label for="nazwafaktury">Nazwa faktury</label>
            <input class="block border border-black p-4 w-96  " type="text" id="nazwafaktury" name="file_name">
          </div>
        </div>
        <div class="text-center">
          <input type="submit" class="mt-8 rounded bg-primary text-white inline-block py-2 px-8 font-bold cursor-pointer" value="Dodaj fakturę" />
        </div>
        <?php if(isset($_SESSION['invoice-message'])){echo $_SESSION['invoice-message']; $_SESSION['invoice-message'] = '';}?>
      </form>
    </section>
  </section>
</div>
</body>
</html>