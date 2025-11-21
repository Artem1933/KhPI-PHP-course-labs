<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Особистий кабінет</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        a { color: #dc3545; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Вітаємо, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
        <p>Ви успішно авторизувалися в системі.</p>
        <hr>
        <p><a href="logout.php">Вийти з акаунту</a></p>
    </div>
</body>
</html>