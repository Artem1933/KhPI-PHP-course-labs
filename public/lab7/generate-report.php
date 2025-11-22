<?php

$cacheDir = __DIR__ . '/cache';
$cacheFile = $cacheDir . '/report.html';
$cacheTime = 600;

if (!file_exists($cacheDir)) {
    mkdir($cacheDir, 0777, true);
}

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {

    echo "<div class='cache-info'> Дані завантажено з ФАЙЛОВОГО КЕШУ! (Без затримки)</div>";
    echo "<div>Останнє оновлення: " . date("H:i:s", filemtime($cacheFile)) . "</div>";

    readfile($cacheFile);
    exit;
}

$start = microtime(true);

sleep(3);

ob_start();
?>
<h3>Великий звіт (Згенеровано: <?= date("H:i:s") ?>)</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Email</th>
            <th>Баланс</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i <= 1000; $i++): ?>
        <tr>
            <td><?= $i ?></td>
            <td>Користувач <?= $i ?></td>
            <td>user<?= $i ?>@example.com</td>
            <td>$<?= rand(100, 10000) ?>.00</td>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>
<?php

$content = ob_get_clean();

file_put_contents($cacheFile, $content);

echo "<div class='cache-info' style='background:#fff3cd; color:#856404'> Згенеровано НОВИЙ звіт (Затримка 3 сек)</div>";
echo "<div>Час виконання скрипта: " . round(microtime(true) - $start, 2) . " сек.</div>";
echo $content;
?>