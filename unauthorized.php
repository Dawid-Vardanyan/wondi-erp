<?php
session_start();
http_response_code(403);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="style-index.css">

    <title>Brak dostępu – Wondi Management System</title>
</head>
<body>
    <div class="flex h-screen">
        <section class="w-1/2">
            <header>
                <a href="index.php" class="flex justify-center mt-14">
                    <img src="https://i.imgur.com/PygCFSV.png" alt="">
                </a>
            </header>

            <section class="w-1/3 mx-auto mt-44 text-center">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">
                    Brak dostępu
                </h2>

                <p class="text-gray-600 mb-6">
                    Nie masz uprawnień do wyświetlenia tej strony<br>
                    lub Twoja sesja wygasła.
                </p>

                <div class="bg-gray-100 border border-gray-200 rounded-lg p-4 text-sm text-gray-500">
                    Zaloguj się ponownie, aby uzyskać dostęp do systemu.
                </div>

                <a href="index.php"
                   class="inline-block mt-6 px-6 py-2 rounded bg-primary text-white font-bold">
                    Przejdź do logowania
                </a>
            </section>
        </section>

        <div class="h-full w-1/2 dummy"></div>
    </div>
</body>
</html>
