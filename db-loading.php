<?php
http_response_code(503);
header("Refresh: 5; url=/");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="style-index.css">

    <title>Wondi Management System</title>

    <style>
        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #e5e7eb;
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="flex h-screen">
        <section class="w-1/2">
            <header>
                <a href="/" class="flex justify-center mt-14">
                    <img src="https://i.imgur.com/PygCFSV.png" alt="">
                </a>
            </header>

            <section class="w-1/3 mx-auto mt-44 text-center">
                <h2 class="text-3xl font-bold mb-6">
                    Trwa uruchamianie bazy danych
                </h2>

                <div class="flex justify-center mb-6">
                    <div class="spinner"></div>
                </div>

                <p class="text-gray-600">
                    System startuje i przygotowuje połączenie z bazą danych.<br>
                    Za chwilę spróbujemy ponownie.
                </p>

                <p class="text-sm text-gray-400 mt-4">
                    Jeśli ten ekran wyświetla się dłużej,<br>
                    sprawdź logi kontenera MySQL.
                </p>

                <a href="/" class="inline-block mt-6 text-blue-500 underline">
                    Spróbuj teraz
                </a>
            </section>
        </section>

        <div class="h-full w-1/2 dummy"></div>
    </div>
</body>
</html>
