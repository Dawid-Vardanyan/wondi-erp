<?php
declare(strict_types=1);

define('DB_SERVER', getenv('DB_SERVER') ?: 'db');
define('DB_USERNAME', getenv('DB_USERNAME') ?: 'root');
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'logintest');

$pepper = getenv('APP_PEPPER') ?: "u3dfpUvxCXvohJmiygrNKz";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $con->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Anti-loop: nie przekierowuj, jeśli już jesteś na db-loading.php
    $current = basename($_SERVER['SCRIPT_NAME'] ?? '');

    if ($current !== 'db-loading.php') {
        http_response_code(302);
        header('Location: /db-loading.php');
        exit;
    }

    $con = null;
}
