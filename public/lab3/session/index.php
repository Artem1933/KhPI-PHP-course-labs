<?php
session_start();
if (isset($_SESSION['user_login'])) {
    header('Location: welcome.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['login'] === 'admin' && $_POST['password'] === '123') {
        $_SESSION['user_login'] = $_POST['login'];
        $_SESSION['last_activity'] = time();
        header('Location: welcome.php');
        exit;
    } else {
        $error = 'Неправильний логін або пароль!';
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
</head>
<body>
<div>
    <h1>Завдання: Вхід у систему</h1>
    <div>
        <form method="post" action="index.php">
            <p>Логін: <strong>admin</strong>, пароль: <strong>123</strong></p>
            <input type="text" name="login" placeholder="Логін" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Увійти</button>
            <?php if ($error): ?><p><?php echo $error; ?></p><?php endif; ?>
        </form>
    </div>
</div>
</body>
</html>