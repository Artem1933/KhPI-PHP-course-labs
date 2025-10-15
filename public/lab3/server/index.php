<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Для перевірки редіректу, якщо метод не POST, розкоментуйте рядки нижче
    // header('Location: ../cookie/index.php');
    // exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Server</title>
</head>
<body>
<div>
    <h1>Завдання: Інформація з $_SERVER</h1>
    <div>
        <ul>
            <li><strong>IP-адреса клієнта:</strong> <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
            <li><strong>Браузер (User Agent):</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
            <li><strong>Назва скрипта:</strong> <?php echo $_SERVER['PHP_SELF']; ?></li>
            <li><strong>Метод запиту:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></li>
            <li><strong>Шлях до файлу:</strong> <?php echo $_SERVER['SCRIPT_FILENAME']; ?></li>
        </ul>
        <form method="post" action="index.php">
            <button type="submit">Відправити POST-запит</button>
        </form>
    </div>
</div>
</body>
</html>