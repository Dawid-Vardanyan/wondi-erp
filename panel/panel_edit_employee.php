<?php
include('../perms/permission_check.php');
include('functions/edit_employee_values.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-panel-add-employee.css">
    <title>Edytuj dane pracownika</title>
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
      <form <?php echo "action = 'functions/update_employee_data.php?id=".$row['id']."'";?> method="post">
        <h2 class="text-3xl font-bold text-center">Panel edycji danych pracownika</h2>
        <div class="grid grid-cols-3 gap-16 mt-20">
          <div class="mt-4">
            <label for="imie">Imię</label>
            <input name="name" id="name" type="text" <?php echo "value = '".$row['name']."'"; ?> class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="nazwisko">Nazwisko</label>
            <input name="surname" id="surname" type="text" <?php echo "value = '".$row['surname']."'"; ?> class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="stanowisko">Stanowisko</label>
            <input name="position" id="position" type="text" <?php echo "value = '".$row['position']."'"; ?> class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="umowa">Numer umowy</label>
            <input name="contract_nr" id="contract_nr" type="text" <?php echo "value = '".$row['contract_number']."'"; ?> class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" <?php echo "value = '".$row['email']."'"; ?> class="mt-2 block w-full rounded border p-2">
          </div>
          <div class="mt-4">
            <label for="password">Hasło</label>
            <input name="password" id="password" type="password" value = "" class="mt-2 block w-full rounded border p-2">
          </div>
        </div>
        <div class="containner px-20 my-20 mx-auto">
          <div class="divide-y">
            <div class="flex items-start space-x-3 py-6">
              <input id="input-admin" type="radio" <?php echo $admin ?> name="uprawnienia" value="admin" class="border-gray-300 rounded h-5 w-5" />

              <div class="flex flex-col">
                <label for="input-admin" class="text-black font-medium leading-none">Administrator</label>
                <p class="text-xs text-gray-500 mt-2 leading-4">Posiada wszystkie uprawnienia i dostęp do każdego miejsca w panelu</p>
              </div>
            </div>

            <div class="flex items-start space-x-3 py-6">
              <input id="input-ksiegowy" type="radio" <?php echo $accountant ?> name="uprawnienia" value="ksiegowy" class="border-gray-300 rounded h-5 w-5" />

              <div class="flex flex-col">
                <label for="input-ksiegowy" class="text-black font-medium leading-none">Księgowy</label>
                <p class="text-xs text-gray-500 mt-2 leading-4">Pracownik posiada uprawnienia do faktur</p>
              </div>
            </div>

            <div class="flex items-start space-x-3 py-6">
              <input id="input-pracownik" type="radio" <?php echo $employee ?> name="uprawnienia" value="pracownik" class="border-gray-300 rounded h-5 w-5" />

              <div class="flex flex-col">
                <label for="input-pracownik" class="text-black font-medium leading-none">Pracownik</label>
                <p class="text-xs text-gray-500 mt-2 leading-4">Brak specjalnych uprawnień</p>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-16 text-center">
          <input type="submit" class="mt-2 rounded bg-primary text-white inline-block py-2 px-8 font-bold" value="Edytuj pracownika">
          <?php if(isset($_SESSION['edit-message'])){echo $_SESSION['edit-message']; $_SESSION['edit-message'] = '';} ?>
        </div>
      </form>
    </section>
  </section>
</div>
</body>
</html>