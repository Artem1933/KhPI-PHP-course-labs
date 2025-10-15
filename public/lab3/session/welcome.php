<?php
session_start();
if (!isset($_SESSION['user_login'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Привітання</title>
</head>
<body>
<div>
    <h1>Привіт, <?php echo $_SESSION['user_login']; ?>!</h1>
    <div>
        <p>Ви успішно увійшли в систему.</p>
        <a href="logout.php"><button>Вихід</button></a>
    </div>
</div>
</body>
</html>