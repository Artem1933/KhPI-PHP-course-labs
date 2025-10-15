<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header('Location: ../session/index.php');
    exit;
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_destroy();
    header("Location: ../session/index.php?session_expired=1");
    exit();
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $product = htmlspecialchars($_POST['product']);
    if (!empty($product)) {
        $_SESSION['cart'][] = $product;
    }
    header("Location: index.php");
    exit();
}

if (isset($_POST['checkout'])) {
    if (!empty($_SESSION['cart'])) {
        $previous = isset($_COOKIE['purchases']) ? json_decode($_COOKIE['purchases'], true) : [];
        $all = array_merge($previous, $_SESSION['cart']);
        setcookie('purchases', json_encode($all), time() + 86400 * 30, "/");
        $_SESSION['cart'] = [];
    }
    header("Location: index.php");
    exit();
}

$purchases_from_cookie = isset($_COOKIE['purchases']) ? json_decode($_COOKIE['purchases'], true) : [];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кошик</title>
</head>
<body>
<div>
    <h1>Завдання: Кошик та час сесії</h1>
    <p>Привіт, <strong><?php echo $_SESSION['user_login']; ?></strong>! <a href="../session/logout.php">(Вихід)</a></p>

    <div>
        <h2>Кошик (`$_SESSION`)</h2>
        <form method="post" action="index.php">
            <input type="text" name="product" placeholder="Введіть товар" required>
            <button type="submit" name="add_to_cart">Додати</button>
        </form>
        <?php if (!empty($_SESSION['cart'])): ?>
            <ul><?php foreach ($_SESSION['cart'] as $item) echo "<li>$item</li>"; ?></ul>
            <form method="post"><button type="submit" name="checkout">Оформити</button></form>
        <?php else: ?><p>Кошик порожній.</p><?php endif; ?>
    </div>

    <div>
        <h2>Попередні покупки (`$_COOKIE`)</h2>
        <?php if (!empty($purchases_from_cookie)): ?>
            <ul><?php foreach ($purchases_from_cookie as $item) echo "<li>$item</li>"; ?></ul>
        <?php else: ?><p>Покупок немає.</p><?php endif; ?>
    </div>
</div>
</body>
</html>