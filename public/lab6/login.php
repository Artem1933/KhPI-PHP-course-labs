<?php
session_start();
require_once 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        header('Location: welcome.php');
        exit;
    } else {
        $message = "Невірний логін або пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; }
        input { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 0.9em; }
        a { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Вхід у систему</h2>
    <?php if($message): ?><p class="error"><?= htmlspecialchars($message) ?></p><?php endif; ?>
    
    <form method="POST">
        <label>Логін:</label>
        <input type="text" name="username" required placeholder="Ваш логін">
        
        <label>Пароль:</label>
        <input type="password" name="password" required placeholder="Ваш пароль">
        
        <button type="submit">Увійти</button>
    </form>
    <p>Ще не маєте акаунту? <a href="register.php">Зареєструватися</a></p>
</body>
</html>