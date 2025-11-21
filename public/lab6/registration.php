<?php
require_once 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $passwordHash
            ]);
            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $message = "Користувач з таким ім'ям або email вже існує.";
            } else {
                $message = "Помилка: " . $e->getMessage();
            }
        }
    } else {
        $message = "Заповніть всі поля.";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; }
        input { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background: #218838; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Реєстрація</h2>
    <?php if($message): ?><p class="error"><?= htmlspecialchars($message) ?></p><?php endif; ?>
    
    <form method="POST">
        <label>Логін:</label>
        <input type="text" name="username" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Пароль:</label>
        <input type="password" name="password" required>
        
        <button type="submit">Зареєструватися</button>
    </form>
    <p>Вже є акаунт? <a href="login.php">Увійти</a></p>
</body>
</html>