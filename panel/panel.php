<?php
  session_start();

  if(!isset($_SESSION['loggedin'])){
    header("Location: ../unauthorized.php");
    exit();
  };

  if($_SESSION['isAdmin'] == 1){
    $bColor = "bg-primary";
    $bfColor = "bg-primary";
    $bpColor = "bg-primary";
    $bLink = "panel_manage_users.php";
    $bfLink = "panel_invoices.php";
    $bpLink = "panel_manage_projects.php";
  } else if($_SESSION['isAccountant'] == 1){
    $bColor = "bg-secondary";
    $bfColor = "bg-primary";
    $bpColor = "bg-secondary";
    $bLink = "#";
    $bfLink = "panel_invoices.php";
    $bpLink = "#";
  } else {
    $bColor = "bg-secondary";
    $bfColor = "bg-secondary";
    $bpColor = "bg-secondary";
    $bLink = "#";
    $bfLink = "#";
    $bpLink = "#";
  }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../style-panel.css">
    <title>Wondi Management System</title>
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
        <div class="grid grid-cols-2 gap-16">
          <a href="<?php echo $bLink; ?>" class="block <?php echo $bColor; ?> text-white p-24 text-center font-bold text-lg">
            Zarządzanie rejestrem <br />
            pracowników
          </a>
          <a href="<?php echo $bpLink; ?>" class="block <?php echo $bpColor; ?> text-white p-24 text-center font-bold text-lg">
            Zarządzanie projektami
          </a>
          <a href="<?php echo $bfLink; ?>" class="block <?php echo $bfColor; ?> text-white p-24 text-center font-bold text-lg">
            Zarządzanie fakturami
          </a>
          <a href="panel_employee.php" class="block bg-primary text-white p-24 text-center font-bold text-lg">
            Panel pracownika
          </a>
        </div>
      </section>
    </section>
  </div>
</body>
</html>