<?php
  session_start();

  include("../cfg/config.php");

  $result = $con -> query("SELECT firstInit from init");
  $init = mysqli_fetch_assoc($result);

  $con -> close();

  if($init["firstInit"] != 1){
    header("Location: ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-index.css">
    <title>Wondi Management System</title>
</head>
<body>
    <div class="flex h-screen">
        <section class="w-1/2">
          <header>
          <a href="../index.php" class="flex justify-center mt-14">
            <img src="https://i.imgur.com/PygCFSV.png" alt="">
          </a>
        </header>

          <section class="w-1/3 mx-auto mt-44">
            <form action = "../perms/first_time_check.php" method="post">
            <h2 class="text-3xl font-bold">Inicjalizacja systemu</h2><br>
              <h2 class="text-3xl font-bold">Login</h2>
              <div class="mt-4">
                <label for="password">Hasło</label>
                <input name="password" id="password" type="password" class="mt-2 block w-full rounded border p-2">
              </div>
              <div class="mt-4">
                <input type="submit" class="mt-2 rounded bg-primary text-white w-full p-2 font-bold" value="Zaloguj się">
                <?php if(isset($_SESSION['login-failed'])){echo $_SESSION['login-failed']; $_SESSION['login-failed'] = '';} //Show what is wrong with the login credentials ?>
              </div>
            </form>
          </section>
        </section>
        
        <div class="h-full w-1/2 dummy"></div>
      </div>
</body>
</html>