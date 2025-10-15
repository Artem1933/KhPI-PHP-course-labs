<?php
if (isset($_POST['username'])) {
    setcookie('username', htmlspecialchars($_POST['username']), time() + (86400 * 7), "/");
    header("Location: index.php");
    exit();
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600, "/");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>
<body>
<div>
    <h1>Завдання: Робота з $_COOKIE</h1>
    <div>
        <?php if (isset($_COOKIE['username'])): ?>

            <h2>Привіт, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</h2>
            <form method="post" action="index.php">
                <button type="submit" name="delete_cookie">Видалити Cookie</button>
            </form>

        <?php else: ?>

            <h2>Введіть ваше ім'я</h2>
            <form method="post" action="index.php">
                <input type="text" name="username" placeholder="Ваше ім'я" required>
                <button type="submit">Зберегти</button>
            </form>

        <?php endif; ?>
    </div>
</div>
</body>
</html>